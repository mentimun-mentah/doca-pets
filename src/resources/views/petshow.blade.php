@extends('layouts.app')
@section('content')
<pet-show :pet="{{$pet}}" :storage="{{json_encode(asset('storage/pet/'))}}"></pet-show>
@endsection
