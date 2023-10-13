
<?php

require_once 'config.inc.php';
require_once 'DBClasses.inc.php';

?>
<!DOCTYPE html>
    <html>
        <head>
        <link rel="stylesheet" href="css/Search.css">               
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width,initial-scale=1.0"/>   
        <title>COMP 3512 Assignment 1 Ben Harris-Eze & Matthew Anand</title>
        </head>

        <body>
            <header>
                <p>𝄞 Notes 𝄞</p>
                <nav>
            </header>   
        <ul id="nav">
            <li><a href="Page - Favourites.php">Favourites</a></li> 
            <li><a href="Page - Home.php">Home</a></li>
        </ul>
        <main>
        <fieldset> 
         <legend><h1>Song Search</h1></legend> 
         <div class="grid-container">
            <form method="get" action = "Page - BrowseSearchResults.php" class="form">   
             <p>
            
                <div class="grid-item"><input type ="radio" name = "searchType" value = "Title"/><label>Title:<input type="text" name="title" id="title" class = "inputBox" ></label></div><br><br>
                <div class="grid-item"><input type ="radio" name = "searchType" value = "Artist"/><label for = "artists">Artist:</label>
                <select class="ui fluid dropdown" name="artists" id ="artists">
                <option value='0'>             </option>  
                <?php
                $connstring = "sqlite:./music.db";
                $conn = DatabaseHelper::createConnection(array($connstring));
                $test = new ArtistDB($conn);
                $result = $test->getAll();
               try{
                  foreach($result as $row){
                 echo "<option value =".$row['artist_id'].">".$row['artist_name']."</option>";
                }
               }
               catch(PDOException $ex){
                   echo $ex;
               }
                   // output all the retrieved galleries (hint: set value attribute of <option> to the GalleryID field)
                ?>
            </select>
            </div>
            <div class="grid-item">
            <input type ="radio" name = "useGenre" value = "yes"/><label for = "genres">Genre:</label>
                <select class="ui fluid dropdown" name="genres" id ="genres">
                <option value='0'>                   </option>  
                <?php
                $connstring = "sqlite:./music.db";
                $conn = DatabaseHelper::createConnection(array($connstring));
                $test = new GenreDB($conn);
                $result = $test->getAll();
               try{
                  foreach($result as $row){
                 echo "<option value =".$row['genre_id'].">".$row['genre_name']."</option>";
                }
               }
               catch(PDOException $ex){
                   echo $ex;
               }
                   // output all the retrieved galleries (hint: set value attribute of <option> to the GalleryID field)
                ?>
             </select>
            </div>
            <br>
            <br><br>
            
               
            <div class="grid-item" id="ugh"><ul>
            <input type ="radio" name = "searchType" value = "Year"/><label class="main">Year</label><br><br>
                    
                  <input type ="radio" name = "yearSearch1" value = "less"/><label class="subs">Less Than </label><input type="text" name="YearSmall"><br>
                  <input type ="radio" name = "yearSearch2" value = "greater"/><label class="sub">Greater Than</label><input type="text" name="YearBig">
                    
            </ul></div>
                &emsp;&emsp;
                
               
            </div>
                    </p>
                    <input type="submit" value="Submit" class="button">
        </fieldset>

                
        </form>
        </main>   
    </body>

    
    <footer>
    <p>COMP 3512 &copy;  https://github.com/MatthewAnand  | https://github.com/bharr102 </p>

    </footer>


    </html>