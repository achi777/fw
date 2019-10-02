<?php
require engine."lib/core/easy.class.php";
require engine."lib/core/helper.class.php";
require engine."lib/core/input.class.php";
require engine."lib/core/load.class.php";
require engine."lib/core/file.class.php";
require engine."lib/core/orm.class.php";
require engine."lib/core/convert.class.php";
require engine."lib/core/send.class.php";

abstract class init{
    public $easy;
    public $helper;
    public $input;
    public $file;
    public $db;
    public $load;
    public $convert;
    public $send;
    public function __construct()
    {
        $this->helper = new easy();
        $this->helper = new helper();
        $this->input = new input();
        $this->file = new file();
        $this->load = new load();
        $this->db = new orm();
        $this->convert = new convert();
        $this->send = new send();
    }
}