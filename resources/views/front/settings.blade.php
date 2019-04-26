@extends('front.layout.head')
@section('description')
This is Personal Details
@endsection
@section('title')
BotIntel
@endsection
@section('contents')
<style type="text/css">
  .error{
    color:red;
    font-size: 10px;
  }
</style>
<!-- // being slider -->
<div id="hero-banner" class="banner-inner">
  <div class="jumbotron">
  <div class="container">
      <div id="message"></div>
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
    <h6>Account</h6>
    <h2>Settings</h2>
</div>
  </div>
</div>
</div>
<!-- // end slider -->
<section id="pages">
  <div class="container form-bg">

    <div class="row">
     <div class="col-md-12">
        <h2 class="page-heading">Personal Information</h2>
     </div>
    </div>
    <div class="row ">
      <div class="personal-info">

    <form action="{{url('settingssubmit')}}" id="settingsform" method="POST">
      @csrf

      <div class="col-md-6">
           <!-- // being form name -->
            <div class="form-group">
      <input type="text" required="" placeholder="Full Name" id="fullname" value="{{$userdetails->full_name}}" name="fullname" class="form-control"></div>
           <!-- // end form name -->
            <!-- // being form gender -->
            <div class="form-group">
     <div class="gender">
       <label id="g-head">Gender</label>
<label class="container-radio">Male
  <input type="radio" required @if($userdetails->gender=="Male") checked @endif;  value="Male"  name="gender">
  <span class="checkmark"></span>
</label>
<label class="container-radio">Female
  <input type="radio" required @if($userdetails->gender=="Female") checked @endif; value="Female"   name="gender">
  <span class="checkmark"></span>
</label>
     </div>
      </div>
           <!-- // end form gender -->
            <!-- // being form language -->
      <div class="form-group">
      <select name="language" required="" id="language" class="form-control">
   <option  value="">Language</option>
  <option @if($userdetails->language=="AF") selected @endif; value="AF">Afrikanns</option>
  <option @if($userdetails->language=="SQ") selected @endif; value="SQ">Albanian</option>
  <option @if($userdetails->language=="AR") selected @endif; value="AR">Arabic</option>
  <option @if($userdetails->language=="HY") selected @endif; value="HY">Armenian</option>
  <option @if($userdetails->language=="EU") selected @endif; value="EU">Basque</option>
  <option @if($userdetails->language=="BN") selected @endif; value="BN">Bengali</option>
  <option @if($userdetails->language=="BG") selected @endif; value="BG">Bulgarian</option>
  <option @if($userdetails->language=="DA") selected @endif; value="DA">Danish</option>
  <option @if($userdetails->language=="NL") selected @endif; value="NL">Dutch</option>
  <option @if($userdetails->language=="EN") selected @endif; value="EN">English</option>
  <option @if($userdetails->language=="ET") selected @endif; value="ET">Estonian</option>
  <option @if($userdetails->language=="FJ") selected @endif; value="FJ">Fiji</option>
  <option @if($userdetails->language=="IT") selected @endif; value="IT">Italian</option>
  <option @if($userdetails->language=="JA") selected @endif; value="JA">Japanese</option>
  <option @if($userdetails->language=="JW") selected @endif; value="JW">Javanese</option>
  <option @if($userdetails->language=="KO") selected @endif; value="KO">Korean</option>
  <option @if($userdetails->language=="LA") selected @endif; value="LA">Latin</option>
  <option @if($userdetails->language=="LV") selected @endif; value="LV">Latvian</option>
  
      </select>
    </div>
           <!-- // end form language -->
            <!-- // being form timezone -->
      <div class="form-group">
      <select name="timezone" required="" id="timezone" class="form-control">
        <option value="">Time Zone</option>
          <option  @if($userdetails->timezone=="(GMT -5:00) Eastern Time (US & Canada), Bogota, Lima") selected @endif; value="(GMT -5:00) Eastern Time (US & Canada), Bogota, Lima">(GMT -5:00) Eastern Time (US & Canada), Bogota, Lima</option>
          
          <option @if($userdetails->timezone=="(GMT -8:00) Pacific Time (US & Canada)") selected @endif; value="(GMT -8:00) Pacific Time (US & Canada)">(GMT -8:00) Pacific Time (US & Canada)</option>
          <option @if($userdetails->timezone=="(GMT -9:00) Alaska") selected @endif; value="(GMT -9:00) Alaska">(GMT -9:00) Alaska</option>
          <option value="">--------------</option>
          <option @if($userdetails->timezone=="(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi") selected @endif; value="(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi">(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi</option>
          <option @if($userdetails->timezone=="(GMT +4:30) Kabul") selected @endif; value="(GMT +4:30) Kabul">(GMT +4:30) Kabul</option>
          
          <option @if($userdetails->timezone=="(GMT +5:45) Kathmandu, Pokhara") selected @endif; value="(GMT +5:45) Kathmandu, Pokhara">(GMT +5:45) Kathmandu, Pokhara</option>
          <option @if($userdetails->timezone=="(GMT +6:00) Almaty, Dhaka, Colombo") selected @endif; value="(GMT +6:00) Almaty, Dhaka, Colombo">(GMT +6:00) Almaty, Dhaka, Colombo</option>
         
      </select> </div>
      <div class="form-group btn-row">
        <button class="btn btn-primary" type="submit">Save</button>
       
        <button class="btn btn-default t" type="button" id="configreset" >Clear</button>
      
      </div>
   
           <!-- // end form timezone -->

     

    </div>
    <div class="col-md-6">
        <!-- // being form nickname -->
            <div class="form-group">
      <input type="text" required="" id="nickname" placeholder="Nick Name" value="{{$userdetails->nick_name}}" name="nickname" class="form-control"></div>
           <!-- // end form nickname -->
             <!-- // being form contact  -->
            <div class="form-group">
      <input type="text" required="" id="phone" placeholder="Contact Details" value="{{$userdetails->phone}}" name="phone" class="form-control"></div>
           <!-- // end form contact -->
            <!-- // being form country  -->
            <div class="form-group">
     <select name="countries" required id="countries" class="form-control">
      <option value="">Country</option>
  <option @if($userdetails->country=="US") selected @endif; value="United States of America">United States of America</option> 
  <option @if($userdetails->country=="AU") selected @endif;  value="AU">Australia</option> 
  <option @if($userdetails->country=="CA") selected @endif; value="CA">Canada</option> 
  <option @if($userdetails->country=="GB") selected @endif; value="GB">United Kingdom</option> 
  <option @if($userdetails->country=="DE") selected @endif; value="DE">Germany</option> 
  <option @if($userdetails->country=="DK") selected @endif; value="DK">Denmark</option> 
  <option @if($userdetails->country=="FR") selected @endif; value="FR">France</option> 
  <option @if($userdetails->country=="IT") selected @endif; value="IT">Italy</option> 
  <option @if($userdetails->country=="NL") selected @endif; value="NL">Netherlands</option> 
  <option @if($userdetails->country=="RU") selected @endif;  value="RU">Russia</option> 

  
</select>
    </div>
           <!-- // end form country -->

           

      </div>

   
</form>

    </div>


   </div>
    <div class="row">
     <div class="col-md-12">
        <h2 class="page-heading">Membership Plan</h2>
     </div>
    </div>
    <div class="row">
      <form action="{{url('settings/upgrade')}}" id="upgradeform" method="POST">
        <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
      <div class="col-md-12 member-plane">
      <ul class="list-inline">
        <li class="col-md-4"><h4>Membership Package:</h4></li>
        <li class="col-md-4">
              @if($userdetails->subscription_id!=0 && $userdetails->subscription_active!=0)
          <select class="form-control" name="subscription">
            @foreach($subscription as $subs)
            <option @if($userdetails->subscription_id==$subs->id) selected @endif; value="{{$subs->id}}">{{$subs->subscription_name}}</option>
            @endforeach
          </select>
          @else 
          <input type="text" class="form-control" value="Cancelled" disabled="">
          @endif
        </li>
        <li class="col-md-4">
          @if($userdetails->subscription_id!=0 && $userdetails->subscription_active!=0)
          <button type="submit" name="upgrade"   class="btn btn-primary">Upgrade</button>
             <button type="button" onclick="cancelplan()"  class="btn btn-default">Cancel</button>
             @endif
        </li>
      </ul>
      </div>
      </form>
    </div>
     <div class="row">
     <div class="col-md-12">
        <h2 class="page-heading">Reset Password</h2>
     </div>
    </div>
    <div class="row">
      <form action="{{url('changepasswordsubmit')}}" id="changepassForm" name="changepassForm" method="POST"> 
        @csrf
      <div class="col-md-6">
           <!-- // being form password -->
            <div class="form-group">
      <input type="password"  placeholder="Password" value="" name="password" id="password" class="form-control"></div>
           <!-- // end form password -->
             <!-- // being form new password -->
            <div class="form-group">
      <input type="password" placeholder="New Password" value="" name="npassword" id="npassword" class="form-control"></div>
           <!-- // end form new password -->
             <!-- // being form confirm password -->
            <div class="form-group">
      <input type="password" placeholder="Confirm Password" value="" name="cpassword" id="cpassword" class="form-control"></div>
           <!-- // end form confirm password -->
      <div class="form-group btn-row">
        <button class="btn btn-primary" type="submit" onclick="validatePassword()" >Submit</button>
        
      </div>
      </div>
    </form>
      </div>
    </div>
    
  </div>
</section>
<script type="text/javascript">
    function validatePassword(){
  $("#changepassForm").validate({
      rules: {
        password:"required",
        npassword: {minlength:6, equalTo: "#cpassword"}
      },
      messages: {
        npassword: { minlength:"Minimum 6 characters", equalTo: "Passwords donot match"}
      }
    });
}

$("#upgradeform").submit(function() {
    if(confirm("Are you sure you want to upgrade this plan?")){
    }
    else{
        return false;
    }
});

function cancelplan(){
var sub= $('[name=subscription]').val();
 var token = $('#token').val();
  if(confirm("Are you sure you want to cancel this plan?")){
    
 $.ajax({
            type: 'post',
            data: {'_token':token,'sub':sub},
            url: 'settings/cancel',
            dataType: 'json',
            success: function(res){

              if(res==1){
                 $('#message').html("<div class='bs-example'><div class='alert alert-success fade in'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>Plan Successfully Cancelled</strong></div></div>");
                 setTimeout("location.reload()",5000); 
         

              }
            },
            error: function(res){
              $('#message').html("<div class='bs-example'><div class='alert alert-danger fade in'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>"+res+"</strong></div></div>");
               
            }
        });
 }
    else{
        return false;
    }

}
</script>
@endsection
