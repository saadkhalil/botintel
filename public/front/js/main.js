// -------------------------------------------------------------
    // bootstrap dropdown hover menu setup
    // -------------------------------------------------------------		

$('ul.nav li.dropdown').hover(function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).slideDown(400);
      $('span', this).toggleClass("caret caret-up");  
}, function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).slideUp(400);
$('span', this).toggleClass("caret caret-up");  
});
$('.dropdown-toggle').removeAttr('data-toggle');

// -------------------------------------------------------------
    // WOW setup
    // -------------------------------------------------------------		

jQuery(function ($) {
      var wow = new WOW({
      mobile:       false
      });
      wow.init();
    }());

// -------------------------------------------------------------
    // date  setup
    // -------------------------------------------------------------
    var d = new Date();
    var n = d.getFullYear();
    document.getElementById("date-year").innerHTML = n;
   // -------------------------------------------------------------
    // Modal Animation  setup
    //  
    $(".modal").each(function(l){$(this).on("show.bs.modal",function(l){var o=$(this).attr("data-easein");"shake"==o?$(".modal-dialog").velocity("callout."+o):"pulse"==o?$(".modal-dialog").velocity("callout."+o):"tada"==o?$(".modal-dialog").velocity("callout."+o):"flash"==o?$(".modal-dialog").velocity("callout."+o):"bounce"==o?$(".modal-dialog").velocity("callout."+o):"swing"==o?$(".modal-dialog").velocity("callout."+o):$(".modal-dialog").velocity("transition."+o)})});
// -------------------------------------------------------------
    // Filter Button  setup
    // 
  $(document).ready(function(){

    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');
        if(value == "all")
        {
            //$('.filter').removeClass('hidden');
            $('.filter').show('1000');
        }
        else
        {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
            
        }
    });

    
    if ($(".filter-button").removeClass("active")) {
$(this).removeClass("active");
}
$(this).addClass("active");

})
// -------------------------------------------------------------
    // Tooltip setup
    // 

  $(function () {
  $('[data-toggle="tooltip"]').tooltip()
});

$(document).ready(function(){
     
    // $("#us").click(function(){
 
    //    var active = $(this).addClass('selected');
     
    // });
    //  $("#eu").click(function(){
    //    var active = $(this).addClass('selected');

    // });
    //  $("#nike").click(function(){
    //    var active = $(this).addClass('selected');
    // });
    //    $("#adidas").click(function(){
    //    var active = $(this).addClass('selected');
    //    $('#nike').removeClass('selected');
    // });
 $(".filter-button").click(function(){
 
   var eu = $('#eu').val();
   var us = $('#us').val();
   var nike = $('#nike').val();
   var adidas = $('#adidas').val();
      
   var filterform= $('#filterform').serialize();

     $.ajax({
            type: 'get',
            data: filterform,
            url: 'releases/checkRelease',
            dataType: 'json',
            success: function(res){
           
              if(res){
                $.each( res, function( key, value ) {
					
                    $("#releaseview").append('<div  class="col-sm-4 col-md-4 filter releaserecord" ><div class="thumbnail"><img src="'+value.release_image+'" alt="img-01"><div class="caption"><p>Name: '+value.release_name+'</p><p>SKU: '+value.release_code+'</p><p>Release Date: '+value.release_date+' PST<p>Submission Time: <span class="demo" id="st'+value.id+'" data-countdown="'+value.sub_time+'"></span></p><div class="caption-hover"><p>Description: '+value.release_description+'</p></div></div></div></div></div>'); 
					
                });
				 countdown();
              }
            },
            error: function(res){
                $('#message').html("<div class='alert alert-danger fade in'><a href='#' class='close' data-dismiss='alert'>&times;</a><strong>Error ! Records Not Found</strong></div>");
            }
        });


     
    });

    
 $('#configreset').click(function(){
       
        $('#fullname').val('');
        $('#phone').val('');
        $('#timezone').val('');
        $('#countries').val('');
        $('#nickname').val('');
        $('#language').val('');
        $("input:radio").removeAttr("checked");

  });


 
 $('#packageBox1').click(function() {
       if($(this).attr('id') == 'packageBox1') {
           //alert($(this).attr('id'));
           $('#packageBox1').addClass('checked-selected');
           $('#packageBox2').removeClass('checked-selected');
             $('#packageBox3').removeClass('checked-selected');
       }

       
   });
   
    $('#packageBox2').click(function() {
       if($(this).attr('id') == 'packageBox2') {
          // alert($(this).attr('id'));
           $('#packageBox2').addClass('checked-selected');
            $('#packageBox1').removeClass('checked-selected');
             $('#packageBox3').removeClass('checked-selected');
       }

       
   });
      $('#packageBox3').click(function() {
       if($(this).attr('id') == 'packageBox3') {
           //alert($(this).attr('id'));
           $('#packageBox3').addClass('checked-selected');
            $('#packageBox1').removeClass('checked-selected');
             $('#packageBox2').removeClass('checked-selected');
       }

       
   });
/*    $(function(){
  $('#packageBox1').click(function(){
    alert($(this).val());
      if($(this).val() == 'packageBox1'){
      $('.payment').addClass('checked-selected');
      }
    
  });
  
  
});*/
    
});