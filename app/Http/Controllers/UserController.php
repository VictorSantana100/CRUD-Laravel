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
        $user = User::create([
            'primeiro_nome' => $request->primeiro_nome,
            'sobrenome' => $request->sobrenome,
            'num_celular' => $request->num_celular,
            'email' => $request->email
        ]);

        if($user){
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

    public function get_load_user($user_id){
        $user = User::with('vinculo')->where('id', $user_id)->first();
        return view('user_update',[
            'user'=>$user
        ]);
    }

    public function set_update_user(Request $request, $user_id){
        $user = User::where('id', $user_id)->first();
        if(!$user)
            return  session()->flash('error', 'Usuário não encontrado!');
        $user->update([
            'primeiro_nome' => $request->primeiro_nome,
            'sobrenome' => $request->sobrenome,
            'num_celular' => $request->num_celular,
            'email' => $request->email
        ]);
        
        $vinculo = DB::table('vinculo_empregaticio')->where('user_key', $user_id)->first();
        $atualiza_vinculo = VinculoEmpregaticio::find($vinculo->id);
        $atualiza_vinculo->cargo = $request->cargo;
        $atualiza_vinculo->departamento = $request->departamento;
        if($atualiza_vinculo->save()){
            session()->flash('success', 'Usuário atualizado com sucesso!');
            return redirect()->route('list.users');
        }
        session()->flash('error', 'Erro ao atualizar usuário!');
        return redirect()->route('list.users');
    }

    public function set_drop_user($user_id){
        $vinculo = DB::table('vinculo_empregaticio')->where('user_key', $user_id)->first();
        if(VinculoEmpregaticio::destroy($vinculo->id)){
            if(User::destroy($user_id)){
                session()->flash('success', 'Usuário deletado com sucesso!');
                return redirect()->route('list.users');
            }
        }
        session()->flash('error', 'Erro ao deletar usuário!');
        return redirect()->route('list.users');
    }
}
