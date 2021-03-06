@extends('layouts.' . layout(), ['title' => $title])

@section('plugins_css')

<link rel="stylesheet" href="{{ url('dist/modules/bootstrap-daterangepicker/daterangepicker.css') }}">

@stop


@section('content')

	<section class="section">

		@if(is_backend())

		<div class="section-header">

			<h1>{{ __('installer_messages.reports') }}</h1>

		</div>

		@endif

		{!! !is_backend() ? '<div class="container">' : '' !!}

			<div class="row">

				<div class="col-lg-3">

					<div class="card" style="text-align: right">

						<form id="filter">

							<div class="card-body">

								<div class="form-group">

									<label for="choose-date">{{ __('installer_messages.choose date') }}</label>

									<input type="text" name="date" class="form-control daterange" id="choose-date" value="{!! Carbon\Carbon::today()->subDays('7') .' - ' . date('Y-m-d') !!}">

								</div>

								<div class="form-group mb-0">

									<label for="choose-link">{{ __('installer_messages.link') }}</label>

									<select class="form-control select2" name="link" id="choose-link">

										<option value="">{{ __('installer_messages.all') }}</option>

										@foreach(statistic()->myLink() as $link)

										<option value="{{ encrypt($link->id) }}">{{ route('slug', $link->slug) }}</option>

										@endforeach

									</select>

								</div>

							</div>

							<div class="card-footer bg-whitesmoke text-right">

								<button type="submit" class="btn btn-primary">{{ __('installer_messages.filter') }}</button>

							</div>

						</form>

					</div>

				</div>

				<div class="col-lg-9">

					<div class="card card-primary">

						<div class="card-header">

							<h4>{{ __('installer_messages.report') }}</h4>

							<div class="card-header-action">

								<a href="#tab-chart" class="btn active">{{ __('installer_messages.chart') }}</a>

								<a href="#tab-referer" class="btn">{{ __('installer_messages.referer') }}</a>

								<a href="#tab-device" class="btn">{{ __('installer_messages.device') }}</a>

								<a href="#tab-platform" class="btn">{{ __('installer_messages.platform') }}</a>

								<a href="#tab-browser" class="btn">{{ __('installer_messages.browser') }}</a>

							</div>

						</div>

						<div class="card-body p-0">

							<div class="tab-content">

								<div class="tab-pane p-0 active" id="tab-chart">

									<div class="p-4">

										<canvas id="myChart" height="150"></canvas>

									</div>

								</div>

								<div class="tab-pane p-0" id="tab-referer">

									<div id="referer-table" class="table-responsive"></div>

								</div>

								<div class="tab-pane p-0" id="tab-device">

									<div id="device-table" class="table-responsive"></div>

								</div>

								<div class="tab-pane p-0" id="tab-platform">

									<div id="platform-table" class="table-responsive"></div>

								</div>

								<div class="tab-pane p-0" id="tab-browser">

									<div id="browser-table" class="table-responsive"></div>

								</div>

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>

		{!! !is_backend() ? '</div>' : '' !!}

	</section>

@stop



@section('plugins_js')

  <script src="{{asset('dist/modules/chart.min.js')}}"></script>

  <script src="{{asset('dist/modules/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

@stop



@section('scripts')

<script>

$('.card-header-action a').on('click', function (e) {

  e.preventDefault()

  $('.card-header-action a').removeClass("active");

  $(this).addClass('active');

  $(".tab-pane").removeClass("active");

  $($(this).attr('href')).addClass('active');

});



$.ajaxSetup({

  headers: {

    'X-CSRF-TOKEN': $("meta[name=csrf-token]").attr("content")

  },

})

function filter(data) {

	$.ajax({

	  url: '{{ route('stats.chart', [user_prefix()]) }}',

	  type: 'POST',

	  data: data,

	  beforeSend: function() {

	    $.cardProgress($("#myChart").closest('.card'));

	  },

	  complete: function() {

	    $.cardProgressDismiss($("#myChart").closest('.card'));

	  },

	  success: function(data) {

	  	let obj = Object.keys(data.data.stats),

	  		len = obj.length;



	  	var table = [];

	  	for(let i = 0; i < len; i++) {

	  		table[i] = '';

	  		table[i] += '<table class="table table-striped">';

	  		table[i] += '<tr>';

	  		table[i] += '	<th>No</th>';

	  		table[i] += '	<th>'+ ucwords(obj[i]) +'</th>';

	  		table[i] += '	<th>Count</th>';

	  		table[i] += '</tr>';

	  		no = 0;

	  		data.data.stats[obj[i]].forEach(function(item) {

	  			no ++;

		  		table[i] += '<tr>';

		  		table[i] += '	<td>'+ no +'</td>';

		  		table[i] += '	<td>'+ ucwords((item[obj[i]] || '-').toLowerCase()) +'</td>';

		  		table[i] += '	<td>'+ item['count'] +'</td>';

		  		table[i] += '</tr>';

	  		});

	  		table[i] += '</table>';

		  	$("#"+ obj[i] +"-table").html(table[i]);

	  	}



	    var ctx = document.getElementById("myChart").getContext('2d');

	    var myChart = new Chart(ctx, {

	      type: 'line',

	      data: {

	        labels: JSON.parse(data.data.labels),

	        datasets: [{

	          label: 'Visit',

	          data: JSON.parse(data.data.values),

	          borderWidth: 2,

	          backgroundColor: 'rgba(63,82,227,.8)',

	          borderWidth: 0,

	          borderColor: 'transparent',

	          pointBorderWidth: 0,

	          pointRadius: 3.5,

	          pointBackgroundColor: 'transparent',

	          pointHoverBackgroundColor: 'rgba(63,82,227,.8)',

	        }]

	      },

	      options: {

	        legend: {

	          display: false

	        },

	        scales: {

	          yAxes: [{

	            gridLines: {

	              // display: false,

	              drawBorder: false,

	              color: '#f2f2f2',

	            },

	            ticks: {

	              beginAtZero: true,

	              min: 0,

	              callback: function(value, index, values) {

	                if (Math.floor(value) === value) {

	                  return value;

	                }

	              }

	            }

	          }],

	          xAxes: [{

	            gridLines: {

	              display: false,

	              tickMarkLength: 15,

	            }

	          }]

	        },

	      }

	    });

	  }

	})

}



filter({

	date: $("#choose-date").val()

});



$("#filter").submit(function() {

	filter({

		date: $("#choose-date").val(),

		link: $("#choose-link").val()

	});

	return false;

});

</script>

@stop
