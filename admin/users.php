<?php include("includes/header.php"); ?>
<?php if(!$session->login_status()) redirect('login.php'); ?>

<style type="text/css">

	.image-col{
		display: flex;
    	flex-direction: column;
    	align-items: center;
	}
	.image-col img {width: 100px;margin:0.2em 0; margin-right: auto;}
	.pictures_link {margin :1em 0; margin-right: auto;}
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
			                Users
			                <small>Dashboard</small>
			            </h1>

			            <div class="col-md-12 table-responsive">
			            	<table class="table table-striped table-condensed">
			            		<thead>
			            			<tr>
			            				<th>ID</th>
			            				<th>Username</th>
			            				<th>Avatar</th>
			            				<th>Firstname</th>
			            				<th>Last Name</th>
			            			</tr>
			            		</thead>
			            		<tbody>
			            			<?php  
			            				$user_array=User::get_all();
			            				foreach ($user_array as $user):
			            					if($user->random_avatar=='no')
			            						$imageloc=$user->avatar_path.DS.$user->avatar_name;
			            					else
			            						$imageloc=$user->avatar_name;
			            				?>
			            					<tr>
			            					<td><?php echo $user->id; ?></td>
			            					<td><?php echo $user->username; ?></td>
			            					<td class="image-col">
			            						<img class="img-responsive img-circle" src="<?php echo $imageloc;?>">
			            						<div class="pictures_link">
			            							<a href="delete_user.php?id=<?php  echo $user->id;?>" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
			            							<a href="edit_user.php?id=<?php  echo $user->id;?>" class="btn btn-sm btn-warning"><span class="	glyphicon glyphicon-pencil"></span></a>
			            							<a href="#" class="btn btn-sm btn-info"><span class="	glyphicon glyphicon-zoom-in"></span></a>
			            						</div>
			            					</td>
			            					<td><?php echo $user->first_name; ?></td>
			            					<td><?php echo $user->last_name; ?></td>
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