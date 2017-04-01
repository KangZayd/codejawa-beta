<?php
session_start();
include '../aturan/aturan.gawan.php';

    $fi = '../aturan/aturan.mu.php';
    
    $current = "
    <?php
    define('batur','".$_SESSION['server']."'); 
    define('adahData','".$_SESSION['db']."'); 
    define('jeneng','".$_SESSION['nmp']."'); 
    define('telikSandi','".$_SESSION['katasandi']."'); 
    define('css',sumber.'css'); 
    define('js',sumber.'js'); 
    define('icons',sumber.'icons'); 
    define('img',sumber.'img'); ";
    
    file_put_contents($fi, $current);
    $dirfile = '../'.ientitas.$_SESSION['tabel'].".entitas.php";
$myfile = fopen($dirfile, "w");
    
    $cr = "
    <?php 
        class ".$_SESSION['tabel']." extends generatorEntitas {
            public function __construct(){
                static::".'$en'." = '".$_SESSION['tabel']."';
                static::".'$fd'." = array('".$_SESSION['fd0']."','".$_SESSION['fd1']."');
                parent::__construct();
            }
        }
    ";

    file_put_contents($dirfile,$cr);
$kon = new mysqli($_SESSION['server'],$_SESSION['nmp'],$_SESSION['katasandi'],$_SESSION['db']);
    $sql = "INSERT INTO ".$_SESSION['tabel']." VALUES ('1','Dummy'),('2','Data Dummy'); ";
$xx = $kon->prepare($sql);
    $xx->execute();
$crud = '../'.crud.'index.crud.php';
    $crcrd = '
        <?php
            $vv = new '.$_SESSION['tabel'].';
            $d = $vv->jikukData();
        $idbl = $vv->cacaheBaris($d) + 1;
            if(isset($_GET["update"])){
    $vv->gaeKondisi(array("'.$_SESSION["fd0"].'"=>$_GET["update"]));
    $xx = $vv->jikukData();
        $datax = $vv->gaeLarik($xx);
    $idbl = $datax["'.$_SESSION["fd0"].'"];
    $nmbl = $datax["'.$_SESSION["fd1"].'"];
}

if(isset($_GET["delete"])){
    $vv->gaeKondisi(array("'.$_SESSION["fd0"].'"=>$_GET["delete"]));
    if($vv->ilangiData()){
        print "sukses";
        header("location:".$vv->balik());
    }else{
        print "gagal e iki ".$vv->error();
    }
}

if(isset($_POST["save"])){
    $vv->'.$_SESSION["fd0"].' = $_POST["'.$_SESSION["fd0"].'"];
    $vv->'.$_SESSION["fd1"].' = $_POST["'.$_SESSION["fd1"].'"];
    if($vv->simpenData()){
        print "sukses";
        header("location:".$vv->balik());
    }else{
        print "gagal e iki ".$vv->error();
    }
}

if(isset($_POST["update"])){
    $id = $_POST["'.$_SESSION["fd0"].'"];
    $vv->'.$_SESSION["fd1"].' = $_POST["'.$_SESSION["fd1"].'"];
    $vv->gaeKondisi(array("'.$_SESSION["fd0"].'"=>$id));
    if($vv->gentiData()){
        print "sukses";
        header("location:".$vv->balik());
    }else{
        print "gagal e iki ".$vv->error();
    }
}
            ';
file_put_contents($crud,$crcrd);
$url1 = 'indextampilan.php';
$doc1 = file_get_contents($url1);
$ddoc11 = str_replace('fieldsatunm',$_SESSION['fd0'],$doc1);
    $ddoc111 = str_replace('fieldsatu',$_SESSION['fd0'],$ddoc11);
    $ddoc21 = str_replace('fieldduanm',$_SESSION['fd1'],$ddoc111);
    $ddoc22 = str_replace('fielddua',$_SESSION['fd1'],$ddoc21);
$tmp = '../'.html.'index.tampilan.php';
file_put_contents($tmp,$ddoc22);

$url = '../documentation/b.html';
$ur2 = '../documentation/index.php';
$doc = '<?php
function Delete($path)
{
    if (is_dir($path) === true)
    {
        $files = array_diff(scandir($path), array(".", ".."));

        foreach ($files as $file)
        {
            Delete(realpath($path) . "/" . $file);
        }

        return rmdir($path);
    }

    else if (is_file($path) === true)
    {
        return unlink($path);
    }

    return false;
}
if(is_dir("../setup")){
    Delete("../setup/"); 
}
?> 
'.file_get_contents($url);
$ddoc = str_replace('ubahnamadatabase',$_SESSION['db'],$doc);
    $ddoc1 = str_replace('ubahnamatable',$_SESSION['tabel'],$ddoc);
    $ddoc2 = str_replace('ubahentitas',$_SESSION['tabel'],$ddoc1);
file_put_contents($ur2,$ddoc2);
unlink($url);




header('location:../documentation');
