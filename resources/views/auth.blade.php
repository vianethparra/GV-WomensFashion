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
                    <div class="col-md-4 col-md-offset-4">
                        <a href="{{url('/')}}"><img src="{{ asset("img/logo-4.png")}}" alt=""></a>
                    </div>
                    
                </div>
            </div>
        </div>

        @yield('contenido')

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
