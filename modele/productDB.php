<?php
require_once "databases.php";
class productDB
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function create($nom, $price, $quantity, $image, $categoryId)
    {
        $sql = "INSERT INTO product SET nom=?, price=?, quantity=?, image=?, categoryId=? ";
        $datas = array($nom, $price, $quantity, $image, $categoryId);
        $this->db->prepareReq($sql, $datas);
    }
    public function readAll()
    {
        $sql = "SELECT * FROM product ORDER BY id DESC";
        $req = $this->db->prepareReq($sql);
        $datas = $this->db->recover($req);
        return $datas;
    }
    public function update($id, $nom, $price, $quantity, $image, $categoryId)
    {
        $sql = "UPDATE product SET nom=?, price=?, quantity=?, image=?, categoryId=?  WHERE id= ?";

        $datas = array($nom, $price, $quantity, $image, $categoryId, $id);
        $this->db->prepareReq($sql, $datas);
    }
    public function delete($id)
    {
        $sql = 'DELETE FROM product WHERE id=?';

        $datas = array($id);
        $this->db->prepareReq($sql, $datas);
    }
    public function read($id)
    {
        $sql = "SELECT * FROM product WHERE id=?";
        $datas = array($id);
        $req = $this->db->prepareReq($sql, $datas);
        $data = $this->db->recover($req, true);
        return $data;
    }
}
