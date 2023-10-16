<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::select('id', 'news_title', 'news_date', 'news_img', 'news_content')
    ->orderBy('id', 'desc')
    ->take(8)
    ->get();
        return view('home', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function __invoke()
    {
        // Your controller logic here
    }
}
