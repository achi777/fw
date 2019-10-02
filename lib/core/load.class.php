<?php
class load
{
    public function file($filename)
    {
        include($filename . ".php");
    }
    public function model($filename)
    {
        if(file_exists(engine."Models/" . $filename . ".php")){
            require engine."Models/" . $filename . ".php";
        }else{
            echo "<pre>This Model not exist</pre>";
        }

    }
    public function is_json($string,$return_data = false) {
        $data = json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE) ? ($return_data ? $data : TRUE) : FALSE;
    }

    public function view($filename, $data = "")
    {
        if (!empty($data)) {
            foreach ($data as $key => $value) {
                if($this->is_json($value)){
                    ${"$key"} = json_decode($value);
                }else{
                    ${"$key"} = $value;
                }

            }
        }
        if(file_exists(engine."Views/" . $filename . ".php")){
            $contents = file_get_contents(engine."Views/" . $filename . ".php", true);
            $contents=str_replace('{{','<?php easy::out(',$contents);
            $contents=str_replace('}}','); ?>',$contents);
            $contents=str_replace('<@','<?php ',$contents);
            $contents=str_replace('@>',' ?>',$contents);
            $contents='?>'.trim($contents).'<?';
            eval($contents);
        }else{
            echo "<pre>This View not exist</pre>";
        }

    }
    public function controller($filename)
    {
        if(file_exists(engine."Controllers/" . $filename . ".php")){
            require engine."Controllers/" . $filename . ".php";
        }else{
            echo "<pre>This Controller not exist</pre>";
        }

    }
}