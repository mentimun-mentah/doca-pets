@extends('layouts.app')
@section('content')
<chat :current_user="{{Auth::user()}}" :storage="{{json_encode(asset('storage/avatar/'))}}"></chat>
@endsection
