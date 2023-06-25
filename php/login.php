<?php
    // strting php session for the current user
    session_start();
    // inclusing db config for establishing mysql database connection
    include_once "config.php";
    // fetching user filled form data
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    // validating user credentials
    if(!empty($email) && !empty($password)){// if user filled up login form
    // validating user credentials from mysql db
        $query1 = "select * from users where email='{$email}'";
        $sql1 = mysqli_query($conn, $query1);
        if($sql1){// if query executed successfully
            if(mysqli_num_rows($sql1) > 0){// user credentials exists
                $row = mysqli_fetch_assoc($sql1);// storing the user info stored in db in an associative array
                if(password_verify($password, $row['password'])){// if hashed password matches with the hashed entered password
                    $query2 = "update users set status = 'Active now' where unique_id = {$row['unique_id']}";
                    $sql2 = mysqli_query($conn, $query2);
                    if($sql2){// if sql query executed successfully
                        // creating session variable for the current user
                        $_SESSION['unique_id'] = $row['unique_id'];
                        echo "success";
                    }else{
                        exit("A fatal server error encountered! Please re-try after sometime!");
                    }
                }else{
                    echo "Invalid password! Please re-try again!";
                }
            }else{
                echo "Invalid user credentials! User not registered!";
            }
        }else{
            echo "A fatal server error encountered! Please re-try after sometime!";
        }
    }else{
    echo "All fields marked with '*' are compusory!";
    }
?>