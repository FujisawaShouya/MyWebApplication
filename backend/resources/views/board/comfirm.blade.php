@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('フレンドになりますか') }}</div>

        <div class="card-body">
          @foreach ($comfirms as $comfirm)
            <p>{{ $comfirm->title }}</p>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
@endsection