<html lang="pt-br">
<head>
<meta charset="UTF-8"/>
		<title>JIUJITSU INTEGRATION</title>
		<meta name="viewport" content="width:device-width,initial-scale=1"/>
        <link rel="stylesheet" href="formulario.css">
<script>
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };
</script>

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

    </style>
</head>
<body>
    <div class="box">
    <form action="cadastro.php" method="POST">
            <fieldset>
                <legend><b>CADASTRO</b></legend>
                <div class="row">
                        <input type="text" name="nome" placeholder="Nome" maxlength="40" required />
                        <input type="text" name="cpf" placeholder="CPF"  id="cpf" required /><br/>
                        Escolha um perfil:
                        <select name="id_perfil" style="size:10px">
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
                        <select name="sexo" >
                            <option value="M">
                                Masculino
                            </option>
                            <option value="F">  
                                Feminino
                            </option>
                        </select><br/>
                        Qual sua faixa se possui   
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
                        <input type="date" name="dt_nasc" placeholder="DT Nascimento" maxlength="8" style="200px"required/><br/>
                        <input type="text" name="tele_res" placeholder="Telefone Residencial" maxlength="15"/>
                        <input type="text" name="tele_cel" placeholder="Telefone Celular" maxlength="15" required/><br/>
                        <input type="email" name="email" placeholder="E-mail" required/>
                        <input type="text" name="cep" id="cep" onblur="pesquisacep(this.value);" placeholder="CEP" maxlength="15" /><br/>
                        <input type="text" name="rua" id="rua" placeholder="Rua" maxlength="100" style="width:75%" required/>
                        <input type="text" name="numero" placeholder="Número" maxlength="10" style="width:19%" required/><br/>
                        <input type="text" name="complemento" placeholder="Complemento" maxlength="200" required style="width:97%"/><br/>
                        <input type="text" name="bairro" id="bairro" placeholder="Bairro" maxlength="80" required/>
                        <input type="text" name="cidade" id="cidade" placeholder="Cidade" maxlength="80"required/><br/>
                        <input type="text" name="uf" id="uf" placeholder="UF" maxlength="2" required/>
                        <input type="text" name="apelido" placeholder="Apelido" maxlength="40" required/><br/>
                        <input type="text" name="user" placeholder="Usuário" maxlength="40" required/>
                        <input type="password" name="senha" placeholder="Senha" maxlength="40" required/><br/>
                    </div>
                <input type="submit" name="grava" value="Enviar" class="enter1"/>
                <br/><br/>
                <a href="login.php" class="enter1">Voltar</a>
            </fieldset>
        </form>
    </div>
</body>
</html>
<?php
    include "conn.php";
        if(isset($_POST['grava'])){
        $apelido=$_POST['apelido'];
        $user=$_POST['user'];
        $senha=md5($_POST['senha']);
        $grava=$conn->prepare('INSERT INTO `login` (`id_login`, `nm_login`, `user_login`, `senha_login`) VALUES (NULL, :papelido, :puser, :psenha);');
        $grava->bindValue(':papelido',$apelido);
        $grava->bindValue(':puser',$user);
        $grava->bindValue(':psenha',$senha);
        $grava->execute();
        $id_login=$conn->lastinsertid();
        $cep=$_POST['cep'];
        $rua=$_POST['rua'];
        $numero=$_POST['numero'];
        $complemento=$_POST['complemento'];
        $bairro=$_POST['bairro'];
        $cidade=$_POST['cidade'];
        $uf=$_POST['uf'];
        $grava=$conn->prepare('INSERT INTO `endereco` (`id_end`, `cep`, `rua`, `num`, `complem`, `bairro`, `cidade`, `uf`, `id_login`) VALUES (NULL, :pcep, :prua, :pnumero, :pcomplemento, :pbairro, :pcidade, :puf, :pid_login);');
        $grava->bindValue(':pcep',$cep);
        $grava->bindValue(':prua',$rua);
        $grava->bindValue(':pnumero',$numero);
        $grava->bindValue(':pcomplemento',$complemento);
        $grava->bindValue(':pbairro',$bairro);
        $grava->bindValue(':pcidade',$cidade);
        $grava->bindValue(':puf',$uf);
        $grava->bindValue(':pid_login',$id_login);
        $grava->execute();
        $nome=$_POST['nome'];
        $sexo=$_POST['sexo'];
        $dt_nasc=$_POST['dt_nasc'];
        $cpf=$_POST['cpf'];
        $tele_res=$_POST['tele_res'];
        $tele_cel=$_POST['tele_cel'];
        $email=$_POST['email'];
        $id_perfil=$_POST['id_perfil'];
        $id_faixa=$_POST['id_faixa'];
        $id_endereco=$conn->lastinsertid();
        $grava=$conn->prepare('INSERT INTO `cadastro` (`id_cad`, `nm_cad`, `sexo_cad`, `dt_nasc`, `cpf`, `tel`, `cel`, `email`, `id_login`, `id_perfil`, `id_faixa`, `id_end`) VALUES (NULL, :pnome, :psexo, :pdt_nasc, :pcpf, :ptele_res, :ptele_cel, :pemail, :pid_login, :pid_perfil, :pid_faixa, :pid_endereco);');
        $grava->bindValue(':pnome',$nome);
        $grava->bindValue(':psexo',$sexo);
        $grava->bindValue(':pdt_nasc',$dt_nasc);
        $grava->bindValue(':pcpf',$cpf);
        $grava->bindValue(':ptele_res',$tele_res);
        $grava->bindValue(':ptele_cel',$tele_cel);
        $grava->bindValue(':pemail',$email);
        $grava->bindValue(':pid_login',$id_login);
        $grava->bindValue(':pid_perfil',$id_perfil);
        $grava->bindValue(':pid_faixa',$id_faixa);
        $grava->bindValue(':pid_endereco',$id_endereco);
        $grava->execute();
        echo "ENVIADO!";
    }
?>