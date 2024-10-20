@extends('layouts.responden')

@section('container')
    <div class="card shadow mb-4 col-md-6 offset-md-3">
        <div class="card-header py-3 text-center">
            <h5 class="m-0 font-weight-bold text-primary">PENGISIAN BIODATA</h5>
        </div>
        <div class="card-body text-gray-800">
            @if(session('error'))
                <div class="alert alert-danger text-center">
                    <b>Opps!</b> {{session('error')}}
                </div>
            @endif
            <form class="user" action="{{route('actionbiodata')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" placeholder="Nama Lengkap" id="nama_lengkap" value="{{ old('nama_lengkap') }}" required autocomplete="nama_lengkap">
                    @error('nama_lengkap')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="usia" class="form-label">Usia</label>
                    <input type="number" name="usia" class="form-control @error('usia') is-invalid @enderror" placeholder="Usia" id="usia" value="{{ old('usia') }}" required autocomplete="usia">
                    @error('usia')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <div class="form-check">
                        <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio" value="Laki-Laki" id="laki" name="jenis_kelamin" value="{{ old('jenis_kelamin') }}" required autocomplete="jenis_kelamin">
                        <label class="form-check-label" for="laki">
                          Laki-Laki
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio" value="Perempuan" id="perempuan" name="jenis_kelamin" value="{{ old('jenis_kelamin') }}" required autocomplete="jenis_kelamin">
                        <label class="form-check-label" for="perempuan">
                          Perempuan
                        </label>
                    </div>
                    @error('jenis_kelamin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="Alamat" id="alamat" value="{{ old('alamat') }}" required autocomplete="alamat">
                    @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="hp" class="form-label">Nomor Handphone (WhatsApp)</label>
                    <input type="tel" name="hp" class="form-control @error('hp') is-invalid @enderror" placeholder="Nomor Handphone (WhatsApp)" id="hp" value="{{ old('hp') }}" required autocomplete="hp">
                    @error('hp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="institusi" class="form-label">Asal Institusi</label>
                    <input type="text" name="institusi" class="form-control @error('institusi') is-invalid @enderror" placeholder="Asal Institusi" id="institusi" value="{{ old('institusi') }}" required autocomplete="institusi">
                    @error('institusi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jenis_anggota" class="form-label">Jenis Anggota Relawan</label>
                    <div class="row-md-12">
                        <select class="form-select form-control @error('jenis_anggota') is-invalid @enderror" id="jenis_anggota" name="jenis_anggota" value="{{ old('jenis_anggota') }}" required autocomplete="jenis_anggota">
                            <option value="" hidden>Pilih Salah Satu....</option>
                            <option value="Basic">Basic</option>
                            <option value="Intermediate">Intermediate</option>
                            <option value="Advance">Advance</option>
                        </select>
                    </div>
                    @error('jenis_anggota')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="p1" class="form-label">Apakah Anda pernah mengikuti latihan gempa/kebakaran sebelumnya?</label>
                    <div class="form-check">
                        <input class="form-check-input @error('p1') is-invalid @enderror" type="radio" value="Ya" id="ya1" name="p1" value="{{ old('p1') }}" required autocomplete="p1">
                        <label class="form-check-label" for="ya1">
                          Ya
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input @error('p1') is-invalid @enderror" type="radio" value="Tidak" id="tidak1" name="p1" value="{{ old('p1') }}" required autocomplete="p1">
                        <label class="form-check-label" for="tidak1">
                          Tidak
                        </label>
                    </div>
                    @error('p1')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="p2" class="form-label">Apakah Anda pernah mengalami dampak akibat  bencana alam sebelumnya?</label>
                    <div class="form-check">
                        <input class="form-check-input @error('p2') is-invalid @enderror" type="radio" value="Ya" id="ya2" name="p2" value="{{ old('p2') }}" required autocomplete="p2">
                        <label class="form-check-label" for="ya2">
                          Ya
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input @error('p2') is-invalid @enderror" type="radio" value="Tidak" id="tidak2" name="p2" value="{{ old('p2') }}" required autocomplete="p2">
                        <label class="form-check-label" for="tidak2">
                          Tidak
                        </label>
                    </div>
                    @error('p2')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="p3" class="form-label">Apakah Anda pernah memiliki kerabat yang pernah mengalami bencana alam sebelumnya?</label>
                    <div class="form-check">
                        <input class="form-check-input @error('p3') is-invalid @enderror" type="radio" value="Ya" id="ya3" name="p3" value="{{ old('p3') }}" required autocomplete="p3">
                        <label class="form-check-label" for="ya3">
                          Ya
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input @error('p3') is-invalid @enderror" type="radio" value="Tidak" id="tidak3" name="p3" value="{{ old('p3') }}" required autocomplete="p3">
                        <label class="form-check-label" for="tidak3">
                          Tidak
                        </label>
                    </div>
                    @error('p3')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                <hr>
            </form>
        </div>
    </div>
@endsection
