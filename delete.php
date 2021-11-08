<?php 
    require_once 'db/conn.php';

    if(!$_GET['id']){
        include 'includes/errormessage.php';
        header("Location: viewrecords.php");
    }
    else{
        //get id values
        $id = $_GET['id'];

        //call delete function
        $result = $crud->DeleteAttendee($id);
        //redirect to list
        if($result){
            header("Location: viewrecords.php");
        }
        else{
            include 'includes/errormessage.php';
        }
    }


?>