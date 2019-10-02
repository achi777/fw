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
        //$data['olt_swiths'] = $this->model->olt_swiths();
        //echo $this->model->seletcList();
        $data['title'] = "main page";
        $data['members'] = $this->model->seletcList();
        $this->load->view("main", $data);

    }
}