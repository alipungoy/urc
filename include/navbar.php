<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <a class="navbar-brand font-weight-bold text-secondary">
        <img src="../assets/images/logo.png" width="30" height="30" class="d-inline-block align-top"
            alt="">
        UNIVERSITY RESEARCH CENTER
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../about.php">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../event.php">Events</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../research.php">Researches</a>
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
        <ul class="nav navbar-nav">
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
        } elseif($_SESSION['user_type'] == 'Admin' || $_SESSION['user_type'] == 'Reviewer'){
        ?>

            <li class="nav-item">
            <a class="nav-link disabled">Welcome!<?php echo $_SESSION['user_type']?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../profile.php">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../logout.php">Logout</a>
            </li>
            <?php

        } else{
        ?>
 <li class="nav-item">
            <a class="nav-link disabled">Welcome! <?php echo $_SESSION['user_type']?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../user-home.php">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../logout.php">Logout</a>
            </li>
            <?php
            }
            ?>
        </ul>
    </div>
</nav>

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
            <input type="text" class="form-control" name="suffix" placeholder="Suffix" value="">
        </div>
        <div class="form-group">
           <select class="form-control" name="classification" id="classification">
            <option selected="selected" disabled>Choose User Classification</option>
               <option value="faculty">Faculty</option>
               <option value="staff">Staff</option>
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
    });

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
                       bootbox.alert(data.result)
                        $('#frmRegister').trigger("reset");
                    }

                    $('#frmBtnRegister').text("Register");
                }
            });
        });
</script>