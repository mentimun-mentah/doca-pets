@extends('layouts.app')
@section('content')
<news :storage="{{json_encode(asset('storage/news'))}}"></news>
@endsection
