<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=0.6, maximum-scale=0.6, user-scalable=no" />
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900" rel="stylesheet">
</head>
<body>
<style type="text/css">
	body{
		font-family: 'Playfair Display', serif;
	}

	p{
		font-size: 24px;
		letter-spacing: 1px;
		line-height: 2;
	}
	#navigasi{
		margin-top: 50px;
		background-color: white;
		opacity: 0.9;
		transition: 0.7s;
	}

	.overlay{
		height: 100%;
		width: 0;
		position: fixed;
		z-index: 1;
		top: 0;
		right: 0;
		background-color: rgb(0,0,0);
		background-color: rgba(0,0,0,1);
		overflow-x: hidden;
		transition: 0.5s;
	}

	.overlay-content{
		position: relative;
		top: 25%;
		width: 100%;
		text-align: center;
		margin-top: 30px;
	}

	.overlay-content a{
		width: 20%;
		text-align: left;
		margin-left: 100px;

	}

	.overlay a{
		padding: 8px;
		text-decoration: none;
		font-size: 36px;
		color: #f1f1f1;
		display: block;
		transition: 0.3;
	}

	.overlay a:hover, .overlay a:focus{
		color: f1f1f1;
	}

	.overlay .close-btn{
		position: absolute;
		top: 20px;
		right: 50px;
		font-size: 40px;
	}

	@media screen and(max-height: 450px){
		.overlay a{ font-size: 20px }
		.overlay .close-btn{
			font-size: 40px;
			top: 15px;
			right: 35px;
		}
	}

	a:hover{
		text-decoration: none;
	}

	.hilang{
		transition: 0.6s;
	}

</style>

	<nav id="my-nav" onclick="closeNav()" class="overlay">
		<a href="javascript:void(0)" class="close-btn"><i class="far fa-window-close"></i></a>
		
		<div class="overlay-content">
			<a href="#">Home</a>
			<a href="#">About</a>
			<a href="#">Contact</a>
			<a href="#">Social</a>
		</div>
		
	</nav>
	<div class="container-fluid" id="navigasi">
		<div class="row align-items-center">
			<div class="col-1 col-md-2 offset-1 offset-md-0">
				<h1 class="text-right"><a href="{{ route('index')}}" style="color:black">Logo</a></h1>
			</div>
			<div class="col-1 offset-7 offset-md-8">
				<a href="javascript:void(0)" style="color: grey" onclick="openNav()" id="triger">
					<i class="fas fa-bars" style="font-size: 30px; margin-left: 40px"></i>
				</a>
			</div>
		</div>
	</div>



	<div class="container-fluid">
		<div class="row">
			<div style="" class="col-md-10 col-12 offset-md-1" id="header">
				<div style="text-align: center;">
					<h1 id="coba" style="font-size: 8vw; margin-top: 100px"></h1>
					<h2 class="text-muted">We craft something different</h2>

				</div>
			</div>
		</div>

		<div class="container" style="margin-top: 100px">
			@yield('content')
		</div>
	</div>

<script type="text/javascript">
	function openNav(){
		document.getElementById('my-nav').style.width = "100%";
		document.getElementById('navigasi').style.opacity = "0";
		document.getElementByClassName('hilang').style.opacity = "0";

	}

	function closeNav(){
		document.getElementById('my-nav').style.width = "0%";
		document.getElementById('navigasi').style.opacity = "1";
		document.getElementByClassName('hilang').style.opacity = "1";
	}
</script>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://unpkg.com/typewriter-effect/dist/core.js"></script>

<script type="text/javascript">
	var app = document.getElementById('coba');

	var typewriter = new Typewriter(app, {
    autoStart : true
});

typewriter.typeString('Welcome to My Blog')
    .pauseFor(2500)
    .deleteAll()
    .typeString('Read some articles')
    .pauseFor(2500)
    .deleteChars(8)
    .typeString('<strong>Stories</strong>')
    .pauseFor(2500)
    .start();
</script>
</body>
</html>