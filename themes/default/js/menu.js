//////////////////////////////////////////////////////////////
// menu.js - A simple JS drop Down menu
// Inspired by Ronak and Pulkit
// ----------------------------------------------------------
// Please Read the Terms of use at http://www.anelectron.com
// ----------------------------------------------------------
// (c)Electron Inc.
//////////////////////////////////////////////////////////////

//Shows the menu
function dropmenu(ele, divid){
	//To prevent errors
	try{ $(divid).style;}catch(e){ return false;};	
	//If it is visible means he is on the drop down list
	if($(divid).style.visibility=="visible"){
		clearTimeout(hider);
		return;
	}
	//Get the position
	var pos = findelpos(ele);
	//Get the callers left and top
	x = pos[0]-5;
	y = pos[1]+ele.offsetHeight;//Add the height
		
	//If extremely right adjust
	if((screen.width - 40) < (x + $(divid).offsetWidth)){
		extra = $(divid).offsetWidth - ele.offsetWidth;
		x = x - extra;
	}
	
	//Set the drop down div to that point
	$(divid).style.left=x+"px";
	$(divid).style.top=y+"px";
	
	//Make the div visble
	$(divid).style.visibility="visible";
	smoothopaque(divid, 0, 100, 5);
};

//Hides the menu
function pullmenu(hidedivid){
	hider = setTimeout("puller('"+hidedivid+"')", 100);
};

function puller(pid){
	try{ $(pid).style;}catch(e){ return false;};
	$(pid).style.visibility="hidden";
};