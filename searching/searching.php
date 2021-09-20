<?php


//linear search 
function linearSearch(Array $array, $value)
{
    for($i = 0; $i < count($array); $i++) {
        if($array[$i] == $value) {
            return $i;
        }
    }
    return -1;
}

//binary search by iterations
function binarySearch(Array $arr, int $l, int $h, int $element)
{
    while($l <= $h) {
        $m = ceil(($l + $h) / 2);

        if($arr[$m] == $element) {
            return $m;
        }

        if($arr[$m] < $element) {
            $l = $m + 1;
        }else {
            $h = $m - 1;
        }
    }
    return -1;
}

//binary search recursively
function binarySearchRecursively(Array $arr, int $l, int $h, int $element)
{
    while($l <= $h) {
        $m = ceil(($l + $h) / 2);

        if($arr[$m] == $element) {
            return $m;
        }

        if($arr[$m] < $element) {
            $l = $m + 1;
            binarySearchRecursively($arr, $l, $h, $element);
        }else {
            $h = $m - 1;
            binarySearchRecursively($arr, $l, $h, $element);
        }
    }
    return -1;
}


$arr = [10, 20, 23, 30, 39, 44];

    echo binarySearchRecursively($arr, 0, 5, 20);