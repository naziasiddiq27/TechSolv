<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name = trim($_POST['name']);
    $phone =trim($_POST['phone']);
    $email = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $message trim($_POST['message']);

    $errors = [];

    if(empty($name)){
        $errors[] = 'Full Name required.';
    }
    if(empty($phone)|| !preg_match('/^\+?[0-9\s\-]{7,15}$/',$phone)){
    $errors[] = 'A valid phone number is required';
    }
    if(empty($email)|| !filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors[] = 'A valid email is required.'
    }
    if(empty($subject)){
        $errors[]= 'Subject is required.'
    }
    if(empty($message)){
        $errors[]= 'message is required.'
    }

    if(empty($errors)){
        $uservername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "test";

        $conn = new mysqli($uservername, $username, $password, $dbname);

        if($conn-> connect_error){
            die("Connection failed:".$conn->connect_error);
        }

        $stmt = $conn->prepare("insert into contact_form(name,phone,email,subject,message,ip_address,submission_time) values(?,?,?,?,?,?,?)");

        $stmt->bind_param("sssssss", $name, $phone, $email, $subject, $message, $_SERVER['REMOTE_ADDR'], date('Y-m-d H:i:s'));

        if($stmt-> execute()){
            $to = "naziasiddique27@gmail.com";
            $subject = "New Contact From Submission";
            $body = "You have received a new message from $name.\n\n"

            "Phone: $phone\n".
            "Email: $email\n".
            "Subject: $subject\n\n".
            "Message: \n $message";

            $headers = "From: no-reply@example.com";
             mail($to,$subject, $body, $headers);
             echo "Thank you for your message";

        } else{
            echo "Error:".$stmt->error;
        }

        $stmt->close();
        $conn->close();
    }else{
        foreach($error as $error){
            echo"<p style='color:red;'>$error</p>";
        }
    }

    }

?>