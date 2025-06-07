function Loading()
{
	runShow();
	//window.alert(msg);
}

var i = 0;
var timer;
var path = new Array();

// LIST OF SLIDES
path[0] = "assets/images/hostel1.jpg";
path[2] = "assets/images/bhostel2.jpg";
path[1] = "assets/images/ghostel.jpg";
path[4] = "assets/images/mess.jpg";
path[3] = "assets/images/rrgh.jpg";
path[5] = "assets/images/rrgh2.jpg";
path[6] = "assets/images/ground.jpg";

function swapImage()
{
	
	$('#slide').slideUp(500, function() {
       	$('#slide').attr("src",path[i]);
    	$('#slide').slideDown("slow");
    });
    /*
    $('#slide').toggle( "explode" ,{pieces: 16 }, 500);
   	$('#slide').attr("src",path[i]);
   	$('#slide').toggle( "explode",{pieces: 16 }, 500 );
  	*/
 

	if(i < path.length - 1) i++; else i = 0;
	timer = setTimeout("swapImage()",7000);
}

function stopShow()
{
	clearTimeout(timer);
}

function runShow()
{
	timer = setTimeout("swapImage()",1000);	  
}
