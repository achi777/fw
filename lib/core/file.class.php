<?php
class file{
    public $path;
    public $ext;
    public $upload_size;
    public $upload_name;
    public function upload_path($path){
        $this->path = $path;
    }
    public function upload_ext($ext){
        $this->ext[] = $ext;
    }
    public function upload_size($size){
        $this->upload_size = $size * 1024 * 1024;
    }
    public function upload_name($upload_name){
        $this->upload_name = $upload_name;
    }
    public function upload($file){
        $errors= array();
        $file_name = $file['name'];
        $file_size = $file['size'];
        $file_tmp = $file['tmp_name'];
        $file_type = $file['type'];
        $tmp = strtolower($file['name']);
        $tmp = explode('.',$tmp);
        $file_ext = end($tmp);
        $expensions = $this->ext;
        if(in_array($file_ext,$expensions)=== false){
            $errors[]="extension not allowed.";
        }
        if($file_size > $this->upload_size){
            $errors[]='File size must be excately '.$this->upload_size;
        }
        if(empty($errors)==true){
            move_uploaded_file($file_tmp,$this->path.$this->upload_name);
            $result = $this->path.$this->upload_name;
        }else{
            $result = $errors;
        }
        return $result;
    }
    public function load_file($url){
        $source = file_get_contents($url);
        return $source;
    }
    public function exist($file){
        if(file_exists($file) == false){
            return false;
        }else{
            return true;
        }
    }
}