<form class="form-horizontal" id="form" role="form" action="{{ route('eventos.cadastrado') }}" method="POST" enctype="multipart/form-data" >
    @csrf
    
	<div class="form-group">
		<label for="evento" class="control-label">Evento</label>
		<div class="input-group">
			<input type="text" class="form-control" id="evento" name="evento" placeholder="Evento">
		</div>
    </div>
    
    <div class="form-group">
		<label for="data" class="control-label">Data</label>
		<div class="input-group">
			<input type="date" class="form-control" id="data" name="data" placeholder="Data">
		</div>
    </div>
    
    <div class="form-group">
		<label for="img" style="margin:0;padding-left: 0.3rem;">Imagem do evento:</label><br>
		<span class="avatar-obs">Obs: Tamanho recomendado: largura: 700px, Altura: 875px.</span>

		<div class="input-group">
			<div class="custom-file"> 
				<input type="file" accept="image/*" name="img" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" onchange="preview()">
				<label class="custom-file-label preview" for="inputGroupFile04">Escolha uma imagem</label>
			</div>
		</div>

	</div>
	
	<img name="img" style="margin: 0.5rem 0 1rem 0;width:50%;height:50%;"><br>
	
	<button type="submit" class="btn btn-cadastro"><i class="icon ion-checkmark-circled"></i>Cadastrar evento</button>
</form>
<script>
	$('form#form').validate({
		rules: {
			evento: {
				required: true
			},
			data: {
				required: true
			},
		}
	})

	var configuracoes = {}

	$("#img").base64({
		"onSuccess": function(inst, base64Str) {
			console.log(base64Str)
			configuracoes['base64'] = base64Str;
			console.log(configuracoes)
		}
	});

	function preview(){
		console.log(configuracoes);

		var imagem = document.querySelector('input[name=img]').files[0];
		var preview = document.querySelector('img[name=img]');

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