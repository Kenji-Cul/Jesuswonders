<?php 
include_once "projectlog.php";
if(isset($_SESSION['username'])){
    header("Location: index.php");
}
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
                </ul>
            </nav>

            <div class="menudiv">
                <i class="ri-menu-2-line"></i>
            </div>
        </header>

        <main>
            <section class="signup">
                <h2>Sign Up</h2>
               <form action="" id="signupform">
                   <div class="input-div">
                   <label for="name">Name:</label>
                   <input type="text" name="name" id="name" placeholder="Your Name">
                   </div>


                   <div class="input-div">
                   <label for="email">Email:</label>
                   <input type="email" name="email" id="email" placeholder="Your Email">
                   </div>
                   <div class="errorbox"></div>
                   <div class="checkrobot">
                    <p>Let's check if you are not a robot</p>
                    <div class="random"><h3>Gideon</h3></div>
                    <div class="input-div">
                    <label for="check">Type the characters above:</label>
                   <input type="text" id="check" placeholder="Type the characters above">
                   </div>
                   </div>
                   <button id="signupbtn" type="submit">Sign Up</button>

                   <p>Already have an account? <a href="login.php" id="loginlink">Login Here</a></p>
               </form>
            </section>
        </main>

        <!--================ FOOTER SECTION ===============-->

        <footer class="signupfooter">
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

    <script>
         var signupform = document.querySelector('#signupform');
         var signupbtn = signupform.querySelector('#signupbtn');
         var nameInput = signupform.querySelector('#name');
         var emailInput = signupform.querySelector('#email');
         var errorBox = signupform.querySelector('.errorbox');
         var random = document.querySelector('.random h3');
         var checkDiv = signupform.querySelector('.checkrobot');
         var checkInput = signupform.querySelector('#check');


         signupform.onsubmit = (e) =>{
            e.preventDefault();
            if((nameInput.value != "") || (emailInput.value != "")){
                checkDiv.style.visibility = "visible";
                checkDiv.style.height = "10em";
                errorBox.style.display = "none";
                if(checkInput.value != ""){
                    checkRandom();
                }
            } else {
                validateInput();
            }
         }


         function checkRandom(){
            if(checkInput.value === random.textContent){
            errorBox.style.display = "block";
            errorBox.style.color = "green";
            errorBox.textContent = "Verified";
            insertData();
        } else {
            errorBox.style.display = "block";
            errorBox.style.color = "red";
            errorBox.textContent = "Try Again";
            document.location.reload();
        }
         }

         function insertData(){
            let xhr = new XMLHttpRequest(); //creating XML Object
                xhr.open("POST", "insertdata.php", true);
                xhr.onload = () => {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                            if (xhr.status === 200) {
                                let data = xhr.response;
                                if(data === "success"){
                                    location.href = "index.php"
                                } else {
                                    errorBox.style.display = "block";
                                    errorBox.style.color = "red";
                                    errorBox.textContent = data;
                                }
                            }
                        }
                    }
                    // we have to send the information through ajax to php
                let formData = new FormData(signupform); //creating new formData Object

                xhr.send(formData); //sending the form data to php
         }

         function validateInput(){
            if((nameInput.value == "") || (emailInput.value == "")){
                 errorBox.style.display = "block";
                 errorBox.textContent = "Please fill in all input fields"
            } else {
                errorBox.style.display = "none";
            }
         }

        createRandomString(6);

        function createRandomString(string_length) {
            var random_string = "";
            var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
            for (var i, i = 0; i < string_length; i++) {
                random_string += characters.charAt(Math.floor(Math.random() * characters.length));
            }
            random.textContent = random_string;
        }
    </script>

    <!--============= MAIN JS ===========-->
    <script src="js/main.js"></script>

</body>

</html>