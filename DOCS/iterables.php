<?php
//an iterable is a pseudotype and can be an array or a traversible instance
//most of the time it is used as a function parameter
function foo(iterable $iterator)
{
    foreach($iterator as $value){
        echo $value." ";
    }
}
$array=array(1,2,3);
foo($array);

//returning an iterable

function bar():iterable{
    return ["a","b","c"];
}
$data=bar();
foreach($data as $value){
    echo $value." ";
}
?>