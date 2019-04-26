<?php namespace App\Http\Controllers;

	use Session;
	use Illuminate\Http\Request;
	use DB;
	use CRUDBooster;
	use App\Tasks;
	use Excel;
	use Illuminate\Support\Str;

	class AdminTasksController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "id";
			$this->limit = "20";
			$this->orderby = "id,desc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_bulk_action = true;
			$this->button_action_style = "button_icon";
			$this->button_add = true;
			$this->button_edit = true;
			$this->button_delete = true;
			$this->button_detail = true;
			$this->button_show = true;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "tasks";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"TasksID","name"=>"task_id"];
			$this->col[] = ["label"=>"Release","name"=>"release_id","join"=>"releases,release_name"];
			$this->col[] = ["label"=>"Size","name"=>"size_id","join"=>"sizes,size_name"];
			$this->col[] = ["label"=>"Profile","name"=>"profile_id","join"=>"profile,profile_name"];
			$this->col[] = ["label"=>"Email","name"=>"profile_id","join"=>"profile,user_id"];
			$this->col[] = ["label"=>"Successful Order","name"=>"successful","callback_php"=>'($row->successful == 1? "Yes" : "No")'];
			$this->col[] = ["label"=>"Status","name"=>"status","callback_php"=>'($row->status == 1? "Active" : "Inactive")'];
			$this->col[] = ["label"=>"Created At","name"=>"created_at","callback_php"=>'($row->created_at != "" ? date("jS M Y h:i A",strtotime($row->created_at)) : "")'];
			$this->col[] = ["label"=>"Last Updated","name"=>"updated_at","callback_php"=>'($row->updated_at != "" ? date("jS M Y h:i A",strtotime($row->updated_at)) : "")'];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Release','name'=>'release_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'releases,release_name'];
			$this->form[] = ['label'=>'Size','name'=>'size_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'sizes,size_name'];
			$this->form[] = ['label'=>'Profile','name'=>'profile_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'profile,profile_name'];
			$this->form[] = ['label'=>'Status','name'=>'status','type'=>'radio','validation'=>'required|integer|min:0','width'=>'col-sm-10','dataenum'=>'1|Yes;0|No'];
			$this->form[] = ['label'=>'Successful Order','name'=>'successful','type'=>'radio','validation'=>'required|integer|min:0','width'=>'col-sm-9','dataenum'=>'1|Yes;2|No;0|Pending'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'Release','name'=>'release_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'releases,release_name'];
			//$this->form[] = ['label'=>'Size','name'=>'size_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'sizes,size_name'];
			//$this->form[] = ['label'=>'Profile','name'=>'profile_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'profile,profile_name'];
			//$this->form[] = ['label'=>'Status','name'=>'status','type'=>'radio','validation'=>'required|integer|min:0','width'=>'col-sm-10','dataenum'=>'1|Yes;0|No'];
			//$this->form[] = ['label'=>'Successful Order','name'=>'successful','type'=>'radio','validation'=>'required|integer|min:0','width'=>'col-sm-9','dataenum'=>'1|Yes;0|Pending'];
			# OLD END FORM

			/* 
	        | ---------------------------------------------------------------------- 
	        | Sub Module
	        | ----------------------------------------------------------------------     
			| @label          = Label of action 
			| @path           = Path of sub module
			| @foreign_key 	  = foreign key of sub table/module
			| @button_color   = Bootstrap Class (primary,success,warning,danger)
			| @button_icon    = Font Awesome Class  
			| @parent_columns = Sparate with comma, e.g : name,created_at
	        | 
	        */
	        $this->sub_module = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Action Button / Menu
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @url         = Target URL, you can use field alias. e.g : [id], [name], [title], etc
	        | @icon        = Font awesome class icon. e.g : fa fa-bars
	        | @color 	   = Default is primary. (primary, warning, succecss, info)     
	        | @showIf 	   = If condition when action show. Use field alias. e.g : [id] == 1
	        | 
	        */
	        $this->addaction = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Button Selected
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @icon 	   = Icon from fontawesome
	        | @name 	   = Name of button 
	        | Then about the action, you should code at actionButtonSelected method 
	        | 
	        */
	        $this->button_selected = array();


	                
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add alert message to this module at overheader
	        | ----------------------------------------------------------------------     
	        | @message = Text of message 
	        | @type    = warning,success,danger,info        
	        | 
	        */
	        $this->alert        = array();
	                

	        
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add more button to header button 
	        | ----------------------------------------------------------------------     
	        | @label = Name of button 
	        | @url   = URL Target
	        | @icon  = Icon from Awesome.
	        | 
	        */
	        $this->index_button = array();
	          $this->index_button[] = ['label'=>'Export all to Excel','url'=>"javascript:;","icon"=>"fa fa-anchor" ];
	          $this->index_button[] = ['label'=>'Export','url'=>"javascript:;","icon"=>"fa fa-anchor"];



	        /* 
	        | ---------------------------------------------------------------------- 
	        | Customize Table Row Color
	        | ----------------------------------------------------------------------     
	        | @condition = If condition. You may use field alias. E.g : [id] == 1
	        | @color = Default is none. You can use bootstrap success,info,warning,danger,primary.        
	        | 
	        */
	        $this->table_row_color = array();     	          

	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | You may use this bellow array to add statistic at dashboard 
	        | ---------------------------------------------------------------------- 
	        | @label, @count, @icon, @color 
	        |
	        */
	        $this->index_statistic = array();



	        /*
	        | ---------------------------------------------------------------------- 
	        | Add javascript at body 
	        | ---------------------------------------------------------------------- 
	        | javascript code in the variable 
	        | $this->script_js = "function() { ... }";
	        |
	        */
	        $this->script_js = NULL;
	        
			$this->script_js="
			
					
					
	     		function generateexcel(id){
				window.location.replace(site_url+'/generateexcel/'+id);
				}

				
				$('#export').click(function() {
					
					var checkboxs=document.getElementsByClassName('checkbox');
					var okay=false;
					for(var i=0,l=checkboxs.length;i<l;i++)
					{
						if(checkboxs[i].checked)
						{
							okay=true;
							break;
						}
					}
    if(okay){	
		$('#form-table').attr('action','tasks/exporttasks');
				$('#form-table').submit();
				$('#form-table').attr('action','tasks/action-selected');
	}
    else {
		alert('Please check any tasks');
	}
			
				
				
				});



			
			$( '#export-all-to-excel' ).click(function() {
					var id=0;
				window.location.replace(site_url+'/generateexcel/'+id);
				});


	        ";



            /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code before index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it before index table
	        | $this->pre_index_html = "<p>test</p>";
	        |
	        */
	        $this->pre_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code after index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it after index table
	        | $this->post_index_html = "<p>test</p>";
	        |
	        */
	        $this->post_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include Javascript File 
	        | ---------------------------------------------------------------------- 
	        | URL of your javascript each array 
	        | $this->load_js[] = asset("myfile.js");
	        |
	        */
	        $this->load_js = array();
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Add css style at body 
	        | ---------------------------------------------------------------------- 
	        | css code in the variable 
	        | $this->style_css = ".style{....}";
	        |
	        */
	        $this->style_css = NULL;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include css File 
	        | ---------------------------------------------------------------------- 
	        | URL of your css each array 
	        | $this->load_css[] = asset("myfile.css");
	        |
	        */
	        $this->load_css = array();
	        
	        
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for button selected
	    | ---------------------------------------------------------------------- 
	    | @id_selected = the id selected
	    | @button_name = the name of button
	    |
	    */
	    public function actionButtonSelected($id_selected,$button_name) {
	        //Your code here
	            
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate query of index result 
	    | ---------------------------------------------------------------------- 
	    | @query = current sql query 
	    |
	    */
	    public function hook_query_index(&$query) {
	        //Your code here
	            
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate row of index table html 
	    | ---------------------------------------------------------------------- 
	    |
	    */    
	    public function hook_row_index($column_index,&$column_value) {
		
		
		if($column_index==5):
	    	    $column_value=CRUDBooster::first('users',['id'=>$column_value])->email;
	    	endif;
	    	//Your code here
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before add data is execute
	    | ---------------------------------------------------------------------- 
	    | @arr
	    |
	    */
	    public function hook_before_add(&$postdata) { 
       
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after add public static function called 
	    | ---------------------------------------------------------------------- 
	    | @id = last insert id
	    | 
	    */
	    public function hook_after_add($id) {     
				$taskid=strtoupper(Str::random(4)).''.$id;
				
			DB::table($this->table)->where('id',$id)->update(['task_id'=>$taskid]);
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before update data is execute
	    | ---------------------------------------------------------------------- 
	    | @postdata = input post data 
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_edit(&$postdata,$id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after edit public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_edit($id) {
	        //Your code here 

	    }
	    public function getDetail($id) {
  //Create an Auth

  if(!CRUDBooster::isRead() && $this->global_privilege==FALSE || $this->button_edit==FALSE) {    
    CRUDBooster::redirect(CRUDBooster::adminPath(),trans("crudbooster.denied_access"));
  }
  
  $data = [];
  $data['page_title'] = 'Detail Data';
  $data['row'] = DB::table('tasks')->select('tasks.id as tid','releases.release_name','profile.profile_name','sizes.size_name','tasks.status as status')
  ->Leftjoin('releases', 'releases.id', '=', 'tasks.release_id')
  ->Leftjoin('profile', 'profile.id', '=', 'tasks.profile_id')
  ->Leftjoin('sizes', 'sizes.id', '=', 'tasks.size_id')
  ->where('tasks.id',$id)->first();
  

  //Please use cbView method instead view method from laravel
$this->cbView('vendor.laravel-filemanager.custom_detail_view',$data);

}

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command before delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_delete($id) {
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_delete($id) {
	        //Your code here

	    }
	       public function generateExcel($id)
	    {
			
			if($id > 0){
	// $details = Tasks::select('profile.profile_name','users.email','releases.release_code','sizes.size_name','users.full_name','profile.delivery_address1','profile.delivery_address2','profile.delivery_city','profile.delivery_city','profile.delivery_state','profile.delivery_zip','profile.delivery_country','profile.delivery_phone','profile.payment_card_type','profile.payment_cardno','profile.payment_expmon','profile.payment_expyear','profile.payment_cvv')
            // ->Leftjoin('profile', 'profile.id', '=', 'tasks.profile_id')
            // ->Leftjoin('users', 'users.id', '=', 'profile.user_id')
            // ->Leftjoin('sizes', 'sizes.id', '=', 'tasks.size_id')
            // ->Leftjoin('releases', 'releases.id', '=', 'tasks.release_id')
            // ->where('tasks.id',$id)
            // ->get();
			
					$details = DB::select(DB::raw("SELECT  tasks.task_id,users.email,profile.profile_name,profile.payment_email,releases.release_code,sizes.size_name,profile.delivery_fname,profile.delivery_lname,profile.delivery_address1,profile.delivery_address2,profile.delivery_city,profile.delivery_city,profile.delivery_state,profile.delivery_zip,profile.delivery_country,profile.delivery_phone,profile.payment_card_type,profile.payment_cardno,profile.payment_expmon,profile.payment_expyear,profile.payment_cvv from tasks LEFT JOIN profile ON profile.id=tasks.profile_id LEFT JOIN users ON users.id=profile.user_id LEFT JOIN sizes ON sizes.id=tasks.size_id LEFT JOIN releases ON releases.id=tasks.release_id where tasks.id=$id"));
			}
			else{
					// $details = Tasks::select('profile.profile_name','users.email','releases.release_code','sizes.size_name','SUBSTRING_INDEX(full_name, ' ', 1)as Fname','profile.delivery_address1','profile.delivery_address2','profile.delivery_city','profile.delivery_city','profile.delivery_state','profile.delivery_zip','profile.delivery_country','profile.delivery_phone','profile.payment_card_type','profile.payment_cardno','profile.payment_expmon','profile.payment_expyear','profile.payment_cvv')
            // ->Leftjoin('profile', 'profile.id', '=', 'tasks.profile_id')
            // ->Leftjoin('users', 'users.id', '=', 'profile.user_id')
            // ->Leftjoin('sizes', 'sizes.id', '=', 'tasks.size_id')
            // ->Leftjoin('releases', 'releases.id', '=', 'tasks.release_id')
            // ->get();
			
			$details = DB::select(DB::raw("SELECT  tasks.task_id,users.email,profile.profile_name,profile.payment_email,releases.release_code,sizes.size_name,profile.delivery_fname,profile.delivery_lname,profile.delivery_address1,profile.delivery_address2,profile.delivery_city,profile.delivery_city,profile.delivery_state,profile.delivery_zip,profile.delivery_country,profile.delivery_phone,profile.payment_card_type,profile.payment_cardno,profile.payment_expmon,profile.payment_expyear,profile.payment_cvv from tasks LEFT JOIN profile ON profile.id=tasks.profile_id LEFT JOIN users ON users.id=profile.user_id LEFT JOIN sizes ON sizes.id=tasks.size_id LEFT JOIN releases ON releases.id=tasks.release_id"));
			
				
			}

              
        $detailsArray = []; 
        // Define the Excel spreadsheet headers
        $detailsArray[] = ['TaskID','AccountEmail','Profile Name','Email','PID','Size','First Name','Last Name','Address1','Address2','City','State','Zip','Country','Phone','Card Type','Card No','Expiration Month','Expiration Year','CVV'];

        
       foreach ($details as $detail) {
			$detail =  (array) $detail;
       	   $detailsArray[] = $detail;

       }
	 


        // Generate and return the spreadsheet
    Excel::create('tasks', function($excel) use ($detailsArray) {
        // Set the spreadsheet title, creator, and description
        $excel->setTitle('tasks');
        $excel->setCreator('botintel')->setCompany('FleekBiz');
        $excel->setDescription('tasks file');
        // Build the spreadsheet, passing in the payments array
        $excel->sheet('tasks', function($sheet) use ($detailsArray) {
            $sheet->fromArray($detailsArray, null, 'A1', false, false);
        });
    })->download('xlsx');    


	    }
	public function exporttasks(Request $request){
			
				
				$checkboxs=$request->input('checkbox');
		
				$check=implode(',',$checkboxs);
		
			
				$details = DB::select(DB::raw("SELECT tasks.task_id,users.email,profile.profile_name,profile.payment_email,releases.release_code,sizes.size_name,profile.delivery_fname,profile.delivery_lname,profile.delivery_address1,profile.delivery_address2,profile.delivery_city,profile.delivery_city,profile.delivery_state,profile.delivery_zip,profile.delivery_country,profile.delivery_phone,profile.payment_card_type,profile.payment_cardno,profile.payment_expmon,profile.payment_expyear,profile.payment_cvv from tasks LEFT JOIN profile ON profile.id=tasks.profile_id LEFT JOIN users ON users.id=profile.user_id LEFT JOIN sizes ON sizes.id=tasks.size_id LEFT JOIN releases ON releases.id=tasks.release_id where tasks.id IN ($check)"));
				

				 $detailsArray = []; 
				// Define the Excel spreadsheet headers
				$detailsArray[] = ['TaskID','AccountEmail','Profile Name','Email','PID','Size','First Name','Last Name','Address1','Address2','City','State','Zip','Country','Phone','Card Type','Card No','Expiration Month','Expiration Year','CVV'];

				
			   foreach ($details as $detail) {
					$detail =  (array) $detail;
				   $detailsArray[] = $detail;

		 }
			 


        // Generate and return the spreadsheet
    Excel::create('tasks', function($excel) use ($detailsArray) {
        // Set the spreadsheet title, creator, and description
        $excel->setTitle('tasks');
        $excel->setCreator('botintel')->setCompany('FleekBiz');
        $excel->setDescription('tasks file');
        // Build the spreadsheet, passing in the payments array
        $excel->sheet('tasks', function($sheet) use ($detailsArray) {
            $sheet->fromArray($detailsArray, null, 'A1', false, false);
        });
    })->download('xlsx');  
				

			}
		


	    //By the way, you can still create your own method in here... :)



	    //By the way, you can still create your own method in here... :) 


	}