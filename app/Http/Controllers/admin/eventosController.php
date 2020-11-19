<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\eventos;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class eventosController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $paginaLink = basename($_SERVER['SCRIPT_NAME']);
        dd($paginaLink);
        // $user = user::all();

        // foreach ($user as $users) {
        //     if(Auth::user()->pvisualizar_agenda == 0){
        //         return redirect()->route('tip.home')->with('mensagem', 'Você não tem permissão para acessar esta página!');
        //     }else{
                $eventos = eventos::all();
                return view('admin.eventos.eventos', [
                    "eventos" => $eventos
                ]);
        //     }
        // }
        
    }
    public function viewCadastro()
    {
        // $user = user::all();

        // foreach ($user as $users) {
        //     if(Auth::user()->pcadastrar_agenda == 0){
        //         return redirect()->route('tip.erro')->with('mensagem', 'Você não tem permissão para cadastrar eventos!');
        //     }else{
                return view('admin.eventos.cadastrarEvento');
        //     }
        // }
    }

    public function cadastrado(Request $request)
    {

        $mesdata = $request['data'];

        $data = explode('-', $mesdata);

        switch ($data[1]) {
            case '01':
                $mesgeral = 'janeiro';
            break;
            case '02':
                $mesgeral = 'fevereiro';
            break;
            case '03':
                $mesgeral = 'março';
            break;
            case '04':
                $mesgeral = 'abril';
            break;
            case '05':
                $mesgeral = 'maio';
            break;
            case '06':
                $mesgeral = 'junho';
            break;
            case '07':
                $mesgeral = 'julho';
            break;
            case '08':
                $mesgeral = 'agosto';
            break;
            case '09':
                $mesgeral = 'setembro';
            break;
            case '10':
                $mesgeral = 'outubro';
            break;
            case '11':
                $mesgeral = 'novembro';
            break;
            case '12':
                $mesgeral = 'dezembro';
            break;
        }

        $dia = $data[2];

        $db = New eventos();

        $img_file = $request->file('img');

        if(isset($img_file)){

            $name_file = $img_file->getClientOriginalName();

            $ext_file = pathinfo($name_file, PATHINFO_EXTENSION);

            $img_convert = base64_encode(file_get_contents($request->file('img')));

            $db->ext = $ext_file;
            $db->name_img = $name_file;
            $db->imagem_evento = $img_convert;
        };
        
        $db->dia = $dia;
        $db->mes = strtoupper($mesgeral);
        $db->data = $request->input('data');
        $db->evento = $request->input('evento');
        $db->save();

        return redirect()->route('admin.eventos')->with('mensagem', 'O evento foi cadastrado com sucesso!');

    }

    public function editarEvento(Request $request, $id)
    {

        // $user = user::all();

        // foreach ($user as $users) {
        //     if(Auth::user()->peditar_agenda == 0
        //     ){
        //         return redirect()->route('tip.erro')->with('mensagem', 'Você não tem permissão para editar o evento!');
        //     }else{
                $db = eventos::find($id);

                return view('admin.eventos.editarEvento',[
                    'id' => $id,
                    'evento' => $db['evento'],
                    'data' => $db['data'],
                    'ext' => $db['ext'],
                    'name_img' => $db['name_img'],
                    'imagem_evento' => $db['imagem_evento'],
                ]); 
        //     }
        // }
        
    }

    public function editarSalvar(Request $request, $id)
    {
        $db = eventos::find($id);

        $img_file = $request->file('img');

        if(isset($img_file)){

            $name_file = $img_file->getClientOriginalName();

            $ext_file = pathinfo($name_file, PATHINFO_EXTENSION);

            $img_convert = base64_encode(file_get_contents($request->file('img')));

            $db['imagem_evento'] = $img_convert;
        };

        if(isset($name_file)){
            $db['name_img'] = $name_file;
        }

        if(isset($ext_file)){
            $db['ext'] = $ext_file;
        }
        
        $mesdata = $request['data'];

        $data = explode('-', $mesdata);

        switch ($data[1]) {
            case '01':
                $mesgeral = 'janeiro';
            break;
            case '02':
                $mesgeral = 'fevereiro';
            break;
            case '03':
                $mesgeral = 'março';
            break;
            case '04':
                $mesgeral = 'abril';
            break;
            case '05':
                $mesgeral = 'maio';
            break;
            case '06':
                $mesgeral = 'junho';
            break;
            case '07':
                $mesgeral = 'julho';
            break;
            case '08':
                $mesgeral = 'agosto';
            break;
            case '09':
                $mesgeral = 'setembro';
            break;
            case '10':
                $mesgeral = 'outubro';
            break;
            case '11':
                $mesgeral = 'novembro';
            break;
            case '12':
                $mesgeral = 'dezembro';
            break;
        }

        $dia = $data[2];

        $dados = $request->all();

        $evento = $dados['evento'];
        $data = $dados['data'];
        
        $db['dia'] = $dia;
        $db['mes'] = strtoupper($mesgeral);
        $db['evento'] = $evento;
        $db['data'] = $data;
        
        $db->save();

        return redirect()->route('admin.eventos')->with('mensagem', 'O evento foi atualizado com sucesso!');
    }

    public function confirm(Request $request, $id)
    {

        $db = eventos::find($id);
        return view('admin.eventos.confirmDelete', [
            'id' => $id,
        ]);
    }

    public function removerEvento(request $request)
    {
        
        // $user = user::all();

        // foreach ($user as $users) {
        //     if(Auth::user()->pdeletar_agenda == 0){
        //         return redirect()->route('admin.erro')->with('invalido', 'Você não tem permissão para remover esse evento!');
        //     }else{
                $user = eventos::find($request->id);
                $user->delete();

                return redirect()->route('admin.eventos')->with('invalido', 'O evento foi deletado com sucesso!');
        //     }
        // }
 
    }
    
    public function listar()
    {
        $dados = user::find(1);

        return response()->json(['dados' => $dados]);
    }
}
