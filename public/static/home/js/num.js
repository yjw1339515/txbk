// JavaScript Document


function addUpdate(jia){		
	var c = jia.parent().find(".n_ipt").val();
	c=parseInt(c)+1;	
	jia.parent().find(".n_ipt").val(c);
}

function jianUpdate(jian){    
	var c = jian.parent().find(".n_ipt").val();
	if(c==1){    
		c=1;    
	}else{    
		c=parseInt(c)-1;    
		jian.parent().find(".n_ipt").val(c);
	}
}    




function addUpdate1(jia,gprice,gid){		
	var c = jia.parent().find(".car_ipt").val();
	c=parseInt(c)+1;
	jia.parent().find(".car_ipt").val(c);
	document.getElementById("xiaoji"+gid).innerHTML = gprice*c;
}

function jianUpdate1(jian,gprice,gid){    
	var c = jian.parent().find(".car_ipt").val();
	if(c==1){    
		c=1;    
	}else{    
		c=parseInt(c)-1;    
		jian.parent().find(".car_ipt").val(c);
	}
	document.getElementById("xiaoji"+gid).innerHTML = gprice*c;
}    
