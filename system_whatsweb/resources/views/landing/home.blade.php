@extends('simple.app', ['title' => setting('general.site_tagline')])

@section('plugins_css')
	<link rel="stylesheet" href="{{ asset('dist/modules/select2/dist/css/select2.min.css') }}">
  	<link rel="stylesheet" href="{{asset('')}}dist/modules/bootstrap-social/bootstrap-social.css">
@stop

@section('content')

@include('parts.links.modal')

<div class="hero">
	<div id="particles-js"></div>
	<div class="container" style="max-height:200px">
		<div class="hero-text text-center">
		     <div>
   <a href="https://wttsy.com" ><img id="mobile-logo-white" src="https://wttsy.com/media/wttsy-logo-white.png" /></a>
    </div>
			<h1 id="seo-home">{!! __(setting('seo.home_h1')) !!}</h1>
			<p class="lead" style="display:none">{!! __(setting('seo.home_description')) !!}</p>
			<div class="mt-4" style="display:none">
				<a href="{{ route('register') }}" class="btn btn-cta btn-icon icon-left"><i class="far fa-user"></i> {{ __('installer_messages.create an account') }}</a>
			</div>
		</div>
	</div>
</div>
<section>
	<div class="container" id="main1" style="max-width: 500px">
		<div class="card">
			<div class="card-body">
				@include('parts.links.fields2', ['title' => 'Create Link', 'the_type' => 'WHATSAPP', 'show_type' => true])
			</div>
		</div>
	</div>
</section>
<style>
.hero-text{
max-height: 200px;
}
@media screen and (min-width: 1024px){
#main1{
margin-top: -350px;
}
}
@media screen and (max-width: 768px){
#logo{
margin-top: -70px;
}
.hero .hero-text h1 {
	margin-top: -50px;
	font-size: 28px;
}
#main1{
margin-top: -390px;
}
}
@media screen and (max-width: 480px){
#logo{
padding-right: 40px;
}
}
@media screen and (min-width: 320px) and (max-width: 370px) {
    
#seo-home{
    font-size: 24px;
}
    
}



</style>
@stop

@section('plugins_js')

<script src="{{ asset('dist/modules/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('dist/modules/axios.min.js') }}"></script>
<script src="{{ asset('dist/modules/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('dist/modules/particles.min.js') }}"></script>
<script src="{{ asset('vendor/midia/clipboard.js') }}"></script>

@stop

@section('scripts')

<script>

particlesJS("particles-js", {"particles":{"number":{"value":96,"density":{"enable":true,"value_area":800}},"color":{"value":"#ffffff"},"shape":{"type":"circle","stroke":{"width":0,"color":"#000000"},"polygon":{"nb_sides":5},"image":{"src":"img/github.svg","width":100,"height":100}},"opacity":{"value":0.3,"random":false,"anim":{"enable":false,"speed":1,"opacity_min":0.1,"sync":false}},"size":{"value":2,"random":true,"anim":{"enable":false,"speed":40,"size_min":0.1,"sync":false}},"line_linked":{"enable":true,"distance":144.30708547789706,"color":"#ffffff","opacity":0.2,"width":0.6413648243462091},"move":{"enable":true,"speed":2,"direction":"none","random":true,"straight":false,"out_mode":"out","bounce":false,"attract":{"enable":false,"rotateX":600,"rotateY":1200}}},"interactivity":{"detect_on":"canvas","events":{"onhover":{"enable":false,"mode":"repulse"},"onclick":{"enable":true,"mode":"push"},"resize":true},"modes":{"grab":{"distance":400,"line_linked":{"opacity":1}},"bubble":{"distance":400,"size":40,"duration":2,"opacity":8,"speed":3},"repulse":{"distance":200,"duration":0.4},"push":{"particles_nb":4},"remove":{"particles_nb":2}}},"retina_detect":true});



@include('parts.links.fields_js', ['the_type' => 'WHATSAPP'])

@include('parts.links.modal_js')

</script>

@stop
