@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-body">
          @foreach ($comfirms as $comfirm)
          <table>
            <tr>
              <td style="width: 50%">
                <p>{{ $comfirm->user->name }} さん</p>
                <h5>DiscordIDはボタンを押すと表示されます</h5>
                <form action="/mypage" action="GET">
                  <input type="hidden" name="id" value="{{ $comfirm->id }}">
                  <button type="submit" class="btn btn-outline-primary">フレンドになる</button>
                </form>
              </td>
              <td>
                <h5>{{ $comfirm->title }} （{{ $comfirm->platform }}）</h5>
                <p>{{ $comfirm->player }}</p>
                <p style="white-space:pre-wrap;">{{ $comfirm->comment }}</p>
              </td>
            </tr>
          </table>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
@endsection