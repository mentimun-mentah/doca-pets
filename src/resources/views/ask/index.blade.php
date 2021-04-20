@extends('layouts.app')
@section('content')
<ask :home="{{json_encode(url('/'))}}" :storage="{{json_encode(asset('storage/'))}}"></ask>
@endsection
