

@extends('layouts/navbar_user')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
<link rel="stylesheet" href="{{ asset('css/style_about.css') }}">
<script src="https://kit.fontawesome.com/3ac08d279f.js" crossorigin="anonymous"></script>
@endsection
@section('title' , 'search')
@section('content')
    
            <nav>
   
    
            </nav>  

	<body>
		
	{{--<!-- Menu -->

      <!--log out-->
<div class="logout">
	<form method="POST" action="{{ route('logout') }}">
		@csrf
		<button type="submit"  class="logout-btn"><i class="fas fa-sign-out-alt"></i>Logout</button>
	</form>
	<!--log out-->
  
  
   <!--terms-->
  <div class="terms">
	<a href={{url('/terms')}} class="term-service">Terms</i></a>
  </div>
  <!--terms-->
  
  <!--about-->
  <div class="about">
	<a href={{url('/about')}} class="about">about</i></a>
	</div>
	<!--about-->
  
	<!--profile-->
	<div class="profile">
	  <a href="{{ route('profile.show') }}" class="profile-btn"><i class="fa fa-user"></i></a>
  </div>
  <!--profile-->
  
  <!--logo icon-->
  <div class="logo_icon">
	<a href={{ route('user.search') }} class="logo_icon"><img src="{{ asset('logo/blue_symbol.png') }}" alt="My Logo">
	</a>
  </div>
  <!--logo icon-->
  
  <!-- Menu -->--}}

	<header>
		<h1>About Us</h1>
	</header>
	<main>
		<section>
			<h3>Oucha Mohamed</h3>
			<p>My name is Oucha Mohamed and I'm a second-year student at Ecole Superieur de Technologie (EST). I'm interested in web development, and I've worked on several projects using PHP, Laravel, and JavaScript.</p>
		</section>
		<section>
			<h3>Sohayeb Mouahid</h3>
			<p>My name is Sohayeb Mouahid and I'm also a second-year student at EST. My interests include web development, machine learning, and data science. I have experience working with Python, Django, and TensorFlow.</p>
		</section>
		<section>
			<h3>Alkhalidi Mohamed</h3>
			<p>My name is Alkhalidi Mohamed and I'm a second-year student at EST. I'm passionate about web development and cybersecurity. I have experience working with PHP, Laravel, and security tools such as Nmap and Wireshark.</p>
		</section>
		<section>
			<h3>Our Collaborative Project</h3>
			<p>As part of our coursework, we worked as a team on a web scraping project using Laravel. Our goal was to collect news articles from Moroccan news websites in French and display them in a central location. We used Laravel's built-in web scraping tools, as well as custom code to clean and parse the data. The final product is a website that aggregates news articles from several sources and displays them in a user-friendly format.</p>
		</section>
	</main>
	<footer>
		<p>Copyright © 2023-2024</p>
	</footer>
</body>
@endsection
