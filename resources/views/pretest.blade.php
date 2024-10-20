@extends('layouts.responden')

@section('container')
<div class="card shadow mb-4 col-md-6 offset-md-3">
    <div class="card-header py-3 text-center">
        <h5 class="m-0 font-weight-bold text-primary">PRE TEST</h5>
    </div>
    <div class="card-body text-gray-800">
        @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger text-center">
                <b>Opps!</b> {{session('error')}}
            </div>
        @endif
        <form class="user" action="{{route('actionpretest')}}" method="post">
            @csrf
            @foreach ($questions as $question)
                @php
                    $inputName = "answer" . $loop->index+1;
                @endphp
                <div class="form-group">
                    <label for="{{ $inputName }}" class="form-label">{{ $loop->index+1 . ". " . $question->value }}</label>
                    <div class="form-check">
                        <input class="form-check-input @error('{{ $inputName }}') is-invalid @enderror" type="radio" value="1" id="benar{{ $loop->index+1 }}" name="{{ $inputName }}" value="{{ old($inputName) }}" required autocomplete="{{ $inputName }}">
                        <label class="form-check-label" for="benar{{ $loop->index+1 }}">
                        Benar
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input @error('{{ $inputName }}') is-invalid @enderror" type="radio" value="0" id="salah{{ $loop->index+1 }}" name="{{ $inputName }}" value="{{ old($inputName) }}" required autocomplete="{{ $inputName }}">
                        <label class="form-check-label" for="salah{{ $loop->index+1 }}">
                        Salah
                        </label>
                    </div>
                    @error('{{ $inputName }}')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            @endforeach
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
            <hr>
        </form>
    </div>
</div>
@endsection
