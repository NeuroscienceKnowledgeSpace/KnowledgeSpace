@extends('layouts.app')

@section('content')
<div class='container page-container'>
  <div id='search-page' data-q="{{ $q }}" data-page="{{$page}}" data-sort="{{ $sort }}" data-redirect="{{ $redirect }}" ></div>
</div>
@endsection