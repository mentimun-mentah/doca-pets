@extends('layouts.app')
@section('content')
<treat :home="{{json_encode(url('/'))}}" :storage="{{json_encode(asset('storage/treat/'))}}"></treat>
@endsection
