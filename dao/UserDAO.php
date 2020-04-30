<?php
require("../modal/Database.php");

/**
 * Class UserDAO
 */
class UserDAO
{
    private PDO $db;

    /**
     * UserDAO constructor.
     */
    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

    public function __call($method, $arguments) {
        if($method == 'select') {
            if(count($arguments) == 1) {
                return call_user_func_array(array($this,'select'), $arguments);
            }
            else {
                return call_user_func_array(array($this,'selectAll'), $arguments);
            }
        }else if($method == 'insert') {
            return call_user_func_array(array($this,'insert'), $arguments);
        }else if($method == 'update') {
            return call_user_func_array(array($this,'update'), $arguments);
        }else if($method == 'delete') {
            return call_user_func_array(array($this,'delete'), $arguments);
        }
        return null;
    }

    /**
     * @param ModelUser $user
     * @return bool
     */
    public function insert(ModelUser $user){
        try {
            $prepare = $this->db->prepare("INSERT INTO `user`(`id`, `name`, `email`, `password`, `country`) VALUES(:id, :name, :email, :password, :country)");
            $prepare->bindValue(':id', $user->getId());
            $prepare->bindValue(':name', $user->getName());
            $prepare->bindValue(':email', $user->getEmail());
            $prepare->bindValue(':password', $user->getPassword());
            $prepare->bindValue(':country', $user->getCountry());
            return $prepare->execute();
        }catch(PDOException $e) {
            echo $e->getMessage();
        }
        return false;
    }

    /**
     * @param ModelUser $user
     * @return bool
     */
    public function update(ModelUser $user){
        try {
            $prepare = $this->db->prepare("UPDATE `user` SET `name` = :name, `email` = :email, `password` = :password, `country` = :country WHERE `id` = :id");
            $prepare->bindValue(':name', $user->getName());
            $prepare->bindValue(':email', $user->getEmail());
            $prepare->bindValue(':password', $user->getPassword());
            $prepare->bindValue(':country', $user->getCountry());
            $prepare->bindValue(':id', $user->getId());
            return $prepare->execute();
        }catch(PDOException $e) {
            echo $e->getMessage();
        }
        return false;
    }

    /**
     * @param ModelUser $user
     * @return bool
     */
    public function delete(ModelUser $user){
        try {
            $prepare = $this->db->prepare("DELETE FROM `user` WHERE `id` = :id");
            $prepare->bindValue(':id', $user->getId());
            return $prepare->execute();
        }catch(PDOException $e) {
            echo $e->getMessage();
        }
        return false;
    }

    /**
     * @param ModelUser $user
     * @return bool|mixed
     */
    public function select(ModelUser $user){
        try {
            $prepare = $this->db->prepare("SELECT * FROM `user` WHERE `id` = :id");
            $prepare->bindValue(':id', $user->getId());
            $prepare->execute();
            return $prepare->fetch(PDO::FETCH_ASSOC);
        }catch(PDOException $e) {
            echo $e->getMessage();
        }
        return false;
    }

    /**
     * @return bool|mixed
     */
    public function selectAll(){
        try {
            $prepare = $this->db->prepare("SELECT * FROM `user`");
            $prepare->execute();
            $users = array();
            while($user = $prepare->fetch(PDO::FETCH_ASSOC)){
                array_push($users, $user);
            }
            return $users;
        }catch(PDOException $e) {
            echo $e->getMessage();
        }
        return false;
    }
}