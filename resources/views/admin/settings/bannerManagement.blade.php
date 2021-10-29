@extends('layouts.main')
@section('title', 'Banner Management')
@section('settings', 'active')
@section('settingsShow', 'show')
@section('bannerManagementActive', 'active')
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
