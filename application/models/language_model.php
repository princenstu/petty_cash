<?php

class Language_model extends CI_Model{


 function Language_model(){

        $language = $this->session->userdata('ver');

        if($language=="english" || $language==""){
            $this->lang->load('site','english');
        }elseif($language=="german"){
            $this->lang->load('site','german');
        }
    }

    function language_access($var){

        if($var =="english" || $var == "" ){
            $this->session->set_userdata('ver',$var);
        }elseif($var == "german"){
            $this->session->set_userdata('ver',$var);
        }

    }


}
?>
