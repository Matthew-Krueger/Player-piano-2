<!DOCTYPE html>
<html>
     <head>
          <meta charset="UTF-8">
          <title>Upload</title>
          <link rel="stylesheet" href="/upload/css/upload.css">
     </head>
     <body>
          <form class="upload" id="upload" action="upload.php" method="post" enctype="multipart/form-data">
               <fieldset>
                    <legend>Upload Files</legend>
                    <input type="file" id="file" name="files[]" required multiple />
                    <input type="submit" id="submit" name="submit" value="Upload" />
               </fieldset>

               <div class="bar">
                    <span class="bar-fill" id="pb"><span class="bar-fill-text" id="pt"></span></span>
               </div>

               <div class="uploads" id="uploads">
                    UErrors will error here
               </div>

          </form>
          <script src="/upload/js/upload.js"></script>
          <script type="text/javascript">

          document.getElementById("submit").addEventListener("click", function(e){
               e.preventDefault();

               var  fileInput = document.getElementById("file"),
                    progressBarElement = document.getElementById("pb")
                    progressBarText = document.getElementById("pt");

               app.uploader({
                    files: fileInput,
                    progressBar: progressBarElement,
                    progressText: progressBarText,
                    processor: "upload.php",

                    finished: function(data){

                    },

                    error: function(){
                         console.log("Not working");
                    }
               });

          });
          </script>
     </body>
</html>
