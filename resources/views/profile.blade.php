@extends('layouts.app')

@section('content')

<div class="container">
        @if(session()->has('error'))
            <div class="alert alert-danger">{{session()->get('error')}}</div>
        @endif
        <form action="{{ route('avatar.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>
                <div class="custom-file">
                    <input type="file" name="avatar" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
                <input type="submit" value="upload" class="btn btn-success ml-4">
            </div>
        </form>

    <div class="card-columns">
        @foreach($avatars as $avatar)
            <div class="card">
                <img src="{{ $avatar->getUrl('card') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <div class="float-left">
                        <i class="fas fa-check"></i>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
