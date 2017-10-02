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

// Standard ajaxRequest
function ajaxRequest(method, url, data, callback) {
  var request = new XMLHttpRequest();
  request.open(method, url);

  if (method == 'POST') {
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  }

  request.onreadystatechange = function() {
    if (request.readyState == 4 && request.status == 200) {
      var response = request.responseText;
      callback(response);
    } else {
      alert("ReadyState = " + request.readyState +
              ". Status = " + request.status);
    }
  }

  request.send(data);
}

function client() {
    var list = document.getElementById('admin_load');
    list.innerHTML = "";

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          list.innerHTML = this.responseText;
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
  document.getElementById('client_list').onclick = function(event) {
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

function client_update(cid) {
    var fname = document.getElementById('fname').value;
    var lname = document.getElementById('lname').value;
    var email = document.getElementById('email').value;
    var address = document.getElementById('address').value;
    var dob = document.getElementById('dob').value;
    var gender = document.getElementById('gender').value;
    var home = document.getElementById('home').value;
    var mobile = document.getElementById('mobile').value;
    var notes = document.getElementById('notes').value;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById('admin_load').innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "php/client_update.php?cid=" + cid + "&fname=" + fname + "&lname=" + lname + "&email=" + email + "&address=" + address + "&dob=" + dob + "&gender=" + gender + "&home=" + home + "&mobile=" + mobile + "&notes=" + notes, true);
    xhttp.send();
}

function client_new() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById('admin_load').innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "php/client_new.php?", true);
  xhttp.send();
}

function client_add() {
  var fname = document.getElementById('fname').value;
  var lname = document.getElementById('lname').value;
  var email = document.getElementById('email').value;
  var address = document.getElementById('address').value;
  var dob = document.getElementById('dob').value;
  var gender = document.getElementById('gender').value;
  var home = document.getElementById('home').value;
  var mobile = document.getElementById('mobile').value;

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById('admin_load').innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "php/client_add.php?&fname=" + fname + "&lname=" + lname + "&email=" + email + "&address=" + address + "&dob=" + dob + "&gender=" + gender + "&home=" + home + "&mobile=" + mobile, true);
  xhttp.send();
}

function discount() {
  var content = document.getElementById('admin_load');
  content.innerHTML = "";

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      content.innerHTML = this.responseText;
    }
  };

  xhttp.open("GET", "php/discounts.php", true);
  xhttp.send();
}

function discount_load() {
  document.getElementById('admin_load').onclick = function(event) {
    var target = event.target || event.srcElement;
    var name = target.innerHTML;
    var list = document.getElementById('admin_load');
    var id = document.getElementById(name).firstElementChild.innerHTML;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readState == 4 && this.status == 200) {
        list.innerHTML = this.responseText;
      }
    };

    xhttp.open("GET", "php/discount_load.php?disc_id=" + id, true);
    xhttp.send();
  }
}

function treatment() {
  var content = document.getElementById('admin_load');
  content.innerHTML = "";

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      content.innerHTML = this.responseText;
    }
  };

  xhttp.open("GET", "php/treatment.php", true);
  xhttp.send();
}

function treatment_load() {
  document.getElementById('admin_load').onclick = function(event) {
    var target = event.target || event.srcElement;
    var name = target.innerHTML;
    var list = document.getElementById('admin_load');
    var id = document.getElementById(name).firstElementChild.innerHTML;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        list.innerHTML = this.responseText;
      }
    };

    xhttp.open("GET", "php/treatment_load.php?treat_id=" + id, true);
    xhttp.send();
  }
}

function schedule() {
  var content = document.getElementById('admin_load');
  content.innerHTML = "";

  content.innerHTML = '<iframe src="https://calendar.google.com/calendar/embed?src=atm3klm20a5u2rdrk5dclr69kc%40group.calendar.google.com&ctz=Pacific/Auckland" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>';

  /*
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      content.innerHTML = this.responseText;
    }
  };

  xhttp.open("GET", "php/schedule.php", true);
  xhttp.send();
  */
}
























































//
