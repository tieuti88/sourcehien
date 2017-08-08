<?php
	
	$d->reset();
	$sql = "select * from #_about";
	$d->query($sql);
	$gioithieu = $d->fetch_array();
	
?>
<section id="about">
	<div class="container">
		<div class="section-header">
			<h2 class="section-title text-center wow fadeInDown">About Laragon</h2>
			<p class="text-center wow fadeInDown">Laragon is an optimized services manager application. It offers you a powerful server in 1 minute installation.</p>
		</div>

		<div class="row">
			<div class="col-sm-6 wow fadeInLeft">
				<h3 class="column-title">Install Laravel under 1 minute </h3>
				<!-- 16:9 aspect ratio -->
				<div class="embed-responsive embed-responsive-16by9">
					<iframe width="420" height="315" src="XuYkGdrXmKg" tppabs="https://www.youtube.com/embed/XuYkGdrXmKg" frameborder="0" allowfullscreen></iframe>
				</div>                
			</div>

			<div class="col-sm-6 wow fadeInRight">
				<h3 class="column-title">Optimal Services Manager</h3>
				<p>Laragon manages services inside its installation directory (sandbox). Each sandbox boots fast and uses very low memory footprint. When you click Start All button, Laragon run each service on each own thread so they start faster than Xampp, Wamp and Windows Services.</p>

				<p>Not only turn your computer into Web Server & Database Server, Laragon also offers you powerful caching servers like Redis to help you develop high speed applications. Currently, Laragon supports:</p>

				<div class="row">
					<div class="col-sm-6">
						<ul class="nostyle">
							<li><i class="fa fa-check-square"></i> Laravel 5 and 4.2</li>
							<li><i class="fa fa-check-square"></i> Apache 2.4.12</li>
							<li><i class="fa fa-check-square"></i> MySQL (MariaDB 10.0.17)</li>
							<li><i class="fa fa-check-square"></i> PHP 5.6.7</li>
						</ul>
					</div>

					<div class="col-sm-6">
						<ul class="nostyle">
							<li><i class="fa fa-check-square"></i> Memcached 1.4.5</li>
							<li><i class="fa fa-check-square"></i> Redis 2.8.17</li>
						</ul>
					</div>
				</div>
				<p class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="200ms"><a class="btn btn-primary btn-lg" target="_blank" href="javascript:if(confirm('https://sourceforge.net/p/laragon  \n\nThis file was not retrieved by Teleport Pro, because it is addressed using an unsupported protocol (e.g., gopher).  \n\nDo you want to open it from the server?'))window.location='https://sourceforge.net/p/laragon'" tppabs="https://sourceforge.net/p/laragon">Download Now. It's free.</a></p>

			</div>                
		</div>
	</div>
</section>