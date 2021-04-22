<?php 
function pre_var_dump() {
    $back_trace = debug_backtrace();
    $last = end($back_trace);
    
    $back_trace_array = array();
    
    foreach($back_trace as $each_trace) {
        $back_trace_array[] = @$each_trace['file'] . ' ' . @$each_trace['line'];
    }
    
    // do {
    //     $color = substr(md5(rand()), 0, 6);
    //     $color_avg = (hexdec(substr($color, 0, 2)) + hexdec(substr($color, 2, 2)) + hexdec(substr($color, 4, 2)))/3;

    // } while ($color_avg < 190);//keep generating bg color until got a bg color that is white enough

    $color = rand(0, 359);

    echo "<pre style='background-color:hsl({$color}deg, 75%, 70%)'>";

    $step = 0;
    
    foreach($back_trace_array as $each_trace) {
        echo PHP_EOL . "[{$step}][{$each_trace}]";
        $step++;
    }
    echo PHP_EOL;
    
    foreach (func_get_args() as $param) {
        var_dump($param);
    }
    echo "</pre>";
}