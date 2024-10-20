@extends('layouts.responden')

@section('container')
<div class="card shadow mb-4">
    <div class="card-header py-3 text-center">
        <h5 class="m-0 font-weight-bold text-primary">VIDEO MATERI</h5>
        @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
    </div>
    <div class="card-body text-gray-800">
        @if ($count == 0)
            <p>Tonton video materi berikut hingga selesai untuk melanjutkan ke halaman berikutnya.</p>
        @endif
        <div class="embed-responsive embed-responsive-16by9">
            <iframe id="video-iframe" src="https://www.youtube.com/embed/IdIyrLNAiW0?enablejsapi=1"></iframe>
        </div>
    </div>
    <div class="mb-4 mt-4">
        @if ($count != 0)
            <a href="materi2" id="" class="btn btn-primary btn-block col-md-6 offset-md-3">Selanjutnya</a>
        @else
            <a href="materi2" id="next-page-button" class="btn btn-primary btn-block col-md-6 offset-md-3 disabled">Selanjutnya</a>
        @endif
    </div>
@endsection
