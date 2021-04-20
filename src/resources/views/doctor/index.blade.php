@extends('layouts.app')
@section('content')
<doctor :home="{{json_encode(url('/'))}}" :storage="{{json_encode(asset('storage/avatar/'))}}"></doctor>
@endsection
