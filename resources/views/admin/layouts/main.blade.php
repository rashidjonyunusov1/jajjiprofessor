<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
	<!-- My CSS -->
	<link rel="stylesheet" href="/style/style.css">

	<title>AdminHub</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">AdminHub</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="{{ route('admin.dashboard') }}">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="{{ route('admin.infos.index') }}">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Infos</span>
				</a>
			</li>
			<li>
				<a href="{{ route('admin.numbers.index') }}">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Numbers</span>
				</a>
			</li>
			<li>
				<a href="{{ route('admin.humans.index') }}">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Humans</span>
				</a>
			</li>
			<li>
				<a href="{{ route('admin.groups.index') }}">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Groups</span>
				</a>
			</li>
			<li>
				<a href="{{route('admin.teachers.index')}}">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Teachers</span>
				</a>
			</li>
			<li>
				<a href="{{route('admin.comments.index')}}">
					<i class='bx bxs-group' ></i>
					<span class="text">Comments</span>
				</a>
			</li>
            <li>
				<a href="{{ route('admin.blogs.index') }}">
					<i class='bx bxs-group' ></i>
					<span class="text">Blogs</span>
				</a>
			</li>
            <li>
				<a href="{{ route('admin.wins.index') }}">
					<i class='bx bxs-group' ></i>
					<span class="text">Wins
                    </span>
				</a>
			</li>
            <li>
				<a href="{{ route('admin.photos.index') }}">
					<i class='bx bxs-group' ></i>
					<span class="text">Photos</span>
				</a>
			</li>
            <br>
            <li>
				<a href="{{ route('admin.orders.index') }}">
					<i class='bx bxs-group' ></i>
					<span class="text">Order</span>
				</a>
			</li>
            <li>
				<a href="{{ route('admin.complaints.index') }}">
					<i class='bx bxs-group' ></i>
					<span class="text">Complaints</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="#" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="/style/img/people.png">
			</a>
		</nav>
		<!-- NAVBAR -->

		@yield('content')
	</section>
	<!-- CONTENT -->
	<script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
	<script src="/admin/script.js"></script>
</body>
</html>