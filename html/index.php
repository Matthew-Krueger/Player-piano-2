<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
    require_once("/var/www/html/func/core/init.php");
  ?>
	<meta charset="utf-8">
	<title>Project Title</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
    crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
    integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
    crossorigin="anonymous">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
          body {
            background: #eee;
            font: 20px Lucida sans, Arial, Helvetica, sans-serif;
          	color: #333;
          }
          .form-wrapper {
          	background-color: #f6f6f6;
          	background-image: -webkit-gradient(linear, left top, left bottom, from(#f6f6f6), to(#eae8e8));
          	background-image: -webkit-linear-gradient(top, #f6f6f6, #eae8e8);
          	background-image: -moz-linear-gradient(top, #f6f6f6, #eae8e8);
          	background-image: -ms-linear-gradient(top, #f6f6f6, #eae8e8);
          	background-image: -o-linear-gradient(top, #f6f6f6, #eae8e8);
          	background-image: linear-gradient(top, #f6f6f6, #eae8e8);
          	border-color: #dedede #bababa #aaa #bababa;
          	border-style: solid;
          	border-width: 1px;
          	-webkit-border-radius: 10px;
          	-moz-border-radius: 10px;
          	border-radius: 10px;
          	-webkit-box-shadow: 0 3px 3px rgba(255,255,255,.1), 0 3px 0 #bbb, 0 4px 0 #aaa, 0 5px 5px #444;
          	-moz-box-shadow: 0 3px 3px rgba(255,255,255,.1), 0 3px 0 #bbb, 0 4px 0 #aaa, 0 5px 5px #444;
          	box-shadow: 0 3px 3px rgba(255,255,255,.1), 0 3px 0 #bbb, 0 4px 0 #aaa, 0 5px 5px #444;
          	margin: 100px auto;
          	overflow: hidden;
          	padding: 8px;
          	width: 450px;
          }
          .form-wrapper #search {
          	border: 1px solid #CCC;
          	-webkit-box-shadow: 0 1px 1px #ddd inset, 0 1px 0 #FFF;
          	-moz-box-shadow: 0 1px 1px #ddd inset, 0 1px 0 #FFF;
          	box-shadow: 0 1px 1px #ddd inset, 0 1px 0 #FFF;
          	-webkit-border-radius: 3px;
          	-moz-border-radius: 3px;
          	border-radius: 3px;
            color: #999;
          	float: left;
          	font: 16px Lucida Sans, Trebuchet MS, Tahoma, sans-serif;
          	height: 20px;
          	padding: 10px;
          	width: 320px;
          }

          .form-wrapper #search:focus {
          	border-color: #aaa;
          	-webkit-box-shadow: 0 1px 1px #bbb inset;
          	-moz-box-shadow: 0 1px 1px #bbb inset;
          	box-shadow: 0 1px 1px #bbb inset;
          	outline: 0;
          }

          .form-wrapper #search:-moz-placeholder,
          .form-wrapper #search:-ms-input-placeholder,
          .form-wrapper #search::-webkit-input-placeholder {
          	color: #999;
          	font-weight: normal;
          }

          .form-wrapper #submit {
          	background-color: #0483a0;
          	background-image: -webkit-gradient(linear, left top, left bottom, from(#31b2c3), to(#0483a0));
          	background-image: -webkit-linear-gradient(top, #31b2c3, #0483a0);
          	background-image: -moz-linear-gradient(top, #31b2c3, #0483a0);
          	background-image: -ms-linear-gradient(top, #31b2c3, #0483a0);
          	background-image: -o-linear-gradient(top, #31b2c3, #0483a0);
          	background-image: linear-gradient(top, #31b2c3, #0483a0);
          	border: 1px solid #00748f;
          	-moz-border-radius: 3px;
          	-webkit-border-radius: 3px;
          	border-radius: 3px;
          	-webkit-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 0 #FFF;
          	-moz-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 0 #FFF;
          	box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset, 0 1px 0 #FFF;
          	color: #fafafa;
          	cursor: pointer;
          	height: 42px;
          	float: right;
          	font: 15px Arial, Helvetica;
          	padding: 0;
          	text-transform: uppercase;
          	text-shadow: 0 1px 0 rgba(0, 0 ,0, .3);
          	width: 100px;
          }

          .form-wrapper #submit:hover,
          .form-wrapper #submit:focus {
          	background-color: #31b2c3;
          	background-image: -webkit-gradient(linear, left top, left bottom, from(#0483a0), to(#31b2c3));
          	background-image: -webkit-linear-gradient(top, #0483a0, #31b2c3);
          	background-image: -moz-linear-gradient(top, #0483a0, #31b2c3);
          	background-image: -ms-linear-gradient(top, #0483a0, #31b2c3);
          	background-image: -o-linear-gradient(top, #0483a0, #31b2c3);
          	background-image: linear-gradient(top, #0483a0, #31b2c3);
          }

          .form-wrapper #submit:active {
          	-webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;
          	-moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;
          	box-shadow: 0 1px 4px rgba(0, 0, 0, 0.5) inset;
          	outline: 0;
          }

          .form-wrapper #submit::-moz-focus-inner {
          	border: 0;
          }
          .dropbtn {
              background-color: #4CAF50;
              color: white;
              padding: 16px;
              font-size: 16px;
              border: none;
              cursor: pointer;
          }

          .dropbtn:hover, .dropbtn:focus {
              background-color: #3e8e41;
          }

          .dropdown {
               padding: 20px;
              position: relative;
              display: inline-block;
          }

          .dropdown-content {
              display: none;
              background-color: #f9f9f9;
              min-width: 160px;
              overflow: auto;
              box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
          }

          .dropdown-content a {
              color: black;
              padding: 12px 16px;
              text-decoration: none;
              display: block;
          }

          .dropdown a:hover {background-color: #f1f1f1}

          .show {display:block;}
     </style>

</head>
<body>
     <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Start Bootstrap</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="about.html">About</a>
                    </li>
                    <li>
                        <a href="services.html">Services</a>
                    </li>
                    <li>
                        <a href="contact.html">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Welcome to Player Piano
                </h1>
                <h3>Library</h3>
                <form class="form-wrapper">
                     <input type="text" id="search" placeholder="Search your library for..." required>
                     <input type="submit" value="go" id="submit">
                </form>
                <div class="libContent row col-lg-12" style="border: .5px solid black; border-radius: 5px;">
                     <?php
                         echo "<pre>", print_r(File::listDir("/var/www/midi")), "</pre>";

                         $dirarr = File::listDir("/var/www/midi/");
                         $ids = 1;
                         foreach ($dirarr as $rootitem) {
                              $ids++;
                              if($rootitem == "." || $rootitem == ".."){
                                   continue;
                              }

                              if(is_array($rootitem)){
                                   echo "<div class=\"dropdown\">
                                   <button onclick=\"dropdownMenu{$ids}()\" class=\"dropbtn\"></button>
                                   <div id=\"myDropdown{$ids}\" class=\"dropdown-content\">";

                                   foreach ($rootitem as $layer2item) {
                                        echo "<div>item$ids to do: $layer2item</div>";
                                   }


                              }elseif (is_string($rootitem)) {

                                   echo "<div class=\"dropdown\"><div class=\"dropbtn\">Id$ids to do: $rootitem</div></div>";

                              }
                              ?></div><?php
                         }



                     ?>


                     <div class="dropdown">
                         <button onclick="dropdownMenu()" class="dropbtn">Dropdown</button>
                         <div id="myDropdown" class="dropdown-content">
                              <a href="#home">Home</a>
                              <a href="#about">About</a>
                              <a href="#contact">Contact</a>
                       </div>
                    </div>
                </div>
                <!-- /.libContent -->
           </div>
       </div>
        <!-- /.row -->

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    Made with love in Liberty Center, Ohio | Copyright &copy; 2016 Copyright Holder All Rights Reserved.
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->
    <script>
          /* When the user clicks on the button,
          toggle between hiding and showing the dropdown content */
          function dropdownMenu() {
              document.getElementById("myDropdown").classList.toggle("show");
          }

          // Close the dropdown if the user clicks outside of it
          window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {

              var dropdowns = document.getElementsByClassName("dropdown-content");
              var i;
              for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                  openDropdown.classList.remove('show');
                }
              }
            }
          }
     </script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
