<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bruna e Felipe - Save the date!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="favicon.ico" />

    <link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="theme/css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="theme/css/icomoon.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="theme/css/bootstrap.css">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="theme/css/magnific-popup.css">

    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="theme/css/owl.carousel.min.css">
    <link rel="stylesheet" href="theme/css/owl.theme.default.min.css">

    <!-- Theme style  -->
    <link rel="stylesheet" href="theme/css/style.css">

    <!-- Modernizr JS -->
    <script src="theme/js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="theme/js/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<div class="fh5co-loader"></div>

<div id="page">
    <nav class="fh5co-nav" role="navigation">
        <div class="container">
            <div class="row top">
                <div class="col-xs-3">
                    <div id="fh5co-logo"><a href="/">Bru*Fe</a></div>
                </div>
                <div class="col-xs-9 text-right menu-1">
                    <ul>
                        <li><a href="/">Início</a></li>
                        <li class="active"><a href="/lista-presenca">Confirmação de presença</a></li>
                        <li><a href="/lista-presentes">Lista de presentes</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </nav>

    <header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(theme/images/bg.jpg); background-position:center; max-height: 500px;">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeIn">
                            <h1>Confirme sua presença</h1>
                            <h2>Ela é muito importante para nós.</h2>
                            <div class="simply-countdown simply-countdown-one"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="fh5co-couple" class="fh5co-section-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                    <h2>Save the date!</h2>
                    <h3>24 de Junho de 2019</h3>
                    <p>
                        Estamos preparando essa celebração com muito carinho,
                        e para conseguirmos acertar os mínimos detalhes,
                        precisamos que confirme sua presença.
                    </p>
                    <br />
                    <form method="POST" action="{{ url('/confirmar-presenca') }}">
                        {{ csrf_field() }}
                        <div class="row form-group">
                            <div class="col-md-12 text-left">
                                <label for="nome">Nome:</label>
                                <input type="text" id="nome" name="nome" required="required" class="form-control" placeholder="Seu nome como está no convite">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6 text-left">
                                <label for="quantidade">Quantidade de adultos:</label>
                                <input type="number" min="0" id="quantidade" name="quantidade" required="required" class="form-control" value="1" placeholder="Quantidade de pessoas confirmadas">
                            </div>
                            <div class="col-md-6 text-left">
                                <label for="confirma_presenca">Presença:</label>
                                <select id="confirma_presenca" name="confirma_presenca" class="form-control">
                                    <option value="1" selected="selected">Sim :D</option>
                                    <option value="0">Não :(</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12 text-left">
                                <label for="observacoes">Observações:</label>
                                <textarea name="observacoes" id="observacoes" cols="30" rows="10" class="form-control" placeholder="Observação..."></textarea>
                            </div>
                        </div>
                        <button type="submit" id="btn-enviar" class="btn btn-primary">Enviar :D</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer id="fh5co-footer" role="contentinfo" style="padding: 0;">
        <div class="container">

            <div class="row copyright">
                <div class="col-md-12 text-center">
                    <p>
                        <small class="block">Feito com <i class="icon-heart2" style="color: #f14e95;"></i> por Bruna & Felipe</small>
                    </p>
                </div>
            </div>

        </div>
    </footer>
</div>
<!-- jQuery -->
<script src="theme/js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="theme/js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="theme/js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="theme/js/jquery.waypoints.min.js"></script>
<!-- Carousel -->
<script src="theme/js/owl.carousel.min.js"></script>
<!-- countTo -->
<script src="theme/js/jquery.countTo.js"></script>

<!-- Stellar -->
<script src="theme/js/jquery.stellar.min.js"></script>
<!-- Magnific Popup -->
<script src="theme/js/jquery.magnific-popup.min.js"></script>
<script src="theme/js/magnific-popup-options.js"></script>

<!-- // <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/0.0.1/prism.min.js"></script> -->
<script src="theme/js/simplyCountdown.js"></script>
<!-- Main -->
<script src="theme/js/main.js"></script>

<script>
    var d = new Date('2019-06-24 19:45:00');

    // default example
    simplyCountdown('.simply-countdown-one', {
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate(),
        words: {
            days: 'dia',
            hours: 'hora',
            minutes: 'minuto',
            seconds: 'segundo',
            pluralLetter: 's'
        },
    });

    //jQuery example
    $('#simply-countdown-losange').simplyCountdown({
        year: d.getFullYear(),
        month: d.getMonth() + 1,
        day: d.getDate(),
        enableUtc: false
    });
</script>

</body>
</html>

