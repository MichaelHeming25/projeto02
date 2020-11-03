<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DASHBOARD - USUÁRIOS</title>
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
            <div class="cadastrar">
                <button type="button" class="btn-brand btn-elevate btn-icon-sm btn-cadastrar" data-idc="{{ url('/usuarios/viewCadastrar') }}">
                    <i class="fa fa-plus"></i> Novo Usuário
                </button>
            </div>
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
            <table id="table_id" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>NOME</th>
                        <th>E-MAIL</th>
                        <th>TELEFONE</th>
                        <th>CRIADO EM</th>
                        <th>EDITAR / REMOVER</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < sizeof($users); $i++)
                        <tr>
                            @isset($users[$i]['name'])
                            <td>{{ $users[$i]['name'] }}</td>
                            @endisset

                            @isset($users[$i]['email'])
                            <td>{{ $users[$i]['email'] }}</td>
                            @endisset

                            @isset($users[$i]['telefone'])
                            <td>{{ $users[$i]['telefone'] }}</td>
                            @endisset

                            @isset($users[$i]['created_at'])
                            <td>{{ $users[$i]['created_at'] }}</td>
                            @endisset

                            <td>
                                <div class="botoes">
                                    <button type="button" class="botao-editar btn-editar" style="margin-right: 10px;" data-id="{{ url('admin/usuarios/editar') }}/{{ $users[$i]['id'] }}"><span class="entypo-tools"><i class="fas fa-edit"></i></span></button>
                                    <button type="button" class="botao-remover" data-id="{{ url('admin/usuarios/confirm') }}/{{ $users[$i]['id'] }}"><i class="far fa-trash-alt"></i></button>  
                                </div>
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('dropdown/js/custom.js') }}"></script>
    <script src="{{ asset('DataTables/datatables.js') }}"></script>
    <script src="{{ asset('jquery-validation/dist/jquery.validate.js') }}"></script>
    <script>
        
        
        
        $(document).ready( function () {
            $('#table_id').DataTable({
                responsive: true,
                paging: false,
                searching: false,
                "info": false,
                fixedHeader: {
                    footer: true
                },
            });
        });  
    
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

        // EDITAR CLIENTE
        $(document).on('click','.btn-editar', function(e){
            e.preventDefault();

            var bodyFormName = $('.modal-body');
            var modalName = $('.modal');
            var id = $(this).data('id')

            console.log(bodyFormName)
            console.log(modalName)
            console.log(id)

            $(modalName).modal('show'); 

            $.ajax({
                url: id,
                type: 'get',
                success: function(response){       
                    $(bodyFormName).html(response);
                }
            });
            return false;
        });

        // CADASTRAR CLIENTE
        $(document).on('click','.btn-cadastrar', function(e){
            e.preventDefault();

            var bodyFormName = $('.modal-body-cadastrar');
            var modalName = $('.modal-cadastrar');
            var idc = $(this).data('idc')

            console.log(bodyFormName)
            console.log(modalName)
            console.log(idc)

            $(modalName).modal('show'); 

            $.ajax({
                url: '{{ url('admin/usuarios/viewCadastrar') }}',
                type: 'get',
                success: function(response){
                    console.log(response)        
                    $(bodyFormName).html(response);
                }
            });
            return false;
        });

        // CONFIRMAR REMOVER
        $(document).on('click','.botao-remover', function(e){
            e.preventDefault();

            var bodyFormName = $('.modal-body-confirm');
            var modalName = $('.modal-confirm');
            var id = $(this).data('id')

            console.log(bodyFormName)
            console.log(modalName)
            console.log(id)

            $(modalName).modal('show'); 

            $.ajax({
                url: id,
                type: 'get',
                success: function(response){       
                    $(bodyFormName).html(response);
                }
            });
            return false;
        });

        // REMOVER
        $(document).on('click','.btn-remover', function(e){
            e.preventDefault();

            var bodyFormName = $('.modal-body-remover');
            var modalName = $('.modal-remover');
            var modalNamee = $('.modal-confirm');
            var id = $(this).data('id')

            console.log(bodyFormName)
            console.log(modalName)
            console.log(id)

            $(modalName).modal('show'); 

            $.ajax({
                url: id,
                type: 'get',
                success: function(response){
                    $(modalNamee).modal('hide'); 
                    $(bodyFormName).html(response);
                    // location.reload();
                }
            });
            location.reload();
            return true;
        });
        
    </script>
</body>
</html>