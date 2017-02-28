<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function jangkaWaktu($tglSkrg, $tglAmb) {

	if ($tglSkrg < $tglAmb) {
		echo 'disabled';
	}
}

function combo_disabled($variable, $field1){

	foreach ($variable as $row1) {
		if ($row1['tipebunga_id'] == $field1) {
			echo 'disabled';
		}
		

	}
}

function status($field) {
	 if ($field == 'Dibayar') {
	 	echo '<span class="label label-success">Dibayar</span>';
	 }
	 elseif ($field == 'Jatuh Tempo') {
	 	echo '<span class="label label-warning">Jatuh Tempo</span>';
	 }
	 else {
	 	echo '<span class="label label-danger">Belum</span>';
	 }
}

function check_disable($field) {
	if ($field == 'Dibayar') {
		echo 'disabled';
	}
}

function format_rupiah($angka){
 
 $rupiah = number_format($angka, 2, ',', '.');
 return $rupiah;
}
