@extends('admin.app')
@section('content')
<change-news :news="{{$news}}" :storage="{{json_encode(asset('storage/news/'))}}"></change-news>
@endsection
