// JavaScript Document

function ShowDiv(show_div,bg_div){
	document.getElementById(show_div).style.display='block';
	document.getElementById(bg_div).style.display='block' ;
	var bgdiv = document.getElementById(bg_div);
	bgdiv.style.width = document.body.scrollWidth;
	// bgdiv.style.height = $(document).height();
	$("#"+bg_div).height($(document).height());
	$.ajax({
                 type: "GET",
                 url: "/home/cart/destroy",
                 data: {gid:gid},
                 dataType: "json",
                 success: function(data){
                    //$("#cnt"+gid).val(cnt);
              	$("#gid").val(gid);

                }
             });
};

function CloseDiv(show_div,bg_div)
{
	document.getElementById(show_div).style.display='none';
	document.getElementById(bg_div).style.display='none';
};



function ShowDiv_1(show_div,bg_div){
	document.getElementById(show_div).style.display='block';
	document.getElementById(bg_div).style.display='block' ;
	var bgdiv = document.getElementById(bg_div);
	bgdiv.style.width = document.body.scrollWidth;
	// bgdiv.style.height = $(document).height();
	$("#"+bg_div).height($(document).height());
};

function ShowDiv_2(show_div,bg_div,gid,gname,cnt,gpic,gprice){
	var gid = document.getElementById(gid).value;
	var cnt = document.getElementById(cnt).value;
	// alert(gprice);

	var xhr = new XMLHttpRequest();
                xhr.open("get","/home/goods/addcar?gid="+gid+"&cnt="+cnt,true);
                xhr.send();
                xhr.onreadystatechange = function(){
                if (xhr.readyState == 4) {
                    if (xhr.status>=200 && xhr.status<300) {
                        document.getElementById(show_div).style.display='block';
		document.getElementById(bg_div).style.display='block' ;
		var bgdiv = document.getElementById(bg_div);
		bgdiv.style.width = document.body.scrollWidth;
		// bgdiv.style.height = $(document).height();
		$("#"+bg_div).height($(document).height());
                    };
                };
        }
	
};
//¹Ø±Õµ¯³ö²ã
function CloseDiv_1(show_div,bg_div)
{
	document.getElementById(show_div).style.display='none';
	document.getElementById(bg_div).style.display='none';
};