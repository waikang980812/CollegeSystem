<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;

class PermissionsController extends Controller
{
    public function update($id){
    	$permission = Permission::findOrFail($id);
        $permission->manageUser = False;
            $permission->manageFacul=False;
            $permission->manageProg=False;
    	$permissionCheckBox = Request()->input('permissions_checkbox');
        if(!is_null($permissionCheckBox)){
    	   foreach ($permissionCheckBox as $permissions){
    		  if($permissions == 'manageUser'){
    		      $permission->manageUser = True;
    		  }elseif ($permissions == 'manageFacul') {
    			$permission->manageFacul=True;
    		  }else
    			$permission->manageProg=True;
    		  }
            
        }
    	$permission->update([
    		'manageUser' => $permission->manageUser,
    		'manageFacul'=>$permission->manageFacul,
    		'manageProg'=>$permission->manageProg,
    	]);
    	return back();
    }
}

