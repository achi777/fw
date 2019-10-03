<?php
class Model extends init
{
    public $out;
    public $id;
    public function __construct()
    {
        parent::__construct();
        $this->id = $this->helper->segment(1);
    }
    public function selectJoin(){
        /**Select**/
        $this->db->select("*");
        $this->db->from("information");
        //$this->db->join("cat","cat.cat_id=information.cat_id");
        //$this->db->join("cat","cat.cat_id=information.cat_id","left");
        $this->db->join_table("cat");
        $this->db->join_where("cat.cat_id","information.cat_id");
        $this->db->join_method("inner");
        $this->db->where("information.id","21");
        $this->db->or_where("information.id","22");
        $result = $this->db->exec("get");
        return $result;
    }
    public function randomPost(){
        $this->db->select("*");
        $this->db->from("posts");
        $this->db->order("RAND()");
        $this->db->limit(1);
        $result = $this->db->exec("get");
        return $result;
    }

    public function posts(){
        $this->db->select("*");
        $this->db->from("posts");
        $result = $this->db->exec("get");
        return $result;
    }

    public function pageList(){
        /**Select with pagination**/
        $this->db->select("*");
        $this->db->from("information");
        $this->db->limit($this->db->paginationLimit(2, 3));
        $result = $this->db->exec("get");
        return $result;
    }
    public function pagination(){
        /**pagination**/
        $result = $this->db->pagination(2, 3);
        return $result;
    }
    public function recordToBase($name_geo,$name_eng){
        /*Insert*/
        $this->db->table("information");
        $this->db->columns("name_geo", "name_eng");
        $this->db->values($name_geo, $name_eng);
        $this->db->exec("INSERT");
    }
    public function updateToBase($id,$name_geo,$name_eng){
        /*Update*/
        $this->db->table("information");
        $this->db->columns("name_geo", "name_eng");
        $this->db->values($name_geo, $name_eng);
        $this->db->where("id",$id);
        $this->db->exec("UPDATE");
    }
    public function deleteFromBase($id){
        /*Delete*/
        $this->db->table("information");
        $this->db->where("id",$id);
        $this->db->exec("DELETE");
    }
}