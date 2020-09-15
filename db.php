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
    public function selectData($name){
        if(is_array($name)){
            $names="'" .implode("','", $name)."'" ;
            //var_dump($names);die;
        }
        $stm=$this->pdo->prepare("select {$names} FROM {$this->tbl}");
        $stm->execute();
        $row=$stm->fetchAll(PDO::FETCH_OBJ);
        var_dump($row);
    }
    public function insertData($filds,$data){
        if(is_array($data)){
            $names="'" .implode("','", $data)."'" ;
            $filds=implode(",", $filds);
            $sql=$this->pdo->prepare("insert into {$this->tbl} ($filds) VALUES ($names)");
            $sql->execute();
        }
    }
    public function editData($filds,$data,$id){
        foreach ($filds as $key=>$val){
            $txt[]=$val."='".$data[$key]."'";
        }
        $query=implode(",",$txt);
        $sql=$this->pdo->prepare("update {$this->tbl} set ".$query."where id ='$id'");
        $sql->execute();
    }

}
$obj=new db();
$obj->setTbl('user_tbl');
//$obj->selectData(['name','lastname']);
//$obj->insertData(['name','lastname','email'],['aaaa','bbbbbbb','ass@a.com']);
$obj->editData(['name','lastname','email','password'],['aaaa','bbbbbbb','assssasda@a.com','123456'],25);







