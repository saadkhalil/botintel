@extends('front.layout.head')
@section('description')
This is Personal Details
@endsection
@section('title')
Botintel
@endsection
@section('contents')

<!-- // being slider -->
<div id="hero-banner" class="banner-inner">
  <div class="jumbotron">
  <div class="container">
    <div class="slide-text wow fadeInUp" >
    <h6>Your</h6>
    <h2>Profiles</h2>
</div>
  </div>
</div>
</div>
<!-- // end slider -->
<section id="pages" class="profile-pages">
  <div class="main-title-page">
  <div class="container">
    <div class="row">
     <div class="col-md-8 col-xs-12">
        <h2 class="page-title">{{ strtoupper($subscriped->subscription_name)}} - {{$subscriped->number_of_profiles}} PROFILES</h2>
        <small>{{($subscriped->number_of_profiles - count($userprofiles))}} profile(s) remaining </small>
     </div>
     <input type="hidden" id="usedprofile" value="{{count($userprofiles)}}">
     {{$subscriped->number_of_profile}}
     @if(count($userprofiles)!=$subscriped->number_of_profiles)
     <div class="col-md-4 text-right  col-xs-12">
       <!--a class="btn btn-default btn-circle btn-lg" id="newid" style="font-size:23px;" onclick="newProfile({{$subscriped->number_of_profiles}})"  href="javascript:void(0)"><strong>+</strong></a-->
	   <button type="button" onclick="newProfile({{$subscriped->number_of_profiles}})"  href="javascript:void(0)" id="newid" class="btn btn-default btn-circle btn-lg" data-toggle="tooltip" data-placement="right" ><i class="glyphicon glyphicon-plus"></i></button>
     </div>
     @endif
    </div>
  </div>
</div>
<div class="list-profile-view">
  <div class="container">
    <div class="row">
      <ul class="list-inline">
        <li class="col-md-6">
          <div class="form-group">
            <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
			
           	<div id="regwait" style="display:none;"><img src="{{asset('front/img/loader.gif')}}" style="width:13%;"></div>
            <select name="profileid" onchange="profilechange(this.value)" class="form-control profile">
              @if(count($userprofiles)>0)
              <option value="">Please Select a Profile</option>
               @foreach($userprofiles as $userprofile)
              <option value="{{$userprofile->id}}">{{$userprofile->profile_name}}</option>
              @endforeach
              @else
              <option value="">No Profile</option>
               @endif
             
              
             
              
            </select>
			
			</div>
			
        </li>
		
        <li class="col-md-6 text-right"> 
		
          <div class="btn-row">
            <!--<a class="btn btn-primary" onclick="profilechange()" href="javascript:void(0)">Edit</a>-->
          <a class="btn btn-default " onclick="profiledelete()" href="javascript:void(0)">Delete</a>
          </div>
        </li>
      </ul>
    </div> 
  </div>
</div>
	@if(session()->has('message'))
<div class="bs-example container">
<div class="col-md-12">
<div class="alert alert-success fade in">
<a href="#" class="close" data-dismiss="alert">&times;</a>
<strong>{{Session::get('message')}}</strong>
</div>
</div>
</div>
@endif
 <div id="profilediv" style="display:none;" >
 <!--div id="profilediv" style="display:{{(count($userprofiles)!=$subscriped->number_of_profiles ? '' : 'none')}};" -->
 <div  class="container form-bg ">
<div id="message"></div>
    <div class="row">
     <div class="col-md-12">
        <h2 class="page-heading">
<img   style="width:4%;" src="{{asset('front/img/icon-delivery-box.svg')}}" alt="icon-delivery-box">
        Delivery Details</h2>
     </div>
    </div>
    <div class="row ">
      <div  class="personal-info">
    <form action="{{url('profile/submit')}}"  id="validate" method="post" id="profileform" >
      
      @csrf
      <div class="col-md-6">
           <!-- // being form name -->
           <input type="hidden" id="id" name="id" >
            <div class="form-group">
      <input type="text" required="" placeholder="First Name" value="" name="fname" id="fname" class="form-control" maxlength="30"></div>
           <!-- // end form name -->
            <!-- // being form address 1 -->
            <div class="form-group">
      <input type="text" required="" placeholder="Address 1" value="" name="address1" id="address1" class="form-control"  maxlength="25"></div>
           <!-- // end form address 1 -->
            <!-- // being form city -->
            <div class="form-group">
      <input type="text" required="" placeholder="City" value="" name="city" id="city" class="form-control"  maxlength="30"></div>
           <!-- // end form city -->
      <!-- // being form zipcode -->
            <div class="form-group">
      <input type="text" required="" placeholder="Zip Code" value="" name="zip" id="zip" class="form-control"  maxlength="15"></div>
           <!-- // end form zipcode -->
        <!-- // being form phonenumber -->
            <div class="form-group">
      <input type="text" required="" placeholder="Phone Number" value="" name="phone" id="phone" class="form-control"  maxlength="15"></div>
           <!-- // end form phonenumber -->

     

    </div>
    <div class="col-md-6">
        <!-- // being form lastname -->
            <div class="form-group">
      <input type="text" required="" placeholder="Last Name" value="" name="lname" id="lname" class="form-control"  maxlength="30"></div>
           <!-- // end form lastname -->
           <!-- // being form Address2 -->
            <div class="form-group">
      <input type="text"  placeholder="Address 2 (Optional)" value="" name="address2" id="address2" class="form-control"  maxlength="30"></div>
           <!-- // end form Address2 -->
             <!-- // being form state  -->
            <div class="form-group">
      <select name="state" id="state" class="form-control">
        <option value="">Please Select State</option>
 <option value="Alabama">Alabama</option>
<option value="Alaska">Alaska</option>
<option value="Arizona">Arizona</option>
<option value="Arkansas">Arkansas</option>
<option value="California">California</option>
<option value="Colorado">Colorado</option>
<option value="Connecticut">Connecticut</option>
<option value="Delaware">Delaware</option>
<option value="District_Of_Columbia">District Of Columbia</option>  
<option value="Florida">Florida</option>
<option value="Hawaii">Hawaii</option>
<option value="Idaho">Idaho</option>
<option value="Illinois">Illinois</option>
<option value="Indiana">Indiana</option>
<option value="Iowa">Iowa</option>
<option value="Kansas">Kansas</option>
<option value="Kentucky">Kentucky</option>
<option value="Louisiana">Louisiana</option>
<option value="Maine">Maine</option>
<option value="Maryland">Maryland</option>
<option value="Massachusetts">Massachusetts</option>
<option value="Michigan">Michigan</option>
<option value="Minnesota">Minnesota</option>
<option value="Mississippi">Mississippi</option>
<option value="Missouri">Missouri</option>
<option value="Montana">Montana</option>
<option value="Nebraska">Nebraska</option>
<option value="Nevada">Nevada</option>
<option value="New_Hampshire">New Hampshire</option>
<option value="New_Jersey">New Jersey</option>
<option value="New_Mexico">New Mexico</option>
<option value="New_York">New York</option>
<option value="North_Carolina">North Carolina</option>
<option value="North_Dakota">North Dakota</option>
<option value="Ohio">Ohio</option>
<option value="Oklahoma">Oklahoma</option>
<option value="Oregon">Oregon</option>
<option value="Pennsylvania">Pennsylvania</option>
<option value="Rhode_Island">Rhode Island</option>
<option value="South_Carolina">South Carolina</option>
<option value="South_Dakota">South Dakota</option>
<option value="Tennessee">Tennessee</option>
<option value="Texas">Texas</option>
<option value="Utah">Utah</option>
<option value="Vermont">Vermont</option>
<option value="Virginia">Virginia</option>
<option value="Washington">Washington</option>
<option value="West_Virginia">West Virginia</option>
<option value="Wisconsin">Wisconsin</option>
<option value="Wyoming">Wyoming</option>
<option value="Alberta">Alberta</option>
<option value="British_Columbia">British Columbia</option>
<option value="Manitoba">Manitoba</option>
<option value="New_Brunswick">New Brunswick</option>
<option value="Newfoundland">Newfoundland</option>
<option value="Northwest_Territories">Northwest Territories</option>
<option value="Nova_Scotia">Nova Scotia</option>
<option value="Nunavut">Nunavut</option>
<option value="Ontario">Ontario</option>
<option value="Prince_Edward_Island">Prince Edward Island</option>
<option value="Quebec">Quebec</option>
<option value="Saskatchewan">Saskatchewan</option>
<option value="Yukon">Yukon</option>
      </select>
      </div>
           <!-- // end form state -->
            <!-- // being form country  -->
            <div class="form-group">
     <select required name="countries" id="countries" class="form-control">
      <option value="">Please Select Country</option>
  <option value="US">US</option> 
   <option value="CA">CA</option> 
  <option value="GB">GB</option>
  <!--<option value="AU">AU</option> -->
  <!--<option value="GB">GB</option> -->
  <!--<option value="DE">DE</option> -->
  <!--<option value="DK">DK</option> -->
  <!--<option value="FR">FR</option> -->
  <!--<option value="IT">IT</option> -->
  <!--<option value="NL">NL</option> -->
  <!--<option value="RU">RU</option> -->
</select>
    </div>
           <!-- // end form country -->

           

      </div>

    </div>
   </div>
   
    </div>

    <!--  profile name -->

    <!-- // payment details -->
     <div class="container form-bg ">

    <div class="row">
     <div class="col-md-12">
        <h2 class="page-heading">
<img   style="width:4%;" src="{{asset('front/img/icon-payment-details.svg')}}" alt="icon-delivery-box">
        Payment Details</h2>
     </div>
    </div>
    <div class="row ">
      <div class="personal-info">
      <div class="col-md-6">
           <!-- // being form email -->
            <div class="form-group">
      <input type="text" required="" placeholder="Email" value="" name="paymentemail" id="paymentemail" class="form-control"></div>
           <!-- // end form email -->
            <!-- // being form card Type -->
            <div class="form-group">
      <select name="cardtype" id="cardtype" required class="form-control">
        <option value="">Card Type</option>
        <option value="mastercard">Master Card</option>
        <option value="visa">Visa</option>
        <option value="amex">Amex</option>
        <option value="Discover">Discover</option>
      </select>
    </div>
           <!-- // end form type -->
         <!-- // being form gender -->
            <div class="form-group">
     <div class="expire">
       <label id="e-head">Expiry Date</label>
<select name="expmon" id="expmon" class="form-control">
  <option value="">MM</option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="6">6</option>
  <option value="7">7</option>
  <option value="8">8</option>
  <option value="9">9</option>
  <option value="10">10</option>
  <option value="11">11</option>
  <option value="12">12</option>

</select><select name="expyear" id="expyear" class="form-control" >
  <option value="">YYYY</option>
  <option value="2016" >2016</option>
  <option value="2017" >2017</option>
   <option value="2018" >2018</option>
    <option value="2019" >2019</option>
    <option value="2020" >2020</option>
    <option value="2021" >2021</option>
    <option value="2022" >2022</option>
    <option value="2023" >2023</option>
    <option value="2024" >2024</option>
    <option value="2025" >2025</option>
    <option value="2026" >2026</option>
    <option value="2027" >2027</option>
    <option value="2028" >2028</option>
    <option value="2029" >2029</option>
    <option value="2030" >2030</option>
    <option value="2031" >2031</option>
    <option value="2032" >2032</option>
    <option value="2033" >2033</option>
    <option value="2034" >2034</option>
    <option value="2035" >2035</option>
    <option value="2036" >2036</option>
    <option value="2037" >2037</option>
    <option value="2038" >2038</option>
    <option value="2039" >2039</option>
    <option value="2040" >2040</option>
</select>

     </div>
      </div>
           <!-- // end form gender -->
 
    </div>
    <div class="col-md-6  personal-info-cols">
           <!-- // being form cardnumber -->
            <div class="form-group">
      <input type="text" required="" placeholder="Card Number" value="" name="cardnumber" id="cardnumber" class="form-control" minlength="15"  maxlength="16"></div>
           <!-- // end form cardnumber -->
        <!-- // being form cvv -->
            <div class="form-group">
      <input type="text" required="" placeholder="CVV" value="" name="cvv" id="cvv" class="form-control" minlength="3"  maxlength="4"></div>
           <!-- // end form cvv -->     
           

           

      </div>

   


    </div>


   </div>
   
  <div class="row">
  <div class="col-md-12">
    <ul class="list-inline">
      <li class="col-md-6 col-xs-12">
       <h2 class="page-heading"><img   style="width:6%;" src="{{asset('front/img/icons-profile.svg')}}" alt="">Profile Name</h1>
        <br>
         <!-- // being form profilename -->
            <div class="form-group">
      <input type="text" required="" placeholder="Profile Name" value="" name="profilename" id="profilename" class="form-control"></div>
           <!-- // end form profilename -->
      </li>
      <li class="col-md-6 col-xs-12 text-right p-top-53">
         <div class="form-group btn-row">
        <button class="btn btn-primary" type="submit">Save</button>
        <button class="btn btn-default" onclick="clearProfile()" type="button">Clear</button>
      </div>
      </li>
    </ul>
  </div>
</div>

    </div>
    
  </div>
  </div>

 </form>
    </div>
    
  </div>
</section>
<script type="text/javascript">


// $( "#validate" ).submit(function( event ) {
//   event.preventDefault();
//   $('#message').html("<div class='bs-example'><div class='alert alert-danger fade in'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>Error ! Select a Profile Name</strong></div></div>");
  
// });

$('#countries').on('change', function() {
	
	if(this.value == "GB"){
  $('#state').prop('disabled', true);
  $('#state').val('');
  $("#state option[value='']").attr('selected', true)
  
	}else{
		 $('#state').prop('required',true);
		 $('#state').prop('disabled', false);
	}

}); 
  function profilechange(id){
	   $('#profilediv').show();
	  
    if(id > 0){
		clearProfile();
		 $('#regwait').show();
    var token = $('#token').val();
$.ajax({
            type: 'post',
            data: {'id': id,'_token':token},
            url: 'profile/getProfile',
            dataType: 'json',
            success: function(res){
				$('#regwait').hide();
                $('#id').val(res.id);
                $('#fname').val(res.delivery_fname);
                $('#lname').val(res.delivery_lname);
                $('#address1').val(res.delivery_address1);
                $('#address2').val(res.delivery_address2);
                $('#city').val(res.delivery_city);
                $('#state').val(res.delivery_state);
                $('#zip').val(res.delivery_zip);
                $('#countries').val(res.delivery_country);
                $('#phone').val(res.delivery_phone);
                $('#paymentemail').val(res.payment_email);
                $('#cardtype').val(res.payment_card_type);
                $('#expmon').val(res.payment_expmon);
                $('#expyear').val(res.payment_expyear);
                $('#cardnumber').val(res.payment_cardno);
                $('#cvv').val(res.payment_cvv);
                $('#profilename').val(res.profile_name);
            },
            error: function(res){
                  $('#message').html("<div class='bs-example'><div class='alert alert-danger fade in'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>Error ! Select a Profile Name</strong></div></div>");
            }
        });
	} else{
		clearProfile();
		$('#message').html("<div class='bs-example'><div class='alert alert-danger fade in'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>Error ! Select a Profile Name</strong></div></div>");
		
	}

}  
 function profiledelete(){
    var id= $(".profile option:selected").val();
    var token = $('#token').val();
$.ajax({
            type: 'post',
            data: {'id': id,'_token':token},
            url: 'profile/delProfile',
            dataType: 'json',
            success: function(res){

              if(res==1){
                 $('#message').html("<div class='bs-example'><div class='alert alert-success fade in'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>Profile Successfully Deleted</strong></div></div>");
                 setTimeout("location.reload()",2000); 

              }
            },
            error: function(res){
				clearProfile();
                $('#message').html("<div class='bs-example'><div class='alert alert-danger fade in'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>Error ! Select a Profile Name</strong></div></div>");
            }
        });

} 
var count=0;
function newProfile(limit){

  var used=$('#usedprofile').val();

count +=1;
if(limit == used){

$("#newid").css("display", "none");

}
else {
 // var token = $('#token').val();
 // $.ajax({
            // type: 'post',
            // data: {'_token':token,'count':count},
            // url: 'profile/insertProfile',
            // dataType: 'json',
            // success: function(res){

              // if(res==1){
                 // $('#message').html("<div class='bs-example'><div class='alert alert-success fade in'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>Profile Successfully Inserted</strong></div></div>");
                 // setTimeout("location.reload()",3000); 

              // }
            // },
            // error: function(res){
                // $('#message').html("<div class='alert alert-danger fade in'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>Error ! Profile Not Inserted</strong></div>");
            // }
        // });
		clearProfile();
		$('#profilediv').show();

}

}

function clearProfile(){

              $('#id').val('');
              $('#fname').val('');
                $('#lname').val('');
                $('#address1').val('');
                $('#address2').val('');
                $('#city').val('');
                $('#state').val('');
                $('#zip').val('');
                $('#countries').val('');
                $('#phone').val('');
                $('#paymentemail').val('');
                $('#cardtype').val('');
                $('#expmon').val('');
                $('#expyear').val('');
                $('#cardnumber').val('');
                $('#cvv').val('');
                $('#profilename').val('');



}

</script>
@endsection