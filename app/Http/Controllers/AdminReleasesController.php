<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;

	class AdminReleasesController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "release_name";
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
			$this->table = "releases";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Image","name"=>"release_image","image"=>true];
			$this->col[] = ["label"=>"Name","name"=>"release_name"];
			$this->col[] = ["label"=>"Store","name"=>"store_id","join"=>"stores,store_name"];
			$this->col[] = ["label"=>"Country","name"=>"country"];
			$this->col[] = ["label"=>"Release Date","name"=>"release_date"];
			$this->col[] = ["label"=>"Submission Time Limit","name"=>"submission_time","callback_php"=>'$row->submission_time .=" hours"'];
			$this->col[] = ["label"=>"Status","name"=>"status","callback_php"=>'($row->status == 1? "Active" : "Inactive")'];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'SKU','name'=>'release_code','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-6'];
			$this->form[] = ['label'=>'Store','name'=>'store_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-6','datatable'=>'stores,store_name'];
			$this->form[] = ['label'=>'Country','name'=>'country','type'=>'select2','validation'=>'required|min:1|max:255','width'=>'col-sm-6','dataenum'=>'US;EU;AU;CA;GB;DE;DK;FR;IT;NL;RU;'];
			$this->form[] = ['label'=>'Name','name'=>'release_name','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-6'];
			$this->form[] = ['label'=>'Description','name'=>'release_description','type'=>'textarea','validation'=>'required','width'=>'col-sm-6'];
			$this->form[] = ['label'=>'Release Date','name'=>'release_date','type'=>'datetime','validation'=>'required|date_format:Y-m-d H:i:s','width'=>'col-sm-6'];
			$this->form[] = ['label'=>'Submission Time Limit','name'=>'submission_time','type'=>'number','validation'=>'required|min:0|max:100','width'=>'col-sm-6'];
			$this->form[] = ['label'=>'Image','name'=>'release_image','type'=>'upload','validation'=>'required|min:1|max:1000','width'=>'col-sm-6'];
			$this->form[] = ['label'=>'Status','name'=>'status','type'=>'radio','validation'=>'required|integer|min:0','width'=>'col-sm-6','dataenum'=>'1|Active;0|In Active'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'SKU','name'=>'release_code','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-6'];
			//$this->form[] = ['label'=>'Store','name'=>'store_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-6','datatable'=>'stores,store_name'];
			//$this->form[] = ['label'=>'Country','name'=>'country','type'=>'select2','validation'=>'required|min:1|max:255','width'=>'col-sm-6','dataenum'=>'US;EU;AU;CA;GB;DE;DK;FR;IT;NL;RU;'];
			//$this->form[] = ['label'=>'Name','name'=>'release_name','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-6'];
			//$this->form[] = ['label'=>'Description','name'=>'release_description','type'=>'textarea','validation'=>'required','width'=>'col-sm-6'];
			//$this->form[] = ['label'=>'Release Date','name'=>'release_date','type'=>'datetime','validation'=>'required|date_format:Y-m-d H:i:s','width'=>'col-sm-6'];
			//$this->form[] = ['label'=>'Submission Time Limit','name'=>'submission_time','type'=>'number','validation'=>'required|min:0|max:100','width'=>'col-sm-6'];
			//$this->form[] = ['label'=>'Image','name'=>'release_image','type'=>'upload','validation'=>'required|min:1|max:1000','width'=>'col-sm-6'];
			//$this->form[] = ['label'=>'Status','name'=>'status','type'=>'radio','validation'=>'required|integer|min:0','width'=>'col-sm-6','dataenum'=>'1|Active;0|In Active'];
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
	        | @label = Name of button 
	        | @url   = URL Target
	        | @icon  = Icon from Awesome.
	        | 
	        */
	        $this->index_button = array();
	        $this->index_button[] = ['label'=>'Get US Products','url'=>"javascript:;","icon"=>"fa fa-check"];
	        $this->index_button[] = ['label'=>'Get EU Products','url'=>"javascript:;","icon"=>"fa fa-anchor"];


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
	       $('#get-us-products').click(function(e) {  
				 
				    	
    					$.get(site_url+'/get_us_products', function( data ) {

    						if(data=='inserted'){
    							
    							  location.reload();

    						}
});
			});  
			 $('#get-eu-products').click(function(e) {  
				 
				    	
    					$.get(site_url+'/get_eu_products', function( data ) {

    						if(data=='inserted'){
    							
    							  location.reload();

    						}
});
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


	    	 public function GetUSProducts()
	    {
	    	# code...
	    
	    	$nikeproducts="https://api.nike.com/commerce/productfeed/products/snkrs/threads?country=US&limit=50&locale=en_US&skip=0&withCards=true";
	    	    $ch = curl_init();

			    curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
			    curl_setopt($ch, CURLOPT_HEADER, 0);
			    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			    curl_setopt($ch, CURLOPT_URL, $nikeproducts);
			    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);       

			    $data = curl_exec($ch);
			    curl_close($ch);
			    $nikeProducts=json_decode($data);
			    $description="";
			    	$deletescrapped=DB::table('releases')->where('is_scrapped',1)->where('country','US')->delete();
			    	foreach ($nikeProducts->threads as $nikeProduct) {

			    		$storeid=1;
			    		$country=US;
			    		if(!empty($nikeProduct->product->title)): 
			    		$title=$nikeProduct->product->title;
			    		$releasedate=$nikeProduct->product->startSellDate;
			    		$sku= strtoupper($nikeProduct->product->style).'-'.$nikeProduct->product->colorCode;
			    		$imageUrl=$nikeProduct->product->imageUrl.'?&wid=2500&fmt=png-alpha';
			    		$datenow=date('Y-m-d H:s:i');
			    			foreach ($nikeProduct->cards as $nikecard) {
			    				# code...
			    			if(!empty($nikecard->description) && $description==""): $description=$nikecard->description; endif ;
			    						 	
			    			}

			    			$releaseinsert=DB::table('releases')->insertGetId(['store_id' => $storeid, 'country' => $country, 'release_name' => $title,'release_description' => $description, 'release_date' => $releasedate, 'release_code' => $sku,'is_scrapped' =>1, 'release_image' => $imageUrl, 'created_at' => $datenow]
							);
							$releasesdetail=CRUDBooster::first('releases',['id'=>$releaseinsert]);
						
							$releasedate=$releasesdetail->release_date;
							$submission_time='-'.$releasesdetail->submission_time.' hours';
							
							$subtime = date('Y-m-d H:i:s', strtotime($submission_time, strtotime($releasedate)));
							 DB::table('releases')->where('id',$releaseinsert)->update(['sub_time'=>$subtime]);
						
			    			endif;
			    			

			    				

			    	 }
			    		
			echo 'inserted';

	    } public function GetEUProducts()
	    {
	    	# code...
	    
	    	$nikeproducts="https://api.nike.com/commerce/productfeed/products/snkrs/threads?country=GB&limit=50&locale=en_GB&skip=0&withCards=true";

	    	    $ch = curl_init();

			    curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
			    curl_setopt($ch, CURLOPT_HEADER, 0);
			    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			    curl_setopt($ch, CURLOPT_URL, $nikeproducts);
			    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);       

			    $data = curl_exec($ch);
			    curl_close($ch);
			    $nikeProducts=json_decode($data);
			 
			    			$deletescrapped=DB::table('releases')->where('is_scrapped',1)->where('country','EU')->delete();
			    $description="";
			    	foreach ($nikeProducts->threads as $nikeProduct) {

			    		$storeid=1;
			    		$country=EU;
			    		if(!empty($nikeProduct->product->title)): 
			    		$title=$nikeProduct->product->title;
			    		$releasedate=$nikeProduct->product->startSellDate;
			    		$sku= strtoupper($nikeProduct->product->style).'-'.$nikeProduct->product->colorCode;
			    		$imageUrl=$nikeProduct->product->imageUrl.'?&wid=2500&fmt=png-alpha';
			    		$datenow=date('Y-m-d H:s:i');
			    			foreach ($nikeProduct->cards as $nikecard) {
			    				# code...
			    			if(!empty($nikecard->description) && $description==""): $description=$nikecard->description; endif ;
			    						 	
			    			}

			    			$releaseinsert=DB::table('releases')->insertGetId(['store_id' => $storeid, 'country' => $country, 'release_name' => $title,'release_description' => $description, 'release_date' => $releasedate, 'release_code' => $sku,'is_scrapped' =>1, 'release_image' => $imageUrl, 'created_at' => $datenow]
							);
							$releasesdetail=CRUDBooster::first('releases',['id'=>$releaseinsert]);
						
							$releasedate=$releasesdetail->release_date;
							$submission_time='-'.$releasesdetail->submission_time.' hours';
							
							$subtime = date('Y-m-d H:i:s', strtotime($submission_time, strtotime($releasedate)));
							 DB::table('releases')->where('id',$releaseinsert)->update(['sub_time'=>$subtime]);
						
			    			endif;
			    			

			    				

			    	 }
			    		
			echo 'inserted';

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
			$releasesdetail=CRUDBooster::first('releases',['id'=>$id]);
			$releasedate=$releasesdetail->release_date;
			$submission_time='-'.$releasesdetail->submission_time.' hours';
			
			$subtime = date('Y-m-d H:i:s', strtotime($submission_time, strtotime($releasedate)));
			 DB::table($this->table)->where('id',$id)->update(['sub_time'=>$subtime]);
		

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
		
			$releasesdetail=CRUDBooster::first('releases',['id'=>$id]);
			$releasedate=$releasesdetail->release_date;
			$submission_time='-'.$releasesdetail->submission_time.' hours';
			
			$subtime = date('Y-m-d H:i:s', strtotime($submission_time, strtotime($releasedate)));
			 DB::table($this->table)->where('id',$id)->update(['sub_time'=>$subtime]);

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