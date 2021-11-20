<html><head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
	<link href="https://fonts.googleapis.com/css2?family=Overlock&amp;display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
	<link href="https://fonts.googleapis.com/css2?family=Nunito&amp;display=swap" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
	<link href="https://fonts.googleapis.com/css2?family=Poiret+One&amp;display=swap" rel="stylesheet">

</head>
<body>
	<div class="main_container">
		<div class="announcement">
			<p>Free Shipping In Canada</p>
		</div>
		<div class="nav_container">
			<div class="logo">
				<div class="gallery">
                    <img src="images/logo2-1.png">
                </div>
            </div>
			<div id="magicFlyout" class="flyout">
				<i class="fas fa-bars" aria-hidden="true"></i>
				<input type="checkbox">
				<div class="nav">
					<div class="items">
						<a href="home.html">Home</a>
						<a href="about.html">About</a>
						<a href="services.html">Clothing</a>
						<a href="resource.html">Sale</a>
						<a href="contact.html">Contact</a>
					</div>
				</div>
			</div>
			<nav class="navigation">
				<a href="#">Home</a>
				<a href="#">About</a>
				<a href="#">Clothing</a>
				<a href="#" style="color: red">Sale</a>
				<a href="#">Contact</a>
			</nav>
			<div class="nav">
				<div class="search">
					<p><span><img src="images/search.png" alt="search icon"></span>Search</p>
				</div>
				<div class="login">
					<p>Log in</p>
				</div>
				<div class="cart">
					<img src="images/shopping-cart.png" alt="cart">
				</div>
			</div>
		</div>
		<div class="hero"></div>
        <div class="products-category">
            <h1>Wear</h1>
        </div>
        <div id="products-container">
            @foreach ($displayProduct as $product)
            <div class="products">
                <img src="images/{{ $product->images }}" alt="{{ $product->heading }}">
                <h2>{{ $product->heading }}</h2>
                <p>{{ $product->description }}</p>
                <p>{{ $product->price }}</p>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>
