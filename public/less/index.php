<?php
if($_POST['aulaSubmit'] == "Submit")
{
    $errorMessage = "";
    
    $varEmail = $_POST['email'];
    $varLocal = $_POST['local'];
    $varData = $_POST['data'];
    $varHora = $_POST['hora'];
    $varNome = $_POST['nome'];
    $varPhone = $_POST['phone'];

    if(empty($errorMessage)) 
    {
        $fs = fopen("CadastroAulas.csv","a");
        fwrite($fs,$varNome . "\t");
        fwrite($fs,$varPhone . "\t");
        fwrite($fs,$varLocal . "\t");
        fwrite($fs,$varData . "\t");
        fwrite($fs,$varHora . "\t");
        fwrite($fs,$varEmail . "\n");
        fclose($fs);
        
        // header("Location: thankyou.html");
       // exit;
    }
}
if($_POST['emailSubmit'] == "Submit")
{
    $errorMessage = "";
    
    $varEmail = $_POST['email'];

    if(empty($errorMessage)) 
    {
        $fs = fopen("Emails.csv","a");
        fwrite($fs,$varEmail . "\n");
        fclose($fs);
        
        // header("Location: thankyou.html");
       // exit;
    }
}
if($_POST['personalSubmit'] == "Submit")
{
    $errorMessage = "";
    
    $varEmail = $_POST['email'];
    $varNome = $_POST['nome'];
    $varPhone = $_POST['phone'];

    if(empty($errorMessage)) 
    {
        $fs = fopen("CadastroPersonais.csv","a");
        fwrite($fs,$varNome . "\t");
        fwrite($fs,$varPhone . "\t");
        fwrite($fs,$varEmail . "\n");
        fclose($fs);
        
        // header("Location: thankyou.html");
       // exit;
    }
}
?>
<!DOCTYPE html>
<html lang="pt">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Alltleta conecta você a um Personal Trainer para praticar atividades físicas em grupo. Marque AGORA um Treino Funcional ao ar Livre em várias praças">
    <meta name="author" content="Alef Henrique de Castro Monteiro">
    <meta name="keywords" content="Treino funcional, Alltleta, personal trainer, treino em grupo, treino ar livre, treinamento funcional, treinamento ao ar livre, treino praça, treino belo horizonte, treinamento funcional belo horizonte">

    <title>Alltleta: Treinamento Funcional ao Ar Livre</title>

    <!-- favicon -->
    <link rel="icon" href="favicon.png">

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:200" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendor/device-mockups/device-mockups.min.css">

    <!-- Theme CSS -->
    <link href="css/new-age.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Facebook Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
    n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
    document,'script','https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '1445794568786084'); // Insert your pixel ID here.
    fbq('track', 'PageView');
    fbq('track', 'Lead');
    fbq('track', 'CompleteRegistration');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=1445794568786084&ev=PageView&noscript=1"
    /></noscript>
    <!-- DO NOT MODIFY -->
    <!-- End Facebook Pixel Code -->
</head>

<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top"> 
                    <div id="app">
                            <img src="img/app.png" id="logo_app" alt="Alltleta logo"> 
                            <img src="img/logo_alltleta.png" id="logo2_app" alt="Alltleta logo"> 
                    </div>
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="#features">Conheça o App</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#download">Download</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contato</a>
                    </li>
                    <li>
                        <a href="http://www.alltleta.com/blog">Blog</a>
                    </li>
<!--                     <li>
                        <a class="page-scroll" href="http://blog.alltleta.com">Blog da Alltleta</a>
                    </li> -->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <header>
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <div class="header-content">
                        <div class="header-content-inner">
                            <h1>Encontre um treino funcional perto de você!</h1>
                            <br>
                            <h2>Treine ao ar livre com profissionais qualificados por R$ 10,00 apenas.</h2>
                            <a href="#aula" class="btn btn-outline btn-l page-scroll" id="initBookClass" onClick="fbq('track', 'Lead');">Agende sua aula</a>
                            <br>
                            <br>
                            <br>
                            <br>
                            <h4>Você é PERSONAL TRAINER? Trabalhe conosco.</h4>
                            <a href="#personal" class="btn btn-outline btn-sm page-scroll">Sou personal</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="device-container">
                        <div class="device-mockup iphone6_plus portrait white">
                            <div class="device">
                                <div class="screen">
                                    <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                                    <img src="img/home.png" class="img-responsive" alt="Aplicativo alltleta para treinamento funcional">
                                </div>
                                <div class="button">
<!--                                     <img src="img/app.png">
 -->                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section id="aula">
        <div class="container">
            <h2 class="section-heading"> Marque agora mesmo o seu treino funcional! </h2>
            <?php
                if(!empty($errorMessage)) 
                {
                    echo("<p>There was an error with your form:</p>\n");
                    echo("<ul>" . $errorMessage . "</ul>\n");
                } 
            ?>

            <form action="index.php" method="post" id="classForm" class="container">
                <div class"row">
                    <div class="col-md-8 col-sm-12">
                        <div class="form-group" id="formLocal">
                            <h3 class="section-heading">Escolha o local em que você deseja treinar em Belo Horizonte:</h3>
                            <table>
                                <tr>
                                    <td class="inputLocal">
                                        <label>
                                            <input type="radio" name="local" id="lagoaSeca" value="Lagoa Seca do Belvedere"> 
                                            <img class="localRadio" src="img/location.png" alt="icon"> Lagoa Seca do Belvedere 
                                        </label>
                                    </td>
                                    <td class="inputLocal">
                                        <label>
                                            <input type="radio" name="local" id="pcaAssembleia" value="Praca da Assembleia"> 
                                            <img class="localRadio" src="img/location.png" alt="icon"> Praça da Assembleia 
                                        </label>
                                    </td>   
                                    <td class="inputLocal">
                                        <label>
                                            <input type="radio" name="local" id="pcaBandeira" value="Praca da Bandeira"> 
                                            <img class="localRadio" src="img/location.png" alt="icon"> Praça da Bandeira 
                                        </label>
                                    </td> 
                                </tr>    
                                <br>

                                <tr>
                                    <td class="inputLocal">
                                        <label>
                                            <input type="radio" name="local" id="pcaFloriano" value="Praca Floriano Peixoto">
                                            <img class="localRadio" src="img/location.png" alt="icon"> Praça Floriano Peixoto 
                                        </label>
                                    </td>
                                    <td class="inputLocal">
                                        <label>                             
                                            <input type="radio" name="local" id="pcaJK" value="Praca JK">
                                            <img class="localRadio" src="img/location.png" alt="icon"> Praça JK 
                                        </label>
                                    </td>
                                    <td class="inputLocal">
                                        <label>
                                            <input type="radio" name="local" id="pcaLiberdade" value="Praca da Liberdade">
                                            <img class="localRadio" src="img/location.png" alt="icon"> Praça da Liberdade 
                                        </label>
                                    </td>
                                </tr>    
                                <br>

                                <tr>
                                    <td class="inputLocal">
                                        <label>
                                            <input type="radio" name="local" id="pcaPampulha" value="Praca da Pampulha">
                                            <img class="localRadio" src="img/location.png" alt="icon"> Praça da Pampulha 
                                        </label>
                                    </td>
                                    <td class="inputLocal">
                                        <label>
                                            <input type="radio" name="local" id="pcaPapa" value="Praca do Papa" checked>
                                            <img class="localRadio" src="img/location.png" alt="icon">
                                             Praça do Papa 
                                        </label>
                                    </td>
                                    <td class="inputLocal">
                                        <label>
                                            <input type="radio" name="local" id="pcaRaul" value="Praca Raul Soares">
                                            <img class="localRadio" src="img/location.png" alt="icon"> Praça Raul Soares 
                                        </label>
                                    </td>
                                </tr>    
                                <br>

                            </table>  
                        </div>
                        <div class="form-group" id="formData">
                            <h3 class="section-heading">Escolha o dia e o horário que você deseja treinar:</h3>
                            <br>
                            <input type="date" id="dateField" name="data" required>
                            <table>
                                <tr>
                                    <td class="inputLocal">
                                        <label>
                                            <input type="radio" name="hora" id="18" value="8h" checked>
                                            <img class="localRadio" src="img/location.png" alt="icon"> 8:00h
                                        </label>
                                    </td>
                                    <td class="inputLocal">
                                        <label>
                                            <input type="radio" name="hora" id="19" value="9h">
                                            <img class="localRadio" src="img/location.png" alt="icon"> 9:00h
                                        </label>
                                    </td>
                                    <td class="inputLocal">
                                        <label>
                                            <input type="radio" name="hora" id="20" value="10h"> 
                                            <img class="localRadio" src="img/location.png" alt="icon"> 10:00h
                                        </label>
                                    </td>
                                </tr>
                                <br>
                                <tr>
                                    <td class="inputLocal">
                                        <label>
                                            <input type="radio" name="hora" id="18" value="18h" checked> 
                                            <img class="localRadio" src="img/location.png" alt="icon"> 18:00h
                                        </label>
                                    </td>
                                    <td class="inputLocal">
                                        <label>
                                            <input type="radio" name="hora" id="19" value="19h"> 
                                            <img class="localRadio" src="img/location.png" alt="icon"> 19:00h
                                        </label>
                                    </td>
                                    <td class="inputLocal">
                                        <label>
                                            <input type="radio" name="hora" id="20" value="20h"> 
                                            <img class="localRadio" src="img/location.png" alt="icon"> 20:00h
                                        </label>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>    
                    <div id="contatoPersonal" class="col-md-4 col-sm-12">
                        <h3 class="section-heading">Contato</h3>
                        <div class="form-group">
                          <label for="exampleInputEmail2">Nome</label>
                          <input type="text" name="nome" class="form-control" id="exampleInputEmail2" placeholder="Seu Nome" required>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail2">Telefone de contato</label>
                          <input type="text" name="phone" class="form-control" id="exampleInputEmail2" placeholder="(99) 99999999 " required>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail2">Email</label>
                          <input type="email" name="email" class="form-control" id="exampleInputEmail2" placeholder="joao@example.com">
                        </div>
                        <button type="submit" class="btn btn-success btn-sm" name="aulaSubmit" value="Submit" id="bookClassButton"  onClick="fbq('track', 'CompleteRegistration');"> Agendar aula</button>
                    </div>
                </div>    
                
            </form>
        </div>
    </section>

    <section id="personal">
        <div class="container">
            <h2 class="section-heading"> Você é personal trainer?</h2>
            <h3>Não perca tempo! Cadastre-se aqui e a Alltleta entra em contato com você para compor nossa equipe.</h3>
            <?php
                if(!empty($errorMessage)) 
                {
                    echo("<p>There was an error with your form:</p>\n");
                    echo("<ul>" . $errorMessage . "</ul>\n");
                } 
            ?>
            <form action="index.php" method="post" id="personalContact">
                <div class="form-group">
                    <label for="exampleInputEmail2">Nome</label>
                    <input type="text" name="nome" class="form-control" id="exampleInputEmail2" placeholder="Seu Nome" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail2">Telefone de contato</label>
                    <input type="text" name="phone" class="form-control" id="exampleInputEmail2" placeholder="(99) 99999999 " required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail2">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail2" placeholder="joao@example.com">
                </div>
                <button type="submit" class="btn btn-success btn-sm" name="personalSubmit" value="Submit"> Enviar</button>
            </form>
        </div>
    </section>

    <section id="features" class="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-heading">
                        <h2>O seu treino funcional com ECONOMIA e SEGURANÇA</h2>
                        <p class="text-muted">Veja só o que você pode fazer com a Alltleta !</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="device-container">
                        <div class="device-mockup iphone6_plus portrait white">
                            <div class="device">
                                <div class="screen">
                                    <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                                    <img src="img/home2.png" class="img-responsive" alt="Aplicativo alltleta para treinamento funcional"> </div>
                                <div class="button">
                                    <!-- You can hook the "home button" to some JavaScript events or just remove it -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="feature-item">
                                    <img src="img/location.png" id="loc" alt="location icon">
                                    <h3>Treinos Próximos</h3>
                                    <p class="text-muted">Encontre um grupo de treino funcional perto de você.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="feature-item">
                                    <img src="img/credit.png"  alt="credit card icon">
                                    <h3>Pagamento Fácil</h3>
                                    <p class="text-muted">Com a Alltleta, você agenda e paga sua aula pelo próprio aplicativo.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="feature-item">
                                    <img src="img/alltleta_icon.png"  alt="alltleta logo">
                                    <h3>Profissionais Qualificados</h3>
                                    <p class="text-muted"> Treine com Personais qualificados e avialie cada aula.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="feature-item">
                                    <img src="img/camera.png"  alt="camera icon">
                                    <h3>Compartilhe Seu Treino</h3>
                                    <p class="text-muted"> Mostre para os amigos onde você treina e publique fotos! </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <section id="video">
        <div id="videoDiv" class="container">
            <div id="videoPlayer" align="center" class="video-container">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/QxeqVKbgn14" frameborder="0" allowfullscreen>
                </iframe>
            </div>
        </div>
    </section>

    <section class="cta">
        <div class="cta-content">
            <div class="container">
                <h2>Chega de treino ultrapassado.<br>É hora de treino funcional!</h2>
                <a href="#email_section" class="btn btn-outline btn-xl page-scroll"> Baixar Alltleta</a>
            </div>
        </div>
        <div class="overlay"></div>
    </section>

    <section id="download" class="download bg-primary text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2" id="download_section">
                    <h2 class="section-heading"> Em Breve disponível em iOS e Android</h2>
                    <p>O download do nosso App estará disponível em breve !</p>
                    <div class="badges">
                        <a class="badge-link" href="#email_section"><img src="img/google-play-badge.svg" alt="google play icon"></a>
                        <a class="badge-link" href="#email_section"><img src="img/app-store-badge.svg" alt="app store icon"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="email_section">
        <div class="container">
            <h2 class="section-heading"> Receba um email quando o App estiver pronto !</h2>
            <?php
                if(!empty($errorMessage)) 
                {
                    echo("<p>There was an error with your form:</p>\n");
                    echo("<ul>" . $errorMessage . "</ul>\n");
                } 
            ?>
            <form class="form-inline" action="index.php" method="post" id="emailContact">
              <div class="form-group">
                <label for="exampleInputEmail2">Email</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail2" placeholder="jane.doe@example.com">
              </div>
              <button id="butaoemail" type="submit" class="btn btn-success btn-sm" name="emailSubmit" value="Submit">Enviar</button>
            </form>

        </div>

    </section>

    <section id="contact" class="contact bg-primary">
        <div class="container">
            <h2>Siga a Alltleta e aproveite nossas promoções!</h2>
            <ul class="list-inline list-social">
                <li class="social-facebook">
                    <a href="http://www.facebook.com/alltleta"><i class="fa fa-facebook"></i></a>
                </li>
                <li class="social-twitter">
                    <a href="http://twitter.com/alltleta"><i class="fa fa-twitter"></i></a>
                </li>
                <li class="social-instagram">
                    <a href="http://www.instagram.com/alltleta"><i class="fa fa-instagram"></i></a>
                </li>
                <li class="social-email">
                    <a href="mailto:alltleta@alltleta.com"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="http://www.alltleta.com/blog"><img class="social-blog" src="img/blog-social.png" alt="blog icon"></img></a>
                </li>
            </ul>
            <p>Para mais informações entre em contato com a nossa equipe
            <br>
            Fernando Bittencourt: (31) 99196-1091
            <br> 
            Henrique Assunção: (31) 98787-3665
            <br> 
            Alef Monteiro: (31) 99348-5847</p>

        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2016 Alltleta. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/new-age.min.js"></script>


</body>

</html>