@extends('front.layout.head')
@section('description')
This is Personal Details
@endsection
@section('title')
BotIntel
@endsection
@section('contents')
<!-- // being slider -->
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
    <h6>UPCOMING</h6>
    <h2>RELEASES</h2>
    <form id="filterform" >
    <div class="btn-row">
        
         <label class="container-checkbox release-checkbox ">
        
       <input type="radio" class="filter-button" data-filter="us"  checked   value="US" id="us" name="country[]">
       <span class="checkmark"></span><label for="us" class="release-label">US</label>
       </label>
         <label class="container-checkbox release-checkbox ">
         <input type="radio" class="filter-button"  data-filter="eu"    value="EU" id="eu" name="country[]">
         <span class="checkmark"></span><label for="eu" class="release-label">EU</label>
         </label>
    </div>
    <div class="btn-row">
          <label class="container-checkbox release-checkbox ">
      <input type="radio" class="btn btn-default btn-child1  filter-button"  data-filter="nike"   value="1" id="nike" name="brand[]">
      <span class="checkmark"></span><label for="nike" class="release-label">Nike</label>
         </label>
          <label class="container-checkbox release-checkbox ">
        <input type="radio" class="btn btn-default btn-child2  filter-button" checked data-filter="adidas" value="2" id="adidas" name="brand[]">
         <span class="checkmark"></span><label for="adidas"  class="release-label">Adidas</label>
         </label>
    </div>
  </form>
</div>
  </div>
</div>
</div>
<!-- // end slider -->
<section id="pages">
  <div class="container release-listing-view">
    <!-- // being row -->
  <div class="row" id="releaseview"  >
     <!--  // being single column -->
@foreach($releases as $releasedd)
  <div  class="col-sm-4 col-md-4 filter releaserecord" >
     <!--  // being thumbnail -->

    <div class="thumbnail">
      <img src="{{$releasedd->release_image}}"  title="{{$releasedd->release_image}}" alt="{{$releasedd->release_image}}">
    
    
    <!--  // being caption -->
      <div class="caption">
           <p>Name: {{$releasedd->release_name}}</p>
<p>SKU: {{$releasedd->release_code}}</p>
<p>Release Date: {{ date('d/m/Y | ha', strtotime($releasedd->release_date))}} PST

<p>Submission Time:  <span class="demo" id="st{{$releasedd->id}}" data-countdown="{{$releasedd->sub_time}}"></span></p>
       <!-- //being hover -->
<div class="caption-hover">
<p>Description: {{$releasedd->release_description}},</p>
</div>
<!-- // end hover -->
    </div>
       <!-- // end caption -->
  </div>
    </div>
    @endforeach
  <!-- // end thumbnail -->


</div>
<!-- // end row -->
 <!-- // being row -->
 


  </div>
</section>
<script src="https://cdn.rawgit.com/hilios/jQuery.countdown/2.0.4/dist/jquery.countdown.min.js"></script>
<script>
var rid=$('#rid').val();
$(function(){
   countdown();
});
function countdown(){
	 $('[data-countdown]').each(function() {
   var $this = $(this), finalDate = $(this).data('countdown');
   $(this).countdown(finalDate, function(event) {
	   if(event.strftime('%D d %H h %M m %S s') == '00 d 00 h 00 m 00 s'){
			$(this).html('Not Available');
		}
		else{
     $(this).html(event.strftime('%D d %H h %M m %S s'));
		}
   });
 });
}



</script>
@endsection