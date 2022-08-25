<?php
namespace App\Services;

use App\UserInfo;
use App\Interfaces\UserInterface;

class GetUserAdapter implements UserInterface
{
	public function find($id){
		$user = UserInfo::find($id);
		return $user;
	}
	public function findAll(){
		$user = UserInfo::all();
		return $user;
	}
}