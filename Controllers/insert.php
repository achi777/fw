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



    public function insert()
    {
        if($this->input->post("submit")){
            $lastID = $this->model->recordToBase($this->input->post("title"),$this->input->post("description"),$this->input->post("details"));
        }else{
            $lastID = "";
        }
        $data['lastInsertID'] = $lastID;
        $header_data['title'] = "AO Framework Project || Insert";
        $data['copyright'] = "© Archil Odishelidze 2019";
        /******************************************/
        $this->load->template_start($header_data);
        /******************************************/
        $this->load->view("header");
        $this->load->view("insert");
        $this->load->view("footer", $data);
        /******************************************/
        $this->load->template_end();

    }
}