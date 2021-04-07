@extends('layouts.app')
@section('content')
<doctor :home="{{json_encode(url('/'))}}"></doctor>
@endsection
