<?php
    /**  Заменяет элементы входного массива, содержащие подстроки
     * «серебряный обрез», «золотой обрез», «с серебряным обрезом»,
     * «с золотым обрезом», «серебро» или «золото», на название материала,
     * присутствующего в названии, т.е. на «серебро» или «золото».
     */

 function preobrazovat_v_cerebro_ili_zoloto ($a)
    {
        $kol_obrez=0;
        $str_obrez = array();
        for($i=0; $i<count($a); $i++)
        {
            $n1 = strpos($a[$i],"серебро");
            $n2 = strpos($a[$i],"золото");
            $n3 = strpos($a[$i],"серебряный обрез");
            $n4 = strpos($a[$i],"золотой обрез");
            $n5 = strpos($a[$i],"с серебряным обрезом");
            $n6 = strpos($a[$i],"с золотым обрезом");
            if($n1)
            $str_obrez[$kol_obrez] = substr($a[$i],$n1,strlen("серебро"));
            if($n2)
            $str_obrez[$kol_obrez] = substr($a[$i],$n2,strlen("золото"));
            if($n3)
            $str_obrez[$kol_obrez] = substr($a[$i],$n3,strlen("серебряный обрез"));
            if($n4)
            $str_obrez[$kol_obrez] = substr($a[$i],$n4,strlen("золотой обрез"));
            if($n5)
            $str_obrez[$kol_obrez] = substr($a[$i],$n5,strlen("с серебряным обрезом"));
            if($n6)
            $str_obrez[$kol_obrez] = substr($a[$i],$n6,strlen("с золотым обрезом"));
            $kol_obrez++;
        }

        for($j=0; $j<count($str_obrez); $j++)
        {
            if($str_obrez[$j]=="с серебряным обрезом")
            $str_obrez[$j] = "серебро";
            if($str_obrez[$j]=="с золотым обрезом")
            $str_obrez[$j] = "золото";
        }

        return $str_obrez;
    }


?>