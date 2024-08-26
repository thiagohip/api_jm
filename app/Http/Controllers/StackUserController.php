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
            "user_stack" => $data,
        ]);
    }

    function index(){
        $user = User::find(Auth()->user()->id);
        $data = StackUser::whereBelongsTo($user)->get();

        $stacks = [];
        foreach ($data as $key => $i) {
            array_push($stacks, Stack::find($i["stack_id"]));
        }

        return $stacks;
       
    }

}
