<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Stack;
use App\Models\User;

class StackController extends Controller
{
    function store(Request $request){
        $stack = new Stack();

        $stack->name = $request->name;
        $stack->user_id = Auth()->user()->id;

        if($stack->save()){
            return response()->json([
                "message" => "Stack cadastrada com sucesso!",
                "stack" => $stack,
            ]);
        }else{
            return response()->json([
                "message" => "Erro ao cadastrar a stack!"
            ]);
        }
    }

    function index(){
        $user = User::find(Auth()->user()->id);
        $stacks = Stack::whereBelongsTo($user)->get();

        return $stacks;
    }
}
