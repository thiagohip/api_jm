<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stack;

class StackController extends Controller
{
    function create(Request $request){
        $stack = Stack::create([
            "name"=>$request->name,
            "image_path"=>$request->image_path,
        ]);
        return response()->json([
            "message"=> "Stack created",
            "stack" => $stack,
        ]);
    }

    function index(){
        $stacks = Stack::all();
        return response()->json([
            "stacks" => $stacks
        ]);
    }
}
