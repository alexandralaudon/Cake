<?php
class Fibber{
  
  function __construct(){
    $this->fibber = [];
  }
  
  function fib($n){
    if($n === 1 || $n === 0){
      return $n;
    }
    
    if(isset($this->fibber[$n])){
      return $this->fibber[$n];
    }

    $result = $this->fib($n-1) + $this->fib($n-2);

    $this->fibber[$n] = $result;
    
    return $result;
  }

}

$fibResult = new Fibber;
echo $fibResult->fib(10);


function fib2($n){
  if($n<0){
    return "HEY, don't do that!";
  }elseif($n===1 || $n===0){
    return $n; 
  }
  
  $first = 0;
  $second = 1;
  $current = 1;
  
  for($i=1; $i < $n; $i++){
    $current = $first + $second;
    $first = $second;
    $second = $current;
  }
  
  return $current;  
}

echo fib2(10);


