<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PetsController extends Controller
{
    public function show($slug)
    {
        return view('petshow');
    }

    public function create(Request $request)
    {
      $request->validate([
        'nama' => 'required|string|min:3|max:255|unique:pets',
        'photo' => 'required|mimes:jpg,jpeg,png|max:2000',
        'deskripsi' => 'required|string|min:5',
        'jenis' => 'required|string|min:3|max:20|in:anjing,kucing',
      ]);

      # save image to storage
      $photoName = Str::random(20).'.'.$request->photo->getClientOriginalExtension();
      $request->photo->move(public_path('storage/pet/'),$photoName);

      Pet::create([
        'nama' => $request->nama,
        'slug' => Str::slug($request->nama,'-'),
        'photo' => $photoName,
        'deskripsi' => $request->deskripsi,
        'jenis' => $request->jenis
      ]);

      return ['status' => 'Success create pet'];
    }

    public function getAllPet(Request $request)
    {
      $query = Pet::query();
    
      if($request->q) $query->where('nama','LIKE','%'.$request->q.'%');
      if($request->jenis) $query->where('jenis','=',$request->jenis);

      return $query->paginate(6);
    }

    public function update(Request $request)
    {
      $pet = Pet::findOrFail($request->id);

      $request->validate([
        'nama' => 'required|string|min:3|max:255|unique:pets,nama,'.$pet->id,
        'photo' => 'nullable|mimes:jpg,jpeg,png|max:2000',
        'deskripsi' => 'required|string|min:5',
        'jenis' => 'required|string|min:3|max:20|in:anjing,kucing',
      ]);

      $pet->nama = $request->nama;
      $pet->deskripsi = $request->deskripsi;
      $pet->jenis = $request->jenis;
      $pet->save();

      # update image
      $imagePath = public_path('storage/pet/'.$pet->photo);
      if($request->photo && file_exists($imagePath)) {
        unlink($imagePath); 
        # save image to storage
        $photoName = Str::random(20).'.'.$request->photo->getClientOriginalExtension();
        $request->photo->move(public_path('storage/pet/'),$photoName);
        $pet->photo = $photoName;
        $pet->save();
      }
     
        toast('Success update pet','success');
        return ['status' => 'Success update pet'];
    }

    public function delete($id)
    {
      $pet = Pet::findOrFail($id);
      # delete image
      $imagePath = public_path('storage/pet/'.$pet->photo);
      if(file_exists($imagePath)) unlink($imagePath); 

      $pet->delete();

      return ['status' => 'Success delete pet'];
    }
}
