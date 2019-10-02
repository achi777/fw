<?php
class easy{
    public static function out($var){
        if(is_array($var)){
            echo json_encode($var);
        }else{
            echo $var;
        }
    }
}