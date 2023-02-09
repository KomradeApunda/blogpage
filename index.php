<?php
session_start();
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlogPage</title>
    <link rel="stylesheet"href="css/style.css?V=<?php echo time();?>">
    <link rel="stylesheet" href="./fontawesome/css/all.css">
    <script src="js/jquery.js"></script>
    <script src="js/dt.js"></script>
    <script src="js/dtbt.js"></script>
    <script src="js.js?v=<?php echo time();?>"></script>
    

</head>
<body>
    
<style>
        #capital{
            position: absolute;
            width: 100%;
            height: 100vh;
            background-color: black;
            opacity: 0.5;
            z-index: 5;
            display: none;
}
#cartpanel{
    
    position: absolute;
            width: 30%;
            height: 100vh;
            background-color: white;
            margin-left: 70%;
            z-index: 6;
            display: none;

}
.cart_image{
    width:100%;
    height:80vh;
}
.cart_image img{
    width:96%;
    margin-left:2%;
}
.cart_image h3{
    font-size:24px;
    margin-left:15%;
}
.cart_image input{
    width:70%;
    margin-left:15%;
    height:40px;
    border:1px solid rgb(150,150,150);
    border-radius:7px;
    margin-top:20px;
}
.cart_image h4{
    font-size:25px;
    font-weight: bold;
    margin-top:10px;
    margin-left:15%;
}
.cart_image input[type=button]{
    background-color: green;
    border:0;
    border-radius:0px;
    color:white;
}
    </style>
    <div id="capital">

    </div>
    <div id="cartpanel">
        <!--  -->
        <div class="cart_image">
            <img src="images/1.png" alt=""id="cart-image">
            <h3 id="item-title">Title</h3>
            <h4 id="item-price">Ksh. 1500</h4>
            <form id="frmcart">
            <input type="hidden"value=""id="item-id"name="item_id">
            <input type="number"value="1"name="quantity">
            <input type="button"value="ADD TO CART"id="btn_add">
            <div id="frm"></div>
        </form>
        </div>

    <!--  -->
    </div>
    
  <header>
    <div class="header-1">
        <a href="#" class="logo"> <i class=" fas fa-camera"></i><span style="color:green">ART_</span>phoTOZ</a>
        <form action="" class="search-box-container">
        <input type="search" id="search-box" class="fa fa-search">
        <label for="search-box" class="fa fa-search"> </label>
        </form>
    </div>
    <div class="header-2">
        <!-- <div id="menu-bar" class="fa fa-bars">

        </div> -->
        <style>
            #leresult{
                font-size:18px;
                margin-top:10px;
                height:20px;
                color:red;
            }
        </style>
            <!-- <div class="login form" id="form-login">
             <form id="frmlogin">
         <li id="userhid"><h3>Login Here </h3></li>
        <input type="text"name="email"placeholder="email"id="email">
        <input type="text"name="password"placeholder="password"id="password">
        <input type="button"name="Login"VALUE="LOGIN"class="btn btn-primary"style="color:#FFFFFF"id="btn_login">
        <div id="leresult"></div>
        <p>dont have account?<a href="signup.php"><span>sign up</span></a></p>
        -
    </form>
 </div> -->

<nav class="navibar">
    <a href="#">Home</a>
    <a href="#product">Blog</a>
    <a href="#gallery">Gallery</a>
    <a href="#contact">Contact us</a>
    
 </nav>
 
 <div class="icon">
       <!-- <a href="cart.php" class="fa fa-shopping-cart"></a>
        <a href="#" class="fa fa-heart"></a>
        
         <a href="#" class="fa fa-user-circle" id="user"></a> -->
    </div>
    
   
    </div>
    
</header>
<section class="home" id="home">
    <div class="image">
    <img src="images/green.jpg" alt="">
    </div>

    <div class="content">
    <span>Quick and Amazing!</span>
    <h3>Book your shoots easily, and we deliver more</h3>
   

</div>
</section>
<!--<section class="banner-container">
    <div class="banner">
        <img src="images/shot_two.jpg" alt="">
        <div class="content">
            <h3 style="color:rgb(0,130,189)">special offer</h3>
            <p>upto 45% offer</p>
           

        </div>
    </div>
    <div class="banner">
        <img src="images/pic_three.jpg" alt="">
        <div class="content">
            <h3 style="color:rgb(0,130,189)">Limited offer</h3>
            <p style="color:red">upto 50% off</p>
        
            
        </div>
    </div>

</section>-->
<style>
    
</style>
<!-- blog section -->
<section class="product" id="product">
    <h1 class="heading">Our<span> Blog</span></h1>
    <div class="box-container">
            <div class="blog">
                <div class="blog_body">
                    <?php
                    $data=$conn->query("select * from blog_one");
                    while($rows=mysqli_fetch_assoc($data)){?>
                        <div class="img_side">
                    
            <img src="admin/uploads/<?php echo $rows['blog_pic'];?>" alt="" srcset="">
            </div>
            <div class="blog_side">
            <h1 class="heading"><span>What we do</span></h1>
                <?php echo $rows['blog'];?>
            </div>
                   <?php 
                        }
                    ?>
                
            </div>
            <div class="blog_body">
            <?php
                    $data=$conn->query("select * from blog_two");
                    while($rows=mysqli_fetch_assoc($data)){?>
                      <div class="blog_side">
            <h1 class="heading"><span>What we do</span></h1>
                <?php echo $rows['blog'];?>
            </div>
                        <div class="img_side">
                    
            <img src="admin/uploads/<?php echo $rows['blog_pic'];?>" alt="" srcset="">
            </div>
          
                   <?php 
                        }
                    ?>
            </div>
            </div>
    </div>

</section>
<!-- gallery -->
<section class="product" id="gallery">
    <h1 class="heading">Latest<span> From Gallery</span></h1>
    <div class="box-container">
            <?php
                $product=$conn->query("select * from gallery");
                while($productrow=mysqli_fetch_assoc($product)){
                    ?>
                    <div class="box">
                    <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-share"></a>
                    <a href="#" class="fas fa-eye"></a>
                    </div>
                    <?php
                        echo "<img class='item-image' src='admin/uploads/gallery/".$productrow['image']."'>";
                    ?>
                    <h3 class="product-id "hidden><?php echo $productrow['img_id'];?></h3>
        
               
                <!-- <a href="#" class="btn">Add to Cart</a> -->
                </div>
                <?php
                }
            ?>
        
    </div>

</section>
            
<section class="contact" id="contact">
    <h1 class="heading">Contact<span> Us</span></h1>
    <form action=""> 
    <div class="inputBox">
        <input type="text" placeholder="Name"id="name">
        <input type="email" placeholder="Email"id="email">
    </div>
    <div class="inputBox">
        <input type="number" placeholder="Number"id="number">
        <input type="text" placeholder="Subject"id="subject">
    </div>
    <textarea placeholder="Message"cols="30" rows="10"id="message"></textarea>
    <input type="button" value="send message" class="btn"id="send">
    <div id="result_div"></div>
    </form>
    <div class="box-container"></div>
        <div class="box"></div>
</section>
<section class="newsletter" id="newsletter">
<!-- <h3>Subscribe  For Latest Updates!</h3>
<form action="">
    <input class="box" type="email" placeholder="Enter Your Email">
    <input type="submit" value="Subscribe" class="btn">
</form> -->
</section>
<section class="footer">
    
    <div class="box-container">
        <div class="box">
        <a href="#" class="logo"> <i class=" fas fa-camera"></i><span style="color:green">K</span>phoTOZ</a>
        <p>Amazing shots at an incredible price!  <br>Just a call away!</p>

        <div class="share">
            <a href="#"class="btn fab fa-facebook-f"></a>
            <a href="#"class="btn fab fa-twitter"></a>
            <a href="#"class="btn fab fa-instagram"></a>
            <a href="#"class="btn fab fa-linkedin"></a>
            
        </div>
        </div>
        <div class="box">
           <h3>Contact info</h3>
           <a href="#" class="links"><i class="fas fa-phone"></i>+2547000000</a>
           <a href="#" class="links"><i class="fas fa-phone"></i>+2540100000</a>
           <a href="#" class="links"><i class="fas fa-envelope"></i>someone@example@gmail.com</a>
           <a href="#" class="links"><i class="fas fa-map-marker-alt"></i>Mombasa, Kenya-80100</a>


<h1 class="credit">In <span style="color:red"><i class="fa fa-heart"></i></span><span> By COM</span><span style="color:black">tECH</span> | All Rights Reserved!</h1>
</section>
</body>
</html>

<script>
    $('#send').on('click', function(){
        var name=$('#name').val()
        var email=$('#email').val()
        var number=$('#number').val()
        var subject=$('#subject').val()
        var message=$('#message').val()
        $.ajax({
                method: 'POST',
                url: 'https://formsubmit.co/ajax/otienoelly56@gmail.com',
                dataType: 'json',
                accepts: 'application/json',
                data: {
                    NAME:name,
                    EMAIL:email,
                    NUMBER:number,
                    SUBJECT:subject,
                    MESSAGE:message
    },
    success: (data) => console.log(data),
    error: (err) => console.log(err)
});
    })
    

    let countDate=new Date('october 29,2022 00:00:00').getTime();

    function countDown(){
        let now=new Date().getTime();
        gap = countDate - now;

        let second=1000;
        let minute=second * 60;
        let hour=minute * 60;
        let day=hour * 24;

        let d= Math.floor(gap / (day));
        let h= Math.floor((gap % (day)) / (hour));
        let m= Math.floor((gap % (hour)) / (minute));
        let s= Math.floor((gap % (minute)) / (second));
       
        document.getElementById('day').innerText=d;
        document.getElementById('hour').innerText=h;
        document.getElementById('minute').innerText=m;
        document.getElementById('second').innerText=s;
    } 
    
   
</script>

<script> 
var user=document.getElementById('user').onclick=function(){
   var login=document.getElementById('form-login')
    login.style.display='block'
     }
// hidding
     var userid=document.getElementById('userhid').onclick=function(){
   var login=document.getElementById('form-login')
    login.style.display='none'
     }
     var userid=document.getElementById('carthid').onclick=function(){
   var login=document.getElementById('add-cart')
    login.style.display='none'
     }

     var btncat=document.getElementById('cart-btn').onclick=function(){
 var cart=document.getElementById('add-cart');
 
  
    cart.style.display='block';
    
  }

</script>