@extends('front.layout.head')
@section('description')
This is Personal Details
@endsection
@section('title')
BotIntel
@endsection
@section('contents')
<!-- // being slider -->
<!-- // being slider -->
<div id="hero-banner" class="banner-inner">
  <div class="jumbotron">
  <div class="container">
    <div class="slide-text wow fadeInUp" >
      @if($pagedetails)  
    <h6>{{$Title[0]}}</h6>
    <h2>{{$Title[1]}}</h2>
     <h6>{{$Title[2]}}</h6>
     @else
      <h2>No Page Found</h2>
     @endif
</div>
  </div>
</div>
</div>
<!-- // end slider -->
<section id="pages" class="privacy-pages">
<div class="container">
  <div class="row">
      <div class="col-sm-12">

    <h3>{{$pagedetails->page_name}}</h3>
 {!! $pagedetails->page_content !!}
  </div>
  </div>
</div>
</section>
@endsection