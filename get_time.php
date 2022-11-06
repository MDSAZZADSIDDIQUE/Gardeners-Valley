<?php
function getTime() {
    $month = date('m');
    $day = date('d');
    $year = date('y');
    $month = date("F", mktime(0, 0, 0, $month, 10));
    $time = date("h:i a");
    $time = "{$time}, {$day} {$month}, {$year}";
    return $time;
}