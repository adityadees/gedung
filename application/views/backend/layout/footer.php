<footer class="footer footer-static footer-light navbar-border">
	<p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
	</p>
</footer>
<script src="<?php echo base_url();?>assets/backend/vendors/js/vendors.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/backend/vendors/js/charts/raphael-min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/backend/vendors/js/charts/morris.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/backend/vendors/js/extensions/unslider-min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/backend/vendors/js/timeline/horizontal-timeline.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/backend/js/core/app-menu.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/backend/js/core/app.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/backend/js/scripts/customizer.js" type="text/javascript"></script>
  <!--
  <script src="<?php echo base_url();?>assets/backend/js/scripts/pages/dashboard-ecommerce.js" type="text/javascript"></script>
    <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAogXD-AHrsmnWinZIyhRORJ84bgLwDPpg&callback=initMap">
</script>

  <script src="<?php echo base_url();?>assets/backend/js/scripts/forms/wizard-steps.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>assets/backend/js/extensions/jquery.steps.min.js" type="text/javascript"></script>
-->
<script src="<?php echo base_url();?>assets/backend/vendors/js/tables/datatable/datatables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/backend/js/scripts/extensions/sweet-alerts.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/backend/vendors/js/extensions/sweetalert.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/backend/vendors/js/extensions/toastr.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/backend/js/scripts/extensions/toastr.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/backend/vendors/js/forms/toggle/bootstrap-checkbox.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/backend/vendors/js/forms/toggle/switchery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/backend/js/scripts/forms/switch.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/backend/vendors/js/ui/prism.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/backend/vendors/js/forms/icheck/icheck.min.js"></script>
<script src="<?php echo base_url();?>assets/backend/js/scripts/forms/checkbox-radio.min.js"></script>

<script src="<?php echo base_url() ?>assets/map/jquery.addressPickerByGiro.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAogXD-AHrsmnWinZIyhRORJ84bgLwDPpg&sensor=false&language=id"></script>

<script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
    $( '.angka' ).mask('0.000.000.000', {reverse: true});
})
</script>

<script>
	$('.inputAddress').addressPickerByGiro({
		distanceWidget: true,
		boundElements: {
			'latitude': '.latitude',
			'longitude': '.longitude',
			'formatted_address': '.formatted_address'
		}
	});
</script>
</body>
</html>
