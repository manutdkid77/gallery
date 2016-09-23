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

	if(isset($_POST['register'])){
		if($_POST['password']!=$_POST['password1']) 
			$error_msg='Passwords are not equal';
		else{
			$username=trim($_POST['username']);
			$password=trim($_POST['password']);
			if(User::user_exists($username)){
				$user_obj=new User();
				$user_obj->username=$username;
				$user_obj->password=$password;

				//Save user avatar
				if(!($user_obj->upload_avatar($_FILES['avatar']))){
					$avatar_url=file_get_contents('http://uifaces.com/api/v1/random');
					$avatar_url=json_decode($avatar_url,true);
					$user_obj->avatar_name=$avatar_url['image_urls']['epic'];
					$user_obj->random_avatar='yes';
				}
				
				$user_obj->save();
				redirect('index.php');

			}else{
				$error_msg='Username already exists';
			}

		}
	}
	
?>

<div class="col-md-4 col-md-offset-3">
	<form action="" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label for="username">Username</label>	
			<input type="text" name="username" class="form-control" required>
		</div>

		<div class="form-group">
			<label for="password">Password</label>	
			<input type="password" name="password" class="form-control" required>
		</div>
		<div class="form-group">
			<label for="password">Confirm Password</label>	
			<input type="password" name="password1" class="form-control" required>
		</div>
		<div class="form-group">
			<label class="btn btn-default btn-file">
    			Upload Profile Picture<input name="avatar" type="file" style="display: none;">
			</label>
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-success" value="register" name="register">
		</div>
		<?php if(isset($error_msg)): ?>
			<div class="alert alert-danger">
				<?php echo $error_msg;?>
			</div>
		<?php endif;?>
	</form>
</div>

</div>
</body>
