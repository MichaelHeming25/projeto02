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

        $mes = $mesgeral;

        $db = New eventos();

        $teste = $request->file('img');

        if( isset($teste)){

            $name_file = $teste->getClientOriginalName();

            $ext = pathinfo($name_file, PATHINFO_EXTENSION);

            $item = base64_encode(file_get_contents($request->file('img')));

            $db->ext = $ext;
            $db->name_img = $name_file;
            $db->imagem_evento = $item;
        };
        
        $db->dia = $dia;
        $db->mes = strtoupper($mes);
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

        $mes = substr("$mesgeral", 0, 3);

        $dados = $request->all();

        $evento = $dados['evento'];
        $data = $dados['data'];
        
        $db['dia'] = $dia;
        $db['mes'] = strtoupper($mes);
        $db['evento'] = $evento;
        $db['data'] = $data;
        
        $db->save();

        return redirect()->route('tip.agenda')->with('mensagem', 'O evento foi atualizado com sucesso!');
    }

    public function confirm(Request $request, $id)
    {

        $db = user::find($id);
        return view('TIP.agenda.confirmDelete', [
            'id' => $id,
        ]);
    }

    public function removerAgenda(request $request)
    {
        
        $user = user::all();

        foreach ($user as $users) {
            if(Auth::user()->pdeletar_agenda == 0){
                return redirect()->route('tip.erro')->with('invalido', 'Você não tem permissão para remover esse evento!');
            }else{
                $user = eventos::find($request->id);
                $user->delete();

                return redirect()->route('tip.erroRemover')->with('invalido', 'O evento foi deletado com sucesso!');
            }
        }
 
    }
    
    public function listar()
    {
        $dados = user::find(1);

        return response()->json(['dados' => $dados]);
    }
}
