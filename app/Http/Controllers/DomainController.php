<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use GuzzleHttp\Client;

class DomainController extends Controller
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

    public function showAll()
    {
        $domains = DB::table('domains')->paginate(5);

        return view('domains', ['domains' => $domains]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'url' => 'required|url'
        ]);

        $client = new Client();

        $url = $request->input('url');
        $res = $client->request('GET', $url);
        $code = $res->getStatusCode();
        $contentLength = !empty($res->getHeader('Content-Length')) ? $res->getHeader('Content-Length')[0] : 0;
        $body = ($res->getBody()->getContents());
        $time = date('Y-m-d h:i', time());
        $id = DB::table('domains')->insertGetId(
            ['name' => $url, 'updated_at' => $time, 'created_at' => $time,
            'code' => $code, 'content_length' => $contentLength, 'body' => ($body)]
        );

        return redirect()->route('domain', ['id' => $id]);
    }
}
