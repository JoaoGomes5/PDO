<?php

if( !empty($_POST['user']) &&  !empty($_POST['password'])){


    //INFO DA CONEXÂO
    $dns= 'mysql:host=localhost;dbname=php_com_pdo';
    $user = 'root';
    $password = '';
    
    try{

        $conn = new PDO($dns, $user , $password);

            $query = "SELECT * FROM tb_users where ";
            $query .= " email = :user ";
            $query .= " AND password = :password ";


           $stmt =  $conn->prepare($query);
            $stmt->bindValue(':user', $_POST['user'] ,  );
            $stmt->bindValue(':password', $_POST['password']  );
           

            $stmt->execute();

            $user = $stmt->fetch();

            echo '<pre>';
            print_r($user);
            echo '</pre>';

           
    
    }catch(PDOException $e){
    
      echo 'Erro: ' . $e->getCode() . '<br> '. 'Mensagem: ' .  $e->getMessage();
      
    
    }

}



?>

 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
        <form action="index.php" method="POST">

                <input type="text" name="user" id="user" placeholder="User">
                <br>
                <input type="password" name="password" id="password" placeholder="Password">
                <br>
                <button type="submit">Submit</button>

        </form>
</body>
</html> 