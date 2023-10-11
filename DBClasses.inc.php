<?php 
class DatabaseHelper { 
 /* Returns a connection object to a database */
 public static function createConnection( $values=array() ) { 
 $connString = $values[0]; 
 $pdo = new PDO($connString); 
 $pdo->setAttribute(PDO::ATTR_ERRMODE, 
 PDO::ERRMODE_EXCEPTION); 
 $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, 
 PDO::FETCH_ASSOC); 
 return $pdo; 
 } 
 /*
 Runs the specified SQL query using the passed connection and 
 the passed array of parameters (null if none)
 */
 public static function runQuery($connection, $sql, $parameters) { 
 $statement = null; 
 // if there are parameters then do a prepared statement
 if (isset($parameters)) { 
 // Ensure parameters are in an array
 if (!is_array($parameters)) { 
 $parameters = array($parameters); 
 } 
 // Use a prepared statement if parameters 
 $statement = $connection->prepare($sql); 
 $executedOk = $statement->execute($parameters); 
 if (! $executedOk) throw new PDOException; 
 } else { 
 // Execute a normal query 
 $statement = $connection->query($sql); 
 if (!$statement) throw new PDOException; 
 } 
 return $statement; 
 } 
}
Class ArtistDB{
    private static $baseSQL = "SELECT * FROM artists";
    public function __construct($connection) { 
        $this->pdo = $connection;
    }
    public function getAll() { 
            $sql = self::$baseSQL;  
            $result = DatabaseHelper::runQuery($this->pdo, $sql, null); 
            return $result->fetchAll(); 
            }  
}
Class SongDB{
    private static $baseSQL = "SELECT  duration, title, song_id, bpm, energy, danceability, liveness, valence, acousticness, speechiness, popularity,
     artist_name, type_id, type_name, year, genre_name FROM songs INNER JOIN genres ON songs.genre_id = genres.genre_id
    INNER JOIN artists ON songs.artist_id = artists.artist_id INNER JOIN types ON artists.artist_type_id = types.type_id";
    public function __construct($connection) { 
        $this->pdo = $connection;
    }
    public function getAll() { 
            $sql = self::$baseSQL; 
            $statement = DatabaseHelper::runQuery($this->pdo, $sql, null); 
            return $statement->fetchAll(); 
            } 
    public function getAllArtist($artistID){
        $sql = self::$baseSQL . " WHERE artists.artist_id=".$artistID." ORDER BY artist_name"; 
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, 
        null); 
        return $statement->fetchAll(); }

        public function getAllGenres($genreID){
            $sql = self::$baseSQL . " WHERE genres.genre_id=".$genreID." ORDER BY artist_name"; 
            $statement = DatabaseHelper::runQuery($this->pdo, $sql, 
            null); 
            return $statement->fetchAll(); 
       }
       public function getAllID($song_id){
        $sql = self::$baseSQL . " WHERE song_id=".$song_id." ORDER BY artist_name"; 
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, 
        null); 
        return $statement->fetchAll();   
    }
        public function getAllTitle($title){
        $sql = self::$baseSQL . " WHERE title LIKE '".$title."' ORDER BY artist_name"; 
        $statement = DatabaseHelper::runQuery($this->pdo, $sql, 
        null); 
        return $statement->fetchAll();   
        }
        public function getYearBig($year){
            $sql = self::$baseSQL . " WHERE year >= ".$year." ORDER BY artist_name"; 
            $statement = DatabaseHelper::runQuery($this->pdo, $sql, 
            null); 
            return $statement->fetchAll();   
            }
            public function getYearSmall($year){
                $sql = self::$baseSQL . " WHERE year <= ".$year." ORDER BY artist_name"; 
                $statement = DatabaseHelper::runQuery($this->pdo, $sql, 
                null); 
                return $statement->fetchAll();   
                }
            public function getPopBig($year){
                $sql = self::$baseSQL . " WHERE popularity >= ".$year." ORDER BY artist_name"; 
                $statement = DatabaseHelper::runQuery($this->pdo, $sql, 
                null); 
                return $statement->fetchAll();   
                }
            public function getPopSmall($year){
                $sql = self::$baseSQL . " WHERE popularity <= ".$year." ORDER BY artist_name"; 
                $statement = DatabaseHelper::runQuery($this->pdo, $sql, 
                null); 
                return $statement->fetchAll();   
                }
        public function SongSortTopPop(){
            $sql = self::$baseSQL . " ORDER BY popularity ASC LIMIT 20"; 
                $statement = DatabaseHelper::runQuery($this->pdo, $sql, 
                null); 
                return $statement->fetchAll();   
        }
        public function PlaylistGenre(){
            $sql = "SELECT genres.genre_id, Count(song_id) as num, genre_name FROM songs INNER JOIN genres on songs.genre_id = genres.genre_id Group by genres.genre_id order by genre_name LIMIT 10"; 
                $statement = DatabaseHelper::runQuery($this->pdo, $sql, 
                null); 
                return $statement->fetchAll();  
        }
        public function TopArtist(){
            $sql = "SELECT artist_name, count(song_id) as num FROM songs INNER JOIN artists ON songs.artist_id = artists.artist_id GROUP BY artist_name order by num DESC LIMIT 10";
            $statement = DatabaseHelper::runQuery($this->pdo, $sql, 
            null); 
            return $statement->fetchAll();  
        }
        public function TopPop(){
            $sql = "SELECT title, popularity, artist_name FROM songs INNER JOIN artists ON songs.artist_id = artists.artist_id GROUP BY artist_name ORDER BY popularity DESC LIMIT 10";
            $statement = DatabaseHelper::runQuery($this->pdo, $sql, 
            null); 
            return $statement->fetchAll(); 
        }
        public function Single(){
            $sql = "SELECT title, popularity, count(*) as num, artist_name FROM songs INNER JOIN artists ON songs.artist_id = artists.artist_id GROUP BY artist_name HAVING num = 1 ORDER BY popularity DESC LIMIT 10";
            $statement = DatabaseHelper::runQuery($this->pdo, $sql, 
            null); 
            return $statement->fetchAll(); 
        }
        public function Acoustic(){
            $sql = "SELECT title, popularity, artist_name, acousticness from  songs INNER JOIN artists ON songs.artist_id = artists.artist_id WHERE acousticness > 40 GROUP BY artist_name ORDER BY duration DESC LIMIT 10";
            $statement = DatabaseHelper::runQuery($this->pdo, $sql, 
            null); 
            return $statement->fetchAll(); 
        }
        public function Clubbing(){
            $sql = "SELECT title, popularity, artist_name, ((danceability*1.6)+(energy*1.4)) as calc, danceability from  songs INNER JOIN artists ON songs.artist_id = artists.artist_id WHERE danceability > 80 GROUP BY artist_name ORDER BY calc DESC LIMIT 10";
            $statement = DatabaseHelper::runQuery($this->pdo, $sql, 
            null); 
            return $statement->fetchAll(); 
        }
        public function Running(){
            $sql = "SELECT title, popularity, artist_name, ((valence*1.6)+(energy*1.3)) as calc, bpm from  songs INNER JOIN artists ON songs.artist_id = artists.artist_id WHERE bpm > 120 AND bpm < 125 GROUP BY artist_name ORDER BY calc DESC LIMIT 10";
            $statement = DatabaseHelper::runQuery($this->pdo, $sql, 
            null); 
            return $statement->fetchAll(); 
        }
        public function Study(){
            $sql = "SELECT title, popularity, artist_name, ((acousticness*0.8)+(100-speechiness)+(100-valence)) as calc, bpm, speechiness from  songs INNER JOIN artists ON songs.artist_id = artists.artist_id WHERE bpm >= 100 AND bpm <= 115 AND speechiness >= 1 AND speechiness <= 20 GROUP BY artist_name ORDER BY calc DESC LIMIT 10";
            $statement = DatabaseHelper::runQuery($this->pdo, $sql, 
            null); 
            return $statement->fetchAll(); 
        }
        public function GetAllFavourites(){
            
        }
    }
Class GenreDB{
    private static $baseSQL = "SELECT * FROM genres ORDER BY 'genre_id'";
    public function __construct($connection) { 
        $this->pdo = $connection;
    }
    public function getAll() { 
            $sql = self::$baseSQL; 
            $statement = 
            DatabaseHelper::runQuery($this->pdo, $sql, null); 
            return $statement->fetchAll(); 
            }  
}
Class TypeDB{
    private static $baseSQL = "SELECT * FROM types ORDER BY 'type_id'";
    public function __construct($connection) { 
        $this->pdo = $connection;
    }
    public function getAll() { 
            $sql = self::$baseSQL; 
            $statement = 
            DatabaseHelper::runQuery($this->pdo, $sql, null); 
            return $statement->fetchAll(); 
            }  
}