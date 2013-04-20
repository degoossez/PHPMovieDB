<?php

include 'controller.php';

class homeController extends Controller
{
	public function __construct($model, $action)
	{
	parent::__construct($model, $action);
	$this->_setModel($model);
	}
	public function index()
		{
		try {
            $Genres = $this->_model->getGenres();
            $this->_view->set('genres', $Genres);
			$movies = $this->_model->getMovies();
            $counter = 0;
            $actors = array();
            foreach($movies as $m)
            {
                $actors[$counter] = array();
                $actorids = $this->_model->getActorsByMovieId($m['movie_id']);

                $counter2 = 0;
                foreach($actorids as $a)
                {
                    $actors[$counter][$counter2] = $this->_model->getActorsById($a['actor_id']);
                    $counter2++;
                }
                $counter++;
            }
			$this->_view->set('movies', $movies);
            $this->_view->set('actors', $actors);
			$this->_view->set('title', "Dries' Movie Database");
			return $this->_view->output();
		} 
		catch (Exception $e) 
		{
			echo "Application error:" . $e->getMessage();
		}
	}
    public function details($movieId)
    {
        try {
            $movie = $this->_model->getMoviesById((int)$movieId);
            
            if ($movie)
            {
                $votes = $this->_model->getVotesByMovieId((int)$movieId);
                if($votes)
                {
                    $count = 0;
                    $total=0;
                    foreach($votes as $v)
                       {
                            $total=$total+(int)$v['votes_rating'];
                            $count++;
                       } 
                    $av = $total/$count;
                    $this->_view->set('av', $av);
                }                
                $commentids = $this->_model->getCommentsIdByMovieId($movieId);
                if($commentids)
                {
                    for($i=0;$i<count($commentids);$i++)
                       {
                            $comments[] = $this->_model->getCommentsById($commentids[$i]['comment_id']);
                       } 
                    $this->_view->set('comments', $comments);
                }
                else
                {
                    $this->_view->set('comments', false);
                }
                $counter=0;
                $moviegenres = array();
                $genresid = $this->_model->getGenresIdByMovieId((int)$movieId);
                if($genresid)
                {
                    foreach($genresid as $gid)
                    {
                        $moviegenres[$counter] = $this->_model->getGenresById($gid['genre_id']);
                        $counter++;
                    } 
                    $this->_view->set('moviegen', $moviegenres);
                }
                $counter1=0;
                $actors = array();
                $actorsid = $this->_model->getActorsByMovieId((int)$movieId);
                if($actorsid)
                {
                    foreach($actorsid as $aid)
                    {
                        $actors[$counter1] = $this->_model->getActorsById($aid['actor_id']);
                        $counter1++;
                    }
                    $this->_view->set('actors', $actors);
                }
                $Genres = $this->_model->getGenres();
                if($Genres)
                {
                    $this->_view->set('genres', $Genres);
                }
                $this->_view->set('title', "Dries' Movie Database");
                $this->_view->set('movie', $movie);
            }
            else
            {
                $Genres = $this->_model->getGenres();
                if($Genres)
                {
                $this->_view->set('genres', $Genres);
                }
                $this->_view->set('comments', false);
                $this->_view->set('title', "Dries' Movie Database");
                $this->_view->set('movie_title', 'Invalid movie ID');
                $this->_view->set('noArticle', true);
            }
             
            return $this->_view->output();
              
        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
    }
    public function genres($genreid)
    {
        try {

                $moviesids = $this->_model->getMoviesIdByGenreId($genreid);
                for($i=0;$i<count($moviesids);$i++)
                   {
                        $movies[] = $this->_model->getMoviesById($moviesids[$i]['movie_id']);
                   } 
                $actors = array();
                $counter=0;
                foreach($movies as $m)
                {
                    $actors[$counter] = array();
                    $actorids = $this->_model->getActorsByMovieId($m['movie_id']);

                    $counter2 = 0;
                    foreach($actorids as $a)
                    {
                        $actors[$counter][$counter2] = $this->_model->getActorsById($a['actor_id']);
                        $counter2++;
                    }
                    $counter++;
                }
                $Genres = $this->_model->getGenres();
                $this->_view->set('actors', $actors);
                $this->_view->set('movies', $movies);
                $this->_view->set('genres', $Genres);
                $this->_view->set('title', "Dries' Movie Database");
                return $this->_view->output();
        } 
        catch (Exception $e) 
        {
            $this->_setView('index');
            $Genres = $this->_model->getGenres();
            $movies=array();
            $this->_view->set('movies',$movies);
            $this->_view->set('genres', $Genres);
            $this->_view->set('title', "Dries' Movie Database");
            return $this->_view->output();
        }
    }
    public function actors($actor_id)
        {
        try {
                $moviesids = $this->_model->getMoviesIdByActorId($actor_id);
                for($i=0;$i<count($moviesids);$i++)
                   {
                        $movies[] = $this->_model->getMoviesById($moviesids[$i]['movie_id']);
                   } 
            $actor= $this->_model->getActorsById($actor_id);
            $Genres = $this->_model->getGenres();
            $this->_view->set('actor',$actor);
            $this->_view->set('movies', $movies);
            $this->_view->set('genres', $Genres);
            $this->_view->set('title', "Dries' Movie Database");
            return $this->_view->output();
        } 
        catch (Exception $e) 
        {
            echo "Application error:" . $e->getMessage();
        }
    }
    public function addrating($input)
        {
        try {
            $data = explode(".", $input);
            $rating=$data[1];
            $movieid=$data[0];
            $errors = array();
            $check = true;
            $sid = session_id();
            if($sid) {
                $username = $_SESSION['username'];  
            }
            else {
                session_start();
                if (isset($_SESSION['username']))
                {
                    //echo 'Gebruiker is ingelogd met gebruikersnaam '.$_SESSION['username'];
                    $username = $_SESSION['username'];  
                }            
            }
            if (empty($username))
            {
                $check = false;
                array_push($errors, "You have to be logged in!");
            } 
            if (!$check)
            {
                $this->_setView('voted');
                $this->_view->set('movied',$movieid);
                $Genres = $this->_model->getGenres();
                $this->_view->set('genres', $Genres);
                $this->_view->set('title', "Dries' Movie Database");
                return $this->_view->output();  
            }  
            $this->_model->storerating($movieid,$rating);   
            $this->_setView('voted');
            $this->_view->set('movied',$movieid);
            $Genres = $this->_model->getGenres();
            $this->_view->set('genres', $Genres);
            $this->_view->set('title', "Dries' Movie Database");
            return $this->_view->output();        

        } 
        catch (Exception $e) 
        {
            echo "Application error:" . $e->getMessage();
        }
    }
}
?>
     