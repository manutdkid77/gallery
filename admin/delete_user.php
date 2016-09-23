<?php include("includes/header.php"); ?>
<?php if(!$session->login_status()) redirect('login.php'); ?>

<?php 
if(!isset($_GET['id'])){
	redirect('users.php');
}

$user_obj=user::get_item_by_id($_GET['id']);

if(!$user_obj)
	redirect('users.php');

if($user_obj->delete_user()){
	redirect('users.php');
}
?>