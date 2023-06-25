<?php
    // strting php session for the current user
    session_start();
    // inclusing db config for establishing mysql database connection
    include_once "config.php";
    // fetching user filled form data
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $imgName = '';
    $imgType = '';
    $imgTempName = '';
    $imgFileExtension = '';
    $dpImgName = '';
    $userUniqueId = '';
    $formDataValidated = true;
    // form validation starts here
    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        //validating first name, last name
        if(!ctype_alpha($fname) || !ctype_alpha($lname)){
            echo "Invalid name! Please specify your valid name!";
            $formDataValidated = false;
        }
        // validating email address
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        if($formDataValidated && filter_var($email, FILTER_VALIDATE_EMAIL)){
            // checking if email id already exist in database or not
            $query1 = "select email from users where email='{$email}'";
            $sql1 = mysqli_query($conn, $query1);
            if(mysqli_num_rows($sql1) > 0){
                echo "$email already exists! You have already signed up!";
                $formDataValidated = false;
            }
        }elseif($formDataValidated && !filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "$email is not a valid email address!";
            $formDataValidated = false;
        }   
        // validating image file upload
        if($formDataValidated && isset($_FILES['displayPic']) && $_FILES['displayPic']['error']  != 4){ // if file uploaded by user
            $imgName = $_FILES['displayPic']['name']; // getting the name of the file uploaded
            $imgTempName = $_FILES['displayPic']['tmp_name']; // getting the temp_name of the file uploaded
            // getting the extension of the uploaded file
            $imgNameTokens = explode(".", $imgName);
            $imgFileExtension = strtolower(end($imgNameTokens));
            // validating the image file extension
            $extensionsAllowed = ['jpg', 'jpeg', 'png'];
            if(in_array($imgFileExtension, $extensionsAllowed) === true){
                // validating image file size
                if($_FILES['displayPic']['size'] <= 204800){// if image size is within 200kb
                    $timeStamp = time();
                    $date = date('d-m-y', $timeStamp);
                    $dpImgName = $timeStamp."_".$fname."_".$lname."_".$date.".".$imgFileExtension; // setting dp file name for the user
                }else{
                    $formDataValidated = false;
                    echo "Image size limit exceeded! Please upload an image within 200kb!";
                }
            }else{ // invalid file uploaded 
                echo "Please select a valid image file with extensions - .jpg, .jpeg or .png!";
                $formDataValidated = false;
            }   
        }elseif($formDataValidated && isset($_FILES['displayPic']) && $_FILES['displayPic']['error'] === 4){
            echo "Please upload an image file!";
            $formDataValidated = false;
        }
    }else{
        echo "All fields marked with '*' are compulsory!";
        $formDataValidated = false;
    }
    // saving the dp into the server and updating the database with validated user info
    if($formDataValidated){
        // move the dp to the display pictures folder
        $targetDir = "Display pictures/"; // setting the directory path for storing all the uploaded dps
        $targetImgUrl = $targetDir.$dpImgName; // setting the full path for storing the uploaded user dp
        if(move_uploaded_file($imgTempName, $targetImgUrl)){// if the image is succesfully stored in server folder
            $userUniqueId = rand($timeStamp, 1000000000); // generating random user unique id
            $userStatus = "Active Now"; // setting user online status
            $encryptedPasswd = password_hash($password, PASSWORD_BCRYPT); // hashed passwd
            // inserting validated user into mysql database
            $query2 = "insert into users(unique_id, fname, lname, email, password, img, status) values ('{$userUniqueId}', '{$fname}', '{$lname}', '{$email}', '{$encryptedPasswd}', '{$targetImgUrl}', '{$userStatus}')";
            $sql2 = mysqli_query($conn, $query2);
            if($sql2){ // if validated user info data inserted succesfully in database
                // creating session variable for the current user
                $_SESSION['unique_id'] = $userUniqueId;
                echo "success";
            }else{
                echo "error";
            }
        }else{
            echo "A fatal server error encountered while uploading the image! Please re-try after sometime!";
        }
    }
?>