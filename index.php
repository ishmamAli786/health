<?php

	include("includes/main_header.php");

?>

<!-- banner -->
<div class="banner">

				<script>
						// You can also use "$(window).load(function() {"
						$(function () {
						 // Slideshow 4
						$("#slider3").responsiveSlides({
							auto: true,
							pager: true,
							nav: false,
							speed: 500,
							namespace: "callbacks",
							before: function () {
						$('.events').append("<li>before event fired.</li>");
						},
						after: function () {
							$('.events').append("<li>after event fired.</li>");
							}
							});
						});
				</script>
		<div  id="top" class="callbacks_container">
			<ul class="rslides" id="slider3">
				<li>
					<div class="banner1">
						<div class="container">
							<div class="banner-info">
								<h3>Providing<span> Appropriate Health Care </span> For Adult, Seniors and children</h3>
								
							</div>
						</div>
					</div>
				</li> 
				<li>
					<div class="banner2">
						<div class="container">
							<div class="banner-info2 text-center">
								<h3>Providing Eye Care <span>Treatments & Surgeries For All Problems</span></h3>
								</div>
						</div>
					</div>
				</li>
				
			</ul>
		</div>
		<div class="clearfix"></div>
</div>
<!-- //banner -->

<!-- team -->
<div class="ind-team">
	<div class="container">
		<h3>Meet Our Team</h3>
		<div class="col-md-4 ind-gds text-center wow zoomIn" data-wow-duration="1.5s" data-wow-delay="0.1s">
			<div class="team-img">
				<img class="img-responsive" src="images/pic4.png" alt=" "/>
			
			</div>
			<h4>Dr. Javed Islam</h4>
			<p>Dental Surgeon</p>
		</div>
		<div class="col-md-4 ind-gds text-center wow zoomIn" data-wow-duration="1.5s" data-wow-delay="0.1s">
			<div class="team-img">
				<img class="img-responsive" src="images/pic5.png" alt=" "/>
				
			</div>
			<h4>Dr. Muhammad Javed Iqbal</h4>
			<p>Cardiology</p>
			
		</div>
		<div class="col-md-4 ind-gds text-center wow zoomIn" data-wow-duration="1.5s" data-wow-delay="0.1s">
			<div class="team-img">
				<img class="img-responsive" src="images/pic6.png" alt=" "/>
				
			</div>
			<h4>Dr. MUHAMMAD AKMAL HUSSAIN</h4>
			<p>Neurology</p>
		</div>
		
		<div class="clearfix"></div>
	</div>
</div>
<?php

	include("includes/main_footer.php");

?>
