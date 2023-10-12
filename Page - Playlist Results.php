<?php

require_once 'config.inc.php';
require_once 'DBClasses.inc.php';

?>

<!DOCTYPE html>
<html>
    <head>
<link rel="stylesheet" href="css/Playlist.css">
</head>
<body>
  <header>
  <h1 class=>COMP 3512 Assignment 1 Ben Harris-Eze & Matthew Anand</h1>
  <ul id="nav">
            <li id="navbar"><a href="Page - Home.php">Home</a></li> 
</ul> 
</header>
<h1 class="title">&#119070 Notes &#119070</h1>
<div class="output">
<?php
$connstring = "sqlite:./music.db";
$conn = DatabaseHelper::createConnection(array($connstring));
$test = new SongDB($conn);
    if ($_GET['Playlist'] == 'TopGenres'){
      $result = $test->PlaylistGenre();
      try{
        echo "<h1> &#128526 Top Genres &#128526 </h1>";
          echo "<ol>";
        foreach($result as $row){
          echo "<li>".$row['genre_name']." - ". $row['num'] . "</li>";
     }
     echo "</ol>";
     echo "<img src='images\Genres.jpg ' alt='Genres' style='width:500px;height:500px;'>";
    }
     catch(PDOException $ex){
         echo $ex;
     }
    }
    if ($_GET['Playlist'] == 'TopArtists'){
      $result = $test->TopArtist();
      try{
        echo "<h1> &#128081 Top Artists &#128081 </h1>";
        echo "<ol>";
        foreach($result as $row){
          echo "<li>".$row['artist_name']." - ". $row['num'] . "</td>";
     }
     echo "</ol>";
     echo "<img src='images\artist.png ' alt='Genres' style='width:500px;height:500px;'>";
    }
     catch(PDOException $ex){
         echo $ex;
     }
    }
    if ($_GET['Playlist'] == 'TopPop'){
      $result = $test->TopPop();
      try{
        echo "<h1>  &#128158 Most Popular Songs  &#128158 </h1>";
        echo "<ol>";
      foreach($result as $row){
        
        echo "<li>".$row['artist_name']." - <a href = 'Page - Single Song Page.php?Song=".$row['title']."'>".$row['title']." </a> - ". $row['popularity'];
        echo"</li>";
    }
    echo "</ol>";
    echo "<img src='images\Popular.jpg ' alt='Genres' style='width:500px;height:500px;'>";
   }
     catch(PDOException $ex){
         echo $ex;
     }
    }
    if ($_GET['Playlist'] == 'OneHit'){
      $result = $test->Single();
      try{
        echo "<h1> &#127776 One Hit Wonders &#127776 </h1>";
        echo "<ol>";
      foreach($result as $row){
        
        echo "<li>".$row['artist_name']." - <a href = 'Page - Single Song Page.php?Song=".$row['title']."'>".$row['title']." </a> - ". $row['popularity'];
        echo"</li>";
    }
    echo "</ol>";
    echo "<img src='images\onehit.jpg ' alt='Genres' style='width:500px;height:500px;'>";
   }
     catch(PDOException $ex){
         echo $ex;
     }
    }
    if ($_GET['Playlist'] == 'Acoustic'){
      $result = $test->Acoustic();
      try{
        echo "<h1> &#127928 Longest Acoustic Songs &#127928 </h1>";
        echo "<ol>";
      foreach($result as $row){
        
        echo "<li>".$row['artist_name']." - <a href = 'Page - Single Song Page.php?Song=".$row['title']."'>".$row['title']." </a> - ". $row['acousticness'];
        echo"</li>";
    }
    echo "</ol>";
    echo "<img src='images\acoustic.jpg ' alt='Genres' style='width:500px;height:500px;'>";
   }
     catch(PDOException $ex){
         echo $ex;
     }
    }
    if ($_GET['Playlist'] == 'Club'){
      $result = $test->Clubbing();
      try{
        echo "<h1> &#128378 At The Club &#128378 </h1>";
        echo "<ol>";
      foreach($result as $row){
        
        echo "<li>".$row['artist_name']." - <a href = 'Page - Single Song Page.php?Song=".$row['title']."'>".$row['title']." </a> - ". $row['danceability'];
        echo"</li>";
    }
    echo "</ol>";
    echo "<img src='images\clubbing.jpg ' alt='Genres' style='width:500px;height:500px;'>";
   }
     catch(PDOException $ex){
         echo $ex;
     }
    }
    if ($_GET['Playlist'] == 'Running'){
      $result = $test->Running();
      try{
        echo "<h1> &#127939 Running &#127939 </h1>";
        echo "<ol>";
      foreach($result as $row){
        
        echo "<li>".$row['artist_name']." - <a href = 'Page - Single Song Page.php?Song=".$row['title']."'>".$row['title']." </a> - ". $row['bpm'];
        echo"</li>";
    }
    echo "</ol>";
    echo "<img src='images/running.jpg ' alt='Genres' style='width:500px;height:500px;'>";
   }
     catch(PDOException $ex){
         echo $ex;
     }
    }
    if ($_GET['Playlist'] == 'Studying'){
      $result = $test->Study();
        try{
          echo "<h1> &#129299 Studying &#129299 </h1>";
          echo "<ol>";
        foreach($result as $row){
          
          echo "<li>".$row['artist_name']." - <a href = 'Page - Single Song Page.php?Song=".$row['title']."'>".$row['title']." </a> - ". $row['bpm'];
          echo"</li>";
      }
      echo "</ol>";
      echo "<img src='images\study.jpg ' alt='Genres' style='width:500px;height:500px;'>";
     }
     catch(PDOException $ex){
         echo $ex;
     }
    }
?>
</div>
<footer class="footy">
<p>COMP 3512|A Good Value Creation&copy;  https://github.com/MatthewAnand  |  https://github.com/bharr102 </p>
    </footer>