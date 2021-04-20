@extends('admin.app')
@section('content')
<all-treat :storage="{{json_encode(asset('storage/treat/'))}}" :admin="{{json_encode(url('/admin/'))}}"></all-treat>
@endsection
