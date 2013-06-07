$(document).ready(function(){
	 $("#exampleNumber").val();
	
      
	 $('input').blur(function() {
	 
	 var sectionA = $("input[name=sectionA]").val();
	 var sectionB = $("input[name=sectionB]").val();
	 var sectionC = $("input[name=sectionC]").val();
	 /*var sectionD = $("input[name=sectionD]").val();
	 var sectionE = $("input[name=sectionE]").val();
	 var sectionF = $("input[name=sectionF]").val();
	 var sectionG = $("input[name=sectionG]").val();
     var sep = '-';
*/

	 
	 var exampleNumber = sectionA + sectionB + sectionC;

});
	 if (!isNaN(sectionA)) {
		$('#exampleNumber').val(sectionA);
		} else {
		//alert('Ops Error! Please only numbers')
	}


	});