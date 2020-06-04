<?php
include_once "Class/class.php";
include_once "lib/Database.php";
$shout= new Shout();
$blog= new blog();
$db= new Database();

 ?>
 <!DOCTYPE html>

<head>
	<title>Landing page</title>

    <link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600' />
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/plugins.css">
	<link rel="stylesheet" href="css/style_Moktadir_khan.css">
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>


<div id="preloader">
    <img class="logo" src="images/logo_1.png" alt="Center" >

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
                        <li><a href="Sear.html"><img class="logo" src="images/search.png" alt="" width="50" height="50"></a></li>
                        <div class="" title="Go to Profile">
                        <li><a href="UserProfile.html"><img class="logo" src="images/profile.png" alt="" width="78" height=""></a></li>
                        </div>
					</ul>
				</div>
	    </nav>
</header>

<body>
	<div class="shout_container">

	</div>
  <div class="blog_view">
    <div class="b_view">



	<?php
  $per_page= 3;
	if(isset($_GET["page"])){
		$page=$_GET ["page"];
  }else{
    $page=1;

  }
	$start_form =($page-1)* $per_page;

?>




<div class="col-xs-7 col-sm-8 col-lg-8">

  <?php
  $query = "SELECT * FROM review_blog LIMIT $start_form, $per_page";
  $post =$db->select($query);
  if($post){
    while ($data=$post->fetch_assoc()) {
 ?>
              	<div class="blog-item-style-1 blog-item-style-3">
          										<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $data['picture'] ).'"/>';?>
          							<div class="blog-it-infor">
          								<h3><a href="blogdetail_light.html"> <?php echo $data['title']; ?></a></h3>
                             <span><h5><b> <?php echo $data['name'];?> </b> </h5> </span>
                             <br>
          								<span> <?php echo $data['date'];?> </span>
          								<p><?php echo $data['content'];?></p>
          							</div>
          						</div>
                <?php

            }
          }
         ?>

		 <?php
     	$showData= $blog->showAllData();
		$total_rows=mysqli_num_rows($showData);
        $total_pages=ceil($total_rows/$per_page);?>

			<?php
 if($total_pages>1){?>

<?php
 echo "<span class='pagination'><a href='shoutbox.php?page=1'>".'1'."</a>";

 for($i=2;$i<= $total_pages;$i++){
   echo "<a  href='shoutbox.php?page=".$i."'>".$i."</a></span>";
 };

    };
 ?>



		</div>
	</div>
</div>
	<div class="wrapper clr">
	      <header class="headsec clr">

	        <h2>ShoutBox</h2>


	      </header>
	      <section class="content clr">
	        <div class="box">
	          <ul>
	            <?php
	              $getData= $shout->getAllData();
	              if ($getData) {
	                while($data = $getData->fetch_assoc()){ ?>
	                    <li><span><?php echo $data['time']; ?></span>-<b> <?php echo $data['name']; ?></b>: <?php echo $data['body']; ?></li>
	                    <?php

	                }
	              }
	             ?>


	          </ul>
	        </div>
	        <?php
	        if($_SERVER['REQUEST_METHOD']=='POST'){
	          $shoutdata = $shout->insertData($_POST);
	        }
	         ?>
	        <div class="shoutform clr">

	          <form class="shouty"  action="shoutbox.php" method="post">
	                <table>
	                  <tr>
	                    <td>Name:</td>
	                    <td><input type="text" name="name" placeholder="please write your name...." required></td>

	                  </tr>
	                  <tr>
	                    <td>Text:</td>
	                    <td><input type="text" name="body" placeholder="please write your text...." required></td>

	                  </tr>
	                  <tr>

	                    <td><input type="submit" value="Shout IT"></td>
	                  </tr>
	                </table>
	          </form>

	        </div>

	      </section>


	    </div>


<script src="js/jquery.js"></script>
<script src="js/plugins.js"></script>
<script src="js/plugins2.js"></script>
<script src="js/custom.js"></script>


</body>
</html>
