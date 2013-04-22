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
                ORDER BY movie_year DESC";
         
        $this->_setSql($sql);
        $movies = $this->getAll();
         
        if (empty($movies))
        {
            return false;
        }
         
        return $movies;
    }
    public function getMovies2()
    {
        $sql = "SELECT
                        *   
                FROM 
                    movies
                ORDER BY movie_id ASC";
         
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
                    *
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
    public function getGenresIdByMovieId($movie_id)
    {
        $sql = "SELECT
                    genre_id 
                FROM 
                    movgen
                WHERE
                    movie_id = $movie_id";
         
        $this->_setSql($sql);
        $genres = $this->getAll();
         
        if (empty($genres))
        {
            return false;
        }
         
        return $genres;
    }
    public function getGenresById($genre_id)
    {
        $sql = "SELECT
                    genre_id,
                    genre_name
                FROM 
                    genres
                WHERE
                    genre_id = $genre_id";
         
        $this->_setSql($sql);
        $genrename = $this->getAll();
         
        if (empty($genrename))
        {
            return false;
        }
         
        return $genrename;        
    }
    public function getActorsByMovieId($movieid)
    {
        $sql = "SELECT
                    actor_id
                FROM
                    movact
                WHERE
                    movie_id = $movieid";
        $this->_setSql($sql);
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
                    actor_id,
                    actor_name,
                    actor_birth,
                    actor_pic
                FROM 
                    actor
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
    public function getMoviesIdByActorId($actorid)
    {
        $sql = "SELECT
                    movie_id   
                FROM 
                    movact
                WHERE
                    actor_id = $actorid";
         
        $this->_setSql($sql);
        $movies = $this->getAll();
         
        if (empty($movies))
        {
            return false;
        }
         
        return $movies;
    }
    public function getCommentsIdByMovieId($movieid)
    {
        $sql = "SELECT
                    comment_id
                FROM
                    movcom
                WHERE
                    movie_id = $movieid";
        $this->_setSql($sql);
        $commentsid = $this->getAll();

        if(empty($commentsid))
        {
            return false;
        }
        return $commentsid;
    }
    public function getCommentsById($commentId)
    {
        $sql = "SELECT
                    *
                FROM
                    comments
                WHERE
                    comment_id = $commentId";
        $this->_setSql($sql);
        $comment = $this->getAll();

        if(empty($comment))
        {
            return false;
        }
        return $comment;        
    }
    public function getVotesByMovieId($movie_id)
    {
        $sql = "SELECT
                    votes_rating
                FROM 
                    votes
                WHERE
                    movie_id = $movie_id";
         
        $this->_setSql($sql);
        $votes = $this->getAll();
         
        if (empty($votes))
        {
            return false;
        }
         
        return $votes;
    }  
    public function storerating($movieid,$rating)
    {
        $sql = "INSERT INTO votes
                    (movie_id, votes_rating)
                VALUES
                    ( ?, ?)";
         
        $data = array(
            $movieid,
            $rating
        );
         
        $sth = $this->_db->prepare($sql);
        return $sth->execute($data);
    }
    public function searchActors($input)
    {
        $sql = "SELECT * 
                FROM  `actor` 
                WHERE  `actor_name` LIKE  '%$input%'";
         
        $this->_setSql($sql);
        $actor = $this->getAll();
         
        if (empty($actor))
        {
            return false;
        }
         
        return $actor;        
    }
    public function searchMovies($input)
    {
        $sql = "SELECT * 
                FROM  `movies` 
                WHERE  `movie_title` LIKE  '%$input%'
                OR `movie_title` LIKE '%$input%'";
         
        $this->_setSql($sql);
        $movie = $this->getAll();
         
        if (empty($movie))
        {
            return false;
        }
         
        return $movie;        
    }
}

?>