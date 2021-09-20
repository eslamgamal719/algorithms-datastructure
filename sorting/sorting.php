<?php





//Selection Sort Algorithm
function selectionSort(Array $array)
{
    for($i = 0; $i < count($array) - 1; $i++) {
        for($j = $i + 1; $j < count($array); $j++) {
            if($array[$j] < $array[$i]) {
                $min = $array[$i];
                $array[$i] = $array[$j];
                $array[$j] = $min;
            }
        }
    }
    return $array;
}

//Bubble Sort Algorithm
function bubbleSort(Array $array) 
{
    $swap_flag = false;
    $c = 0;
    for($i = 0; $i < count($array) - 1; $i++) {
        $swap_flag = false;
        for($j = 0; $j < count($array) - $i - 1; $j++) {
            if($array[$j] > $array[$j + 1]) {
                $temp = $array[$j];
                $array[$j] = $array[$j + 1];
                $array[$j + 1] = $temp; 
                $swap_flag = true;
            }
            $c++;
        }
        if($swap_flag == false) {
            break;
        }
    }
    echo "number of round: " . $c;
    return $array;
}


//Insertion Sort Algorithm
function insertionSort(Array $array) 
{
    $n = count($array); //8
    for($i = 1; $i < $n; $i++) { // i = 3
        $key = $array[$i]; // 20
        $j = $i - 1; //2

        while($j >= 0 && $array[$j] > $key) {
            $array[$j + 1] = $array[$j];
            $j = $j - 1; // 1
        }
        $array[$j + 1] = $key;
    }
    return $array;
}


//Merging two lists into one
function merging(Array $ar1, Array $ar2)
{   
    $i = $j = $k = 0;
    $array = [];
    while($i < count($ar1) && $j < count($ar2)) {
        if($ar1[$i] <= $ar2[$j]) {
            $array[$k] = $ar1[$i];
            $i++;
        }else {
            $array[$k] = $ar2[$j];
            $j++;
        }
        $k++;
    }
    while($i < count($ar1)) {
        $array[$k] = $ar1[$i];
        $i++;
        $k++;
    }
    while($j < count($ar2)) {
        $array[$k] = $ar2[$j];
        $j++;
        $k++;
    }
    return $array;
}

function merging2(Array $arr, int $l, int $m, int $r)
{   
    $n1 = $m - $l + 1;
    $n2 = $r - $m;

    $l_ar = $r_ar = [];
    $l_ar = array_fill(0, $n1, null);
    $r_ar = array_fill(0, $n2, null);

    for($i = 0; $i < $n1; $i++) {
        $l_ar[$i] = $arr[$l + $i];
    }

    for($j = 0; $j < $n2; $j++) {
        $r_ar[$i] = $arr[$m + 1 + $j];
    }

    $i = $j = 0;
    $k = $l;
    $array = [];

    while($i < $n1 && $j < $n2) {
        if($l_ar[$i] <= $r_ar[$j]) {
            $array[$k] = $l_ar[$i];
            $i++;
        }else {
            $array[$k] = $r_ar[$j];
            $j++;
        }
        $k++;
    }
    while($i < $n1) {
        $array[$k] = $l_ar[$i];
        $i++;
        $k++;
    }
    while($j < $n2) {
        $array[$k] = $r_ar[$j];
        $j++;
        $k++;
    }
}

function mergeSort(Array $arr, int $l, int $r)
{
    if($l < $r) {
        $m = $l + ($r - 1) / 2;
        mergeSort($arr, $l, $m);
        mergeSort($arr, $m + 1, $r);

        merging2($arr, $l, $m, $r);
    }
}




function partioning1(Array $arr, int $begin, int $end) 
{
     $i = $begin;
     $j = $end;
     $pivLoc = $i;
    
    while(true) {
        while($arr[$pivLoc] <= $arr[$j] && $pivLoc != $j) {
            $j--;
        }
        if($pivLoc == $j) {
            break;
        }elseif($arr[$pivLoc] > $arr[$j]) {
            $temp = $arr[$j];
            $arr[$j] = $arr[$pivLoc];
            $arr[$pivLoc] = $temp;
            $pivLoc = $j;
        }

        while($arr[$pivLoc] >= $arr[$i] && $pivLoc != $i) {
            $i++;
        }
        if($pivLoc == $i) {
            break;
        }elseif($arr[$pivLoc] < $arr[$i]) {
            $temp = $arr[$i];
            $arr[$i] = $arr[$pivLoc];
            $arr[$pivLoc] = $temp;
            $pivLoc = $i;
        }
    }
    return $pivLoc;
}

function quickSort1(Array $arr, int $l, int $h)
{
    if($l < $h) {
        $piv = partioning1($arr, $l, $h);
        quickSort1($arr, $l, $piv - 1);
        quickSort1($arr, $piv + 1, $h);
    }
    return $arr;
}


function partioning2(Array $arr, int $l, int $h)
{
    $p = $arr[$l];
    $i = $l;
    $j = $h;

    while($i < $j) {
        do {
            $i++;
        }while($arr[$i] <= $p);

        do {
            $j--;
        }while($arr[$j] > $p);

        if($i < $j) {
            $temp = $arr[$i];
            $arr[$i] = $arr[$j];
            $arr[$j] = $temp;
        }
    }
    $arr[$l] = $arr[$j];
    $arr[$j] = $p;
    return $j;
}


function quickSort2(Array $arr, int $l, int $h)
{
    if($l < $h) {
        $piv = partioning2($arr, $l, $h);
        quickSort2($arr, $l, $piv);
        quickSort2($arr, $piv + 1, $h);
    }
    return $arr;
}


$arr = [15, 25, 14, 26, 18];


print_r(quickSort2($arr, 0, count($arr)));



