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
            print ("<p>Welcome " . $username . "</br>" . date("D M d, Y G:i a") . "</p>");
          ?>

        </div>
        <div class="box sidebar">
          <div class="btn_group">
            <button onclick="client()">Client</button>
            <button onclick="logout()">Logout</button>
          </div>
        </div>
        <div class=" box content">
          <p>Content</p>
          <div class="box list">
            <input type="text" id="myInput" onkeyup="client_search()" placeholder="Client search...">
            <div id="client_list">
            </div>
          </div>
        </div>

      </div>

  </body>
</html>
