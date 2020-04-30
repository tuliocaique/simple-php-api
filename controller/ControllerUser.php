<?php
require ("../modal/ModelUser.php");
require ("../dao/UserDAO.php");

class ControllerUser
{
    private ModelUser $user;
    private UserDAO $userDAO;

    /**
     * ControllerUser constructor.
     */
    public function __construct() {
        $this->user = new ModelUser();
        $this->userDAO = new UserDAO();
    }

    /**
     * @param $apiContent
     * @return bool
     */
    public function insertUser($apiContent) {
        $this->user->setName($apiContent['name']);
        $this->user->setEmail($apiContent['email']);
        $this->user ->setPassword($apiContent['password']);
        $this->user ->setCountry($apiContent['country']);

        if($this->userDAO->insert($this->user)) {
            return true;
        }else{
            return false;
        }
    }

    /**
     * @param $apiContent
     * @return bool
     */
    public function updateUser($apiContent) {
        $this->user->setId($apiContent['id']);
        $this->user->setName($apiContent['name']);
        $this->user->setEmail($apiContent['email']);
        $this->user ->setPassword($apiContent['password']);
        $this->user ->setCountry($apiContent['country']);

        if($this->userDAO->update($this->user)) {
            return true;
        }else{
            return false;
        }
    }

    /**
     * @param $apiContent
     * @return bool
     */
    public function deleteUser($apiContent) {
        $this->user->setId($apiContent['id']);

        if($this->userDAO->delete($this->user)) {
            return true;
        }else{
            return false;
        }
    }

    /**
     * @param $apiContent
     * @return bool|mixed
     */
    public function selectUser($apiContent) {
        $this->user->setId($apiContent['id']);
        return $this->userDAO->select($this->user);
    }

    /**
     * @return bool|mixed
     */
    public function selectUsers() {
        return $this->userDAO->selectAll();
    }
}