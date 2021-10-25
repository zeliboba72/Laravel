<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand me-4" href="{{ route('home') }}">{{ env('APP_NAME') }}</a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link{{ \Illuminate\Support\Facades\Route::is('articles.index') ? " active" : "" }}"
                   href="{{ route('articles.index') }}">Статьи</a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ \Illuminate\Support\Facades\Route::is('rating') ? " active" : ""}}"
                   href="{{ route('rating') }}">Рейтинг статей</a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ \Illuminate\Support\Facades\Route::is('about') ? " active" : "" }}"
                   href="{{ route('about') }}">О нас</a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ \Illuminate\Support\Facades\Route::is('article-categories.index') ? " active" : "" }}"
                   href="{{ route('article-categories.index') }}">Категории статей</a>
            </li>
        </ul>
    </nav>
</header>
