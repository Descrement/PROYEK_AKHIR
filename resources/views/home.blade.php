@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            {{ __('Dashboard') }}
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('TOTAL BUKU') }}</h5>
                            <h2 class="card-text">{{ $buku }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mx-auto my-auto">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('TOTAL PEMINJAMAN') }}</h5>
                            <h2 class="card-text">{{ $peminjaman }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('TOTAL PELANGGAN') }}</h5>
                            <h2 class="card-text">{{ $pelanggan }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Include CoreUI styles and scripts -->
    <link rel="stylesheet" href="{{ asset('node_modules/@coreui/coreui/dist/css/coreui.min.css') }}">
    <script src="{{ asset('node_modules/@coreui/coreui/dist/js/coreui.bundle.min.js') }}"></script>
@endsection
