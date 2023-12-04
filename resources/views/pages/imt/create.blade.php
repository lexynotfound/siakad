@extends('layouts.app')

@section('title', 'Create IMT')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Form IMT</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{route('home')}}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{route('imt.index')}}">IMT</a></div>
                    <div class="breadcrumb-item">Form IMT</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Form Data IMT</h2>
                <p class="section-lead">
                    Form validation using default from Bootstrap 4
                </p>

                <div class="row">
                    <div class="col-12 col-md-6 col-lg-12">
                        <div class="card">
                            <form action="{{route('imt.store')}}" method="post">
                                @csrf
                                <div class="card-header">
                                    <h4>New Data IMT</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Your Name</label>
                                        <input type="text"
                                            class="form-control @error('nama')
                                            is-invalid
                                            @enderror"
                                            required="" name="nama">
                                            @error('nama')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text"
                                            class="form-control @error('phone') is-invalid @enderror"
                                            required="" name="phone" id="phoneInput">
                                            @error('phone')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Weight</label>
                                        <input type="text"
                                            class="form-control " name="berat_badan">
                                    </div>
                                    <div class="form-group">
                                        <label>Height</label>
                                        <input type="text"
                                            class="form-control" name="tinggi_badan">
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

<!-- ... -->
<div id="phoneExistsModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Phone Number Exists</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="phoneExistsMessage">The phone number already exists in the database. Please use a different phone number.</p>
                <p id="phoneDetails" style="display: none;">Phone number: <span id="existingPhone"></span><br>Name: <span id="existingName"></span></p>
            </div>

            <div class="modal-footer">
                <a href="#" id="detailLink" target="_blank" class="btn btn-primary">Lihat Detail</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script>
    $(document).ready(function () {
        $('#phoneInput').blur(function () {
            var phoneNumber = $(this).val();
            $.ajax({
                url: '{{ route('imt.checkPhoneNumber') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    phone: phoneNumber
                },
                success: function (response) {
                    if (response.exists) {
                        $('#phoneExistsModal').modal('show');
                        // Tampilkan pesan error juga di field input phone
                        $('#phoneInput').addClass('is-invalid');
                        $('#phoneInput').siblings('.invalid-feedback').text('The phone number already exists in the database.');

                        // Tampilkan nomor telepon dan nama yang sudah ada
                        $('#existingPhone').text(response.phone);
                        $('#existingName').text(response.name);
                        $('#phoneExistsMessage').show();
                        $('#phoneDetails').show();

                         // Set URL untuk tombol "Lihat Detail" sesuai dengan data yang ditemukan
                        $('#detailLink').attr('href', '{{ route("imt.show", ":id") }}'.replace(':id', response.id));
                    }
                }
            });
        });
    });
    </script>
    <!-- Page Specific JS File -->
@endpush
