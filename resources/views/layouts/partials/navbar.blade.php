<nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home.index') }}">みんなのランニングコース</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('courses.index') }}">コース一覧</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('courses.create') }}">コースの新規登録</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link">ログイン</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">ユーザー登録</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">ログアウト</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
