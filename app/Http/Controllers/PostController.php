<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Post;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function store() {
        // return view('welcome');

        $api_url = 'jsonplaceholder.typicode.com/posts';
        $response = Http::get($api_url);
        $raw_data = $response->body();
        $data = json_decode($raw_data, true);
        
        foreach ($data as $row => $column) {
            $in_data[] = [
                'user_id' => $column['userId'],
                'id' => $column['id'],
                'title' => $column['title'],
                'body' => $column['body'],
            ];
        }

        // echo "<pre>";
        // print_r($data);
        // print_r($in_data);
        // echo "</pre>";

        $execute = DB::table('posts')->insertOrIgnore($in_data);
        $return['info'] = 'success';
        return response()->json($return);
    }

    public function show($id){
        if ($id != 'all') {
            $get = DB::table('posts')->where('id', $id)->first();
        } else{
            $get = DB::table('posts')->get();
        }
        $return['info'] = 'success';
        $return['data'] = $get;
        return response()->json($return);
    }
    
    public function delete_all_post(){
    }

    public function delete_post($id){
        $execute = DB::table('posts')
        ->where([
            'id' => $id
        ])
        ->delete();
        $return['info'] = 'success';
        return response()->json($return);
    }
}
