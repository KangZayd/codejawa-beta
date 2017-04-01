<?php 

class SQLiAdp {
    protected $kon;
    protected $konDB;
    public function __construct($server,$nm,$kt){
        $this->s = $server;
        $this->nm = $nm;
        $this->kt = $kt;
    }
    public function connect(){
      $this->kon = new mysqli($this->s,$this->nm,$this->kt);
    }
    public function connectDB($db){
      $this->konDB = new mysqli($this->s,$this->nm,$this->kt,$db);
    }
    public function createDB($db){
        $this->db = $db;
        $sql = 'CREATE DATABASE IF NOT EXISTS '.$db;
        $xx = $this->kon->query($sql);
        return $this->affectedRows();
    }
    public function createTB($tb,$txt){
        $this->tb = $tb;
        $sql = 'CREATE TABLE '.$tb.' ( '.$txt.' );';
        $xx = $this->konDB->query($sql);
        if(!$xx){ return $this->konDB->error; }else{ return true; }
    }
    public function affectedRows(){
        return $this->kon->affected_rows;
    }
}