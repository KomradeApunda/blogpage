<?php
include('includes/connection.php');
if(isset($_POST['save'])){
     // Get editor content
     $editorContent = $_POST['editor'];
     $blogid=$_POST['blog_id'];
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
          
                 if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                     // Image db insert sql 
                     //$insertValuesSQL .= "('".$fileName."','".$department."','".$cat."','".$type."','".$zero."',"; 
                 }else{ 
                     $errorUpload .= $_FILES['files']['name'][$key].' | '; 
                 } 
           
     } 
          
   
             $insert = $conn->query("update blog_two set blog='$editorContent' ,blog_pic='$fileName' where blog_id='$blogid'"); 
             if($insert){ 
                 ?><script>alert('Update successful')</script><?php
             }else{ 
                 ?><script>alert("Sorry, there was an error uploading your file."); </script><?php
             } 
         
     }else{ 
       //if pic isn't being replaced

        $insert = $conn->query("update blog_two set blog='$editorContent' where blog_id='$blogid'"); 
        if($insert){ 
            ?><script>alert('Update successful')</script><?php
        }else{ 
            ?><script>alert("Sorry, there was an error uploading your file."); </script><?php
        }
     }
}
?>
<style>
      .whole_blog{
        display:block
    }
    .blog_one,
    .blog_two{
        width:96%;
        margin-top:20px;
        margin-left:1%;
        display:block;
    }
    .whole_blog img{
        max-width:100%;
    }
    #edit_panel{
        display:none;
        width:70%;
        height:fit-content;
        padding-bottom:15px;
        background-color:#FFFFFF;
        position:absolute;
        border-radius:5px;
        z-index:106;
    
    }
</style>
<div id="edit_panel">
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
            <input type="hidden"name="blog_id"id="txt_id">
    <textarea name="editor" id="myTextarea" rows="10" cols="80"required>
        Type Your Article ...
    </textarea>
    <input type="file"class="form-control"name="files[]"multiple>
    <input type="submit"value="Save"class="btn btn-primary"style="margin-top:15px"name="save">
    </form>
    </div>
    <div class="part_b">
    </div>

</div>
<!-- end of edit panel -->
</div>
<div class="whole_blog"id="result">
<div class="blog_two">
<?php
$data=$conn->query("select * from blog_two");
                    while($rows=mysqli_fetch_assoc($data)){?>
                        <div class="blog_side">
                    <div class="img_side">
                    <i class="fa fa-trash del-two"style="color:red;font-size:18px;"></i><span><i class="fa fa-edit edit-two"style="color:rgb(0,130,189);font-size:18px;"></i></span>
                    <img src="uploads/<?php echo $rows['blog_pic'];?>" alt="" srcset="">
                    <span hidden class="blog_id"><?php echo $rows['blog_id'];?></span>
                    </div>
                    <div class="the_blog"><?php echo $rows['blog'];?></div>
            </div>
            <?php
                    }
                    ?>
</div>
</div>

<!-- script links -->
<script src="js/jquery.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/bootstrap/js/dt.js"></script>
<script src="assets/bootstrap/js/dtbt.js"></script>
<script>
  
    $('.del-two').on('click', function(){
        var id=$(this).closest('.img_side').find('.blog_id')[0].innerText;
        var state=confirm('Delete this blog?')
        if(state==true){
            $.ajax({
                url:'classes/deltwo.php',
                method:'POST',
                data:{id:id},
                success:function(data){
                    $('#result').html(data)
                }
            })
        }else{

        }
    })
   
    $('.edit-two').on('click', function(){
        document.getElementById('edit_panel').style.display='block'
        document.getElementById('dark_panel').style.display='block'
        document.getElementById('txt_id').value=$(this).closest('.img_side').find('.blog_id')[0].innerText;
        document.getElementById('myTextarea').value=$(this).closest('.blog_side').find('.the_blog')[0].innerText;
        CKEDITOR.replace('editor')

    })
    $('#dark_panel').on('click', function(){
        document.getElementById('edit_panel').style.display='none'
        document.getElementById('dark_panel').style.display='none'
    })

    // end of script
</script>