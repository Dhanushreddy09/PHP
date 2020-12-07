<?php
$array=array(1,2,3,4,5,6);
print_r($array)."<br/>";
foreach($array as $i=>$value){
    unset($array[$i]);
}
//array becomes empty but array remains intact
print_r($array);
//array keys start from 6 cuz the highest key earlier was 5
$array[]=56;
print_r($array);
//to reindex the array keys array values built in  function is used
$array=array_values($array);
print_r($array)
?>