function getHTTPObject() {
  var xmlhttp;
  if (window.XMLHttpRequest) {
    // Chrome, Firefox, Safari
    xmlhttp = new XMLHttpRequest();
  } else {
    //Internet Explorer
    xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    if (!xmlhttp) {
      xmlhttp = new ActiveXObject('Msxml2.XMLHTTP');
    }
  }
  return xmlhttp;
}

//Create the HTTP Object
var http = getHTTPObject();
//Get reply from the server
function handleHttpResponse() {
  //If request finished and response is ready
  if (http.readyState == 4 && http.status == 200) {
    var results = http.responseText;
    //Modify the script to change the html element
    document.getElementById('search-result').innerHTML = results;
  }
}

var path = window.location.pathname;

if (path.includes('index')) {
  var root = './';
} else {
  var root = '../';
}
var url = `${root}processes/get-hint.php?searchParam=`;
function showHint() {
  var searchParam = document.getElementById('search').value;
  http.open('GET', url + searchParam, true);
  http.onreadystatechange = handleHttpResponse;
  http.send(null);
}

function removeHint() {
  document.getElementById('search-result').innerHTML = null;
  document.getElementById('search').value = null;
}
