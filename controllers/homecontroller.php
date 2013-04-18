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
			$movies = $this->_model->getMovies2();
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
                $counter=0;
                $moviegenres = array();
                $genresid = $this->_model->getGenresIdByMovieId((int)$movieId);
                foreach($genresid as $gid)
                {
                    $moviegenres[$counter] = $this->_model->getGenresById($gid['genre_id']);
                    $counter++;
                } 
                $counter1=0;
                $actors = array();
                $actorsid = $this->_model->getActorsByMovieId((int)$movieId);
                foreach($actorsid as $aid)
                {
                    $actors[$counter1] = $this->_model->getActorsById($aid['actor_id']);
                    $counter1++;
                }
                $Genres = $this->_model->getGenres();
                $this->_view->set('moviegen', $moviegenres);
                $this->_view->set('actors', $actors);
                $this->_view->set('genres', $Genres);
                $this->_view->set('title', "Dries' Movie Database");
                $this->_view->set('movie', $movie);
            }
            else
            {
                $Genres = $this->_model->getGenres();
                $this->_view->set('genres', $Genres);
                $this->_view->set('title', "Dries' Movie Database");
                $this->_view->set('movie_title', 'Invalid article ID');
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
            $this->_view->set('genres', $Genres);
            $this->_view->set('title', "Dries' Movie Database");
            return $this->_view->output();
        }
    }
}
?>
     