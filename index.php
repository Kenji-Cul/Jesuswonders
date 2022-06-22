<?php 
session_start();
include_once "projectlog.php"
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



</head>

<body>
    <div class="loader">
        <div></div>
    </div>
    <div class="wrap-container">
        <!--============== HEADER  ================-->
        <header id="header">
            <a href="index.php" class="logo">JesusWonders</a>

            <nav class="nav">
                <div class="cancel">
                    <i class="ri-close-circle-fill"></i>
                </div>
                <ul class="nav-menu">
                    <li><a href="#slider" class="nav_link active-link">Home</a></li>
                    <li><a href="#posts" class="nav_link">Posts</a></li>
                    <li><a href="#services" class="nav_link">Services</a></li>
                    <li><a href="#video-con" class="nav_link">Messages</a></li>
                    <li><a href="about.php" class="nav_link">About</a></li>
                    <?php if(isset($_SESSION['username'])){?>
                        <li><a href="#" class="nav_link"><?php echo "Hi,".$_SESSION['username'];?></a></li>
                        <li><a href="logout.php" class="nav_link">Log Out</a></li>
                        <?php } else {?>
                    <li><a href="signup.php" class="nav_link">Sign Up</a></li>
                    <li><a href="login.php" class="nav_link">Log In</a></li>
                    <?php }?>
                </ul>
            </nav>

            <div class="menudiv">
                <i class="ri-menu-2-line"></i>
            </div>
        </header>

        <main>
            <!--=============== HOME SLIDER ================ -->
            <section class="slider" id="slider">
                <div class="swiper slider-counter">
                    <div class="slider-container swiper-wrapper">
                        <div class="slider-div swiper-slide">
                            <img src="images/church1.jpg" alt="Church Image">
                            <div class="slider-text">Welcome to Jesus Wonders International Ministries</div>
                        </div>
                        <div class="slider-div swiper-slide">
                            <img src="images/church2.jpg" alt="Church Image">
                            <div class="slider-text">A place where God has chosen to spread his word</div>
                        </div>
                        <div class="slider-div swiper-slide">
                            <img src="images/church6.jpg" alt="Church Image">
                            <div class="slider-text">Thank the Lord For You have come to the house of the lord</div>
                        </div>
                        <div class="slider-div swiper-slide">
                            <img src="images/church4.jpg" alt="Church Image">
                            <div class="slider-text">The Presence of the Lord is always here and will always be here</div>
                        </div>
                    </div>

                    <div class="swiper-pagination"></div>
                </div>
            </section>

            <!--============== VIDEO SECTION ================-->

            <section class="video-container" id="video-con">
                <h2>Latest Service Videos</h2>
                <div class="videoflex">
                    <div class="video left-div">
                    <?php 
                            $video = new User;
                            $videoview = $video->selectVideo();
                            if(!empty($videoview)){
                                foreach ($videoview as $key => $value) {                              
                            ?>
                        <video id="firstvideo" width="320" height="240">
                        <source src="videofolder/<?php echo $value['video_name'];?>" type="video/mp4">
                      </video>
                        <div class="controls">
                            <div class="orange-bar">
                                <div class="orange-juice"></div>
                            </div>
                            <div class="buttons">
                                <button id="play-pause"> <i class="ri-play-fill" id="iconplay"></i></button>
                            </div>
                            <div class="videoDuration">
                                <span id="videoTime"></span> / <span id="videoDuration"></span>
                            </div>
                            <div class="projector" title="Projector mode">
                                <i class="ri-projector-line"></i>
                            </div>
                            <div class="volume">
                                <i class="ri-volume-up-line" id="volumeicon"></i>
                                <input type="range" class="volume" min="0" max="1" step="0.01" value="1">
                            </div>
                        </div>
                        <div class="video-text">
                            <p><?php echo $value['video_text'];?></p>
                        </div>
                        <?php }} else{ 
                             echo "<h2>No videos yet<h2><br><i class='ri-file-user-fill'></i>";
                        }?>
                    </div>


                    <div class="video right-div">
                    <?php 
                            $video = new User;
                            $videoview = $video->selectVideo();
                            if(!empty($videoview)){
                                foreach ($videoview as $key => $value) {                              
                            ?>
                    <video id="secondvideo" width="320" height="240">
                        <source src="videofolder/<?php echo $value['video_name'];?>" type="video/mp4">
                      </video>
                        <div class="controls">
                            <div class="orange-bar">
                                <div class="orange-juice"></div>
                            </div>
                            <div class="buttons">
                                <button id="play-pause2"> <i class="ri-play-fill" id="iconplay"></i></button>
                            </div>
                            <div class="videoDuration">
                                <span id="videoTime"></span> / <span id="videoDuration"></span>
                            </div>
                            <div class="projector" title="Projector mode">
                                <i class="ri-projector-line"></i>
                            </div>
                            <div class="volume">
                                <i class="ri-volume-up-line" id="volumeicon"></i>
                                <input type="range" class="volume" min="0" max="1" step="0.01" value="1">
                            </div>
                        </div>
                        <div class="video-text">
                            <p><?php echo $value['video_text'];?></p>
                        </div>
                        <?php }}else{ 
                              echo "<h2>No videos yet<h2><br><i class='ri-file-user-fill'></i>";
                        }?>
                    </div>

                    <div class="video left-div">
                    <?php 
                            $video = new User;
                            $videoview = $video->selectVideo();
                            if(!empty($videoview)){
                                foreach ($videoview as $key => $value) {                              
                            ?>
                    <video id="thirdvideo" width="320" height="240">
                        <source src="videofolder/<?php echo $value['video_name'];?>" type="video/mp4">
                      </video>
                        <div class="controls">
                            <div class="orange-bar">
                                <div class="orange-juice"></div>
                            </div>
                            <div class="buttons">
                                <button id="play-pause3"> <i class="ri-play-fill" id="iconplay"></i></button>
                            </div>
                            <div class="videoDuration">
                                <span id="videoTime"></span> / <span id="videoDuration"></span>
                            </div>
                            <div class="projector" title="Projector mode">
                                <i class="ri-projector-line"></i>
                            </div>
                            <div class="volume">
                                <i class="ri-volume-up-line" id="volumeicon"></i>
                                <input type="range" class="volume" min="0" max="1" step="0.01" value="1">
                            </div>
                        </div>
                        <div class="video-text">
                            <p><?php echo $value['video_text'];?></p>
                        </div>
                        <?php }}else{ 
                              echo "<h2>No videos yet<h2><br><i class='ri-file-user-fill'></i>";
                        }?>
                    </div>

                    <div class="video right-div">
                         <?php 
                            $video = new User;
                            $videoview = $video->selectVideo();
                            if(!empty($videoview)){
                                foreach ($videoview as $key => $value) {                              
                            ?>
                    <video id="fourthvideo" width="320" height="240">
                        <source src="videofolder/<?php echo $value['video_name'];?>" type="video/mp4">
                      </video>
                        <div class="controls">
                            <div class="orange-bar">
                                <div class="orange-juice"></div>
                            </div>
                            <div class="buttons">
                                <button id="play-pause4"> <i class="ri-play-fill" id="iconplay"></i></button>
                            </div>
                            <div class="videoDuration">
                                <span id="videoTime"></span> / <span id="videoDuration"></span>
                            </div>
                            <div class="projector" title="Projector mode">
                                <i class="ri-projector-line"></i>
                            </div>
                            <div class="volume">
                                <i class="ri-volume-up-line" id="volumeicon"></i>
                                <input type="range" class="volume" min="0" max="1" step="0.01" value="1">
                            </div>
                        </div>
                        <div class="video-text">
                            <p><?php echo $value['video_text'];?></p>
                        </div>
                        <?php }}else{ 
                               echo "<h2>No videos yet<h2><br><i class='ri-file-user-fill'></i>";
                        }?>
                    </div>
                </div>
            </section>

            <!--============= POSTS SECTION ==============-->

            <section class="posts" id="posts">
                <h2>Latest Posts</h2>
                <div class="post-container">
                <?php 
                            $picture = new User;
                            $picview = $picture->selectPosts();
                            if(!empty($picview)){
                                foreach ($picview as $key => $value) {                              
                            ?>
                    <div class="post-div left-div">
                        <img src="postfolder/<?php echo $value['post_image'];?>" alt="Church Image">
                    </div>

                    <?php }} else {?>
                        <div class="post-div left-div">
                        <h2>No Posts yet</h2><br><i class='ri-file-user-fill'></i></span>
                    </div>
                        <?php }?>
                </div>
            </section>

            <!--============= POSTS SECTION ==============-->

            <section class="posts" id="services">
                <h2>Our Services</h2>
                <div class="post-container">
                    <div class="post-div service-div left-div">
                        <div class="post-title">Digging Deep On Thursday</div>
                        <div class="post-content">Come and receive miracles. Meet with the lord and experience the best encounter with Jesus Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat sapiente alias nihil, repudiandae saepe reprehenderit! Lorem ipsum dolor
                            sit amet consectetur, adipisicing elit.</div>
                    </div>

                    <div class="post-div service-div right-div">
                        <div class="post-title">Holy Communion On Sunday</div>
                        <div class="post-content">Come and receive miracles. Meet with the lord and experience the best encounter with Jesus Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat sapiente alias nihil, repudiandae saepe reprehenderit! Lorem ipsum dolor
                            sit amet consectetur, adipisicing elit.</div>
                    </div>

                    <div class="post-div service-div left-div">
                        <div class="post-title">Deliverance Service On Saturday</div>
                        <div class="post-content">Come and receive miracles. Meet with the lord and experience the best encounter with Jesus Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat sapiente alias nihil, repudiandae saepe reprehenderit! Lorem ipsum dolor
                            sit amet consectetur, adipisicing elit.</div>
                    </div>

                    <div class="post-div service-div right-div">
                        <div class="post-title">Deliverance Service On Saturday</div>
                        <div class="post-content">Come and receive miracles. Meet with the lord and experience the best encounter with Jesus Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat sapiente alias nihil, repudiandae saepe reprehenderit! Lorem ipsum dolor
                            sit amet consectetur, adipisicing elit.</div>
                    </div>
                </div>
            </section>




            <!--=================== VERSES SECTION ==============-->

            <section class="verses" id="verses">
                <h2>Bible Verses For The Day</h2>
                <div class="swiper verse-counter">
                    <div class="verse-container swiper-wrapper">
                    <?php 
                             $verse = new User;
                             $verses = $verse->getBibleVerses();
                             if(!empty($verses)){
                                foreach ($verses as $key => $value) {     
                            ?>
                        <div class="verse-div swiper-slide">
                            <div class="verse-title"><?php echo $value['chapter'];?></div>
                            <div class="verse-content">
                                <span><?php echo $value['versecontent'];?></span>
                            </div>
                        </div>
                        <?php }}else {?>
                            <div class="verse-div swiper-slide">
                            <div class="verse-content">
                                <span><h2>No verses yet<h2><br><i class='ri-file-user-fill'></i></span>
                            </div>
                        </div>
                            <?php }?>
                    </div>

                    <div class="swiper-pagination"></div>
                </div>
            </section>


            <!--================ ABOUT SECTION =============-->

            <section class="about" id="about">
                <h2>About Us</h2>
                <div class="about-container">
                    <div class="about-content">
                        Jesus Wonders International Ministry under the leadership of our Lord and Saviour, Jesus Christ and by the Holy Spirit, being fully determined to reach the unreached with the gospel of our Lord Jesus Christ and to practically show out his life in accordance
                        with the Holy Scriptures. To reach the gospel of salvation to mankind, discipline them and prepare them for the second coming of the Lord Jesus Christ. To win souls for the Lord Jesus Christ, dicipline them and also make every
                        believer in Christ a minister of the gospel.
                    </div>
                </div>
            </section>

            <section class="videomodal">
                <h2>Project Videos Here</h2>
                <div class="video">
                    <video width="420" height="620">
                    <source src="" type="video/mp4">
                  </video>
                    <div class="controls">
                        <div class="orange-bar">
                            <div class="orange-juice"></div>
                        </div>
                        <div class="buttons">
                            <button id="play-pause5"> <i class="ri-play-fill" id="iconplay"></i></button>
                        </div>
                        <div class="videoDuration">
                            <span id="videoTime"></span> / <span id="videoDuration"></span>
                        </div>
                        <a href="#" class="videolink">
                            <div class="projectvideo" title="Back to Previous Video">
                                <i class="ri-projector-line"></i>
                            </div>
                        </a>
                        <div class="volume">
                            <i class="ri-volume-up-line" id="volumeicon"></i>
                            <input type="range" class="volume" min="0" max="1" step="0.01" value="1">
                        </div>
                    </div>
                </div>
            </section>
        </main>





        <!--================ FOOTER SECTION ===============-->

        <footer>
            <ul class="foot-container">
                <li>
                    <div class="foot-title">JesusWonders</div>
                    <div class="foot-div">
                        We are growing to become a great church.The Lord has chosen us to spread his word.
                    </div>
                </li>

                <li>
                    <div class="foot-title">Church</div>
                    <ul class="foot-content">
                        <li><a href="about.php">About</a></li>
                        <li><a href="#posts">Posts</a></li>
                        <li><a href="#video-con">Messages</a></li>
                    </ul>
                </li>

                <li>
                    <div class="foot-title">Information</div>
                    <ul class="foot-content">
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </li>

                <li>
                    <div class="foot-title">Follow Us</div>
                    <ul class="foot-content links">
                        <a href="https://www.facebook.com/" target="_blank" class="footer__social-link">
                            <i class="ri-facebook-fill"></i>
                        </a>
                        <a href="https://www.instagram.com/" target="_blank" class="footer__social-link">
                            <i class="ri-instagram-line"></i>
                        </a>
                        <a href="https://www.twitter.com/" target="_blank" class="footer__social-link">
                            <i class="ri-twitter-line"></i>
                        </a>
                    </ul>
                </li>

            </ul>

            <span class="footer__copy">
                &#169; Jesus Wonders Ministry . All rights reserved
            </span>
        </footer>
    </div>


    <!--========== SWIPER JS ============  -->
    <script src="js/swiper-bundle.min.js"></script>

    <!--=========== SCROLL REVEAL ========  -->
    <script src="js/scrollreveal.min.js"></script>

    <!-- ========== MIXTUP JS ========= -->
    <script src="js/mixitup.min.js"></script>


    <!--============= MAIN JS ===========-->
    <script src="js/main.js"></script>



</body>

</html>