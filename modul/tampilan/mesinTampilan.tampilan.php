<?php 
class mesinTampilan extends utama{
    public $data = array();
    public $viewName = NULL;
    public $isRender = FALSE;
    public function __construct($view){
        $this->viewName = $view;
    }
    public function kirim($akses, $data){
      self::bind($akses,$data);
    }
    public function forceRender(){
        $this->isRender = TRUE;
        extract($this->data);
        $crud = crud.$this->viewName.'.crud.php';
        $view = html.$this->viewName.'.tampilan.php';
        if(file_exists($crud)){  spl_autoload_register('gawan::entitas');
                        require_once $crud;
        }else{ require_once html.'crud404.tampilan.php'; }
            if(file_exists($view)){ 
                include $view;
            }else{ print $view; require_once html.'404.tampilan.php'; }
                              
    }
    
    
    public function __destruct(){
        if(!$this->isRender) self::forceRender();
    }
}