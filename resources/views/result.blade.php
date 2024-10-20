@extends('layouts.responden')

@section('container')
    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 text-center">
            <h5 class="m-0 font-weight-bold text-primary">BIODATA</h5>
        </div>
        <div class="card-body text-gray-800">
            <table>
                <tr>
                    <td><span class="mr-5">Nama Lengkap</span></td>
                    <td>: {{ $biodata->nama_lengkap }}</td>
                </tr>
                <tr>
                    <td><span class="mr-5">Usia</span></td>
                    <td>: {{ $biodata->usia }}</td>
                </tr>
                <tr>
                    <td><span class="mr-5">Jenis Kelamin</span></td>
                    <td>: {{ $biodata->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <td><span class="mr-5">Alamat</span></td>
                    <td>: {{ $biodata->alamat }}</td>
                </tr>
                <tr>
                    <td><span class="mr-5">Nomor Handphone (WhatsApp)</span></td>
                    <td>: {{ $biodata->hp }}</td>
                </tr>
                <tr>
                    <td><span class="mr-5">Asal Institusi</span></td>
                    <td>: {{ $biodata->institusi }}</td>
                </tr>
                <tr>
                    <td><span class="mr-5">Jenis Anggota</span></td>
                    <td>: {{ $biodata->jenis_anggota }}</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3 text-center">
                    <h5 class="m-0 font-weight-bold text-primary">NILAI PRETEST</h5>
                </div>
                <div class="card-body text-gray-800 text-center">
                    <h1>{{ $biodata->nilai_pre }}</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3 text-center">
                    <h5 class="m-0 font-weight-bold text-primary">NILAI POSTTEST</h5>
                </div>
                <div class="card-body text-gray-800 text-center">
                    <h1>{{ $biodata->nilai_post }}</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 text-center">
            <h5 class="m-0 font-weight-bold text-primary">HASIL TEST</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-gray-800" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pertanyaan</th>
                            <th>Kunci</th>
                            <th>Pre Test</th>
                            <th>Post Test</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($questions as $question)
                        @php
                            $inputName = "answer" . $loop->index+1;
                        @endphp
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $question->value }}</td>
                            <td>{{ $question->answer == 1 ? 'Benar' : 'Salah' }}</td>
                            <td class="text-center">
                                @if ($pretest->{$inputName} == $question->answer)
                                    <span class="icon btn btn-success btn-circle btn-sm">
                                        <i class="fas fa-check"></i>
                                    </span>
                                @else
                                    <span class="icon btn btn-danger btn-circle btn-sm">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($posttest->{$inputName} == $question->answer)
                                    <span class="icon btn btn-success btn-circle btn-sm">
                                        <i class="fas fa-check"></i>
                                    </span>
                                @else
                                    <span class="icon btn btn-danger btn-circle btn-sm">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mb-4 mt-4">
        <a href="materi1" class="btn btn-primary btn-block col-md-6 offset-md-3">Lihat Materi</a>
    </div>

@endsection
