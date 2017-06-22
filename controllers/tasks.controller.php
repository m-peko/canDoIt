<?php

/**
 * Tasks controller
 */
class TasksController extends Controller {
    
    public function __construct($data = array()) {
        parent::__construct($data);
        $this->service = ServiceFactory::makeService('UserService');
    }
    
    public function index() {
        // get tasks from database and store them to controller's data
    }
    
    public function newTask() {
        
    }
    
    public function logout() {
        Session::destroy();
        App::getRouter()->redirect('/main');
    }
}
