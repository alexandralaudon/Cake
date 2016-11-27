<?php
        //https://www.interviewcake.com/question/java/find-rotation-point

function findRotationIndex($words){
    
    $floorIndex = 0;
    $ceilingIndex = intval(sizeof($words)) - 1;
    
    while($floorIndex+1 < $ceilingIndex){
        $midIndex = getMidIndex($floorIndex, $ceilingIndex);
        if($words[$midIndex] > $words[0]){
            $floorIndex = $midIndex;
        }else{
            $ceilingIndex = $midIndex;
        }
        
        if($floorIndex+1 == $ceilingIndex){
            break;
        }
    }
    
    return $ceilingIndex;
}

function getMidIndex($floor, $ceiling){
    $distance = $floor + intval(($ceiling - $floor)/2);
    //echo "The Distance is " .$ceiling. " - " .$floor. "and distance = ".$distance;
    return $distance;
}

$words = [
    "ptolemaic",
    "retrograde",
    "supplant",
    "undulate",
    "xenoepist",
    "asymptote", // <-- rotates here!
    "babka",
    "banoffee",
    "engender",
    "karpatka",
    "othellolagkage"
];

echo "The Rotation Index is " .findRotationIndex($words). "\n";

