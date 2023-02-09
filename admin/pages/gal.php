<?php
include('includes/connection.php');
if(isset($_POST['save'])){
    // Get editor content
    // $editorContent = $_POST['editor'];
    // Check whether the editor content is empty
    $targetDir = "uploads/gallery/"; 
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
            $insert = $conn->query("INSERT INTO gallery(image) VALUES ('$fileName')"); 
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
<style>
    .gallery{
        display:flex;
    }
    .gallery img{
        width:90%;
    }
    .part_a{
        width:70%;
        height:fit-content;
        display:flex;
        flex-wrap:wrap;
    }
    .part_b{
        width:30%;
        display:block;
    }
    .image_class{
        display:block;
        width:30%;
        margin-left:2.5%;
        margin-top:15px;
    }
</style>
<div class="gallery">
    <div class="part_a">
    <?php
                    $data=$conn->query("select * from gallery");
                    while($rows=mysqli_fetch_assoc($data)){?>
                    <div class="image_class">
            <img src="uploads/gallery/<?php echo $rows['image'];?>">
            <span hidden class="image_id"><?php echo $rows['img_id'];?></span>
            <i class="fa fa-trash"style="color:red;margin-top:10px;font-size:18px;"></i>
            </div>
            <?php
                    }
                    ?>
    </div>
    <div class="part_b"id="result">
        <span style="margin-top:20px;font-size:16px;font-weight:bold;color:rgb(0,130,189)">Add Image</span>
    <form action=""method="POST"enctype="multipart/form-data">
        <input type="file"name="files[]"multiple class="form-control">
        <input type="submit"value="save"name="save"class="btn btn-primary"style="margin-top:20px">
    </form>
    </div>
</div>
<!-- script links -->
<script src="js/jquery.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/bootstrap/js/dt.js"></script>
<script src="assets/bootstrap/js/dtbt.js"></script>
<script>
    $('.fa-trash').on('click', function(){
        var id=$(this).closest('.image_class').find('.image_id')[0].innerText;
        var state=confirm('Delete this image?')
        if(state==true){
            $.ajax({
                url:'classes/handler.php',
                method:'POST',
                data:{id:id},
                success:function(data){
                    $('#result').html(data)
                }
            })
        }else{

        }
    })
</script>