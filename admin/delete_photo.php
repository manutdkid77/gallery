<?php include("includes/header.php"); ?>
<?php if(!$session->login_status()) redirect('login.php'); ?>

<?php 
if(!isset($_GET['id'])){
	redirect('photos.php');
}

$img_obj=Photo::get_item_by_id($_GET['id']);

if(!$img_obj)
	redirect('photos.php');

if($img_obj->delete_image()){
	redirect('photos.php');
}
?>