<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\user;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class usuariosController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = user::all();

        return view('admin.usuarios.usuarios', [
            'users' => $users
        ]);
    }

    public function viewCadastro()
    {
        return view('admin.usuarios.cadastrarUsuario');
    }

    public function cadastrado(Request $request)
    {

        $db = New user();

        $teste = $request->file('avatar');

        if( isset($teste)){

            $name_file = $teste->getClientOriginalName();

            $ext = pathinfo($name_file, PATHINFO_EXTENSION);

            $item = base64_encode(file_get_contents($request->file('avatar')));

            $db->ext = $ext;
            $db->name_img = $name_file;
            $db->avatar = $item;
        };

        $verific_email = DB::table('users')->where('email', $request['email'])->count() == 1;

        if($verific_email == "true") {
            return redirect()->route('admin.usuarios')->with('invalido', 'E-Mail já existente!');
        }

        $db->name = $request->input('name');
        $db->email = $request->input('email');
        $db->telefone = $request->input('telefone');
        $db->password = bcrypt($request->input('password'));
        $db->save();

        return redirect()->route('admin.usuarios')->with('mensagem', 'O usuário foi cadastrado com sucesso!');

    }

    public function editarUsuario(Request $request, $id)
    {

        $user = user::all();

        // foreach ($user as $users) {
        //     if(Auth::user()->peditar_usuario == 0){
        //         return redirect()->route('admin')->with('mensagem', 'Você não tem permissão para acessar esta página!');
        //     }else{
                $db = user::find($id);
                return view('admin.usuarios.editarUsuarios',[
                    'id' => $id,
                    'name' => $db['name'],
                    'email' => $db['email'],
                    'avatar' => $db['avatar'],
                    'ext' => $db['ext'],
                    'name_img' => $db['name_img'],
                    'telefone' => $db['telefone'],
                    'password' => $db['password'],
                ]); 
        //     }
        // }
        
    }

    public function editarSalvar(Request $request, $id)
    {

        $db = user::find($id);

        $dados = $request->all();

         $teste2 = $request->file('avatar');

        if( isset($teste2)){

            $name_file = $teste2->getClientOriginalName();

            $ext1 = pathinfo($name_file, PATHINFO_EXTENSION);

            $item = base64_encode(file_get_contents($request->file('avatar')));

            $db['avatar'] = $item;
        };

        if(isset($name_file)){
            $name_img = $name_file;
            $db['name_img'] = $name_img;
        }

        if(isset($ext1)){
            $ext = $ext1;
            $db['ext'] = $ext;
        }

        // VERIFICANDO SE HÁ UM E-MAIL EXISTENTE

        $verific_email = DB::table('users')->where('email', $dados['email'])->count() == 1;

        if($verific_email == "true") {

            $name = $dados['name'];
            $email = $db['email'];
            $telefone = $dados['telefone'];
            $password = bcrypt($dados['password']);
            
            $db['name'] = $name;
            $db['telefone'] = $telefone;
            $db['email'] = $email;
            $db['password'] = $password;

            $db->save();

            return redirect()->route('admin.usuarios')->with('invalido', 'E-Mail já existente!');
        } else{

            $name = $dados['name'];
            $email = $dados['email'];
            $telefone = $dados['telefone'];
            $password = bcrypt($dados['password']);
            
            $db['name'] = $name;
            $db['telefone'] = $telefone;
            $db['email'] = $email;
            $db['password'] = $password;

            $db->save();

            return redirect()->route('admin.usuarios')->with('mensagem', 'O usuário foi atualizado com sucesso!');

        }

    }

    public function confirm(Request $request, $id)
    {
        $db = user::find($id);
        return view('admin.usuarios.confirmDelete', [
            'id' => $id,
        ]);
    }

     public function removerUsuario(request $request)
    {
        
        // $user = user::all();

        // foreach ($user as $users) {
        //     if(Auth::user()->pdeletar_usuario == 0){
        //         return redirect()->route('admin')->with('mensagem', 'Você não tem permissão para acessar esta página!');
        //     }else{
                $user = user::find($request->id);
                $user->delete();

                return redirect()->route('admin.usuarios')->with('invalido', 'O usuário foi deletado com sucesso!');
        //     }
        // }
 
    }
}