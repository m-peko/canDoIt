<?php

/**
 * Registration controller
 */
class RegistrationController extends Controller {
    
    public function __construct($data = array()) {
        parent::__construct($data);
        $this->service = ServiceFactory::makeService('UserService');
    }
    
    public function index() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $firstName = $_POST['reg-form-first-name'];
            $lastName = $_POST['reg-form-last-name'];
            $email = $_POST['reg-form-email'];
            $password = $_POST['reg-form-password'];
            $confirmPassword = $_POST['reg-form-confirm-password'];
            
            if(!$this->validateInput($firstName, $lastName, $email, $password, $confirmPassword)) {
                Session::set('registrationError', 'Please provide valid entries for all fields');
                App::getRouter()->redirect("/");
            }
            else {
                $result = $this->service->register($firstName, $lastName, $email, $password);
                
                if(!$result) {
                    App::getRouter()->redirect('/'); // Redirect to the home (registration) page
                }
                else {
                    App::getRouter()->redirect('/'); // TODO(m-peko): Redirect to the next page
                    Session::set('userId', $this->service->getUserId($email, $password));
                    Session::delete('registrationError');
                    Session::delete('loginError');
                }
            }
        }
    }
    
    private function validateInput($firstName, $lastName, $email, $password, $confirmPassword) {
        if(empty($firstName) || empty($lastName) || empty($email) ||
           empty($password) || empty($confirmPassword) || 
           !filter_var($email, FILTER_VALIDATE_EMAIL) !== false || 
           $password !== $confirmPassword) {
            return false;
        }
        return true;
    }
}
