<?php
header("Content-Type: text/txt; charset=uft-8");
$bookOpen = fopen("C:\Users\Анастасия\Desktop\book2.txt", "r");
$text="";
$text_1 ="";
while (!feof($bookOpen)){
    $text = fgets($bookOpen, 999);
    $regular = ltrim(preg_replace("/([^\p{Cyrillic}\p{Latin}\p{N},-:()Ў�\s])/im","",$text));
    $text_1 = $text_1.$regular;
}
$split_string = explode("\r",$text_1);
for ($i = 0; $i <= strlen($text);) {  //9841
        foreach ($split_string as $stroka) {
            $v = $i + 1; // 2 строка от предыдущей строки
            if (isset($split_string[$i]) || (isset($split_string[$v]))){ //Проверка на пустые строки, если пустая то не берем.
                $stroka = getString ((trim((string)$split_string[$i])), (trim((string)$split_string[$v])));//Подаем в функцию верхнюю и нижнюю строку
                $i += 2; //Проход через 1 строку
                $v++;
                 //print_r($stroka);
                 echo($stroka . "\n");//Выводим содержимое
            }
        }
    }

    function getString($string, $string2){
    $element = substr($string, -1);
    if (ctype_lower($element)){
        $element2 = substr($string, -2);
        if (ctype_lower($element2)){
            $string = trim($string . "  " . $string2  . "\n");
            return $string; //возвращаем отредактированные строки
        }

    }
    else {
        return $string . $string2 . "\n"; //Не трогаем строки
    }



}

