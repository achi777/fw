<?php

class Controller extends init
{
    public $model;
    public $errors;

    public function __construct()
    {
        parent::__construct();
        /***LOAD MODEL***/
        $this->load->model("maindb");
        $this->model = new Model();
    }



    public function details(): void
    {
        $header_data['title'] = "AO Framework Project || Details";
        $data['copyright'] = "© Archil Odishelidze 2019";
        $data['details'] = $this->model->postByID($this->convert->to_int($this->helper->segment(2)));
        /******************************************/
        $this->load->template_start($header_data);
        /******************************************/
        $this->load->view("header");
        $this->load->view("details", $data);
        $this->load->view("footer", $data);
        /******************************************/
        $this->load->template_end();

    }
}