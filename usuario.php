<?php
    class Usuario{
        private $first_name;
        private $last_name;
        private $email;

        function __construct($f_name, $l_name, $mail){
            $this->first_name = $f_name;
            $this->last_name = $l_name;
            $this->email = $mail;
        }
    }
?>