<?php
/**
 * Created by PhpStorm.
 * User: Vladislav Tachev
 * Date: 10/24/2015
 * Time: 4:40 PM
 */

$d = 10;
$visited = array();
function generate_maze($dim){
    $maze = array();
    for ($i=0; $i<$dim; $i++){
        array_push($maze, array());
        for ($j=0; $j<$dim; $j++){
            if($i==0 && $j==0) array_push($maze[$i],"S"); else{
                if($i==$dim-1&&$j==$dim-1) array_push($maze[$i],"G");
                else array_push($maze[$i],"".intval(floor(rand(0,8)/8))); //make sure that the start is in the upper left corner and the goal is at the lower right corner
            }
        }
    }
    return $maze;
}
$maze = generate_maze($d);
function calc_h($i,$j,$add,$dim, $maze){
//    echo "<script>alert('hit! i=$i, j=$j, h=$h, g=$g');</script>";
    $h = $add+1;
    $g = $dim*2-$i-$j-2;
    $maze[$i][$j] = $h+$g ;
    $res = array('i'=>$i, 'j'=>$j, 'h'=>$h, 'g'=>$g);
    return $res;
}

function fetch_children($m, $n, $add, $maze, $dim, $visited){

//    if ($m-1>0 && $maze[$m-1][$n]==0) array_push($visited, calc_h($m-1,$n,$add, $dim, $maze));
//    if ($m-1>0 && $n-1>0 && $maze[$m-1][$n-1]==0) array_push($visited, calc_h($m-1,$n-1,$add, $dim, $maze));
//    if ($n-1>0 && $maze[$m][$n-1]==0) array_push($visited, calc_h($m,$n-1,$add, $dim, $maze));
//    if ($m-1>0 && $n+1<$dim && $maze[$m-1][$n+1]==0) array_push($visited, calc_h($m-1,$n+1,$add, $dim, $maze));
    if ($n+1<$dim && $maze[$m][$n+1]==0) $maze[$m][$n+1]=4;//array_push($visited, calc_h($m,$n+1,$add, $dim, $maze));
//    if ($m+1<$dim && $n-1>0 && $maze[$m+1][$n-1]==0) array_push($visited, calc_h($m+1,$n-1,$add, $dim, $maze));
    if ($m+1<$dim && $n+1<$dim && $maze[$m+1][$n+1]=='0') array_push($visited, calc_h($m+1,$n+1,$add, $dim, $maze));
    if ($m+1<$dim && $maze[$m+1][$n]=='0') $maze[$m+1][$n] = '4';//array_push($visited, calc_h($m+1,$n,$add, $dim, $maze));
}
array_push($visited,calc_h(1,1,0, $d, $maze));
fetch_children(0,0,0, $maze, $d, $visited);

//fetch_children(0,0,0,$maze,$d);
//do{
//
//}
//while(array_search(2,$visited)==false);

echo "<table border=\"1\" style=\"width:". 30*sizeof($maze)."px; height:". 30*sizeof($maze)."px;\">";
foreach ($maze as $row){
    echo "<tr>";
    foreach($row as $cell){
            echo "<td ";
            if ($cell=="G") echo "bgcolor=\"#2f2\">$cell</td>";
            elseif ($cell=="S") echo "bgcolor=\"#22f\">$cell</td>"; //the coloring doesn't want to work for the default states, so I decided to leave it out for now.
            elseif ($cell == '1') echo "bgcolor=\"#000\">$cell</td>";
            else echo "bgcolor=\"#fff\">$cell</td>";

    }
    echo "</tr>";
}
echo "</table>";

//var_dump(calc_h(4,3,7,$d, $maze));
////start
//do{
    fetch_children(0,0,-1, $maze, $d, $visited);
//    array_push($visited, calc_h(0,0,-1,$d,$maze));
//
//}
//while (!$goal_reached);

//array_push($visited, calc_h(4,3,7,$d,$maze));
//array_push($visited, calc_h(4,4,8,$d,$maze));
//array_push($visited, calc_h(4,3,5,$d,$maze));
//array_push($visited, calc_h(3,3,6,$d,$maze));
//array_push($visited, calc_h(2,3,5,$d,$maze));
var_dump($visited);
?>
<script language="JavaScript">

</script>