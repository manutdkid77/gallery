<?php include("includes/header.php"); ?>
<?php
	if(!$session->login_status())
		redirect('index.php');
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

				        <div class="col-md-6"><!-- Form Container -->
				        	<div class="form-group">
							    <label for="title">Enter Title</label>
							   	<input type="text" name="title" class="form-control" id='title-box'>
							</div>

							<div class="form-group">
								<label for="description">Enter Description</label>
								<textarea name="description" class="form-control" rows="5" cols="30" style="resize:none;" id="description-box"></textarea>
							</div>

				            <div class="form-group">
							    <input type="submit" id="submit-btn" class="btn btn-primary center-block">	
							</div>

							<form id="my-awesome-dropzone" action="uploads.php" class="dropzone">

							   	<div class="dropzone-previews"></div>	
							</form> <!-- End of dropzone -->

							<div class="alert alert-success message-box hidden">
							</div>

				    	</div><!-- End of form container -->

					</div>
				</div> <!-- End of row -->

			</div>
			<!-- /.container-fluid -->
            
	    </div>
	    <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>