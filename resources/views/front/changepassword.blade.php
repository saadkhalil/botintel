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
    <h6>Change</h6>
    <h2>Password</h2>
</div>
  </div>
</div>
</div>
<!-- // end slider -->
<section id="pages">
  <div class="container form-bg">
<div class="row">
     <div class="col-md-12">
        <h2 class="page-heading">Reset Password</h2>
     </div>
    </div>
    <div class="row">
      <form action="{{url('passwordsubmit')}}" id="changepassForm" name="changepassForm" method="POST"> 
        @csrf
      <div class="col-md-6">
           <!-- // end form password -->
             <!-- // being form new password -->
            <div class="form-group">
      <input type="password" placeholder="New Password" value="" name="npassword" id="npassword" class="form-control"></div>
	  <input type="hidden" value="{{$token}}" name="remember_token">
           <!-- // end form new password -->
             <!-- // being form confirm password -->
            <div class="form-group">
      <input type="password" placeholder="Confirm Password" value="" name="cpassword" id="cpassword" class="form-control"></div>
           <!-- // end form confirm password -->
      <div class="form-group btn-row">
        <button class="btn btn-primary hvr-sweep-to-top" type="submit" onclick="validatePassword()" >Submit</button>
        
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

</script>
@endsection
