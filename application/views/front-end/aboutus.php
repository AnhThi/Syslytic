<!--============================== BODY =======================================-->

		<div style="background-image: url(<?php echo base_url('upload/images/frontend/') ?>/aboutus_bg.jpg); background-size: cover; background-position: center; width: 100vw; height: 93.5vh; margin-top: 40px;"></div>

		<div style="width: 0px; height: 0px; border-top: 90px solid transparent; border-right: 100vw solid #ffffff; margin-top: -88px; z-index: 100; position: relative;"></div>
		
		<div class="container" style="margin-top: 200px; min-height: 800px;" id="div_aboutus">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top: -100px;">
				<p style="font-size: 1.6em; margin-left: 50px; margin-right: 80px;" class="for_GrayText">
					<b>"It’s a mili-second action</b> that we pay attention to advance.
Our 24-hour is unique, because millions of 24-hour is advanced thanks to that. We are an innovative company, everyday, we try to improve every second in people’s lives and business thanks to technology. A button to sum all 100 invoices in a day can save 100 times more than normal; an announcement to 1000 customers at the same moment can save times up to 1000 times are some examples.
"
				</p>
				<p style="font-size: 1.6em; margin-left: 50px; margin-right: 80px;" class="for_GrayText">
					"Who we are? We are business strategists, software developer and user experience designers. But basically we are people’s best companions, so we live with them, think like them, find true issues of them and develop most possible friendly solutions with them. People’s improvement in life is our main purpose. We work hard and fast, learn fast and hard.
"
				</p>
			</div>
			<div id="Contact" class="col-xs-12 col-sm-12 col-md-5 col-lg-5">

				<div class="for_Line" style="margin-top: 65px;"></div>
				<p style="font-size: 1.6em; margin-top: 20px;">Contact Us</p>
				<p class="for_GrayText"><?php echo $infoma[0]['com_address'] ?></p>
				<p class="for_GrayText"><?php echo $infoma[0]['com_phone'] ?></p>
				<div class="for_Line" style="margin-top: 20px;"></div>

				<?php 
					for ($i=0; $i < count($sup); $i++) { 
						if ($i == (count($sup)-1)) {
				?>
							<p style="font-size: 1.6em; margin-top: 20px;"><?php echo $sup[$i]['con_name'] ?></p>
							<p class="for_GrayText"><?php echo $sup[$i]['con_email'] ?></p>
							<p class="for_GrayText"><?php echo $sup[$i]['con_phone'] ?></p>
						<?php } 
						else
						{
					?>
							<p style="font-size: 1.6em; margin-top: 20px;"><?php echo $sup[$i]['con_name'] ?></p>
							<p class="for_GrayText"><?php echo $sup[$i]['con_email'] ?></p>
							<p class="for_GrayText"><?php echo $sup[$i]['con_phone'] ?></p>
							<div class="for_Line" style="margin-top: 20px;"></div>
						<?php }?>
				<?php } ?>

			</div>
			<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
				<input type="hidden" name="longi" id="id_longi" value="<?php echo $infoma[0]['com_longi']; ?>">
				<input type="hidden" name="lati" id="id_lati" value="<?php echo $infoma[0]['com_lati']; ?>">
				<div id="googleMap" class="center-block" style="width:550px; height:380px; margin-top: 75px; background-color: gray;">				
				</div>
			</div>
		</div>


		<div style="background-color: #3397ca; margin-top: 90px; padding-bottom: 70px; padding-top: 40px;">
			<div class="container">
			<h2 style="text-align: center; #333333: #ffffff; color: #ffffff;">J O I N&nbsp;&nbsp;&nbsp;T H E&nbsp;&nbsp;&nbsp;T E A M</h2>
				<br />
				<p style="font-size: 2.7em; margin-bottom: 20px; color: #ffffff;">We are always hiring</p>
				<p style="color: #ffffff; font-size: 1.3em;">
					Looks like you also want to improve people’s life? 
Syslytic is giving you opportunity to explore yourself, learn from the passionate people and improve people’s life. Dream it and live for it is both job description and benefit.
TAKE RISK. THIS OPPORTUNITY EITHER.
				</p>
				<a href="<?php echo base_url(); ?>company/jobs">
					<input class="for_button form-control" style="width: 140px; height: 40px; margin-top: 30px;" type="button" value="See all open jobs" />
				</a>
			</div>
		</div>
<script>
var longi = document.getElementById("id_longi").value;
var lati = document.getElementById("id_lati").value;
var myCenter=new google.maps.LatLng(lati,longi);

function initialize()
{
	var mapProp = {
	  center:myCenter,
	  zoom: 18,
	  scrollwheel: false,
	  mapTypeId:google.maps.MapTypeId.ROADMAP
	};

	var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

	var marker=new google.maps.Marker({
	  position:myCenter,
	  });

	marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>