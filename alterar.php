<?php
    include "conn.php";
    session_start();
    if(!isset($_SESSION['login'])){
        header('location:login.php');
    }
    if(isset($_GET['logout'])){
        session_destroy();
        header('location:index.php');
    }
?>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JIUJITSU - INTEGRATION</title>
<style>
        body{
            height:100vh;
            font-family: Arial, Helvetica, sans-serif;
            background-image: url("back.jpg");
            background-position:center top;   
            background-size:cover;
            background-repeat:no-repeat;
        }
        .box{
            background-color: rgba(0, 0, 0, 0.5);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            padding: 80px;
            border-radius: 15px;
            color: #fff;
        }
        fieldset{
            border: 3px solid #FF4500;
            margin:10px;
            padding:40px;
        }
        legend{
            border: 1px solid  #FF4500;
            padding: 10px;
            text-align: center;
            background-color: #FF4500;
            border-radius: 8px;
        }
        .inputBox{
            position: relative;
        }  
        .enter1{
            background-color: OrangeRed;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 10px;
            color: white;
            font-size: 15px;
            
        }
        .enter1:hover{
            background-color: Khaki;
            cursor: pointer;
        }
        select,input[type=text],[type=email],[type=password],[type=date] {
            border-radius: 4px;
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
            box-shadow: 1px 1px 2px #333333;
            -moz-box-shadow: 1px 1px 2px #333333;
            -webkit-box-shadow: 1px 1px 2px #333333;
            background: #cccccc;
            border: 1px solid #000000;
            margin: 1%;
            width: 47%;
            height:30px;
        }
        select:hover,input[type=text]:hover,[type=email]:hover,[type=password]:hover,[type=date]:hover {
            background: #ffffff;
            border: 1px solid #990000;
        }
    </style>
</head>
<body>
    <div class="box">
        <?php
        $idl=$conn->prepare('SELECT * FROM cadastro WHERE id_login=:pid');
        $idl->bindValue(':pid', $_SESSION['login']);
        $idl->execute();
        $rowidl=$idl->fetch();
        $id=$conn->prepare('SELECT * FROM endereco WHERE id_login=:pid');
        $id->bindValue(':pid', $_SESSION['login']);
        $id->execute();
        $rowid=$id->fetch();
        $idc=$conn->prepare('SELECT * FROM `login` WHERE id_login=:pid');
        $idc->bindValue(':pid', $_SESSION['login']);
        $idc->execute();
        $rowidc=$idc->fetch();
        if(isset($_GET['altera'])){
        ?>
        <form action="index.php" method="POST">
        <fieldset>
            <legend><b>CADASTRO</b></legend>
        <div class="row">
                <input type="hidden" name="id_cad" value="<?php  echo $rowidl['id_cad'];?>">
                <input type="text" name="nome" placeholder="Nome" maxlength="40" required value="<?php  echo $rowidl['nm_cad'];?>"/>
                <input type="text" name="cpf" placeholder="CPF" maxlength="11" required value="<?php  echo $rowidl['cpf'];?>"/><br/>
                Escolha um perfil:
                <select name="id_tipo" style="size:200px">
                <?php
                include "conn.php";
                $exibir=$conn->prepare('SELECT * FROM `perfil`');
                $exibir->execute();
                while($row=$exibir->fetch()){
                    echo "<option value='".$row['id_perfil']."'>".$row['nm_perfil']."</option>";
                }
                ?>
            </select><br/>
            Selecione um gênero: 
                        <select name="sexo">
                            <option value="M">
                                Masculino
                            </option>
                            <option value="F">  
                                Feminino
                            </option>
                        </select><br/>
            Qual é a sua faixa:
            <select name="id_faixa">
                <?php
                include "conn.php";
                $exibir=$conn->prepare('SELECT * FROM `faixa`');
                $exibir->execute();
                while($row=$exibir->fetch()){
                    echo "<option value='".$row['id_faixa']."'>".$row['cor_faixa']."</option>";
                }
                ?>
            </select><br/> 
             Data de nascimento:
            <input type="date" name="dt_nasc" placeholder="DT Nascimento" maxlength="8" required value="<?php  echo $rowidl['dt_nasc'];?>"/><!-nao consegui limitar a 8 caracter-><br/>
            <input type="text" name="tele_res" placeholder="Telefone Residencial" maxlength="15" value="<?php  echo $rowidl['tel'];?>"/>
            <input type="text" name="tele_cel" placeholder="Telefone Celular" maxlength="15" required value="<?php  echo $rowidl['cel'];?>"/><br/>
            <input type="email" name="email" placeholder="E-mail" required value="<?php  echo $rowidl['email'];?>"/>
            <input type="hidden" name="id_endereco" value="<?php  echo $rowid['id_end'];?>">
            <input type="text" name="cep" id="cep" onblur="pesquisacep(this.value);" placeholder="CEP" maxlength="15" required value="<?php  echo $rowid['cep'];?>"/><br/>
            <input type="text" name="rua" id="rua" placeholder="Rua" maxlength="100" required  style="width:75%" value="<?php  echo $rowid['rua'];?>"/>
            <input type="text" name="numero" placeholder="Número" maxlength="10"required style="width:19%" value="<?php  echo $rowid['num'];?>"/><br/>
            <input type="text" name="complemento" placeholder="Complemento" maxlength="200" required style="width:97%" value="<?php  echo $rowid['complem'];?>"/><br/>
            <input type="text" name="bairro" id="bairro" placeholder="Bairro" maxlength="80" required value="<?php  echo $rowid['bairro'];?>"/>
            <input type="text" name="cidade" id="cidade" placeholder="Cidade" maxlength="80"required value="<?php  echo $rowid['cidade'];?>"/><br/>
            <input type="text" name="uf" id="uf" placeholder="UF" maxlength="2" required value="<?php  echo $rowid['uf'];?>"/> 
            <input type="hidden" name="id_login" value="<?php  echo $rowidc['id_login'];?>">
            <input type="text" name="apelido" placeholder="Apelido" maxlength="40" required value="<?php  echo $rowidc['nm_login'];?>"/><br/>
            <input type="text" name="user" placeholder="Usuário" maxlength="40" required value="<?php  echo $rowidc['user_login'];?>"/>
            <input type="password" name="senha" placeholder="Senha" maxlength="40" required /><br/>
            </div>
            <input type="submit" name="alterar" class="enter1" value="ALTERAR"/><br/></br/>
            <a href="index.php" class="enter1">Voltar</a>
            <?php
        $exi=$conn->prepare('SELECT * FROM `login` WHERE id_login=:pid');
        $exi->bindValue(':pid', $_SESSION['login']);
        $exi->execute();
        if($exi->rowCount()==0){
            echo "Não há registros";
        }else{
            while($row=$exi->fetch()){
                echo "<a class='enter1' href='excluir.php?aviso&id=".$row['id_login']."&nome=".$row['nm_login']."'>Excluir</a>";
        
            }
        }
        ?>
        </fieldset>
        </form>
        
        </div>
        <?php
            }
        ?>
    </div>
    <?php
    if(isset($_GET['aviso'])){
    $id=$_GET['id'];
    $nome=$_GET['nome'];
    ?>
    <div class="row" >
    Deseja excluir <?php echo $nome; ?>?<br/>";
    <a href='alterar.php?excluir&id=$id&nome=".$nome."'>Sim</a> ";
    <a href='alterar.php'>Não</a>";
    </div>
    <?php
}
?>
</body>
</html>
<?php
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