<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Auth;
use DB;
use Cookie;
use Session;
use App\Subscriptions;
use App\Tasks;
use App\Releases;
use App\Sizes;
use App\Profiles;

class TasksController extends Controller
{
	
    public function index(Request $request){
		// $data['now']       = date('Y-m-d H:i:s');
		// print_r($data['now']);
		// die;
        if (Auth::user()):
            $data['now']       = date('Y-m-d H:i:s');
            $data['releases']  = Releases::where('sub_time', '>', $data['now'])->get();
            $data['sizes']     = Sizes::all();
            $data['profiles']  = Profiles::where('user_id', Auth::user()->id)->where('delivery_fname', '!=', '')->where('delivery_lname', '!=', '')->get();
            $data['usertasks'] = DB::table('tasks')->select('tasks.*', 'releases.release_date', 'releases.release_name', 'releases.release_code', 'releases.sub_time', 'releases.id as rid', 'sizes.id as sid', 'sizes.size_name', 'profile.id as pid', 'profile.profile_name')->leftjoin('profile', 'tasks.profile_id', '=', 'profile.id')->leftjoin('releases', 'tasks.release_id', '=', 'releases.id')->leftjoin('sizes', 'tasks.size_id', '=', 'sizes.id')->where('profile.user_id', Auth::user()->id)->get();
			
            $data['usertasksdone'] = count($data['usertasks']);
            $data['subscription'] = Subscriptions::where('id', Auth::user()->subscription_id)->first();
            return view('front.tasks', $data);
        else:
            return redirect('/');
        endif;
    }
	
    public function getdata(){
        $now           = date('Y-m-d H:i:s');
        $releases      = Releases::where('sub_time', '>', $now)->get();
        $sizes         = Sizes::all();
        $profiles      = Profiles::where('user_id', Auth::user()->id)->where('delivery_fname', '!=', '')->where('delivery_lname', '!=', '')->get();
        $usertasksdone = DB::table('tasks')->leftjoin('profile', 'tasks.profile_id', '=', 'profile.id')->where('profile.user_id', Auth::user()->id)->count();
        
        $subscription = Subscriptions::where('id', Auth::user()->subscription_id)->first();
        
        $html = '<div class="col-md-12"><div class="col-md-6"><div class="form-group"> <label >Release</label><select name="release[]"  onchange="taskchange()" required class="form-control"><option value="">Please select one</option>';
        foreach ($releases as $release):
            $html .= '<option data-text="' . $release->release_name . '-' . $release->release_code . '" data-countdown="' . $release->sub_time . '" value="' . $release->id . '">' . $release->release_name . '</option>';
        endforeach;
        
        $html .= '</select></div></div><div class="col-md-2"><div class="form-group"><label for="">Size</label><select name="size[]"  onchange="taskchange()"class="form-control" required ><option value="">Please select one</option>';
        foreach ($sizes as $size):
            $html .= '<option value="' . $size->id . '">' . $size->size_name . '</option>';
        endforeach;
        
        $html .= '</select></div></div><div class="col-md-2"><div class="form-group"><label for="">Profile</label><select name="profile[]" onchange="taskchange()" class="form-control"  required ><option value="">Please select one</option>';
        foreach ($profiles as $profile):
            $html .= '<option value="' . $profile->id . '">' . $profile->profile_name . '</option>';
        endforeach;
        $html .= '</select></div></div><div class="col-md-2"><button type="button"   onclick="delgRow(this,' . $usertasksdone . ',' . $subscription->number_of_profiles . ')"  href="javascript:;"  class="btn btn-default btn-circle btn-lg btn-dlt" data-toggle="tooltip" data-placement="right" ><i class="glyphicon glyphicon-minus"></i></button>
		<button type="button" href="javascript:;" class="btn btn-default btn-circle btn-lg btn-ins"><i class="glyphicon glyphicon-check"></i></button>
		</div></div>';
        
        // <button class="btn btn-primary" style="background:#00bcd4;" type="button" onclick="unsubmit()">UNSUBMIT</button>
        // <button class="btn btn-primary" type="button" onclick="submitone()">SUBMIT</button>
        echo json_encode($html);
        
    }
	
    public function submit(Request $request){
		
		$release = $request->input('release_db');
		for($i=0; $i < count($release); $i++):
			$tasks = Tasks::where('id',$request->input('tid')[$i])->first();
			$tasks->release_id=$request->input('release_db')[$i];
			$tasks->size_id=$request->input('size_db')[$i];
			$tasks->profile_id=$request->input('profile_db')[$i];
			$tasks->save();
		endfor;
		
		$release = $request->input('release');
		for($i=0; $i < count($release); $i++):
			$tasks = new Tasks;
		
			$tasks->task_id=$request->input('release')[$i];
			$tasks->release_id=$request->input('release')[$i];
			$tasks->size_id=$request->input('size')[$i];
			$tasks->profile_id=$request->input('profile')[$i];
			$tasks->save();
			$taskid=strtoupper(Str::random(4)).''.$tasks->id;
			$tasksup = Tasks::where('id',$tasks->id)->first();
			$tasksup->task_id=$taskid;
			$tasksup->save();
		endfor;
        echo 1;
    }
	
    public function newTask(Request $request){
        $release = $request->input('release');
        $size    = $request->input('size');
        $profile = $request->input('profile');
		$task = new Tasks;
		$task->release_id = $release;
		$task->size_id    = $size;
		$task->profile_id = $profile;
		$task->created_at = date('Y-m-d H:i:s');
		$task->save();
		$id=$task->id;
		$taskid=strtoupper(Str::random(4)).''.$id;
		$tasks = Tasks::where('id',$id)->first();
		$tasks->task_id=$taskid;
		$tasks->save();

        echo 1;
    }
	
    public function upTask(Request $request){
		$returnValue = DB::table('tasks')
		->where('id', '=', $request->input('id') )
		->update([
			'release_id' => $request->input('release'), 
			'size_id' => $request->input('size'), 
			'profile_id' => $request->input('profile'), 
			'updated_at' => date('Y-m-d H:i:s'), 
		]);
        echo 1;
    }
	
    public function delTask(Request $request){
		DB::table('tasks')->where('id', '=', $request->input('task_id'))->delete();
        echo 1;
    }
	
    public function Cookie(Request $request){
        $release = $request->release;
        $size    = $request->size;
        $profile = $request->profile;
        $tasks   = array(
            'release_id' => $release,
            'size_id' => $size,
            'profile_id' => $profile
        );
        $array_json = json_encode($tasks);
        echo $array_json;
    }
	
    public function deletealltasks(){
        $now   = date('Y-m-d H:i:s');
        $tasks = DB::table('tasks')->leftjoin('profile', 'tasks.profile_id', '=', 'profile.id')->leftjoin('releases', 'tasks.release_id', '=', 'releases.id')->where('profile.user_id', Auth::user()->id)->where('releases.sub_time', '>', $now)->delete();
        echo $tasks;
		die;
    }
	
    public function getCookiedata(Request $request){
	
        $now		= date('Y-m-d H:i:s');
		$tasks		= json_decode($request->tasks);
		$tasklen	= count($tasks->release_id);
		
		
        $releases	= Releases::where('sub_time', '>', $now)->get();
		// print_r($releases);
		// echo $now;
		// die;
        $sizes		= Sizes::all();
        $profiles	= Profiles::where('user_id', Auth::user()->id)->where('delivery_fname', '!=', '')->where('delivery_lname', '!=', '')->get();
		
		$usertasks = DB::table('tasks')->select('tasks.*', 'releases.release_date', 'releases.release_name', 'releases.release_code', 'releases.sub_time', 'releases.id as rid', 'sizes.id as sid', 'sizes.size_name', 'profile.id as pid', 'profile.profile_name')->leftjoin('profile', 'tasks.profile_id', '=', 'profile.id')->leftjoin('releases', 'tasks.release_id', '=', 'releases.id')->leftjoin('sizes', 'tasks.size_id', '=', 'sizes.id')->where('profile.user_id', Auth::user()->id)->where('tasks.successful','!=',2)->get()->toArray();
        
        $usertasksdone = count($usertasks);
        
        $subscription = Subscriptions::where('id', Auth::user()->subscription_id)->first();
        
        
        $html = '<input type="hidden" id="nowtime" value="'.$now.'">';
        if ($usertasksdone > 0):
            foreach ($usertasks as $usertask):
                $html .= '<div class="col-md-12"><div class="col-md-6"><div class="form-group"> <label >Release</label>
					<input type="hidden" name="tid[]" value="' . $usertask->id . '">';
                
				if ($usertask->sub_time < $now || $usertask->successful==1):
                    $html .= '<p>' . $usertask->release_name . '</p>';
                else:
                    $html .= '<select name="release_db[]" required class="form-control"><option value="">Please select one</option>';
                    foreach ($releases as $release):
                        $html .= '<option data-text="' . $release->release_name . '-' . $release->release_code . '" ' . ($usertask->release_id == $release->id ? 'selected' : '') . ' data-countdown="' . $release->sub_time . '" value="' . $release->id . '">' . $release->release_name . '</option>';
                    endforeach;
                    $html .= '</select>';
                endif;
				
                $html .= '</div></div><div class="col-md-2"><div class="form-group"><label for="">Size</label>';
                
				if ($usertask->sub_time < $now || $usertask->successful==1):
                    $html .= '<p>' . $usertask->size_name . '</p>
					<input type="hidden"  value="' . $usertask->sid . '">';
                else:
                    $html .= '<select name="size_db[]" class="form-control"  required ><option value="">Please select one</option>';
                    foreach ($sizes as $size):
                        $html .= '<option  ' . ($usertask->size_id == $size->id ? 'selected' : '') . ' value="' . $size->id . '">' . $size->size_name . '</option>';
                    endforeach;
                    $html .= '</select>';
                endif;
                
				$html .= '</div></div><div class="col-md-2"><div class="form-group"><label for="">Profile</label>';
                
                if ($usertask->sub_time < $now || $usertask->successful==1):
                    $html .= '<p>' . $usertask->profile_name . '</p>
					<input type="hidden"  value="' . $usertask->pid . '">';
                else:
                    $html .= '<select name="profile_db[]" onchange="taskchange()" class="form-control" required ><option value="">Please select one</option>';
                    foreach ($profiles as $profile):
                        $html .= '<option  ' . ($usertask->profile_id == $profile->id ? 'selected' : '') . ' value="' . $profile->id . '">' . $profile->profile_name . '</option>';
                    endforeach;
                    $html .= '</select>';
                endif;
				
                $html .= '</div></div>';
                if ($usertask->sub_time > $now && $usertask->successful==0):
                    $html .= '<div class="col-md-2"><button type="button" style="margin-top:59px;"  data-taskid="'.$usertask->id.'" onclick="delgRow(this,'.$usertasksdone.','.$subscription->number_of_profiles.')"  href="javascript:void(0)"  class="btn btn-default btn-circle btn-lg"><i class="glyphicon glyphicon-minus"></i></button>
					<button type="button" data-tid="'.$usertask->id.'" href="javascript:;" class="btn btn-default btn-circle btn-lg btn-upd"><i class="glyphicon glyphicon-edit"></i></button></div>'; 
				elseif($usertask->successful==1):
					$html .= '<div class="col-md-2">
					<button type="button" href="javascript:;" class="btn btn-primary btn-circle btn-lg "><i class="glyphicon glyphicon-check"></i></button></div>';
                endif;
                $html .= '</div>';
            endforeach;
		else:
			$html .='<div class="col-md-12"><div class="col-md-6"><div class="form-group"> <label >Release</label><select name="release[]" onchange="taskchange()" required class="form-control"><option value="">Please select one</option>';
    	  		foreach($releases as $release):
    	  	$html .='<option data-text="'.$release->release_name.'-'.$release->release_code.'"  data-countdown="'.$release->sub_time.'" value="'.$release->id.'">'.$release->release_name.'</option>';
    	  		endforeach;

    	  	$html .='</select></div></div><div class="col-md-2"><div class="form-group"><label for="">Size</label><select name="size[]"  onchange="taskchange()"class="form-control" required ><option value="">Please select one</option>';
    	  		foreach($sizes as $size):
    	  	$html .='<option  value="'.$size->id.'">'.$size->size_name.'</option>';
    	  		endforeach;

    	  	$html .='</select></div></div><div class="col-md-2"><div class="form-group"><label for="">Profile</label><select name="profile[]" onchange="taskchange()" class="form-control" required ><option value="">Please select one</option>';
    	  		foreach($profiles as $profile):
    	  	$html .='<option  value="'.$profile->id.'">'.$profile->profile_name.'</option>';
    	  		endforeach;
			$html .='</select></div></div><div class="col-md-2">
			<button type="button" style="margin-top:59px; display:none;" onclick="delgRow(this,' . $usertasksdone . ',' . $subscription->number_of_profiles . ')"  href="javascript:;" class="btn btn-default btn-circle btn-lg btn-dlt"><i class="glyphicon glyphicon-minus"></i></button>
			<button type="button" href="javascript:;" class="btn btn-default btn-circle btn-lg btn-ins"><i class="glyphicon glyphicon-check"></i></button></div></div>';
        endif;
		for ($i = 0; $i < $tasklen; $i++) {
            $html .= '<div class="col-md-12"><div class="col-md-6"><div class="form-group"> <label >Release</label><select name="release[]" onchange="taskchange()" required class="form-control"><option value="">Please select one</option>';
            foreach ($releases as $release):
                $html .= '<option  data-text="' . $release->release_name . '-' . $release->release_code . '"  data-countdown="' . $release->sub_time . '" ' . ($tasks->release_id[$i] == $release->id ? 'selected' : '') . ' value="' . $release->id . '">' . $release->release_name . '</option>';
            endforeach;
            
            $html .= '</select></div></div><div class="col-md-2"><div class="form-group"><label for="">Size</label><select name="size[]"  onchange="taskchange()"class="form-control" required ><option value="">Please select one</option>';
            foreach ($sizes as $size):
                $html .= '<option ' . ($tasks->size_id[$i] == $size->id ? 'selected' : '') . ' value="' . $size->id . '">' . $size->size_name . '</option>';
            endforeach;
            
            $html .= '</select></div></div><div class="col-md-2"><div class="form-group"><label for="">Profile</label><select name="profile[]" onchange="taskchange()" class="form-control" required ><option value="">Please select one</option>';
            foreach ($profiles as $profile):
                $html .= '<option  ' . ($tasks->profile_id[$i] == $profile->id ? 'selected' : '') . ' value="' . $profile->id . '">' . $profile->profile_name . '</option>';
            endforeach;
            $html .= '</select></div></div><div class="col-md-2">
			<button type="button" style="margin-top:59px;" onclick="delgRow(this,' . $usertasksdone . ',' . $subscription->number_of_profiles . ')"  href="javascript:;" class="btn btn-default btn-circle btn-lg btn-dlt"><i class="glyphicon glyphicon-minus"></i></button>
			<button type="button" href="javascript:;" class="btn btn-default btn-circle btn-lg btn-ins"><i class="glyphicon glyphicon-check"></i></button>
			</div></div></div>';
        }
		
        
        echo json_encode($html);
    }
}
