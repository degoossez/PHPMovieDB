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
    public function getGenres()
    {
        $sql = "SELECT
                        *   
                FROM 
                    genres
                ORDER BY genre_name ASC";
         
        $this->_setSql($sql);
        $genres = $this->getAll();
         
        if (empty($genres))
        {
            return false;
        }
         
        return $genres;
    }
    public function getMoviesIdByGenreId($genreid)
    {
        $sql = "SELECT
                    movie_id   
                FROM 
                    movgen
                WHERE
                    genre_id = $genreid";
         
        $this->_setSql($sql);
        $movies = $this->getAll();
         
        if (empty($movies))
        {
            return false;
        }
         
        return $movies;
    }
    public function getActorsByMovieId($movieid)
    {
        $sql = "SELECT
                    actor_id
                FROM
                    movact
                WHERE
                    movie_id = $movieid";
        $this->setSql($sql);
        $actors = $this->getAll();

        if(empty($actors))
        {
            return false;
        }
        return $actors;
    }
    public function getActorsById($actor_id)
    {
        $sql = "SELECT
                    actor_name,
                    actor_birth
                FROM 
                    actors
                WHERE
                    actor_id = $actor_id";
         
        $this->_setSql($sql);
        $actorDetails = $this->getRow(array($actor_id));
         
        if (empty($actorDetails))
        {
            return false;
        }
         
        return $actorDetails;
    }
}

?>