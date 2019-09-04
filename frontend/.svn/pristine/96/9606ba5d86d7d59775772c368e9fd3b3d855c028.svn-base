<?php
header("Content-Type: text/html;charset=utf-8");

$arr1=array('红色','橙色','黄色','绿色','青色','蓝色','紫色');
$arr2=array('红色','青色','紫色','白色','黑色');

$arr_result1 = array();
$arr_result2 = array();
foreach($arr1 as $key => $value){
    if(in_array($value, $arr2)){
        array_push($arr_result1, $value);
    } else {
        array_push($arr_result2, $value);
    }
}

foreach($arr2 as $key => $value){
    if(in_array($value, $arr1)){
        array_push($arr_result1, $value);
    } else {
        array_push($arr_result2, $value);
    }
}

var_dump(array_unique($arr_result1));
echo "<br>";
var_dump(array_unique($arr_result2));
echo "<br>";

$arr3=array('哈哈','呵呵','嘿嘿','嘻嘻','啦啦','哈哈','嘿嘿');

var_dump(array_unique($arr3));