<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StackUser;
use App\Models\Stack;
use App\Models\User;

class StackUserController extends Controller
{
    function create(Request $request){
        $data = StackUser::create([
            "user_id" => $request->user_id,
            "stack_id" => $request->stack_id,
        ]);
        return response()->json([
            "message" => "success",
            "user_stack" => $data,
        ]);
    }

    function index($page){
        $user = User::find(Auth()->user()->id);
        $data = StackUser::whereBelongsTo($user)->get();
        if($page < count($data)){
            $stacks = Stack::find($data[$page]["stack_id"]);
            return $stacks;
        }
        return response()->json([
            "message" => "Invalid page",
        ]);
    }

    function maxPage(){
        $user = User::find(Auth()->user()->id);
        $data = StackUser::whereBelongsTo($user)->get();
        return count($data)-1;
    }
}
