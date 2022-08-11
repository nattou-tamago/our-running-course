@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 col-xl-4 offset-xl-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title mb-3">ログイン</h5>
                        <form action="{{ route('login') }}" method="POST" novalidate>
                            @csrf

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
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="remember" value="{{ old('remember') ? 'checked': '' }}" id="remember">
                                    <label for="remember" class="form-check-label">ログイン状態を保持</label>
                                </div>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary">ログイン</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
