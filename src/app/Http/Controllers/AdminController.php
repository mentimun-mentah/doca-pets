<?php

namespace App\Http\Controllers;

use App\Models\Pet;
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
}
