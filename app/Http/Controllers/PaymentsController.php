<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;

define("AUTHORIZENET_LOG_FILE", "phplog");

class PaymentsController extends Controller
{

    public function create()
    {
        return view('payments.create');
    }

    public function show()
    {
        return view('payments.show');
    }
    public function store(Requests\CreditCardRequest $request)
    {

            $_api_context = new AnetAPI\MerchantAuthenticationType();
            $_api_context->setName(getenv("ANET_NAME"));
            $_api_context->setTransactionKey(getenv("ANET_TRANS_KEY"));
            $refId = 'ref' . time();

            // Create the payment data for a credit card
            $creditCard = new AnetAPI\CreditCardType();
            $creditCard->setCardNumber($_POST['card_number']);
            $creditCard->setExpirationDate($_POST["expiration_month"].$_POST["expiration_year"]);
            $creditCard->setCardCode($_POST['cvc']);
            $paymentOne = new AnetAPI\PaymentType();
            $paymentOne->setCreditCard($creditCard);

            $order = new AnetAPI\OrderType();
            $order->setDescription("New Item");


            //create a transaction
            $transactionRequestType = new AnetAPI\TransactionRequestType();
            $transactionRequestType->setTransactionType("authCaptureTransaction");
            $transactionRequestType->setAmount($_POST['amount']);
            $transactionRequestType->setOrder($order);
            $transactionRequestType->setPayment($paymentOne);

            //Preparing customer information object
            $cust = new AnetAPI\CustomerAddressType();
            $cust->setFirstName($_POST['fname']);
            $cust->setLastName($_POST['lname']);
            $cust->setAddress($_POST['BillingAddress']);
            $cust->setCity($_POST['BillingCity']);
            $cust->setState($_POST['BillingState']);
            $cust->setCountry($_POST['BillingCountry']);
            $cust->setZip($_POST['BillingZip']);
            $customerData = new AnetAPI\CustomerDataType();
            $customerData->setType("individual");
            $customerData->setId(time());
            $customerData->setEmail($_POST['email']);

            $transactionRequestType->setBillTo($cust);
            $transactionRequestType->setCustomer($customerData);

            $request = new AnetAPI\CreateTransactionRequest();
            $request->setMerchantAuthentication($_api_context);
            $request->setRefId($refId);
            $controller = new AnetController\CreateTransactionController($request);
            $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);

            $message="Your test payment is processed. Please check your mailbox for the receipt.";
            if ($response != null) {
                if ($response->getMessages()->getResultCode() == "Ok") {
                    $tresponse = $response->getTransactionResponse();

                    if ($tresponse != null && $tresponse->getMessages() != null) {
                        $massage= " Transaction Response code : " . $tresponse->getResponseCode() . "\n"."Charge Credit Card AUTH CODE : " . $tresponse->getAuthCode() . "\n"."Charge Credit Card TRANS ID  : " . $tresponse->getTransId() . "\n"." Code : " . $tresponse->getMessages()[0]->getCode() . "\n"." Description : " . $tresponse->getMessages()[0]->getDescription() . "\n";
                    } else {
                        $message= "Transaction Failed \n";
                        if ($tresponse->getErrors() != null) {
                            $message="$message Error code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n"." Error message : " . $tresponse->getErrors()[0]->getErrorText() . "\n";
                        }
                    }
                } else {
                    $message="Transaction Failed \n";
                    $tresponse = $response->getTransactionResponse();
                    if ($tresponse != null && $tresponse->getErrors() != null) {
                        $message="$message Error code  : " . $tresponse->getErrors()[0]->getErrorCode() . "\n"." Error message : " . $tresponse->getErrors()[0]->getErrorText() . "\n";
                    } else {
                        $message="$message Error code  : " . $response->getMessages()->getMessage()[0]->getCode() . "\n"." Error message : " . $response->getMessages()->getMessage()[0]->getText() . "\n";
                    }
                }
            } else {
                $message="No response returned \n";
            }

        return view('payments.show')->with('message',$message);

    }


}
