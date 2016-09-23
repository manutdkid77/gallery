<?php

class User extends Db_object{
	protected static $tb_name='users';
	protected static $tb_fields=array(
			'username','password','first_name','last_name','avatar_name','random_avatar'
		);
	public $id;
	public $username;
	public $password;
	public $first_name;
	public $last_name;
	public $avatar_path='profile_images';
	public $random_avatar;
	public $avatar_temp_name;
	public $avatar_name;


	//Login verification query
	public static function verify_user($username,$password){
		global $database;
		$username=$database->escape_string($username);
		$password=$database->escape_string($password);

		$res=self::db_query("SELECT * FROM ".self::$tb_name." WHERE `username`='{$username}' AND `password`='{$password}' LIMIT 1");
		return empty($res)? null : array_shift($res);
	}

	//Check if user exists on registration page
	public static function user_exists($username){
		global $database;
		$username=$database->escape_string($username);
		$res=$database->query("SELECT * FROM `users` WHERE `username`='{$username}'");
		if(mysqli_num_rows($res)==0)
			return true;
		else
			return false;
	}	

	//Upload profile pic on registration page
	public function upload_avatar($image){
		if(empty($image) || !is_array($image) || !$image)
			return false;
		if($image['error']!=0)
			return false;
		if(empty($image['name']) || empty($image['tmp_name'])){
			return false;
		}
		$this->avatar_name=$image['name'];
		$target_path=SITE_ROOT.DS.'admin'.DS.$this->avatar_path.DS.$this->avatar_name;
		if(move_uploaded_file($image['tmp_name'], $target_path)){
			$this->random_avatar='no';
			unset($image['tmp_name']);
			return true;
		}
	}//End of upload profile_pic


	//Delete user
	public function delete_user(){
		if($this->delete_item($this->id)){
			if($this->random_avatar=='no')
				unlink(SITE_ROOT.DS.'admin'.DS.$this->avatar_path.DS.$this->avatar_name);
			return true;
		}
		else
			return false;
	}

}


?>