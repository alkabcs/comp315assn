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


























































//
