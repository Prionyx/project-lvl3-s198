<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use GuzzleHttp\Client;
use DiDom\Document;

class DomainController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function show($id)
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
        $rules = ['url' => 'required|url'];

        $validator = Validator::make($request->all(), [
            'url' => 'required|url'
        ]);
        if ($validator->fails()) {
            $errors = $validator ? $validator->errors()->all() : [];
            return view('home', ['errors' => $errors]);
        }

        $client = new Client();

        $url = $request->input('url');
        $res = $client->request('GET', $url);
        $code = $res->getStatusCode();
        $contentLength = !empty($res->getHeader('Content-Length')) ? $res->getHeader('Content-Length')[0] : 0;
        $body = ($res->getBody()->getContents());

        $document = new Document($body);
        $keywords = $document->first('meta[name=keywords]');
        $keywordsContent = $keywords ? $keywords->getAttribute('content') : null;
        $description = $document->first('meta[name=description]');
        $descriptionContent = $description ? $description->getAttribute('content') : null;
        $h1 = $document->first('h1');
        $h1Content = $h1 ? $h1->text() : null;

        $time = date('Y-m-d h:i', time());
        $id = DB::table('domains')->insertGetId(
            ['name' => $url, 'updated_at' => $time, 'created_at' => $time,
            'code' => $code, 'content_length' => $contentLength, 'body' => utf8_encode($body),
            'h1' => $h1Content, 'keywords' => $keywordsContent, 'description' => $descriptionContent]
        );
        return redirect()->route('domain', ['id' => $id]);
    }
}
