<?php

class RegController extends Controller
{
		public function index()
		{
			$this->_view->set('title', 'News articles from the database');
			return $this->_view->output();
		}
		public function save()
		{
		    if (!isset($_POST['regFormSubmit']))
		    {
		        header('Location: /reg/index');
		        exit();
		    }
		     
		    $errors = array();
		    $check = true;
		         
		    $username = isset($_POST['username']);
		    $username = strip_tags($_POST['username']);
		    $email = isset($_POST['email']);
		    $email = strip_tags($_POST['email']);
		    $password = isset($_POST['password']);
		    $password = strip_tags($_POST['password']);
		         
		    if (empty($email))
		    {
		        $check = false;
		        array_push($errors, "E-mail is required!");
		    }
		    else if (!filter_var( $email, FILTER_VALIDATE_EMAIL ))
		    {
		        $check = false;
		        array_push($errors, "Invalid E-mail!");
		    }
		    if (empty($username))
		    {
		        $check = false;
		        array_push($errors, "Username is required!");
		    }         
		    if (empty($password))
		    {
		        $check = false;
		        array_push($errors, "Password is required!");
		    }
		 
		    if (!$check)
		    {
		        $this->_setView('index');
		        $this->_view->set('title', 'Invalid form data!');
		        $this->_view->set('errors', $errors);
		        $this->_view->set('formData', $_POST);
		        return $this->_view->output();
		    }
		         
		    try {
		                 
		        $contact = new RegModel();
		        $contact->setusername($username);
		        $contact->setEmail($email);
		        $contact->setpassword($password);
		        $contact->store();
		                 
		        $this->_setView('succes');
		        $this->_view->set('title', 'Store success!');
		                 
		        $data = array(
		            'username' => $username,
		            'email' => $email,
		            'password' => $password
		        );
		                 
		        $this->_view->set('userData', $data);
		                 
		    } catch (Exception $e) {
		        $this->_setView('index');
		        $this->_view->set('title', 'There was an error saving the data!');
		        $this->_view->set('formData', $_POST);
		        $this->_view->set('saveError', $e->getpassword());
		    }
		 
		    return $this->_view->output();
		}





}