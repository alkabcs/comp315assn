function login() {
  var username = document.forms["login_form"]["username_input"].value;
  var password = document.forms["login_form"]["password_input"].value;

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("login_div").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "php/login.php?username=" + username + "&password=" + password, true);
  xhttp.send();

}

function logout() {
  location.reload(true);
}

function client() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data = this.responseText;
            $("#admin_load").html(data);
            $("#txtsearch").html('<input type= "text" id= "myInput" class="txtBox" ' +
                'onkeyup = "client_search()" placeholder = "Client search..." > ');
            $("#pcontent").html("<p>Content</p>");
      }
    };
    xhttp.open("GET", "php/client.php", true);
    xhttp.send();
}

function client_search() {
  var input, filter, table, tr, td, i;
  input = document.getElementById('myInput');
  filter = input.value.toUpperCase();
  table = document.getElementById('client_list');
  tr = table.getElementsByTagName('tr');

  for (i=1; i < tr.length; i++) {
    td = tr[i].getElementsByTagName('td')[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

function client_load() {
  document.getElementById('admin_load').onclick = function(event) {
    var target = event.target || event.srcElement;
    var name = target.innerHTML;
    var list = document.getElementById('admin_load');
    var id = document.getElementById(name).innerHTML;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          list.innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "php/client_load.php?name=" + name + "&id=" + id, true);
    xhttp.send();
  }
}


function gotoreports() {

    $("#txtsearch").html('From Date: <input type="text" id="fromdatepicker">To Date: ' +
        '<input type="text" id="todatepicker" onchange="getreport()">');
    $("#fromdatepicker").datepicker();
    $("#todatepicker").datepicker();

    $("#admin_load").html('');
 
}

function getreport() {
   
    var fromdate = $("#fromdatepicker").val();
    var todate = $("#todatepicker").val();

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var data = this.responseText;
            var dataarray = data.split('&');
    
            $("#admin_load").html(dataarray[0]);
            $("#pcontent").html("<p>Sales Report for period " +
                fromdate + " and " + todate + " </p><p>Total Paid: " + dataarray[1] + "</p>");
        }
    };
    var uri = 'php/report.php?fromdate=' + fromdate + '&todate=' + todate;
    xhttp.open("GET", uri, true);
    xhttp.send();

}

