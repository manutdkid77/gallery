<!-- Front end individual photo page -->
<?php include("includes/header.php"); ?>
<?php

if(empty($_GET['id']))
    redirect('index.php');

$photo_obj=Photo::get_item_by_id($_GET['id']);

//Image doesn't exist then redirect
if(empty($photo_obj))
    redirect('index.php');

if(isset($_POST['submit'])) {  //Submit comment
    $author = trim($_POST['author']);
    $body = trim($_POST['body']);

   //Create comment
   $new_comment=Comment::create_comment($photo_obj->id,$author,$body);    
   if($new_comment && $new_comment->create_item()){
        redirect('photo.php?id='.$photo_obj->id);
   }
   else{
        $error_msg='Comment could not be posted';
   }
} 


?>


<style type="text/css">
    hr:first-of-type{ display: none; }
    .media{ margin:2em 0; }
</style>

            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $photo_obj->title;?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#"><?php echo basename(__FILE__); ?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $photo_obj->date;?></p>

               <hr>

                <?php 
                    $photo_path='admin'.DS.$photo_obj->upload_directory.DS.$photo_obj->filename;
                ?>
                <img class="img-responsive" src="<?php echo $photo_path;?>" alt="">

                <!-- Post Content -->
                <p class="lead" style="margin:1em 0;"><?php echo $photo_obj->description; ?></p>

                <hr>

                
                <!--Single Comment -->

                <?php $comment_array=Comment::find_comments($photo_obj->id); ?>
                    <?php  foreach($comment_array as $comment_obj): ?>
                        <div class="media">
                            <a class="pull-left" href="#">
                            <?php 
                                $avatar_url=file_get_contents('http://uifaces.com/api/v1/random');
                                $avatar_url=json_decode($avatar_url,true);
                            ?>
                                <img style="border-radius:50%;" class="media-object" src="<?php echo $avatar_url['image_urls']['bigger']; ?>" alt="">
                            </a>

                            <div class="media-body">
                                <h4 class="media-heading"><?php echo $comment_obj->author; ?>
                                    <small><?php echo $comment_obj->date; ?></small>
                                </h4>
                                <?php echo $comment_obj->body; ?>
                            </div> <!-- End of single comment -->

                        </div> 
                    <?php endforeach; ?>

                <hr>
                <!-- Comments Form -->
                
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post">
                        <div class="form-group">
                            <label for="">Author</label>
                            <input type="text" class="form-control" name="author">
                        </div>
                        <div class="form-group">
                            <label for="">Message</label>
                            <textarea class="form-control" rows="3" name="body" style="resize:none;"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        <?php if(!empty($error_msg)): ?>
                            <div class="alert alert-danger">
                                <?php echo $error_msg; ?>
                            </div>
                        <?php endif; ?>
                    </form>
                </div>
                
            </div>

        <?php include("includes/footer.php"); ?>

