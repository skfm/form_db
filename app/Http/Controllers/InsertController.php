<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Worker;
use App\Http\Requests\InsertRequest;

class InsertController extends Controller
{
    //
    public function getIndex()
    {
        $workers = Worker::orderBy('created_at', 'desc')->paginate(5);
        return view('insert.index',['workers' => $workers]);
    }

    public function confirm(InsertRequest $request)
    {
        $data = $request->all();
        return view('insert.confirm')->with($data);
    }

    public function finish(InsertRequest $request)
    {
        $user = new Worker;

        $user->username = $request->username;
        $user->mail = $request->mail;
        $user->age = $request->age;
        $user->save();

        return view('insert.finish');
    }
}
