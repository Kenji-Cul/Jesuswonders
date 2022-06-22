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
                    <li><a href="about.php" class="nav_link active-link">About</a></li>
                    <li><a href="contact.php" class="nav_link">Contact Us</a></li>
                    <li><a href="#visioner" class="nav_link">Visioner</a></li>
                    <li><a href="#books" class="nav_link">Books</a></li>
                    <?php if(isset($_SESSION['username'])){?>
                        <li><a href="logout.php" class="nav_link">Log Out</a></li>
                        <?php }  ?>
                </ul>
            </nav>

            <div class="menudiv">
                <i class="ri-menu-2-line"></i>
            </div>
        </header>

        <main>
            <!--================ ABOUT CHURCH CONTENT =============-->
            <section class="aboutchurch">
                <h2>About Us</h2>
                <div class="churchimg">
                    <img src="images/church10.jpg" alt="Church Image">
                </div>
                <div class="aboutchurch-content">
                    <div class="aboutcontent left-div">
                        <h2>Jesus Wonders International Ministry</h2>
                        <p>Jesus Wonders International Ministry under the leadership of our Lord and Saviour, Jesus Christ and by the Holy Spirit being fully determined to reach the unreached with the gospel of our Lord Jesus Christ and to practically live
                            out his life in accordance with the Holy scriptures.</p>
                    </div>
                    <div class="aboutcontent right-div">
                        <h2>Vision</h2>
                        <p>To reach the gospel of salvation to mankind, discipline them and prepare them for the second coming of the Lord Jesus Christ</p>
                    </div>
                    <div class="aboutcontent left-div">
                        <h2>Mission</h2>
                        <p>To win souls for the Lord Jesus Christ, discipline them and also make every believer in Christ a minsiter of the gospel</p>
                    </div>
                    <div class="aboutcontent content4 right-div">
                        <h2>Aims and Objectives</h2>
                        <ul>
                            <li>To preach the gospel of our LORD JESUS CHRIST</li>
                            <li>To embark on evangelical outreach, missions for the purpose of winning souls for the Lord Jesus Christ</li>
                            <li>Conducting open air crusades, revivals, camp meetings and seminars</li>
                            <li>To use communication media (prints and electronic etc.) to disseminate the gospel</li>
                        </ul>
                    </div>
                </div>
            </section>

            <!--================ VISIONER CONTENT =============-->
            <section class="visioner" id="visioner">
                <div class="visioner-img">
                    <img src="images/church9.jpg" alt="">
                </div>
                <div class="visioner-content">
                    <div class="visioncontent left-div">
                        <h2>The Visioner</h2>
                        <p>Rev.Matthew O. Ayeni-Davies received the vision in 1982 while waiting to pioneer this work. God has been faithful.He is happily married to Pastor (Mrs) Sharon Adekemi Ayeni-Davies .The headquarters of the ministry is currently
                            in Abeokuta, Ogun State Nigeria.</p>
                    </div>

                    <div class="visioncontent right-div">
                        <h2>About the Visioner</h2>
                        <p>Founder and pastor of Jesus Wonders International Ministries was born over forty years ago into the family of Rev. Canon David Ayeni and Mrs. Janet Ayeni.He is an Alumnus of Lagos State Polytechnic and Obafemi Awowlowo University
                            where he studies Agriculture with specialization in Crop Production & Horticulture and graduated in 1991.</p>
                        <p>He was actually involved in God's service right from his undergraduate days where he was prayer secretary and president of the Christian union.</p>
                        <p>
                            Upon graduation, after the National Youth Service in 1992, he responded to the call of God on a full time basis. The Lord has been faithful having seen him through the initial challenges in the ministry. He is an inspirational speaker, motivation and
                            author of several books including faith for the miraculous, wisdom seeds for success, real prosperity and the making of a successful marriage.
                        </p>
                        <p>
                            He motivates pastors and Christian leaders and also give guidance and directions for organizations establishing practices for high performance.
                        </p>

                        <p>A pastor, teacher and intinerant evangelist. He has spoken in churches, seminars,conferences and outreaches across Nigeria and Abroad.</p>

                        <p>His ministry is touching many lives across the globe with signs and wonders following</p>

                        <p>Rev Ayeni-Davies is married to Sharon Adekemi and the union is blessed with children.</p>
                    </div>

                    <div class="visioncontent left-div">
                        <h2>Engagement</h2>
                        <p>Apart from the ministry's programme. Rev Matthew Ayeni-Davies is open to invitations to minister the word of the Lord within and outside Nigeria as God opens doors subject to His directions.</p>
                    </div>
                </div>
            </section>


            <!--================ BOOKS CONTENT =============-->
            <section class="books" id="books">
                <h2>Books</h2>
                <div class="books-content right-div">
                    The books which we have been inspired to publish include: Faith for The Miraculous, Wisdom Seeds for Success, Real Prosperity, The Making of a Successful Marriage and Godly Parenting.
                </div>
                <div class="books-content2 left-div">
                    <h2>Tenets Of Faith</h2>
                    <ul>
                        <li>The Holy Scriptures is given by God.</li>
                    </ul>
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
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="#visioner">Visioner</a></li>
                        <li><a href="#books">Books</a></li>
                    </ul>
                </li>

                <li>
                    <div class="foot-title">Information</div>
                    <ul class="foot-content">
                        <li><a href="contact.php">Contact Us</a></li>
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

    <!--=========== SCROLL REVEAL ========  -->
    <script src="js/scrollreveal.min.js"></script>

    <!-- ========== MIXTUP JS ========= -->
    <script src="js/mixitup.min.js"></script>

    <!--============= MAIN JS ===========-->
    <script src="js/main.js"></script>
</body>

</html>