<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        return view('news.index');
    }

    public function create(Request $request)
    {
        $request->validate([
          'judul' => 'required|string|min:3|max:255|unique:news',
          'photo' => 'required|mimes:jpg,jpeg,png|max:2000',
          'deskripsi' => 'required|string|min:5',
        ]);

      # save image to storage
      $photoName = Str::random(20).'.'.$request->photo->getClientOriginalExtension();
      $request->photo->move(public_path('storage/news/'),$photoName);

      News::create([
        'judul' => $request->judul,
        'slug' => Str::slug($request->judul,'-'),
        'photo' => $photoName,
        'deskripsi' => $request->deskripsi,
      ]);

      return ['status' => 'Success create news'];
    }

    public function getAllNews(Request $request)
    {
        $query = News::query();
        return $query->paginate(6);
    }

    public function update(Request $request)
    {
      $news = News::findOrFail($request->id);

      $request->validate([
        'judul' => 'required|string|min:3|max:255|unique:news,judul,'.$news->id,
        'photo' => 'nullable|mimes:jpg,jpeg,png|max:2000',
        'deskripsi' => 'required|string|min:5',
      ]);

      $news->judul = $request->judul;
      $news->deskripsi = $request->deskripsi;
      $news->save();

      # update image
      $imagePath = public_path('storage/news/'.$news->photo);
      if($request->photo && file_exists($imagePath)) {
        unlink($imagePath); 
        # save image to storage
        $photoName = Str::random(20).'.'.$request->photo->getClientOriginalExtension();
        $request->photo->move(public_path('storage/news/'),$photoName);
        $news->photo = $photoName;
        $news->save();
      }

      toast('Success update news','success');
      return ['status' => 'Success update news'];
    }

    public function delete($id)
    {
      $news = News::findOrFail($id);

      # delete image
      $imagePath = public_path('storage/news/'.$news->photo);
      if(file_exists($imagePath)) unlink($imagePath); 

      $news->delete();

      return ['status' => 'Success delete news'];
    }
}
