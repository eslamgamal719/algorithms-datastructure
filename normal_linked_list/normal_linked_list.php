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

    //remove first element in the list
    public function removeFirst()
    {
        if($this->length == 0) {
            echo "Empty list can't remove...!";
        }elseif($this->length == 1) {
            $this->head = $this->tail = null;
            $this->length--;
        }else {
            $this->head = $this->head->next;
            $this->length--;
        }
    }

    //remove last element in the list (1)
    public function removeLast()
    {
        if($this->length == 0) {
            echo "Empty list can't remove...!";
        }elseif($this->length == 1) {
            $this->head = $this->tail = null;
            $this->length--;
        }else {
            $previous = $this->head;
            $current = $this->head->next;
            while($current != $this->tail) {
                $previous = $current;
                $current  = $current->next;
            }
            $previous->next = null;
            $this->tail = $previous;
        }
        $this->length--;
    }

    //remove last element in the list (2)
    public function removeLast2()
    {
        if($this->length == 0) {
            echo "Empty list can't remove...!";
        }elseif($this->length == 1) {
            $this->head = $this->tail = null;
            $this->length--;
        }else {
            $current = $this->head;
            for($i = 1; $i < $this->length - 1; $i++) {
                $current  = $current->next;
            }
            $this->tail = $current;
            $current->next = null;
        }
        $this->length--;
    }
    
    //remove element with specific value
    public function remove($element)
    {
        if($this->isEmpty()) {
            echo "Empty list can't remove...!";
            return;
        }

        if($this->head->item == $element) {

            $this->head = $this->head->next;
            $this->length--;
            if($this->length == 0) {
                $this->tail = null;
            } 

        }else {
            $previous = $this->head;
            $current = $this->head->next;
            while($current != null) {
                if($current->item == $element) {
                    break;
                }
                $previous = $current;
                $current = $current->next; 
            }
            if($current == null) {
                echo "Element not found...!";
            }else {
                $previous->next = $current->next;
                if($current == $this->tail) {
                    $this->tail = $previous;
                } 
                $this->length--;
            }
        }
    }

    //remove element with specific position
    public function removeAtPosition(int $pos)
    {
        if($this->isEmpty()) {
            echo "List is empty...!";
            return;
        }

        if($pos == 0) {
            $this->removeFirst();
        }elseif($pos == $this->length-1) {
            $this->removeLast();
        }else {
            $previous = $this->head;
            $current = $this->head->next;
            for($i = 1; $i < $pos; $i++) {
                $previous = $current;
                $current = $current->next;
            }
            $previous->next = $current->next;
            if($current == $this->tail) {
                $this->tail == $previous;
            }
            $this->length--;
        }
    }
    
    //reverse linked list elements
    public function reverse()
    {
        $prev = new Node(null);
        $curr = $this->head;
        $next = $curr->next;

        while($curr != null) { //or $next != null
            $next = $curr->next;
            $curr->next = $prev;

            $prev = $curr;
            $curr = $next;
        }
        $this->head = $prev;
    }

    //search for an value in list 
    public function search($element)
    {
        $current = $this->head;
        for($i = 0; $current != null; $i++) {
            if($current->item == $element) {
                echo "The element is found at index: " . $i;
                return;
            }
            $current = $current->next;
        }
        echo "The element isn't found in the list...!";
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
    $list->insertLast(55);
    $list->insertLast(47);
    $list->insertAtPosition(2, 90);
    $list->insertFirst(3);
    $list->insertLast(4);
    //$list->removeFirst();
    //$list->removeLast2();
    //$list->removeLast();
    //$list->remove(55);
    //$list->removeAtPosition(1);
    //$list->reverse();
    $list->search(100);
    $list->print();