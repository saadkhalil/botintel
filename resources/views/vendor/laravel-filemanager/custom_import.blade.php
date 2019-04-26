<!-- First, extends to the CRUDBooster Layout -->
@extends('crudbooster::admin_template')
@section('content')
  <!-- Your html goes here -->
  <div class='panel panel-default'>


    <div class='panel-heading'><strong><i class="fa fa-dollar"></i> Import File</strong></div>


    <div class='panel-body'>
	<form action="{{url('admin/successorders/submitimport')}}" enctype="multipart/form-data" method="post" >
	@csrf
		@if(session()->has('message'))
		<div class="bs-example">
		<div class="alert alert-success fade in">
		<a href="#" class="close" data-dismiss="alert">&times;</a>
		{{ session()->get('message') }}
		</div>
		</div>

		@endif 
		@if(session()->has('error'))
		<div class="bs-example">
		<div class="alert alert-danger fade in">
		<a href="#" class="close" data-dismiss="alert">&times;</a>
		{{ session()->get('error') }}
		</div>
		</div>
		@endif 
      <div class="box-body" id="parent-form-area">
     <div class="col-md-6"> 
	 <div class="form-group">
                        <label>File XLS </label>
						
                        <input type="file" name="xlsfile"   class="form-control" required="">	
                        <div class="help-block">File type supported only : XLS</div>
                    </div>
     </div>
        </div>
		<div class="box-footer">
                    <div class="pull-right">
                        <a href="{{url('/admin/successful_orders')}}" class="btn btn-default">Cancel</a>
                        <input type="submit" class="btn btn-primary" name="submit" value="Upload">
                    </div>
                </div>
        <!-- etc .... -->
        
      </form>
    </div>

  </div>

@endsection