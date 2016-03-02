<?php
    /**  Заменяет элементы входного массива, содержащие подстроки
     * «серебряный обрез», «золотой обрез», «с серебряным обрезом»,
     * «с золотым обрезом», «серебро» или «золото», на название материала,
     * присутствующего в названии, т.е. на «серебро» или «золото».
     */

 function preobrazovat_v_cerebro_ili_zoloto ($a)
    {
        $kol_obrez=0;
        for($i=0; $i<count($a); $i++) {
            $n1 = strpos($a[$i], "серебро");
            $n2 = strpos($a[$i], "золото");
            $n3 = strpos($a[$i], "серебряный обрез");
            $n4 = strpos($a[$i], "золотой обрез");
            $n5 = strpos($a[$i], "с серебряным обрезом");
            $n6 = strpos($a[$i], "с золотым обрезом");

            if (strlen($n1)>0) {
                $str_obrez[$kol_obrez] = substr($a[$i], $n1, strlen("серебро"));
            } elseif (strlen($n2)>0) {
                $str_obrez[$kol_obrez] = substr($a[$i], $n2, strlen("золото"));
            } elseif (strlen($n3)>0) {
                $str_obrez[$kol_obrez] = substr($a[$i], $n3, strlen("серебряный обрез"));
            } elseif (strlen($n4)>0) {
                $str_obrez[$kol_obrez] = substr($a[$i], $n4, strlen("золотой обрез"));
            } elseif (strlen($n5)>0) {
                $str_obrez[$kol_obrez] = substr($a[$i], $n5, strlen("с серебряным обрезом"));
            } elseif(strlen($n6)>0) {
                $str_obrez[$kol_obrez] = substr($a[$i],$n6,strlen("с золотым обрезом"));
            } elseif(!$n1 || !$n2 || !$n3 || !$n4 || !$n5 || !$n6) {
                $str_obrez[$kol_obrez] = "";
            }

            $kol_obrez++;
        }

        for($j=0; $j<count($str_obrez); $j++)
        {
            if($str_obrez[$j]=="с серебряным обрезом") {
                $str_obrez[$j] = "серебро";
            } elseif($str_obrez[$j]=="с золотым обрезом") {
                $str_obrez[$j] = "золото";
            } elseif($str_obrez[$j]=="серебряный обрез") {
                $str_obrez[$j] = "серебро";
            } elseif($str_obrez[$j]=="золотой обрез") {
                $str_obrez[$j] = "золото";
            }

        }

        return $str_obrez;
    }

$str = array("серебро", "золото", "brсеребряный обрез", "brсеребряный обрез", "hagsdfс золотым обрезом", "bro золото", "notbro bro серебряный обрез");

$arr = preobrazovat_v_cerebro_ili_zoloto($str);
foreach ($arr as $s) {
    print $s."  ";
}

/** ОШИБКИ:
 *      1) Если элемент массива не содержит одну из искомых подстрок, то программа обязательно выдаст ошибку, так как в массив $str_obrez[$kol_obrez] будет нечего записывать.
 *      2) Если элемент массива a сразу же начинается с подстроки, то алгоритм пропускает этот элемент
 *      3) Во втором цикле отсутствуют две замены элементов.
 */

?>




