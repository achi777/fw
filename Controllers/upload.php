<?php
class Controller extends init {
    public $model;
    public function __construct()
    {
        parent::__construct();
        $this->load->model("maindb");
        $this->model = new Model();
    }
    public function upload(){
        if($this->input->post("submit")){
            $this->file->upload_path("uploads/");
            $this->file->upload_ext("jpg");
            $this->file->upload_ext("png");
            $this->file->upload_ext("jepg");
            $this->file->upload_size(2);
            $this->file->upload_name("uploaded.jpg");
            echo $this->file->upload($this->input->file("file"));
        }
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
        $this->load->view("upload");
        $this->load->view("footer", $data);
        /******************************************/
        $this->load->template_end();
    }
}