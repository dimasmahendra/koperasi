<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class LanguageLoader
{
	var $CI;

    function __construct(){
        $this->CI =& get_instance();
    }
	
    function initialize() {
        $this->CI->load->helper('language');
        $this->CI->load->library('session');
		
		if ($this->CI->session->userdata('lang') == 'id') {
			$this->CI->lang->load("login", 'indonesian');
			$this->CI->lang->load("main", 'indonesian');
			$this->CI->lang->load("errormessage", 'indonesian');

		} else if ($this->CI->session->userdata('lang') == 'en') {
			$this->CI->lang->load("login", 'english');
			$this->CI->lang->load("main", 'english');
			$this->CI->lang->load("errormessage", 'english');

		} else if ($this->CI->session->userdata('lang') == 'fr') {
			$this->CI->lang->load("login", 'france');
			$this->CI->lang->load("main", 'france');
			$this->CI->lang->load("errormessage", 'france');

		} else {
			$this->CI->session->set_userdata('lang','id');
			$this->CI->lang->load("login", 'indonesian');
			$this->CI->lang->load("main", 'indonesian');
			$this->CI->lang->load("errormessage", 'indonesian');

		}
    }
}