<?php
    class Usuario{
        private $first_name;
        private $last_name;

        function __construct($f_name, $l_name){
            $this->first_name = $f_name;
            $this->last_name = $l_name;
        }

        public function showName() {
            return $this->first_name . " " . $this->last_name;
        }
    }
?>