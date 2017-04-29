<?php

/**
 * User model stores information
 * about a particular user.
 */
class UserModel {
    private $firstName;
    private $lastName;
    private $email;
    private $hashedPassword;
    private $imagePath;
    
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
    
    public function getImagePath() {
        return $this->imagePath;
    }
    
    public function __construct($firstName, $lastName, $email, $hashedPassword, $imagePath) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->hashedPassword = $hashedPassword;
        $this->imagePath = $imagePath;
    }
}
