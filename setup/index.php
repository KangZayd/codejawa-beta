<?php
if(isset($_POST['server'])){
    include '../aturan/aturan.gawan.php';
    spl_autoload_register('gawan::setup');
    $srver = trim(addslashes($_POST['server']));
    $nmp = trim(addslashes($_POST['nm_pengguna']));
    $kt = trim(addslashes($_POST['katasandi']));
    $nmb = trim(addslashes($_POST['nm_database']));
if((empty($srver)) AND (empty($nmp)) AND (empty($nmb))){
    print'Data tidak boleh kosong selain katasandi'; die();
}else{
    
    $d = new suksessor($srver,$nmp,$kt);
        $d->connect();
        $rw = $d->createDB($nmb);
    if($rw < 1){ print'Database sudah ada'; die(); }else{
       session_start(); 
            $d->DBsukses();
        header('location:tabel.php');
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
    <input class='siji' value='localhost' name='server' placeholder='Nama Server' type='text'>
</div>
  <div class='two'>
    <input class='loro' value='root' placeholder='Nama Pengguna' name='nm_pengguna' type='text'>
    <input class='loro' name='katasandi' placeholder='Katasandi' type='text'>
  </div>
  <div class='one'>
    <input class='siji' name='nm_database' placeholder='Nama database' type='text'>
  </div>
<!---
  <div class='three'>
    <textarea placeholder='Your Suggestions Here!'></textarea>
  </div>
--->
  <footer>
    <button type='submit'>BUAT DATABASE</button>
  </footer>
</form>