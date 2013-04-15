<?php
include 'model.php';

class homeModel extends Model
{
    public function getMovies()
    {
        $sql = "SELECT
                        *   
                FROM 
                    movies
                ORDER BY movie_title DESC";
         
        $this->_setSql($sql);
        $movies = $this->getAll();
         
        if (empty($movies))
        {
            return false;
        }
         
        return $movies;
    }
     
    public function getMoviesById($movie_id)
    {
        $sql = "SELECT
                    movie_id,
                    movie_title,
                    movie_time,
					movie_description
                FROM 
                    movies
                WHERE 
                    movie_id = $movie_id";
         
        $this->_setSql($sql);
        $movieDetails = $this->getRow(array($movie_id));
         
        if (empty($movieDetails))
        {
            return false;
        }
         
        return $movieDetails;
    }
}

?>