<?php
  
if(isset($_POST['tabel'])){
  session_start();
     include '../aturan/aturan.gawan.php';
    spl_autoload_register('gawan::setup');
    $fd = $_POST['field'];
    $type = $_POST['typeData'];
    $len = $_POST['len'];
    $tb = trim(addslashes($_POST['tabel']));
if((empty($tb)) AND (empty($fd)) AND (empty($type)) AND (empty($len))){
    print'Tidak boleh ada data yang kosong'; die();
}else{
    
$txt = '';
foreach($fd as $k => $v){
    $txt .= ' '.$v.' '.trim(addslashes($type[$k])).' ';
    if($type[$k] != 'text'){ $txt .= '('.trim(addslashes($len[$k])).')'; }
    $txt .= ',';
}    $txt = substr($txt,0,(strlen($txt)-1));
    
    $d = new suksessor($_SESSION['server'],$_SESSION['nmp'],$_SESSION['katasandi']);
    $d->conDB();
    $xx = $d->createTB($tb,$txt);
    if($xx != '1'){ print'tabel sudah ada'.$xx; die(); }else{
        $d->TBsukses($fd[0],$fd[1]);
               header("location:generating.php");
    }
}
}
?>
<style>
    body {
  font: 16px Helvetica;
  background: #1abc9c;
}

.container {
  width: 600px;
  margin: 2em auto;
  overflow: hidden;
  background: white;
  border-radius: 5px;
}

.three, .one, .two, .footer, header, footer, textarea {
  display: block;
  padding: 0;
  margin: 0;
  border: 0;
  clear: both;
  overflow: hidden;
}

header, footer {
  height: 75px;
  background: rgba(0, 0, 0, 0.05);
  line-height: 75px;
  padding-left: 20px;
  border-radius: 5px 5px 0 0;
}
header h1, footer h1 {
  font-size: 1.2em;
  text-transform: uppercase;
  color: rgba(51, 51, 51, 0.4);
}

.loro {
  float: left;
  width: 278px;
  margin: 0;
  padding: 0 0 0 20px;
  border: 1px solid rgba(0, 0, 0, 0.1);
  height: 50px;
}

.last {
  width: 279px;
  border-left: 0;
}

.siji, textarea {
  height: 50px;
  width: 578px;
  line-height: 50px;
  padding: 0 0 0 20px;
  border-top: 0;
  border-left: 1px solid rgba(0, 0, 0, 0.1);
  border-right: 1px solid rgba(0, 0, 0, 0.1);
  border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}

textarea {
  height: 200px;
}

footer {
  height: 49px;
  border-top: 1px dashed rgba(0, 0, 0, 0.3);
  border-radius: 0 0 5px 5px;
  padding-left: 0;
  padding-right: 20px;
}
footer button {
  height: 32px;
  background: #e74c3c;
  border-radius: 5px;
  border: 0;
  margin: 7px 0;
  color: white;
  float: right;
  padding: 0 20px 0 20px;
  border-bottom: 3px solid #c0392b;
  transition: all linear .2s;
}
footer button:hover {
  background: #c0392b;
}
footer button:focus {
  outline: none;
}

.loro:focus .siji:focus, textarea:focus, textarea:focus {
  outline: none;
  background: rgba(52, 152, 219, 0.1);
  color: rgba(51, 51, 51, 0.7);
}
</style>

<form method='post' class='container'>
  <header>
    <h1>
       CODEJAWA -versi Beta
      </h1>
  </header>
  <div class='one'>
    <input class='siji' name='tabel' placeholder='Nama Tabel' type='text'>
</div>
    
<div class='one'>
    <input class='siji' name='field[]' placeholder='Nama Field' type='text'>
</div>
  <div class='two'>
   
      <select class='loro' name='typeData[]'>
            <option value='varchar'>Varchar</option>
            <option value='varchar'>Integer</option>
      </select>
       <input class='loro' placeholder='Panjang Data' name='len[]' type='text'>
  </div>
<div class='one'>
    <input class='siji' name='field[]' placeholder='Nama Field' type='text'>
</div>
  <div class='two'>
   
      <select class='loro' name='typeData[]'>
            <option value='varchar'>Varchar</option>
            <option value='int'>Integer</option>
      </select>
       <input class='loro' placeholder='Panjang Data' name='len[]' type='text'>
  </div>
    <div class='one'>
        <center>
            <h5>Catatan : Mohon maaf hanya ada 2 field tersedia, setelah ini anda bisa menggunakan database anda untuk mengembangkan, dan kami sertakan contoh CRUD </h5>
        </center>
    </div>
<!---
  <div class='three'>
    <textarea placeholder='Your Suggestions Here!'></textarea>
  </div>
--->
  <footer>
    <button type='submit'>GAE DATABASE</button>
  </footer>
</form>