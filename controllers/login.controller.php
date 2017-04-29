<?php

/**
 * Login controller
 */
class LoginController extends Controller {
    
    public function __construct($data = array()) {
        parent::__construct($data);
        $this->service = ServiceFactory::makeService('UserService');
    }
    
    public function index() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['log-form-email'];
            $password = $_POST['log-form-password'];
            
            if(!$this->validateInput($email, $password)) {
                Session::set('loginError', 'Please provide valid entries for all fields');
                App::getRouter()->redirect("/login");
            }
            else {
                $result = $this->service->login($email, $password);
                
                if(!$result) {
                    App::getRouter()->redirect('/login'); // Redirect to the login page
                }
                else {
                    App::getRouter()->redirect('/'); // TODO(m-peko): Redirect to the next page
                    Session::delete('loginError');
                }
            }
        }
    }
    
    private function validateInput($email, $password) {
        if(empty($email) || empty($password) || 
           !filter_var($email, FILTER_VALIDATE_EMAIL) !== false) {
            return false;
        }
        return true;
    }
}
