@extends('layouts.app')
@section('content')
<doctor-profile :user="{{$user}}" :storage="{{json_encode(asset('storage/doctor/'))}}"></doctor-profile>
@endsection
