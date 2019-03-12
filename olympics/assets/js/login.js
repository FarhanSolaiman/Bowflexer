$('.form').find('input').on('keyup blur focus', function (e) {
  
  var $this = $(this),
      label = $this.prev('label');

	  if (e.type === 'keyup') {
			if ($this.val() === '') {
          label.removeClass('active highlight');
        } else {
          label.addClass('active highlight');
        }
    } else if (e.type === 'blur') {
    	if( $this.val() === '' ) {
    		label.removeClass('active highlight'); 
			} else {
		    label.removeClass('highlight');   
			}   
    } else if (e.type === 'focus') {
      
      if( $this.val() === '' ) {
    		label.removeClass('highlight'); 
			} 
      else if( $this.val() !== '' ) {
		    label.addClass('highlight');
			}
    }

});

$('.tab a').on('click', function (e) {
  
  e.preventDefault();
  
  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');
  
  target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();
  
  $(target).fadeIn(600);
  
});

// image view
let loadFile = function(event) {
let reader = new FileReader();
reader.onload = function(){
let output = document.getElementById('output');
output.src = reader.result;
};
reader.readAsDataURL(event.target.files[0]);
};

//error checking

$('#reBtn').click( () => {
      const username1 = $('#username1').val();
      let error_flag = false;

      // checks if username field is empty
      if(username1.length == 0){
        $('#error').css('color','red');
        $('#error').html('This field is required.');
        error_flag=true;
      } 
      
      $.ajax({
        url: 'controllers/checker.php',
        method: 'POST',
        data: {
            action: 'registry', 
            username: username1
        },
        async: false
        }).done( data => {
        if (data == 'good') {
            $('#error').css('color','red');
            $('#error').html('Username already exists.');
            error_flag=true;
        }
    });
      const password1 = $('#password1').val();
      const confirmpassword = $('#confirmpassword').val();

      // checks if password field is empty
      if(password1.length == 0){
        $('#confirm1').css('color','red');
        $('#confirm1').html('This field is required.');
        error_flag=true;
      } else {
        // checks if the password did not match
        $('#confirm1').html(' ');
        if (password1 !== confirmpassword) {
          $('#confirm2').css('color','red');
          $('#confirm2').html('Password did not match.');
          error_flag=true;
        } else {
          $('#confirm2').html('');
        }
      }

      if (error_flag == false) {
        $('#successfully').css('color','#56FC6A');
        $('#successfully').html('You have signed up successfully. Please login with your details.');
        setTimeout( () => {
            $('#registerform').submit();
        },3000);
      }
    });

// login checker

$('#logbutton').click( () => {
  const loguser = $('#loginuser').val();
  const logpass = $('#loginpass').val();
  let check_flag = false;

  $.ajax({
    url: 'controllers/checker.php',
    method: 'POST',
    data: {
      action: 'login', 
      username: loguser,
      password: logpass
    },
    async: false
  }).done( data => {
    if (data == 'good') {
      check_flag = false;
    } else if (data == 'none') {
      $('#logcheck').css('color','red');
      $('#logcheck').html('A field is required.');
      check_flag = true;

    } else {
      $('#logcheck').css('color','red');
      $('#logcheck').html('You have input an invalid username or password. Please try again.');
      check_flag = true;
    }
  });
  if (check_flag == false) {
    $('#logcheck').css('color','green');
      $('#logcheck').html('You have logged-in successfully.');
      setTimeout(function(){
          $('#loginform').submit();
          }, 1500);
    }
});

//username check
$('#usercheck').click( () => {
  const username = $('#username1').val();
  $.ajax({
    url: 'controllers/checker.php',
    method: 'POST',
    data: {
      action: 'registry', 
      username: username
    },
    async: false
  }).done( data => {
    if (data == 'none') {
      $('#error').css('color','red');
      $('#error').html('This field is required.');
    } else if (data == 'good') {
      $('#error').css('color','red');
      $('#error').html('Username already exists.');
    } else {
      $('#error').css('color','green');
      $('#error').html('Username is available.');
    }
  });

});
