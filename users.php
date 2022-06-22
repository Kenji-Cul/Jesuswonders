<?php 
session_start();
include_once "projectlog.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jesus Wonders</title>

    <!--========== FAVICON =============-->
    <link rel="shortcut icon" href="" type="image/x-icon">

    <!--========== REMIX ICONS =========  -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">


    <!--======== STYLES LINK =============-->
    <link rel="stylesheet" href="css/style.css">

    <!-- ========= SWIPER CSS ======== -->
    <link rel="stylesheet" href="css/swiper-bundle.min.css">
    <style>
        header {
            border-radius: 0 0 1rem 1rem;
            background-color: var(--logo-color);
            box-shadow: 0 2px 4px hsla(0, 0%, 1%, 1);
        }
        
        footer {
            margin-top: 110em;
        }
    </style>
</head>

<body>
    <div class="loader">
        <div></div>
    </div>
    <div class="wrap-container">
        <!--================ HEADER =============-->
        <header id="header">
            <a href="index.php" class="logo">JesusWonders</a>

            <nav class="nav">
                <div class="cancel">
                    <i class="ri-close-circle-fill"></i>
                </div>
                <ul class="nav-menu">
                    <li><a href="index.php" class="nav_link">Home</a></li>
                    <li><a href="about.php" class="nav_link">About</a></li>
                    <li><a href="contact.php" class="nav_link">Contact Us</a></li>
                    <?php if(isset($_SESSION['admin'])){?>
                        <li><a href="logout.php" class="nav_link">Log out</a></li>
                        <?php }?>
                </ul>
            </nav>

            <div class="menudiv">
                <i class="ri-menu-2-line"></i>
            </div>
        </header>

        <main>
           <section class="users">
               <h2>Users</h2>
               <div class="user-container">
                   <?php 
                $alluser = new User;
                $allusers = $alluser->selectAllUsers();
                if(!empty($allusers)){
                    foreach ($allusers as $key => $value) {
                   ?>
                   <div class="user">
                       <div class="label">
                           <h4>Name: </h4>
                           <h4>Email: </h4>
                       </div>
                       <div class="details">
                       <h4><?php echo $value['username'];?></h4>
                       <h4><?php echo $value['useremail'];?></h4>
                       </div> 
                   </div>
                   <?php } }?>
               </div>
           </section>
        </main>

    </div>

    <!--=========== SCROLL REVEAL ========  -->
    <script src="js/scrollreveal.min.js"></script>

    <!-- ========== MIXTUP JS ========= -->
    <script src="js/mixitup.min.js"></script>


    <!--============= MAIN JS ===========-->
    <script src="js/main.js"></script>

</body>

</html>