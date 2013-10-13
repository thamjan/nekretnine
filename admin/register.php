<?php 
  
    include_once 'logic/common.php';
     
    if(!empty($_POST)) 
    { 
        if(empty($_POST['username'])) 
        { 
            die("Please enter a username."); 
        } 
         
        if(empty($_POST['password'])) 
        { 
            die("Please enter a password."); 
        }
        
        if(empty($_POST['first_name'])) 
        { 
            die("Please enter a first name."); 
        } 
        
        if(empty($_POST['last_name'])) 
        { 
            die("Please enter a last name."); 
        } 
         
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
        { 
            die("Invalid E-Mail Address"); 
        } 
         
        $query = " 
            SELECT 
                1 
            FROM users 
            WHERE 
                username = :username 
        "; 
         
        $query_params = array( 
            ':username' => $_POST['username'] 
        ); 
         
        try 
        { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
            die("Failed to run query: " . $ex->getMessage()); 
        } 
         
        $row = $stmt->fetch(); 
         
        if($row) 
        { 
            die("This username is already in use"); 
        } 
         
        $query = " 
            SELECT 
                1 
            FROM users 
            WHERE 
                email = :email 
        "; 
         
        $query_params = array( 
            ':email' => $_POST['email'] 
        ); 
         
        try 
        { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
            die("Failed to run query: " . $ex->getMessage()); 
        } 
         
        $row = $stmt->fetch(); 
         
        if($row) 
        { 
            die("This email address is already registered"); 
        } 
         
        $query = " 
            INSERT INTO users ( 
                username,
                ime,
                prezime,
                lozinka, 
                salt, 
                email 
            ) VALUES ( 
                :username,
                :ime,
                :prezime,
                :lozinka, 
                :salt, 
                :email 
            ) 
        "; 
         
        $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
        $password = hash('sha256', $_POST['password'] . $salt); 
        for($round = 0; $round < 65536; $round++) 
        { 
            $password = hash('sha256', $password . $salt); 
        } 
        $query_params = array( 
            ':username' => $_POST['username'], 
            ':ime' => $_POST['first_name'], 
            ':prezime' => $_POST['last_name'], 
            ':lozinka' => $password, 
            ':salt' => $salt, 
            ':email' => $_POST['email'] 
        ); 
         
        try 
        { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
            die("Failed to run query: " . $ex->getMessage()); 
        } 
         
        header(''); 
        die("Uspesna registracija"); 
    } 
     
?> 

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Register</h1> 
<form action="register.php" method="post"> 
    Ime:<br />
    <input type="text" name="first_name" value="Damjan" /> 
    <br /><br /> 
    Prezime:<br />
    <input type="text" name="last_name" value="Veljkovic" /> 
    <br /><br /> 
    Korisničko ime:<br /> 
    <input type="text" name="username" value="damjan" /> 
    <br /><br /> 
    E-Mail:<br /> 
    <input type="text" name="email" value="thamjan@yahoo.com" /> 
    <br /><br /> 
    Lozinka:<br /> 
    <input type="password" name="password" value="xxx" /> 
    <br /><br /> 
    Ponovite lozinku:<br /> 
    <input type="password" name="password_check" value="xxx" /> 
    <br /><br /> 
    <input type="submit" value="Registracija" /> 
</form>
    </body>
</html>
