<?php include("includes/header.php"); ?>
<?php if(!$session->login_status()) redirect('login.php'); ?>

<style type="text/css">
	.pictures_link a{
		margin:0 0.5em;	
	}
	td {font-size: 1.15em;}
</style>
        <!-- Navigation -->
        <?php include("includes/nav.php"); ?>

        <div id="page-wrapper">
            
        	<div class="container-fluid">

			    	<!-- Page Heading -->
			    <div class="row">
			        <div class="col-lg-12">
			            <h1 class="page-header">
			                Photos
			                <small>Dashboard</small>
			            </h1>

			            <div class="col-md-12 table-responsive">
			            	<table class="table table-striped">
			            		<thead>
			            			<tr>
			            				<th>ID</th>
			            				<th>Title</th>
			            				<th>Image</th>
			            				<th>Description</th>
			            				<th>Filename</th>
			            				<th>Type</th>
			            				<th>Size</th>
			            				<th>Comments</th>
			            				<th>Upload Date</th>
			            			</tr>
			            		</thead>
			            		<tbody>
			            			<?php  
			            				$photo_array=Photo::get_all();
			            				foreach ($photo_array as $photo):
			            					$imageloc=$photo->upload_directory.DS.$photo->filename;
			            				?>
			            					<tr>
			            					<td><?php echo $photo->id; ?></td>
			            					<td><?php echo $photo->title; ?></td>
			            					<td style="width:200px;height:200px;">
			            						<img class="img-responsive" src="<?php echo $imageloc;?>">
			            						<div class="pictures_link" style="margin:1em 0;text-align:center;">
			            							<a href="delete_photo.php?id=<?php  echo $photo->id;?>" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
			            							<a href="edit_photo.php?id=<?php  echo $photo->id;?>" class="btn btn-sm btn-warning"><span class="	glyphicon glyphicon-pencil"></span></a>
			            							<a href="view_photo?id=<?php echo $photo->id; ?>" class="btn btn-sm btn-info"><span class="	glyphicon glyphicon-zoom-in"></span></a>
			            						</div>
			            					</td>
			            					<td><?php echo substr($photo->description,0,30); ?></td>
			            					<td><?php echo $photo->filename; ?></td>
			            					<td><?php echo $photo->type; ?></td>
			            					<td><?php echo $photo->size; ?></td>

			            					<!-- Get comment count -->
			            					<?php
			            						$comment_array=Comment::find_comments($photo->id);
			            					?>
			            					<td><?php echo count($comment_array);?></td>

			            					<td><?php echo $photo->date; ?></td>
			            					</tr>";
			            				<?php
			            				endforeach;
			            			?>
			            		</tbody>
			            	</table>
			            </div>
			            
			        </div>
			    </div>
			    <!-- /.row -->
		</div>
		<!-- /.container-fluid -->
            
    </div>
    <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>