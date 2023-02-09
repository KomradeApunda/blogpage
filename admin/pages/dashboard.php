<?php
include('includes/connection.php');
if(isset($_POST['save'])){
     // Get editor content
     $editorContent = $_POST['editor'];
     // Check whether the editor content is empty
     $targetDir = "uploads/"; 
     $allowTypes = array('jpg','png','jpeg','jfif'); 
     
     $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
     $fileNames = array_filter($_FILES['files']['name']); 
     if(!empty($fileNames)){ 
     foreach($_FILES['files']['name'] as $key=>$val){ 
             // File upload path 
             $fileName = basename($_FILES['files']['name'][$key]); 
             $targetFilePath = $targetDir . $fileName; 
              
             // Check whether file type is valid 
             $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
             // if(in_array($fileType, $allowTypes)){ 
                 // Upload file to server 
                 if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                     // Image db insert sql 
                     //$insertValuesSQL .= "('".$fileName."','".$department."','".$cat."','".$type."','".$zero."',"; 
                 }else{ 
                     $errorUpload .= $_FILES['files']['name'][$key].' | '; 
                 } 
             // }else{ 
             //     $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
             // } 
     } 
          
     //     // Error message 
     //     $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
     //     $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
     //     $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 
          
         // if(!empty($insertValuesSQL)){ 
             //$insertValuesSQL = trim($insertValuesSQL, ','); 
             // Insert image file name into database 
             $insert = $conn->query("INSERT INTO blog_one(blog, blog_pic) VALUES ('$editorContent','$fileName')"); 
             if($insert){ 
                 ?><script>alert('Saved')</script><?php
             }else{ 
                 ?><script>alert("Sorry, there was an error uploading your file."); </script><?php
             } 
         // }else{ 
         //     ?><script>//alert("Upload failed! ");</script><?php 
         // } 
     }else{ 
       ?><script>alert('Please select a file to upload.')</script><?php
     }
}
?>
<script src="ckeditor/ckeditor.js"></script>
<style>
.home_wrapper .part_a{
    width:90%;
    margin-top:15px;
}
.home_wrapper .part_a textarear{
    width:90%;
    height:70vh;
}
.part_b{
    display:block;
    margin-left:1%;
    width:fit-content;
}
.part_one input[type=submit]{
    cusor:pointer;
}
.part_b button{
    width:90%;
    margin-top:15px;
}
</style>
<div class="home_wrapper">
    <div class="part_a">
        <form action=""method="POST"enctype="multipart/form-data">
    <textarea name="editor" id="myTextarea" rows="10" cols="80"required>
        Type Your Article ...
    </textarea>
    <input type="file"class="form-control"name="files[]"multiple>
    <input type="submit"value="Save"class="btn btn-primary"style="margin-top:15px"name="save">
    </form>
    </div>
    <div class="part_b">
<button class="btn btn-info"style="color:#FFFFFF;margin-bottom:15px;margin-top:15px;"><a href="home.php?link=<?php echo 'inventory' ?>"style="color:#FFFFFF">BLOG 2</a></button>
<a href="../index.php"><button class="btn btn-info"style="color:#FFFFFF"><i class="fa fa-globe"></i> Visit</button></a>
<button class="btn btn-info"style="color:#FFFFFF"><i class="fa fa-eye"></i><a href="home.php?link=<?php echo 'blog' ?>"style="color:#FFFFFF"> View</a></button>
    </div>

</div>

<!-- script -->
<script>
CKEDITOR.replace('editor')
</script>