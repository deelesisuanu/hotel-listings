<?php
    
    class Validations
    {
        public static function hasWhiteSpace($data){
            if ( preg_match('/\s/',$data) ){
                return true;
            }
            return false;
        }

        public static function hasAWord($data){
            foreach (explode(' ', $data) as $word) {
                if (!empty($word)) {
                  return true;
                }
              }
              return false;
        }

        public static function isEmpty($data){
            return empty($data);
        }

        public static function isEmail($data){
            if(filter_var($data, FILTER_VALIDATE_EMAIL)) {
                return true;
            }
            return false;
        }

        public static function isEmailWithReg($data){
            $email = $data;
            return (preg_match("/(@.*@)|(\.\.)|(@\.)|(\.@)|(^\.)/", $email) || !preg_match("/^.+\@(\[?)[a-zA-Z0-9\-\.]+\.([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/", $email)) ? false : true;
        }

        public static function isNumber($data){
            return is_numeric($data);
        }

        public static function getLength($data){
            return strlen($data);
        }

        public static function isAlphaNumeric($data){
            return ctype_alnum($data);
        }

        public static function sanitizeCopy($args)
        {
            return htmlspecialchars( stripslashes( trim($args) ) , ENT_QUOTES, 'UTF-8');
        }

    }

?>