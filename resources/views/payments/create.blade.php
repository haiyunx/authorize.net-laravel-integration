@extends('layouts.default')
@section('title', 'Payment')
@section('jsdoc')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
function SetShipping(checked) {
    if (checked) {

    document.getElementById('ShippingAddress').value = document.getElementById('BillingAddress').value;

    document.getElementById('ShippingCity').value = document.getElementById('BillingCity').value;

    document.getElementById('ShippingState').value = document.getElementById('BillingState').value;

    document.getElementById('ShippingZip').value = document.getElementById('BillingZip').value;

    document.getElementById('ShippingCountry').value = document.getElementById('BillingCountry').value;

    } else {

    document.getElementById('ShippingAddress').value = '';

    document.getElementById('ShippingCity').value = '';

    document.getElementById('ShippingState').value = '';

    document.getElementById('ShippingZip').value = '';

    document.getElementById('ShippingCountry').value = '';

    }
}
</script>

@section('content')
<div class="col-md-offset-2 col-md-8">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h5>Payment Info</h5>
    </div>
    <div class="panel-body">
        @include('shared._errors')
      <form method="POST" action="{{ route('payments.store') }}">
          {{ csrf_field() }}
        <div class="row">
            <div class="form-group col-md-6">
                <label for="name">First Name</label>
                <input type="text" name="fname" class="form-control" value="{{ old('fname') }}">
            </div>
            <div class="form-group col-md-6">
                <label for="name">Last Name</label>
                <input type="text" name="lname" class="form-control" value="{{ old('lname') }}">
            </div>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" value="{{ old('email') }}">
        </div>
<hr>
        <div class="form-group">
            <label for="amount">Product</label>
                    <select class="form-control" name="amount">
                        <option value="29.95">Both - 1 year</option>
                        <option value="51.95">Both - 2 years</option>
                        <option value="69.95">Both - 3 years</option>
                    </select>
        </div>
        <div class="form-group">
            <label for="card-number">Card Number</label>
              <input type="text" class="form-control" name="card_number" id="card-number" placeholder="Debit/Credit Card Number">
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label for="expiration_month">Expiration Month</label>
                    <select class="form-control" name="expiration_month">
                        <option>Month</option>
                        <option value="01">Jan (01)</option>
                        <option value="02">Feb (02)</option>
                        <option value="03">Mar (03)</option>
                        <option value="04">Apr (04)</option>
                        <option value="05">May (05)</option>
                        <option value="06">June (06)</option>
                        <option value="07">July (07)</option>
                        <option value="08">Aug (08)</option>
                        <option value="09">Sep (09)</option>
                        <option value="10">Oct (10)</option>
                        <option value="11">Nov (11)</option>
                        <option value="12">Dec (12)</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="expiration_year">Year</label>
                    <select class="form-control" name="expiration_year">
                        <option value="18">2018</option>
                        <option value="19">2019</option>
                        <option value="20">2020</option>
                        <option value="21">2021</option>
                        <option value="22">2022</option>
                        <option value="23">2023</option>
                        <option value="23">2024</option>
                        <option value="23">2025</option>
                        <option value="23">2026</option>
                        <option value="23">2027</option>
                        <option value="23">2028</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="cvc">Card CVV</label>
            <input type="text" class="form-control" name="cvc" id="cvv" placeholder="Security Code">
        </div>
<hr>
        <div class="form-group">
            <label for="BillingAddress">Billing Address</label>
            <input type="text" class="form-control" placeholder="1234 Main St" id="BillingAddress" name="BillingAddress" value="{{ old('BillingAddress') }}">
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="city">City</label>
                <input type="text" class="form-control" id="BillingCity" name="BillingCity" value="{{ old('BillingCity') }}">
            </div>
            <div class="form-group col-md-4">
                <label for="state">State</label>
                <select name="BillingState" class="form-control" id="BillingState" value="{{ old('BillingState') }}">
                    <option selected>Choose...</option>
                    <option value="AL">Alabama</option>
                    <option value="AK">Alaska</option>
                    <option value="AZ">Arizona</option>
                    <option value="AR">Arkansas</option>
                    <option value="CA">California</option>
                    <option value="CO">Colorado</option>
                    <option value="CT">Connecticut</option>
                    <option value="DE">Delaware</option>
                    <option value="DC">District Of Columbia</option>
                    <option value="FL">Florida</option>
                    <option value="GA">Georgia</option>
                    <option value="HI">Hawaii</option>
                    <option value="ID">Idaho</option>
                    <option value="IL">Illinois</option>
                    <option value="IN">Indiana</option>
                    <option value="IA">Iowa</option>
                    <option value="KS">Kansas</option>
                    <option value="KY">Kentucky</option>
                    <option value="LA">Louisiana</option>
                    <option value="ME">Maine</option>
                    <option value="MD">Maryland</option>
                    <option value="MA">Massachusetts</option>
                    <option value="MI">Michigan</option>
                    <option value="MN">Minnesota</option>
                    <option value="MS">Mississippi</option>
                    <option value="MO">Missouri</option>
                    <option value="MT">Montana</option>
                    <option value="NE">Nebraska</option>
                    <option value="NV">Nevada</option>
                    <option value="NH">New Hampshire</option>
                    <option value="NJ">New Jersey</option>
                    <option value="NM">New Mexico</option>
                    <option value="NY">New York</option>
                    <option value="NC">North Carolina</option>
                    <option value="ND">North Dakota</option>
                    <option value="OH">Ohio</option>
                    <option value="OK">Oklahoma</option>
                    <option value="OR">Oregon</option>
                    <option value="PA">Pennsylvania</option>
                    <option value="RI">Rhode Island</option>
                    <option value="SC">South Carolina</option>
                    <option value="SD">South Dakota</option>
                    <option value="TN">Tennessee</option>
                    <option value="TX">Texas</option>
                    <option value="UT">Utah</option>
                    <option value="VT">Vermont</option>
                    <option value="VA">Virginia</option>
                    <option value="WA">Washington</option>
                    <option value="WV">West Virginia</option>
                    <option value="WI">Wisconsin</option>
                    <option value="WY">Wyoming</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="BillingZip">Zip</label>
                <input type="text" class="form-control" id="BillingZip" name="BillingZip" value="{{ old('BillingZip') }}">
            </div>
        </div>
        <div class="form-group">
            <label for="BillingCountry">Country</label>
            <input type="text" name="BillingCountry" class="form-control" value="{{ old('BillingCountry') }}" id="BillingCountry">
        </div>
<hr>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck" onclick="SetShipping(this.checked);">
                <label class="form-check-label" for="gridCheck">
                Use Billing Address
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="address">Shipping Address</label>
            <input type="text" class="form-control" placeholder="1234 Main St" id="ShippingAddress">
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="city">City</label>
                <input type="text" class="form-control" id="ShippingCity">
            </div>
            <div class="form-group col-md-4">
                <label for="state">State</label>
                <select name="state" class="form-control" id="ShippingState">
                    <option selected>Choose...</option>
                    <option value="AL">Alabama</option>
                    <option value="AK">Alaska</option>
                    <option value="AZ">Arizona</option>
                    <option value="AR">Arkansas</option>
                    <option value="CA">California</option>
                    <option value="CO">Colorado</option>
                    <option value="CT">Connecticut</option>
                    <option value="DE">Delaware</option>
                    <option value="DC">District Of Columbia</option>
                    <option value="FL">Florida</option>
                    <option value="GA">Georgia</option>
                    <option value="HI">Hawaii</option>
                    <option value="ID">Idaho</option>
                    <option value="IL">Illinois</option>
                    <option value="IN">Indiana</option>
                    <option value="IA">Iowa</option>
                    <option value="KS">Kansas</option>
                    <option value="KY">Kentucky</option>
                    <option value="LA">Louisiana</option>
                    <option value="ME">Maine</option>
                    <option value="MD">Maryland</option>
                    <option value="MA">Massachusetts</option>
                    <option value="MI">Michigan</option>
                    <option value="MN">Minnesota</option>
                    <option value="MS">Mississippi</option>
                    <option value="MO">Missouri</option>
                    <option value="MT">Montana</option>
                    <option value="NE">Nebraska</option>
                    <option value="NV">Nevada</option>
                    <option value="NH">New Hampshire</option>
                    <option value="NJ">New Jersey</option>
                    <option value="NM">New Mexico</option>
                    <option value="NY">New York</option>
                    <option value="NC">North Carolina</option>
                    <option value="ND">North Dakota</option>
                    <option value="OH">Ohio</option>
                    <option value="OK">Oklahoma</option>
                    <option value="OR">Oregon</option>
                    <option value="PA">Pennsylvania</option>
                    <option value="RI">Rhode Island</option>
                    <option value="SC">South Carolina</option>
                    <option value="SD">South Dakota</option>
                    <option value="TN">Tennessee</option>
                    <option value="TX">Texas</option>
                    <option value="UT">Utah</option>
                    <option value="VT">Vermont</option>
                    <option value="VA">Virginia</option>
                    <option value="WA">Washington</option>
                    <option value="WV">West Virginia</option>
                    <option value="WI">Wisconsin</option>
                    <option value="WY">Wyoming</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="zip">Zip</label>
                <input type="text" class="form-control" id="ShippingZip">
            </div>
        </div>
        <div class="form-group">
            <label for="country">Country</label>
            <input type="text" name="country" class="form-control" id="ShippingCountry">
        </div>
      <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>
@stop