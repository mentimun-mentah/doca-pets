<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use App\Jobs\SendEmailAcceptDoctor;
use App\Jobs\SendEmailRejectDoctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        return view('doctor.index');
    }

    public function show($id)
    {
        return view('doctor.show');
    }

    public function profile()
    {
        return view('doctor.profile');
    }

    public function getAllDoctor(Request $request)
    {
      $doctor = Doctor::with('user');
      if($request->status) $doctor->where('status','=',$request->status);

      return $doctor->paginate(6);
    }

    public function acceptDoctor($id)
    {
      $doctor = Doctor::with('user')->findOrFail($id);

      # make user active
      $doctor->user->status = 1;
      $doctor->user->save();

      # make user doctor status accept
      $doctor->status = 'accept';
      $doctor->save();

      SendEmailAcceptDoctor::dispatch($doctor->user);
      return ['status' => 'Success accept dr. '.$doctor->user->name];
    }

    public function rejectDoctor($id)
    {
      $doctor = Doctor::with('user')->findOrFail($id);

      # make user unactive
      $doctor->user->status = 0;
      $doctor->user->save();

      # make user doctor status reject
      $doctor->status = 'reject';
      $doctor->save();

      SendEmailRejectDoctor::dispatch($doctor->user);
      return ['status' => 'Success reject dr. '.$doctor->user->name];
    }
}
