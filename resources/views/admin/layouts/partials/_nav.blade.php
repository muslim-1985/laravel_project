
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">WebSiteName</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="{{ action('Admin\PostController@index') }}">Posts</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Categories filter <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        {{-- создаем в App/Providers/AppServiceProvider@boot() фукцию доступа к модели Category
                             из всех шаблонов (чтобы не вызывать эту модель в каждом контроллере
                             ведь навигационное меню у нас одно на все контроллеры
                             и пришлось бы в каждом контроллере вызывать модель
                             Categories и передевать ее в переменной навигационному меню
                             для этого и существуют ServiceProviders и View::composer (передает виду нужную модель
                             которая доступна везде) внутри функции boot() которая гарантирует
                             загрузку СервисПровайдера после загрузки других сервисов
                             Реализацию можно посмотреть пройдя по пути указанному выше.)
                              и передаем ее там же переменной $categories и выводим все в шаблоне
                         --}}
                        {{-- фильтрация категорий. Передаем айдишник категории методу контроллера PostController CategoryFilter --}}
                        @foreach($categories as $category)
                            <li><a href="{{ route('category.filter',$category->id) }}">{{ $category->title }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="{{ action('Admin\TagController@index') }}">Tags</a></li>
                <li><a href="{{ route('admin.show') }}">Users</a></li>
                <li><a href="{{ route('admin.comment.index') }}">Comments</a></li>
                <li><a href="{{ action('Admin\CategoryController@index') }}">Categories</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('user.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endguest
            </ul>
        </div>
    </div>
</nav>