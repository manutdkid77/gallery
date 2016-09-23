<?php require_once('includes/header.php'); ?>
<?php
    if(!$session->login_status()) redirect('login.php');

    if(isset($_FILES['file'])){
    	$photo=new Photo();
    	$photo->title=$_POST['title'];
    	$photo->description=$_POST['description'];
    	$photo->date=date('l jS \of F Y h:i:s A');
    	if($photo->set_file($_FILES['file'])){
    		if($photo->save())
    			$message="Photo uploaded successfully";
    		else
    			$message=implode("<br/>",$photo->image_errors_array);
    	}
    	else
    		$message=implode("<br/>",$photo->image_errors_array);
    }
?>