<?php

require_once 'config.inc.php';
require_once 'DBClasses.inc.php';

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/Singlesong.css">
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>  
    <title>COMP 3512 Assignment 1 Ben Harris-Eze & Matthew Anand</title>

</head>

<body>
<header>
<h1 class="title">&#119070 Notes &#119070</h1>
<ul id="nav">
            <li><a href="Page - Home.php">Home</a></li> 
            <li><a href="Page - Search.php">Search</a></li>
</ul>
</header>

<h1>Song Information</h1>



<div class="grid-container">
<div>
<table>
            <tr>
                <th>Title</th>
                <th>Artist Name</th>
                <th>Artist Type</th>
                <th>Genre</th>
                <th>Year</th>
                <th>Duration</th>
            </tr>
</div>
            <?php
$connstring = "sqlite:./music.db";
$conn = DatabaseHelper::createConnection(array($connstring));
$test = new SongDB($conn);
if(isset($_GET['id'])){  
    $results = $test->getAllID($_GET['id']);
    try{
      foreach($results as $row){
        echo "<tr>";
        echo "<td>".$row['title']."</td>";
        echo "<td>".$row['artist_name']."</td>";
        echo "<td>".$row['type_name']."</td>";
        echo "<td>".$row['genre_name']."</td>";
        echo "<td>".$row['year']."</td>";
        echo "<td>".gmdate('i:s',$row['duration'])."</td>";
        echo"</tr>";
      }
  }
//  }
    catch (PDOException $ex){

      }
    }
    if(isset($_GET['Song'])){  
      $results = $test->getAllTitle($_GET['Song']);
      try{
        foreach($results as $row){
          echo "<tr>";
          echo "<td>".$row['title']."</td>";
          echo "<td>".$row['artist_name']."</td>";
          echo "<td>".$row['type_name']."</td>";
          echo "<td>".$row['genre_name']."</td>";
          echo "<td>".$row['year']."</td>";
          echo "<td>".gmdate('i:s',$row['duration'])."</td>";
          echo"</tr>";
        }
    }

      catch (PDOException $ex){
  
        }
      }
    ?>
        </table>
<br><br><br>
<div>
<table>
    <tr>
        <th>BPM</th>
        <th>Energy</th>
        <th>Dancability</th>
        <th>Liveness</th>
        <th>Valence</th>
        <th>Acousticness</th>
        <th>Speechiness</th>
        <th>Popularity</th>
    </tr>
    </div>
    <?php
$connstring = "sqlite:./music.db";
$conn = DatabaseHelper::createConnection(array($connstring));
$test = new SongDB($conn);
if(isset($_GET['id'])){  
    $results = $test->getAllID($_GET['id']);
    try{
      foreach($results as $row){
        echo "<tr>";
        echo "<td>".$row['bpm']."</td>";
        echo "<td>".$row['energy']."</td>";
        echo "<td>".$row['danceability']."</td>";
        echo "<td>".$row['liveness']."</td>";
        echo "<td>".$row['valence']."</td>";
        echo "<td>".$row['acousticness']."</td>";
        echo "<td>".$row['speechiness']."</td>";
        echo "<td>".$row['popularity']."</td>";
        echo"</tr>";
      }
  }
//  }
    catch (PDOException $ex){

      }
    }
    if(isset($_GET['Song'])){  
      $results = $test->getAllTitle($_GET['Song']);
      try{
        foreach($results as $row){
          echo "<tr>";
          echo "<td>".$row['bpm']."</td>";
          echo "<td>".$row['energy']."</td>";
          echo "<td>".$row['danceability']."</td>";
          echo "<td>".$row['liveness']."</td>";
          echo "<td>".$row['valence']."</td>";
          echo "<td>".$row['acousticness']."</td>";
          echo "<td>".$row['speechiness']."</td>";
          echo "<td>".$row['popularity']."</td>";
          echo"</tr>";
        }
    }
  //  }
      catch (PDOException $ex){
  
        }
      }
    ?>
</table>
    </div>
</body>

<footer class="footy">
<p>COMP 3512|A Good Value Creation&copy;  https://github.com/MatthewAnand  |  https://github.com/bharr102 </p>
</footer>

</html>
