
        <?php
            $vv = new ssdfsf;
            $d = $vv->jikukData();
        $idbl = $vv->cacaheBaris($d) + 1;
            if(isset($_GET["update"])){
    $vv->gaeKondisi(array("sfsfsd"=>$_GET["update"]));
    $xx = $vv->jikukData();
        $datax = $vv->gaeLarik($xx);
    $idbl = $datax["sfsfsd"];
    $nmbl = $datax["fsdff"];
}

if(isset($_GET["delete"])){
    $vv->gaeKondisi(array("sfsfsd"=>$_GET["delete"]));
    if($vv->ilangiData()){
        print "sukses";
        header("location:".$vv->balik());
    }else{
        print "gagal e iki ".$vv->error();
    }
}

if(isset($_POST["save"])){
    $vv->sfsfsd = $_POST["sfsfsd"];
    $vv->fsdff = $_POST["fsdff"];
    if($vv->simpenData()){
        print "sukses";
        header("location:".$vv->balik());
    }else{
        print "gagal e iki ".$vv->error();
    }
}

if(isset($_POST["update"])){
    $id = $_POST["sfsfsd"];
    $vv->fsdff = $_POST["fsdff"];
    $vv->gaeKondisi(array("sfsfsd"=>$id));
    if($vv->gentiData()){
        print "sukses";
        header("location:".$vv->balik());
    }else{
        print "gagal e iki ".$vv->error();
    }
}
            