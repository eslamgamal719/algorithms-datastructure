<?php


$arr1 = [10, 20, 30, 40, 50, 60];
$arr2 = [20, 10, 30, 40, 50, 60];


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





print_r(bubbleSort($arr2));

