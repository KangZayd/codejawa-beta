<?php
    $vv = new tb_maret;
    $d = $vv->jikukData();
    while($de = $vv->gaeObjek($d)){
            print $de->nm_maret.'<br>';
    }
    ?>
<?php
    $vv = new kabupaten;
    $d = $vv->jikukData();
while($de = $vv->gaeObjek($d)){
    print $de->nama.'<br>';
}


<?php

///----kirim variable ke halaman
self::kirim('aku','sss');

//panggil entitas
$v = new provinsi;

//ambil data 2 kondisi
$v->gaeKondisi(array('id'=>'11'));
$v->gaeKondisi(array('nama'=>'ACEH','bool'=>'AND'));
$pp = $v->jikukData();
    while($d = $v->gaeObjek($pp)){
        print $d->nama.'<br>';
    }

///--> ambil data  1 kondisi
$v->gaeKondisi(array('id'=>'12'));
$pp = $v->jikukData();
print $v->gaeLarik($pp)['nama'];


///->> ambil data tanpa kondisi dengan extra limit
$v->kondisiTambahan('LIMIT 0,10');

$pp = $v->jikukData();
while ($vc = $v->gaeLarik($pp)){
    print $vc['nama'].'<br>';
}

// script insert ---> 
if(isset($_POST['username'])){
    $vv = new provinsi;
    $vv->id = $_POST['id'];
    $vv->nama =  $_POST['nama_provinsi'];
    if($vv->simpenData()){
        print 'sukses';
    }else{
        print 'gagal e iki '.$vv->error();
    }
}


if(isset($_POST['username'])){
    $id = $_POST['id'];
    $nama =  $_POST['nama_provinsi'];
    $sql = "INSERT INTO provinsi (id,nama) VALUES ('$id','$nama')";
        $insert = mysqli_query($koneksi, $sql);
    if($insert){
        print 'sukses';
    }else{
        print 'gagal e iki '.mysqli_error($koneksi);
    }
}


//script update data-->
if(isset($_POST['username'])){
    $vv = new provinsi;
    $id = $_POST['password'];
    $vv->nama =  $_POST['username'];
    $vv->gaeKondisi(array('id'=>$id));
    if($vv->gentiData()){
        print 'sukses';
    }else{
        print 'gagal e iki '.$vv->error();
    }
}
//script hapus data
if(isset($_POST['username'])){
    $vv = new provinsi;
    $id = $_POST['password'];
    $vv->gaeKondisi(array('id'=>$id));
    if($vv->ilangiData()){
        print 'sukses';
    }else{
        print 'gagal e iki '.$vv->error();
    }
}
