@extends('admin.app')
@section('content')
<change-pet :pet="{{$pet}}" :storage="{{json_encode(asset('storage/pet/'))}}"></change-pet>
@endsection
