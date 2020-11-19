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
                    <button type="button" style="background:transparent;border:none;width:100%;padding:0;" data-trigger="hover" data-content="USÁRIOS" class="btn2">
                        <a href="{{ route('admin.usuarios') }}">
                            <div class="icon-li">
                                <i class="fas fa-user"></i>
                                {{-- <span>USUÁRIOS</span> --}}
                            </div>
                        </a>
                    </button>
                </li>
                <li class="li">
                    <button type="button" style="background:transparent;border:none;width:100%;padding:0;" data-trigger="hover" data-content="EVENTOS" >
                        <a href="{{ route('admin.eventos') }}">
                            <div class="icon-li">
                                <i class="far fa-calendar-alt"></i>
                                {{-- <span>EVENTOS</span> --}}
                            </div>
                        </a>
                    </button>
                </li>

                <li>
                    <button type="button" style="background:transparent;border:none;width:100%;padding:0;" data-trigger="hover" data-content="USÁRIOS">
                        <a href="#" >
                            <div class="icon-li">
                                <i class="fas fa-user"></i>
                            </div>
                            <i class="fas fa-angle-down arrow-down"></i>
                        </a>
                    </button>
                    <ul>
                        <li class="li2">
                            <a href="#">
                                <button type="button"  data-trigger="hover" data-content="EDITAR">
                                    <i class="far fa-edit"></i>
                                </button>  
                            </a>
                        </li>
                        <li class="li2">
                            <a href="#">
                                <button type="button"  data-trigger="hover" data-content="REMOVER">
                                    <i class="far fa-trash-alt"></i>
                                </button>  
                            </a>
                        </li>
                    </ul>
                    
                </li>

            </ul>
        </div>
    </div>
</nav>
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script>
    $(function () {
        $('[data-trigger="hover"]').popover()
    })
</script>