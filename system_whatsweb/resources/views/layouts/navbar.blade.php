
<nav class="navbar navbar-expand-lg main-navbar {{@$add_class}}">
    @if(request()->is('dashboard*'))
        <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
    @endif

    <div class="nav-collapse w-100">
        <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
            <i class="fas fa-ellipsis-v"></i>
        </a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{url('')}}">{{__('installer_messages.home')}}</a>
            </li>
            @foreach(App\Page::whereShowInMenu(1)->orderBy('sort')->get() as $page)
                <li class="nav-item">
                    <a class="nav-link" href="{{route('page.show', $page->slug)}}">{{ __('installer_messages.'.strtolower($page->title)) }}</a>
                </li>
            @endforeach
        </ul>
    </div>
    <ul class="nav navbar-nav navbar-brand-outer justify-content-center">
        <li class="nav-item">
            <a class="nav-link navbar-brand" href="{{url('')}}">{{ __('installer_messages.'.config('app.name')) }}</a>
        </li>
    </ul>
    @if(!auth()->check())
        <ul class="nav navbar-nav justify-content-end w-100">
            <li class="navbar-text text-dark ml-3 d-sm-none d-none d-lg-block">{{ __('installer_messages.already have an account?') }}</li>
            <li class="nav-item d-sm-none d-none d-lg-block">
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg btn-icon icon-left"><i class="far fa-user"></i>{{ __('installer_messages.login') }}</a>
            </li>
            <li class="nav-item d-lg-none d-sm-block">
                <a href="{{ route('login') }}" class="btn btn-primary"><i class="far fa-user"></i></a>
            </li>
        </ul>
    @else
    <ul class="nav navbar-nav justify-content-end w-100">
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-user">
            <div class="d-none d-lg-inline-block">{{ __('installer_messages.hi') }}, {!! user()->name !!}</div></a>
            <div class="dropdown-menu dropdown-menu-left">
                <a href="{{ route('dashboard') }}" class="dropdown-item has-icon"><i class="fas fa-fire"></i>{{ __('installer_messages.dashboard') }}</a>
                <a href="javascript:;" onclick="document.getElementById('logout').submit()" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> {{ __('installer_messages.logout') }}
                </a>
                <form id="logout" action="{!! route('logout') !!}" method="post">
                    {!! csrf_field() !!}
                </form>
            </div>
        </li>
    </ul>
    @endif
</nav>
