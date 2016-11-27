<?php
        //Fastest way to sort array

function mergeSort($arrayToSort){
    if(sizeof($arrayToSort) < 2){
        return $arrayToSort;
    }

    $lengthToSort = sizeof($arrayToSort);
    $halfIndex = intval($lengthToSort/2);
    
    $sortedLeft = mergeSort(array_slice($arrayToSort, 0, $halfIndex));
    $sortedRight = mergeSort(array_slice($arrayToSort, $halfIndex));

    $sortedArray = [];
    $leftIndex = 0;
    $rightIndex = 0;

    for($currentIndex = 0; $currentIndex < $lengthToSort; $currentIndex++){
        if($leftIndex < sizeof($sortedLeft) 
                && 
           ($rightIndex >= sizeof($sortedRight) || $sortedLeft[$leftIndex] < $sortedRight[$rightIndex])
        ){
            $sortedArray[$currentIndex] = $sortedLeft[$leftIndex];
            $leftIndex++;
        } else {
            $sortedArray[$currentIndex] = $sortedRight[$rightIndex];
            $rightIndex++;
        }
    }
    
    return $sortedArray;
}

$unsortedArray = [8,3,9,2,6,4,0,1,5,7,11];

print_r(array_values(mergeSort($unsortedArray)));

