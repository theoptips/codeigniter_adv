<?php
// var_dump($this->session->userdata->login_status);
// var_dump($this->session->userdata["user_session"]["login_status"]);
  if (isset($this->session->userdata["user_session"])) {
    $status = $this->session->userdata["user_session"]["login_status"] ;
  }
;?>
<div class="navbar navbar-inverse">
  <div class="navbar-inner">
    <h1>Welcome</h1>
    <a class="brand" href="/index.php/main">User App</a>
    <ul class="nav">
      <li class="active"><a href="/index.php/main">Home</a></li>
    </ul>
    <ul class="nav" style="float:right">
      <li>
      <?php
        if (empty($status)) 
        {
           echo "<h1>SignIn</h1>";
           echo '<a href="/index.php/handler/signin" id="nav_signin">Sign In</a>';
        }
        else
        {
          echo "<h1>SignOut</h1>";
          echo '<a href="/index.php/handler/signout" id="nav_signout">Sign Out</a>';
        }
      ?>
    </ul>
  </div>
</div>