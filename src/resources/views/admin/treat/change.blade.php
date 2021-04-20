@extends('admin.app')
@section('content')
<change-treat :treat="{{$treat}}" :storage="{{json_encode(asset('storage/treat/'))}}"></change-treat>
@endsection
