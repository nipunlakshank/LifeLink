const ROOT = "http://localhost/lifelink/";

async function postData(endPoint, body) {
  return await fetch(getUrl(endPoint), {
    method: "post",
    headers: {
      "Content-Type": "application/json",
      Accept: "application/json",
    },
    body: JSON.stringify(body),
  })
    .then((res) => res.json())
    .catch((e) => console.error(e));
}

function getUrl(endPoint) {
  return `${ROOT}${endPoint}`;
}

// __________________________kosala_______________________________________

function open_search() {
  var mob_search = document.getElementById("mob_search");

  mob_search.classList.toggle("d-none");
}

function open_edit1() {
  var update_icon = document.getElementById("update_icon1");
  var edit_icn = document.getElementById("edit_icn1");
  var inputElement = document.getElementById("mobile");

  update_icon.classList.remove("d-none");
  edit_icn.classList.add("d-none");
  inputElement.removeAttribute("readonly");
  inputElement.focus();
}
function name_edit1() {
  var name_edit = document.getElementById("name_edit");
  name_edit.classList.toggle("d-none");
}
function open_log_out() {
  var log_out_div = document.getElementById("log_out_div");
  log_out_div.classList.toggle("d-none");
}
function open_chat() {
  var chat_div = document.getElementById("chat_div");
  chat_div.classList.toggle("d-none");
}

function see_more_post() {
  document.getElementById("see_all_post").classList.toggle("disc3");
  document.getElementById("see_all_post1").classList.toggle("d-none");
}

function name_edit2() {
  var bio_edit = document.getElementById("bio_edit");
  bio_edit.classList.toggle("d-none");
}
