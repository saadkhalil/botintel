@extends('front.layout.head')
@section('description')
This is Personal Details
@endsection
@section('title')
BotIntel
@endsection
@section('contents')
<!-- // being slider -->
<div id="hero-banner">
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
    <h2>Introducing Botintel</h2>
    <h6>The premiere cloud sneaker bot.</h6>
  <!-- <p>Anywhere in the world</p> -->
</div>
  <div id="form-inner" class="wow fadeInRight" >
  <a href="{{url('register')}}" class="btn btn-primary btn-lg" data-toggle="modal">Access Now </a>
  </div>
  </div>
</div>
</div>
<!-- // end slider -->
<!-- // being service -->
<section id="services">
  <div class="container">
    <div class="row">
      <div class="heading-section wow fadeInUp" >
      <h1 class="heading">Unlimited Power.</h1>
      <h4 class="sub-heading">Unlimited Performance.</h4>
      </div>
    </div>
    <!-- // being row -->
    <div class="row">
     <!-- // being single-service -->
      <div class="single-service  wow fadeInLeft">
        <div class="col-md-4 col-sm-4">
          <div class="thumbnail">
     <div class="icons"> <i class="icon-blazing"></i></div>
      <div class="caption">
        <h3>Blazing Fast</h3>
        <p>Multi-Threaded & Fully Cloud Based.</p>
      </div>
    </div>
        </div>
      </div>
     <!-- // end single-service -->
     <!-- // being single-service -->
      <div class="single-service  wow fadeInUp">
        <div class="col-md-4 col-sm-4">
          <div class="thumbnail">
       <div class="icons"> <i class="icon-support"></i></div>
      <div class="caption">
        <h3>Multi-Site Support</h3>
        <p>Full Support for Adidas & Nike.</p>
      </div>
    </div>
        </div>
      </div>
     <!-- // end single-service -->
     <!-- // being single-service -->
      <div class="single-service  wow fadeInRight">
        <div class="col-md-4 col-sm-4">
          <div class="thumbnail">
      <div class="icons"> <i class="icon-task"></i></div>
      <div class="caption">
        <h3>Unlimited Tasks</h3>
        <p>Our system automatically generates thousands of requests for each of your tasks.</p>
      </div>
    </div>
        </div>
      </div>
     <!-- // end single-service -->
    </div>
    <!-- // end row -->
    <!-- // being row -->
    <div class="row">
     <!-- // being single-service -->
      <div class="single-service  wow fadeInLeft">
        <div class="col-md-4 col-sm-4 ">
          <div class="thumbnail">
      <div class="icons"> <i class="icon-access"></i></div>
      <div class="caption">
        <h3>Access from Anywhere</h3>
        <p>Log-in to your bot from any browser,
anywhere in the world.</p>
      </div>
    </div>
        </div>
      </div>
     <!-- // end single-service -->
     <!-- // being single-service -->
      <div class="single-service   wow fadeInUp">
        <div class="col-md-4 col-sm-4">
          <div class="thumbnail">
       <div class="icons"> <i class="icon-intuitive"></i></div>
      <div class="caption">
        <h3>Intuitive UI</h3>
        <p>User friendly interface - Simple &
easy to use.</p>
      </div>
    </div>
        </div>
      </div>
     <!-- // end single-service -->
     <!-- // being single-service -->
      <div class="single-service  wow fadeInRight">
        <div class="col-md-4 col-sm-4">
          <div class="thumbnail">
      <div class="icons"> <i class="icon-proxies"></i></div>
      <div class="caption">
        <h3>No Proxies Required</h3>
        <p>All tasks are automatically provisioned unique IPs. No need to pay extra for proxies.</p>
      </div>
    </div>
        </div>
      </div>
     <!-- // end single-service -->
    </div>
    <!-- // end row -->

  </div>
</section>
<!-- // end service -->
<!-- // being showcase-blocks -->
<section id="showcase-blocks">
   <!-- // being row -->
    <div class="row gutter-0">
      <div class="col-md-6 col-sm-6 wow fadeInLeft"><img src="{{asset('front/img/show-case-image-1.png')}}" alt="show-case-image-1" class="img-responsive"></div>
      <div class="col-md-6 col-sm-6 wow fadeInRight">
        <div class="side-container">
        <div class="list-group">
  <div class="list-group-item">
    <h4 class="list-group-item-heading">Simple Setup.</h4>
    <p class="list-group-item-text">No more long and complicated release setups. Simply select
how many pairs you want and you’re done.
</p>

  </div>
   <div class="list-group-item">
    <h4 class="list-group-item-heading">Intelligent Release Detection.</h4>
    <p class="list-group-item-text">Your tasks are automatically run at release time. No need to stay
up waiting for drops.</p>
  </div>
</div>
</div>
      </div>
    </div>
   <!-- // end row -->
   <!-- // being row -->
    <div class="row gutter-0">
      
      <div class="col-md-6 col-sm-6 wow fadeInRight">
         <div class="side-container  pull-right">
        <div class="list-group text-right">
  <div class="list-group-item">
    <h4 class="list-group-item-heading">International Support.</h4>
    <p class="list-group-item-text">Full Support for US, EU, & GB Regions.
</p>

  </div>
   <div class="list-group-item">
    <h4 class="list-group-item-heading">Affordable Packages.</h4>
    <p class="list-group-item-text">Complete Access to all features - no commitment needed.</p>
  </div>
</div>
</div>
      </div>

      <div class="col-md-6 col-sm-6 wow fadeInLeft"><img src="{{asset('front/img/show-case-image-2.png')}}" alt="show-case-image-1" class="img-responsive gutter-0"></div>
    </div>
   <!-- // end row -->

</section>
<!-- // end showcase-blocks -->
<!-- // being bootom-form -->
<section id="bottom-form">
  <div class="container">
 
    <div class="row">

<!--    <h4 class="wow slideInUp">Log-in to your bot from any browser,  <br>-->
<!--anywhere in the world.</h4>-->

      <div class=" wow fadeInRight">
   <a href="{{url('register')}}" class="btn btn-primary btn-lg" data-toggle="modal">ACCESS NOW </a>
</div>
    </div>
  </div>
</section>
@endsection