<?php
session_start();
class suksessor extends SqliAdp {
    
    public function DBsukses(){
        
        $_SESSION['db'] = $this->db;
        $_SESSION['server'] = $this->s;
        $_SESSION['nmp'] = $this->nm;
        $_SESSION['katasandi'] = $this->kt;
    }
    
    public function TBsukses($fd0,$fd1){
        $_SESSION['fd0'] = $fd0;
        $_SESSION['fd1'] = $fd1;
        $_SESSION['tabel'] = $this->tb;
    }
    
    public function conDB(){

        $this->connectDB($_SESSION['db']);
    }
}
