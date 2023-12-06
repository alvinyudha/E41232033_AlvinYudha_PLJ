@extends ('partials.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Konfirmasi Cuti</div>

                    <div class="card-body">
                        <form action="{{ route('cuti.konfirmasi.submit', $cuti) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="0" {{ $cuti->status === 0 ? 'selected' : '' }}>Belum Dikonfirmasi
                                    </option>
                                    <option value="1" {{ $cuti->status === 1 ? 'selected' : '' }}>Dikonfirmasi</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Konfirmasi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
