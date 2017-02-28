<?php
class Yeartodate_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }    

    public function firstYeartodate()
    {
        $first = '01-01-'.trim($_POST['tanggalmulai']);
        $time = strtotime($first);
        $newfirst = date('Y-m-d',$time); 
        //print_r($newfirst);die();

        return $newfirst;
    }

    public function endYeartodate()
    {
        $end = '31-12-'.trim($_POST['tanggalmulai']);  
        $timeend = strtotime($end);
        $newend = date('Y-m-d',$timeend); 
        //print_r($newend);die();   

        return $newend;
    }
}
?>