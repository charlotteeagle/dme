<?php 
    require_once("../include/connect.php");
?>
<?php                                                   
    if(isset($_POST["signup"])) {  
        $username = ($_POST["username"]);                
        $password = ($_POST["password"]);  
        $firstname = ucfirst($_POST["firstname"]);      
        $lastname = ucfirst($_POST["lastname"]);    
        $email = ($_POST["email"]);                            
    } else { 
        $username = "";                                    
        $password = "";                              
        $firstname = "";                                
        $lastname ="";                                
        $email = "";                                             
    }
?>
<?php                                                   
    if(isset($_POST["signup"])) {                    
        if(empty($username)) {                             
            $message = "You need to create a username!";
        } else if(empty($password)) {
            $message = "You need to create a password!";
        } else if(empty($firstname)) {
            $message = "You didn't input your firstname!";
        } else if(empty($lastname)) {
            $message = "You didn't input your lastname!";
        }else if(empty($email)) {
            $message = "Remember to add your email address!";
        } else {                                        
            $query = "INSERT INTO users (username, password, firstname, lastname, email) VALUES ('{$username}', '{$password}', '{$firstname}', '{$lastname}', '{$email}')";
            $result = mysqli_query($connect, $query);   
            if($result) {                             
                $message = "Success! You've been registered to Bournemouth Homes";   
                header("Location:../public/index.php");
            } else {                                    
                $message = "Error, something went wrong!";
                header("Location:../public/index.php");
            }
            $username = "";                                 
            $password = ""; 
            $firstname = ""; 
            $lastname ="";
            $email = "";
        }
    }
?>