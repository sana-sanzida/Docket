<?php
include_once "Class/class.php";
$moviewatching= new moviewatching();
$movieplanned= new movieplanned();
$moviefinished= new moviefinished();


 ?>
<!DOCTYPE html>

<head>
	<title>Movies</title>

    <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600' />
	<link rel="stylesheet" href="css/plugins.css">
	<link rel="stylesheet" href="css/style_Moktadir_khan.css">
</head>


<div id="preloader">
    <img class="logo" src="images/logo_1.png" alt="Center" >
    <div id="status">
        <span></span>
        <span></span>
    </div>
</div>


<header class="ht-header">
	<div class="container">
		<nav class="navbar navbar-default navbar-custom">
				<div class="navbar-header logo">
				    <div class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					    <span class="sr-only">Toggle navigation</span>
					    <div id="nav-icon1">
							<span></span>
							<span></span>
							<span></span>
						</div>
				    </div>
				    <a href="UserProfile.html"><img class="logo" src="images/logo_1.png" alt="" width="150" height="60"></a>
				</div>

				<div class="collapse navbar-collapse flex-parent" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav flex-child-menu menu-left">
						<li><a href="Anime.html"><h4>Anime</h4></a></li>
						<li><a href="movie.html"><h4> Movies </h4></a></li>
						<li><a href="TvSeries.html"><h4> Tv-Series </h4></a></li>
						<li><a href="games.html"><h4> Games </h4></a></li>
						<li><a href="Books.html"><h4> Books </h4></a></li>
						<li><a href="blogList.html"><h4>Blogs </h4></a></li>
					</ul>

					<ul class="nav navbar-nav flex-child-menu menu-right">
                        <li><a href="Search.html"><img class="logo" src="images/search.png" alt="" width="50" height="50"></a></li>
                        <div class="" title="Go to Profile">
                        <li><a href="UserProfile.html"><img class="logo" src="images/profile.png" alt="" width="78" height=""></a></li>
                        </div>
					</ul>
				</div>
	    </nav>
</header>

<body>
	<div class="hero user-heroFriend">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="hero-ctFriends">

	                    <h1>My Movie List</h1>
					</div>
				</div>
			</div>
	    </div>
	</div>
<div class="flex-wrap-movielist mv-grid-fw">
			<div class="movie_container">
             <h4>Watching Now<br></h4>
            <svg height="10" width="500">
                <line x1="0" y1="0" x2="200" y2="0" style="stroke:rgb(61, 61, 61);stroke-width:1"/>
            </svg>
			
	<div class="playlist_container">
		<?php
		$showData= $moviewatching->showAllData();
          if ($showData) {
            while($data = $showData->fetch_assoc()){ ?>	
			
			
		<div class="movie-item-style-2 movie-item-style-1">
			<img src="images/uploads/mv1.jpg" alt="">
			<div class="mv-item-infor">
				<h6><a href="#"><?php echo $data['name'];?></a></h6>
				<p class="rate"><i class="ion-android-star"></i><span><?php echo $data['ratings'];?></span> /10</p>	
			</div>
		</div>
	
		<?php
		}
		}
?>
	</div>
<h4>Planned To Watch<br></h4>
            <svg height="10" width="500">
                <line x1="0" y1="0" x2="200" y2="0" style="stroke:rgb(61, 61, 61);stroke-width:1"/>
            </svg>
			
		<div class="playlist_container">
		<?php
		$showData= $movieplanned->showAllData();
          if ($showData) {
            while($data = $showData->fetch_assoc()){ ?>	
			
			
		<div class="movie-item-style-2 movie-item-style-1">
			<img src="<?php echo $data['name'];?>" alt="">
			<div class="mv-item-infor">
				<h6><a href="#"><?php echo $data['name'];?></a></h6>
				<p class="rate"><i class="ion-android-star"></i><span><?php echo $data['ratings'];?></span> /10</p>	
			</div>
		</div>
		
		<?php
		}
		}
?>
</div>

<h4>Already Watched<br></h4>
            <svg height="10" width="500">
                <line x1="0" y1="0" x2="200" y2="0" style="stroke:rgb(61, 61, 61);stroke-width:1"/>
            </svg>
			<div class="playlist_container">
		<?php
		$showData= $moviefinished->showAllData();
          if ($showData) {
            while($data = $showData->fetch_assoc()){ ?>	
			
			
		<div class="movie-item-style-2 movie-item-style-1">
			<img src="$images" alt="">
			<div class="mv-item-infor">
				<h6><a href="#"><?php echo $data['name'];?></a></h6>
				<p class="rate"><i class="ion-android-star"></i><span><?php echo $data['ratings'];?></span> /10</p>	
			</div>
		</div>
		
		<?php
		}
		}
?>
	</div>
					
	

</div>


</div>

<script src="js/jquery.js"></script>
<script src="js/plugins.js"></script>
<script src="js/plugins2.js"></script>
<script src="js/custom.js"></script>
</body>

</html>
