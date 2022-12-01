<?php
$m = new MongoDB\Driver\Manager("mongodb://localhost:27017");

if(isset($_POST['submit'])){

    $creat_username = $_POST['creatusername'];
    $creat_password = $_POST['creatpassword'];
    echo $creat_password;

    if($creat_username !== "" && $creat_password !== "") {
        /*$stmt = $con->prepare("SELECT id, username, user_password from account where username = ?");
        $stmt->bind_param("s", $creat_username);
        $stmt->execute();
        $result = $stmt->get_result();
    */
            $hash_password = password_hash($creat_password, PASSWORD_DEFAULT);//: string
            $bulk = new MongoDB\Driver\BulkWrite();

                    $doc = [
            
                        'username' => "{$creat_username}",
            
                        'user_password' => "{$hash_password}"
                    ];
            
                    $bulk->insert($doc);
            
                    $manager = new MongoDB\Driver\Manager('mongodb://localhost:27017');
            
                    $result = $manager->executeBulkWrite('GymnasieArbete.users', $bulk);
            //$insert_account = "insert into account (username, user_password) values('$creat_username', '$hash_password')";
            //$append_account = mysqli_query($con, $insert_account);
            header("location: ../index.php");
            
        /*}else{
            header("location: ../creat-account/creat-loggin.php?error=invalid");
            //echo "username already exist";
        */

    } else {
            header("location: ../creat-account/creat-loggin.php?error=empty");
    }

}   


$con->close();