<?php
class ResetPassword {
    function resetPassword($soluong) {
        $letterUpper = "ABCDEFGHIJKLMNOQPRSTUYWVZX";
        $letterLower = "abcdefghijklmnoqprstuvwyzx";
        $number = "0123456789";
        $special = "!@#&^?$*";
        $mkmoi = array();
        $tiso = rand(1, 4) % 4;
        for($i = 0; $i < $soluong; $i++) {
            if($tiso == 1) {
                $mkmoi[$i] = $letterUpper[rand(1, 26) % 26];
                $tiso = rand(1, 4) % 4;
            } else if($tiso == 2) {
                $mkmoi[$i] = $letterLower[rand(1, 26) % 26];
                $tiso = rand(1, 4) % 4;
            } else if($tiso == 3) {
                $mkmoi[$i] = $number[rand(1, 10) % 10];
                $tiso = rand(1, 4) % 4;
            } else {
                $mkmoi[$i] = $special[rand(1, 8) % 8];
                $tiso = rand(1, 4) % 4;
            }
        }
        return $mkmoi;
    }
}
?>