<?php


class DoublyLinkedList 
{
    var $head;
    var $tail;
    var $count;

    public function __construct()
    {
        $this->head = $this->tail = new Node(null);
        $this->count = 0;
    }

    //check if list is empty
    public function isEmpty()
    {
        return $this->count == 0;
    }

    //insert element from the start
    public function insertFirst($element)
    {
        $newNode = new Node($element);
        if($this->isEmpty()) {
            $newNode->next = $newNode->prev = null;
            $this->head = $this->tail = $newNode;
        }else {
            $newNode->next = $this->head;
            $newNode->prev = null;
            $this->head->prev = $newNode;
            $this->head = $newNode;
        }
        $this->count++;
    }

    //insert element from the end
    public function insertLast($element)
    {
        $newNode = new Node($element);
        if($this->isEmpty()) {
            $newNode->next = $newNode->prev = null;
            $this->head = $this->tail = $newNode;
        }else {
            $newNode->next = null;
            $newNode->prev = $this->tail;
            $this->tail->next = $newNode;
            $this->tail = $newNode;
        }
        $this->count++;
    }

    //insert element at specific position
    public function insertAt(int $pos, $element)
    {
        if($pos < 0 || $pos > $this->count) {
            echo "Out of range...!";
            return;
        }
        $newNode = new Node($element);
        if($pos == 0) {
            $this->insertFirst($element);
        }elseif($pos == $this->count) {
            $this->insertLast($element);
        }else {
            $cur = $this->head;
            for($i = 1; $i < $pos; $i++) {
                $cur = $cur->next;
            }
            $newNode->next = $cur->next;
            $newNode->prev = $cur;
            $cur->next = $newNode;
            $cur->next->prev = $newNode;
        }
        $this->count++;
    }

    public function removeFirst()
    {
        if($this->isEmpty()) {
            echo "List is empty...!";
            return;
        }elseif($this->count == 1) {
            $this->head = $this->tail = null;
        }else {
            $this->head = $this->head->next;
            $this->head->prev = null;
        }
        $this->count--;
    }

    public function removeLast()
    {
        if($this->isEmpty()) {
            echo "List is empty...!";
            return;
        }elseif($this->count == 1) {
            $this->head = $this->tail = null;
        }else {
            $this->tail = $this->tail->prev;
            $this->tail->next = null;
        }
        $this->count--;
    }

    //remove element form list by value
    public function remove($item)
    {
        if($this->isEmpty()) {
            echo "List is empty...!";
            return;
        }elseif($this->head->item == $item) {
            $this->removeFirst();
        }else {
            $cur = $this->head;
            while($cur != null) {
                if($cur->item == $item) {
                    break;
                }
                $cur = $cur->next;
            }
            if($cur == null) {
                echo "Element not found...!";
            }elseif($cur->next == null) {
                $this->removeLast();
            }else {
                $cur->next->prev = $cur->prev;
                $cur->prev->next = $cur->next;
                $this->count--;
            }
        }
    }

    //print all list elements
    public function print()
    {
        echo "Elements normal list: ";
        $cur = $this->head;

        while($cur != null) {
            echo $cur->item . " ";
            $cur = $cur->next;
        }
    }

    //print all list elements reversely
    public function printReverse()
    {
        echo "Elements reversed list: ";
        $cur = $this->tail;

        while($cur != null) {
            echo $cur->item . " ";
            $cur = $cur->prev;
        }
    }
    

    

}


class Node 
{
    var $item;
    var $next;
    var $prev;

    public function __construct($item)
    {
        $this->item = $item;
        $this->next = $this->prev = null;
    }
}



$d = new DoublyLinkedList();

    $d->insertFirst(10);
    $d->insertFirst(20);
    $d->insertFirst(30);
    $d->insertLast(40);
   // $d->removeFirst();
  //  $d->removeLast();
    $d->removeLast();
  //  $d->insertAt(0, 30);
   // $d->insertAt(40);
    $d->print(); echo "<br>";
    $d->printReverse(); echo "<br>";
    echo $d->tail->item;
