<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\News;
use App\Models\Treat;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function listDoctor()
    {
        return view('admin.list_doctor');
    }

    public function addPet()
    {
      return view('admin.pet.add');
    }

    public function allPet()
    {
      return view('admin.pet.all');
    }

    public function changePet($id)
    {
      $pet = Pet::findOrFail($id);
      return view('admin.pet.change', ['pet' => $pet]);
    }

    public function addNews()
    {
      return view('admin.news.add');
    }

    public function allNews()
    {
      return view('admin.news.all');
    }

    public function changeNews($id)
    {
      $news = News::findOrFail($id);
      return view('admin.news.change',['news' => $news]);
    }

    public function addTreat()
    {
      return view('admin.treat.add');
    }

    public function allTreat()
    {
      return view('admin.treat.all');
    }

    public function changeTreat($id)
    {
      $treat = Treat::findOrFail($id);
      return view('admin.treat.change', ['treat' => $treat]);
    }
}
