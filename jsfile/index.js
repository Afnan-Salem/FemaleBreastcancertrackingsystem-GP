$(function(){
    //original field values
	
    //first_step
    $('form').submit(function(){ return false; });
    $('#submit_first').click(function(){
        //remove classes
        
        var error = 0;        
        
        if(!error) {   
		 if($('input[name=age]:checked').length<=0)
		{
 			alert("يجب الاختيار")
		}
		//slide steps
                if($("#radio1").is(":checked")){
					$('#first_step').slideUp();
                	$('#fourth_step').slideDown();  
					}
				else if($("#radio2").is(":checked")){
					$('#first_step').slideUp();
                	$('#second_step').slideDown();  
					}
					else if($("#radio3").is(":checked")){
					$('#first_step').slideUp();
                	$('#sixth_step').slideDown(); 
                
        } }else return false;
    });


    $('#submit_second').click(function(){
        //remove classes
        
        var error = 0;        
        
        if(!error) {   
		 if($('input[name=radio25to40Q1]:checked').length<=0)
		{
 			alert("يجب الاختيار")
		}
		//slide steps
                if($("#y25to40Q1").is(":checked")){
					$('#second_step').slideUp();
                	$('#fifth_step').slideDown();  
					}
				else if($("#n25to40Q1").is(":checked")){
					$('#second_step').slideUp();
                	$('#third_step').slideDown();  
                
        } }else return false;
    });
	
	
	$('#submit_third').click(function(){
        //remove classes
        
        var error = 0;        
        if(!error) {   
		if($('input[name=NFHQ1]:checked').length <=0 && $('input[name=NFHQ2]:checked').length <=0&&
		 $('input[name=NFHQ3]:checked').length <=0 && $('input[name=NFHQ4]:checked').length <=0
		 && $('input[name=NFHQ5]:checked').length <=0 && $('input[name=NFHQ6]:checked').length <=0)
		{
 			alert("يجب الاختيار")
		}
		//slide steps
					if($("#NFHQ1y").is(":checked") || $("#NFHQ5y").is(":checked") || $("#NFHQ6y").is(":checked")){
					$('#third_step').slideUp();
                	$('#sixth_step').slideDown();  }
					else {
					$('#third_step').slideUp();
                	$('#seventh_step').slideDown();
						
						}
       }else return false;
    });
	
	$('#submit_fourth').click(function(){
        //remove classes
        
        var error = 0;        
        
        if(!error) {   
		if($('input[name=lessthan25Q1]:checked').length && $('input[name=lessthan25Q2]:checked').length &&
		 $('input[name=lessthan25Q3]:checked').length <=0)
		{
 			alert("يجب الاختيار")
		}
		//slide steps
					if($("#lessthan25Q3y").is(":checked")){
					$('#fourth_step').slideUp();
                	$('#sixth_step').slideDown();  
					}
					else {
						$('#fourth_step').slideUp();
                		$('#seventh_step').slideDown();
						}
       }else return false;
    });

	$('#submit_fifth').click(function(){
        
        var error = 0;        
        
        if(!error) { 
		if($('input[name=HFHQ1]:checked').length && $('input[name=HFHQ2]:checked').length <=0)
		{
 			alert("يجب الاختيار")
		}  
		//slide steps
					if($("#HFHQ1y").is(":checked")){
					$('#fifth_step').slideUp();
                	$('#sixth_step').slideDown(); }
					else {
						$('#fifth_step').slideUp();
                		$('#seventh_step').slideDown();
						
						} 
                
       }else return false;
    });
	
	/*
	$('#submit_sixth').click(function(){
	$.post("Controller/reservationController.php",function(){
        window.location.href = "Controller/reservationController.php";
    });
});      */

  
$('#submit_sixth').click(function() {
    var fname = $('#fname').val();
    var nnumber = $('#nnumber').val();
	var phone = $('#phone').val();
    $.ajax({
        type: 'POST',
        url: 'Controller/reservationController.php',
        data: { fname: fname, nnumber: nnumber, phone: phone },
		complete: function(data){
        console.log("DONE");
        
        window.location = "./view/reservationView.php"
      }
    });
});   


});