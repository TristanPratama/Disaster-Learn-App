@extends('layouts.main')

@section('container')

    <!-- Collapsable Card Example -->
    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardBiodata" class="d-block card-header py-3" data-toggle="collapse"
            role="button" aria-expanded="true" aria-controls="collapseCardBiodata">
            <h6 class="m-0 font-weight-bold text-primary">Biodata Responden</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="collapseCardBiodata">
            <div class="card-body text-gray-800">
                <table class="table-responsive">
                    <tr>
                        <td><span class="mr-5">Nama Lengkap</span></td>
                        <td>: {{ $Responden->nama_lengkap }}</td>
                    </tr>
                    <tr>
                        <td><span class="mr-5">Usia</span></td>
                        <td>: {{ $Responden->usia }}</td>
                    </tr>
                    <tr>
                        <td><span class="mr-5">Jenis Kelamin</span></td>
                        <td>: {{ $Responden->jenis_kelamin }}</td>
                    </tr>
                    <tr>
                        <td><span class="mr-5">Alamat</span></td>
                        <td>: {{ $Responden->alamat }}</td>
                    </tr>
                    <tr>
                        <td><span class="mr-5">Nomor Handphone (WhatsApp)</span></td>
                        <td>: {{ $Responden->hp }}</td>
                    </tr>
                    <tr>
                        <td><span class="mr-5">Asal Institusi</span></td>
                        <td>: {{ $Responden->institusi }}</td>
                    </tr>
                    <tr>
                        <td><span class="mr-5">Jenis Anggota</span></td>
                        <td>: {{ $Responden->jenis_anggota }}</td>
                    </tr>
                    <tr>
                        <td><span class="mr-5">Email</span></td>
                        <td>: {{ $User->email }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardHasilPretest" class="d-block card-header py-3" data-toggle="collapse"
            role="button" aria-expanded="true" aria-controls="collapseCardHasilPretest">
            <h6 class="m-0 font-weight-bold text-primary">Hasil Pretest</h6>
        </a>
        <div class="collapse show" id="collapseCardHasilPretest">
            <div class="card-body text-gray-800">
                <strong class="text-capitalize">{{ $Responden->nama_lengkap }}</strong> telah menjadi responden dalam penelitian
                <strong>"The Effect of Disaster Management Learning Application to Improve Disaster Preparedness"</strong>
                @if (!$Pretest)
                    Namun belum mengerjakan Pretest.
                @else
                    serta telah mengerjakan Pretest pada <strong>{{ $Pretest->created_at }}</strong> dan mendapatkan nilai <strong>{{ $Responden->nilai_pre }}</strong>.
                @endif
                <br><br>
                <div class="table-responsive">
                    <table class="table table-bordered text-gray-800" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pertanyaan</th>
                                <th>Kunci</th>
                                <th>Jawaban</th>
                                <th>Code</th>
                            </tr>
                        </thead>
                        @if (!$Pretest)
                        <tbody> </tbody>
                        @else
                        <tbody>
                            @foreach ($questions as $question)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $question->value }}</td>
                                <td>{{ $question->answer == 1 ? 'Benar' : 'Salah' }}</td>
                                <td>{{ data_get($Pretest, 'answer' . ($loop->index + 1)) == 1 ? 'Benar' : 'Salah' }}</td>
                                <td class="text-center">
                                    @if ($question->answer == data_get($Pretest, 'answer' . ($loop->index + 1)))
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
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseCardHasilPostest" class="d-block card-header py-3" data-toggle="collapse"
            role="button" aria-expanded="true" aria-controls="collapseCardHasilPostest">
            <h6 class="m-0 font-weight-bold text-primary">Hasil Postest</h6>
        </a>
        <div class="collapse show" id="collapseCardHasilPostest">
            <div class="card-body text-gray-800">
                <strong class="text-capitalize">{{ $Responden->nama_lengkap }}</strong> telah menjadi responden dalam penelitian
                <strong>"The Effect of Disaster Management Learning Application to Improve Disaster Preparedness"</strong>
                @if (!$Posttest)
                    Namun belum mengerjakan Posttest.
                @else
                    serta telah mengerjakan Posttest pada <strong>{{ $Posttest->created_at }}</strong> dan mendapatkan nilai <strong>{{ $Responden->nilai_post }}</strong>.
                @endif
                <br><br>
                <div class="table-responsive">
                    <table class="table table-bordered text-gray-800" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pertanyaan</th>
                                <th>Kunci</th>
                                <th>Jawaban</th>
                                <th>Code</th>
                            </tr>
                        </thead>
                        @if (!$Posttest)
                        <tbody> </tbody>
                        @else
                        <tbody>
                            @foreach ($questions as $question)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $question->value }}</td>
                                <td>{{ $question->answer == 1 ? 'Benar' : 'Salah' }}</td>
                                <td>{{ data_get($Posttest, 'answer' . ($loop->index + 1)) == 1 ? 'Benar' : 'Salah' }}</td>
                                <td class="text-center">
                                    @if ($question->answer == data_get($Posttest, 'answer' . ($loop->index + 1)))
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
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection
