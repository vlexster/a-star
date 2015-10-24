<?php
/**
 * Created by PhpStorm.
 * User: Vladislav Tachev
 * Date: 10/24/2015
 * Time: 4:40 PM
 */

$d = 10;

function generate_maze($dim){
    $maze = array();
    for ($i=0; $i<$dim; $i++){
        array_push($maze, array());
        for ($j=0; $j<$dim; $j++){
            if($i==0 && $j==0) array_push($maze[$i],"S"); else{
                if($i==$dim-1&&$j==$dim-1) array_push($maze[$i],"G");
                else array_push($maze[$i],intval(floor(rand(0,8)/8))); //make sure that the start is in the upper left corner and the goal is at the lower right corner
            }
        }
    }
    return $maze;
}
function calc_h($i,$j,$add,$d){
    $h = sqrt(pow($i-1,2)+pow($j-1,2))+$add;
    $g = sqrt(pow($d-$i-1,2)+pow($d-$j-1,2));
//    $res = [$h, $g];
    return $h+$g;
}

$maze = generate_maze($d);
$known_states = array();
$current = array();

echo "<table border=\"1\" style=\"width:". 30*sizeof($maze)."px; height:". 30*sizeof($maze)."px;\">";
foreach ($maze as $row){
    echo "<tr>";
    foreach($row as $cell){
            echo "<td ";
//            if ($cell=="G") echo "bgcolor=\"#2f2\">$cell</td>";
//            elseif ($cell=="S") echo "bgcolor=\"#22f\">$cell</td>"; //the coloring doesn't want to work for the default states, so I decided to leave it out for now.
            if ($cell == 1) echo "bgcolor=\"#000\">$cell</td>";
            else echo "bgcolor=\"#fff\">$cell</td>";

    }
    echo "</tr>";
}
echo "</table>";

var_dump(calc_h(4,3,7,$d));


