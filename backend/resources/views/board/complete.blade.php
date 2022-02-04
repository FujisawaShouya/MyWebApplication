@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card card-body">
        @foreach ($boards as $board)
        <table>
          <tr>
            <td style="width: 50%">
              <p>{{ $board->user->name }} さん</p>
              <h5>DiscordID:  {{ $board->user->discord_id }}</h5>
            </td>
            <td>
              フレンドになりました！！
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