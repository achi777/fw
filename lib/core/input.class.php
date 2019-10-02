<?php
class input{
    public function get($name){
        if(isset($_GET[$name])){
            return $_GET[$name];
        }
    }
    public function post($name){
        if(isset($_POST[$name])){
            return $_POST[$name];
        }
    }
    public function get_post($name){
        if(isset($_POST[$name])){
            return $_POST[$name];
        }
        if(isset($_GET[$name])){
            return $_GET[$name];
        }
    }
    public function file($name){
        if(isset($_FILES[$name])){
            return $_FILES[$name];
        }
    }
}