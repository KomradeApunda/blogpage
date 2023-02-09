<?php
if(!empty($_GET['link'])){
    if($_GET['link']=="home"){
        include('pages/dashboard.php');
    }else if($_GET['link']=="inventory"){
        include('pages/inventory.php');
    }else if($_GET['link']=="assets"){
        include('pages/assets.php');
    }else if($_GET['link']=="gallery"){
        include('pages/gal.php');
    }else if($_GET['link']=='logout'){
        ?>
        <script>
            location.href='index.php';
        </script>
        <?php
    }else if($_GET['link']=='blog'){
        include('pages/blog.php');
    }else if($_GET['link']=='blog2'){
        include('pages/blog_2.php');
    }
    else{
        include('pages/dashboard.php');
    }
}  
    ?>