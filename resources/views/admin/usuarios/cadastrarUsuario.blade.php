<form class="form-horizontal" id="form" role="form" action="{{ route('usuarios.cadastrado') }}" method="POST" enctype="multipart/form-data" >
	@csrf
	<div class="form-group">
		<label for="name" class="control-label">Username</label>
		<div class="input-group">
			<input type="text" class="form-control" id="name" name="name" placeholder="Username">
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="control-label">Email</label>
		<div class="input-group">
			<input type="email" class="form-control" id="email" name="email" placeholder="Email">
		</div>
	</div>

	<div class="form-group">
		<label for="telefone" class="control-label">Telefone</label>
		<div class="input-group">
			<input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone">
		</div>
    </div>
    
    <div class="form-group">
		<label for="password" class="control-label">Senha</label>
		<div class="input-group">
			<input type="password" class="form-control" id="password" name="password" placeholder="Senha">
		</div>
	</div>

	<div class="form-group">
		<label for="avatar" style="margin:0;padding-left: 0.3rem;">Avatar:</label><br>
		<span class="avatar-obs">Obs: Tamanho recomendado: largura: 64px, Altura: 64px.</span>

		<div class="input-group">
			<div class="custom-file"> 
				<input type="file" accept="image/*" name="avatar" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" onchange="preview()">
				<label class="custom-file-label preview" for="inputGroupFile04">Escolha uma imagem</label>
			</div>
		</div>

	</div>
	
	<img name="avatar" style="border-radius:100%;margin: 0.5rem 0 1rem 0;width:64px;height:64px;"><br>
	
	<button type="submit" class="btn btn-cadastro"><i class="icon ion-checkmark-circled"></i>Cadastrar usuário</button>
</form>
<script>
	$('form#form').validate({
		rules: {
			name: {
				required: true
			},
			email: {
				required: true
			},
			password: {
				required: true
			},
			telefone: {
				required: true
			}
		}
	})

	var configuracoes = {}

	$("#avatar").base64({
		"onSuccess": function(inst, base64Str) {
			console.log(base64Str)
			configuracoes['base64'] = base64Str;
			console.log(configuracoes)
		}
	});

	function preview(){
		console.log(configuracoes);

		var imagem = document.querySelector('input[name=avatar]').files[0];
		var preview = document.querySelector('img[name=avatar]');

		var reader = new FileReader();

		reader.onloadend = function () {
			preview.src = reader.result;
		}

		if(imagem){
			reader.readAsDataURL(imagem);
		}else{
			preview.src = "";
		}
    }

</script>