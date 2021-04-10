@extends('layouts.app')
@section('content')
<ask-detail
  :home="{{json_encode(url('/'))}}" 
  :comment="{{$comment}}"
  :storage="{{json_encode(asset('storage/'))}}"
  :current_user="{{!Auth::guest() ? Auth::user() : 'null'}}"
>
</ask-detail>
@endsection
