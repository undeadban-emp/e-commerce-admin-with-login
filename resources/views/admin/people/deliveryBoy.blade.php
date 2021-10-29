@extends('layouts.main')
@section('title', 'Delivery Boy')
@section('people', 'active')
@section('peopleShow', 'show')
@section('deliveryBoyActive', 'active')
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
