<?php

function printData($data, $die = true){

    echo '<pre>';
    if(is_object($data) || is_array($data)){
        print_r($data);
    } else {
        echo $data;
    }

    if($die){
        die(PHP_EOL . 'TERMINADO' . PHP_EOL);
    }
}