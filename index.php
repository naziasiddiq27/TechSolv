<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <style>
        form{
            max: width 600px;
            margin:0 auto;
        }
        label, input, textarea{
            display:block;
            width:100%;
            margin-bottom:10px;
        }
        input[type= "submit"]{
            width:auto;
        }
    </style>
</head>
<body>
    <form acion= "process_form.php" method="post">
        <label for= "name">Full Name:</label>
        <input type="text" id = "name" name="name" value="<?php echo isset($_POST['name'])? htmlspecialchars($_POST['name']):?>" required>

        <label for= "phone">Phone Number:</label>
        <input type = "tel" id = "phone" name = "phone" value="<?php echo isset($_POST['phone'])? htmlspecialchars($_POST['phone']):?>" required>

        <label for= "email">Email:</label>
        <input type = "email" id = "email" name = "email" value="<?php echo isset($_POST['email'])? htmlspecialchars($_POST['email']):?>" required>
    
        <label for= "subject">Subject:</label>
        <input type = "text" id = "subject" name = "subject" value="<?php echo isset($_POST['subject'])? htmlspecialchars($_POST['subject']):?>" required>

        <label for= "message">message:</label>
        <input type = "message" id = "message" name = "message" value="<?php echo isset($_POST['message'])? htmlspecialchars($_POST['message']):?>" required>

<input type="submit" value="submit">
</body>
</html>