<?php


function f($n) {
    if($n < 1) {
        return;
    }else {
        echo "Round: " . $n . "<br>";

        f($n-1);
    }
}

function factorial(int $n) {
    if($n == 0 || $n == 1) {
        return 1;
    }else {
       return $n * factorial($n -1);
    }
}

function fib(int $n) {
    if($n == 0 || $n == 1) {
        return $n;
    }else {
        return fib($n - 1) + fib($n - 2);
    }
}

function sum(int $n) {

    if($n == 0 || $n == 1) {
        return $n;
    }else {
        return $n + sum($n - 1);
    }
}

function sumBetween(int $begin, int $end) {
    if($begin == $end) {
        return $begin;
    }else {
        return $begin + sumBetween($begin + 1, $end);
    }
}

function asteriskess(int $n) {   //asterisk triangle
    if($n < 0) {
        return;
    }else {
        asteriskess($n - 1);
        for($i = 0; $i < $n; $i++) {
            echo "*";
        }
        echo "<br>";
    }
}

function asteriskes(int $n) {    //reversed asterisk triangle
    if($n < 0) {
        return;
    }else {
        for($i = 0; $i < $n; $i++) {
            echo "*";
        }
        echo "<br>";
    }
    asteriskes($n -1);
}

function split(int $n) {   //123 => 1 2 3 
    if($n == 0) {
        return;
    }else {
        split($n / 10);
        echo $n % 10 . " ";
    }
}


