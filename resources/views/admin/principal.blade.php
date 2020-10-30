<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('dropdown/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.css') }}">
</head>
<body>
    {{-- MODALS --}}
    @include('admin.usuarios.modal')

    {{-- NAVBAR LEFT --}}
    @include('admin.templates.navbar-left')

    <div class="conteudo">
        <header>
            <span><i class="fas fa-user-cog"></i> ADMINISTRADORES</span>
            
        </header>

        @if (session('mensagem'))
            <div class="alert alert-success fade show mb-0 pl-3 pr-3 pt-1 pb-1 col-12" role="alert">
                <div class="alert-icon"><i class="far fa-check-circle"></i></div>
                <div class="alert alert-success">
                    {{ session('mensagem') }}
                </div>
                <div class="alert-close">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
            </div>
        @elseif(session('invalido'))
            <div class="alert alert-danger fade show mb-0 pl-3 pr-3 pt-1 pb-1 col-12" role="alert">
                <div class="alert-icon"><i class="far fa-times-circle"></i></div>
                <div class="alert alert-danger">
                    {{ session('invalido') }}
                </div>
                <div class="alert-close">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times"></i></span>
                    </button>
                </div>
            </div>
        @endif

        <div class="body-conteudo">
            <div class="conteudo">
                <h1>admin</h1>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('dropdown/js/custom.js') }}"></script>
    <script>

        $('.btn-navbar').click(function (){
            $(this).toggleClass("active")
            $(".navbar-left").toggleClass("active")
            $(".conteudo").toggleClass("conteudo-left")
        });

        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function() {
                this.classList.toggle("active");

                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            });
        }
        
    </script>
</body>
</html>