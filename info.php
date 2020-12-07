<?php
$array=array(1,2,3,4,5,6);
print_r($array);
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

print_r($array);
//array dereferencing
function getarray(){
    return array(1,2,3,56);
}
$firstelement=getarray()[0];

echo $firstelement;

/*string literal keys(have to use single quotes while using string literal as key) and
 This does not mean to always quote the key. Do not quote keys which are 
constants or variables, as this will prevent PHP from interpreting them.*/
$array['bar']='foo';
print_r($array);

//count
echo count($array);

//copying arrays by reference

$array2=&$array;
$array2[]='Reference';
print_r($array)
?>