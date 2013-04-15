<?php
include 'model.php';

class LoginModel extends Model
{
    public function getUserByName($username)
    {
        $sql = "SELECT
                    username
                FROM 
                    users
                WHERE 
                    username='$username'";
         
        $this->_setSql($sql);
        $userDetails = $this->getRow();
         
        if (empty($userDetails))
        {
            return false;
        }
         
        return $userDetails;
    }
    public function getPassword($password)
    {
        $sql = "SELECT
                    password
                FROM 
                    users
                WHERE 
                    password='$password'";
         
        $this->_setSql($sql);
        $userDetails = $this->getRow(array($password));
         
        if (empty($userDetails))
        {
            return false;
        }
         
        return $userDetails;
    }
    public function LogOff()
    {  
    session_start();  
    session_destroy();
    }
}

?>