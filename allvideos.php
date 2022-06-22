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
                    <li><a href="contact.php" class="nav_link active-link">Contact Us</a></li>
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
           <section class="allvideos">
               <div class="sliderbtn-container">
               <?php 
                $select = new User;
                $selectvideo = $select->selectAllVideos();
                if(!empty($selectvideo)){ ?>
                <form action="" method="post" id="deleteallform">
               <button class="deletebtn" id="deletebutton">
                   Delete All Videos
               </button>
               </form>
               <?php }?>
               </div>

               <div class="deletecarrier">
               <div class="deletemodal">
                   <h2>Are you sure you want to delete all the videos?</h2>
                   <div class="btn-container">
                        <button id="yes">Yes</button>
                        <button id="no">No</button>
                   </div>
               </div>
               </div>

               <div class="videos-container">
                   <?php 
                $select = new User;
                $selectvideo = $select->selectAllVideos();
                if(!empty($selectvideo)){
                    foreach ($selectvideo as $key => $value) {
                   ?>
                   <div class="vid">
                        <video width="320" height="240" controls>
                        <source src="videofolder/<?php echo $value['video_name'];?>" type="video/mp4">
                      </video>
                      <h4>Video Text</h4>
                      <div class="videotext"><?php echo $value['video_text'];?></div>
                      <div class="buttons-container">
                         <button class="deletebtn">
                            <a href="deletevideo.php?videoid=<?php echo $value['unique_id'];?>">Delete Video</a>
                         </button>
                         <button class="editbtn">
                         <a href="editvideo.php?videoid=<?php echo $value['unique_id'];?>">Edit Video</a>
                         </button>
                      </div>
                      </div>
               <?php  }} else {?>
                <h2>No Videos Added Yet</h2>
                <?php }?>
                </div>
           </section>
        </main>

    </div>

    <!--=========== SCROLL REVEAL ========  -->
    <script src="js/scrollreveal.min.js"></script>

    <!-- ========== MIXTUP JS ========= -->
    <script src="js/mixitup.min.js"></script>

    <script>
    var deletebutton = document.querySelector('#deletebutton')
    var deleteallform = document.querySelector('#deleteallform')
    var yesbtn = document.querySelector("#yes");
    var nobtn = document.querySelector("#no");

    deleteallform.onsubmit = (e) =>{
     e.preventDefault();
     showCaution();
    }

    function showCaution(){
        document.querySelector('.deletemodal').style.visibility = "visible";
        yesbtn.onclick = function(){
            document.querySelector('.deletemodal').style.visibility = "hidden";
            DeleteAllContent();
        }
        nobtn.onclick = function(){
            document.querySelector('.deletemodal').style.visibility = "hidden";
        }
    }

    function DeleteAllContent(){
                let xhr = new XMLHttpRequest(); //creating XML Object
                xhr.open("POST", "deleteallvid.php", true);
                xhr.onload = () => {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                            if (xhr.status === 200) {
                                let data = xhr.response;
                                console.log(data);
                                if(data === "success"){
                                    deletebutton.textContent = "Deleted";
                                    document.location.reload();
                                }
                            }
                        }
                    }
                    // we have to send the information through ajax to php
                let formData = new FormData(deleteallform); //creating new formData Object

                xhr.send(formData); //sending the form data to php
                }

    </script>

    <!--============= MAIN JS ===========-->
    <script src="js/main.js"></script>

</body>

</html>