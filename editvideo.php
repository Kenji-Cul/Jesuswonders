<?php 
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
                </ul>
            </nav>

            <div class="menudiv">
                <i class="ri-menu-2-line"></i>
            </div>
        </header>

        <main>
           <section class="allvideos">
               <div class="videos-container">
                   <?php 
                $select = new User;
                $selectvideo = $select->chooseVideo($_REQUEST['videoid']);
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
                          <form method="post" id="editform">
                              <input type="hidden" name="unique" id="" value="<?php echo $value['unique_id'];?>">
                              <textarea name="content" id="" cols="50" rows="8">
                                  
                              </textarea>
                         <button class="editbtn" type="submit" id="editbtn">
                             Edit Text
                         </button>
                         </form>
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
     var editform = document.querySelector('#editform');
     var editbtn = editform.querySelector('#editbtn');

     editform.onsubmit = (e) =>{
       e.preventDefault();
       editVideo();
     }

     function editVideo(){
        let xhr = new XMLHttpRequest(); //creating XML Object
                xhr.open("POST", "editvidpage.php", true);
                xhr.onload = () => {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                            if (xhr.status === 200) {
                                let data = xhr.response;
                                //   console.log(data);
                                if(data === "success"){
                                    editbtn.textContent = "Edited";
                                   location.href = "allvideos.php";
                                } else {
                                   console.log(data);
                                }
                            }
                        }
                    }
                    // we have to send the information through ajax to php
                let formData = new FormData(editform); //creating new formData Object

                xhr.send(formData); //sending the form data to php
     }
    </script>

    <!--============= MAIN JS ===========-->
    <script src="js/main.js"></script>

</body>

</html>