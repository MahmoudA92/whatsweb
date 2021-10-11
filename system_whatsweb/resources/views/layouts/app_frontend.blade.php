
<!DOCTYPE html>
<html lang="en" style="direction:rtl">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{!! setting('seo.description') !!}">
    <meta name="keywords" content="{!! setting('seo.keywords') !!}">
    <title>{!! title(isset($title) ? $title : '') !!}</title>
    <link rel="shortcut icon" href="{!! media(setting('general.site_logo')) !!}">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('')}}dist/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('')}}dist/modules/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- General Font Files -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    @yield('plugins_css')

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('')}}dist/css/style.css">
    <link rel="stylesheet" href="{{asset('')}}dist/css/components.css">
    <link rel="stylesheet" href="{{asset('')}}dist/css/frontend.css">
    <link rel="stylesheet" href="{{asset('')}}dist/css/global.css">
    <link rel="stylesheet" href="{{asset('')}}dist/css/override.css">
    
    
   <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-208155997-4"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-208155997-4');
</script> 
    
</head>

<body class="layout-3{{ !auth()->check() ? ' no-login' : '' }}">
    @include('layouts.navbar')

    @if(auth()->check())
        <nav class="navbar navbar-secondary navbar-expand-lg">
            <div class="container">
              <ul class="navbar-nav">
                <li class="nav-item{{ is_dashboard('', ' active') }}">
                  <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>{{ __('installer_messages.dashboard') }}</span></a>
                </li>
                <li class="nav-item{{ is_dashboard('links*', ' active') }}">
                  <a href="{{ route('dashboard.links.index') }}" class="nav-link"><i class="fas fa-link"></i><span>{{ __('installer_messages.links') }}</span></a>
                </li>
                <li class="nav-item{{ is_dashboard('reports*', ' active') }}">
                  <a href="{{ route('dashboard.reports.index') }}" class="nav-link"><i class="fas fa-chart-line"></i><span>{{ __('installer_messages.reports') }}</span></a>
                </li>
                <li class="nav-item{{ is_dashboard('settings*', ' active') }}">
                  <a href="{{ route('dashboard.settings.index') }}" class="nav-link"><i class="fas fa-cog"></i><span>{{ __('installer_messages.settings') }}</span></a>
                </li>
              </ul>
            </div>
        </nav>
    @endif

    <div class="main-content">
        @yield('content')
    </div>
    <div class="simple-footer">
        {{ __('installer_messages.loveSaudia') }}
        {!! "</br>" !!}
        {{ __('installer_messages.copyright') }} &copy; {{ date("Y") . " " . __('installer_messages.'. setting('general.site_name')) }}
    </div>

    <!-- General JS Scripts -->
    <script src="{{asset('')}}dist/modules/jquery.min.js"></script>
    <script src="{{asset('')}}dist/modules/popper.js"></script>
    <script src="{{asset('')}}dist/modules/tooltip.js"></script>
    <script src="{{asset('')}}dist/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{asset('')}}dist/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="{{asset('')}}dist/modules/moment.min.js"></script>
    <script src="{{asset('')}}dist/js/stisla.js"></script>
    
    <!-- JS Libraies -->
    @yield('plugins_js')

    <!-- Page Specific JS File -->
    @yield('page_js')
    
    <!-- Template JS File -->
    <script src="{{asset('')}}dist/js/scripts.js"></script>
    <script src="{{asset('')}}dist/js/custom.js"></script>

    @yield('scripts')
</body>
</html>
