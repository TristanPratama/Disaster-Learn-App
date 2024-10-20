@extends('layouts.main')

@section('container')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="{{ route('export_excel') }}" class=" d-sm-inline-block btn btn-sm btn-success shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
        </a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Total Responden -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Responden (Total)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $RespondenCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Pretest -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Pre Test (Total)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $PretestCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Posttest -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Post Test (Total)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $PosttestCount }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Hasil Responden</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-gray-800" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Responden</th>
                            <th>Pre Test</th>
                            <th>Post Test</th>
                            <th>Tanggal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @if (count($respondens) != 0)
                    <tbody>
                        @foreach ($respondens as $responden)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td class="text-capitalize">{{ $responden->nama_lengkap }}</td>
                            <td>{{ $responden->nilai_pre}}</td>
                            <td>{{ $responden->nilai_post}}</td>
                            <td>{{ $responden->created_at}}</td>
                            <td>
                                <a href="{{ route('show_responden', $responden->user_id) }}" class="btn btn-primary btn-sm">
                                    <span class="icon">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </a>
                                <button type="button" data-toggle="modal" data-target="#DeleteModal{{$responden->user_id}}" class="btn btn-danger btn-sm">
                                    <span class="icon">
                                        <i class="fas fa-trash"></i>
                                    </span>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    @else
                    <tbody> </tbody>
                    @endif
                </table>
            </div>
        </div>
    </div>

    <!-- Delete Modal-->
    @foreach ($respondens as $responden)
        <div class="modal fade" id="DeleteModal{{ $responden->user_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Apakah ingin dihapus?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Pilih "Delete" jika Anda yakin ingin menghapus data tersebut.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <form method="POST" action="{{ route('responden_destroy', $responden->user_id) }}" accept-charset="UTF-8" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" >
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection