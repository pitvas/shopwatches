
@if($contacts)
<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<div class="breadcrumb">
			{{ Breadcrumbs::render('contact') }}
			</div>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--contact-start-->
	@foreach($contacts as $c)
	<div class="contact">
		<div class="container">
			<div class="contact-top heading">
				<h2>CONTACT</h2>
			</div>
				<div class="contact-text">
				<div class="col-md-3 contact-left">
						<div class="address">
							<h5>{{ $c->title_address }}</h5>
							<p>{{ $c->address }}</p>
						</div>
					</div>
					<div class="col-md-9 contact-right">
						<form action="{{ action('MailSetting@send') }}" method="post">
							 {{ csrf_field() }}
							<input type="text" name="name" placeholder="Name">
							<input type="text" name="phone" placeholder="Phone">
							<input type="text"  name="email" placeholder="Email">
							<textarea  name="msg" placeholder="Message" required=""></textarea>
							<div class="submit-btn">
								<input type="submit" value="SUBMIT">
							</div>
						</form>
					</div>	
					<div class="clearfix"></div>
				</div>
		</div>
	</div>
	<div class="container" style="padding: 5em;">
		<div class="contact-top heading">
				<h2>{{ $c->title_about}}</h2>
		</div>
		<div class="col-md-12">
			<p>{{ $c->about }}</p>
		</div>
	</div>
	@endforeach
	<!--contact-end-->
	<!--map-start-->
	<div class="map">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6632.248000703498!2d151.265683!3d-33.7832959!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b12abc7edcbeb07%3A0x5017d681632bfc0!2sManly+Vale+NSW+2093%2C+Australia!5e0!3m2!1sen!2sin!4v1433329298259" style="border:0"></iframe>
	</div>
@endif