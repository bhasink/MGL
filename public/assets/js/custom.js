function otp_send(phone)
{
	
	 $.ajax({
         url:  'send_otp',
         method: 'post',
		 
		 data : $('#form').serialize(), 
          success: function (result) {
			   var json = JSON.parse(result);
			  // alert(json["otp"]); 
			   //document.getElementById('txt_otp').value(json["otp"]);
			   document.getElementById("txt_otp").value = json["otp"];
				$('#phone').attr('readonly', true);
		  }
	 })
}
function otp_send1(phone)
{
	
	 $.ajax({
         url:  'send_otp',
         method: 'post',
		 
		 data : $('#form1').serialize(), 
          success: function (result) {
			   var json = JSON.parse(result);
			  // alert(json["otp"]); 
			   //document.getElementById('txt_otp').value(json["otp"]);
			   document.getElementById("txt_otp1").value = json["otp"];
				$('#phone1').attr('readonly', true);
		  }
	 })
} 
function validate_form()
{
	var papbook=$('#prappdate').val();	 
	var papbook1=$('#prappdate1').val();	 
	var abdate='';
	if($('#match_date').val()!="")
	{	
		var cappdate=$('#match_date').val().split('-');
		
		abdate=cappdate[0]+''+cappdate[1]+''+cappdate[2];

	}
	
	if(document.getElementById('name').value=='')
	{
		alert('Please enter  Name.');
		document.getElementById('name').focus();
		return false;
	}
	else if(document.getElementById('ign').value=='')
	{
		alert('Please enter  In-game Nam.');
		document.getElementById('ign').focus();
		return false;
	}
	else if(document.getElementById('phone').value=='')
	{
		alert('Please enter  Phone Number.');
		document.getElementById('phone').focus();
		return false;
	}
	else if(document.getElementById('ign').value.length<5)
	{
		alert('Please enter  ign no atleast 3 to 12 character.');
		document.getElementById('ign').focus();
		return false;
	}
	else if(document.getElementById('phone').value.length<10)
	{
		alert('Phone Number Should be 10 digit');
		document.getElementById('phone').focus();
		return false;
	}
	else if(document.getElementById('country').value=='')
	{
		alert('please enter country name');
		document.getElementById('country').focus();
		return false;
	}
	/* else if(document.getElementById('otp').value=='')
	{
		alert('Please enter  OTP.');
		document.getElementById('otp').focus();
		return false;
	} */
	else if(document.getElementById('age').value=='')
	{
		alert('Please enter  Age.');
		document.getElementById('age').focus();
		return false;
	}
	else if(document.getElementById('match_date').value=='')
	{
		alert('Please enter  Match Date.');
		document.getElementById('match_date').focus();
		return false;
	}
	else if(document.getElementById('match_date').value=='')
	{
		alert('Please enter  Match Date.');
		document.getElementById('match_date').focus();
		return false;
	}
	else if($('#match_date').val()!="" && (abdate<=papbook) )
	{
		alert('Please Select future date');
		document.getElementById('match_date').focus();
		return false;
	}
	// else if($('#match_date').val()!="" && (abdate>papbook1) )
	// {
	//
	// 	alert('Tournament Closed Now');
	// 	document.getElementById('match_date').focus();
	// 	return false;
	// }
	/* else if(document.getElementById('txt_otp').value!='' && document.getElementById('otp').value!='' && document.getElementById('txt_otp').value!=document.getElementById('otp').value)
	{
		
		alert('OTP Does Not Match.');
		document.getElementById('otp').focus();
		return false; 
		
	} */
	else{
		if (confirm('Kindly make sure all the details entered by you are correct. Also, do ensure the In-game Name and mobile number entered are valid and active. Incase of any other related issues contact us on queries@microgravity.co.in')) {
		   return true;
			} else {
				//alert('Provide Enter all Valid Details');
				return false;
			}
		/* 
		 $.ajax({
         url:  'submit_data',
         method: 'post',
		 
		 data : $('#form').serialize(), 
          success: function (result) {
			  
			  $('#form').reset();
			  alert('successfully Insert');
			   
		  }
	 }); */
	}
}
function validate_form1() 
{
	var papbook=$('#prappdate').val();	 
	var papbook1=$('#prappdate1').val();	 
	var abdate='';
	if($('#match_date1').val()!="")
	{	
		var cappdate=$('#match_date1').val().split('-');
		
		abdate=cappdate[0]+''+cappdate[1]+''+cappdate[2];		
	}
	
	if(document.getElementById('name1').value=='')
	{
		alert('Please enter  Name.');
		document.getElementById('name1').focus();
		return false;
	}
	else if(document.getElementById('ign1').value=='')
	{
		alert('Please enter  In-game Nam.');
		document.getElementById('ign1').focus();
		return false;
	}
	else if(document.getElementById('phone1').value=='')
	{
		alert('Please enter  Phone Number.');
		document.getElementById('phone1').focus();
		return false;
	}
	else if(document.getElementById('phone1').value.length<10)
	{
		alert('Phone Number Should be 10 digit');
		document.getElementById('phone1').focus();
		return false;
	}
	else if(document.getElementById('ign1').value.length<5)
	{
		alert('Please enter  ign no atleast 3 to 12 character.');
		document.getElementById('ign1').focus();
		return false;
	}
	else if(document.getElementById('country1').value=='') 
	{
		alert('please enter country name');
		document.getElementById('country1').focus();
		return false;
	}
	/* else if(document.getElementById('otp1').value=='')
	{
		alert('Please enter  OTP.');
		document.getElementById('otp1').focus();
		return false;
	} */
	else if(document.getElementById('age1').value=='')
	{
		alert('Please enter  Age.');
		document.getElementById('age1').focus();
		return false;
	}
	else if(document.getElementById('match_date1').value=='')
	{
		alert('Please enter  Match Date.');
		document.getElementById('match_date1').focus();
		return false;
	}
	else if($('#match_date1').val()!="" && (abdate<=papbook) )
	{
		alert('Please Select future date');
		document.getElementById('match_date1').focus();
		return false;
	}
	// else if($('#match_date1').val()!="" && (abdate>papbook1) )
	// {
	//
	// 	alert('Tournament Closed Now');
	// 	document.getElementById('match_date1').focus();
	// 	return false;
	// }
	/* else if(document.getElementById('txt_otp1').value!='' && document.getElementById('otp1').value!='' && document.getElementById('txt_otp1').value!=document.getElementById('otp1').value)
	{
		
		alert('OTP Does Not Match.');
		document.getElementById('otp1').focus();
		return false; 
		
	} */
	else{
		
 if (confirm('Kindly make sure all the details entered by you are correct. Also, do ensure the In-game Name and mobile number entered are valid and active. Incase of any other related issues contact us on queries@microgravity.co.in')) {  
   return true;
	} else {
		//alert('Provide Enter all Valid Details');
		return false;
	}


		/* 
		 $.ajax({
         url:  'submit_data',
         method: 'post',
		 
		 data : $('#form').serialize(), 
          success: function (result) {
			  
			  $('#form').reset();
			  alert('successfully Insert');
			   
		  }
	 }); */
	}
	
}
function isNumberKey(evt)
	{
		var val=document.getElementById('phone').value;
		//alert(val);
		var n = val.startsWith('0');
		var charCode = (evt.which) ? evt.which : event.keyCode
			
		if(charCode == 46)
		{
			return true;
		}
		if(n == true)
		{
			alert('Phone Number not start with 0 ');
			return false;
		}
		if (charCode > 31 && (charCode < 48 || charCode > 57))
		{
			return false;
		}
		else{
		 return true;
		}
	}
