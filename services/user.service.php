<?php

/**
 * UserService class is responsible
 * for all database interactions that
 * consider UserModel class.
 * This approach is called Data
 * Mapper pattern.
 */
class UserService extends Service {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function register($firstName, $lastName, $email, $password) {
        $firstName = $this->database->escape($firstName);
        $lastName = $this->database->escape($lastName);
        $email = $this->database->escape($email);
        $hashedPassword = $this->hashPassword($this->database->escape($password));
        
        $user = ModelFactory::makeModel('UserModel', array($firstName, $lastName, $email, $hashedPassword, ''));

        if(!$this->checkIfEmailExists($email)) {
            if(!$this->createNewUser($user)) {
                Session::set('registrationError', '');
                return true;
            }
            else {
                Session::set('registrationError', 'Registration failed');
                return false;
            }
        }
        else {
            Session::set('registrationError', 'User with this email already exists');
            return false;
        }
    }
    
    public function login($email, $password) {
        $email = $this->database->escape($email);
        $hashedPassword = $this->hashPassword($this->database->escape($password));

        if(!$this->checkIfUserExists($email, $hashedPassword)) {
            Session::set('loginError', '');
            return true;
        }
        else {
            Session::set('loginError', 'User with these credentials does not exist');
            return false;
        }
    }
    
    private function hashPassword($password) {
        return password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);
    }
    
    private function createNewUser($user) {
        $sql = 'INSERT INTO users(firstName, lastName, email, hashedPassword) VALUES(?,?,?,?)';
        $parameters = array($user->getFirstName(), $user->getLastName(),
                            $user->getEmail(), $user->getHashedPassword());
        return $this->database->queryWithParameters($sql, $parameters);
    }
    
    private function checkIfUserExists($email, $hashedPassword) {
        $sql = 'SELECT COUNT(1) AS user FROM users WHERE email=? AND hashedPassword=?';
        $parameters = array($email, $hashedPassword);
        return $this->database->queryWithParameters($sql, $parameters)['user'] == 1;
    }
    
    private function checkIfEmailExists($email) {
        $sql = 'SELECT COUNT(1) AS email FROM users WHERE email=?';
        $parameters = array($email);
        return $this->database->queryWithParameters($sql, $parameters)['email'] == 1;
    }
}
