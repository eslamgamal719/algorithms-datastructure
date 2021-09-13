<?php


class ArrayList
{
    var $array;
    var $maxSize;
    var $length;


    public function __construct(int $size)
    {
        if($size < 0) {
            $this->maxSize = 10;
        }else {
            $this->maxSize = $size;
        }
        $this->length = 0;
        $this->array = array_fill(0, $this->maxSize, null);
    }

    public function isEmpty()
    {
        return $this->length == 0;
    }

    public function isFull()
    {
        return $this->length == $this->maxSize;
    }

    public function getSize()
    {
        return $this->length;
    }

    public function printArray()
    {
        for($i = 0; $i < $this->length; $i++) {
            echo $this->array[$i] . " ";
        }
    }

    public function insertAtPosition(int $position, $element) 
    {
        if($this->isFull()) {
            echo "Array is full...!";
        }elseif($position < 0 || $position > $this->length) {
            echo "Out of range...!";
        }else {
            for($i = $this->length; $i > $position; $i--) {
                $this->array[$i] = $this->array[$i - 1];
            }
            $this->array[$position] = $element;
            $this->length++;
        }
    }

    public function insertAtEnd($element) 
    {
        if($this->isFull()) {
            echo "Array is full...!";
        }else {
            $this->array[$this->length] = $element;
            $this->length++;
        }    
    }

    public function search($element) 
    {
        for($i = 0; $i < $this->length; $i++) {
            if($this->array[$i] == $element) {
                return $i;
            }
        }
        return -1;
    }

    public function insertNoDuplicate($element) 
    {
        if($this->search($element) == -1) {
            $this->insertAtEnd($element);
        }else {
            echo "This value is already inserted...!";
        }
    }

    public function updateAt(int $position, $newValue)
    {
        if($position < 0 || $position >= $this->length) {
            echo "Out of range...!";
        }else {
            $this->array[$position] = $newValue;
        }
    }

    public function getElement(int $position)
    {        
        if($position < 0 || $position >= $this->length) {
            echo "Out of range...!";
        }else {
            return $this->array[$position];
        }
    }

    public function removeAtPosition(int $position) {
        if($this->isEmpty()) {
            echo "Array is empty...!";
        }elseif($position < 0 || $position > $this->length) {
            echo "Out of range...!";
        }else {
            for($i = $position; $i < $this->length; $i++) {
                $this->array[$i] = $this->array[$i + 1];
            }
            $this->array[$this->length] = null;
            $this->length--;
        }
    }

    public function clear()
    {
        $this->length = 0;
    }

}


/******************************************************* Testing *******************************************************/


$ar = new ArrayList(100);

    $ar->insertAtPosition(0, 10);
    $ar->insertAtPosition(1, 20);
    $ar->insertAtEnd(30);
    $ar->insertNoDuplicate(40); 
    $ar->removeAtPosition(1);
    $ar->printArray();
