<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::select('id', 'news_title', 'news_date', 'news_img', 'news_content')->get();
        return view('news', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'news_date' => 'required|date',
            'news_title' => 'required|string',
            'news_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file validation rules as needed
            'news_content' => 'required|string',
        ]);

        // Handle file upload
        $imagePath = $request->file('news_img')->store('news_images', 'public');

        // Create a new news record
        $news = new News();
        $news->news_date = $request->input('news_date');
        $news->news_title = $request->input('news_title');
        $news->news_img = $imagePath; // Store the file path, not the actual image
        $news->news_content = $request->input('news_content');
        $news->save();

        return redirect()->route('news.index')->with('success', 'Tin tức mới đã được tạo.');

    }
    public function show(string $id)
    {
        $news = News::find($id);
        $other_news = News::orderBy('id', 'desc')->take(7)->get();
        return view('full-news', compact('news','other_news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $news = News::find($id);
        return view('news.edit', compact('news'));
    }

    public function quanli()
    {
        $all_news = News::all(); // Lấy tất cả dữ liệu từ bảng products
        return view('news.index',compact('all_news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $request->validate([
            'news_date' => 'required|date',
            'news_title' => 'required|string',
            'news_img' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file validation rules as needed
            'news_content' => 'required|string',
        ]);

        $news = News::find($id);

        $news->news_date = $request->input('news_date');
        $news->news_title = $request->input('news_title');
        $news->news_content = $request->input('news_content');

        if ($request->hasFile('news_img')) {
            // Handle file upload
            $imagePath = $request->file('news_img')->store('news_images', 'public');
            $news->news_img = $imagePath;
        }

        $news->save();

        return redirect()->route('news.index')->with('success', 'Tin tức đã được cập nhật.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $news = News::find($id);

        if (!$news) {
            return redirect()->route('news.index')->with('error', 'Tin tức không tồn tại.');
        }

        $news->delete();

        return redirect()->route('news.index')->with('success', 'Tin tức đã được xóa.');
    }
}
