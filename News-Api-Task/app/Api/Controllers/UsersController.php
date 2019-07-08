<?php

namespace App\Api\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        if($user){
            return $this->response->array($user->toArray());
        }else{
            return $this->response->errorNotFound();
        }
    }
}