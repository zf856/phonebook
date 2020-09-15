<?php

class db
{
    protected $pdo;
    private $db;
    private $user;
    private $pass;
    private $tbl;

    public function __construct($db='phonebook',$user='root',$pass='')
    {
        $this->db=$db;
        $this->user=$user;
        $this->pass=$pass;
        $this->connection();
    }

    public function connection(){
        try{
            $this->pdo = new PDO("mysql:host=localhost;dbname={$this->db}", $this->user, $this->pass);
        }
        catch(Exception $e){
            die($e->getMessage());
        }

    }
    public function setTbl($tbl)
    {
        $this->tbl = $tbl;
    }
    public function selectData($data){
        if(is_array($data)){
            $data="'" .implode("'", $data)."'" ;

        }
    }
    public function insertData($data){
        if(is_array($data)){
            $data="'" .implode("'", $data)."'" ;
            $sql="INSERT INTO user_tbl (name,lastname) VALUES ('$data[name]','$data[lastname]')";

        }
    }
}






$obj=new db();
$obj->setTbl('user_tbl');
$obj->insert("name");