@extends('layouts.app')
@section('content')
<account :storage="{{json_encode(asset('storage/avatar'))}}"></account>
@endsection
