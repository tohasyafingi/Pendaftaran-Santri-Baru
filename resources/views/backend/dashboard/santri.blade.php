@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1>Dashboard Peserta Didik</h1>
        <p>Halo peserta, {{ auth()->user()->name }}.</p>
    </div>
@endsection
