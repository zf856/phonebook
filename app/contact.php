<?php

include_once 'db.php';

class contact extends db{
    protected $tbl='contact_tbl';
    public function add_contact($data){
        $this->setTbl($this->tbl);
        $filds=array_keys($data);
       $this->insertData($filds,$data);
    }
}