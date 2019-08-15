<html>
    <head>
        <script src="amazon-connect-1.3-24-g6eecc23.js"></script>
    </head>
	<div id="containerDiv" style="height:465px;width:320px;"></div>
    <body>
        <script>
			connect.core.initCCP(containerDiv, {
			  ccpUrl:        'https://bottomup-otamagaike.awsapps.com/connect/ccp#/',    /*REQUIRED (*** has been replaced) */
			  loginPopup:    true,          /*optional, default TRUE*/
			  softphone:     {              /*optional*/
				allowFramedSoftphone: true
			  }
			});
			connect.contact(function(contact) {
			  console.log("Get Call Details");
			  var activeConnection = contact.getActiveInitialConnection();
			  var contactId = activeConnection['contactId'];
			  var connectionId = activeConnection['connectionId'];
			  var conn = new connect.Connection(contactId, connectionId);
			  var customerNo = conn.getEndpoint().phoneNumber;
			  
			  console.log("Set Customer Phone Number");
			  $("#callerNo").empty();
			  $('#callerNo').append(customerNo);
			  document.getElementById('phoneNo').value = customerNo;

			  console.log("Get Call Attributes");
			  var callAttributes = contact.getAttributes();

			  console.log("Set Call Attributes");;
			  $("#attributes").empty();
			  Object.keys(callAttributes).forEach(function(key) {
				
				console.log("Adding Attribute To Table");
				$('#attributes').append( "<tr> <td>"+callAttributes[key]["name"]+"</td> <td>"+callAttributes[key]["value"]+"</td> </tr>" );

			  });

			});
		</script>
    </body>
</html>