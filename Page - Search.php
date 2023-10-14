
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
                <h1 class="title">𝄞 Notes 𝄞</h1>
            </header>   
        <ul id="nav">
            <li><a href="Page - Favourites.php">Favourites</a></li> 
            <li><a href="Page - Home.php">Home</a></li>
        </ul>
        <main>
        <fieldset> 
         <legend><h1>Search</h1></legend> 
         <div class="grid-container">
            <form method="get" action = "Page - BrowseSearchResults.php" class="form">   
             <p>
            
                <div class="grid-item"><input type ="radio" name = "searchType1" value = "Title"/><label>Title:<input type="text" name="title" id="title" class = "inputBox" ></label></div><br><br>
                <div class="grid-item"><input type ="radio" name = "searchType1" value = "Artist"/><label for = "artists">Artist:</label>
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
            <input type ="radio" name = "SearchType2" value = "genre"/><label for = "genres">Genre:</label>
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
            <input type ="radio" name = "searchType1" value = "Year" id = "year"/><label class="main" for = "year">Year</label><br><br>
                    
                  <span><input type ="radio" name = "SearchType2" value = "less" id ="less"/><label class="subs" for = "less">Less Than </label><br><input type="text" name="YearSmall" id = "lessThan"><span><br>
                  <span><input type ="radio" name = "SearchType2" value = "greater" id = "greater"/><label class="sub" for ="greater">Greater Than</label><br><input type="text" name="YearBig" id = "greaterThan"></span>
                    
            </ul></div>
                &emsp;&emsp;
                
                </p>
                    <input type="submit" value="Submit" class="button">
            </div>
                    
        </fieldset>

                
        </form>
        </main>   
    </body>

    
    <footer class="footy">
        <p>COMP 3512|A Good Value Creation&copy;  https://github.com/MatthewAnand  |  https://github.com/bharr102 </p>
    </footer>


    </html>