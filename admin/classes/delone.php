<?php
session_start();
include('../includes/connection.php');

$id=$_POST['id'];
    $conn->query("delete from blog_one where blog_id='$id'");
    ?>
    <script>
        alert('Blog Deleted')
        setTimeout(function(){
            location.reload()
        },500)
    </script>
    <?php