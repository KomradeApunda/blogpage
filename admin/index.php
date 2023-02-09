<?php
// includes
include('includes/connection.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- css links -->
    <link rel="stylesheet" href="css/css.css?v<?php echo time();?>">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootmin.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootmin5.css">
    <!-- font awesome -->
</head>
<body>
    <div class="container_wrapper">
    <div class="col_one">
        <label>Admin</label>
    </div>
    <div class="col_two">
        <form id="logForm">
        <div id="response">
            
        </div>
            <div class="form_group">
                <input type="text"class="form-control"placeholder="Enter Username"id="txt_username"name="txt_username">
                <input type="password"class="form-control"placeholder="Enter Password"id="txt_password"name="txt_password">
                <input type="button"class="btn btn-secondary bg-danger"value="Login"id="btn_login"name="btn_login">
                <span>Forgot password?</span>
            </div>
        </form>
    </div>
    </div>
    
<!-- my js links -->

<!-- bootstrap links -->
<script src="js/jquery.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/bootstrap/js/dt.js"></script>
<script src="assets/bootstrap/js/dtbt.js"></script>
</body>
</html>
<script>
$(document).ready(function(){
    $('#btn_login').on('click', function(){
        if(document.getElementById('txt_username').value=="" || document.getElementById('txt_password').value==""){
            document.getElementById('response').style.color='rgb(230,0,0)';
            $('#response').html('All fields required')
            setTimeout(function(){
                $('#response').html('')
            },2000)
        }else{
            var data=$('#logForm').serialize() + '&btn_login=btn_login'
            $.ajax({
                url:'classes/handler.php',
                method:'POST',
                data:data,
                success:function(data){
                    $('#response').html(data)
                    setTimeout(function(){
                        $('#response').html('')  
                    },203400)
                }
            })
        }
    })
})
</script>