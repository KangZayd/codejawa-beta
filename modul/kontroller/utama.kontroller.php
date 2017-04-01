  <?php
abstract class utama{
    
    private $vview;
    protected function view($viewName){
        spl_autoload_register('gawan::tampilan'); 
        $vview = new mesinTampilan($viewName);
    }
    public function bind ($name, $value = ''){
        
            if(is_array($value)){
                
                    foreach($value as $k => $val){
                        $this->{$name}[$k] = $val;
                    }
                
            }else{
                $this->{$name} = $value;
            } 
        
    } 
    
    protected function template($viewName,$data=array()){
        $view = $this->view($viewName);
        
    }
  
}