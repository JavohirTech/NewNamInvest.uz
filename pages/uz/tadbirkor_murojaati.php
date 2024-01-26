<?php
	   $to = "starkcoders@mail.com";
	   $subject = "Thank you for your purchase";
	 
	   // In php 7.2 and newer versions we can use an array to set the headers.
	   $headers = array(
	    	'MIME-Version' => '1.0',
	    	'Content-type' => 'text/html;charset=UTF-8',
	    	'From' => 'javohirtech@mail.com',
	    	'Reply-To' => 'javohirtech@mail.com'
	   );
	 
	   // Setting the value in the $name variable.
	   $name = "javohirtech";
	 
	   // Starting output buffer.
	   ob_start();
	   include("./tadbirkor_murojaati.php");
	   $message = ob_get_contents();
	   ob_end_clean();
	 
	   $sent = mail($to, $subject, $message, $headers);
	 
	   if(!$sent){
	      echo "Error: Message not sent. Please try again";
	   }else{
	      echo "Message was sent successfully";
	   }