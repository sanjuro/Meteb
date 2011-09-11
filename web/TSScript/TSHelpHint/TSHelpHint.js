
function showTSHelpHint(target, color, backgroundcolor, bordercolor, duration){
 	var $D = YAHOO.util.Dom;
  if(target.hh){
  
  	$D.setStyle(target.hh_id, 'border-color', bordercolor);							
  	$D.setStyle(target.hh_id, 'background-color', backgroundcolor);
  	$D.setStyle(target.hh_id, 'color', color); 
  	target.hh.cfg.config.effect.value.duration = duration;
  }
}

function createTSHelpHints(){
	var $D = YAHOO.util.Dom;
	elements = $D.getElementsByClassName('TSHelpHint');
	YAHOO.widget.Tooltip.CSS_TOOLTIP = "TSHelpHint_container";
	for(var i=0; i < elements.length; i++){
		elements[i].hh_id = 'TSHelpHint'+i;
		elements[i].hh = new YAHOO.widget.Tooltip(elements[i].hh_id, 
  							{effect:{effect:YAHOO.widget.ContainerEffect.FADE,duration:0.2}, 
  							 context:elements[i], showdelay: 50,autodismissdelay: 40000,
  							 hidedelay: 500});
	}
	
}

YAHOO.util.Event.addListener(window, "load", createTSHelpHints);