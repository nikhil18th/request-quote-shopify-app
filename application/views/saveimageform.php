<?php $this->load->view('header');

?>

<!DOCTYPE html>  
 <html>  
 <head>  
      <title>Webslesson | <?php echo $title; ?></title>  
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />  
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
 </head>  
 <body> 
      <div id="uploaded_image">  
           </div>  
      <div class="container">  
           <br /><br /><br />  
           <h3 align="center"><?php echo $title; ?></h3>  
           <form method="post" id="upload_form" align="center" enctype="multipart/form-data">  
                <input type="file" name="image_file" id="image_file" />  
                <br />  
                <br />  
                <input type="submit" name="upload" id="upload" value="Upload" class="btn btn-info" />  
           </form>  
           <br />  
           <br />  
            
      </div>  
 </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
     $("#upload").val("Upload");
     if($(".uploaded_image:has(img)")){
       $("#upload").val("");
       $("#upload").val("Update");
     }else{
       $("#upload").val("Upload");
     }

      $('#upload_form').on('submit', function(e){  
           e.preventDefault();  
           if($('#image_file').val() == '')  
           {  
                alert("Please Select the File");  
           }  
           else  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>homepage/ajax_upload",   
                     //base_url() = http://localhost/tutorial/codeigniter  
                     method:"POST",  
                     data:new FormData(this),  
                     contentType: false,  
                     cache: false,  
                     processData:false,  
                     success:function(data)  
                     {  
                        if(data){
                          // $("#upload_form")[0].reset();
                        }

                          $('#uploaded_image').html(data);  
                     }  
                });  
           }  
      });  
 });  
 </script>  
