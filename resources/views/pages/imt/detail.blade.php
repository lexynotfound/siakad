@extends('layouts.app')

@section('title', 'IMT Detail')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail IMT</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">IMT</a></div>
                    <div class="breadcrumb-item">All IMT</div>
                </div>
            </div>
            <div class="section-body">

                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Detail IMT</h4>
                                <div class="section-header-button">
                                    <a href="{{ route('imt.create') }}" class="btn btn-primary">Create IMT</a>
                                </div>
                            </div>
                            <div class="card-body">


                                <div class="clearfix mb-3"></div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="card">
                                            <div class="card-header">
                                                Detail Data IMT
                                            </div>
                                        <div class="card-body">
                                            <h5 class="card-title">Nama: {{ $imt->nama }}</h5>
                                            <p class="card-text">Phone: {{ $imt->phone }}</p>
                                            <p class="card-text">Tinggi Badan: {{ $imt->tinggi_badan }} cm</p>
                                            <p class="card-text">Berat Badan: {{ $imt->berat_badan }} kg</p>
                                            <p class="card-text">Status Berat Badan Anda: {{ $imt->status }}</p>
                                </div>
                </div>
            </div>
        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush

@endsection

