<?php

interface dbAnt{
    public function sambungkeDB();
    public function jikukState();
    public function sambungke();
    public function pedotke();
    public function siapkeSQL($s,$bd);
    public function lakokneSQL();
    public function SQLjikuk($tb,$sl,$wh,$bd);
    public function SQLsimpen($tb,$fl,$vl,$bd);
}