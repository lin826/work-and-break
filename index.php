<?php
  include("functions/function.php");
?>

<!DOCTYPE html>
<html>
<head>
  <!--Button from https://proto.io/freebies/onoff/-->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="styles/layout.css" type="text/css">
  <title>Pomodoro Online Social Society</title>
  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
</head>

<body style="background-color:#F5F5F5">
  <script type="text/javascript" src="includes/facebooklogin.js"></script>

  <div id="div_index">
    <div>
    	<p class="txt_index_title" style="font-family: 'Times New Roman', Times, serif;">Pomodoro Online Social Society
      </p>
    </div>
  <div id="div_profile">
  </div>

    <!-- Timer and Title Div -->
 	<div id="div_index_timer" class="index">
		<!--Don't Disturb Status-->

		<!--Anonymous Task Name-->

  		<!-- Show New_task_button or Working_task_title -->
  		<p id="txt_index_working_task" class="txt_timer_title"></p>
  		<p id="txt_index_timer_number" class="txt_index_timer" style="font-family: 'Times New Roman', Times, serif;"></p>
  		<button type="button" class="btn_orange" onclick="addNewTask()">New Task</button>
  		<button type="button" class="btn_green" onclick="timerStart()">Start</button>
  		<button id="btn_index_timer_stop" type="button" onclick="timerStop()">Stop </button>
  	</div>
  </div>
  <button id="btn_login" onclick="facebook_login()">
      <img src='images/"f"logo_online/png/FB-f-Logo__white_29.png'>
      Login with Facebook
  </button>
  <!-- Friends Div-->
  <div id="div_index_friend" class="index cscrollmenu">
  </div>


  <!-- Todo List Div -->
  <div id="div_todo_pool">
  	<div class="div_todo">
	  	<text onclick="finishTask(this)"> Ｏ </text>
  		<text class="txt_task_pool" onclick="editTask(this)"> 完成網站 </text>
  		<!--Tomato picture: http://www.iconsdb.com/soylent-red-icons/tomato-icon.html-->
  		<span class="lst_tomato">
  			<img src="images/tomato-128-red.png" style="height: 20px;"> </img>
  			<img src="images/tomato-128-red.png" style="height: 20px;"> </img>
  			<img src="images/tomato-128-red.png" style="height: 20px;"> </img>
  			<img src="images/tomato-128-green.png" style="height: 20px;"> </img>
  		</span>
  	</div>
  	<div class="div_todo">
	  	<text> Ｏ </text>
  		<text class="txt_task_pool" onclick="editTask(this)"> 完成網站 </text>
  		<!--Tomato picture: http://www.iconsdb.com/soylent-red-icons/tomato-icon.html-->
  		<span class="lst_tomato">
  			<img src="images/tomato-128-green.png" style="height: 20px;"> </img>
  			<img src="images/tomato-128-green.png" style="height: 20px;"> </img>
  			<img src="images/tomato-128-green.png" style="height: 20px;"> </img>
  		</span>
  	</div>
  </div>

  <!-- Pop up Div -->
  <div id="pop_background" onclick="Cancel()">
  </div>
  <div id="popup_showInfo">
    <input id="popup_title" type="text" placeholder="Type New Target Name Here">
  	<!--HR size="2" -->
  	<p id="popup_prompt" style="color: red"> </p>
  	<div>
  		<textarea id="popup_feeling" placeholder="What's on your mind?" ></textarea>
  	</div>
  	<div>
		<p class="txt_number">
			<text>Pomodoro Clock (25min): </text>
			<button type="button" class="btn_number" onclick="minusTargetCost()">−</button>
			<b id="estimatedCost"> 2 </b>
			<button type="button" class="btn_number" onclick="addTargetCost()">+</button>
		</p>

		<button type="button" class="btn_orange" onclick="addTarget()">Add New Task</button>
  	</div>
  </div>

    <script type="text/javascript" src="includes/script.js"></script>

    <div>Icons made by
      <a style="color:#393939;" href="http://www.flaticon.com/authors/madebyoliver" title="Madebyoliver">
        Madebyoliver
      </a>
      from
      <a style="color:#393939;" href="http://www.flaticon.com" title="Flaticon">
        www.flaticon.com
      </a>
      is licensed by
      <a style="color:#393939;" href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">
        CC 3.0 BY
      </a>
    </div>
</body>
</html>
