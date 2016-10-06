function login(showhide){
    if(showhide == "show"){
        document.getElementById('popupbox').style.visibility="visible";
        disableLinksByElement(main);
    }else if(showhide == "hide"){
        document.getElementById('popupbox').style.visibility="hidden";     
    }
  }
function disableLinksByElement(el) {
  if (document.getElementById && document.getElementsByTagName) {
    if (typeof(el) == 'string') {
      el = document.getElementById(el);
    }
    var anchors = el.getElementsByTagName('a');
    for (var i=0, end=anchors.length; i<end; i++) {
      anchors[i].onclick = function() {
        return false;
      };
    }
  }
}
function enableLinksByElement(el) {
  if (document.getElementById && document.getElementsByTagName) {
    if (typeof(el) == 'string') {
      el = document.getElementById(el);
    }
    var anchors = el.getElementsByTagName('a');
    for (var i=0, end=anchors.length; i<end; i++) {
      anchors[i].onclick = function() {
        return true;
      };
    }
  }
}
