<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" id="back2">
    <div class="modal-content" id="back1">
      <div class="form">
        <ul class="tab-group">
          <li class="tab active"><a class="link1 big" href="#signup">Sign Up</a></li>
          <li class="tab"><a class="link1 big" href="#login1">Log In</a></li>
        </ul>

        <div class="tab-content">
          <div id="signup">
            <h1 class="big">Sign Up for Free!</h1>

            <form enctype="multipart/form-data" action="controllers/add_user.php" method="post" id="registerform">

              <span id="error" style="font-weight: bold;"></span>
              <div class="field-wrap">
                <label>
                  Username<span class="req">*</span>
                </label>
                <input type="text" name="name1" id="username1" required autocomplete="off" style="display: inline-block; width: 89.8%"><button type="button" id="usercheck" style="display: inline-block;"><i class="icofont-eye-alt"></i></button>
                <br>
              </div>

              <span id="confirm1" style="font-weight: bold;"></span>
              <div class="field-wrap">
                <label>
                  Set A Password<span class="req">*</span>
                </label>
                <input type="password" name="password1" id="password1" required autocomplete="off">
              </div>

              <span id="confirm2" style="font-weight: bold;"></span>
              <div class="field-wrap">
                <label>
                  Confirm Password<span class="req">*</span>
                </label>
                <input type="password" id="confirmpassword" required autocomplete="off">
              </div>
              <div class="field-wrap">
                <h3 id="texthead">
                  Upload picture: (optional)
                </h3>
                <input type="file" accept="image/*" name="image" onchange="loadFile(event)"><br>
                <div id="images">
                    <img src="assets/images/null.png" id="output">
                </div>
              </div>

            <span id='successfully'></span> <br>
              <button type="button" class="button button-block big" id="reBtn">Get Started</button>

            </form>

          </div>

          <div id="login1">
            <h1 class="big">Welcome Back!</h1>

            <form id="loginform" action="controllers/authenticate.php" method="post">
              <span id="logcheck" style="font-weight: bold;"></span>
              <div class="field-wrap">
                <label>
                  Username<span class="req">*</span><br>
                </label>
                <input class="login2" id="loginuser" name="name2" type="text" required autocomplete="off">
              </div>

              <div class="field-wrap">
                <label>
                  Password<span class="req">*</span>
                </label>
                <input class="login2" id="loginpass" name="password2" type="password" required autocomplete="off">
              </div>
              <button class="button button-block big" id="logbutton" type="button">Log In</button>

            </form>

          </div>

        </div>
      </div>
    </div>
  </div>

</div>