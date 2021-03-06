<?php
function guidv4($data)
{
    assert(strlen($data) == 16);

    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10

    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}
?>
<!DOCTYPE html>
<!--
	Hey, there's not much to find here, sorry! 
	If you need anything, hit me up:
	me@drakeluce.com
-->
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="57b7cfcfce29e12dfae0de3604194ca4d17a52b3" content="af9caeeb309fa41c97ee67ac3edd7f8b006abf3a" />
		<meta property="fb:profile_id" content="100006272889572" /> 
		<meta property="og:type" content="profile" /> 
		<meta property="og:description" content="A overview of the life of Drake Luce">
		<meta property="og:url" content="https://drakeluce.com/" /> 
		<meta property="og:title" content="Drake Luce" /> 
		<meta property="og:image" content="https://drakeluce.com/img/profile.jpg" /> 
		
		<title>Drake Luce</title>
		
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/drakeluce.css" rel="stylesheet">
		
		<link rel="icon" href="favicon.png" sizes="64x64" type="image/png">
		
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container-fluid maxw">
			<img class="img-responsive img-circle img-profile" src="img/profile.jpg" alt="An image of Drake Luce" id="profile">
			<h1 class="text-center">Drake Luce</h1>
			<h4 class="text-center">Student & Ethical Hacker</h4>
			<div class="row">
				<div class="col-md-4">
					<div class="list-group">
						<a href="contact.html" class="list-group-item">
							<i class="fa fa-envelope" aria-hidden="true"></i> can be contacted if you click here
						</a>
						<a href="https://ca.linkedin.com/in/drakeluce" class="list-group-item">
							<i class="fa fa-linkedin" aria-hidden="true"></i> looks professional on LinkedIn
						</a>
						<a href="https://github.com/ihatecsv" class="list-group-item">
							<i class="fa fa-github" aria-hidden="true"></i> contributes to open-source on GitHub
						</a>
						<a href="https://www.facebook.com/profile.php?id=100006272889572" class="list-group-item">
							<i class="fa fa-facebook-official" aria-hidden="true"></i> uses Facebook for its messenger
						</a>
						<a href="https://keybase.io/drakeluce" class="list-group-item">
							<i class="fa fa-key" aria-hidden="true"></i> keeps his PGP key on Keybase
						</a>
						<a href="https://www.reddit.com/user/smashshock" class="list-group-item">
							<i class="fa fa-reddit-alien" aria-hidden="true"></i> drowns spare time on Reddit
						</a>
						<a href="https://twitter.com/ihatecsv" class="list-group-item">
							<i class="fa fa-twitter" aria-hidden="true"></i> hardly ever uses Twitter
						</a>
						<a href="https://www.coinbase.com/drakeluce" class="list-group-item">
							<i class="fa fa-btc" aria-hidden="true"></i> accepts payments with Coinbase
						</a>
					</div>
				</div>
				<div class="col-md-8">
					<div class="list-group">
						<a href="https://en.wikipedia.org/wiki/New_Brunswick" class="list-group-item">
							<i class="fa fa-flag" aria-hidden="true"></i> has set up camp in about every corner of New Brunswick, Canada
						</a>
						<a href="https://en.wikipedia.org/wiki/Sint_Maarten" class="list-group-item">
							<i class="fa fa-globe" aria-hidden="true"></i> has traveled 3300km from home
						</a>
						<a href="http://www.unb.ca" class="list-group-item">
							<i class="fa fa-book" aria-hidden="true"></i> is pursuing a Bachelor of Science in Software Engineering at University of New Brunswick
						</a>
						<a href="https://www.sentinelsystems.ca" class="list-group-item">
							<i class="fa fa-briefcase" aria-hidden="true"></i> was an R&D Technician at Sentinel Systems Limited
						</a>
						<a href="/t" class="list-group-item">
							<i class="fa fa-leaf" aria-hidden="true"></i> has a sandbox testing area for experiments
						</a>
					</div>
				</div>
			</div>			
		</div>
		<div class="modal fade" tabindex="-1" role="dialog" id="warningModal">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">SEIZURE WARNING</h4>
					</div>
					<div class="modal-body">
						<p>If you are prone to epileptic seizures, click <strong>CANCEL</strong>. I take no responsibility for any effects this website may have otherwise.</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>
						<button type="button" class="btn btn-default" id="acceptbtn">I'm not epileptic</button>
					</div>
				</div>
			</div>
		</div>
		<div class="c bc">This site is accessible from <a href="http://drakelucede5z6io.onion">Tor</a> <span class="label label-default">HTTP</span>, <a href="http://drakeluce.libre">OpenNIC</a> <span class="label label-default">HTTP</span>, and <a href="https://drakeluce.com">the clearweb</a> <span class="label label-success">HTTPS</span></div>
		<script src="https://use.fontawesome.com/7720e15d1c.js"></script>
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/cube.js"></script>
	</body>
</html>
