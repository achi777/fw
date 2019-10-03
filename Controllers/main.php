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



    public function main()
    {
        $header_data['title'] = "AO Framework Project";
        $data['copyright'] = "© Archil Odishelidze 2019";
        $data['posts'] = $this->model->posts();
        $data['randomPost'] = $this->model->randomPost();
        $data['postList'] = $this->model->postList();
        $data['pagination'] = $this->model->pagination();
        /******************************************/
        $this->load->template_start($header_data);
        /******************************************/
        $this->load->view("header");
        $this->load->view("main", $data);
        $this->load->view("footer", $data);
        /******************************************/
        $this->load->template_end();

    }
}