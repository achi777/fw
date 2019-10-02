<?php
class router extends init {
    private $controllerName;
    private $action;
    public function __construct() {
        parent::__construct();
        $this->action = $this->helper->segment(1);
        if (empty($this->action)) {
            $this->controllerName = "main";
        } else {
            $this->controllerName = $this->action;
        }
    }
    public function createController() {
        if (file_exists("Controllers/".$this->controllerName.".php")) {
            include("Controllers/".$this->controllerName.".php");
            /************************/
            $controller = new Controller();
            if (isset($this->controllerName)) $controller->{$this->controllerName}();
            /**********************/
        } else {
            require("Views/error.php");
        }
    }
}