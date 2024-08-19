<?php
require_once "databases.php";
class usersdb
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function create($nom, $prenom, $telephone, $email, $login, $password, $role)
    {
        $sql = "INSERT INTO users SET nom=?, prenom=?, telephone=?, email=?, login=?, password=?, role=? ";
        $datas = array($nom, $prenom, $telephone, $email, $login,$password,$role );
        $this->db->prepareReq($sql, $datas);
    }
    public function readAll()
    {
        $sql = "SELECT * FROM users ORDER BY id DESC";
        $req = $this->db->prepareReq($sql);
        $datas = $this->db->recover($req);
        return $datas;
    }
    public function readCompte($login,$password){
        $sql= 'select * from users where login= ? and password=?';
        $attributes= array($login, $password);
        $req=$this->db->prepareReq($sql,$attributes);
        $data= $this->db->recover($req,true);
        return $data;
    }
    public function update($id, $nom, $prenom,$telephone, $email, $login,$password,$role  )
    {
        $sql = "UPDATE users SET nom=?,prenom=?, telephone=?, email=?, login=?, password=?, WHERE id= ?";

        $datas = array($nom, $prenom,$telephone, $email, $login,$password,$role, $id);
        $this->db->prepareReq($sql, $datas);
    }
    public function delete($id)
    {
        $sql = 'DELETE FROM users WHERE id=?';

        $datas = array($id);
        $this->db->prepareReq($sql, $datas);
    }
    public function read($id)
    {
        $sql = "SELECT * FROM users WHERE id=?";
        $datas = array($id);
        $req = $this->db->prepareReq($sql, $datas);
        $data = $this->db->recover($req, true);
        return $data;
    }
}