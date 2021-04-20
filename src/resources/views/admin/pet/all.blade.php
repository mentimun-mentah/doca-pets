@extends('admin.app')
@section('content')
<all-pet :storage="{{json_encode(asset('storage/pet/'))}}" :admin="{{json_encode(url('/admin/'))}}"></all-pet>
@endsection
