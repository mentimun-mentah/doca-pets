<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Doctor;
use App\Models\User;
use App\Jobs\SendEmailAcceptDoctor;
use App\Jobs\SendEmailRejectDoctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    public function index()
    {
        return view('doctor.index');
    }

    public function show($id)
    {
        $doctor = Doctor::with('user')->findOrFail($id);
        return view('doctor.show',['doctor' => $doctor]);
    }

    public function profile()
    {
        $user = Doctor::where('user_id','=',Auth::user()->id)->firstOrFail();
        return view('doctor.profile', ['user' => $user]);
    }

    public function allDoctorApprove(Request $request)
    {
        $query = Doctor::where('status','accept')->with('user');
        return $query->orderBy('total_like', 'desc')->paginate(6);
    }

    public function updateProfile(Request $request)
    {
      $doctor = Doctor::findOrFail($request->id);

      $request->validate([
        'spesialis' => 'required|string|min:3|max:255',
        'deskripsi' => 'required|string|min:5',
        'nama_klinik' => 'required|string|min:3|max:255',
        'lokasi' => 'required|regex:/<iframe\s*src="https:\/\/www\.google\.com\/maps\/embed\?[^"]+"*\s*[^>]+>*<\/iframe>/',
        'pengalaman_praktik' => 'required|string|min:5',
        'riwayat_pendidikan' => 'required|string|min:5'
      ]);

      $doctor->spesialis = $request->spesialis;
      $doctor->deskripsi = $request->deskripsi;
      $doctor->nama_klinik = $request->nama_klinik;
      $doctor->lokasi = $request->lokasi;
      $doctor->pengalaman_praktik = $request->pengalaman_praktik;
      $doctor->riwayat_pendidikan = $request->riwayat_pendidikan;
      $doctor->save();

      toast('Success update profile','success');
      return ['status' => 'Success update profile'];
    }

    public function getAllDoctor(Request $request)
    {
      $doctor = Doctor::with('user');
      if($request->status) $doctor->where('status','=',$request->status);

      return $doctor->orderBy('id', 'desc')->paginate(6);
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
