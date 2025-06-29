@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1>Dashboard Calon Peserta Didik</h1>
        <p>Halo calon peserta, {{ auth()->user()->name }}.</p>
    </div>
@endsection
