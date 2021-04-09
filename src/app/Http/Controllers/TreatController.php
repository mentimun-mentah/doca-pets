<?php

namespace App\Http\Controllers;

use App\Models\Treat;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TreatController extends Controller
{
    public function index()
    {
        return view('treat.index');
    }

    public function show($slug)
    {
        $treat = Treat::where('slug','=',$slug)->firstOrFail();
        return view('treat.show', ['treat' => $treat]);
    }

    public function create(Request $request)
    {
        $request->validate([
          'judul' => 'required|string|min:3|max:255|unique:treats',
          'photo' => 'required|mimes:jpg,jpeg,png|max:2000',
          'deskripsi' => 'required|string|min:5',
        ]);

        # save image to storage
        $photoName = Str::random(20).'.'.$request->photo->getClientOriginalExtension();
        $request->photo->move(public_path('storage/treat/'),$photoName);

        Treat::create([
          'judul' => $request->judul,
          'slug' => Str::slug($request->judul,'-'),
          'photo' => $photoName,
          'deskripsi' => $request->deskripsi,
        ]);

        return ['status' => 'Success create treat'];
    }

    public function getAllTreat(Request $request)
    {
        $query = Treat::query();
        return $query->orderBy('id', 'desc')->paginate(6);
    }

    public function update(Request $request)
    {
      $treat = Treat::findOrFail($request->id);

      $request->validate([
        'judul' => 'required|string|min:3|max:255|unique:treats,judul,'.$treat->id,
        'photo' => 'nullable|mimes:jpg,jpeg,png|max:2000',
        'deskripsi' => 'required|string|min:5',
      ]);

      $treat->judul = $request->judul;
      $treat->deskripsi = $request->deskripsi;
      $treat->save();
      # update image
      $imagePath = public_path('storage/treat/'.$treat->photo);
      if($request->photo && file_exists($imagePath)) {
        unlink($imagePath); 
        # save image to storage
        $photoName = Str::random(20).'.'.$request->photo->getClientOriginalExtension();
        $request->photo->move(public_path('storage/treat/'),$photoName);
        $treat->photo = $photoName;
        $treat->save();
      }

      toast('Success update treat','success');
      return ['status' => 'Success update treat'];
    }

    public function delete($id)
    {
      $treat = Treat::findOrFail($id);

      # delete image
      $imagePath = public_path('storage/treat/'.$treat->photo);
      if(file_exists($imagePath)) unlink($imagePath); 

      $treat->delete();

      return ['status' => 'Success delete treat'];
    }
}
