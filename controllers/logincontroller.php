<?php

//include 'controller.php';

class LoginController extends Controller
{
	public function __construct($model, $action)
	{
	parent::__construct($model, $action);
	$this->_setModel($model);
	}
	public function check()
	{
			if (!isset($_POST['loginFormSubmit']))
		    {
		        header('Location: /reg/index');
		    }
			if (!isset($_POST['username']) || !isset($_POST['password'])) {
				echo 'You have to give password and account name.';
				exit;
			} 
			$username = $this->_model->getUserByName($_POST['username']);
			$pass = $this->_model->getPassword($_POST['password']);
			if($username == FALSE || $pass==FALSE)
			{
				echo("Pass and/or accountname is wrong!");
			}
			else
			{
				if ($username && $pass) {
				session_start();
				$_SESSION['username'] = $_POST['username'];
							$this->_setView('succes');
							$this->_view->set('title','Logged In');
							$this->_view->set('username', $_POST['username']);
							return $this->_view->output();
				}		
			}
			$this->_setView('index');
			$this->_view->set('title', 'Log In');
			return $this->_view->output();
	}
	public function logoff()
	{	
		$this->_view->set('title','Log Out');
		$this->_model->LogOff();
		return $this->_view->output();
	}
}
?>