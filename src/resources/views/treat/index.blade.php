@extends('layouts.app')
@section('content')
<treat :home="{{json_encode(url('/'))}}"></treat>
@endsection
