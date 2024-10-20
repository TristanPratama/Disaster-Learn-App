@extends('layouts.main')

@section('container')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Pertanyaan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-gray-800" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pertanyaan</th>
                            <th>Jawaban</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @if (count($questions) != 0)
                    <tbody>
                        @foreach ($questions as $question)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $question->value }}</td>
                            <td>{{ $question->answer == 1 ? 'Benar' : 'Salah' }}</td>
                            <td>
                                <button type="button" data-toggle="modal" data-target="#editModal{{$question->id}}" class="btn btn-primary btn-sm">
                                    <span class="icon">
                                        <i class="fas fa-pen"></i>
                                    </span>
                                </button>
                                <button type="button" data-toggle="modal" data-target="#DeleteModal{{$question->id}}" class="btn btn-danger btn-sm">
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


    @foreach ($questions as $question)
        <div class="modal fade" id="editModal{{$question->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="height: 90%">
            <div class="modal-dialog modal-dialog-centered card container py-4" role="document">
                <div class="card-header mb-3">
                    <h6 class="m-0 font-weight-bold text-primary"> Edit Daftar Pertanyaan</h6>
                </div>
                <div class="modal-content card-body">
                    <form action="{{ route('questions_update', $question->id) }}" method="post" class="d-sm-inline-block form-block mr-auto ml-md-3 my-2 my-md-0 navbar-search col-12">
                        @csrf
                        @method('PUT')
                        <div class="row mb-1">
                            <label for="">Pertanyaan</label> <br>
                        </div>
                        <div class="row mb-4">
                            <input type="hidden" class="form-control bg-light border-0 small" name="id" value="{{ $question->id }}">
                            <textarea type="text" class="form-control bg-light border-0 col-11 text-wrap" style="height: 150px" name="value"> {{ $question->value }} </textarea>
                        </div>
                        <div class="row mb-1">
                            <label for="">Jawaban</label>
                        </div>
                        <div class="row mb-4">
                            <select class="form-select form-control bg-light border-0 small col-11" aria-label="Default select example" name="answer" id="answer">
                                <option value="1" {{ $question->answer == 1 ? 'selected' : '' }}>Benar</option>
                                <option value="0" {{ $question->answer == 0 ? 'selected' : '' }}>Salah</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-7">&nbsp;</div>
                            <div class="col-5">
                                <div class="input-group">
                                    <button class="btn btn-primary" name="submit">
                                        <span class="text">Submit</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Delete Modal-->
    @foreach ($questions as $question)
        <div class="modal fade" id="DeleteModal{{ $question->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                        <form method="POST" action="{{ route('question_destroy', $question->id) }}" accept-charset="UTF-8" style="display:inline">
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