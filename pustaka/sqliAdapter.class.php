<?php
spl_autoload_register('gawan::raceto');
class sqliAdapter extends db implements dbAnt {
   
    protected $sambungan;
    private $state;
    public function __construct(){
        $this->sambungkeDB();
    }
    
    public function sambungkeDB(){
        mysqli_report(MYSQLI_REPORT_STRICT);
        try{
            $this->sambungke();
        }catch(Exception $e){
           print $e->getMessage();
            die();
        }
    }
    
    public function sambungke(){
        if(!$this->sambungan = new mysqli(batur,jeneng,telikSandi,adahData)){
                throw new Exception($this->sambungan->connect_error);
        }
    }
    
    public function pedotke(){
        $this->sambungan = null;
    }
    
    public function jikukState(){
        if($this->state === null){
            throw new exception('Query mu rung siap');
        }else{
            return $this->state;
        }     
    }
    
    public function siapkeSQL($s,$bd){
        try{
            $this->state = $this->sambungan->prepare($s);
            if( $this->state){
                $qtp = ''; $qpr = array();
                if(!empty($bd)){
                    foreach($bd as $b => $x){ $qtp .= 's';  } $qpr = array($qtp);
                    foreach($bd as $b => $x){ $qpr[$b+1] = &$bd[$b]; }
                   call_user_func_array(array($this->state,'bind_param'),$qpr);
                } return $this;
             }else{
                throw new Exception( $this->sambungan->error);
            }
        }catch(Exception $e){
            return $e->getMessage();
            exit;
        }
    }
    
    public function lakokneSQL(){
        $xx = $this->jikukState();
        if(!$xx->execute()){
            return $xx->error;
        }else{ 
             return $xx->get_result();
        }
    }
    private function dataSingBerubah(){
        $xx = $this->jikukState();
        return $xx->affected_rows;
    }
    public function SQLjikuk($tb,$sl,$wh,$bd = array()){
       $s = 'SELECT '.$sl.' FROM '.$tb.' '.$wh;
        $xx = $this->siapkeSQL($s,$bd);
         if(is_object($xx)){
             return $xx->lakokneSQL(); }
        else{
            return $xx  ; }
        
    }
    
    public function SQLsimpen($tt,$ff,$vv,$bd){
         
        $ii = 'INSERT  INTO '.$tt.' ('.$ff.') VALUES ('.$vv.')';
         $xx = $this->siapkeSQL($ii,$bd);
         if(is_object($xx)){
             return $xx->lakokneSQL(); }
        else{
            return $xx  ; }
    }
    
    public function SQLgenti($en,$ff,$ww,$bind){
        $uu = 'UPDATE '.$en.' SET '.$ff.' '.$ww;
        $xx = $this->siapkeSQL($uu,$bind);
    if(is_object($xx)){
        $xx->lakokneSQL();
         if(self::dataSingBerubah() > 0){
             return; }
        else{
            return 'Ora enek data sing berubah'; }
    }else{
        return $xx;
    }
    }
    
    public function SQLngilangi($tb,$w,$bind){
        $dd = 'DELETE FROM '.$tb.' '.$w;
        $xx = $this->siapkeSQL($dd,$bind);
        if(is_object($xx)){
            $xx->lakokneSQL();
            if(self::dataSingBerubah() > 0){
             return; }
            else{
                return 'Ora enek data sing berubah'; }
        }else{
            return $xx;
        }
    }
}
