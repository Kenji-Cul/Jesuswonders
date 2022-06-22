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
        <div class="accountcon">
            <div class="accountdiv">
                <div class="cancelimg">
                    <i class="ri-close-circle-line"></i>
                </div>
                <div class="emoji">
                    <i class="ri-emotion-happy-line"></i>
                </div>
                <div class="account-content">
                    <h2>Account Info</h2>
                    <p>Jesus Wonders international ministry, Fidelity bnk <span>Account Number: 4110022571</span></p>

                    <p>Jesus Wonders chapel, union bank <span>Account Number: 0006617267</span></p>
                </div>
            </div>
        </div>
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
                    <li><a href="passcode.php" class="nav_link">Admin</a></li>
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
                <h2>Contact Us</h2>
                <div class="churchimg">
                    <img src="images/church1.jpg" alt="Church Image">
                </div>
                <div class="aboutchurch-content">
                    <div class="aboutcontent left-div">
                        <h2>Our Location</h2>
                        <div class="contact-content">
                            <p>17,oremeji Street,Lafenwa-otta, Ogun State, Nigeria</p>
                            <p>+2348023925157, +2348034630463, +2348090947807</p>
                            <p>Jesus Wonders International Ministries</p>
                            <p>HQ: Onikolobo, Ibara, Abeokuta, Ogun State Nigeria</p>
                        </div>
                    </div>
                    <div class="aboutcontent right-div">
                        <h2>Partnership</h2>
                        <div class="contact-content">
                            <p>Let us join forces together to enable us reach the lost souls with the goodnews.</p>
                            <p>Your prayer and financial support enhances our ability to communicate the gospel of Christ across the nations of the earth.</p>
                        </div>
                    </div>
                    <div class="aboutcontent left-div">
                        <h2>Our Commitment To You</h2>
                        <ul>
                            <li>Pray daily that God's blessings be upon you and your family</li>
                            <li>Study the word and diligently seek God on your behalf</li>
                            <li>Minister to your through the print and electronic media</li>
                        </ul>
                    </div>
                    <div class="aboutcontent content4 right-div">
                        <h2>Our Expectations From You</h2>
                        <ul>
                            <li>Pray for us always</li>
                            <li>Support us financially to enable us do the work of the ministry effectively</li>
                            <li>Attend our programmes anytime you are called upon to do so</li>
                            <li>Encourage us in the ministry work</li>
                        </ul>
                    </div>

                    <div class="aboutcontent content4 right-div">
                        <h2>For partnership enquiry call us:</h2>
                        <ul>
                            <li>+2348023925157</li>
                            <li>+2348034630463</li>
                            <li>+2348090947807</li>
                        </ul>
                    </div>
                </div>
            </section>
        </main>

        <!--================ FOOTER SECTION ===============-->

        <footer class="contactfooter">
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

    <script>
        var donateContainer = document.querySelector('.accountdiv');
var donateCloseBtn = document.querySelector('.accountdiv .cancelimg');
donateContainer.style.display = "none";
setTimeout(() => {
  donateContainer.style.display = "block";
}, 7000);

donateCloseBtn.addEventListener('click',()=>{
  donateContainer.style.display = "none";
})
    </script>
</body>

</html>