<?php
/**
 * Template Name: Profile Page 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */
?>
<style>
	/* Global Layout Set-up */
* { 
  box-sizing: border-box;
}
  
body {
  margin: 0;
  padding: 0;
  text-align: center;
  font-family: 'Roboto', sans-serif;
  color: #222;
  background: #f7f5f0;
}
/* Link Styles */

a {
  text-decoration: none;
  color: #999;
}
a:hover {
  color: #6633ff;
}

/* Section Styles */

.main-nav {
  width: 100%;
  background: black;
  min-height: 30px;
  padding: 10px;
  position: fixed;
  text-align: center;
}
.nav {
  display: flex;
  justify-content: space-around;
  font-weight: 700;
  list-style-type: none;
  margin: 0 auto;
  padding: 0;
}

.nav .name {
    display: block;
    margin-right: auto;
    color: white;
}
.nav li {
  padding: 5px 10px 10px 10px;
}
.nav a {
  transition: all .5s;
}
.nav a:hover {
  color: white
}

header {
  text-align: center;
  background: url('https://placeimg.com/1000/989/arch') no-repeat top center ;
  background-size: cover;
  overflow: hidden;
  padding-top: 60px;
}
header {
  line-height: 1.5;
}
header .profile-image {
  margin-top: 50px;
  width: 150px;
  height: 150px;
  border-radius: 50%;
  border: 3px solid white;
  transition: all .5s;
}
header .profile-image:hover {
  transform: scale(1.2) rotate(5deg);
}
.tag {
  background-color: #efefef;
  color: black;
  padding: 10px;
  border-radius: 5px;
  display: table;
  margin: 10px auto;
} 
.location {
  background-color: #222;
  color: yellow;
}
.card {
  margin: 30px;
  padding: 20px 40px 40px;
  width: 50%;
  text-align: left;
  background: #fff;
  border-bottom: 4px solid #ccc;
  border-radius: 6px;
  transition: all .5s;
}
.card:hover {
  border-color: #ff99ff;
}

ul.skills {
  padding: 0;
  text-align: center;
}

.skills li {
  border-radius: 6px;
  display: inline-block;
  background: #ff9904;
  color: white;
  padding: 5px 10px;
  margin: 2px;
}

.skills li:nth-child(odd) {
  background: #0399ff;
}

footer {
  width: 100%;
  min-height: 30px;
  padding: 20px 0 40px 20px;
}

footer .copyright {
  top: -8px;
  font-size: .75em;
}

footer ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

footer ul li {
  display: inline-block;
}


.clearfix {
  clear: both;
}

/* Styles for larger screens */
@media screen and (min-width: 720px) {
  
  .flex {
      display: -ms-flexbox;      /* TWEENER - IE 10 */
      display: flex; 
      max-width: 1200px;
      -ms-flex-pack: distribute;
      justify-content: space-around;
      margin: 0 auto;
  }

  header {
    min-height: 470px;
  }

  .nav {
    max-width: 1200px;
    padding: 0 30px;
  }


  main {
    padding-top: 20px;
  }

  main p {
    line-height: 1.6em;
  }

  footer {
    font-size: 1.3em;
    max-width: 1200px;
    margin: 40px auto;
  }

}

</style>

<body>
	 <?php $curl = curl_init();

		 curl_setopt_array($curl, array(
			  CURLOPT_URL => 'https://randomuser.me/api/',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'GET',
		  ));

			$response = curl_exec($curl);
			$decode_response = json_decode($response);
			foreach ($decode_response->results as $key => $value) {
   ?>

		<header>
		  <img src="<?php echo $value->picture->large; ?>" alt="John Doe" class="profile-image">
		  <h1 class="tag name"><?php echo $value->name->title; ?> <?php echo $value->name->first; ?> <?php echo $value->name->last; ?></h1>
		  <p class="tag location"><?php echo $value->location->city; ?> <?php echo $value->location->state; ?> <?php echo $value->location->country; ?>,<?php echo $value->location->postcode; ?></p>
		</header>

	 <main class="flex">
		  <div class="card">
			<h4>Email</h4>
			<p><?php echo $value->email; ?></p>
      <h4>Phone Number</h4>
      <p><?php echo $value->phone; ?></p>
      <h4>Date Of Birth</h4>
      <p><?php echo $value->dob->date; ?></p>
      <h4>Age</h4>
      <p><?php echo $value->dob->age; ?></p>
		  </div> 

		  <div class="card">
        <h4>Gender</h4>
        <p><?php echo $value->gender; ?></p>
			  <h4>Logins</h4>
			  <ul class="skills">
			    <li><strong>Username: </strong><?php echo $value->login->username; ?></li>
			    <li><strong>Password: </strong><?php echo $value->login->password; ?></li>
			  </ul>
		  </div> 

	 </main>
	<?php } ?>
</body>
