<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>

        <meta charset="utf-8">
        <title>CondControl</title>

    	<meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
<!--
Flex Template
http://www.templatemo.com/tm-406-flex
-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="{{ asset('home/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('home/css/font-awesome.css') }}">
        <link rel="stylesheet" href="{{ asset('home/css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('home/css/templatemo_misc.css') }}">
        <link rel="stylesheet" href="{{ asset('home/css/templatemo_style.css') }}">

        <script src="{{ asset('home/js/vendor/modernizr-2.6.1-respond-1.1.0.min.js') }}"></script>
    </head>
    <body>

        <div class="site-main" id="sTop">
            <div class="site-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <ul class="social-icons">
                                @if (Route::has('login'))
                                    <div class="top-right links">
                                        @auth
                                            <li><a title="Sair" href="{{ route('logout') }}" class="fa fa-sign-out"
                                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                                class="fa fa-sign-in">
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </a></li>
                                        @else
                                            <li>
                                                <a title="Entrar" href="{{ route('login') }}" class="fa fa-sign-in"></a>
                                            </li>
                                        @endauth
                                    </div>
                                @endif

                            </ul>
                        </div> <!-- /.col-md-12 -->
                    </div> <!-- /.row -->
                </div> <!-- /.container -->
                <div class="main-header">
                    <div class="container">
                        <div id="menu-wrapper">
                            <div class="row">
                                 <div class="logo-wrapper col-md-2 col-sm-2">
                                    <h1>
                                        <a href="#">CondControl</a>
                                    </h1>
                                </div> <!-- /.logo-wrapper -->
                                <div class="col-md-10 col-sm-10 main-menu text-right">
                                    <div class="toggle-menu visible-sm visible-xs"><i class="fa fa-bars"></i></div>
                                    <ul class="menu-first">
                                        <li class="active"><a href="#">Home</a></li>
                                        <li><a href="#services">Vantagens</a></li>
                                        <li><a href="#our-team">Quem Somos</a></li>
                                        <li><a href="#contact">Contato</a></li>
                                    </ul>
                                </div> <!-- /.main-menu -->
                            </div> <!-- /.row -->
                        </div> <!-- /#menu-wrapper -->
                    </div> <!-- /.container -->
                </div> <!-- /.main-header -->
            </div> <!-- /.site-header -->

            <div class="site-slider visible-md visible-lg">
                <div class="slider">
                    <div class="flexslider">
                        <ul class="slides">
                            <li>
                                <div class="overlay"></div>
                                <img src="{{ asset('home/images/condominio.jpg') }}" alt="">
                                <div class="slider-caption visible-md visible-lg">
                                    @if(session()->has('message.level'))
                                        <div class="container">
                                            <div class="col-md-8 col-md-offset-2 text-center alert alert-{{ session('message.level') }}">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                {!! session('message.content') !!}
                                            </div>
                                        </div>
                                    @endif
                                    <h2>Facilidade em Gerenciamento</h2>
                                    <p style="text-shadow: 1px 1px black">Administre seu condomínio</p>
                                    @if (Route::has('login'))
                                        <div class="top-right links">
                                            @auth
                                                <a href="{{ url('/painel') }}" class="slider-btn">Painel</a>
                                            @else
                                                <a href="{{ route('login') }}" class="slider-btn">Entrar</a>
                                            @endauth
                                        </div>
                                    @endif
                                </div>
                            </li>
                        </ul>
                    </div> <!-- /.flexslider -->
                </div> <!-- /.slider -->
            </div> <!-- /.site-slider -->

        </div> <!-- /.site-main -->

        <div class="content-section visible-sm visible-xs" id="enter_btn">
            <div class="container">
                <div class="row">
                    {{-- <span class="black-background"></span> --}}
                    <div class="z10 heading-section text-center">

                        <h2>Gerenciamento</h2>
                        <p style="text-shadow: 1px 1px black">Administre seu condomínio</p>
                        @if (Route::has('login'))
                            <div class="top-right links">
                                @auth
                                    <a href="{{ url('/painel') }}" class="enter-btn">Painel</a>
                                @else
                                    <a href="{{ route('login') }}" class="enter-btn">Entrar</a>
                                @endauth
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="content-section" id="services">
            <div class="container">
                <div class="row">
                    <div class="heading-section col-md-12 text-center">
                        <h2>Vantagens</h2>
                        <p>Fazemos de tudo para você economizar tempo</p>
                    </div> <!-- /.heading-section -->
                </div> <!-- /.row -->
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="service-item" id="service-1">
                            <div class="service-icon">
                                <i class="fa fa-comments-o"></i>
                                Chat
                            </div> <!-- /.service-icon -->
                            <div class="service-content">
                                <div class="inner-service">
                                   <h3>Chat</h3>
                                   <p>Canal de Interação Exclusivo entre os condôminos e o síndico.</p>
                                </div>
                            </div> <!-- /.service-content -->
                        </div> <!-- /#service-1 -->
                    </div> <!-- /.col-md-3 -->
                    <div class="col-md-3 col-sm-6">
                        <div class="service-item" id="service-2">
                            <div class="service-icon">
                              <i class="fa fa-bullhorn" aria-hidden="true"></i>
                                 Notícias
                            </div> <!-- /.service-icon -->
                            <div class="service-content">
                                <div class="inner-service">
                                   <h3>Notícias</h3>
                                   <p>Veja todos avisos ativos e históricos que foram adicionados ao seu condomínio.</p>
                                </div>
                            </div> <!-- /.service-content -->
                        </div> <!-- /#service-1 -->
                    </div> <!-- /.col-md-3 -->
                    <div class="col-md-3 col-sm-6">
                        <div class="service-item" id="service-3">
                            <div class="service-icon">
                                <i class="fa fa-camera"></i>
                                Galeria
                            </div> <!-- /.service-icon -->
                            <div class="service-content">
                                <div class="inner-service">
                                   <h3>Galerias</h3>
                                   <p>Envie fotos para melhorar a comunidade do condominio.</p>
                                </div>
                            </div> <!-- /.service-content -->
                        </div> <!-- /#service-1 -->
                    </div> <!-- /.col-md-3 -->
                    <div class="col-md-3 col-sm-6">
                        <div class="service-item" id="service-4">
                            <div class="service-icon">
                                <i class="fa fa-check-square-o"></i>
                                Enquetes
                            </div> <!-- /.service-icon -->
                            <div class="service-content">
                                <div class="inner-service">
                                   <h3> Enquetes</h3>
                                   <p>Crie enquetes e disponibilize para os moradores responderem online. Após respostas é
                                  possível verificar o resultado rapidamente.</p>
                                </div>
                            </div> <!-- /.service-content -->
                        </div> <!-- /#service-1 -->
                    </div> <!-- /.col-md-3 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /#services -->



        <div class="content-section" id="our-team">
            <div class="container">
                <div class="row">
                    <div class="heading-section col-md-12 text-center">
                        <h2>Quem somos</h2>
                        <p>Somos uma empresa que desenvolve sistemas inteligentes e de alta qualidade com uma
                            equipe de desenvolvedores especializada em sistemas web e mobile. Estamos no mercado já
                            algum tempo e somos referencia em sistemas para condomínios e comerciais..</p>
                    </div> <!-- /.heading-section -->
                </div>
            </div> <!-- /.container -->
        </div> <!-- /#our-team -->

        <div class="content-section" id="contact">
            <div class="container">

                <div class="row">
                    <div class="heading-section col-md-12 text-center">
                        <h2>Contato</h2>
                        <p>Solicite um orçamento</p>
                    </div> <!-- /.heading-section -->
                </div> <!-- /.row -->

                <div class="row">
                    <div class="col-md-7 col-sm-6">
                        <p style="font-size: 20px;">
                            Disponibilizamos diversas formas de nos contatar.<br />
                            Ficaremos felizes em responder a todas as suas dúvidas e atender suas necessidades.<br />
                            Consulte-nos sobre valores e pacotes de serviços.<br />
                            Faça um orçamento. <br />

                        </p>
                        <br>
                        <ul style="font-size: 20px;" class="contact-info">
                            <li><strong>Telefone:</strong> (51) 3251-1111 </li>
                            <li><strong>Email:</strong> <a href="mailto:sabino.th@hotmail.com">sabino.th@hotmail.com</a></li>
                            <li><strong>Endereço:</strong> Av. Sertório, 5310 - Porto Alegre - RS</li>
                        </ul>
                        {{-- <!-- spacing for mobile viewing --><br><br> --}}
                    </div> <!-- /.col-md-7 -->
                    <div class="col-md-5 col-sm-6">
                        <div class="contact-form">
                            <form method="POST" name="contactform" id="contactform" action="{{ route('mail') }}">
                                {{ csrf_field() }}
                                <p>
                                    <input name="name" type="text" id="name" placeholder="Seu Nome">
                                </p>
                                <p>
                                    <input name="email" type="text" id="email" placeholder="Seu Email">
                                </p>
                                <p>
                                    <input name="subject" type="text" id="subject" placeholder="Assunto">
                                </p>
                                <p>
                                    <textarea name="comments" id="comments" placeholder="Mensagem"></textarea>
                                </p>
                                <input type="submit" class="mainBtn" id="submit" value="Enviar Mensagem">
                            </form>
                        </div> <!-- /.contact-form -->
                    </div> <!-- /.col-md-5 -->
                </div> <!-- /.row -->
                <div class="row">
                    <div class="col-md-12">
                       <div class="googlemap-wrapper">
                            <div id="map_canvas" class="map-canvas"></div>
                        </div> <!-- /.googlemap-wrapper -->
                    </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /#contact -->

        <div id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-xs-12 text-left">
                        <span>Direitos Reservado &copy; 2017 CondControl</span>
                  </div> <!-- /.text-center -->
                    <div class="col-md-4 hidden-xs text-right">
                        <a href="#top" id="go-top">Voltar ao Topo</a>
                    </div> <!-- /.text-center -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /#footer -->

        <script src="{{ asset('home/js/vendor/jquery-1.11.0.min.js') }}"></script>
        <script>window.jQuery || document.write('<script src="{{ asset('home/js/vendor/jquery-1.11.0.min.js') }}"><\/script>')</script>
        <script src="{{ asset('home/js/bootstrap.js') }}"></script>
        <script src="{{ asset('home/js/plugins.js') }}"></script>
        <script src="{{ asset('home/js/main.js') }}"></script>

        <!-- Google Map -->
        <script src="{{ asset('http://maps.google.com/maps/api/js?key=AIzaSyABGCGKREpkwYxfbk8x-Ik1oOmmmxOJsGE') }}"></script>
        <script src="{{ asset('home/js/vendor/jquery.gmap3.min.js') }}"></script>

        <!-- Google Map Init-->
        <script type="text/javascript">
            jQuery(function($){
                $('#map_canvas').gmap3({
                    marker:{
                        address: '-29.9979713, -51.1522688'
                    },
                        map:{
                        options:{
                        zoom: 15,
                        scrollwheel: false,
                        streetViewControl : true
                        }
                    }
                });

                /* Simulate hover on iPad
                 * http://stackoverflow.com/questions/2851663/how-do-i-simulate-a-hover-with-a-touch-in-touch-enabled-browsers
                 --------------------------------------------------------------------------------------------------------------*/
                $('body').bind('touchstart', function() {});
            });
        </script>
        <!-- templatemo 406 flex -->
    </body>
</html>
