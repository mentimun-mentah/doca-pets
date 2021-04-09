@extends('layouts.app')
@section('content')
<treat-detail :treat="{{$treat}}" :storage="{{json_encode(asset('storage/treat/'))}}"></treat-detail>
@endsection
