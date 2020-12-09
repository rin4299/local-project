<?php
    session_start();
    // get the id from URL
    $id_string = $_REQUEST["q"];
    $find_ques = false;
    if(isset($_SESSION['id'])){
        for ($x = 0; $x < 10;$x++){
            if ($_SESSION['id'][$x] == $id_string){
                $_SESSION['id'][$x] = -1; // remove id and set value = -1;
                $find_ques = true;
            }    
        }
        if ($find_ques == false){
            // thong bao ques khong co trong test
        }
    } else {
        // thong bao chưa có ques nao trong test
    }
    // echo $id_string;
?>