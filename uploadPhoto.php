<?php
    session_start();
    
 //uploads
    if (isset($_POST["pic_upload"])) {
      
    
  if(isset($_POST["album_id"]) && isset($_POST["date_taken"]) && isset($_POST["caption"]) && isset($_FILES["img"])){ 
   //This is the directory where images will be saved 
 $target = "images/"; 
 
 $target = $target . basename( $_FILES['img']['name']); 
 
 //This gets all the other information from the form 
 $caption=$_POST['caption'];
 if ($_POST["date_taken"] == "") {
  
    $dtaken = date('Y-m-d');  
  } 
  else{
 $dtaken=$_POST['date_taken']; 
 }
 $aid = $_POST["album_id"];
 
 
 
 $query = "INSERT INTO Photos VALUES(NULL, '".$target."','".$dtaken."')";
 
 $result = $mysql ->query($query);
 
 
 $result = $mysql ->query("SELECT MAX(pid) FROM Photos"); 
 $pid = $result ->fetch_row();
 $pid = $pid[0];
 
 if(!($aid == "no")){
      if(preg_match("/[A-Za-z]+/", $_POST["caption"])){

 $result = $mysql ->query("INSERT INTO PhotosInAlbum VALUES ('" . $pid ."','". $aid . "','".$caption."')"); 
 $result = $mysql ->query("UPDATE Album SET dModified = CURRENT_TIMESTAMP, WHERE aid ='" . $aid . "'");
  }
  else{
  echo "Photo needs to have a valid caption, dawg.";
}

}
  else {
    echo "heyyyy";
  }
 
 
 //Writes the photo to the server 
 if(move_uploaded_file($_FILES['img']['tmp_name'], $target)) 
 { 

 //Tells you if its all ok 
 echo "<p>The file ". basename( $_FILES['img']['name']). " has been uploaded<p><br>"; 
 } 
 else { 
 
 //Gives an error if its not 
 echo "Sorry, there was a problem uploading your file."; 
 }
}

}
}

else{
  echo "<br> <p> You must be logged in to upload photos </p><br>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
    
    <head>
        <title>Upload Photos</title>
        <link rel="stylesheet" href="styles/scrapbook.css" type="text/css"/>
        <link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
    </head>
    
    <body>
    <div id= "wrapper">
    
        <div id="banner">
            <a href="index.php"><img src= "images/logo1.jpg" alt= "ACM-W Logo" width="230" height= "75"/></a><br />
        </div>

        <!-- Navigation bar -->
        <?php 
            require("menu.php");
            require("helpfulFunctions.php");
            require_once("db.php");
        ?>
        
        <div id="bottomcontent">
            
         <h1>Upload Photo</h1>
         <div id="upload_div">
          <form enctype="multipart/form-data" action="photos.php" method="POST">
            <h3> Upload a picture to an album! </h3>
                <p>Pick an album: 
            <select name="album_id">
             <option value="no">Don't upload to an album</option>
              <?php        
                
                $mysql = new mysqli("localhost", $DB_Username, $DB_Password, $DB_Name); 

                if($mysql->errno){
                  echo "<p> There was a problem connecting to the database! </p>";
                  exit();
                }
                $result = $mysql ->query("SELECT * FROM Album");
                while($album = $result->fetch_assoc()){
                print('<option value="'. $album['aid'].'">'. $album["title"] . '</option>');
              }
              $mysql->close();
                ?>

            </select>
          </p>

        <input type="text" name="caption" placeholder="Caption..."/>
        Date taken: <input type="date" name="date_taken"/>

        Select a file:<input type="file" name="img" />
        
      
      <input class="btn" name="pic_upload" type="submit" value="Upload!" />
      </form>
</div>

                <?php
                $sql = new mysqli("localhost", $DB_Username, $DB_Password, $DB_Name);

                $q = "SELECT url FROM Photos";
                $query = $sql->query($q);

                //TO-DO: easiest way is to stick caption in alt field
                print("<div id='albumPhotosDiv'>");
                while ($result = $query->fetch_assoc()) {
                    $alt = "something";
                    print("
                        <img class='albumImgImg' alt='". $alt . "' src='images/" . $result["url"] . "' /><br />
                        <br /><br /><br />
                    ");
                }
                print("</div>");
                $sql->close();

                ?>
            </div>

           
        
            
        <div id= "footer">
            <p>All right reserved.  Made by Team Round Pandas.</p>
        </div>
    </div>
    </body>
         
</html>