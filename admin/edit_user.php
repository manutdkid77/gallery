<?php include("includes/header.php"); ?>
<?php if(!$session->login_status()) redirect('login.php'); ?>

<style type="text/css">
	.box-inner {max-width: 128px;}
	img {margin: 1em 4em;}
	.info-box-footer {display: flex; justify-content: center;}
	.info-box-footer div {margin:0 0.3em;}
</style>

<?php 
	if(!isset($_GET['id']))
		redirect('users.php');

	$user_obj=User::get_item_by_id($_GET['id']);

	if(isset($_POST['update'])){
		$user_obj->first_name=$_POST['first_name'];
		$user_obj->last_name=$_POST['last_name'];
		
		//Save user avatar
		$user_obj->upload_avatar($_FILES['avatar']);

		$user_obj->save();
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
			                <?php echo $user_obj->username;?>
			                <small>Dashboard</small>
			            </h1>

			       		<!-- Form Left sidebar -->
			            <div class="col-md-3">
	                        <div class="user-info-box">
	                            <div class="inside">
	                                <div class="box-inner">
	                                	<?php
	                                		if($user_obj->random_avatar=='no')
	                                			$imageloc=$user_obj->avatar_path.DS.$user_obj->avatar_name;
			            					else
			            						$imageloc=$user_obj->avatar_name;
	                                	?>
	                                    <img style class="img-responsive img-circle" src="<?php echo $imageloc;?>">
	                                </div>
	                                <div class="info-box-footer">
	                                    <div class="info-box-delete">
	                                        <a href='<?php echo "delete_user.php?id={$_GET['id']}"; ?>' class='btn btn-danger'>Delete</a>
	                                    </div>
	                                    <div class="info-box-update">
	                                        <input form="edit_form" type="submit" name="update" value="Update" class="btn btn-success">
	                                    </div>
	                                </div>
	                            </div>
	                    	</div>
                    	</div><!-- End of sidebar -->

			            <!--Right Form section -->
			            <div class="col-md-6">
			            	<form action="" method="post" id="edit_form" enctype="multipart/form-data">

			            		<div class="form-group">
			            			<label for="">Firstname</label>
			            			<input type="text" name="first_name" class="form-control" value="<?php echo $user_obj->first_name;?>">
			            		</div>

			            		<div class="form-group">
			            			<label for="">Lastname</label>
			            			<input type="text" name="last_name" class="form-control" value="<?php echo $user_obj->last_name;?>">
			            		</div>

			            		<div class="form-group">
									<label class="btn btn-info btn-file">
						    			Update Profile Picture<input name="avatar" type="file" style="display: none;">
									</label>
								</div>

			            	</form>
			            </div>
			            <!-- End of Right Form Section -->

			        </div>
			    </div>
			    <!-- /.row -->
		</div>
		<!-- /.container-fluid -->
            
    </div>
    <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>