<?php


class LinkedQueue
{
    var $front;
    var $rear;
    var $length;

    public function __construct()
    {
        $this->front = new Node(null);
        $this->rear  = new Node(null);
        $this->length = 0;
    }

    public function isEmpty()
    {
        return $this->length == 0;
    }

    public function enqueue($element)
    {
        $newNode = new Node($element);
        $newNode->next = null;
        if($this->isEmpty()) {
            $this->front = $newNode;
            $this->rear  = $newNode;
        }else {
            $this->rear->next = $newNode;
            $this->rear = $newNode;
        }
        $this->length++;
    }
    
    public function dequeue()
    {
        if($this->isEmpty()) {
            echo "Queue is empty, Can't dequeue...!";
        }else {
            $this->front = $this->front->next;
            if($this->front == null) {
                $this->rear = null;
                $this->length = 0;
            }
            $this->length--;
        }
    }

    public function getFront()
    {
        if($this->isEmpty()) {
            echo "Queue is empty...!";
        }else {
            return $this->front->item;
        }
        return $this->front->item;
    }

    public function getRear()
    {
        if($this->isEmpty()) {
            echo "Queue is empty...!";
        }else {
            return $this->rear->item;
        }
    }

    public function clearQueue()
    {
        $this->front = $this->rear = null;
        $this->length = 0;
    }

    public function displayQueue()
    {
        $current = $this->front;
        while($current != null) {
            echo $current->item . ' ';
            $current = $current->next;
        }
    }

    public function getSize()
    {
        return $this->length;
    }

}//end of linked queue class
 


class Node 
{
    var $item;
    var $next;

    public function __construct($item)
    {
        $this->item = $item;
    }
}//end of node class





/****************************************************** Testing ******************************************************/

$q1 = new LinkedQueue();

$q1->enqueue(100);
$q1->enqueue(200);
$q1->enqueue(300);
$q1->enqueue('eslam');
$q1->enqueue('gamal');
$q1->dequeue();

//echo 'Front = ' . $q1->getFront() . "<br>";
//echo 'Rear = ' . $q1->getRear() . "<br>";

//$q1->displayQueue();
echo $q1->getSize();
$q1->displayQueue();