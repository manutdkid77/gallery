<?php require_once('includes/header.php'); ?>
<style type="text/css">
	body{
		background: #ecf0f1;
	}
</style>

<?php
	if($session->login_status()){
		redirect('index.php');
	}

	if(isset($_POST['submit'])){

		$username=trim($_POST['username']);
		$password=trim($_POST['password']);

		$user_found=User::verify_user($username,$password);

		if($user_found){
			$session->login($user_found);
			$_SESSION['username']=$user_found->first_name.' '.$user_found->last_name;
			redirect('index.php');
			$error_msg="";
		}
		else{
			$error_msg='Your password or email is incorrect';
		}
	}
	
?>

<div class="col-md-4 col-md-offset-3">
	<form action="" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label for="username">Username</label>	
			<input type="text" name="username" class="form-control">
		</div>

		<div class="form-group">
			<label for="password">password</label>	
			<input type="password" name="password" class="form-control">
		</div>
		<div class="form-group">
			<input type="submit" name="submit" value="Login" class="btn btn-primary">
			<a href="register.php" class="btn btn-success">Create an account</a>
		</div>
		<?php if(isset($error_msg)): ?>
			<div class="alert alert-info">
				<?php echo $error_msg;?>
			</div>
		<?php endif;?>
	</form>
</div>

</div>
</body>
