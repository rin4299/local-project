<?php
    session_start();
    // get the id from URL
    $id_string = $_REQUEST["q"];
    // if(isset($_SESSION['id'])){
    //     $_SESSION['id'].= ' , '.$id_string;
    // } else {
    //     $_SESSION['id']=$id_string;
    // }
    if (isset($_SESSION['id'])){
        for($x = 0; $x < 10; $x++){
            if ($_SESSION['id'][$x] == -1){
                $_SESSION['id'][$x] = $id_string;
                break;
            }
            else {
                // xu li khi ques trong test đã đầy nhưng vẫn add vào 
                // thông báo là ques trong test đã đầy
            }
        }
    } else {
        $_SESSION['id'] = array_fill(0,10,-1); // initial value = -1 and test have 10 questions
        $_SESSION['id'][0] = $id_string;
    }
    // echo $id_string;
?>