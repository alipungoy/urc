<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-primary topbar mb-4 static-top shadow">
    <a class="navbar-brand font-weight-bold text-warning">
        <img src="../assets/images/logo.png" width="30" height="30" class="d-inline-block align-top"
            alt="">
        UNIVERSITY RESEARCH CENTER
    </a>
        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Search -->

        <!-- Topbar Navbar -->
        <ul class="navbar-nav mr-auto">
        <li class="nav-item">
                <a class="nav-link" href="../index.php">Home</a>
            </li>

            <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" 
            aria-haspopup="true" aria-expanded="false">
            About Us
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="../about.php">Background & Rationale</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../about.php">Legal Bases</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../about.php">Vision Mission Objectives</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../about.php">Core Values</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../about.php">Program Management</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../about.php">Major Programs</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../about.php">Research Process Flow</a>
            </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../event.php">Events</a>
            </li>
            <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" 
            aria-haspopup="true" aria-expanded="false">
            Researches
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="../about.php">Faculty Research</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../about.php">Student Research</a>
            </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../journal.php">Journals</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../statistic.php">Statistics</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../contact.php">Contact Us</a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
        <?php    
        if(!isset($_SESSION['loggedin'])) {
          ?>
            <li class="nav-item">
                <a class="nav-link" id="register" href="#">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="login" href="#">Login</a>
            </li>
        <?php
        } elseif($_SESSION['user_type'] == 'Admin' || $_SESSION['user_type'] == 'Reviewer' || $_SESSION['user_type'] == 'User'){
        ?>
            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search fa-fw"></i>
                </a>
                <!-- Dropdown - Messages -->
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                    aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small"
                                placeholder="Search for..." aria-label="Search"
                                aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell fa-fw"></i>
                    <!-- Counter - Alerts -->
                    <span class="badge badge-danger badge-counter" id="notifbadge"></span>
                </a>
                <!-- Dropdown - Alerts -->
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="alertsDropdown">
                    <h6 class="dropdown-header">
                        Alerts Center
                    </h6>
                    <div id="notif"></div>
                    <a class="dropdown-item text-center small text-gray-500" href="#">Show All Notification</a>
                </div>
            </li>


            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                    <img class="img-profile rounded-circle"
                        src="../assets/imagesundraw_profile.svg">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="../profile.php">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    <a class="dropdown-item" href="../profilesettings.php">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Settings
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                        Activity Log
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>
            <?php
        }
            ?>
        </ul>
    </nav>

    
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-md" role="document">
    <!-- <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title text-primary" id="exampleModalLabel">Login</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <br>
        <div class="modal-body">
          <div>
          </div>
              <div class="container auth-form mb-5">
    <br> -->
    <div class="container auth-form modal-content">
        <div class="d-flex justify-content-end mt-3 ml-4">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    <h2 class="text-primary">Sign In</h2>
    <br>
    <form id="frmLogin">
        <div class="form-group">
            <input id="frmLoginUsername" type="text" class="form-control" name="USERNAME" placeholder="Username or Email" required="required" value="">
        </div>
        <div class="form-group">
            <input id="frmLoginPassword" type="password" class="form-control" name="PASSWORD" placeholder="Password" required="required"
                value="" autocomplete="current-password">
                <small><a href="">Forgot Password?</a></small>
        </div>
        <div class="form-group">
            <button id="frmBtnLogin" type="submit" class="btn btn-primary btn-md btn-block mb-1">Log in</button>
            <small class="text-info" style="font-style:italic">Dont Have An Account?<a id="chngReg" href="#"> Click Here</a></small>
        </div>
        <br>
    </form>
</div>
                  </div>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="regModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-md" role="document">
    <!-- <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title text-primary" id="exampleModalLabel">Login</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <br> -->
    <div class="container auth-form modal-content">
        <div class="d-flex justify-content-end mt-3 ml-4">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    <h2 class="text-primary">Register</h2>
    <p class="hint-text">Create your account. </p>
    <form id="frmRegister">
        <div class="form-group">
            <input type="text" id="frmRegisterUsername" class="form-control" name="USERNAME" placeholder="Username" required="required" value="">
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-6">
                    <input type="text" class="form-control" name="FIRST_NAME" placeholder="First Name"
                        required="required" value="">
                </div>
                <div class="col-6">
                    <input type="text" class="form-control" name="LAST_NAME" placeholder="Last Name" required="required"
                        value="">
                </div>
            </div>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="suffix" placeholder="Middle Initial" value="">
        </div>
        <div class="form-group">
           <select class="form-control" name="classification" id="classification">
            <option selected="selected" disabled>Choose User Classification</option>
               <option value="faculty">Faculty</option>
               <option value="staff">Staff</option>
               <option value="Student">Student</option>
           </select>
        </div>
        <div class="form-group">
           <select class="form-control" name="dept" id="dept">
            <option selected="selected" disabled>Department</option>
               <option value="SENIOR HIGH SCHOOL">SENIOR HIGH SCHOOL</option>
               <option value="COLLEGE OF AGRICULTURE, RESOURCES AND ENVIRONMENTAL SCIENCES">COLLEGE OF AGRICULTURE, RESOURCES AND ENVIRONMENTAL SCIENCES</option>
               <option value="COLLEGE OF ARTS & SCIENCES">COLLEGE OF ARTS & SCIENCES</option>
               <option value="COLLEGE OF BUSINESS & ACCOUNTANCY">COLLEGE OF BUSINESS & ACCOUNTANCY</option>
               <option value="COLLEGE OF COMPUTER STUDIES">COLLEGE OF COMPUTER STUDIES</option>
               <option value="COLLEGE OF EDUCATION">COLLEGE OF EDUCATION</option>
               <option value="COLLEGE OF ENGINEERING">COLLEGE OF ENGINEERING</option>
               <option value="COLLEGE OF HOSPITALITY MANAGEMENT">COLLEGE OF HOSPITALITY MANAGEMENT</option>
               <option value="COLLEGE OF MEDICAL LABORATORY SCIENCE">COLLEGE OF MEDICAL LABORATORY SCIENCE</option>
               <option value="COLLEGE OF NURSING">COLLEGE OF NURSING</option>
               <option value="COLLEGE OF PHARMACY">COLLEGE OF PHARMACY</option>
               <option value="COLLEGE OF LAW">COLLEGE OF LAW</option>
               <option value="COLLEGE OF MEDICINE">COLLEGE OF MEDICINE</option>
               <option value="COLLEGE OF THEOLOGY">COLLEGE OF THEOLOGY</option>
           </select>
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="EMAIL" placeholder="E-mail" required="required" value="">
        </div>
        <div class="form-group">
            <input id="frmRegisterPassword" type="password" class="form-control" name="PASSWORD"
                placeholder="Password" required="required" value="">
        </div>
        <div class="form-group">
            <input id="frmRegisterConfirmPassword" type="password" class="form-control" name="CONFIRM_PASSWORD"
                placeholder="Confirm Password" required="required">
        </div>
        <div class="form-group">
            <button id="frmBtnRegister" type="submit" class="btn btn-primary btn-lg btn-block">Register Now</button>
        </div>
        <div class="text-center">Already have an account? <a id="chgSgnIn" href="#">Sign in</a></div>
    </form>
</div>

<!-- <div id="testModal" class="modal fade"  tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <p>A verification link has been sent your email</p>
  </div>
</div>
</div>
                  </div> -->
        <!-- </div> -->
    </div>
</div>
</div>

<script>
    $(function() {
        $('#login').on('click', function(e){
            e.preventDefault();
            $('#loginModal').modal('show');
        });

        $('#register').on('click', function(e){
            e.preventDefault();
            $('#regModal').modal('show');
        })

    $('#chgSgnIn').on('click', function(e){
        e.preventDefault();
        $('#regModal').modal('hide');
            $('#loginModal').modal('show');
    });

    $('#chngReg').on('click', function(e){
        e.preventDefault();
        $('#loginModal').modal('hide');
            $('#regModal').modal('show');
    });


    //login form
    $('#frmLogin').on('submit', function (e) {
            e.preventDefault();
            var FormData = $('#frmLogin').serialize();

            $.ajax({
                type: 'post',
                url: '../forms/login.php',
                data: FormData,
                dataType: 'json',
                encode: true,
                beforeSend: function () {
                    $('#frmBtnLogin').text("Logging in");
                },
                success: function (data) {
                    if (data.error) {
                        $('#frmLoginPassword').text('');
                        $('#frmBtnLogin').text("Log in");

                        bootbox.alert({
                            title: 'ERROR!',
                            message: data.error.msg,
                        });
                    } else {
                        location.reload();
                            
                    }

                }
            });
        });

        //register form
        $('#frmRegister').on('submit', function (e) {
            e.preventDefault();
            var FormData = $('#frmRegister').serialize();
            var formPassword = $('#frmRegisterPassword');
            var formConfirmPassword = $('#frmRegisterConfirmPassword');
            
            if(formPassword.val().length < 6) {
                alert('Password must be longer than 6 characters');
                formPassword.val('');
                formConfirmPassword.val('');

                return;
            }

            if(formPassword.val() != formConfirmPassword.val()) {
                alert("Password doesn't match");
                formConfirmPassword.val('');

                return;
            }

            $.ajax({
                type: 'post',
                url: '../forms/register.php',
                data: FormData,
                dataType: 'json',
                encode: true,
                beforeSend: function () {
                    $('#frmBtnRegister').text("Registering..");
                },
                success: function (data) {
                    if (data.error) {
                         $('#frmLoginUsername').text('');

                         alert(data.error.msg);
                    } else {
                       bootbox.alert('A Confirmation has been sent to the email you provided')
                        $('#frmRegister').trigger("reset");
                        $('#regModal').modal("hide");
                    }

                    $('#frmBtnRegister').text("Register");
                }
            });
        });

        $(".dropdown").hover(function(){
        var dropdownMenu = $(this).children(".dropdown-menu");
        if(dropdownMenu.is(":visible")){
            dropdownMenu.parent().toggleClass("show");
            // console.log(dropdownMenu)
        }
    });
     
    });
</script>