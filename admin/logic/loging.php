<?php 

    require("common.php"); 
    session_start();
     
    $submitted_username = ''; 
     
    if(!empty($_POST)) 
    { 
        $query = " 
            SELECT 
                id_user, 
                username,
                ime,
                prezime,
                lozinka, 
                salt, 
                email,
                last_login
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
         
        $login_ok = false; 
         
        $row = $stmt->fetch(); 
        if($row) 
        { 
            $check_password = hash('sha256', $_POST['password'] . $row['salt']); 
            for($round = 0; $round < 65536; $round++) 
            { 
                $check_password = hash('sha256', $check_password . $row['salt']); 
            } 
             
            if($check_password === $row['lozinka']) 
            { 
                $login_ok = true; 
            } 
        } 
         
        if($login_ok) 
        { 
            unset($row['salt']); 
            unset($row['lozinka']); 
             
            $_SESSION['user'] = $row;
            $_SESSION['ime'] = $row['ime'];
            $_SESSION['timeout'] = time();
            $_SESSION['errMsg'] = '';
            $_SESSION['lastLogin'] = $row['last_login'];
            
            $update = " 
            UPDATE users
            SET last_login = :last_login
            WHERE id_user = :id_user
        "; 
         
        $update_params = array( 
            //curent timestamp
            ':last_login' =>  $_SERVER['REQUEST_TIME']  ,
            ':id_user' => $row['id_user']
        ); 
         
        try 
        { 
            $stmt = $db->prepare($update); 
            $result = $stmt->execute($update_params); 
        } 
        catch(PDOException $ex) 
        { 
            die("Failed to run query: " . $ex->getMessage()); 
        } 
             
            header("Location: ../dashboard.php"); 
            die("Redirecting to: dashboard.php"); 
        } 
        else 
        { 
            echo '<script type="text/javascript">alert("Neispravni podaci!");</script>';
            $_SESSION['errMsg'] = 'Neispravni podaci!';
        header('Location: ../login.php');
            die("Redirecting to: login.php");
            $submitted_username = htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8'); 
        } 
    } 
     
?>