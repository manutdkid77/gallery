<?php

class Session{
	public $signed_in=false;
	public $total_visitors;
	private $user_id;

	public function __construct(){
		session_start();

		if(isset($_SESSION['user_id'])){
			$this->signed_in=true;
			$this->user_id=$_SESSION['user_id'];
		}
		else{
			$this->signed_in=false;
			unset($this->user_id);
		}

		$this->visitor_count();
	}


	public function login($user){
		$this->user_id=$_SESSION['user_id']=$user->id;
		$this->signed_in=true;
	}


	public function logout(){
		unset($this->user_id);
		$this->signed_in=false;
		unset($_SESSION['user_id']);
		unset($_SESSION['username']);
		redirect('../login.php');
	}

	//Check at the start if user is logged in or no
	public function login_status(){
		return $this->signed_in;
	}

	//Track visitor count
	public function visitor_count(){
		if(isset($_SESSION['total_visitors']))
			$this->total_visitors=$_SESSION['total_visitors']++;
		else
			$_SESSION['total_visitors']=1;
	}
}

$session=new Session();

?>