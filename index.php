<?php include("includes/header.php"); ?>

<?php
    $photo_array=Photo::get_all();
?>

<div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-12">

     <div class="thumbnails row">

        <?php foreach($photo_array as $photo_object):?>
        
            <div class="col-xs-6 col-md-3 img-container grid-item">
                
                <a href="photo.php?id=<?php echo $photo_object->id;?>" target="blank_t">
                    <img src="<?php echo 'admin'.DS.$photo_object->upload_directory.DS.$photo_object->filename; ?>" alt="" class="img-responsive">
                </a>

            </div>
        
        <?php endforeach;?>
     </div>

    </div>
    
    <!-- /.row -->

<?php include("includes/footer.php"); ?>