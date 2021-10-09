<div class="modal fade" tabindex="-1" role="dialog" id="modal-result">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><i class="fas fa-check modal-icon bg-success text-white shadow-success"></i> {{ __('installer_messages.your link generated successfully') }}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true"> &times; </span>
				</button>
			</div>
			
			<div class="modal-body">
				<ul class="nav nav-pills mt-3 nav-justified pr-0">
					<li class="nav-item mr-2"><a href="#result-raw" data-toggle="tab" class="nav-link active">{{ __('installer_messages.raw') }}</a></li>
					<li class="nav-item mr-2"><a href="#result-html" data-toggle="tab" class="nav-link">{{ __('installer_messages.html') }}</a></li>
					<li class="nav-item mr-2"><a href="#result-qrcode" data-toggle="tab" class="nav-link">{{ __('installer_messages.qr code') }}</a></li>
					<li class="nav-item"><a href="#result-share" data-toggle="tab" class="nav-link">{{ __('installer_messages.share') }}</a></li>
				</ul>
				<div class="tab-content mt-2">
					<div class="tab-pane active" id="result-raw">
						<p class="text-center">{{ __('installer_messages.copy the following url, and paste it wherever you like') }}.</p>
						<div class="input-group">
							<div class="input-group-append">
								<button data-clipboard-target="#raw_url" class="btn btn-primary">{{ __('installer_messages.copy') }}</button>
							</div>
							<input type="text" class="form-control" name="raw_url" id="raw_url" readonly="" onfocus="this.setSelectionRange(0, this.value.length)">
						</div>
					</div>
					<div class="tab-pane" id="result-html">
						<p class="text-center">{{ __('installer_messages.copy the following url, and paste it wherever you like') }}.</p>
						<div class="input-group">
							<div class="input-group-append">
								<button data-clipboard-target="#html_link" class="btn btn-primary">{{ __('installer_messages.copy') }}</button>
							</div>
							<input type="text" class="form-control" id="html_link" name="html_link" readonly="" onfocus="this.setSelectionRange(0, this.value.length)">
						</div>
					</div>
					<div class="tab-pane" id="result-qrcode">
						<div class="text-center">
							<p class="text-center">{{ __('installer_messages.download the following qr Code image') }}.</p>
							<img src="" id="qrcode-image">
							<div class="mt-2">								
								<a href="" class="btn btn-primary" id="qrcode-save">
									{{ __('installer_messages.download image') }}
								</a>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="result-share">
						<div class="row">
							<div class="text-center col-lg-8" style="margin: auto">
								<p class="text-center">{{ __('installer_messages.you can share this link with your social media account') }}.</p>
								<a href="" id="share-link-facebook" class="btn btn-social btn-block mb-3 btn-primary">
									<i class="fab fa-facebook-f"></i> {{ __('installer_messages.facebook') }}
								</a>
								<a href="" id="share-link-twitter" class="btn btn-social btn-block mb-3 btn-twitter">
									<i class="fab fa-twitter"></i> {{ __('installer_messages.twitter') }}
								</a>
								<a href="" id="share-link-whatsapp" class="btn btn-social btn-block mb-3 btn-success">
									<i class="fab fa-whatsapp"></i> {{ __('installer_messages.whatsApp') }}
								</a>
								<a href="" id="share-link-telegram" class="btn btn-social btn-block mb-3 btn-info">
									<i class="fab fa-telegram"></i> {{ __('installer_messages.telegram') }}
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

