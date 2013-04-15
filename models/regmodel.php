<?php
 
class RegModel extends Model
{
    private $_username;
    private $_email;
    private $_password;
     
    public function setUsername($username)
    {
        $this->_username = $username;
    } 
    public function setEmail($email)
    {
        $this->_email = $email;
    }
     
    public function setpassword($password)
    {
        $this->_password = $password;
    }
     
    public function store()
    {
        $sql = "INSERT INTO users
                    (username, email, password)
                VALUES
                    ( ?, ?, ?)";
         
        $data = array(
            $this->_username,
            $this->_email,
            $this->_password
        );
         
        $sth = $this->_db->prepare($sql);
        return $sth->execute($data);
    }
}

