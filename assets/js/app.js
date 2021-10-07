
document.addEventListener('DOMContentLoaded', () => {
  // listen_for_email_input_onchange();
});

/*****
 * success/error handler
 * params passed:
 *      ~status - error, success or warning
 *      ~context - status context to be shown to user!
 */
function status_display(status, context) {
    let alert_element = '';
    if (status.includes('error')) {
        alert_element = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>${context}</strong>
                        </div>`;
    }
    else if (status.includes("success")) {
        alert_element = `<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>${context}</strong>
                        </div>`;
    }

    return alert_element;
}


function delete_html_elements_recursively(html_element) {
  var child = html_element.lastElementChild;

  while (child) {
    html_element.removeChild(child);
    child = html_element.lastElementChild;
  }
}

function handle_email_exists_response(response) {
  const uname = document.getElementById("uname");
  const register_email_user_button = document.getElementById("register_email_user_button");
  const error_display_container = document.getElementById('error-display-container');
  if(uname.value.length > 0) {
    if (response.includes(`${uname.value.concat("@llkll.net")}`)) {
      register_email_user_button.disabled = true;
      error_display_container.innerHTML = status_display('error', "Email already exists. Kindly try creating a different email!");
    } else {
      register_email_user_button.disabled = false;
      delete_html_elements_recursively(error_display_container);
    }
  }
}

function ping_check_if_email_exists() {
  const method = "GET";
  const url = "includes/email_check_exist.php";

  send_to_server(method, url);
}

function send_to_server(Method, action, urlParams = "") {
  let xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText.includes("messages")) {
        handle_email_exists_response(this.responseText);
      }
      else {
        console.log(this.responseText);
      }
    }
  };
  xhttp.open(Method, action, true);
  if (Method == "POST") {
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  }
  xhttp.send(urlParams);
}
