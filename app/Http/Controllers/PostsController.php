<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function index() 
    {
        // $posts = DB::select('select * from posts where id= :id', ['id' => 1]);
        $id = 7;
        $posts = DB::table('posts')
            // ->where('id', $id)
            // ->select('body')
            // ->where('created_at', '>', now()->subDay())
            // ->where('id', '=', '11')
            // ->orWhere('title', 'Prof.')
            // ->whereBetween('id', [7, 9])
            // ->whereNotNull('title')
            // ->select('title')
            // ->distinct()
            // ->orderBy('created_at', 'asc')
            // ->latest()
            // ->oldest()
            // ->inRandomOrder()
            // ->get();
            // ->first();
            // ->find($id);
            // ->count();
            // ->min('id');
            // ->max('id');
            // ->sum('id');
            // ->avg('id');
            // ->insert([
            //     'title' => 'New post',
            //     'body'  => 'New body',
            // ]);
            ->where('id', '=', 11)
            // ->update([
            //     'title' => 'New Title',
            //     'body' => 'New body'
            // ]);
            ->delete();

        dd($posts);
        // Non fluent
        // DB::select(['table' => 'posts', 'where' => ['id' => 1])

        // Fluent
        // DB:table('posts')->where('id', 1)->get()
        // return view('posts.index');
    }
}
