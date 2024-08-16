<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN LUTA</title>
    <style>
        body{
            height:100vh;
            font-family: Arial, Helvetica, sans-serif;
            background-image: url("img_1.jpg");
            background-position:center top;   
            background-size:cover;
            background-repeat:no-repeat;
        }
        div{
            background-color: rgba(0, 0, 0, 0.5);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            padding: 80px;
            border-radius: 15px;
            color: #fff;
        }
        input{
            padding: 15px;
            border: none;
            outline: none;
            font-size: 15px;
        }
        .enter{
            background-color: OrangeRed;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 10px;
            color: white;
            font-size: 15px;
            
        }
        .enter:hover{
            background-color: Khaki;
            cursor: pointer;
        }
        a:visited{
            color:white;
        }
    </style>
</head>
<body>
    <div>
        <h1>Login</h1>
        <form action="login.php" method="post">
            <input type="text" name="user" placeholder="Usuário"/><br/><br/>
            <input type="password" name="senha" placeholder="Senha"/><br/>
            <br/>
            <input type="submit" class="enter" name="login" value="Logar"/><br/>
                Não possui conta? 
            <a href="cadastro.php">Criar conta</a></br>
            <?php
              include "conn.php";
        if(isset($_GET['excluir'])){
            $id=$_GET['id'];
            $nome=$_GET['nome'];
            $excluir=$conn->prepare('DELETE FROM `login` WHERE id_login = :pid');
            $excluir->bindValue(':pid',$id);
            $excluir->execute();
            $excluir=$conn->prepare('DELETE FROM cadastro WHERE id_login = :pid');
            $excluir->bindValue(':pid',$id);
            $excluir->execute();
            $excluir=$conn->prepare('DELETE FROM endereco WHERE id_login = :pid');
            $excluir->bindValue(':pid',$id);
            $excluir->execute();
            echo $nome." excluído com sucesso!";
    }
    ?>
        </form>
    </div>
</body>
</html>


<?php
  
    if(isset($_POST['login'])){
        $user=$_POST['user'];
        $senha=$_POST['senha'];
        $login=$conn->prepare('SELECT * FROM `login` WHERE `user_login`=:puser AND `senha_login`=md5(:psenha);');
        $login->bindValue(':puser',$user);
        $login->bindValue(':psenha',$senha);
        $login->execute();
        if($login->rowCount()==0){
            echo"Login ou senha inválida!";
        }else{
            session_start();
            $row=$login->fetch();
            $_SESSION['login']=$row['id_login'];
            header('location:index.php');
        }
    }
?>

