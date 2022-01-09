@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('フレンド検索') }}</div>

        <div class="card-body">
          <div class="row mb-3">
            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('ゲームタイトル') }}</label>
            <div class="col-md-6">
              <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                value="{{ old('title') }}" required autocomplete="title" autofocus>
          
              @error('title')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div class="row mb-3">
            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('機種') }}</label>
            <div class="col-md-6">
              <select class="form-select" aria-label="Default select example">
                <option selected></option>
                <option value="1">PC</option>
                <option value="2">PS4/PS5</option>
                <option value="3">Switch</option>
                <option value="4">スマホ</option>
                <option value="5">XboxOne</option>
              </select>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection