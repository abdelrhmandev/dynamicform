@extends('layouts.app')
@section('title', 'sdsdas')
@section('breadcrumbs')
 
@stop
@section('style')

    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css" />
 @stop
@section('content')

<form action="{{ route('fields.store') }}" method="post">
    @csrf 
    <input type="text" name="name" id="name">
    <input type="submit">
</form>
  


@stop
@section('scripts')

    <script src="{{ asset('assets/js/custom/utilities/modals/fields/create-field.js') }}"></script>
    <script src="{{ asset('assets/js/custom/Tachyons.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom/es6-shim.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
 
    
@stop
