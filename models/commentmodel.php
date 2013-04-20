<?php
 
class CommentModel extends Model
{
    private $_username;
    private $_comment;
    private $_movieid;
    private $_commentid;
     
    public function setUsername($username)
    {
        $this->_username = $username;
    }
    public function setComment($comment)
    {
        $this->_comment = $comment;
    }
    public function setCommentId($commentid)
    {
        $this->_commentid = $commentid;
    }
    public function setMovieId($movieid)
    {
        $this->_movieid = $movieid;
    }     
    public function store()
    {
        $sql = "INSERT INTO comments
                    (comment_user, comment_data)
                VALUES
                    ( ?, ?)";
         
        $data = array(
            $this->_username,
            $this->_comment
        );
         
        $sth = $this->_db->prepare($sql);
        return $sth->execute($data);
    }
    public function getCommentID($username,$comment)
    {
        $sql = "SELECT
                    comment_id
                FROM
                    comments
                WHERE
                    comment_user='$username' && comment_data='$comment'";
        $this->_setSql($sql);
        $actors = $this->getAll();

        if(empty($actors))
        {
            return false;
        }
        return $actors;
    }
    public function storemovcom()
    {
        $sql = "INSERT INTO movcom
                    (movie_id, comment_id)
                VALUES
                    ( ?, ?)";
         
        $data = array(
            $this->_movieid,
            $this->_commentid
        );
         
        $sth = $this->_db->prepare($sql);
        return $sth->execute($data);
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
                    comments_id = $commentId";
        $this->_setSql($sql);
        $comment = $this->getAll();

        if(empty($comment))
        {
            return false;
        }
        return $comment;        
    }
}

