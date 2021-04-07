@extends('layouts.app')
@section('content')
<ask :home="{{json_encode(url('/'))}}"></ask>
@endsection
