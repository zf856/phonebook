<?php


class db
{
    protected $pdo;
    private $db;
    private $user;
    private $pass;

    public function __construct($db='phonebook',$user='root',$pass='')
    {
        $this->db=$db;
        $this->user=$user;
        $this->pass=$pass;
        $this->connection();
    }

    public function connection(){
        try{
            $this->pdo= new PDO("mysql:host=localhost;dbname={$this->db}", $this->user, $this->pass);
        }
        catch (Exception $e){
            die($e->getMessage());
        }

    }
}

$obj=new db();