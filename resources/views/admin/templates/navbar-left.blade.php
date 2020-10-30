<nav class="navbar">
    <button type="button" class="btn-navbar">
        <span></span>
        <span></span>
        <span></span>
    </button>
    
    <div class="logged-user">
        <div class="btn-group">
            <a href="#" class="btn btn-link dropdown-toggle" data-toggle="dropdown">
                <div class="profile">
                    {{-- <img src="{{ asset('img/user.png') }}"> --}}
                    @if (isset(Auth::user()->avatar))
                        <img src="data:image/{{Auth::user()->ext}};base64,{{Auth::user()->avatar}}">
                    @else
                        <img src="{{ asset('img/user2.png') }}">
                    @endif
                    <span>{{ strtoupper(Auth::user()->name) }}</span>
                    <i class="fas fa-angle-down arrow-profile"></i>
                </div>
            </a>
            <ul class="dropdown-menu" role="menu">
                <li>
                    <a href="{{ route('admin.usuarios') }}">
                        <i class="far fa-address-card"></i>
                        <span class="text">Perfil</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.usuarios') }}">
                        <i class="fas fa-cog"></i>
                        <span class="text">Configurações</span>
                    </a>
                </li>
                <li>
                   <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                        Sair
                    </a>    
                    <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div>
    </div>

    <div class="navbar-left">
        <div class="accordion-menu">
            <ul class="menu">
                <li class="li">
                    <a href="{{ route('admin.usuarios') }}">
                        <i class="fas fa-user"></i>
                        <span>USUÁRIOS</span>
                    </a>
                </li>
                <li class="li">
                    <a href="{{ route('admin.eventos') }}">
                        <i class="far fa-calendar-alt"></i>
                        <span>EVENTOS</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-user"></i>
                            <span>USUÁRIOS</span>
                        <i class="fas fa-angle-down arrow-down"></i>
                    </a>
                    <ul>
                        <li class="li2"><a href="#"><i class="far fa-copy"></i>Sub-Element</a></li>
                        <li class="li2"><a href="#"><i class="far fa-copy"></i>Sub-Element</a></li>
                        <li class="li2"><a href="#"><i class="far fa-copy"></i>Sub-Element</a></li>
                        <li class="li2"><a href="#"><i class="far fa-copy"></i>Sub-Element</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<script src="{{ asset('js/jquery.js') }}"></script>
<script>

    $('.li').mouseenter(function(){
        $(this).css('background', '#3376a7')
        $(this).css('background', '0.1s linear')
        $(this).children('.li a').css('color', 'white')
    });
    $('.li').mouseleave(function(){
        $(this).css('background','#fff')
        $(this).css('background','0.1s linear')
        $(this).children('.li a').css('color', '#3376a7')
    });

    $('.li2').mouseenter(function(){
        $(this).css('background', '#eaf5fd')
        $(this).css('background', '0.1s linear')
        $(this).children('.li2 a').css('color', '#424242')
    });
    $('.li2').mouseleave(function(){
        $(this).css('background','#fff')
        $(this).css('background','0.1s linear')
        $(this).children('.li2 a').css('color', '#424242')
    });

</script>