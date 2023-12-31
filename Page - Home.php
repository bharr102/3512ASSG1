<?php

require_once 'config.inc.php';
require_once 'DBClasses.inc.php';

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/home.css">
    </head>
    <body>
    <header>
    
    <h1 class="title">&#119070 Notes &#119070</h1> 
</header>
        
 <ul class = "nav">
            <li><a href="Page - Favourites.php">Favourites</a></li> 
            <li><a href="Page - Search.php">Search</a></li>
</ul>
    
    <form method="GET" action = "Page - Playlist Results.php">
    <div class="grid-container">
  <div class="grid-item" id="genre"><a href = "Page - Playlist Results.php?Playlist=TopGenres">Top Genres</a></div>
  <div class="grid-item" id="artist"><a href = "Page - Playlist Results.php?Playlist=TopArtists">Top Artists</a></div>
  <div class="grid-item" id="popSong"><a href = "Page - Playlist Results.php?Playlist=TopPop">Most Popular Songs</a></div>
  <div class="grid-item" id="oneHit"><a href = "Page - Playlist Results.php?Playlist=OneHit">One Hit Wonders</a></div>
  <div class="grid-item" id="longSong"><a href = "Page - Playlist Results.php?Playlist=Acoustic">Longest Acoustic Songs</a></div>
  <div class="grid-item" id="club"><a href = "Page - Playlist Results.php?Playlist=Club">At the Club</a></div>
  <div class="grid-item" id="runSong"><a href = "Page - Playlist Results.php?Playlist=Running">Running Songs</a></div>
  <div class="grid-item" id="study"><a href = "Page - Playlist Results.php?Playlist=Studying">Studying</a></div>
</div>
    </form>

    <footer>
    <p>COMP 3512|A Good Value Creation&copy;  https://github.com/MatthewAnand  |  https://github.com/bharr102 </p>
    </footer>

    </body>
    
  
  
</body>
</html>
