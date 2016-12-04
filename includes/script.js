// function addTarget(){
// 	if(popup_title.value==''){
// 		popup_title.style.border = "2px solid red";
// 	} else {
// 		var item = document.createElement("div");
//   		item.setAttribute("class","div_todo");
//   		item.setAttribute("class","div_todo");
//   		item.setAttribute("onclick","showPhoto(this)");
//   		item.setAttribute("alt",result[i].id);
//  		document.getElementById("result_pool").insertBefore(item, document.getElementById("result_pool").firstChild);
//
// 		// Clear up the popup
// 		popup_title.value = '';
// 		popup_title.style.border = "";
// 		estimatedCost.innerHTML = " 2 ";
// 		Cancel();
// 	}
// }
//
// function searchTag(e){
// 	Cancel();
// 	document.getElementById("tags").value = e.innerHTML;
// 	getResult();
// }
function editTask(e){
  showPopup();
}
function addNewTask(){
  showPopup();
}
function showPopup(){
  timerPause();
  pop_background.style.visibility = "visible";
  popup_showInfo.style.visibility = "visible";
}
function minusTargetCost(){
  if(parseInt(estimatedCost.innerHTML,10)>0)
    estimatedCost.innerHTML = estimatedCost.innerHTML-1;
}
function addTargetCost(){
  estimatedCost.innerHTML = parseInt(estimatedCost.innerHTML,10)+1;
}
function Cancel(){
  popup_showInfo.style.visibility = "hidden";
  pop_background.style.visibility = "hidden";
  popup_title.style.border = "";
  if(isCounting) timer = setInterval(timerCountDown, 1000);
}

/** Timer control **/
var timeLeft = 0;
var timer = setInterval(timerCountDown, 1000);
var isCounting = false;
var isWork = true;
timerStop();

function timerPause(){
  clearInterval(timer);
  btn_index_timer_stop.innerHTML="Stop ";
}
function timerStop(){
  clearInterval(timer);
  isCounting = false;
  if(btn_index_timer_stop.innerHTML=="Pause")
	btn_index_timer_stop.innerHTML="Stop ";
  else {
  	timeLeft = 25*60;
  	txt_index_timer_number.innerHTML= "25 : 00"
  	//timeLeft = 1*60;
  	//txt_index_timer_number.innerHTML= "01 : 00"
  }
}
function timerStart(){
  if(isCounting==false){
    isCounting = true;
  	timer = setInterval(timerCountDown, 1000);
  }
}
function timerCountDown(){
  btn_index_timer_stop.innerHTML="Pause";
  if(timeLeft>0){
  	timeLeft -= 1
  	if(timeLeft<600) txt_index_timer_number.innerHTML= "0" + Math.floor(timeLeft/60)
  	else txt_index_timer_number.innerHTML= Math.floor(timeLeft/60)
  	if(timeLeft%60<10) txt_index_timer_number.innerHTML+= " : 0" + timeLeft%60
  	else txt_index_timer_number.innerHTML+= " : " + timeLeft%60
  } else if(isWork) {
  	timeLeft = 4*60;
  	alert("Time to have a 4 minutes break!");
  	isWork = false;
  } else {
  	timeLeft = 25*60;
  	alert("Time to have a work again!");
  	isWork = true;
  	timerStop();
  	alert("Click confirm to start another Tomodoro:");
  	timerStart()
  }
}
