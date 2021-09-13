<?php




class ArrayQueueType 
{
    var $rear;   //back, tail, last, end
    var $front;  //first, begin, head
    var $count;
    var $array= [];
    var $maxSize;

    public function __construct(int $size)
    {
        if($size <= 0) {
            $this->maxSize = 0;
        }else {
            $this->maxSize = $size;
        }
        $this->front = 0;
        $this->rear = $this->maxSize - 1;
        $this->count = 0;
        $this->array = array_fill(0, $this->maxSize, null);
    }

    public function isEmpty()
    {
        return $this->count == 0;
    }

    public function isFull()
    {
        return $this->count == $this->maxSize;
    }

    public function enqueue($element)
    {
        if($this->isFull()) {
            echo "Queue is full can't enqueue...";
        }else {
            $this->rear = ($this->rear + 1) % $this->maxSize;
            $this->array[$this->rear] = $element;
            $this->count++;
        }
    }

    public function dequeue()
    {
        if($this->isEmpty()) {
            echo "Queue is empty can't dequeue...!";
        }else {
            $this->front = ($this->front + 1) % $this->maxSize;
            $this->count--;
        }
    }

    public function frontQueue()
    {
        if($this->isEmpty()) {
            echo "Queue is empty...!";
        }else {
            return $this->array[$this->front];
        }
    }

    public function rearQueue()
    {
        if($this->isEmpty()) {
            echo "Queue is empty...!";
        }else {
            return $this->array[$this->rear];
        }
    }

    public function printQueue()
    {
        if(!$this->isEmpty()) {
            for($i = $this->front; $i != $this->rear + 1; $i=($i+1)%$this->maxSize) {
                echo $this->array[$i] . ' ';
            }
        }else {
            echo "Queue is empty...!";
        }
    }

    public function queueSearch($element)
    {
        $pos = -1;
        if(!$this->isEmpty()) {
            for($i = $this->front; $i != $this->rear + 1; $i = ($i + 1)% $this->maxSize) {
                if($this->array[$i] == $element) {
                    $pos = $i;
                    break;
                }
            }
        }else {
            echo "Queue is empty...!";
        }
        return $pos;
    }
}


$queue = new ArrayQueueType(100);

    $queue->enqueue(10);
    $queue->enqueue(20);
    $queue->enqueue(30);
    $queue->enqueue(40);
    $queue->enqueue(50);
    $queue->enqueue('dasd');
    $queue->enqueue('eslam');
  echo  $queue->queueSearch('eslam');
  

    
