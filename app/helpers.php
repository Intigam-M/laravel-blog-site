<?php 

if(!function_exists('sefLink')){

    function sefLink($str){
        $str = mb_strtolower($str, 'UTF-8');
        $str = str_replace(
            ['ı', 'ş', 'ü', 'ğ', 'ö', 'ə', 'ç', 'ş'],
            ['i', 's', 'u', 'g', 'o', 'e', 'c', 's'],
            $str
          );
        $str = preg_replace('/[^a-z0-9]/', '-', $str);
        $str = preg_replace('/-+/', '-', $str);
        return trim ($str, '-'); 
    }

}


?>