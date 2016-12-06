
function facebook_login(){
  FB.login(function(response) {
     checkLoginState();
   }, {scope: 'public_profile,email,user_friends'});
}
// This is called with the results from from FB.getLoginStatus().
function statusChangeCallback(response) {
  // The response object is returned with a status field that lets the
  // app know the current login status of the person.
  // Full docs on the response object can be found in the documentation
  // for FB.getLoginStatus().
  if (response.status === 'connected') {
    // Logged into your app and Facebook.
    document.getElementById('btn_login').style.visibility = "hidden";
    showUser();
  } else if (response.status === 'not_authorized') {
    // The person is logged into Facebook, but not your app.
    console.log('Please log ' + 'into this app.');
    document.getElementById('btn_login').style.visibility = "visible";
  } else {
    // The person is not logged into Facebook, so we're not sure if
    // they are logged into this app or not.
    console.log('Please log ' + 'into Facebook.');
    document.getElementById('btn_login').style.visibility = "visible";
  }
}

// This function is called when someone finishes with the Login
// Button.  See the onlogin handler attached to it in the sample
// code below.
function checkLoginState() {
  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });
}

window.fbAsyncInit = function() {
  FB.init({
    appId      : '1682938868641175',
    cookie     : true,  // enable cookies to allow the server to access
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.8' // use graph api version 2.8
  });

  // Now that we've initialized the JavaScript SDK, we call
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

};

// Load the SDK asynchronously
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

function go_member_page(e){
  window.location='member.php?fid='+e.id;
}

// Here we run a very simple test of the Graph API after login is
// successful.  See statusChangeCallback() for when this call is made.
function showUser() {
  if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
  } else {
      // code for IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  // Set user information
  FB.api('/me','GET',{"fields":"id,name,email,picture"},
  function(response) {
    //console.log(String(response.id));
    var a = document.createElement("span");
    var node = document.createElement("img");
    node.setAttribute("src",response.picture.data.url);
    node.setAttribute("class","img_round");
    a.setAttribute("id",response.id);
    a.setAttribute("onclick","go_member_page(this)");
    a.appendChild(node);
    document.getElementById("div_profile").appendChild(a);

    $.post( 'functions/check_user.php', {
      'ID': response.id, 'NAME': String(response.name), 'EMAIL': String(response.email),
      'PIC': String(response.picture.data.url)})
      /*.success(function(e) { alert("second success "+e.responseText); })
      .error(function(e) { alert("error "+e.responseText); })
      .complete(function(e) { alert("complete "+e.responseText); })*/;
  });
  // Set friend list
  FB.api('/me','GET',{"fields":"friends"},
  function(response) {
    // console.log(response.friends.data.length);
    var variable = [];
    for (var i=0;i<parseInt(response.friends.data.length);i++) {
      variable.push(response.friends.data[i].id);
    }
    // console.log(variable);
    xmlhttp.open("GET","functions/get_user_picture.php?ID="+JSON.stringify(variable),true);
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var list = this.responseText.split(";");
        for (var s=0;s<list.length/2-1;s++){
          var a = document.createElement("a");
          var dot = document.createElement("div");
          a.setAttribute("id",variable[s]);
          a.setAttribute("onclick","go_member_page(this)");
          var node = document.createElement("img");
          node.setAttribute("src",list[s*2]);
          switch (list[s*2+1]) { // is offline
            case '0':
              node.setAttribute("class","img_round img_offline");
              dot.setAttribute("class","status_circle gray");
              break;
            case '1': // is online but not in work time
              node.setAttribute("class","img_round");
              dot.setAttribute("class","status_circle green");
              break;
            case '2': // is online but in work time
              node.setAttribute("class","img_round");
              dot.setAttribute("class","status_circle red");
              break;
            default: node.setAttribute("class","img_round img_offline");
          }
          a.appendChild(dot);
          a.appendChild(node);
          var div = document.createElement("span");
          div.appendChild(a);
          // document.getElementById("div_index_friend").insertBefore(node,document.getElementById("div_index_friend").childNodes[0]);
          // document.getElementById("div_index_friend").innerHTML+="--";
          document.getElementById("div_index_friend").appendChild(div);
        }
      }
    };
    xmlhttp.send();
  }
);
}
