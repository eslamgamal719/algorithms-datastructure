<?php


class LinkedList
{
    var $head;
    var $tail;
    var $length;

    public function __construct()
    {
        $this->head = new Node(null);
        $this->tail = new Node(null);
        $this->length = 0;
    }

    //check if list is empty
    public function isEmpty()
    {
        return $this->length == 0;
    }

    //insert from the beginning
    public function insertFirst($element)
    {
        $newNode = new Node($element);
        if($this->isEmpty()) {
            $newNode->next = null;
            $this->head = $this->tail = $newNode;
        }else {
            $newNode->next = $this->head;
            $this->head = $newNode;
        }
        $this->length++;  
    }

    //insert from the last
    public function insertLast($element)
    {
        $newNode = new Node($element);
        if($this->isEmpty()) {
            $newNode->next = null;
            $this->head = $this->tail = $newNode;
        }else {
            $this->tail->next = $newNode;
            $newNode->next = null;
            $this->tail = $newNode;
        }
        $this->length++;
    }

    //insert from specific position
    public function insertAtPosition(int $position, $element)
    {
        if($position < 0 || $position > $this->length) {
            echo "Out of range...!";
        }else {
            $newNode = new Node($element);
            if($position == 0) {
                $this->insertFirst($element);
            }elseif($position == $this->length) {
                $this->insertLast($element);
            }else {
                $current = $this->head;
                for($i = 1; $i < $position; $i++) {
                    $current = $current->next;
                }
                $newNode->next = $current->next;
                $current->next = $newNode;    
            }
            $this->length++;
        }
    }

    //print list elements
    public function print()
    {
        $current = $this->head;
        for($i = 0; $current != null; $i++) {
            echo $current->item . " ";
            $current = $current->next;
        }
    }

}//end of linked list class


class Node 
{
    var $item;
    var $next;

    public function __construct($item)
    {
        $this->item = $item;
        $this->next = null;
    }

}//end of node class




/***********************************************Testing************************************************/

 $list = new LinkedList();

    $list->insertFirst(10);
    $list->insertLast(30);
    $list->insertLast(40);
    $list->insertLast(50);
    $list->insertAtPosition(2, 90);
    $list->insertFirst(3);
    $list->insertLast(4);
    $list->print();