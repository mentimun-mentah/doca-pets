@extends('layouts.app')
@section('content')
<home :home="{{json_encode(url('/'))}}" :storage="{{json_encode(asset('storage/'))}}"></home>
@endsection
