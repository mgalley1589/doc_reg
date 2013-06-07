
<style type="text/css">

  body {
  padding: 0;
  text-align: center; 
  border: none;
  background: #eee url("https://launchpad-asset1.37signals.com/images/login_sprites.png?1359474715") repeat-x left -938px !important;
  }

  div.error {
  display:block !important;
  }
 
 .user-login {
		width: 310px;
		margin: 170px auto 0 auto;
		background: #fff;
		padding: 10px 39px 19px;
		-webkit-border-radius: 8px;
		-moz-border-radius: 8px;
		border-radius: 8px;
		-moz-box-shadow: 0 0 6px #999;
		-webkit-box-shadow: 0 0 6px #999;
		box-shadow: 0 0 6px #999;
		-ms-filter: "progid:DXImageTransform.Microsoft.Shadow(Strength=3, Direction=135, Color='#999999')";
		filter: progid:DXImageTransform.Microsoft.Shadow(Strength=3, Direction=135, Color='#999999');
  }
  
  
  .user-login img {
    padding:10px 10px 30px 10px;
  }
  
  .user-login form .description {
    display:none;
  }
  
  .user-login form label {
    display:block;
    font-family:Helvetica;
    font-size:14px;
    color:s#c9c9c9;
    font-weight:normal;
  
  }
  
  .form-item {
    padding:5px;
  }
  .user-login form input {
    width:200px;
    border:1px solid silver;
    font-family:Helvetica;
    font-weight:normal;
    color:#444;
    font-size:14px;
    padding:5px 8px;
  }
  
  .user-login form input[type=submit] {
    width:80px;
    background-color:whitesmoke;
    border:1px solid silver;
    border-radius:6px;
    -webkit-border-radius: 6px;
    -moz-border-radius: 6px;
    -khtml-border-radius: 6px;
	font-weight:normal;
  }

</style>


<?php
global $user;
if (!$user->uid) {
?>
<div class="user-login">
<img src="http://www.ghalivigunn.com/images/site_bits/logo.jpg" height="" width="" /> 
  
  <?php
print drupal_get_form('user_login');
?>
</div>
<?php
} else {
?>
You are already logged in.  GO AWAY!
<?php
}
?>