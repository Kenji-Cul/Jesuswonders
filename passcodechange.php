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
        <section class="login">
                <h2>Welcome Admin</h2>
              
               <form action="" id="updateform">
                   <div class="input-div">
                   <label for="passchange">Change Password:</label>
                   <div class="passdiv">
                   <input type="password" name="password" id="passchange" placeholder="Enter new password">
                   <i class="ri-eye-off-fill" id="showpassword2"></i>
                   </div>
                   </div>
                   <div class="errorbox"></div>
                   <div class="successbox">
                      <h4>Password Changed</h4>
                      <i class="ri-check-line" id="check"></i>
                   </div>
                   <button id="updatebtn" type="submit">Change</button>
               </form>
            </section>
        </main>

        <!--================ FOOTER SECTION ===============-->

        <footer class="loginfooter">
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
         var codeChanger = document.querySelector("#loginlink");
         var updateform = document.querySelector('#updateform');
         var updatebtn = updateform.querySelector('#updatebtn');
         var passwordInput2 = updateform.querySelector('#passchange');
         var errorBox2 = updateform.querySelector('.errorbox');
         var showPassword2 = updateform.querySelector('#showpassword2')
         

    


         updateform.onsubmit = (e) =>{
            e.preventDefault();
            changePassCode();
         }

         showPassword2.addEventListener('click',()=>{
            if (passwordInput2.type == "password") {
        passwordInput2.type = "text";
        showPassword2.classList="ri-eye-fill";
    } else {
        passwordInput2.type = "password";
        showPassword2.classList="ri-eye-off-fill";
    }
         })



         function changePassCode(){
            let xhr = new XMLHttpRequest(); //creating XML Object
                xhr.open("POST", "updatepasscode.php", true);
                xhr.onload = () => {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                            if (xhr.status === 200) {
                                let data = xhr.response;
                                console.log(data);
                                if(data === "success"){
                                   document.querySelector('.successbox').style.display = "block";
                                   location.href = "wondersadmin.php";
                                } else {
                                    errorBox2.style.display = "block";
                                    errorBox2.textContent = data;
                                }
                            }
                        }
                    }
                    // we have to send the information through ajax to php
                let formData = new FormData(updateform); //creating new formData Object

                xhr.send(formData); //sending the form data to php
         }



         codeChanger.addEventListener('click',(e)=>{
           e.preventDefault();
           updateform.style.visibility = "visible";
         })


        
         function validateInput(){
            if((nameInput.value == "") || (emailInput.value == "")){
                 errorBox.style.display = "block";
                 errorBox.textContent = "Please fill in all input fields"
            } else {
                errorBox.style.display = "none";
            }
         }
    </script>


    <!--============= MAIN JS ===========-->
    <script src="js/main.js"></script>
</body>

</html>