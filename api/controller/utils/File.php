<?php

    class File
    {

        public function __construct()
        {
            parent::__construct();
        }

        public static function createFolder($path, $permission)
        {
            return mkdir($path, $permission);
        }


    }


?>