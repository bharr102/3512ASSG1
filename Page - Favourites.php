<?php

require_once 'config.inc.php';
require_once 'DBClasses.inc.php';

?>
<!DOCTYPE html>
<html lang="en">
        <head>
            <meta charset="utf-8">
            <title>COMP 3512 Assignment 1 Ben Harris-Eze & Matthew Anand</title>
        <link rel="stylesheet" href="css/favourites.css">

    </head>

    <body>
    <header>
    <h1 class="title">𝄞 Notes 𝄞</h1>
    <ul id="nav">
            <li><a href="Page - Home.php">Home</a></li> 
            <li><a href="Page - Search.php">Search</a></li>
</ul>
</header>
<?php
     echo"   <h1 class ='subHeading'>Favourites</h1>";
     echo"     <table>";
     echo"      <tr>";
     echo"         <th>Title</th>";
     echo"           <th>Artist</th>";
     echo "          <th>Year</th>";
     echo"           <th>Genre</th>";
     echo"           <th>Popularity</th>";
     echo"           <th> <a href='Page - Favourites.php?removeall'> Remove all</a></td>";
     echo"</tr>";
       session_start();
         $connstring = "sqlite:./music.db";
         $conn = DatabaseHelper::createConnection(array($connstring));
         $test = new SongDB($conn);
         if(isset($_GET['song_id'])){
            if(! isset($_SESSION['Favourites'])){
                $_SESSION['Favourites'] = [];
            }
            $_SESSION['Favourites'] []= $_GET['song_id'];
            $_SESSION['Favourites'] = array_unique($_SESSION['Favourites']);
    try{
      foreach($_SESSION['Favourites'] as $song_id){
        $songinfo =  $test->getAllID($song_id)[0];
            echo "<tr>";
            echo "<td><form id='form".$song_id."' method='GET' action ='Page - Single Song Page.php?=".$song_id."'><input type='hidden' name='id' value='".$song_id."'/>".$songinfo['title']."</form></td>";
            echo "<td>".$songinfo['artist_name']."</td>";
            echo "<td>".$songinfo['year']."</td>";
            echo "<td>".$songinfo['genre_name']."</td>";
            echo "<td>".$songinfo['popularity']."</td>";
            echo "<td><a href='Page - Favourites.php?remove=".$song_id."'> Remove From Favourites</a></td>";
            echo"</tr>";
         }
        }
        catch (Exception $ex){

        }
    }
    else if (isset($_GET['removeall'])){
        session_destroy();
    }
   else if(isset($_GET['remove'])){
    $songid=$_GET['remove'];
    $data = $_SESSION['Favourites'];
    foreach ($_SESSION['Favourites'] as $key => $value){
        if ($value == $songid){
    unset($data[$key]);
    }
}
    $_SESSION['Favourites'] = $data;
    
try{
  foreach($_SESSION['Favourites'] as $song_id){
    $songinfo =  $test->getAllID($song_id)[0];
        echo "<tr>";
        echo "<td><form id='form".$song_id."' method='GET' action ='Page - Single Song Page.php?=".$song_id."'><input type='hidden' name='id' value='".$song_id."'/>".$songinfo['title']."</form></td>";
        echo "<td>".$songinfo['artist_name']."</td>";
        echo "<td>".$songinfo['year']."</td>";
        echo "<td>".$songinfo['genre_name']."</td>";
        echo "<td>".$songinfo['popularity']."</td>";
        echo "<td><a href='Page - Favourites.php?remove=".$song_id."'> Remove From Favourites</a></td>";
        echo"</tr>";
     }
    }
    catch (Exception $ex){

    }
}
else{
    if(! isset($_SESSION['Favourites'])){
        $_SESSION['Favourites'] = [];
    }
    $_SESSION['Favourites'] = array_unique($_SESSION['Favourites']);
    try{
        foreach($_SESSION['Favourites'] as $song_id){
          $songinfo =  $test->getAllID($song_id)[0];
              echo "<tr>";
              echo "<td><form id='form".$song_id."' method='GET' action ='Page - Single Song Page.php?=".$song_id."'><input type='hidden' name='id' value='".$song_id."'/>".$songinfo['title']."</form></td>";
              echo "<td>".$songinfo['artist_name']."</td>";
              echo "<td>".$songinfo['year']."</td>";
              echo "<td>".$songinfo['genre_name']."</td>";
              echo "<td>".$songinfo['popularity']."</td>";
              echo "<td><a href='Page - Favourites.php?remove=".$song_id."'> Remove From Favourites</a></td>";
              echo"</tr>";
           }
          }
          catch (Exception $ex){
      
          }
}
        ?>
            </table>
    </body>
    <footer class="footy">
<p>COMP 3512|A Good Value Creation&copy;  https://github.com/MatthewAnand  |  https://github.com/bharr102 </p>
    </footer>
</html>