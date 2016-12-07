
@extends('template.layout')

@section('title', ' - Contact Us')

@section('css')
<style>

.clip-color-list li:first-child{
   display: none;
}

</style>
@endsection

@section('js')
@endsection

@section('content')

<!-- Main jumbotron for a primary marketing message or call to action -->
<div id="main-content" class="row homecontent">
  <div class="container">
   <div  style="background-color:#fff;padding: 20px 30px; margin-bottom: 30px;">
	<h1>Contact Us</h1>
		<div class="contact-content">
			<p><span class="fa fa-search">1-800-989-0440</span></p>
			<p><span class="fa-text">sales@promotionalwristband.com</span></p>
			<iframe width="100%" height="238" allowTransparency="true" frameborder="0" scrolling="no" style="border:none" src="http://www.emailmeform.com/builder/embed/qvRh20DO854wLsb684ba0f"><a href="http://www.emailmeform.com/builder/embed/qvRh20DO854wLsb684ba0f">Fill out form.</a></iframe>
			<div class="clearfix"></div>		  
		</div>
		<div class="clearfix"></div>
	</div>	
   </div>
</div>
@endsection
