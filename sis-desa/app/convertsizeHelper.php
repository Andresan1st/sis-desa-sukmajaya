<?php

function convertsizeHelper($size, $precision = 2){
    $base = log($size, 1024);
    $suffixes = array('Bytes', 'Kb', 'Mb', 'Gb', 'Tb');
    return round(pow(1024, $base - floor($base)), $precision) .' '. $suffixes[floor($base)];
}
