<nav class="navbar navbar-expand-lg bg-white navbar-light p-0">
    <a href="" class="navbar-brand d-block d-lg-none">
        <h1 class="m-0 display-4 text-primary">Klean</h1>
    </a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
        <div class="navbar-nav mr-auto py-0">
            
            <a href="{{ route('main') }}" class="nav-item nav-link active">{{ __('Bosh sahifa') }}</a>
            <a href="{{ route('about') }}" class="nav-item nav-link">{{ __('Biz haqimizda') }}</a>
            <a href="{{ route('service') }}" class="nav-item nav-link">{{ __('Xizmatlar') }}</a>
            <a href="{{ route('project') }}" class="nav-item nav-link">{{ __('Portfoliya') }}</a>
            <a href="{{ route('posts.index') }}" class="nav-item nav-link">{{ __('Blog') }}</a>
            <a href="{{ route('contact') }}" class="nav-item nav-link">{{ __('Bog\'lanish') }}</a>
        </div>
        @foreach ( $all_locales as $locale )
        <a href="{{ route('locale.change',['locale'=>$locale]) }}" class="btn btn-primary mr-3 d-none d-lg-block">{{ $locale }}</a>
        @endforeach
    
        @auth

        <div>
            <a href="{{ route('notifications.index') }}" class="notification mr-2">
                <span><i class="fa fa-bell"></i></span>
                <span class="badge">{{ auth()->user()->unreadNotifications()->count() }}</span>
              </a>
        </div>

        <div>{{ auth()->user()->name }}</div>
        <a href="{{ route('posts.create') }}" class="btn btn-primary mr-3 d-none d-lg-block">Post yaratish</a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
        <button type="submit" class="btn btn-dark mr-3 d-none d-lg-block" >Chiqish</button>
        </form>
            @else
            <a href="{{ route('login') }}" class="btn btn-primary mr-3 d-none d-lg-block">Kirish</a>
        @endauth

    </div>
</nav>
