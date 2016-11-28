<?php

function countingSort($unsorted, $min, $max){

  $countedElements = [];
  $sortedArray = [];
  
  for($i = $min; $i <= $max ;$i++){
    $countedElements[$i] = 0;  
  }
  
  foreach($unsorted as $value){
    $countedElements[$value]++;
  }
  
  foreach($countedElements as $key=>$value){
    if($countedElements[$key]){
      for($repeat = 0; $repeat < $value; $repeat++){
        $sortedArray[] = $key; 
      }
    }
  }  

  return $sortedArray;
}

$unsortedArray = [3,6,5,7,3,8,9,4,2,8,1,0,0,3,5];
$sortedArray = countingSort($unsortedArray, 0, 9);
print_r(array_values($sortedArray));


