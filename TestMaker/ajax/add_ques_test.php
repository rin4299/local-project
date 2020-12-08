<?php
    // get the q parameter from URL
    $id_string = $_REQUEST["q"];
    if(isset($_SESSION['id'])){
        $_SESSION['id'].= ' , '.$id_string;
    } else {
        $_SESSION['id']=$id_string;
    }
    echo $id_string;
?>