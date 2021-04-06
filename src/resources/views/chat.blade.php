@extends('layouts.app')
@section('content')
<chat :current_user="{{Auth::user()}}"></chat>
@endsection
