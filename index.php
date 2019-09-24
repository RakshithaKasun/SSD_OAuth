	<html>
<head>
<title>Social_Login</title>
<meta charset="UTF-8">
</head>
<body>

<div id="fb-root"></div>
<script async defer crossorigin
="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v4.0&appId=2370177856431074&autoLogAppEvents=1"></script>

<script>

  function statusChangeCallback(response) {  // Called with the results from FB.getLoginStatus().
    console.log('statusChangeCallback');
    console.log(response);                   // The current login status of the person.
    if (response.status === 'connected') {   // Logged into your webpage and Facebook.
      testAPI();  
    } else {                                 // Not logged into your webpage or we are unable to tell.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this webpage.';
    }
  }


  function checkLoginState() {               // Called when a person is finished with the Login Button.
    FB.getLoginStatus(function(response) {   // See the onlogin handler
      statusChangeCallback(response);
    });
  }


  window.fbAsyncInit = function() {
    FB.init({
      appId      : '2370177856431074',
      cookie     : true,                     // Enable cookies to allow the server to access the session.
      xfbml      : true,                     // Parse social plugins on this webpage.
      version    : '{api-version}'           // Use this Graph API version for this call.
    });


    FB.getLoginStatus(function(response) {   // Called after the JS SDK has been initialized.
      statusChangeCallback(response);        // Returns the login status.
    });
  };

  
  (function(d, s, id) {                      // Load the SDK asynchronously
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

 
  function testAPI() {                      // Testing Graph API after login.  See statusChangeCallback() for when this call is made.
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.id);
      document.getElementById('status').innerHTML ='<p> Welcome '+response.name+'! <a href=login.php?name='+response.name.replace
      (" ", "_")+'&ID='+response.id +'>Continue with Facebook Login</a></p>'
        // 'Thanks for logging in, ' + response.name + '!';
    });
  }

</script>

<!-- <div class="fb-login-button" data-width="" data-size="large" data-button-type="continue_with" 
data-auto-logout-link="false" data-use-continue-as="false" onlogin="checkLoginState();"></div> -->

<div class="fb-login-button" data-width="" data-size="large" data-button-type="continue_with" 
data-auto-logout-link="false" data-use-continue-as="true" scope="public_profile,email" onlogin="checkLoginState();"></div>




<div id="status">
</div>

</body>
</html>