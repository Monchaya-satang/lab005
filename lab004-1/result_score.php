<?php
    $score = $_GET["score"];
    if ($score <= 49) {
        echo "เกรด F";
    } else if ($score >= 50 && $score <= 59) {
        echo "เกรด D";
    } else if ($score >= 60 && $score <= 69) {
        echo "เกรด C";
    } else if ($score >= 70 && $score <= 79) {
        echo "เกรด B";
    } else if ($score >= 80 && $score <= 100) {
        echo "เกรด A";
    } else {
        echo "คะแนนไม่ถูกต้อง (ควรอยู่ในช่วง 0-100)";
    }
?>