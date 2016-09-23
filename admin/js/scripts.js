$(document).ready(function() {

        //Dropzone configuration

        Dropzone.options.myAwesomeDropzone = { 

        //Set basic parameters 
        url:'ajax-upload.php',
        maxFilesize:5,
        autoProcessQueue: false,
        uploadMultiple: false,

        // The setting up of the dropzone
        init: function() {
            var myDropzone = this;

            this.on("sending", function(file, xhr, formData) {
                //Send title with form
                formData.append("title",$('#title-box').val()); 
                //Send description with form
                formData.append("description",$('#description-box').val()); 
              });

             this.on("success", function(file, responseText) {
                  // Handle the responseText here. For example, add the text to the preview element:
                  responseText='File uploaded successfully';
                  $('#submit-btn').hide();
                  $('.message-box').removeClass('hidden').html(responseText);
                });


            // Process Dropzone or send form when submit button clicked

            $("#submit-btn").click(function (e) {
                e.preventDefault();
                e.stopPropagation();
                myDropzone.processQueue();
            }); 
        }
    }
});