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
         <div class="slide-text wow fadeInUp" >
            <h6>Your</h6>
            <h2>Tasks</h2>
         </div>
      </div>
   </div>
</div>
<!-- // end slider -->
<section id="pages" class="task-pages">
   <div class="container form-bg">
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
      <div class="row">
         <div class="col-md-12">
            <h2 class="page-heading"> {{$subscription->number_of_profiles}} - TASKS </h2> <small> <span id="remainingtasks"></span> task(s) remaining </small><br><br>
         </div>
      </div>
      <form id="taskform"  method="POST" >
         <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
         <div class="row ">
            <div class="task-one" id="task_add" >				
            </div>
         </div>
         <div id="task_error"></div>
         <div class="row">
            <div class="col-md-12">
               <input type="hidden" id="counter" value="1">
               <div class="form-group btn-row tasks-btn" style="display: inline-flex;">
                  <input type="hidden" id="subscribeplan" value="{{$subscription->number_of_profiles}}">
                  <input type="hidden" id="usertasksdone" value="{{$usertasksdone}}">
                  @if($subscription->number_of_profiles > $usertasksdone)
                  <button type="button" onclick="Addrow({{$subscription->number_of_profiles}},{{$usertasksdone}})" class="btn btn-default btn-circle btn-lg addbutton" data-toggle="tooltip" data-placement="right" ><i class="glyphicon glyphicon-plus"></i></button>
                  @endif
                  <button class="btn btn-primary" style="background:#00bcd4;" type="button" onclick="submitall()">SUBMIT ALL</button>
                  <button class="btn btn-primary" type="button" onclick="unsubmitall()">UNSUBMIT ALL</button>
               </div>
            </div>
         </div>
      </form>
   </div>
</section>
<script src="{{asset('front/js/countdown.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function(){
	var sub = $('#subscribeplan').val(); // max task limit
	var usertask = $('#usertasksdone').val();	// total tasks in db
	var tasks = getCookie("tasks");	
	var counter = $("select[name='release[]']").length;
	var totalremaining = parseInt(sub) - parseInt(usertask);
	var tot =  parseInt(totalremaining) - parseInt(counter + 1);
	$('#remainingtasks').html(tot);
	$.get('tasks/getcookiedata', {
		tasks: tasks
	}, function (response) {
		$("#task_add").append(response);
		countdown(1);
	}, "json");
  });

  $(document).on('click','.btn-ins',function(){
	var subarr = [];
	$(this).parent().parent().find('select').each(function(){
		subarr.push($(this).val());
    });
	var dltbtn=$(this).parent().find('.btn-dlt');
	var token = $('#token').val();
	$.ajax({
		type: 'post',
		data: {'_token': token,'release':subarr[0],'size':subarr[1],'profile':subarr[2]},
		url: 'tasks/newTask',
		dataType: 'json',
		success: function (res) {
			dltbtn.trigger('click');
			$('#task_error').html("<div class='alert alert-success fade in'><a href='#' class='close' data-dismiss='alert'>×</a><strong>New Task added</strong></div>");
			window.setTimeout(function(){location.reload()},1000)
		},
		error: function (res) {
			$('#task_error').html("<div class='alert alert-danger fade in'><a href='#' class='close' data-dismiss='alert'>×</a><strong>Error ! Submitting task</strong></div>");
		}
	});
  });

  $(document).on('click','.btn-upd',function(){ 
	var subarr = [];
	$(this).parent().parent().find('select').each(function(){
		subarr.push($(this).val());
    });
	var tid=$(this).data('tid');
	var token = $('#token').val();
	$.ajax({
		type: 'post',
		data: {'_token': token,'release':subarr[0],'size':subarr[1],'profile':subarr[2],id:tid},
		url: 'tasks/upTask',
		dataType: 'json',
		success: function (res) {
			$('#task_error').html("<div class='alert alert-success fade in'><a href='#' class='close' data-dismiss='alert'>×</a><strong>Task Updated!</strong></div>");
		},
		error: function (res) {
			$('#task_error').html("<div class='alert alert-danger fade in'><a href='#' class='close' data-dismiss='alert'>×</a><strong>Error ! Updating task</strong></div>");
		}
	});
  });

  function unsubmitall(){
	 if(confirm("Are you sure you want unsubmit all tasks ?")){
        document.cookie = "tasks=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
	$.ajax({
		type: 'get',
		url: 'tasks/deletealltasks',
		dataType: 'json',
		success: function (res) {
			$('#task_error').html("<div class='alert alert-success fade in'><a href='#' class='close' data-dismiss='alert'>×</a><strong>Tasks Unsubmitted!</strong></div>");
			window.setTimeout(function(){location.reload()},1000)
		},
		error: function (res) {
			$('#task_error').html("<div class='alert alert-danger fade in'><a href='#' class='close' data-dismiss='alert'>×</a><strong>Error ! Unsubmitting task</strong></div>");
		}
	});
    }
    else{
        return false;
    }
	
  }

  function submitall(){
	var form_data=$("#taskform").serialize();
	document.cookie = "tasks=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
	$.ajax({
		type: 'post',
		url: 'tasks/submit',
		data: form_data,
		dataType: 'json',
		success: function (res) {
			$('#task_error').html("<div class='alert alert-success fade in'><a href='#' class='close' data-dismiss='alert'>×</a><strong>Tasks Successfully Submitted!</strong></div>");
			window.setTimeout(function(){location.reload()},1000)
		},
		error: function (res) {
			$('#task_error').html("<div class='alert alert-danger fade in'><a href='#' class='close' data-dismiss='alert'>×</a><strong>Error ! Submitting tasks</strong></div>");
		}
	});
  }

  function countdown(check){
	  
	$('[data-countdown]').each(function() {
	  var finalDate = $(this).data('countdown');
	  $(this).countdown(finalDate, function(event) {
		 
		if(event.strftime('%D d %H h %M m %S s') == '00 d 00 h 00 m 00 s' && check==1){
			location.reload();
		}
		else{
			$(this).html($(this).data('text') + ' ' + event.strftime('%D d %H h %M m %S s'));
		}
		 
	  });
	});
  }

  function Addrow(tasks,used){
	var counter = $("select[name='release[]']").length;
	var totalremaining = parseInt(tasks) - parseInt(used);
	var tot =  parseInt(totalremaining) - parseInt(counter + 1);
	$('#remainingtasks').html(tot);
	if (totalremaining <= counter + 1) {
		$(".addbutton").css("display", "none");
		
	}
	var token = $('#token').val();
	$.ajax({
		type: 'post',
		data: {
			'_token': token
		},
		url: 'tasks/getData',
		dataType: 'json',
		success: function (res) {
			if (res) {
				$("#task_add").append(res);
				countdown(0);
			}
		},
		error: function (res) {
			$('#task_error').append("<div class='alert alert-danger fade in'><a href='#' class='close' data-dismiss='alert'>×</a><strong>Error ! Records Not Found</strong></div>");
		}
	});
  }

  function delgRow(objx, used, tasks){
	var counter = $("select[name='release[]']").length;
	var totalremaining = parseInt(tasks) - parseInt(used);
	var tot =  parseInt(totalremaining) - parseInt(counter - 1);
	$('#remainingtasks').html(tot);
	var taskid=$(objx).data('taskid');
	var token = $('#token').val();
	if(taskid){
		$.ajax({
			type: 'post',
			data: {'_token': token,'task_id':taskid},
			url: 'tasks/delTask',
			dataType: 'json',
			success: function (res) {
				$('#task_error').html("<div class='alert alert-success fade in'><a href='#' class='close' data-dismiss='alert'>×</a><strong>Task Deleted!</strong></div>");
				   window.setTimeout(function(){location.reload()},1000)
			},
			error: function (res) {
				$('#task_error').html("<div class='alert alert-danger fade in'><a href='#' class='close' data-dismiss='alert'>×</a><strong>Error ! Deleting task</strong></div>");
			}
	    });
	}
	
	if (totalremaining <= counter) {
		$(".addbutton").css("display", "block");
	
	}
	var counter = parseInt(counter) - 1;
	document.getElementById('counter').value = counter;
	$(objx).parent('div').parent('div').remove();
	taskchange();
  }

  function setCookie(cname, cvalue, exdays) {
	var d = new Date();
	d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
	var expires = "expires=" + d.toGMTString();
	document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }

  function getCookie(cname) {
	var name = cname + "=";
	var decodedCookie = decodeURIComponent(document.cookie);
	var ca = decodedCookie.split(';');
	for (var i = 0; i < ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) == ' ') {
			c = c.substring(1);
		}
		if (c.indexOf(name) == 0) {
			return c.substring(name.length, c.length);
		}
	}
	return "";
  }

  function taskchange() {
	var form = $("#taskform");
	$.ajax({
		type: "POST",
		url: 'tasks/cookie',
		data: form.serialize(),
		success: function (response) {
			setCookie("tasks", response, 365);
		}
	});
  }
</script>
@endsection