<?php

/**
 * User model stores information
 * about a particular user.
 */
class UserModel {
    private $userID;
    private $firstName;
    private $lastName;
    private $email;
    private $hashedPassword;
    
    public function getUserID() {
        return $this->userID;
    }
    
    public function getFirstName() {
        return $this->firstName;
    }
    
    public function getLastName() {
        return $this->lastName;
    }
    
    public function getEmail() {
        return $this->email;
    }
    
    public function getHashedPassword() {
        return $this->hashedPassword;
    }
    
    public function __construct($userID, $firstName, $lastName, $email, $hashedPassword) {
        $this->userID = $userID;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->hashedPassword = $hashedPassword;
    }
}
