<?php

const MAX_SIZE = 100;

class Stack 
{
   var $top = -1;
   public $item = [];


    public function push(int $element) {
        if($this->top == MAX_SIZE - 1) {
            echo "Stack is full to push";
        }else {
            $this->top++;    
            $this->item[$this->top] = $element;
        }
    }

    public function isEmpty() 
    {
        return $this->top < 0;
    }

    public function pop()
    {
        if($this->isEmpty()) {
            echo "Stack is empty to pop";
        }else {
            $this->top--;
        }
    }

    public function pop_save()
    {
        if($this->isEmpty()) {
            echo "Stack is empty to pop";
        }else {
            $element = $this->item[$this->top];
            $this->top--;
            return $element;
        }
    }

    public function print()
    {
        echo "[";
        for($i = $this->top; $i >= 0; $i--) {
            echo $this->item[$i] . " ";
        }
        echo "]";
    }



}


$stack = new Stack();

$stack->push(10);
$stack->push(20);
$stack->push(30);
$stack->push(40);
$stack->push(50);
 echo $stack->pop_save();
 $stack->print();