<?php 

session_start(); 
include "db_connection.php";

if (isset($_POST['email']) && isset($_POST['password'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

   
    $email = validate($_POST['email']);

    $pass = validate(md5($_POST['password']));

    if (empty($email)) {

        header("Location: index.php?error=Email is required");

        exit();

    }else if(empty($pass)){

        header("Location: index.php?error=Password is required");

        exit();

    }else{

        $sql = "SELECT * FROM users WHERE email='$email' AND password='$pass'";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            print_r($row);

                $_SESSION['email'] = $row['email'];

                $_SESSION['first_name'] = $row['first_name'];

                $_SESSION['last_name'] = $row['last_name'];

                $_SESSION['user_id'] = $row['user_id'];

                $_SESSION['user_level'] = $row['level'];

            if($row['level'] == 1){
                echo "admin";
                header("Location: admin-page.php");
            }
            elseif ($row['level'] == 2){
                echo "user";
                header("Location: home.php");
            }
            else{

                header("Location: index.php?error=Incorect User name or password");

                exit();

            }

        }else{

            header("Location: index.php?error=Incorect User name or password");

            exit();

        }

    }

}else{

    header("Location: index.php");

    exit();

}

?>