<div class="footer">
	<div class="row p-3 m-0">
		<div class="col-lg-4 col-12">
			<h3 class ="head">GIVE US A FEEDBACK</h3>
			<p>If you have any questions, read the FAQ page and if that doesn't enlighten you, here is our contact details:</p>
			<p><i class="icofont-phone icofont-lg"></i> 0927-123-4567 / (02)454-8901</p>
			<p><i class="icofont-building-alt icofont-lg"></i> Caswynn Building, No. 134 Timog Avenue, Sacred Heart, Quezon City, 1103 Metro Manila</p>
		</div>
		<div class="col-lg-4 col-12" id="mid">
				<img src="assets/images/logo-top-2.png">
		</div>
		<div class="col-lg-4 col-12" id="end">
			<h3 class="head">OUR LEADING PARTNERS</h3>
			<img class="logos" src="assets/images/Easton_logo.png">
			<img class="logos" src="assets/images/beman-logo.png">
			<img class="logos" src="assets/images/delta.png">
		</div>
	</div>
	<div class="navs py-2">
		<p id="nav1">
      <a href="index.php" title="Home">HOME</a>
      <?php if (isset($_SESSION['logged_in_user']) OR isset($_SESSION['admin'])) { ?>
        <a href="#" title="Shop">SHOP</a>
      <?php } else {
        echo " ";
      } ?> 
      <a href="about.php" title="About">ABOUT</a>
      <a href="contact.php" title="Contact">CONTACT</a>
    </p>
		<p>- &copy; BOWFLEXER 2018 - ALL RIGHTS RESERVED - 
      <a href="/" title="Disclaimer" data-toggle="modal" data-target="#disclaimer">DISCLAIMER</a>
    </p>
	</div>
</div>
<div class="modal fade" id="disclaimer" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="disclaimer1">
      <div class="modal-header"><h4>Welcome to BOWFLEXER</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></div>
      <div class="modal-body">
        <h5 class="big" style="color: #E92E2E;">"THIS SITE IS STRICTLY MADE FOR TRAINING PURPOSES. THIS ONLY SHOWS MY SKILLS AND IS NOT USED AS AN OFFICIAL SITE. ALL ELEMENTS THAT ARE GRABBED AND USED FROM OTHER SITES IS SUBJECT FOR REMOVAL IF THE OWNER WISHES TO DO SO."</h5>
      <p style="text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If you continue to browse and use this website, you are agreeing to comply with and be bound by the following terms and conditions of use. If you disagree with any part of these terms and conditions, please do not use our website.<br><br>

      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The content of the pages of this website is for training only. It is subject to change without notice. This website uses cookies to monitor browsing preferences. If you do allow cookies to be used, the following personal information may be stored by us for testing purposes only: <br>
      <ul>
        <li>Name</li>
        <li>Email-Address</li>
        <li>Password(Encrypted)</li>
        <li>Contact Number</li>
        <li>Address</li>
      </ul>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;We do not provide any warranty or guarantee as to the accuracy, timeliness, performance, completeness or suitability of the information and materials found or offered on this website for any particular purpose. You acknowledge that such information and materials may contain inaccuracies or errors and we expressly exclude liability for any such inaccuracies or errors to the fullest extent. <br><br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Your use of any information or materials on this website is entirely at your own risk, for which we shall not be liable. It shall be your own responsibility to ensure that any products, services or information available through this website meet your specific requirements.<br><br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This website contains material which we have obtained from different sites such as codepen.io, google, fontawesome, especially eastonarchery.com, and etc. This material includes, but is not limited to, the design, layout, look, appearance and graphics. Reproduction is prohibited other than in accordance with the copyright notice, which forms part of these terms and conditions. Many of the contents in this website may be removed unannounced if the rightul owners wish to remove the content from our site.<br><br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;All trade marks reproduced in this website which are not the property of, or licensed to, the operator are acknowledged on the website.<br><br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Unauthorised use of this website may give rise to a claim for damages and/or be a criminal offense.</p>
      </div>
    </div>
  </div>
</div>
