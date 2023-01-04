<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\VinculoEmpregaticio;
use App\Http\Requests\FormValidate;
use App\Http\Requests\UpdateValidate;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function get_insert_user(){
        return view('user');
    }

    public function set_insert_user(FormValidate $request){
        $user = new User();
        $user->primeiro_nome = $request->primeiro_nome;
        $user->sobrenome = $request->sobrenome;
        $user->num_celular = $request->num_celular;
        $user->email = $request->email;

        if($user->save()){
            $new_user = DB::table('users')->where('email',$request->email)->first();
            $user_key = $new_user->id;

            $vinculo = new VinculoEmpregaticio();
            $vinculo->cargo = $request->cargo;
            $vinculo->departamento = $request->departamento;
            $vinculo->user_key = $user_key;
            $vinculo->save();

            session()->flash('success', 'Usuário inserido com sucesso!');
            return redirect()->route('list.users');
        }

        session()->flash('error', 'Erro ao inserir usuário!');
        return redirect()->route('insert.user');
    }

    public function get_load_user(Request $request){
        $user = DB::table('users')->where('id', $request->user_id)->first();
        $primeiro_nome = $user->primeiro_nome;
        $sobrenome = $user->sobrenome;
        $num_celular = $user->num_celular;
        $email = $user->email;

        $vinculo = DB::table('vinculo_empregaticio')->where('user_key',$request->user_id)->first();
        $cargo = $vinculo->cargo;
        $departamento = $vinculo->departamento;

        return view('user_update',[
            'primeiro_nome'=>$primeiro_nome,
            'sobrenome'=>$sobrenome,
            'num_celular'=>$num_celular,
            'email'=>$email,
            'cargo'=>$cargo,
            'departamento'=>$departamento,
            'user_id'=>$request->user_id
        ]);
    }

    public function set_update_user(UpdateValidate $request){
        $atualiza_user = User::find($request->id);
        $atualiza_user->primeiro_nome = $request->primeiro_nome;
        $atualiza_user->sobrenome = $request->sobrenome;
        $atualiza_user->num_celular = $request->num_celular;
        $atualiza_user->email = $request->email;

        if($atualiza_user->save()){

            $vinculo = DB::table('vinculo_empregaticio')->where('user_key', $request->id)->first();
            $atualiza_vinculo = VinculoEmpregaticio::find($vinculo->id);
            $atualiza_vinculo->cargo = $request->cargo;
            $atualiza_vinculo->departamento = $request->departamento;
            
            if($atualiza_vinculo->save()){

                session()->flash('success', 'Usuário atualizado com sucesso!');
                return redirect()->route('list.users');
            }
        }

        session()->flash('error', 'Erro ao atualizar usuário!');
        return redirect()->route('list.users');
    }

    public function set_drop_user(Request $request){
        $vinculo = DB::table('vinculo_empregaticio')->where('user_key',$request->user_id)->first();
        if(VinculoEmpregaticio::destroy($vinculo->id)){
            if(User::destroy($request->user_id)){
                session()->flash('success', 'Usuário deletado com sucesso!');
                return redirect()->route('list.users');
            }
        }
        session()->flash('error', 'Erro ao deletar usuário!');
        return redirect()->route('list.users');
    }
}
