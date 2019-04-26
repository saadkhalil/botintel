<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;

	class AdminProfilesController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "profile_name";
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
			$this->table = "profile";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Customer","name"=>"user_id","join"=>"users,full_name"];
			$this->col[] = ["label"=>"Profile Name","name"=>"profile_name"];
			$this->col[] = ["label"=>"Delivery Name","name"=>"delivery_fname","callback_php"=>'$row->delivery_fname." ".$row->delivery_lname'];
			$this->col[] = ["label"=>"Payment Email","name"=>"payment_email"];
			$this->col[] = ["label"=>"Country","name"=>"delivery_country"];
			$this->col[] = ["label"=>"Status","name"=>"status","callback_php"=>'($row->status == 1? "Active" : "Inactive")'];
			$this->col[] = ["label"=>"Created At","name"=>"created_at","callback_php"=>'($row->created_at != "" ? date("jS M Y h:i A",strtotime($row->created_at)) : "")'];
			$this->col[] = ["label"=>"Last Updated","name"=>"updated_at","callback_php"=>'($row->updated_at != "" ? date("jS M Y h:i A",strtotime($row->updated_at)) : "")'];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Customer','name'=>'user_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-4','datatable'=>'users,full_name'];
			$this->form[] = ['label'=>'Profile Name','name'=>'profile_name','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-4','placeholder'=>'Enter Profile Name'];
			$this->form[] = ['label'=>'First Name','name'=>'delivery_fname','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-4'];
			$this->form[] = ['label'=>'Last Name','name'=>'delivery_lname','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-4'];
			$this->form[] = ['label'=>'Address1','name'=>'delivery_address1','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-4'];
			$this->form[] = ['label'=>'Address2','name'=>'delivery_address2','type'=>'text','width'=>'col-sm-4'];
			$this->form[] = ['label'=>'City','name'=>'delivery_city','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-4'];
			$this->form[] = ['label'=>'State','name'=>'delivery_state','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-4'];
			$this->form[] = ['label'=>'Zip Code','name'=>'delivery_zip','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-4'];
			$this->form[] = ['label'=>'Country','name'=>'delivery_country','type'=>'select2','validation'=>'required|min:1|max:255','width'=>'col-sm-4','dataenum'=>'US;AU;CA;GB;DE;DK;FR;IT;NL;RU'];
			$this->form[] = ['label'=>'Phone','name'=>'delivery_phone','type'=>'text','validation'=>'required|min:1|max:14','width'=>'col-sm-4'];
			$this->form[] = ['label'=>'Payment Email','name'=>'payment_email','type'=>'email','validation'=>'required|min:1|max:255','width'=>'col-sm-4','placeholder'=>'Enter a valid Email Address'];
			$this->form[] = ['label'=>'Card Type','name'=>'payment_card_type','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-4'];
			$this->form[] = ['label'=>'Expiry Date','name'=>'payment_exp_date','type'=>'date','validation'=>'required|date_format:Y-m-d','width'=>'col-sm-4'];
			$this->form[] = ['label'=>'CVV','name'=>'payment_cvv','type'=>'number','validation'=>'required|min:1|max:255','width'=>'col-sm-4'];
			$this->form[] = ['label'=>'Status','name'=>'status','type'=>'radio','validation'=>'required|min:1|max:255','width'=>'col-sm-4','dataenum'=>'1|Active;0|In Active','value'=>'1'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'Customer','name'=>'user_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-4','datatable'=>'users,full_name'];
			//$this->form[] = ['label'=>'Profile Name','name'=>'profile_name','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-4','placeholder'=>'Enter Profile Name'];
			//$this->form[] = ['label'=>'First Name','name'=>'delivery_fname','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-4'];
			//$this->form[] = ['label'=>'Last Name','name'=>'delivery_lname','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-4'];
			//$this->form[] = ['label'=>'Address1','name'=>'delivery_address1','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-4'];
			//$this->form[] = ['label'=>'Address2','name'=>'delivery_address2','type'=>'text','width'=>'col-sm-4'];
			//$this->form[] = ['label'=>'City','name'=>'delivery_city','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-4'];
			//$this->form[] = ['label'=>'State','name'=>'delivery_state','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-4'];
			//$this->form[] = ['label'=>'Zip Code','name'=>'delivery_zip','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-4'];
			//$this->form[] = ['label'=>'Country','name'=>'delivery_country','type'=>'select2','validation'=>'required|min:1|max:255','width'=>'col-sm-4','dataenum'=>'US;AU;CA;GB;DE;DK;FR;IT;NL;RU'];
			//$this->form[] = ['label'=>'Phone','name'=>'delivery_phone','type'=>'text','validation'=>'required|min:1|max:14|numeric','width'=>'col-sm-4'];
			//$this->form[] = ['label'=>'Payment Email','name'=>'payment_email','type'=>'email','validation'=>'required|min:1|max:255','width'=>'col-sm-4','placeholder'=>'Enter a valid Email Address'];
			//$this->form[] = ['label'=>'Card Type','name'=>'payment_card_type','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-4'];
			//$this->form[] = ['label'=>'Expiry Date','name'=>'payment_exp_date','type'=>'date','validation'=>'required|date_format:Y-m-d','width'=>'col-sm-4'];
			//$this->form[] = ['label'=>'CVV','name'=>'payment_cvv','type'=>'number','validation'=>'required|min:1|max:255','width'=>'col-sm-4'];
			//$this->form[] = ['label'=>'Status','name'=>'status','type'=>'radio','validation'=>'required|min:1|max:255','width'=>'col-sm-4','dataenum'=>'1|Active;0|In Active'];
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



	    //By the way, you can still create your own method in here... :) 


	}