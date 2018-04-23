<?php
require_once('dao/BaseDAO.php');
require_once('model/User.php');

class UserDAO extends BaseDAO
{
    public function connect($pseudo)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM user WHERE pseudo = ?');
        $req->execute(array($pseudo));
        $user = $req->fetch();

        return new User($user['id'], $user['pseudo'], $user['password'], $user['email']);
    }
}