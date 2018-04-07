<?php
class Securite{

    public static function bdd($string)
    {
        if(ctype_digit($string))//si la string est un entier
        {
            $string = intval($string);//on force le int
        }
        else// Pour tous les autres types
        {
            $string = mysql_real_escape_string($string);//echappement des caractères particulier
            $string = addcslashes($string, '%_');//echappement du %
        }
        return $string;
    }

}
?>
