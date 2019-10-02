<?php

class convert
{
    public function to_double($var)
    {
        return (double)$var;
    }

    public function to_str($var)
    {
        return (string)$var;
    }

    public function to_int($var)
    {
        return intval($var);
    }

    public function to_float($var)
    {
        return floatval($var);
    }

    public function to_char($var)
    {
        return chr($var);
    }

    public function to_currency($var)
    {
        return money_format('$%i', $var);
    }

    public function to_object($var)
    {
        return (object)$var;
    }

    public function format_bytes($bytes)
    {
        if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024, 2) . ' kB';
        } elseif ($bytes > 1) {
            $bytes = $bytes . ' bytes';
        } elseif ($bytes == 1) {
            $bytes = $bytes . ' byte';
        } else {
            $bytes = '0 bytes';
        }
        return $bytes;
    }

    public function to_json($array){
        return json_encode($array);
    }

    public function un_json($json){
        return json_decode($json);
    }

    public function is_json($string,$return_data = false) {
        $data = json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE) ? ($return_data ? $data : TRUE) : FALSE;
    }

    public static function array2json(array $arr)
    {
        $parts = array();
        $is_list = false;
        if (count($arr) > 0) {
            //Find out if the given array is a numerical array
            $keys = array_keys($arr);
            $max_length = count($arr) - 1;
            if ($keys[0] === 0 and $keys[$max_length] === $max_length) {
                //See if the first key is 0 and last key is length - 1
                $is_list = true;
                for ($i = 0; $i < count($keys); $i++) {
                    //See if each key correspondes to its position
                    if ($i !== $keys[$i]) {
                        //A key fails at position check.
                        $is_list = false;
                        //It is an associative array.
                        break;
                    }
                }
            }
            foreach ($arr as $key => $value) {
                $str = !$is_list ? '"' . $key . '":' : '';
                if (is_array($value)) {
                    //Custom handling for arrays
                    $parts[] = $str . array2json($value);
                } else {
                    //Custom handling for multiple data types
                    if (is_numeric($value) && !is_string($value)) {
                        $str .= $value;
                        //Numbers
                    } elseif (is_bool($value)) {
                        $str .= $value ? 'true' : 'false';
                    } elseif ($value === null) {
                        $str .= 'null';
                    } else {
                        $str .= '"' . addslashes($value) . '"';
                        //All other things
                    }
                    $parts[] = $str;
                }
            }
        }
        $json = implode(',', $parts);
        if ($is_list) {
            return '[' . $json . ']';
        }
        //Return numerical JSON
        return '{' . $json . '}';
        //Return associative JSON
    }
}