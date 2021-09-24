<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
        ?>

<!DOCTYPE HTML>

<html>
    <head>
        
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="akash/css/main.css" />
         <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Dashboard</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/toastr/toastr.min.css" media="screen" >
        <link rel="stylesheet" href="css/icheck/skins/line/blue.css" >
        <link rel="stylesheet" href="css/icheck/skins/line/red.css" >
        <link rel="stylesheet" href="css/icheck/skins/line/green.css" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>
 <body class="top-navbar-fixed">
        <div class="main-wrapper">
              <?php include('includes/topbar.php');?>
            <div class="content-wrapper">
           
            <section id="banner" style="background: url(images/surana.jpeg) no-repeat; background-position: center; background-repeat: no-repeat;background-size: cover;">
                <h1>ADMIN PANEL</h1>
                <p>BCA-BACHALOR OF COMPUTER SCIENCE</p>
            </section>

        <!-- One             
            <section id="two" class="wrapper style1 special">
                <div class="inner">
                    <header>
                        <h2>Department Staff</h2>
                        
                    </header>
                       <div class="box person">
                            <div class="image round">
                                <img src="images/hod.JPG" alt="Person 1" height="168" width="168" />
                            </div>
                            <h3>HOD</h3>
                            <p>Dr A Sreenivas</p>
                        </div>
                    </div>
                    <div class="flex flex-4">

                        <div class="box person">
                            <div class="image round">
                                <img src="images/Mithili.jpg" alt="Person 1" height="168" width="168" />
                            </div>
                            <h3>Mithili Devi</h3>
                            <p></p>
                        </div>
                          <div class="box person">
                            <div class="image round">
                                <img src="images/Geetha.jpg" alt="Person 1" />
                            </div>
                            <h3>Geetha A M</h3>
                            <p></p>
                        </div>
                        <div class="box person">
                            <div class="image round">
                                <img src="images/Padmageetha.jpg" alt="Person 2" />
                            </div>
                            <h3>B G Padmageetha</h3>
                            <p></p>
                        </div>
                        <div class="box person">
                            <div class="image round">
                                <img src="images/Vidya.jpg" alt="Person 3" />
                            </div>
                            <h3>Vidya A</h3>
                            <p></p>
                        </div>
                        <div class="box person">
                            <div class="image round">
                                <img src="images/Rashmi.jpg" alt="Person 4" />
                            </div>
                            <h3>Rashmi Eshwar</h3>
                            <p></p>
                        </div>
                         <div class="box person">
                            <div class="image round">
                                <img src="images/Ashwini.jpg" alt="Person 1" />
                            </div>
                            <h3>Ashwini S Diwaker</h3>
                            <p></p>
                        </div>
                         <div class="box person">
                            <div class="image round">
                                <img src="images/shravani.jpg" alt="Person 1" />
                            </div>
                            <h3>Shravani B</h3>
                            <p></p>
                        </div>
                         <div class="box person">
                            <div class="image round">
                                <img src="images/Srinivas-rao.jpg" alt="Person 1" />
                            </div>
                            <h3>R Sreenivas Rao</h3>
                            <p></p>
                        </div>
                    </div>

                </div>
            </section>
-->
    
            <footer id="footer">
                <div class="inner">
                    <div class="flex">
                        <div class="copyright">
                            &copy; bcareport card <a href="https://unsplash.com">DESIGN</a>.
                        </div>
                        <ul class="icons">
                            <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                            <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                            <li><a href="#" class="icon fa-linkedin"><span class="label">linkedIn</span></a></li>
                            <li><a href="#" class="icon fa-pinterest-p"><span class="label">Pinterest</span></a></li>
                            <li><a href="#" class="icon fa-vimeo"><span class="label">Vimeo</span></a></li>
                        </ul>
                    </div>
                </div>
            </footer>

        
            <script src="js/jquery.min.js"></script>
            <script src="js/skel.min.js"></script>
            <script src="js/util.js"></script>
            <script src="js/main.js"></script>

    </body>
</html>
<?php } ?>
