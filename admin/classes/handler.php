<?php
session_start();
include('../includes/connection.php');
/*signing into the */
if(isset($_POST['btn_login'])){
    $loguser=$_POST['txt_username'];
    $logpass=md5($_POST['txt_password']);

    $logqry="select * from A_log where username=? and password=? ";
    //create a statement
    $stmt=mysqli_stmt_init($conn);
    //prepare the prepared statements
    if(!mysqli_stmt_prepare($stmt,$logqry)){
        echo "Sql staments Failed";
    }else{
    //bind parameters to the place holders
        mysqli_stmt_bind_param($stmt, "ss", $loguser, $logpass);	
        //Run parameters inside db
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        $row=mysqli_fetch_assoc($result);
        $count=mysqli_num_rows($result);
        if($count>=1){
            $_SESSION['verification']=$row['username'];
            echo "Loading..."
            ?>
            <script>
                setTimeout(function(){
                    location.href='home.php';
                },2000)
                
            </script>
            <?php
        }else{
            echo "<span class='error'>Wrong Username or Password!</span>";
        }
}
    }
else if(isset($_POST['btn_add_item'])){
    $name=$_POST['txt_name'];
    $serial=$_POST['txt_serial'];
    $selqry="select * from assets where item_serial=?";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$selqry)){
        echo "<span class='error'>Sql Statements Failed!</span>";
    }else{
        mysqli_stmt_bind_param($stmt,"s",$serial);
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        $rowcount=mysqli_num_rows($result);
        if($rowcount<1){
            $insqry="insert into assets(item_name,item_serial) values(?,?)";
            $statement=mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($statement,$insqry)){
                echo "<span class='error'>Statements Failed!</span>";
            }else{
                mysqli_stmt_bind_param($statement,'ss', $name,$serial);
                if(mysqli_stmt_execute($statement)){
                    echo "Item Added Successfully";
                    ?>
                    <script>
                        setTimeout(function(){
                            location.reload();
                        },2500)
                    </script>
                    <?php
                }else{
                    echo "<span class='erro'>Failed!</span>";
                }
            }
        }else{
            echo "<span class='error'>Item Already Exists!</span>";
        }
    }
}
else if(isset($_POST['btn_add_member'])){
    $fname=$_POST['fname'];
    $mname=$_POST['mname'];
    $lname=$_POST['lname'];
    $age=$_POST['age'];
    $residence=$_POST['residence'];
    $email=$_POST['email'];
    // $dob=$_POST['dob'];
    $telephone=$_POST['telephone'];
    ?><script>alert('<?php echo $telephone;?>')</script><?php

    // registering a member
    $targetDir = "assets/uploads/"; 
    $allowTypes = array('png','jpeg','jpg'); 
    
    $fileNames = array_filter($_FILES['files']['name']); 
    if(!empty($fileNames)){ 
        foreach($_FILES['files']['name'] as $key=>$val){ 
            // File upload path 
            $fileName = basename($_FILES['files']['name'][$key]); 
            $targetFilePath = $targetDir.$fileName; 
            
            // Check whether file type is valid 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
            if(in_array($fileType, $allowTypes)){ 
                // Upload file to server 
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key],$targetFilePath)){ 
                    // Image db insert sql 
                    $insertValuesSQL .= "('".$fileName."','".$idno."',"; 
                }else{ 
                    $errorUpload .= $_FILES['files']['name'][$key].' | '; 
                } 
            }else{ 
                $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
            } 
        } 
         
        // Error message 
        
         
        if(!empty($insertValuesSQL)){ 
            // Insert image file name into database 
            $insert = $conn->query("INSERT INTO member_detail (first_name,middle_name,last_name,age,residence,email,telephone,pic) VALUES('$fname','$mname','$lname','$age','$residence','$email','$telephone','$fileName')"); 
            if($insert){
                echo "Done";
            }
        }
    }
}else{
    $id=$_POST['id'];
    $conn->query("delete from gallery where img_id='$id'");
    ?>
    <script>
        alert('Image Deleted')
        setTimeout(function(){
            location.reload()
        },500)
    </script>
    <?php
}
?>