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
                $selectvideo = $select->choosePost($_REQUEST['postid']);
                if(!empty($selectvideo)){
                    foreach ($selectvideo as $key => $value) {
                   ?>
                   <div class="vid">
                   <img src="postfolder/<?php echo $value['post_image'];?>" alt="">
                      <div class="buttons-container">
                          <form method="post" id="deleteform">
                              <input type="hidden" name="unique" id="" value="<?php echo $value['unique_id'];?>">
                         <button class="deletebtn" type="submit" id="deletebtn">
                             Delete
                         </button>
                         </form>
                      </div>
                      </div>
               <?php  }} else {?>
                <h2>No Posts Added Yet</h2>
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
     var deleteform = document.querySelector('#deleteform');
     var deletebtn = deleteform.querySelector('#deletebtn');

     deleteform.onsubmit = (e) =>{
       e.preventDefault();
       deleteVideo();
     }

     function deleteVideo(){
        let xhr = new XMLHttpRequest(); //creating XML Object
                xhr.open("POST", "deletepostpage.php", true);
                xhr.onload = () => {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                            if (xhr.status === 200) {
                                let data = xhr.response;
                                //   console.log(data);
                                if(data === "success"){
                                    deletebtn.textContent = "Deleted";
                                   location.href = "allposts.php";
                                } else {
                                   console.log(data);
                                }
                            }
                        }
                    }
                    // we have to send the information through ajax to php
                let formData = new FormData(deleteform); //creating new formData Object

                xhr.send(formData); //sending the form data to php
     }
    </script>

    <!--============= MAIN JS ===========-->
    <script src="js/main.js"></script>

</body>

</html>