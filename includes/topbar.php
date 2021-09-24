  <nav class="navbar top-navbar" style="background: #5385c1">
            	<div class="container-fluid">
                    <div class="row">
                        <div class="navbar-header no-padding">
                			<a class="navbar-brand" href="dashboard.php" style="color: #fff;line-height: 20px;font-size: 25px;">
                			 SURANA COLLEGE
                			</a>
                          
                           
                		</div>
                        <!-- /.navbar-header -->

                		<div class="collapse navbar-collapse" id="navbar-collapse-1" style="float: right;">
                			

                			<ul class="nav navbar-nav ">
                             
                			<li><a href="Change-password.php" style="color: #fff" >Change Admin Password</a></li>

                				    <li><a href="logout.php"  style="color: #fff">Logout</a></li>
                					
                		
                            
                			</ul>
                            <!-- /.nav navbar-nav navbar-right -->
                		</div>
                		<!-- /.navbar-collapse -->
                    </div>
                    <!-- /.row -->
            	</div>
            	<!-- /.container-fluid -->
     

                        <div class="collapse navbar-collapse" id="navbar-collapse-1" style="float: left; margin-left: 20%">
                            
                            <!--Dynamic navigations tab highlight starts-->
                            <ul class="nav navbar-nav " id="hnav">                             
                                <li class="create-class.php"><a href="create-class.php">Create Semester</a></li>
                                <li  class="create-subject.php"><a href="create-subject.php" >Create Subject</a></li>
                                <li class="add-subjectcombination.php"><a href="add-subjectcombination.php">Combine subject</a></li>
                                <li class="add-students.php"><a href="add-students.php">Add student</a></li>
                                <li class="add-result.php"><a href="add-result.php">Declare result</a></li>
                            </ul>
                            <!-- /.nav navbar-nav navbar-right -->
                        </div>
                    </nav>
                    <style type="text/css">
                        .navbar-nav>li a {
                            color: #fff;
                        }
                        .nav > li.active{
                            background-color:#11445f;
                            border-top-left-radius: 15px;
                            border-top-right-radius: 15px;
                        }           

                    </style>
                    <script src="assets/js/jquery.min.js"></script>
                    <script>
                        $(function(){                            
                            var pathArray = window.location.pathname.split('/');
                            var secondLevelLocation = pathArray[2];
                            $('.nav > li').removeClass('active')
                            var tLis = $('#hnav li').length;

                            for(var i=0; i<tLis; i++) {                                
                                if($('#hnav li')[i].className == secondLevelLocation){
                                    i++;
                                   $('#hnav li:nth-of-type('+i+')').addClass('active');
                                   break;
                                }
                            }
                            
                        });
                    </script>
                    <!--- dynamic navigations tab highlight ends here-->