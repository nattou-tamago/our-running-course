@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 col-xl-4 offset-xl-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title mb-3">ユーザー登録</h5>
                        <form action="{{ route('register') }}" method="POST" novalidate>
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">ユーザー名</label>
                                <input name="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid': '' }}" value="{{ old('name') }}" id="name" autofocus required>

                                @if($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">メールアドレス</label>
                                <input name="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid': '' }}" value="{{ old('email') }}" id="email" required>

                                @if($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">パスワード</label>
                                <input name="password" type="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid': '' }}" required>

                                @if($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">パスワード（確認）</label>
                                <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" required>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary">登録する</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
