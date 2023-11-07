@extends('layouts.app')

@section('title', 'Blank Page')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Form Validation</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Form Validation</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Form Validation</h2>
                <p class="section-lead">
                    Form validation using default from Bootstrap 4
                </p>

                <div class="row">
                    <div class="col-12 col-md-6 col-lg-12">
                        <div class="card">
                            <form action="{{route('user.store')}}" method="post">
                                @csrf
                                <div class="card-header">
                                    <h4>New User</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Your Name</label>
                                        <input type="text"
                                            class="form-control @error('name')
                                            is-invalid
                                            @enderror"
                                            required="" name="name">
                                            @error('name')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email"
                                            class="form-control @error('email')
                                            is-invalid
                                            @enderror"
                                            required="" name="email">
                                            @error('email')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password"
                                            class="form-control @error('password')
                                            is-invalid
                                            @enderror" name="password">
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text"
                                            class="form-control " name="phone">
                                    </div>
                                    <div class="form-group">
                                    <label class="form-label">Roles</label>
                                    <div class="selectgroup selectgroup-pills">
                                        <label class="selectgroup-item">
                                            <input type="radio"
                                                name="roles"
                                                value="admin"
                                                class="selectgroup-input"
                                                checked="">
                                            <span class="selectgroup-button">ADMIN</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio"
                                                name="roles"
                                                value="dosen"
                                                class="selectgroup-input">
                                            <span class="selectgroup-button">DOSEN</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio"
                                                name="roles"
                                                value="mahasiswa"
                                                class="selectgroup-input">
                                            <span class="selectgroup-button">MAHASISWA</span>
                                        </label>
                                    </div>
                                </div>
                                    <div class="form-group mb-0">
                                        <label>Address</label>
                                        <textarea class="form-control"
                                            data-height="150"
                                            required="" name="address"></textarea>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
