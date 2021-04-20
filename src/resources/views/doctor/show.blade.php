@extends('layouts.app')
@section('content')
<doctor-detail :doctor="{{$doctor}}" :storage="{{json_encode(asset('storage/avatar/'))}}"></doctor-detail>
@endsection
