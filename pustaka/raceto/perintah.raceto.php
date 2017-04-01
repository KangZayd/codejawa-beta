<?php
abstract class perintah{
    abstract public function jikukData();
    abstract public function simpenData();
    abstract public function gaeKondisi($x);
    abstract public function kondisiTambahan($x);
    abstract public function initLD($x);
    abstract public function gaeLarik($x);
    abstract public function gaeObjek($x);
}