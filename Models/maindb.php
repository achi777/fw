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
    public function selectJoin():string {
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
    public function randomPost():string {
        $this->db->select("*");
        $this->db->from("posts");
        $this->db->order("RAND()");
        $this->db->limit(1);
        $result = $this->db->exec("get");
        return $result;
    }

    public function posts():string {
        $this->db->select("*");
        $this->db->from("posts");
        $result = $this->db->exec("get");
        return $result;
    }

    public function postByID(int $id):string {
        $this->db->select("*");
        $this->db->from("posts");
        $this->db->where("id", $id);
        $result = $this->db->exec("get");
        return $result;
    }

    public function postList():string{
        /**Select with pagination**/
        $this->db->select("*");
        $this->db->from("posts");
        $this->db->limit($this->db->paginationLimit(2, 6));
        $result = $this->db->exec("get");
        return $result;
    }
    public function pagination():string{
        /**pagination**/
        $result = $this->db->pagination(2, 6);
        return $result;
    }
    public function recordToBase(string $title, string $description, string $details):int {
        /*Insert*/
        $this->db->table("posts");
        $this->db->columns("title", "description", "details");
        $this->db->values($title,$description,$details);
        return $this->db->exec("INSERT");
    }
    public function updateToBase(int $id, string $title, string $description, string $details) {
        /*Update*/
        $this->db->table("information");
        $this->db->columns("title", "description", "details");
        $this->db->values($title,$description,$details);
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