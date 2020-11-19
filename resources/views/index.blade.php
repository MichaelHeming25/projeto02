<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projeto02</title>
    
    {{-- Link css --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('carousel/glide.core.min.css') }}">
    <link rel="stylesheet" href="{{ asset('carousel/glide.theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('carousel/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/anji.css') }}">

    {{-- FONTS --}}
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="popup">
        <div class="popup-animated anime">
            <img src="{{ asset('img/logo2.png') }}" title="PartyNow">
            <span>Bem vindo ao PartyNow!</span>
        </div>
    </div>
    
    <nav>
        <div class="container-geral">
            <div class="menu">

                <img src="{{ asset('img/logo2.png') }}" title="PartyNow">

                <form id="form">
                    <div class="submit-line">
                        <input type="text" placeholder="Faça sua busca aqui..."/>
                        <button class="submit-lente" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>

                <div class="nmr-drop">
                    <div class="dropdown">
                        <button class="btn btn-category dropdown-toggle" type="button" id="dropdownMenuButton">
                            Categorias
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Funk</a>
                            <a class="dropdown-item" href="#">Sertanejo</a>
                            <a class="dropdown-item" href="#">Pagode</a>
                            <a class="dropdown-item" href="#">Eletrônica</a>
                            <a class="dropdown-item" href="#">Pagode</a>
                            <a class="dropdown-item" href="#">Forro</a>
                            <a class="dropdown-item" href="#">Rap</a>
                        </div>
                    </div>
                </div>

                @if ( Auth::check() )
                    <div class="profile">
                        <div class="img-profile">
                            <? echo strtoupper(Auth::user()->name[0])?>
                        </div>
                        <span>Seja Bem-vindo, {{ Auth::user()->name }}!</span>
                    </div>
                @else
                    {{-- <div class="register">
                        <a href="{{ route('register') }}"><span>Sign Up</span></a>
                        <a href="{{ route('login') }}"><span>Log In</span></a>
                    </div> --}}
                @endif

                <div class="btn-responsive">
                    <button>
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>

                <div class="lado-direito">
                    <div class="lado-direito-interno">

                        @if ( Auth::check() )
                            <div class="profile-mobile">
                                <div class="img-profile">
                                    <? echo strtoupper(Auth::user()->name[0])?>
                                </div>
                                <span>Seja Bem-vindo, {{ Auth::user()->name }}!</span>
                            </div>
                        @else
                            {{-- <div class="register-mobile">
                                <a href="{{ route('register') }}"><span>Sign Up</span></a>
                                <a href="{{ route('login') }}"><span>Log In</span></a>
                            </div> --}}
                        @endif

                        <div class="mobile-drop">
                            <div class="dropdown">
                                <button class="btn btn-category dropdown-toggle" type="button" id="dropdownMenuButton">
                                    <i class="fas fa-list"></i>
                                    Categorias
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Funk</a>
                                    <a class="dropdown-item" href="#">Sertanejo</a>
                                    <a class="dropdown-item" href="#">Pagode</a>
                                    <a class="dropdown-item" href="#">Eletrônica</a>
                                    <a class="dropdown-item" href="#">Pagode</a>
                                    <a class="dropdown-item" href="#">Forro</a>
                                    <a class="dropdown-item" href="#">Rap</a>
                                </div>
                            </div>
                        </div>

                        <div class="perfil">
                            <a href="http://">
                                <i class="fas fa-user"></i>
                                <span>Meu perfil</span>
                            </a>
                        </div>
                        <div class="favorites">
                            <a href="http://">
                                <i class="fas fa-heart"></i>
                                <span>Meu Favoritos</span>
                            </a>
                        </div>
                        <div class="exit">
                            <a href="{{ route('logout') }}">
                                <i class="fas fa-sign-out-alt"></i>
                                <span>Sair</span>
                            </a>
                        </div>
                    </div>
                </div>
             
            </div>
            <form id="form-mobile">
                <div class="submit-line">
                    <input type="text" placeholder="Faça sua busca aqui..."/>
                    <button class="submit-lente" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </nav>

    {{-- <div class="images glide"  data-anijs="if: scroll, on: window, do: zoomIn animated, before: scrollReveal, after: holdAnimClass">

    <div class="titulo-destaques">Destaques da semana</div>

      <div class="glide__track" data-glide-el="track">
        <ul class="glide__slides">

            <li class="glide__slide">
                <div class="img" style="background-image: url({{ asset('carousel/images/1.png') }});"></div>
                <div class="text-img">
                    <div class="data-geral">
                        <div class="mes">Setembro</div>
                        <div class="data">03</div>
                    </div>
                    <div class="titulo-evento">Festival de musica eletronica
                        <div class="pulsar">
                            <div class="heart-vazio">
                                <i class="far fa-heart"></i>
                            </div>
                            <div class="heart-animate">
                                <i class="fas fa-heart"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </li>

            <li class="glide__slide">
            <div class="img" style="background-image: url({{ asset('carousel/images/2.png') }});"></div>
            <div class="text-img">
                    <div class="data-geral">
                    <div class="mes">Setembro</div>
                    <div class="data">30</div>
                    </div>
                    <div class="titulo-evento">Festival de musica eletronica
                        <div class="pulsar">
                            <div class="heart-vazio">
                                <i class="far fa-heart"></i>
                            </div>
                            <div class="heart-animate">
                                <i class="fas fa-heart"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </li>

            <li class="glide__slide">
                <div class="img" style="background-image: url({{ asset('carousel/images/3.png') }});"></div>
            <div class="text-img">
                    <div class="data-geral">
                    <div class="mes">Setembro</div>
                    <div class="data">01</div>
                    </div>
                    <div class="titulo-evento">Festival de musica eletronica
                        <div class="pulsar">
                            <div class="heart-vazio">
                                <i class="far fa-heart"></i>
                            </div>
                            <div class="heart-animate">
                                <i class="fas fa-heart"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </li>

            <li class="glide__slide">
                <div class="img" style="background-image: url({{ asset('carousel/images/4.png') }});"></div>
                <div class="text-img">
                    <div class="data-geral">
                    <div class="mes">Setembro</div>
                    <div class="data">07</div>
                    </div>
                    <div class="titulo-evento">Festival de musica eletronica
                        <div class="pulsar">
                            <div class="heart-vazio">
                                <i class="far fa-heart"></i>
                            </div>
                            <div class="heart-animate">
                                <i class="fas fa-heart"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </li>

            <li class="glide__slide">
                <div class="img" style="background-image: url({{ asset('carousel/images/5.png') }});"></div>
                <div class="text-img">
                    <div class="data-geral">
                    <div class="mes">Setembro</div>
                    <div class="data">25</div>
                    </div>
                    <div class="titulo-evento">Festival de musica eletronica
                        <div class="pulsar">
                            <div class="heart-vazio">
                                <i class="far fa-heart"></i>
                            </div>
                            <div class="heart-animate">
                                <i class="fas fa-heart"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </li>

            <li class="glide__slide">
                <div class="img" style="background-image: url({{ asset('carousel/images/6.png') }});"></div>
                <div class="text-img">
                    <div class="data-geral">
                    <div class="mes">Setembro</div>
                    <div class="data">10</div>
                    </div>
                    <div class="titulo-evento">Festival de musica eletronica
                        <div class="pulsar">
                            <div class="heart-vazio">
                                <i class="far fa-heart"></i>
                            </div>
                            <div class="heart-animate">
                                <i class="fas fa-heart"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </li>

        </ul>
      </div>

      <div class="glide__arrows" data-glide-el="controls">
        <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><i class="fas fa-chevron-left"></i></button>
        <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><i class="fas fa-chevron-right"></i></button>
      </div>
      
    </div> --}}

    <div class="gride" data-anijs="if: scroll, on: window, do: zoomIn animated, before: scrollReveal, after: holdAnimClass">
        
        <div class="gride-titulo">
            <div class="titulo-eventos">Eventos da semana</div>
        </div>

        <div class="gride-conteudo">

            @foreach ($eventos as $evento)
            
                <div class="grid-evento">
                    <img src="data:image/{{$evento['ext']}};base64,{{$evento['imagem_evento']}}" class="img">
                    <div class="text-img">
                        <div class="data-geral">
                            <div class="mes">{{$evento['mes']}}</div>
                            <div class="data">{{$evento['dia']}}</div>
                        </div>
                        <div class="linhas">
                            <span></span>
                            <span></span>
                        </div>
                        <div class="titulo-evento">{{$evento['evento']}}
                            <div class="pulsar">
                                <div class="heart-vazio">
                                    <i class="far fa-heart"></i>
                                </div>
                                <div class="heart-animate">
                                    <i class="fas fa-heart"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>
        
    </div>
{{-- 
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav> --}}

    <footer>
        <div class="footer-interno">
            <span>TODOS OS DIREITOS RESERVADOS A PARTYNOW</span>
        </div>
    </footer>

    {{-- Scripts js --}}
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.js') }}"></script>    
    <script src="{{ asset('js/popper.js') }}"></script>    
    <script src="{{ asset('js/dropdown.js') }}"></script>
    <script src="{{ asset('carousel/glide.min.js') }}"></script>
    <script src="{{ asset('js/anijs-min.js') }}"></script>
    <script src="{{ asset('js/anijs-helper-scrollreveal.js') }}"></script>
    <script src="{{ asset('js/three.min.js') }}"></script>

    <script>

    $(".pulsar i").click(function(){

        if ($(".heart-animate i").css("opacity") == '0') {
            $(".heart-animate i").css("transition", "0.2s linear")
            $(".heart-vazio i").css("opacity", "0")
            $(".heart-animate i").css("opacity", "1")
        }else{
            $(".heart-vazio i").css("transition", "0.2s linear")
            $(".heart-vazio i").css("opacity", "1")
            $(".heart-animate i").css("opacity", "0")
        }

    });
    // $(".pulsar i").

    // POPUP
    $(document).ready(function(){
        $(".popup").css("opacity", "1");
        $(".popup").click(function(){
            $(".popup").css("display", "none");
            // $("body").css("overflow", "scroll");
            // $("body").css("overflow-x", "hidden");
        });
    });

    // BOTÃO RESPONSIVO
    $(document).ready(function(){
        $(window).scroll(function(){
            if(this.scrollY > 60)
                $(".container-geral").addClass("sticky");
            else
                $(".container-geral").removeClass("sticky");
        });

        $('.btn-responsive button').click(function (){
            $(this).toggleClass("active")
            $(".lado-direito").toggleClass("active")
        });
    });

    // DROPDOWN
    $(document).click(function(e) {
        var target = e.target;
        $('.dropdown-menu').each(function() {
            var $this = $(this);
            var dropdown = $this.prev('#dropdownMenuButton');
            if (dropdown[0] == target) $(this).toggle();
            else $(this).hide();
        });
    });

    $(document).ready(function(){
        // CARROSEL
        new Glide(".images",{
            type: 'carousel',
            perView: 5,
            focusAt: 'center',
            gap: 40,
            breakpoints: {
                1366:{
                    perView: 2
                },
                1200:{
                    perView: 3
                },
                800:{
                    perView: 2
                },
                500:{
                    perView: 1
                }
            }
        }).mount();
    });

    (function (){

      var $target = $('.anime'),
      animationClass = 'anime-start',
      offset = $(window).height() * 3/4;

      function animeScroll() {
        var documentTop = $(document).scrollTop();

        $target.each(function() {

          var itemTop = $(this).offset().top;
          if(documentTop > itemTop - offset) {
            $(this).addClass(animationClass);
          }else {
            $(this).removeClass(animationClass);
          }

        })
      }

      animeScroll();

      $(document).scroll(function(e) {
        animeScroll()
      })

    }());

    </script>
</body>
</html>