<?php
        //https://www.interviewcake.com/question/java/find-rotation-point

# this takes O(n) time && O(n) space. Been challenged to set up as little space as possible. See next solution.
// function findFirstDuplicateInteger($integers){
//     $record = [];
    
//     try{
//         foreach($integers as $test){
//             if($record[$test] == 1){
//                 return $test;
//             }else{
//                 $record[$test] = 1;
//             }
//         }
        
//     } catch (Exception $e){
//         echo 'Caught exception: ',  $e->getMessage('No Duplicates Found'), "\n";
//     }
// }

// # this takes O(n^2) time && O(1) space. Been challenged to set up as little time as possible. See next solution.
// function findFirstDuplicateInteger($integers){
//     try {
//         for ($needle = 1; $needle <= sizeof($integers); $needle++){
//             $check = false;
//             foreach($integers as $test){
//                 if($needle == $test){
//                     if($check){
//                         return $test;
//                     }else{
//                         $check = true;
//                     }
//                 }        
//             }
//         }
        
//     } catch (Exception $e) {
//         echo 'Caught exception: ',  $e->getMessage('No Duplicates Found'), "\n";
//     }
// }

# this takes O(n lg n) time && O(1) space. Been challenged to return all duplicates. See next solution.
function findFirstDuplicateInteger($integers){
    
    $floor = 1;
    $ceiling = sizeof($integers)-1;
    
    while ($floor < $ceiling){
        $midPoint = $floor + intval(($ceiling-$floor)/2);
        $leftRangeFloor = $floor;
        $leftRangeCeiling = $midPoint;
        $rightRangeFloor = $midPoint + 1;
        $rightRangeCeiling = $ceiling;
        
        $itemsInLeftRange = 0;
        foreach($integers as $value){
            if($value >= $leftRangeFloor && $value <= $leftRangeCeiling){
                $itemsInLeftRange++;
            }
        }

        $countDistinctIntegersInLeftRange = $leftRangeCeiling - $leftRangeFloor +1;
        if($itemsInLeftRange > $countDistinctIntegersInLeftRange){
            echo $countDistinctIntegersInLeftRange. "The LOWER range is ".$leftRangeFloor. " - ". $leftRangeCeiling. ".";
            $floor = $leftRangeFloor;
            $ceiling = $leftRangeCeiling;
        }else{
            echo $countDistinctIntegersInLeftRange. "The UPPER range is ".$leftRangeFloor. " - ". $leftRangeCeiling. ".";
            $floor = $rightRangeFloor;
            $ceiling = $rightRangeCeiling;
        }
    }

    return $ceiling;
    
}

$integers  = [4,2,5,6,3,1,8,9,2,8]; 
// print_r("The first Duplicate is " .findFirstDuplicateInteger($integers). "\n");

function findAllDuplicateIntegers($integers){

    $nonDupArray = [];
    $duplicate = findFirstDuplicateInteger($integers);
    $duplicateArray[] = $duplicate;
    foreach($integers as $key => $value){
        if($duplicate !== $value){
            $nonDupArray[] = $value;
        }
    }
    $duplicate = findFirstDuplicateInteger($nonDupArray);
    $duplicateArray[] = $duplicate;
    
    return $duplicateArray;
}

$integers  = [4,2,5,6,3,1,8,9,2,8]; 
print_r(array_values(findAllDuplicateIntegers($integers)));


