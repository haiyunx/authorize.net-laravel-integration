<?php

namespace App\Http\Requests;

use LVR\CreditCard\CardCvc;
use LVR\CreditCard\CardNumber;
use LVR\CreditCard\CardExpirationYear;
use LVR\CreditCard\CardExpirationMonth;


use Illuminate\Foundation\Http\FormRequest;

class CreditCardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'card_number' => ['required', new CardNumber],
            'expiration_year' => ['required', new CardExpirationYear($this->get('expiration_month'))],
            'expiration_month' => ['required', new CardExpirationMonth($this->get('expiration_year'))],
            'cvc' => ['required', new CardCvc($this->get('card_number'))],
            'fname' => 'required|max:30',
            'lname' => 'required|max:30',
            'email' => 'required|email|max:255',
            'BillingAddress' => 'required',
            'BillingCity' => 'required|max:40',
            'BillingState' => 'required|max:20',
            'BillingZip' =>'required|max:20',
            'BillingCountry' => 'required|max:40'
        ];
    }


    public function authorize()
    {

        return true;
    }
}
