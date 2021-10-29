@extends('layouts.main')
@section('title', 'User')
@section('people', 'active')
@section('peopleShow', 'show')
@section('userActive', 'active')
@prepend('page-css')
{{-- CSS HERE --}}
@endprepend

@prepend('meta-data')

@endprepend
@section('content')
{{-- content --}}


@push('page-scripts')
{{-- JS SCRIPTS HERE --}}
@endpush
@endsection
