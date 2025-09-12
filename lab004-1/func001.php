<?php
    function getPower3($v){ // ประกาศฟังชนัก์รบั พารามิเตอร์ชืÉอ v
        return $v * $v * $v; // เอา v มาคูณกนั สามครั้งแลว้ return กลบัไป
    }
    $a = 7;
    $b = 56;
    $c = 187;
    echo "<br>".$a."^3 = ".getPower3($a); // เอา a ยกกาํลงัสาม
    echo "<br>".$b."^3 = ".getPower3($b); // เอา b ยกกาํลงัสาม
    echo "<br>".$c."^3 = ".getPower3($c); // เอา c ยกกาํลงัสาม
?>