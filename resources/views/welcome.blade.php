<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/styleSmall.css') }}" rel="stylesheet" type="text/css">
    <title>{{ config('app.name') }}</title>
    <link rel="shortcut icon" href="images/favicon.png" />

    <!--notificaciones-->
            <link href="https://fonts.googleapis.com/css?family=Raleway:400,300,600,800,900" rel="stylesheet" type="text/css">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="jquery-3.4.1.min.js"></script>
    <script src="push.min.js"></script>
    <script src="java.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>


</head>

<body>

    <header id="header" class="header">
        <img src="{{ asset('img/logoC.png') }}" alt="" id="imgLogo">
        <div class="header-right">
            <a class="active" href="index.html">INICIO</a>
            <a href="#contact">CONTACTO</a>
            <a href="#about">ACERCA DE</a>
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        {{-- <a href="{{ route('login') }}">Login</a> --}}

                        @if (Route::has('register'))
                            {{-- <a href="{{ route('register') }}">Register</a> --}}
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </header>

    <!--conenido de jessica orozco------------------>
    <!-- <button type="button" onclick="notificar()" >Enviar Notificacion</button> -->
    <section id="listasos" class="listasos">
        <h3>Servicios de Asistencia</h3>
        <a href=""><img class="buscar"
                src="https://images.vexels.com/media/users/3/132066/isolated/preview/71646d7673e8847ab07b3b7e78928777-buscar-icono-de-c--rculo-by-vexels.png"
                title="Buscar"></a>
        <!-- <div class="bannersos">
        
        
    </div> -->
        <button onclick="ocultarlistasos()" class="btncerrar">X</button>
        <div id="sos" class="sos">

        </div>

    </section>
    <!------------------------------------------------>

    <div class="main row">

        <div class="bloque1">
            <!--MEDIDORES----------------------------------->

            <p>RIESGO DE </p>
            <h1 id="desastre">DESLIZAMIENTO</h1>
            <script>
                var rand = Math.floor(Math.random() * 8);
                var texto;
                switch (rand) {
                    case 1:
                        texto = "INUNDACIÓN";
                        break; // al encontrar este 'break' no se continuará con el siguiente 'default:'
                    case 2:
                        texto = "TERREMOTO";
                        break;
                    case 3:
                        texto = "TSUNAMI";
                        break;
                    case 4:
                        texto = "INCENDIO FORESTAL";
                        break;
                    case 5:
                        texto = "DESLIZAMIENTO";
                        break;
                    case 6:
                        texto = "TORMENTA";
                        break;
                    case 7:
                        texto = "HURACÁN";
                        break;
                    case 8:
                        texto = "DESLIZAMIENTO";
                        break;
                    default:
                        texto = "DESLIZAMIENTO";
                }

                document.getElementById('desastre').innerHTML = texto;
                console.log(rand);
            </script>

            <div class="grupo1">
                <div class="grupo1-A">
                    <div id="contador1" class="horizontal"></div>
                    <h4 style="margin-top: 5%">TEMPERATURA</h4>
                    <!-- <p>FACTOR1</p> -->
                </div>

                <div class="grupo1-B">
                    <div id="contador2" class="horizontal"></div>
                    <h4 style="margin-top: 5%">RANGO DE RIESGO:</h4>
                    <h2 id="riesgo" class="horizontalINF">MODERADO</h2>
                </div>


                <div class="grupo1-A">
                    <div id="contador3" class="horizontal"></div>
                    <h4 style="margin-top: 5%">HUMEDAD</h4>
                    <!-- <p>FACTOR2</p> -->
                </div>

            </div>
            <hr style="width: 80%; margin-top: 2%;">
            <div class="grupo2">

                <div id="detalles" class="sidenav">
                    <h3 style="margin-bottom: 25px;">DETALLES</h3>
                    <div id="result">HOLA ESSTO ES UNA BENDITA PRUEBA</div>
                    <!-- <a>COORD: 123123-213213</a> -->
                    <a>HORA: 15:15</a>
                    <a>FECHA: 04/07/19</a>
                </div>
                <div id="recomendaciones" class="sidenav">
                    <h3 style="margin-bottom: 25px;">RECOMENDACIONES</h3>
                
                    <a>Conserve la calma</a>
                    <a>Mantengase alejado de la zona</a>
                    <a>Tenga listo un botiquín</a>
                    <a>Tenga a la mano los números de emergencia</a>
                </div>
            </div>

        </div>

        <div class="bloque2">

            <button class="button" style="vertical-align:middle; background-color: rgba(255, 255, 255, 0.7);"
                id="btn"><span>DETALLES </span></button>
            <button class="button" style="vertical-align:middle" id="btn"><span>¿DÓNDE IR?</span></button>
            <button class="button" style="vertical-align:middle" id="btn"><span>¿QUÉ HACER? </span></button>
            <button class="button" style="vertical-align:middle" id="btn" onclick="mostrarlistasos()"><span>SERVICIOS ASISTENCIA </span></button>

            <div class="big boton">
                <div id="mapa" style="height: 200px"></div>
                <br>
                <a href="Mapa/mapa.html">
                    Ver mapa de riesgos    
                </a>
                    
                

            </div>

            <button class="btnPanico button" style="vertical-align:middle;">
                <span>REPORTAR DESASTRE</span>
            </button>

        </div>

    </div>
    <footer>
        <img src="{{ asset('img/codeInkLogo.png') }}" style="width: 8%;">
        CodeINK Team / All rights reserved / BICTIA 2019
    </footer>



    <!--COMPONENTES DE LAS BARRAS DE CARGA ANIMADAS-->
    <!-- These are probably out dated so you might want to use newest versions -->
    <!--<script src="https://cdn.rawgit.com/kimmobrunfeldt/progressbar.js/0.5.6/dist/progressbar.js"></script>-->
    <script src="{{ asset('js/progressbar.js') }}"></script>
    <script src="{{ asset('js/barras.js') }}"></script>
    <!--codigo de jessica orozco-->
    <script src="{{ asset('js/contenido.js') }}"></script>
    <!-- <script src="notificaciones.js"></script> -->
    <script>
        
    
    </script>

</body>

</html>