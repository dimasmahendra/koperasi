<style>
.navbar-fixed-bottom {
    z-index: 10;  
    height:100px;
}
footer.main-footer {
    background: #203864;
    height:100px;
}
.kanan-footer
{
	float: right;
	color :white;
}

.navbar-fixed-bottom:hover .main-footer {	
   	display: none;
    opacity: 0;
    visibility:hidden;
    transition: all ease 0.8s; 
}

</style>
<div class="navbar navbar-default navbar-fixed-bottom">  
	<footer class="main-footer">
		<div class="kanan-footer">
		  <table>    
			  <tr>
			    <td>Konsep&nbsp;</td>
			    <td>:</td>
			    <td>GEMMA SASMITA</td>	
			  </tr>
			  <tr>
			    <td>Produksi&nbsp;</td>
			    <td>:</td>
			    <td><a href="http://syde.co/">PT SYDECO</a></td>	 
			  </tr>
			  <tr>
			    <td>Implementasi&nbsp;</td>
			    <td>:</td>
			    <td><a href="http://syde.co/">PT SYDECO</a></td>	   
			  </tr>
			  <tr>
			    <td>Manajemen&nbsp;</td>
			    <td>:</td>
			    <td><a href="http://syde.co/">PT SYDECO</a></td>	   
			  </tr>
			</table>
		</div>
		<strong style="color: white;">&copy; 2016 | <a href="http://syde.co/">SYDECO</a></strong>
	</footer>  
</div>

<script type="text/javascript">
(function ($) {
  $(document).ready(function(){
	$(function () {
		$(window).scroll(function () {
            // set distance user needs to scroll before we fadeIn navbar
			if ($(this).scrollTop() < 10) {
				$('.navbar-fixed-bottom').fadeIn();
			} else {
				$('.navbar-fixed-bottom').fadeOut();
			}
		});	

		$( ".navbar-fixed-bottom" ).hover(function() {
		  $( this ).fadeOut();
		});
	});
});
}(jQuery));
</script>