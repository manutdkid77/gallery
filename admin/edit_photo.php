<?php include("includes/header.php"); ?>
<?php if(!$session->login_status()) redirect('login.php'); ?>

<?php 
	if(!isset($_GET['id']))
		redirect('photos.php');

	$photo_obj=Photo::get_item_by_id($_GET['id']);

	if(isset($_POST['update'])){
		$photo_obj->title=$_POST['title'];
		$photo_obj->description=$_POST['description'];
		$photo_obj->save();
	}
?>

        <!-- Navigation -->
        <?php include("includes/nav.php"); ?>

        <div id="page-wrapper">
            
        	<div class="container-fluid">

			    	<!-- Page Heading -->
			    <div class="row">
			        <div class="col-lg-12">
			            <h1 class="page-header">
			                Edit Photo
			                <small>Dashboard</small>
			            </h1>

			            <!-- Form section -->
			            <div class="col-md-8">
			            	<form action="" method="post" id="edit_form">
			            		<div class="form-group">
			            			<label for="">Title</label>
			            			<input type="text" name="title" class="form-control" value="<?php echo $photo_obj->title;?>">
			            		</div>

			            		<div>
			            			<img style="margin:0 auto;" class="img-responsive thumbnail" src="<?php echo $photo_obj->upload_directory.DS.$photo_obj->filename;?>">
			            		</div>

			            		<div class="form-group">
			            			<label for="">Description</label>
			            			<textarea class="form-control" name="description" rows="10" cols="30" style="resize:none;"><?php echo $photo_obj->description;?></textarea>
			            		</div>
			            	</form>
			            </div>

			            <!-- Form right sidebar -->
			            <div class="col-md-4">
	                        <div class="photo-info-box">
	                            <div class="inside">
	                                <div class="box-inner">
	                                    <p class="text">
	                                        <span class="glyphicon glyphicon-calendar"></span> Uploaded on: <?php echo $photo_obj->date; ?>
	                                    </p>
	                                    <p class="text ">
	                                        Photo Id: <span class="data photo_id_box"><?php echo $photo_obj->id;?></span>
	                                    </p>
	                                    <p class="text">
	                                        Filename: <span class="data"><?php echo $photo_obj->filename;?></span>
	                                    </p>
	                                    <p class="text">
	                                        File Type: <span class="data"><?php echo $photo_obj->type;?></span>
	                                    </p>
	                                    <p class="text">
	                                        File Size: <span class="data"><?php echo $photo_obj->size;?></span>
	                                    </p>
	                                </div>
	                                <div class="info-box-footer clearfix">
	                                    <div class="info-box-delete pull-left">
	                                        <a href="delete_photo.php" class="btn btn-danger btn-lg ">Delete</a>
	                                    </div>
	                                    <div class="info-box-update pull-right ">
	                                        <input form="edit_form" type="submit" name="update" value="Update" class="btn btn-primary btn-lg ">
	                                    </div>
	                                </div>
	                            </div>
	                    	</div>
                    	</div><!-- End of sidebar -->

			        </div>
			    </div>
			    <!-- /.row -->
		</div>
		<!-- /.container-fluid -->
            
    </div>
    <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>