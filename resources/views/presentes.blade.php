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
                        <li><a href="/lista-presenca">Confirmação de presença</a></li>
                        <li class="active"><a href="/lista-presentes">Lista de presentes</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </nav>

    <header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(theme/images/bg.jpg); background-position:center;">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeIn">
                            <h1>Lista de presentes</h1>
                            <div class="simply-countdown simply-countdown-one"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="fh5co-gallery" class="fh5co-section-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                    <h2>Lista de Presentes</h2>
                    <p>
                        Para nós, o que importa é a sua companhia, mas caso queira nos presentear, veja a lista
                        de presentes abaixo. Nela há itens para completar o nosso lar e também experiências
                        para a nossa lua de mel.
                    </p>
                    <form id="form-filter" method="get">
                        <div class="row form-group">
                            <div class="col-md-6 text-left">
                                <label for="categoria">Categoria</label>
                                <select id="categoria" name="categoria" class="form-control">
                                    <option value="">Todos</option>
                                    <option value="1" {{ (isset($request->categoria) && $request->categoria == 1) ? 'selected="selected"' : '' }}>Lua de Mel</option>
                                    <option value="2" {{ (isset($request->categoria) && $request->categoria == 2) ? 'selected="selected"' : '' }}>Itens para Casa</option>
                                </select>
                            </div>
                            <div class="col-md-3 text-left">
                                <label for="ordenacao">Ordenar</label>
                                <select id="ordenacao" name="ordenacao" class="form-control">
                                    <option value="nome">Nome</option>
                                    <option value="valor"  {{ (isset($request->ordenacao) && $request->ordenacao == 'valor') ? 'selected="selected"' : '' }}>Valor</option>
                                </select>
                            </div>
                            <div class="col-md-3 text-left">
                                <label for="dir">&nbsp;</label>
                                <select id="dir" name="dir" class="form-control">
                                    <option value="asc">Crescente</option>
                                    <option value="desc"  {{ (isset($request->dir) && $request->dir == 'desc') ? 'selected="selected"' : '' }}>Decrescente</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row row-bottom-padded-md">
                <div class="col-md-12">
                    <ul id="fh5co-gallery-list">
                        @foreach ($produtos as $produto)
                            <li class="one-fifth animate-box lista-produto" data-animate-effect="fadeIn" style="background-image: url({{ asset('storage/' . $produto->imagem) }}); ">
                                <a class="produto"  data-produto-id="{{ $produto->id }}"
                                                    data-produto-nome="{{ $produto->nome }}"
                                                    data-produto-descricao="{{ $produto->descricao }}"
                                                    data-produto-valor="{{ $produto->valor }}"
                                                    data-produto-imagem="{{ asset('storage/' . $produto->imagem) }}"
                                                    data-produto-status="{{ $produto->status }}">
                                    <div class="case-studies-summary">
                                        <p class="produto-nome">{{ $produto->nome }}</p>
                                        <span class="produto-valor">{{ $produto->valor }}</span>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
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

<div class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5">
                        <div class="modal-produto-imagem"></div>
                        <p class="modal-produto-nome"></p>
                        <p class="modal-produto-descricao"></p>
                        <span class="modal-produto-valor"></span>
                    </div>
                    <div class="col-md-7 form-pagamento">
                        <form method="POST" action="{{ url('/pagamento') }}">
                            {{ csrf_field() }}
                            <input class="modal-produto-id" type="hidden" id="id" name="id">
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label for="nome">Nome completo</label>
                                    <input type="text" id="nome" name="nome" required="required" class="form-control" placeholder="Seu nome completo é.....">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" required="required" class="form-control" placeholder="teste@email.com">
                                </div>
                                <div class="col-md-6">
                                    <label for="telefone">Telefone</label>
                                    <input type="text" id="telefone" name="telefone" required="required" class="form-control" placeholder="(17) 9 8174-5101">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label for="autor">CPF</label>
                                    <input type="text" id="cpf" name="cpf" required="required" class="form-control" placeholder="999.999.999-99">
                                </div>
                                <div class="col-md-6">
                                    <label for="nascimento">Data de Nascimento</label>
                                    <input type="date" id="nascimento" name="nascimento" required="required" class="form-control" placeholder="13/05/1993">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label for="mensagem">Mensagem</label>
                                    <textarea name="mensagem" id="mensagem" cols="30" rows="3" class="form-control" placeholder="Deixe-nos uma mensagem..."></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" id="btn-comprar" class="btn btn-primary">Pagar com pagseguro</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <img class="img-pagseguro" src="//assets.pagseguro.com.br/ps-integration-assets/banners/pagamento/todos_animado_550_50.gif" alt="Logotipos de meios de pagamento do PagSeguro" title="Este site aceita pagamentos com as principais bandeiras e bancos, saldo em conta PagSeguro e boleto.">
            </div>
        </div>
    </div>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.js"></script>

<script>
    $(document).ready(function(){
        var maskBehavior = function (val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        },
        options = {onKeyPress: function(val, e, field, options) {
                field.mask(maskBehavior.apply({}, arguments), options);
            }
        };

        $('#cpf').mask('000.000.000-00');
        $('#telefone').mask(maskBehavior, options);
    });

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

    $('body').on('click', '.produto', function (e) {
        $('.modal-produto-nome').html($(this).data('produto-nome'));
        $('.modal-produto-descricao').html($(this).data('produto-descricao'));
        $('.modal-produto-valor').html($(this).data('produto-valor'));
        $('.modal-produto-imagem').css('background-image', 'url(' + $(this).data('produto-imagem') + ')');
        $('.modal-produto-id').val($(this).data('produto-id'));
        $('.modal').modal();
    });

    $('#form-filter').on('change', 'select', function (e) {
        $('#form-filter').submit();
    });

</script>

</body>
</html>