<?php
$manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");


if (isset($_POST['submit'])) {
    $input_name = $_POST['username'];
    $input_password = $_POST['password'];


    $filter = ['username' => '$input_name']; 
    $options = [];
    $query = new MongoDB\Driver\Query($filter, $options);
    $cursor = $manager->executeQuery('GymnasieArbete.users', $query);
    echo "1";

    foreach ($cursor as $document) {
        $document->username;
        $hash =  $document->user_password;
        $id = $document->_id;
        //echo $hash;
        echo "2";


        //var_dump($document);
        if (password_verify($input_password, $hash)) {
            //echo $hash;
            session_start();
            $_SESSION["username"] = $input_name;
            $_SESSION["user_id"] = $id;
            echo "3 Det funkar om du kan läsa detta";

            //header("Location: ..\home.php");
        } else {
            //header("location: index.php?error=none");
            echo "Incorrect username or password";
        }
    } 
    echo "test";
}



/*
    $stmt = $con->prepare("SELECT id, username, user_password from account where username = ?");
    $stmt->bind_param("s", $input_name);
    $stmt->execute();
    $result = $stmt->get_result();

    if (mysqli_num_rows($result) > 0) {
        $obj = mysqli_fetch_assoc($result);
        $name = $obj['username'];
        $id = $obj['id'];
        $hash = $obj['user_password'];

        $db = $manager->GymnasieArbete;
        
        $cursor = $db->users->find([
            'username' => '$input_name',
            'user_password' => '$input_password'
        ]);

        foreach ($cursor as $document) {
            echo $document->username;

        }
        

/*

        if(password_verify($input_password, $hash)){
           echo $hash;
            session_start();
            $_SESSION["username"] = $input_name;
            $_SESSION["user_id"] = $id;
            header("location: ../feathers/home.php");

        }else{
            header("location: index.php?error=none");
           // echo "no account found by the name " . $input_name. " pleas try again ";
        }
         
    } else {
        header("location: index.php?error=none");
        //echo "no account found, incorrect password or username";
    }
    
    $con->close();
*/
