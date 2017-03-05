var quotes = "";
$(document).ready(function(){
	 $.ajax({
	        type:"get",
	        url:"quotes/quotes.php",
	        success: function(msg){
	        	quotes = msg;
	        	// alert(quotes);	
	        }
	    });
	console.log("MadSquare Brand Street Pvt.Ltd");
	console.log("All the images and other files that you are wanting from our site aren't free, you will have to pay for those images and files with prior punishment soon.");
    $("#submit").click(function(){
    	$("#ValErr").hide();
		$("#CaptchaErr").hide();
    	var mail = document.getElementById('mail').value;
    	var name = document.getElementById('name').value;
    	var msg = document.getElementById('msg').value;
    	var response = grecaptcha.getResponse();
    	// Contact form validation
 		if(mail.match(/(.*)\@(.*)\.([a-zA-Z]{2,3}|[\w]+.*)$/) == null || name.length < 1 || msg.length < 1 ) {
 			$("#ValErr").show();
    		return false;
 		}
 		if (response.length < 1) {
    		$("#CaptchaErr").show();
    		return false;
    	}
 		// Contact Us form Post to mailer
		$.ajax({
	        type:"POST",
	        url:"mail/sendMail.php",
	        data:"name="+name+"&mail="+mail+"&msg="+msg,
	        success: function(msg){
	        	console.log(msg);
	        }
	    });

 	});
});