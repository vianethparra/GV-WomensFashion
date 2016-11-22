<!DOCTYPE html>
<html lang="en">
    <head>
        <title>GV womens fashion</title>
        <meta charset="utf-8">
        <link href="{{ asset("css/tiendabootstrap.css")}}" rel="stylesheet" type="text/css" media="all" />
        <script src="{{ asset("js/jquery-1.11.0.min.js")}}"></script>
        <link href="{{ asset("css/style.css")}}" rel="stylesheet" type="text/css" media="all" />  
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="{{ asset("js/move-top.js")}}"></script>
        <script type="text/javascript" src="{{ asset("js/easing.js")}}"></script>
        <link href="{{ asset("css/memenu.css")}}" rel="stylesheet" type="text/css" media="all" />
        <script type="text/javascript" src="{{ asset("js/memenu.js")}}"></script>
    </head>
    <body>
        <div class="top-header">
            <div class="container">
                <div class="top-header-main">
                    <div class="col-md-4">
                        @if (!Auth::guest())
                        {{ Auth::user()->name }}
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="submit" value="Logout">
                        </form>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <a href="{{url('/')}}"><img src="{{ asset("img/logo-4.png")}}" alt=""></a>
                    </div>
                    <form action="{{url('/buscarArticulo')}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="col-md-3 col-md-offset-1">
                        <div class="search-bar">
                            <input type="text" name="buscar" value="Buscar" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
                            <input type="submit" value="">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="container">
                <div class="top-nav">
                    <ul class="memenu skyblue">
                        <li class="active"><a href="{{url('/')}}">Inicio</a></li>
                        <li class="grid"><a href="{{url('/catalogo')}}">Catalogo</a></li>
                        @foreach($categoria as $c)
                            <li class="grid"><a href="{{url('/catalogo')}}/{{$c->id_categoria}}">{{$c->categoria}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        @yield('contenido')

        <div class="footer">
            <div class="container">
                <div class="footer-top">
                    <div class="col-md-3 footer-left">
                        <h3>Acerca de</h3>
                        <ul>
                            <li><a href="{{url('/quienesSomos')}}">Quienes somos</a></li>
                            <li><a href="{{url('/contacto')}}">Contacto</a></li> 
                        </ul>
                    </div>
                    <div class="col-md-3 footer-left">
                        <h3>Cuenta</h3>
                        <ul>
                            @if (Auth::guest())
                                <li><a href="{{url('/cuenta')}}">Crear cuenta</a></li>
                                <li><a href="{{url('/log')}}">Iniciar Sesion</a></li>
                            @else
                                <li><a href="{{url('/checkout')}}">Checkout</a></li> 
                            @endif
                            
                        </ul>
                    </div>
                    <div class="col-md-3 footer-left">
                        <h3>Servicio al cliente</h3>
                        <ul>
                            <li><a href="{{url('/FAQ')}}">FAQ</a></li>
                            @if (!Auth::guest())
                                <li><a href="{{url('/consultarPedido/'.Auth::user()->id)}}">Pedidos</a></li>
                            @endif               
                        </ul>
                    </div>
                    <div class="col-md-3 footer-left">
                        <h3>Categorias</h3>
                        <ul>
                            @foreach($categoria as $c)
                                <li><a href="{{url('/catalogo')}}/{{$c->id_categoria}}">{{$c->categoria}}</a></li>
                            @endforeach       
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-text">
            <div class="container">
                <div class="footer-main">
                    <p class="footer-class">© 2016 Ing Web</p>
                </div>
            </div>
            <script type="text/javascript">
                                        $(document).ready(function() {
                                            $().UItoTop({ easingType: 'easeOutQuart' });
                                        });
                                    </script>
            <a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
        </div>
    </body>
</html>
