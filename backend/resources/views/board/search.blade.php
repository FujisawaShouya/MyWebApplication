@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card" style="width: 54rem;">
        <div class="card-header">{{ __('フレンド検索') }}</div>

        <div class="card-body">
          <form action="/search" method="GET">
            @csrf
            <div class="row mb-3">
              <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('※ゲームタイトル') }}</label>
              <div class="col-md-6">
                <input id="searched-title" type="text"
                  class="form-control @error('searched-title') is-invalid @enderror" name="searched_title"
                  value="{{ old('searched-title') }}" autocomplete="searched-title" placeholder="例&#41; VALORANT">
                {{-- @error('searched-title')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror --}}
              </div>
            </div>
            <div class="row mb-3">
              <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('※機種') }}</label>
              <div class="col-md-6">
                <select class="form-select" aria-label="Default select example" name="searched_platform">
                  <option selected></option>
                  <option value="PC">PC</option>
                  <option value="PS4/PS5">PS4/PS5</option>
                  <option value="Switch">Switch</option>
                  <option value="スマホ">スマホ</option>
                  <option value="XboxOne">XboxOne</option>
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <label for="time" class="col-md-4 col-form-label text-md-end">{{ __('投稿時間') }}</label>
              <div class="col-md-6">
                <select class="form-select" aria-label="Default select example" name="searched_time">
                  <option selected></option>
                  <option value="1">30分以内</option>
                  <option value="2">1時間以内</option>
                  <option value="3">24時間以内</option>
                  <option value="4">48時間以内</option>
                  <option value="5">それ以降</option>
                </select>
              </div>
            </div>
            <div class="d-md-flex justify-content-md-end">
              <button type="submit" class="btn btn-outline-primary">検索</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container mt-4">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card card-body " style="width: 54rem;">
        @foreach ($boards as $board)
          <table class="table">
            <tr>
              <td style="width: 50%">
                <p>{{ $board->user->name }} さん</p>
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  フレンドになる
                </button>
                
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">フレンドになりますか？</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="row mb-3">
                          <h5 class="col-md-4 text-md-end">ゲームタイトル :</h5>
                          <p class="col-md-6 align-middle">{{ $board->title }}</p>
                          <h5 class="col-md-4 text-md-end">機種 :</h5>
                          <p class="col-md-6 align-middle">{{ $board->platform }}</p>
                          <h5 class="col-md-4 text-md-end">プレイヤーID :</h5>
                          <p class="col-md-6 align-middle">{{ $board->player }}</p>
                          <h5 class="col-md-4 text-md-end">DiscordID :</h5>
                          <p class="col-md-6 align-middle">{{ $board->user->discord_id }}</p>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">キャンセル</button>
                        <button type="button" class="btn btn-primary">フレンドになる</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- EndModal -->
              </td>
              <td>
                <h5>{{ $board->title }} （{{ $board->platform }}）</h5>
                <p>{{ $board->player }}</p>
                <p style="white-space:pre-wrap;">{{ $board->comment }}</p>
              </td>
            </tr>
          </table>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection