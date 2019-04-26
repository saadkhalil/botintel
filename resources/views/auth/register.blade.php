@extends('front.layout.head')
@section('description')
This is Personal Details
@endsection
@section('title')
Botintel
@endsection
@section('contents')
<!-- // being slider -->
<script src="https://js.stripe.com/v3/"></script>
<div id="hero-banner" class="banner-inner">
  <div class="jumbotron">
  <div class="container">
      @if(session()->has('message'))
<div class="bs-example">
<div class="alert alert-success fade in">
<a href="#" class="close" data-dismiss="alert">&times;</a>
<strong>{{Session::get('message')}}</strong>
</div>
</div>
@endif
 @if(session()->has('error'))
<div class="bs-example">
<div class="alert alert-danger fade in">
<a href="#" class="close" data-dismiss="alert">&times;</a>
<strong>{{Session::get('error')}}</strong>
</div>
</div>
@endif
    <div class="slide-text wow fadeInUp" >
    
    <h2>Sign Up</h2>
</div>
  </div>
</div>
</div>
<!-- // end slider -->
<section id="pages" class="profile-pages">

 <div class="container form-bg">

    <div class="row">
     <div class="col-md-12">
        <h2 class="page-heading">
<img style="width:29px;" src="{{asset('front/img/icons-profile.svg')}}" alt="icon-packages-box">
        User Details</h2>
     </div>
    </div>
    <div class="row ">
      <div class="personal-info">
    <form action="{{ url('register/store') }}"  method="POST" id="registerform" aria-label="{{ __('Register') }}">
        @csrf
      <div class="col-md-6 col-sm-6 col-xs-12">
           <!-- // being form name -->
            <div class="form-group">
          <input id="fname" type="text"  placeholder="First Name" class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}" name="fname" value="{{ old('fname') }}" required autofocus>

                                @if ($errors->has('fname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fname') }}</strong>
                                    </span>
                                @endif
  </div>
           <!-- // end form name -->
           </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
        <!-- // being form lastname -->
            <div class="form-group">
         <input id="name" type="text"  placeholder="Last Name" class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}" name="lname" value="{{ old('lname') }}" required autofocus>

                                @if ($errors->has('lname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                                @endif
  </div>
           <!-- // end form lastname -->
            </div>
           <!-- // end form city -->
           <div class="col-md-6 col-sm-6 col-xs-12">
      <!-- // being form email -->
            <div class="form-group">
<input type="email" placeholder="Email"  class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
  </div>
           <!-- // end form email -->
     

     

    </div>
   
            <div class="col-md-6 col-sm-6 col-xs-12">
             <!-- // being form phonenumber -->
            <div class="form-group">
        <input id="phone" type="text" placeholder="Phone Number (Optional)"  class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" >

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
         </div>
           <!-- // end form phonenumber -->

           

      </div>

    


    </div>


   </div>
   
  

    </div>

    <!--  profile name -->

   <div id="packages-list">
     <div class="container">
       <div class="row"><h3>Please select a package to continue</h3></div>
       <div class="row">
        @php
        $i = 1
        @endphp
        @foreach($subscriptions as  $subscription)
         <div class="col-md-4">
          <label class="container-radio"   id="packageBox{{$i}}">
  <input type="radio" name="subscription_id" required   value="{{$subscription->id}}">
  <span class="checkmark"></span><label for="">{{$subscription->subscription_name}}</label>

            <ul class="price-list list-unstyled">
    <li class="header">x{{$subscription->number_of_profiles}} Pairs <sup>1</sup>
    <span>Monthly</span></li>
    <li class="payment">${{$subscription->subscription_price}} <small>/ per month</small></li>
  
  </ul>
  </label>
         </div>
         @php 
         $i++
         @endphp
         @endforeach

   @if ($errors->has('subscription'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('subscription') }}</strong>
                                    </span>
                                @endif
       </div>
	    <span class="noted" style="color:grey;font-size:14px;">
1. Maximum potential successful checkouts per month.
</span>
       <div class="row">
	   
         <div class="col-md-8">
		
             <label class="container-checkbox terms ">
                <input id="agree" name="agree" value="1" type="checkbox">
               
  <span class="checkmark"></span><label for="agree" style="font-size:16px;">I have read and agree to the <a style="color:grey;" href="{{url('/refund-policy')}}">Refund Policy</a> and <a style="color:grey;" href="{{url('/terms-conditions')}}">Terms of Use</a> for this service.</label>
</label>
<br>
   @if ($errors->has('agree'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('agree') }}</strong>
                                    </span>
                                @endif
<span class="noted" style="color:grey;font-size:12px;">
 By Purchasing, you agree to our Terms of Use, Refund Policy, and Privacy Policy.
</span>

         </div>
         <div class="col-md-4">
            <div class="form-row">
    <label for="card-element">
      Credit or debit card
    </label>
    <div id="cardshow">
        <div id="card-element">
          <!-- A Stripe Element will be inserted here. -->
        </div>

    <!-- Used to display Element errors. -->
        <div id="card-errors" role="alert"></div>
      </div>
  </div>

           <div class="form-group btn-row text-right padding-top-15">
            <button id="regbtn" class="btn btn-primary">ACCESS NOW</button>
           	<div id="regwait" style="display:none;"><img src="{{asset('front/img/loader.gif')}}" style="width:20%;"></div>
           </div>
         </div>
       </div>
     </div>
   </div>
    
  </div>



 </form>
<!-- form action="{{url('')}}\register\update" method="POST" id="stripeform">
  @csrf
  <input type="hidden" name="amount" value="1000">
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_L59T4T2utlwOMMVqxVGYnsRK"
    data-amount="100"
    data-name="BC Developer"
    data-description="Example charge"
    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
    data-locale="auto">
  </script>
</form> -->

    </div>
    
  </div>

</section>
 <script>
 // $('.form-row').hide();
 
 // $('#agree').click(function() {
  // if ($(this).prop('checked')) {
   // $('.form-row').show();
  // } else
   // $('.form-row').hide();
// });
  // var stripe = Stripe('pk_test_L59T4T2utlwOMMVqxVGYnsRK');
  var stripe = Stripe('pk_test_pRdwPEKj0oYbmXHRvZVGsado');
var elements = stripe.elements();
var price= $('.subprice').val();

// Custom styling can be passed to options when creating an Element.
var style = {
  base: {
    // Add your base input styles here. For example:
    fontSize: '16px',
    color: "#fff",
   
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Create a token or display an error when the form is submitted.
var form = document.getElementById('registerform');
form.addEventListener('submit', function(event) {
	
  event.preventDefault();


  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the customer that there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } 
	
	else if (!$('#agree').prop('checked')) {
		  alert('Check to agree our Refund Policy and Terms of Use');
		  } 
		  else {
		  
      // Send the token to your server.
       $('#regbtn').css("display", "none");

  $('#regwait').css("display", "block");
      stripeTokenHandler(result.token);
    }
  });
});
function stripeTokenHandler(token) {

  // Insert the token ID into the form so it gets submitted to the server
  if(token){
  var form = document.getElementById('registerform');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
  }
  else {
	  
	  $('#card-errors').append('Your card number is invalid.');
  }
}

// $("#regsubmit").click (function(){

//  // event.preventDefault();
//  var value= $('#registerform').serialize();
//  var action= $('#registerform').attr('action');

//  $.ajax({
//             type: 'post',
//             data: value,
//             url: action,
//             dataType: 'json',
//             success: function(res){

//                  $(".stripe-button-el").click();
//                  // $("#stripeform").submit();
//             },
//             error: function(res){
//                console.log(res);
//             }
//         });
// });


  </script>
@endsection