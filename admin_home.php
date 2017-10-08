<!doctype html>

<html>
  <head>
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <script type="text/javascript" src="js/scripts.js"></script>
  </head>

  <body>

      <div class="wrapper">
        <div class="box header">
          <?php
            $username = $_COOKIE['username'];
            print ("<p>Welcome Jo</br>" . date("D M d, Y G:i a") . "</p>");
          ?>

        </div>
        <div class="box sidebar">
          <div class="btn_group">
            <button onclick="httpRequest('admin_load', 'GET', 'php/client.php', 'true')">Client</button>
            <button onclick="httpRequest('admin_load', 'GET', 'php/appointments.php', 'true')">Appointments</button>
            <button onclick="schedule()">Schedule</button>
            <button onclick="httpRequest('admin_load', 'GET', 'php/treatment.php', 'true')">Treatments</button>
            <button onclick="httpRequest('admin_load', 'GET', 'php/discounts.php', 'true')">Discounts</button>
            <button onclick="gotoreports()">View Reports</button>
            <button onclick="logout()">Logout</button>
          </div>
        </div>
        <div class=" box content">
 			<div id="pcontent">				
			</div>
          <div id="boxdata" class="box list">
            <div id="admin_load">
            </div>
          </div>
        </div>

      </div>

  </body>
</html>
