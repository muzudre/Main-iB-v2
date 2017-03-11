<?php

namespace App\Http\Controllers;

use App\Models\Agents;
use App\Models\Policy;
use App\Models\Users;
use App\userstable;
use Backpack\CRUD\CrudTrait;


class UserController extends Controller
{
    use CrudTrait;

    public function index(){
        $userstable = userstable::all();
        return \View::make('user.index')->with('userstable', $userstable);
    }

    public function show($id){
        //get the product
        $users = Users::find($id);
        $policy = Policy::where('user_id',$id)->get();
        $agents =  Agents::all();
        $agent = Users::where('id',$id)->get();
        // show the view and pass the product to it
        return \View::make('user.show',compact('users','policy','agents','agent'));
    }
}
