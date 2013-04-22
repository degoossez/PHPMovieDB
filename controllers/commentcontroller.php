<?php

class CommentController extends Controller
{
		public function index()
		{
			$this->_view->set('title', 'News articles from the database');
			return $this->_view->output();
		}
    	public function addcomment($movieid)
        {
            if (!isset($_POST['commentFormSubmit']))
            {
                header('Location: /home/details <?php echo $movieid; ?>');
                exit();
            }
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
            $errors = array();
            $check = true;
                 
            $commentdata = isset($_POST['commentdata']);
            $commentdata = strip_tags($_POST['commentdata']);
            if (empty($commentdata))
            {
                $check = false;
                array_push($errors, "You have to put something in the comment box!");
            }         
            if (empty($username))
            {
                $check = false;
                array_push($errors, "You have to be logged in!");
            }         
            if (!$check)
            {
                $this->_setView('index');
                $this->_view->set('title', "Dries' Movie Database");
                $this->_view->set('warning', 'Invalid form data!');
                $this->_view->set('errors', $errors);
                $this->_view->set('formData', $_POST);
                $this->_view->set('movieid', $movieid);

                return $this->_view->output();
            }  
            try {
                         
                $comment = new CommentModel();
                $comment->setUsername($username);
                $comment->setcomment($commentdata);
		        $comment->store();
                $commentid = $comment->getCommentId($username,$commentdata);
                $comment->setCommentId((int)$commentid[0]['comment_id']);
                $comment->setMovieId($movieid);
                $comment->storemovcom();
                $this->_setView('succes');
                $this->_view->set('msg', 'Store success!');
                $this->_view->set('title', "Dries' Movie Database");
                $this->_view->set('movieid', $movieid);
                $data = array(
                    'comment' => $commentdata,
                    'username'=> $username
                );
                         
                $this->_view->set('commentData', $data);
                         
            } catch (Exception $e) {
                $this->_setView('index');
                $this->_view->set('title', 'There was an error saving the data!');
                $this->_view->set('formData', $_POST);
                $this->_view->set('movieid', $movieid);
                //$this->_view->set('saveError', $e->getpassword());
            }
            return $this->_view->output();
        }
}