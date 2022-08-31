<nav class="navbar navbar-expand-lg sticky-top navbar-light {{ Request::routeIs('home.index') ? '' : 'nav-bg'}}">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home.index') }}"><img src="{{ asset('images/running_icon.svg') }}" alt="running_icon" width="25">みんなのランニングコース</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse fw-bolder" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('courses.index') }}">コース一覧</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('courses.create') }}">コースの新規登録</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                @guest
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">ログイン</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link">ユーザー登録</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.show', ['user' => Auth::user()->id]) }}">マイページ</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">ログアウト（{{ Auth::user()->name }} さん）</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
