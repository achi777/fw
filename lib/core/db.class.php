<?php
class db{
    public $db_mysql;
    public $mysql;
    public $mysql_ststus;
    public $mysqlOptions;


    public function __construct()
    {
        //mysql
        $this->mysql = "mysql:host=".myHost.";dbname=".myDB;
        /*options*/
        $this->mysqlOptions = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

    }

    public function db_connect($db){
        try{
            $this->db_mysql = new PDO($this->mysql,myUser,dbPass, $this->mysqlOptions);
            $this->mysql_ststus = "mysql connected";
        }catch(PDOExeption $e){
            $this->mysql_ststus = $e->getMessage();
            exit();
        }
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        /*
        $this->db_mysql->commit();
        $this->DB_BCCDB->commit();

        $this->DB_BCCDB = null;
        $this->db_mysql = null;
        */
    }

}