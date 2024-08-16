<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>JIUJITSU - INTEGRATION</title>
    <style>
        .linha{
            width: 100%;
            height: auto;
            background-image: url("logo.jpg");
            overflow: hidden;
            margin: auto;
            text-align: center;
            margin: -4px;
        }
        .cont{
            width: 40%;
            height: auto;
            float:left;
        }
        .cont1{
            width: 30%;
            height: auto;
            float:left;
        }
        .cont2{
            width: 100%;
            height: auto;
            float:left;
            text-align:center;
            border: 10px solid black;
            background-color: white;
        }
        .box img{
            width: 90%;
            border: 5px solid black;
        }
    </style>
</head>
<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70">
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">JIUJITSU - Integration<span class="dot">.</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="alterar.php?altera&id_aluno='id_aluno'">Meu cadastro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="videos.php">Vídeos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Fórum</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="linha">
    <div class="cont1">
    <h1></h1>
    </div>
    <div class="cont">
        <?php
            pilha($id=100);
            function pilha($id_cad){
                for($i=0;$i<$id_cad;$i++){
                    include "conn.php";
                    $exibir=$conn->prepare('SELECT * FROM video WHERE id_video = :pid');
                    $exibir->bindValue(':pid',$i);
                    $exibir->execute();
                    $row=$exibir->fetch();
                    if($exibir->rowCount()==0){
                        echo "";
                    }else{  
                        ?>
                        <div class="cont2">
                          <h1><?php echo $row['nm_video'];?></h1> 
                        </div>   
                        <div class="box img">
                            <img src="<?php echo $row['url_video'];?>"/><br/>
                        </div>
                        <?php
                    }
                }
            }
            ?>
        </div>
        <div class="cont1">
        <h1></h1>
        </div>
    </div>

    <section id="services" class="text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="intro">
                        <h1>JIUJITSU - INTEGRATION</h1><hr/>
                        <p class="mx-auto">É um site que irá abrir seus olhos e clarear seu entendimento
                            sobre o jiujitsu. Nosso objetivo é fazer com que a plataforma otimize
                            o aprendizado e o desenvolvimento técnico de quem pratica a arte
                            suave. Através de vídeos com explicações detalhadas, o aluno
                            poderá se orientar melhor em seu aprendizado e evolução.</p>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="service">
                        <img src="img/icon4.png" alt="">
                        <h5>Vídeos</h5>
                        <p>Os melhores vídeos de treinamento de acordo com a sua faixa você encontra aqui.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service">
                        <img src="img/icon6.png" alt="">
                        <h5>Fórum</h5>
                        <p>Entre contato com os professores e outros praticantes de Jiujitsu, troca de informações, aprendizagem e crescimento!</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service">
                        <img src="img/icon3.png" alt="">
                        <h5>Meu cadastro</h5>
                        <p>Acesso fácil a suas informações, compartilhamento e alterações de dados quando precisar!</p>
                    </div>
                </div> 
            </div>
        </div>
    </section>

    <section class="bg-light" id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="intro">
                        <h1>CONHEÇA NOSSO MUNDO!</h1>
                        <p class="mx-auto">
                            1.Se ainda não conhece a plataforma, cadastre-se e aproveite!
                            <hr/>
                            2.Jiujitsu: evolução técnica, mental e pessoal!</p>
                    </div>
                </div>
            </div>
        </div>
    <section id="blog">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="intro">
                        <h1>Fórum</h1><hr/>
                        <p class="mx-auto">Dicas, informações, eventos, e tudo mais do mundo do Jiujitusu você encontra aqui, seja bem vindo (a) !</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <article class="blog-post">
                        <img src="img/project5.jpg" alt="">
                        <a href="#" class="tag"> CBJJ</a>
                        <div class="content">
                            <small>28 NOV, 2022</small>
                            <h5>Site da CBJJ do Brasil</h5>
                            <p>Site oficial da Confedereção Brasileira de Jiujitsu.
                            Acesse em: https://cbjj.com.br/
                            </p>
                        </div>
                    </article>
                </div>
                <div class="col-md-4">
                    <article class="blog-post">
                        <img src="img/project4.jpg" alt="">
                        <a href="#" class="tag">SUPER INTERESSANTE</a>
                        <div class="content">
                            <small>10 NOV, 2022</small>
                            <h5>Como surgiu o jiu-jitsu brasileiro e quais suas inovações?</h5>
                            <p>Uma reportagem  Por Milly Lacombe  
                            Leia mais em: https://super.abril.com.br/historia/como-surgiu-o-jiu-jitsu-brasileiro-e-quais-suas-inovacoes/</p>
                        </div>
                    </article>
                </div>
                <div class="col-md-4">
                    <article class="blog-post">
                        <img src="img/project2.jpg" alt="">
                        <a href="#" class="tag">LOJA DO KIMONO</a>
                        <div class="content">
                            <small>01 DEZ, 2022</small>
                            <h5>Somos Autorizados da marca In The Guard!</h5>
                            <p>Surgimos no ano de 2007 diante da falta de opções e a necessidade de comprar produtos de 
                            alta qualidade para os treinos encontrada pelo empresário e atleta de Muaythai, Jiu Jitsu e Kick Boxing Henrique Sorriso.
                            Acesse em: https://www.lojadokimono.com/quem-somos
                        </p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="footer-top text-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h4 class="navbar-brand">JIUJITSU - Integration<span class="dot">.</span></h4>
                        <p>Uma arte milenar que conquista cada vez mais pessoas, venha fazer parte deste mundo também, seja um lutador(a) de JiuJitsu - Integration.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom text-center">
            <p class="mb-0">Copyright - Designer 2022. All rights Reserved</p>
        </div>
    </footer>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/app.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>


