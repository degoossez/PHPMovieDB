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
			$movies = $this->_model->getMovies();
			$this->_view->set('movies', $movies);
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
                $this->_view->set('title', "Dries' Movie Database");
                $this->_view->set('movie_title', $movie['movie_title']);
                $this->_view->set('movie_description', $movie['movie_description']);
                $this->_view->set('movie_time', $movie['movie_time']);
            }
            else
            {
                $this->_view->set('title', "Dries' Movie Database");
                $this->_view->set('movie_title', 'Invalid article ID');
                $this->_view->set('noArticle', true);
            }
             
            return $this->_view->output();
              
        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
    }
}
?>
     