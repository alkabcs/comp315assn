<!doctype html>

<html>
  <head>
    <title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <script type="text/javascript" src="js/scripts.js"></script>
  </head>

  <body>

      <div class="wrapper">
        <div class="box header">
          <?php
            //$username = $_COOKIE['username'];
            print ("<p>Welcome, </br>" . $username . ". ". date("D M d, Y G:i a") . "</p>");
          ?>

        </div>
        <div class="box sidebar">
          <div class="btn_group">
            <button onclick="httpRequest('admin_load', 'GET', 'php/client.php', 'true')">View your details</button>
            <button onclick="httpRequest('admin_load', 'GET', 'php/appointments.php', 'true')">Your Appointments</button>
            <button onclick="logout()">Logout</button>
          </div>
        </div>
        <div class="box content">
 			<div id="pcontent">				
			</div>
          <div id="boxdata" class="box list">
            <div id="client_load">
            </div>
          </div>
        </div>

      </div>

  </body>
</html>