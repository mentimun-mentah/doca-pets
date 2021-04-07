@extends('layouts.app')
@section('content')
<home :home="{{json_encode(url('/'))}}"></home>
@endsection
