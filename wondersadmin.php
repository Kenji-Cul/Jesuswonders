<?php 
session_start();
include_once "projectlog.php";
if(!isset($_SESSION['admin'])){
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

        .loader{
            height: 130vh;
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
                    <li><a href="passcodechange.php" class="nav_link">Change Password</a></li>
                </ul>
            </nav>

            <div class="menudiv">
                <i class="ri-menu-2-line"></i>
            </div>
        </header>

        <main class="main">
            <section class="addSlider">
              <h2>Add Content</h2>
              <div class="sliderbtn-container">
              <button class="sliderbtn active-btn" id="slider-one">
                      <a href="users.php">Users</a>
                  </button>

                  <button class="sliderbtn active-btn" id="slider-one">
                      <a href="allvideos.php">Videos</a>
                  </button>

                  <button class="sliderbtn active-btn" id="slider-one">
                  <a href="allposts.php">Posts</a>
                  </button>

                  <button class="sliderbtn active-btn" id="slider-one">
                  <a href="allverses.php">Verses</a>
                  </button>
              </div>

              <div class="sliderform-container">
              <div class="slider-form slider-one active">
                  <h2>Upload Video</h2>
                  <form id="sliderone" method="post" class="sliderform">
                      <label for="text">Video Text: </label>
                     <textarea name="imgname" id="text" cols="40" rows="4"></textarea>
                     <div class="imgfile">
                     <video id="firstvideo" width="100%" height="100%" name="image" controls>
                        <source src="" type="video/mp4">
                      </video>
                         <div class="filename"></div>
                     </div>
                      <label for="fileone" id="sliderlabel" class="sliderlabel">Choose Video</label>
                      <input type="file" name="image" id="fileone" accept="video/*">
                      <div class="errordiv"></div>
                      <div class="notifydiv"></div>
                      <button type="submit">Upload</button>
                  </form>
              </div>


              <div class="slider-form slider-two">
              <h2>Upload Posts</h2>
                  <form id="slidertwo" method="post" class="sliderform">
                     <div class="imgfile">
                         <img src="" alt="No Image Selected">
                         <div class="filename"></div>
                     </div>
                      <label for="filetwo" id="sliderlabel" class="sliderlabel">Choose Post Image</label>
                      <input type="file" name="image" id="filetwo" accept="image/*">
                      <div class="errordiv"></div>
                      <button type="submit">Upload</button>
                  </form>
              </div>

              <div class="slider-form slider-three">
              <h2>Upload Bible Verses</h2>
                  <form id="sliderthree" method="post" class="sliderform">
                  <div class="input-div">
                          <label for="chapter">Chapter:</label>
                          <input type="text" name="chapter" id="chapter" placeholder="Type the chapter">
                      </div>
                      <div class="input-div">
                          <label for="verses">Bible Verse:</label>
                          <input type="text" name="verse" id="verses" placeholder="Type the verse">
                      </div>
                      <div class="errordiv"></div>
                      <button type="submit">Upload</button>
                  </form>
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
       
    //    First Slider Form variables
        var uploadform = document.querySelector('#sliderone')
var uploadImg = uploadform.querySelector('.imgfile video')
var uploadInitiator = uploadform.querySelector('#sliderlabel')
var fileName = uploadform.querySelector('.filename')
var sendBtn = uploadform.querySelector('button')
var uploadBtn = uploadform.querySelector('#fileone')
var errorDiv = uploadform.querySelector('.errordiv')


 //    Post Form variables
 var uploadform2 = document.querySelector('#slidertwo')
var uploadImg2 = uploadform2.querySelector('.imgfile img')
var uploadInitiator2 = uploadform2.querySelector('#sliderlabel')
var fileName2 = uploadform2.querySelector('.filename')
var sendBtn2 = uploadform2.querySelector('button')
var uploadBtn2 = uploadform2.querySelector('#filetwo')
var errorDiv2 = uploadform2.querySelector('.errordiv')

//    Verse Form variables
var uploadform3 = document.querySelector('#sliderthree')
var chapterInput = uploadform3.querySelector('#chapter')
var verseInput = uploadform3.querySelector('#verses')
var sendBtn3 = uploadform3.querySelector('button')
var errorDiv3 = uploadform3.querySelector('.errordiv')





uploadform.onsubmit = (e) =>{
  e.preventDefault();
  if(document.querySelector('#sliderone textarea').value != "" && document.querySelector('#sliderone input[type="file]')){
  sendBtn.textContent = "Uploading..."
  sendBtn.style.color = "blue";
  }
}

uploadform2.onsubmit = (e) =>{
  e.preventDefault();
  if(document.querySelector('#slidertwo textarea').value != "" && document.querySelector('#slidertwo input[type="file]')){
  sendBtn.textContent = "Uploading..."
  sendBtn.style.color = "blue";
  }
}

uploadform3.onsubmit = (e) =>{
 e.preventDefault();
 uploadBibleVerse();
}


uploadBtn.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function() {
                    const result = reader.result;
                    uploadImg.src = result;
                }

                reader.readAsDataURL(file);
            }

            if (this.value) {
                let valueStore = this.value.split("\\").pop();
                fileName.textContent = valueStore;
                 fileName.style.color = "white";
            }
        })

        uploadBtn2.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function() {
                    const result = reader.result;
                    uploadImg2.src = result;
                }

                reader.readAsDataURL(file);
            }

            if (this.value) {
                let valueStore = this.value.split("\\").pop();
                fileName2.textContent = valueStore;
                 fileName2.style.color = "white";
            }
        })


        
        sendBtn.onclick = () => {
                let xhr = new XMLHttpRequest(); //creating XML Object
                xhr.open("POST", "sliderone.php", true);
                xhr.onload = () => {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                            if (xhr.status === 200) {
                                let profiledata = xhr.response;
                                //   console.log(data);
                                //console.log(profiledata);
                                if (profiledata === "success") {
                                    sendBtn.textContent = "Uploaded";
                                    sendBtn.style.color = "green";
                                    document.querySelector('#sliderone textarea').value = "";
                                document.querySelector('#sliderone input[type="file"]').value = "";
                                    errorDiv.style.display = "none";
                                    document.location.reload();
                                } else {
                                    if(profiledata.length > 50){
                                        errorDiv.style.display = "none";
                                        document.querySelector('.notifydiv').style.display = "block";
                                        document.querySelector('.notifydiv').style.color = "red";
                                        document.querySelector('.notifydiv').textContent = "Please do not involve inverted commas in your video text";
                                    } else {
                                    errorDiv.style.display = "block";
                                    errorDiv.textContent = profiledata;
                                    errorDiv.style.color = "red";
                                    }
                                }
                            }
                        }
                    }
                    // we have to send the information through ajax to php
                let formData = new FormData(uploadform); //creating new formData Object

                xhr.send(formData); //sending the form data to php
            }


            sendBtn2.onclick = () => {
                let xhr = new XMLHttpRequest(); //creating XML Object
                xhr.open("POST", "postupload.php", true);
                xhr.onload = () => {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                            if (xhr.status === 200) {
                                let profiledata = xhr.response;
                                //   console.log(data);
                                //console.log(profiledata);
                                if (profiledata === "success") {
                                    sendBtn2.textContent = "Uploaded";
                                    sendBtn2.style.color = "green";
                                    errorDiv2.style.display = "none";
                                    document.location.reload();
                                } else {
                                    errorDiv2.style.display = "block";
                                    errorDiv2.textContent = profiledata;
                                    errorDiv2.style.color = "red";
                                }
                            }
                        }
                    }
                    // we have to send the information through ajax to php
                let formData = new FormData(uploadform2); //creating new formData Object

                xhr.send(formData); //sending the form data to php
            }

            function uploadBibleVerse(){
                let xhr = new XMLHttpRequest(); //creating XML Object
                xhr.open("POST", "createverse.php", true);
                xhr.onload = () => {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                            if (xhr.status === 200) {
                                let versedata = xhr.response;
                                if(versedata === "success"){
                                    sendBtn3.textContent = "Uploaded";
                                    sendBtn3.style.color = "green";
                                    chapterInput.value = "";
                                     verseInput.value = "";
                                     document.location.reload();
                                } else {
                                    errorDiv3.style.display = "block";
                                    errorDiv3.textContent = versedata;
                                    errorDiv3.style.color = "red";
                                }
                            }
                        }
                    }
                    // we have to send the information through ajax to php
                let formData = new FormData(uploadform3); //creating new formData Object

                xhr.send(formData); //sending the form data to php
            }

            uploadBtn2.addEventListener('click',()=>{
                sendBtn2.textContent = "Upload"
                sendBtn2.style.color = "white"
            })




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

    <!--============= MAIN JS ===========-->
    <script src="js/main.js"></script>

    
</body>

</html>