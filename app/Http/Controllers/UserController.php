<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class UserController extends Controller
{
    public function showHome()
    {
        return view('home');
    }

    public function showNew($id)
    {
        $domain = DB::table('domains')->where('id', $id)->first();
        return view('domain', ['domain' => $domain]);
    }

    public function show()
    {
        $domains = DB::table('domains')->paginate(5);

        return view('domains', ['domains' => $domains]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'url' => 'required|url'
        ]);

        $url = $request->input('url');
        $time = date('Y-m-d h:i', time());
        $id = DB::table('domains')->insertGetId(
            ['name' => $url, 'updated_at' => $time, 'created_at' => $time]
        );
        return redirect()->route('domain', ['id' => $id]);
    }
}
