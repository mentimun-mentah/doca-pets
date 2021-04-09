@extends('admin.app')
@section('content')
<all-news :storage="{{json_encode(asset('storage/news/'))}}" :admin="{{json_encode(url('/admin/'))}}"></all-news>
@endsection
