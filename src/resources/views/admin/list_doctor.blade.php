@extends('admin.app')
@section('content')
<list-doctor :storage="{{json_encode(asset('storage/doctor/'))}}"></list-doctor>
@endsection
