<?php

  function loadHome($username) {

    print ("<div id=\"welcome_div\">");
      print ("<p>Welcome " . $username . "</br>" . date("D M d, Y G:i a") . "</p>");
      print("<button id=\"\" onclick=\"logout()\">Logout</button>");
    print ("</div>");
  }

?>
