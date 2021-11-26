<nav id="nav" class="">
    <div id="nav__header" class="position-relative">
        <div id="nav__header__container" class="d-flex align-items-center w-50 position-absolute start-0 end-0 mx-auto">
            <a href="index.php">
                <img src="https://cpu.edu.ph/wp-content/uploads/2018/04/cpu-logo.png"
                    alt="Central Philippine University" id="nav__header__logo" height="110">
            </a>
            <div class="text-center ms-3">
                <h3 id="nav__header__text" class="mb-0 fs-4">CENTRAL PHILIPPINE UNIVERSITY</h3>
                <p>University Research Center</p>
            </div>
        </div>
    </div>
    <div id="nav__menu" class="py-2">
        <div class="ms-auto d-flex justify-content-between px-3" id="nav__menu__container">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarAboutUs" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        About Us
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarAboutUs">
                        <li><a class="dropdown-item" href="background-and-rationale.php">Bacground & Rationale</a></li>
                        <li><a class="dropdown-item" href="legal-bases.php">Legal Bases</a></li>
                        <li><a class="dropdown-item" href="vision-mission-and-objectives.php">Vision, Mission, &
                                Objectives</a></li>
                        <li><a class="dropdown-item" href="core-values.php">Core Values</a></li>
                        <li><a class="dropdown-item" href="program-management.php">Program Managment</a></li>
                        <li><a class="dropdown-item" href="major-programs.php">Major Programs</a></li>
                        <li><a class="dropdown-item" href="research-process-flow.php">Research Process Flow</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="events.php">Events</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarResearches" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Researches
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarResearches">
                        <li><a class="dropdown-item" href="faculty-research.php">Faculty Research</a></li>
                        <li><a class="dropdown-item" href="student-research.php">Student Research</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="journals.php">Journals</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="statistics.php">Statistics</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact Us</a>
                </li>
            </ul>
            <ul class="nav ms-10">
                <?php
        if (!isset($_SESSION['loggedin'])) {
            ?>
                <li class="nav-item">
                    <a class="nav-link" id="register" href="#">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="login" href="#">Login</a>
                </li>
                <?php
        } elseif ($_SESSION['user_type'] == 'Admin' || $_SESSION['user_type'] == 'Reviewer' || $_SESSION['user_type'] == 'user') {
            ?>
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link px-2 dropdown-toggle" href="#" id="navbarSearch" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                    <div class="dropdown-menu p-2" aria-labelledby="navbarSearch" style="min-width: 15vw">
                        <form class="navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small"
                                    placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li> -->

                <!-- Nav Item - Alerts -->
                <li class="nav-item dropdown">
                    <a class="nav-link px-2 dropdown-toggle" href="#" id="navbarAlerts" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bell"></i>
                        <!-- Counter - Alerts -->
                        <span class="badge badge-danger badge-counter" id="notifbadge"></span>
                    </a>
                    <!-- Dropdown - Alerts -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="navbarAlerts">
                        <h6 class="dropdown-header">
                            Alerts Center
                        </h6>
                        <div id="notif"></div>
                        <a class="dropdown-item text-center small text-gray-500" href="#">Show All Notification</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link px-2 dropdown-toggle" href="#" id="navbarAccount" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarAccount">
                    <a class="dropdown-item" href="dashboard.php">
                            Dashboard
                        </a>
                        <a class="dropdown-item" href="profile.php">
                            Profile
                        </a>
                        <a class="dropdown-item" href="settings.php">
                            Settings
                        </a>
                        <a class="dropdown-item" href="#">
                            Activity Log
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" id="logout" data-toggle="modal" data-target="#logoutModal">
                            Logout
                        </a>
                    </div>
                </li>
                <?php
        }
            ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Logout Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
                <h5 class="modal-title">Ready to Leave?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <small class="modal-body">Select "Logout" below if you are ready to end your current session.</small>
            <div class="modal-footer">
                <a class="btn btn-danger" href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="container modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sign In</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="frmLogin" class="modal-body row g-3">
                <div class="form-group">
                    <input id="frmLoginUsername" type="text" class="form-control" name="USERNAME"
                        placeholder="Username or Email" required="required" value="">
                </div>
                <div class="form-group">
                    <input id="frmLoginPassword" type="password" class="form-control" name="PASSWORD"
                        placeholder="Password" required="required" value="" autocomplete="current-password">
                </div>
                <small>
                    <a href="#" style="cursor: not-allowed" title="Coming Soon...">Forgot Password?</a>
                </small>
                <div class="modal-footer">
                    <small>Don't have an account? <a id="chngReg" href="#">Register now!</a></small>
                    <button id="frmBtnLogin" type="submit" class="btn btn-primary btn-block">Log in</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Register Modal -->
<div class="modal fade" id="regModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Register</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="frmRegister" class="modal-body row g-3">
                <div class="form-group">
                    <input type="text" id="frmRegisterUsername" class="form-control" name="USERNAME"
                        placeholder="Username" required="required" value="">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <input type="text" class="form-control" name="FIRST_NAME" placeholder="First Name"
                                required="required" value="">
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" name="LAST_NAME" placeholder="Last Name"
                                required="required" value="">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="suffix" placeholder="Middle Initial" value="">
                </div>
                <div class="form-group">
                    <select class="form-control" name="classification" id="classification">
                        <option selected disabled hidden>Choose User Classification</option>
                        <option value="faculty">Faculty</option>
                        <option value="staff">Staff</option>
                        <option value="Student">Student</option>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" name="dept" id="dept">
                        <option selected disabled hidden>Choose Department</option>
                        <option value="SENIOR HIGH SCHOOL">SENIOR HIGH SCHOOL</option>
                        <option value="COLLEGE OF AGRICULTURE, RESOURCES AND ENVIRONMENTAL SCIENCES">COLLEGE OF
                            AGRICULTURE, RESOURCES AND ENVIRONMENTAL SCIENCES</option>
                        <option value="COLLEGE OF ARTS & SCIENCES">COLLEGE OF ARTS & SCIENCES</option>
                        <option value="COLLEGE OF BUSINESS & ACCOUNTANCY">COLLEGE OF BUSINESS & ACCOUNTANCY</option>
                        <option value="COLLEGE OF COMPUTER STUDIES">COLLEGE OF COMPUTER STUDIES</option>
                        <option value="COLLEGE OF EDUCATION">COLLEGE OF EDUCATION</option>
                        <option value="COLLEGE OF ENGINEERING">COLLEGE OF ENGINEERING</option>
                        <option value="COLLEGE OF HOSPITALITY MANAGEMENT">COLLEGE OF HOSPITALITY MANAGEMENT</option>
                        <option value="COLLEGE OF MEDICAL LABORATORY SCIENCE">COLLEGE OF MEDICAL LABORATORY SCIENCE
                        </option>
                        <option value="COLLEGE OF NURSING">COLLEGE OF NURSING</option>
                        <option value="COLLEGE OF PHARMACY">COLLEGE OF PHARMACY</option>
                        <option value="COLLEGE OF LAW">COLLEGE OF LAW</option>
                        <option value="COLLEGE OF MEDICINE">COLLEGE OF MEDICINE</option>
                        <option value="COLLEGE OF THEOLOGY">COLLEGE OF THEOLOGY</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="EMAIL" placeholder="E-mail" required="required"
                        value="">
                </div>
                <div class="form-group">
                    <input id="frmRegisterPassword" type="password" class="form-control" name="PASSWORD"
                        placeholder="Password" required="required" value="">
                </div>
                <div class="form-group">
                    <input id="frmRegisterConfirmPassword" type="password" class="form-control" name="CONFIRM_PASSWORD"
                        placeholder="Confirm Password" required="required">
                </div>
                <div class="modal-footer">
                    <small class="text-center">Already have an account? <a id="chgSgnIn" href="#">Sign in</a></small>
                    <button id="frmBtnRegister" type="submit" class="btn btn-primary btn-block">Register
                        Now</button>
                </div>
        </div>
        </form>
    </div>
</div>
</div>

<script>
$(function() {
    $('#login').on('click', function(e) {
        e.preventDefault();
        $('#loginModal').modal('show');
    });

    $('#register').on('click', function(e) {
        e.preventDefault();
        $('#regModal').modal('show');
    })

    $('#chgSgnIn').on('click', function(e) {
        e.preventDefault();
        $('#regModal').modal('hide');
        $('#loginModal').modal('show');
    });

    $('#chngReg').on('click', function(e) {
        e.preventDefault();
        $('#loginModal').modal('hide');
        $('#regModal').modal('show');
    });

    $('#logout').on('click', function(e) {
        e.preventDefault();
        $('#logoutModal').modal('show');
    });


    //login form
    $('#frmLogin').on('submit', function(e) {
        e.preventDefault();
        var FormData = $('#frmLogin').serialize();

        $.ajax({
            type: 'post',
            url: 'forms/login.php',
            data: FormData,
            dataType: 'json',
            encode: true,
            beforeSend: function() {
                $('#frmBtnLogin').text("Logging in");
            },
            success: function(data) {
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
    $('#frmRegister').on('submit', function(e) {
        e.preventDefault();
        var FormData = $('#frmRegister').serialize();
        var formPassword = $('#frmRegisterPassword');
        var formConfirmPassword = $('#frmRegisterConfirmPassword');

        if (formPassword.val().length < 6) {
            alert('Password must be longer than 6 characters');
            formPassword.val('');
            formConfirmPassword.val('');

            return;
        }

        if (formPassword.val() != formConfirmPassword.val()) {
            alert("Password doesn't match");
            formConfirmPassword.val('');

            return;
        }

        $.ajax({
            type: 'post',
            url: 'forms/register.php',
            data: FormData,
            dataType: 'json',
            encode: true,
            beforeSend: function() {
                $('#frmBtnRegister').text("Registering..");
            },
            success: function(data) {
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
});
</script>