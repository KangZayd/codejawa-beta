<?php
spl_autoload_register("gawan::pustaka");
class generatorEntitas extends petaPerintah{
    protected static $en;
    protected static $fd;
    protected static $sl;
    public function __construct(){
        $this->Generator(static::$fd);
        parent::__construct();
     return new petaPerintah(new sqliAdapter());   
    }
    public function Generator(array $bd){
        foreach($bd as $k => $v){
            $this->$v = '';
            static::$sl .= $v.',';
        }
        static::$sl = substr(static::$sl,0,(strlen(static::$sl)-1));
    }
/*
    public function gaeField(array $bind){
        foreach($bind as $key => $value){
            $this->{$key} = $value;
        }
    }
    public function gaeVariabel($prm){
        return $this->{$prm};
    }
*/
    public function data(){
        $data=array();
        foreach(static::$fd as $k => $value){
            $vv = $this->{$value};
            if(!empty($vv)){
                $data[$value] = (($this->{$value} == NULL) ? '' : $this->{$value}) ;
            }
        }
        return $data;
    }
}