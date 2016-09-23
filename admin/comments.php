<?php include("includes/header.php"); ?>
<?php if(!$session->login_status()) redirect('login.php'); ?>

<style type="text/css">

	.image-col{
		display: flex;
    	flex-direction: column;
    	align-items: center;
	}
	.image-col img {width: 100px;}
	.pictures_link {margin :0.5em 0;}
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
			                Comments
			                <small>Dashboard</small>
			            </h1>

			            <div class="col-md-12 table-responsive">
			            	<table class="table table-striped">
			            		<thead>
			            			<tr>
			            				<th>ID</th>
			            				<th>Image Name</th>
			            				<th>Author</th>
			            				<th>Comment</th>
			            				<th>Date</th>
			            			</tr>
			            		</thead>
			            		<tbody>
			            			<?php  
			            				$comment_array=Comment::get_all();
			            				foreach ($comment_array as $comment):
			            				?>
			            					<tr>
			            					<td><?php echo $comment->id; ?></td>

			            					<!-- Get name of photo on which comment was posted -->

			            					<?php 
			            						$photo_obj=Photo::get_item_by_id($comment->photo_id);
			            					?>	
			            					<td><?php echo $photo_obj->title; ?></td>
			            					<td><?php echo $comment->author; ?></td>
			            					<td><?php echo substr($comment->body,0,50); ?></td>
			            					<td><?php echo $comment->date; ?></td>
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