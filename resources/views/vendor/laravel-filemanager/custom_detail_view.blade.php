<!-- First, extends to the CRUDBooster Layout -->
@extends('crudbooster::admin_template')
@section('content')
  <!-- Your html goes here -->
  <div class='panel panel-default'>
  <button type="button" onclick="generateexcel({{$row->tid}})" class="pull-right btn btn-primary btn-sm "> <i class="fa fa-file-excel-o"> </i>       Export to Excel</button>

    <div class='panel-heading'><strong><i class="fa fa-dollar"></i> Detail Task</strong></div>


    <div class='panel-body'>
      <div class="box-body" id="parent-form-area">
     <div class="col-md-6"> 
        <div class='form-group'> 
          <div class="col-md-3"> 
          <label>Profile Name</label>
           </div>
          <p>{{($row->profile_name)? $row->profile_name : 'null' }}</p>
        </div>
        <div class='form-group'> 
          <div class="col-md-3"> 
          <label>Release Name</label>
           </div>
          <p>{{($row->release_name)? $row->release_name : 'null' }}</p>
        </div>
         <div class='form-group'> 
          <div class="col-md-3"> 
          <label>Size Name</label>
           </div>
          <p>{{($row->size_name)? $row->size_name : 'null' }}</p>
        </div>
       <div class='form-group'> 
          <div class="col-md-3"> 
          <label>Status</label>
           </div>
          <p>{{($row->status==1)? 'Active' : 'InActive' }}</p>
        </div>
        </div>
        </div>
        <!-- etc .... -->
        
      </form>
    </div>

  </div>

@endsection