<!doctype html>
<html>
<head>
	<meta name="viewport" content=""width=device-width, initial-scale="1.0">
	<link rel="stylesheet" href="v2StyleSheet.css">
	<script src="script.js"></script>
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>


<body>
	<div>		
		<div> 
			<img src = "images/PCLLCLogo.png" alt = "LOGO" width = "450" height = "500">
			<h1> Culture Curations </h1>		
			<button class="btn btn_glow" onclick="enterSite()">ENTER</button>
		</div>

		<div>
			<form action="https://www.paypal.com/donate" method="post" target="_top">
				<div style="text-align: left;">
					<input type="hidden" name="hosted_button_id" value="4UFUXASUEDU6G" />
					<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
					<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" />
				</div>
			</form>

			<div >
				<div style="overflow: auto;
							display: flex;
							flex-direction: column;
							justify-content: flex-end;
							align-items: center;
							width: 259px;
							background: #FFFFFF;
							border: 1px solid rgba(0, 0, 0, 0.1);
							box-shadow: -2px 10px 5px rgba(0, 0, 0, 0);
							border-radius: 10px;
							font-family: SQ Market, Helvetica, Arial, sans-serif;">
					<div style="padding: 20px;">
						<a target="_blank" 
						   data-url="https://square.link/u/BfgiMjrM?src=embd" 
						   href="https://square.link/u/BfgiMjrM?src=embed" 
						   style="display: inline-block;
								  font-size: 18px;
								  line-height: 48px;
								  height: 48px;
								  color: #ffffff;
								  min-width: 212px;
								  background-color: #000000;
								  text-align: center;
								  box-shadow: 0 0 0 1px rgba(0,0,0,.1) inset;">Donate
						</a>
					</div>
				</div>
			</div>

		<script>
				function showCheckoutWindow(e) {
				e.preventDefault();

				const url = document.getElementById('embedded-checkout-modal-checkout-button').getAttribute('data-url');
				const title = 'Square Online Checkout';

				// Some platforms embed in an iframe, so we want to top window to calculate sizes correctly
				const topWindow = window.top ? window.top : window;

				// Fixes dual-screen position                                Most browsers          Firefox
				const dualScreenLeft = topWindow.screenLeft !==  undefined ? topWindow.screenLeft : topWindow.screenX;
				const dualScreenTop = topWindow.screenTop !==  undefined   ? topWindow.screenTop  : topWindow.screenY;

				const width = topWindow.innerWidth ? topWindow.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
				const height = topWindow.innerHeight ? topWindow.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

				const h = height * .75;
				const w = 500;

				const systemZoom = width / topWindow.screen.availWidth;
				const left = (width - w) / 2 / systemZoom + dualScreenLeft;
				const top = (height - h) / 2 / systemZoom + dualScreenTop;
				const newWindow = window.open(url, title, `scrollbars=yes, width=${w / systemZoom}, height=${h / systemZoom}, top=${top}, left=${left}`);

				if (window.focus) newWindow.focus();
				}

				// This overrides the default checkout button click handler to show the embed modal
				// instead of opening a new tab with the given link url
				document.getElementById('embedded-checkout-modal-checkout-button').addEventListener('click', function (e) {
				showCheckoutWindow(e);
				});
		</script>
	</div>
</body>
</html>