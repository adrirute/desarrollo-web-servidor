<?php

$arr = [];


for($i=1; $i<=10; $i++) {
    //$numAl = rand(0,100);
    //array_push($arr, $numAl);
    $arr[$i] = rand(0,100);
}


?>

<ul>
    <?php
    foreach($arr as $array){
        echo "<li> $array </li>";
    }
    ?>
</ul>

<br><br>

<?php
array_multisort($arr, SORT_ASC);
?>
<ul>
    <?php
    foreach($arr as $array){
        echo "<li> $array </li>";
    }
    ?>
</ul>

<BR></BR>

<?php
array_multisort($arr, SORT_DESC);
?>
<ul>
    <?php
    foreach($arr as $array){
        echo "<li> $array </li>";
    }
    ?>
</ul>