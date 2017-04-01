<?php
error_reporting(0);
if(isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {  $protocol = 'https://';  }else { $protocol = 'http://';  }

    $url = (isset($_GET['parameter'])) ? explode("/",str_replace('.php','',$_GET['parameter'])) : '';
define('PROTOCOL',$protocol);
define('DS',DIRECTORY_SEPARATOR);
define('DROOT',$_SERVER['DOCUMENT_ROOT']);
define('HOST',$_SERVER['HTTP_HOST']);
define('SELF',dirname($_SERVER['PHP_SELF']));
define('URL',$protocol.HOST.SELF.DS);
define('isumber','sumber'.DS);
define('html',isumber.'html'.DS);
define('imodul','modul'.DS);
define('ikontroller',imodul.'kontroller'.DS);
define('itampilan',imodul.'tampilan'.DS);
define('ipustaka','pustaka'.DS);
define('isetup','setup'.DS);
define('ientitas',ipustaka.'entitas'.DS);
define('iraceto',ipustaka.'raceto'.DS);
define('iantarrai',ipustaka.'antarrai'.DS);
define('crud',imodul.'crud'.DS);
define('sumber',URL.isumber);
define('halaman',($url != '') ? $url[0] : 'index');
define('parameter',($url) ? $url : '');
$ien = 'setup/index.php';
if(file_exists($ien)){ header("location:".URL."setup/"); die(); }
    require 'aturan.mu.php';

class gawan {
    static public function kontroller($name) {
        $berkas = ikontroller.$name.'.kontroller.php';
        if(file_exists($berkas)){
            include $berkas;
        }
    }
    static public function tampilan($name) {
        $berkas = itampilan.$name.'.tampilan.php';
        if(file_exists($berkas)){
            include $berkas;
        }
    }
    static public function pustaka($name){
        $berkas = ipustaka.$name.'.class.php';
        if(file_exists($berkas)){
            include $berkas;
        }
    }
    
    static public function entitas($name){
        $berkas = ientitas.$name.'.entitas.php';
        if(file_exists($berkas)){
            include $berkas;
        }
    }
    
    static public function setup($name){
        $berkas = isetup.$name.'.setup.php';
        if(file_exists($berkas)){
            include $berkas;
        }
    }
       
       static public function raceto($name){
        $berkas = iraceto.$name.'.raceto.php';
        if(file_exists($berkas)){
            include $berkas;
        }else{
             $berkas = iantarrai.$name.'.antarrai.php';
            if(file_exists($berkas)){
                include $berkas;
            }
        }
    }
       
}

spl_autoload_register('gawan::kontroller');

