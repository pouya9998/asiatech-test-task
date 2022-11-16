<ul class="navbar-nav me-auto mb-2 mb-md-0">
    <li class="nav-item">
        <a class="nav-link {{Route::currentRouteName() == 'front.index' ? 'active' : '' }}" aria-current="page" href="{{route('front.index')}}">{{__('word.home')}}</a>
    </li>
    @foreach($categories as $category)
        <li class="nav-item">
            <a class="nav-link" href="{{route('front.index',['category_id' => $category->id])}}">{{$category->title}}</a>
        </li>
    @endforeach
    @auth()
        <li class="nav-item">
            <a class="nav-link" href="{{route('auth.logout')}}">{{__('word.logout')}}</a>
        </li>
    @endauth
    @guest()
        <li class="nav-item">
            <a class="nav-link {{Route::currentRouteName() == 'auth.login.index' ? 'active' : '' }}" href="{{route('auth.login.index')}}">{{__('word.login')}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{Route::currentRouteName() == 'auth.register.index' ? 'active' : '' }}" href="{{route('auth.register.index')}}">{{__('word.register')}}</a>
        </li>
    @endguest

</ul>
