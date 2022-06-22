<?php 
/**
 * Author : Teibo Gideon
 * Program : Jesus Wonders Website
 * Date : May 25,2022
 */

 

 include "signconstant.php";

 class User{
     var $username;
     var $useremail;
     var $dbcon;
    
    function __construct(){
       $this->dbcon = new MySqli(DB_SERVERNAME,DB_USERNAME,DB_PASSWORD,DB_NAME);
       if($this->dbcon->connect_error){
           die("Connection Failed: ".$this->dbcon->connect_error);
       } else{
          // echo "Connected Successfully";
       }
    }


    function createUser($username,$useremail){
        $sql = "INSERT INTO users(username,useremail) VALUES('{$username}','{$useremail}')";
        $result = $this->dbcon->query($sql);
        if($this->dbcon->affected_rows == 1){
            session_start();
             session_unset();
             $_SESSION['user_id'] = $this->dbcon->insert_id;
             $_SESSION['username'] = $username;
           echo "success";
        } else {
           echo $this->dbcon->error;
        }
    }

    function checkEmailAddress($email){
        $sql = "SELECT * FROM users WHERE useremail ='{$email}'";
        $result = $this->dbcon->query($sql);
        $row = $result->fetch_assoc();
        if($result->num_rows == 1){
            return $row;
        }else{
            return $row;
        }
      }

      function login($email){
        $sql = "SELECT * FROM users WHERE useremail = '{$email}'";
        $result = $this->dbcon->query($sql);
      $row = $result->fetch_assoc();
      if($result->num_rows == 1){
          return $row;
      }else{
          return $row;
      }
    }

    function createVideoOne($videotext){
        if(isset($_FILES['image'])){
            $filename = $_FILES['image']['name'];
            $filesize = $_FILES['image']['size'];
            $filetype = $_FILES['image']['type'];
            $file_error = $_FILES['image']['error'];
            $filetmp = $_FILES['image']['tmp_name'];
          // validate image
            if($file_error > 0){
                $error = "You have not selected a file";
                return $error;
            }
        
            if($filesize > 10485760){
                $error = "Your file should be less than 10mb";
                return $error;
            }
        
            $extensions = array("gif", "png", "jpeg", "svg", "jpg", "mp4");
            $file_ext = explode(".",$filename);
            $file_ext = end($file_ext);
        
            if(!in_array(strtolower($file_ext), $extensions)){
                $error = $file_ext."File format not supported";
                return $error;
            }
        
            //upload image
            $folder = "videofolder/";
            $newfilename = time().rand().".".$file_ext;
            $destination = $folder.$newfilename;
            if(move_uploaded_file($filetmp, $destination)){
                $unique = rand();
             $sql = "INSERT INTO videoone(video_name,video_text,unique_id) VALUES('{$newfilename}','{$videotext}','{$unique}')";
             $result = $this->dbcon->query($sql);
                  //check if the connection runs successfully
                  if($this->dbcon->affected_rows==1){
                    echo "success";
                  }else{
                   echo "Not uploaded";
                  }
         }
        }
    }


    function createPost(){
        if(isset($_FILES['image'])){
            $filename = $_FILES['image']['name'];
            $filesize = $_FILES['image']['size'];
            $filetype = $_FILES['image']['type'];
            $file_error = $_FILES['image']['error'];
            $filetmp = $_FILES['image']['tmp_name'];
          // validate image
            if($file_error > 0){
                $error = "You have not selected a file";
                return $error;
            }
        
            if($filesize > 2097152){
                $error = "Your file should be less than 2mb";
                return $error;
            }
        
            $extensions = array("gif", "png", "jpeg", "svg", "jpg");
            $file_ext = explode(".",$filename);
            $file_ext = end($file_ext);
        
            if(!in_array(strtolower($file_ext), $extensions)){
                $error = $file_ext."File format not supported";
                return $error;
            }
        
            //upload image
            $folder = "postfolder/";
            $newfilename = time().rand().".".$file_ext;
            $destination = $folder.$newfilename;
            if(move_uploaded_file($filetmp, $destination)){
                $unique = rand();
             $sql = "INSERT INTO posts(post_image,unique_id) VALUES('{$newfilename}','{$unique}')";
             $result = $this->dbcon->query($sql);
                  //check if the connection runs successfully
                  if($this->dbcon->affected_rows==1){
                    echo "success";
                  }else{
                   echo "Not uploaded".$this->dbcon->error;
                  }
         }
        }
    }


    
    function selectVideo(){
        $sql = "SELECT * FROM videoone order by rand() LIMIT 1";
        $result = $this->dbcon->query($sql);
        $rows = array();
        if($this->dbcon->affected_rows > 0){
			while($row = $result->fetch_assoc()){
				$rows[] = $row;
			}
			return $rows;
		}else{
			return $rows;
		}
    }


    function chooseVideo($video){
     $sql = "SELECT * FROM videoone WHERE unique_id = '{$video}'";
     $result = $this->dbcon->query($sql);
     $rows = array();
        if($this->dbcon->affected_rows > 0){
			while($row = $result->fetch_assoc()){
				$rows[] = $row;
			}
			return $rows;
		}else{
			return $rows;
		}
    }

    function choosePost($posts){
        $sql = "SELECT * FROM posts WHERE unique_id = '{$posts}'";
        $result = $this->dbcon->query($sql);
        $rows = array();
           if($this->dbcon->affected_rows > 0){
               while($row = $result->fetch_assoc()){
                   $rows[] = $row;
               }
               return $rows;
           }else{
               return $rows;
           }
       }


       function chooseVerse($verses){
        $sql = "SELECT * FROM verses WHERE unique_id = '{$verses}'";
        $result = $this->dbcon->query($sql);
        $rows = array();
           if($this->dbcon->affected_rows > 0){
               while($row = $result->fetch_assoc()){
                   $rows[] = $row;
               }
               return $rows;
           }else{
               return $rows;
           }
       }


    function editVid($videotext,$unique){
        $sql = "UPDATE videoone SET video_text='{$videotext}' WHERE unique_id='{$unique}'";
        $result = $this->dbcon->query($sql);
        if($this->dbcon->affected_rows == 1){
            echo "success";
        } else{
            echo $this->dbcon->error;
        }
    }

    function deleteVideo($video){
        $sql = "DELETE FROM videoone WHERE unique_id = '{$video}'";
        $result = $this->dbcon->query($sql);
        if($this->dbcon->affected_rows == 1){
            echo "success";
        } else {
            echo $this->dbcon->error;
        }
       }


       function deletePost($video){
        $sql = "DELETE FROM posts WHERE unique_id = '{$video}'";
        $result = $this->dbcon->query($sql);
        if($this->dbcon->affected_rows == 1){
            echo "success";
        } else {
            echo $this->dbcon->error;
        }
       }

       function deleteVerse($video){
        $sql = "DELETE FROM verses WHERE unique_id = '{$video}'";
        $result = $this->dbcon->query($sql);
        if($this->dbcon->affected_rows == 1){
            echo "success";
        } else {
            echo $this->dbcon->error;
        }
       }

       function deleteAllVideos(){
        $sql = "DELETE FROM  videoone";
        $result = $this->dbcon->query($sql);
        if($this->dbcon->affected_rows > 0){
            echo "success";
        } else {
            echo $this->dbcon->error;
        }
       }

    function selectPosts(){
        $sql = "SELECT * FROM posts order by rand() LIMIT 4";
        $result = $this->dbcon->query($sql);
        $rows = array();
        if($this->dbcon->affected_rows > 0){
			while($row = $result->fetch_assoc()){
				$rows[] = $row;
			}
			return $rows;
		}else{
			return $rows;
		}
    }


     function createBibleVerses($chapter,$versecontent){
         $unique = rand();
         $sql = "INSERT INTO verses(chapter,versecontent,unique_id)  VALUES('{$chapter}','{$versecontent}','{$unique}')";
         $result = $this->dbcon->query($sql);
         if($this->dbcon->affected_rows == 1){
             echo "success";
         } else {
             echo $this->dbcon->error;
         }
     }

     function getBibleVerses(){
         $sql = "SELECT * FROM verses order by rand() LIMIT 5";
         $result = $this->dbcon->query($sql);
         $rows = array();
         if($this->dbcon->affected_rows > 0){
             while($row = $result->fetch_assoc()){
                 $rows[] = $row;
             }
             return $rows;
         }else{
             return $rows;
         }
     }

     function selectAllVideos(){
        $sql = "SELECT * FROM videoone";
        $result = $this->dbcon->query($sql);
        $rows = array();
        if($this->dbcon->affected_rows > 0){
            while($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }else{
            return $rows;
        }
     }


     function selectAllPosts(){
        $sql = "SELECT * FROM posts";
        $result = $this->dbcon->query($sql);
        $rows = array();
        if($this->dbcon->affected_rows > 0){
            while($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }else{
            return $rows;
        }
     }

     function selectAllVerses(){
        $sql = "SELECT * FROM verses";
        $result = $this->dbcon->query($sql);
        $rows = array();
        if($this->dbcon->affected_rows > 0){
            while($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }else{
            return $rows;
        }
     }


     function deletePosts(){
        $sql = "DELETE  FROM posts";
        $result = $this->dbcon->query($sql);
        if($this->dbcon->affected_rows > 0){
           echo "success";
        } else {
            echo $this->dbcon->error;
        }
    }

    function deleteVerses(){
        $sql = "DELETE  FROM verses";
        $result = $this->dbcon->query($sql);
        if($this->dbcon->affected_rows > 0){
           echo "success";
        } else {
            echo $this->dbcon->error;
        }
    }

    function securePasscode($passcode){
        $pwd = password_hash($passcode,PASSWORD_DEFAULT);
        $sql = "SELECT * FROM passcode";
        $result = $this->dbcon->query($sql);
        $rows = array();
        if($this->dbcon->affected_rows > 0){
            while($row = $result->fetch_assoc()){
                $rows[] = $row;
                if(password_verify($passcode,$row['passcode'])){
                    session_start();
                    session_unset();
                    $_SESSION['admin'] = "Jesuswonders123";
                    echo "success";
                } else {
                    echo "Invalid Details";
                }
            }
            return $rows;
        }else{
            return $rows;
        }
    }


    function updatePasscode($passcode){
        $pwd = password_hash($passcode,PASSWORD_DEFAULT);
        $sql = "UPDATE passcode SET passcode = '{$pwd}'";
        $result = $this->dbcon->query($sql);
        if($this->dbcon->affected_rows == 1){
            echo "success";
        } else {
            echo $this->dbcon->error;
        }
    }

    function selectAllUsers(){
        $sql = "SELECT * FROM users";
        $result = $this->dbcon->query($sql);
        $rows = array();
        if($this->dbcon->affected_rows > 0){
			while($row = $result->fetch_assoc()){
				$rows[] = $row;
			}
			return $rows;
		}else{
			return $rows;
		}
    }


 }
?>