<?php

abstract class db {
    abstract public function sambungkeDB();
    abstract public function sambungke();
    abstract public function pedotke();
    abstract public function jikukState();
    abstract public function siapkeSQL($s,$bd);
    abstract public function lakokneSQL();
    abstract public function SQLjikuk($tb,$sl,$wh,$bd);
    abstract public function SQLsimpen($tb,$fl,$vl,$bb);
}