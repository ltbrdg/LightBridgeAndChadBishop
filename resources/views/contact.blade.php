@extends($VIEW_PREFIX.'.layout')

@section('content')
<section id="contact" class="container contact">
	@if (@$form_error)
	<div class="alert alert-dismissable alert-warning">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Sorry</strong> We could not submit your email at this time.<br>
		<ul>
		@foreach ($form_error->getMessages() as $key => $error_messages)
			<style>
				#{{$key}}{
					border: 1px solid red;
				}
			</style>
			@foreach ($error_messages as $error)
				<li>{{$error}}</li>
			@endforeach
		@endforeach
		</ul>
	</div>
	@endif
	@if (@$form_success)
	<h1>Thank you {{ $from_name }} for contacting us!</h1>
	<p>Someone on the team will get back to you as soon as possible. If you'd like to speak with someone immediately, you can call Chad Bishop at 858.888.3573. We look forward to connecting!</p>
	@else
	{!! Form::open(array('url' => '/contact', 'class' => 'form', 'id' => 'contactForm')) !!}
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<h2>Want to work with us? Let us know how we can help!</h2>
				<hr />
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-1">
				<div class="form-group">
					<label>Which Services Are You Interested In?</label>
					<span class="label-help-block">(Check all that apply)</span>
					<div class="checkbox">
						<label>
							<input name="servicesGroup[1]" type="checkbox" value="Interactive Design/Development">
							Interactive Design/Development
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input name="servicesGroup[2]" type="checkbox" value="Photography">
							Photography
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input name="servicesGroup[3]" type="checkbox" value="Video &amp; Broadcast">
							Video &amp; Broadcast
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input name="servicesGroup[4]" type="checkbox" value="Environmental (Signage)">
							Environmental (Signage)
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input name="servicesGroup[5]" type="checkbox" value="Infographics &amp; Presentation Design">
							Infographics &amp; Presentation Design
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input name="servicesGroup[6]" type="checkbox" value="Copywriting">
							Copywriting
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input name="servicesGroup[7]" type="checkbox" value="Print">
							Print
						</label>
					</div>
					<div class="checkbox">
						<label>
							<input name="servicesGroup[8]" type="checkbox" value="Event Branding">
							Event Branding
						</label>
					</div>
				</div>
			</div>
			<div class="col-md-6 vert-line">
				<div class="form-group">
					<label for="organization">Organization Name</label>
					<input required name="organization" type="text" class="form-control" id="organization" placeholder="This is the Organization Name, LLC">
				</div>
				<label>Name</label>
				<div class="row">
					<div class="col-md-5">
						<div class="form-group">
							<label class="sr-only" for="firstName">First Name</label>
							<input required name="firstName" type="text" class="form-control" id="firstName" placeholder="First">
							<span class="help-block">First</span>
						</div>
					</div>
					<div class="col-md-5">
						<div class="form-group">
							<label class="sr-only" for="lastName">Last Name</label>
							<input required name="lastName" type="text" class="form-control" id="lastName" placeholder="Last">
							<span class="help-block">Last</span>
						</div>
						
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="" for="website">Website</label>
							<input required name="website" type="url" class="form-control" id="website" placeholder="http://">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="" for="email">Email</label>
							<input required name="email" type="email" class="form-control" id="email" placeholder="name@domain.com">
						</div>
						
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="" for="projectLength">Project Length</label>
							<select required name="projectLength" id="projectLength" class="form-control">
								<option value="">Please select</option>
								<option>Weeks</option>
								<option>Months</option>
								<option>Less than 6 months</option>
								<option>Greater than 6 months</option>
								<option>Long-Term</option>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="" for="projectBudget">Estimated Budget</label>
							<select required name="projectBudget" id="projectBudget" class="form-control">
								<option value="">Please select</option>
								<option>$2,000-$5,000</option>
								<option>$5,001-$10,000</option>
								<option>$10,001-$20,000</option>
								<option>$20,001-$40,000</option>
								<option>Retainer/Hourly</option>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<hr />
				<h2>Project Details</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-1">
				<div class="form-group">
					<label for="description">Please Tell Us More About Your Project</label>
					<textarea name="description" id="description" class="form-control" rows="5"></textarea>
				</div>
			</div>
			<div class="col-md-2">
				<button class="btn btn-lg form-submit">Submit</button>
			</div>
		</div>
	</form>
	@endif
</section>
@endsection


@section('scripts')
	@if(App::environment('local'))
		{{-- use unminimized  file --}}
		<script type="text/javascript" src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
	@else
		{{-- use minimized file - no CDN fail fallback --}}
		<script type="text/javascript" src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
	@endif
@endsection