<?php include("includes/header.php"); ?>
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

        <!-- Navigation -->
        <?php include("includes/nav.php"); ?>

        <div id="page-wrapper">
            
        	<div class="container-fluid">

			    	<!-- Page Heading -->
			    <div class="row">
			        <div class="col-lg-12" style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
			            <h1 class="page-header">
			                Uploads
			                <small>Dashboard</small>
			            </h1>

						<form id="my-awesome-dropzone" action="uploads.php" class="dropzone col-md-6">  
						    
						    <div class="form-group">
						    	<label for="title">Enter Title</label>
						    	<input type="text" name="title" class="form-control">
						    </div>

						    <div class="form-group">
								<label for="description">Enter Description</label>
								<textarea name="description" class="form-control" rows="5" cols="30" style="resize:none;"></textarea>
							</div>

						    <div class="dropzone-previews"></div>

						    <div class="form-group">
						    	<input type="submit" id="submit-all" class="btn btn-primary center-block">	
						    </div>

						    <?php  if(isset($message)): ?>
								<div class="alert alert-info">
									<?php echo $message; ?>
								</div>
							<?php endif; ?>
							
						</form>
						

			        </div>
			    </div> <!-- End of row -->

		</div>
		<!-- /.container-fluid -->
            
    </div>
    <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>