<?php
	
	if ($_SERVER['REQUEST_METHOD']=='POST'):
		$user  = filter_var($_POST['username'] , FILTER_SANITIZE_STRING) ;
		$email = filter_var($_POST['email'] , FILTER_SANITIZE_EMAIL);
		$cell  = filter_var($_POST['cellphone'] , FILTER_SANITIZE_NUMBER_INT) ;
		$msg   = filter_var($_POST['message'] , FILTER_SANITIZE_STRING) ;
		$formErrors = array();

		echo $user . "<br>";
		echo $email . "<br>";
		echo $cell . "<br>";
		echo $msg . "<br>";

		if (strlen($user)<3):
		    $formErrors[] = 'User Name must be larger than <strong> 3 </strong> character<br>';
		endif;

		if (strlen($msg )<10):
			$formErrors[] = 'message can\'t be less than <strong> 10 </strong> character';
		endif;
		$headers = "From : ". $email . "\r\n";	
		if (empty($formErrors)) {
					mail('hossamelganiny603@gmail.com','contact form' , $msg , $headers);
					$user  ='';
					$email = '';
					$cell = '';
					$msg = '';
					$success="<div class='alert alert-success'>Your Form Had Sent</div>";
				}		
				
	endif;
	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Elzero Contact Form </title>
		<link rel="stylesheet"  href="css/bootstrap.min.css">
		<link rel="stylesheet"  href="css/font-awesome.min.css">
		<link rel="stylesheet"  href="css/contacts.css">

	</head>
	<body>
		
		<!-- start form -->
		 <div class="container"> 
		 	<h1 class="text-center">Contact Me </h1> 
		 	
		    <form class="contact-form" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST"> 
		    
			 	<?php if (!empty($formErrors)): ?>
			 <div class="alert alert-danger alert-dismissible" role="start">
		    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    		<span aria-hidden="true">&times;</span></button>
			 	<?php
				 		foreach ($formErrors as $error):
				 			echo $error;
				 		endforeach;	  
			 	?>
		 	</div>
		 <?php endif; ?>
		 		<?php if (isset($success)) {echo $success;}?>
		 		<div class="form_group">
			    	<input 
				    	class = "user_name form-control" 
				    	type="text" 
				    	name="username" 
				    	placeholder="Type Your UserName"
				    	value="<?php if (isset($user)) {echo $user; } ?>"> 
			    	<i class="fa fa-user fa-fw"></i>
			    	<span class="asterisx">*</span>
			    	<div class="alert alert-danger UserError">UserName can\'t be less than <strong> 3 </strong> character</div>
		    	</div>

		    	<div class="form_group">
			    	<input 
				    	class = "email form-control" 
				    	type="email" 
				    	name="email" 
				    	placeholder="Please Type A Valied Email"
				    	value="<?php if (isset($email)) {echo $email; } ?>">
			    	<i class="fa fa-envelope fa-fw"></i>
			    	<span class="asterisx">*</span>
			    	<div class="alert alert-danger EmailError">Email Can't Be <strong> Empty </strong></div>
		    	</div>

		    	<input 
			    	class ="form-control" 
			    	type="text" 
			    	name="cellphone" 
			    	placeholder="Type Your Cell Phone"
			    	value="<?php if (isset($cell)) {echo $cell; } ?>">
		    	<i class="fa fa-phone fa-fw"></i>

				<textarea 
					class = "Msg form-control" 
					name = "message" 
					placeholder="Your Message!"><?php if (isset($msg)) {echo $msg; } ?></textarea> 
					<div class="alert alert-danger MsgError">Massage must be larger than <strong> 10 </strong> character<br></div>
				<input 
					class="btn btn-success" 
					type="submit" 
					value="Send Message" />
				<i class="fa fa-send fa-fw send-icon"></i>

			</form>

		</div>
		<!-- End Form -->
		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/custom.js"></script>
	</body>
</html>