// JavaScript Document
function sendToSpotify(){
	location.href = "S_Curators.php";
}
function sendToTidal(){
	location.href = "T_Curators.php";
}
function sendToAppleMusic(){
	location.href = "AM_Curators.php";
}
function sendtoSoundCloud(){
	location.href = "SC_Curators.php";
}

function enterSite(){
	location.href = "homepage.php";
}
function sendToPlatform(id){
	location.href = "Curators.php?id="+id;
}
function goToPlaylistList(id, platform, name){
	window.location = "PlaylistList.php?id="+id+"&name="+name+"&platform="+platform;
	}
function goToPlaylistGrid(id, grouping, name, platform){
	window.location = "PlaylistGrid.php?id="+id+"&name="+name+"&platform="+platform+"&grouping="+grouping;
}
function goBackToPlaylistList(name, platform){
	window.location = "PlaylistList.php?name="+name+"&platform="+platform;
}
function goToSubmitInstructions(id){
	window.location = "Submit_HowTo.php?id="+id;
}

