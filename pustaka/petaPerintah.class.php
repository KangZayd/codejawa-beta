<?php
 spl_autoload_register("gawan::raceto");
class petaPerintah extends perintah implements stdSQL, perintahAnt {
        protected $adapter;
        public $kondisi;
        protected $bindKondisi = array(), $bd = array(), $ff, $vv, $error;
        public function __construct(){
            $this->adapter =  new sqliAdapter();
        }
        
        public function gaeKondisi($isi){
            $this->kondisi .= (empty($this->kondisi)) ? 'WHERE ' : ' ';
            try{
                if(($this->kondisi != 'WHERE ' AND (!empty($isi['bool']))) OR ($this->kondisi == 'WHERE ' AND (empty($isi['bool'])))){
                $this->kondisi .= (!empty($isi['bool'])) ? " $isi[bool] " : "";
                    foreach($isi as $k => $v){
                    $this->kondisi .= ($k != 'bool') ? " $k = ? " : "";
                    if($k != 'bool'){  array_push($this->bindKondisi,$v); }
                    }
                }else{ throw new Exception('Nganggo o operator misal AND opo OR nek kondisimu luih soko siji ');  }
            }catch(Exception $e){ print $e->getMessage();  die(); }
        }
        public function kondisiTambahan($code){
            $this->kondisi .= " $code ";
        }
    
        public function initLD($data = array()){
            foreach($data as $k => $xx){
                $this->ff .= $k.',';
                $this->vv .= '?,';
            }
            $this->ff = substr($this->ff,0,(strlen($this->ff) - 1));
            $this->vv = substr($this->vv,0,(strlen($this->vv) - 1));
        }
        
        private function initGD($data = array()){
            foreach($data as $k => $xx){
                $this->ff .= $k.'=?,';
            }
            $this->ff = substr($this->ff,0,(strlen($this->ff) - 1));
        }  
    
        public function jikukData(){
            $xx =  $this->adapter->SQLjikuk(static::$en,static::$sl,$this->kondisi,$this->bindKondisi);
            $this->kondisi = ''; 
            $this->bindKondisi = array(); 
            return $xx;
            
        }
        public function error(){
            return $this->error;
        }
        public function simpenData(){
            $b = array(); $bd = $this->data();
            foreach($bd as $cv => $xx){ $b[] = $xx; }
            
            self::initLD($bd);
            $xx = $this->adapter->SQLsimpen(static::$en,$this->ff,$this->vv,$b);
            if(empty($xx)){ return true; }else{ $this->error = $xx; return false;  }
        }
        public function balik(){
            $xx = $_SERVER['REQUEST_URI'];
                $xxi = explode("?",$xx);
            return $xxi[0];
        }
        public function gentiData(){
            $b = array(); $bd = $this->data();
            foreach($bd as $cv => $xx){ $b[] = $xx; }
            self::initGD($bd);
                $bind = array_merge($b,$this->bindKondisi);
            $xx = $this->adapter->SQLgenti(static::$en,$this->ff,$this->kondisi,$bind);
            $this->kondisi = ''; 
            $this->bindKondisi = array(); 
            if(empty($xx)){ return true; }else{ $this->error = $xx; return false;  }
        }
    
        public function ilangiData(){
            $xx =  $this->adapter->SQLngilangi(static::$en,$this->kondisi,$this->bindKondisi);
            $this->kondisi = ''; 
            $this->bindKondisi = array(); 
            if(empty($xx)){ return true; }else{ $this->error = $xx; return false;  }
        }
    
        public function gaeLarik($x){
            if(is_object($x)){ 
                return $row = mysqli_fetch_array($x); }
            else{ print $x; die(); }
        }
    
        public function cacaheBaris($x){
            if(is_object($x)){ 
                return $row = mysqli_num_rows($x); }
            else{ print $x; die(); }
        }
    
        public function gaeObjek($x){
            if(is_object($x)){ 
                return $row = mysqli_fetch_object($x); }
            else{ print $x; die(); }
        }
}
/*
    $d = new sqliAdapter();
    $peta = new petaPerintah($d);
    $peta->gaeKondisi(array('id'=>'11','bool'=>''));
    $pp = $peta->jikukData();
        while($d = mysqli_fetch_array($pp)){
            print $d['nama'];
        }
        */