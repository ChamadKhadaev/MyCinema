<?php include 'dbconfig.php' ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
<title> Registration</title>
		
<link rel="stylesheet" href="/bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css">
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="col-lg-12">
			<center><h2 style="color: #444444;
                            background: #FFFFFF;
                            text-shadow: 1px 0px 1px #CCCCCC, 0px 1px 1px #EEEEEE, 2px 1px 1px #CCCCCC, 1px 2px 1px #EEEEEE, 3px 2px 1px #CCCCCC, 2px 3px 1px #EEEEEE, 4px 3px 1px #CCCCCC, 3px 4px 1px #EEEEEE, 5px 4px 1px #CCCCCC, 4px 5px 1px #EEEEEE, 6px 5px 1px #CCCCCC, 5px 6px 1px #EEEEEE, 7px 6px 1px #CCCCCC;">Registration Here</h2></center>

                <form id="registraion_form" class="form-horizontal">         
                    <div class="form-group">
                    <label class="col-sm-3 control-label">Username</label>
                    <div class="col-sm-6">
                    <input type="text" id="txt_username" class="form-control" placeholder="enter username"
                     value="<?php if(isset($_POST["newusername"])){echo $_POST["newusername"];}?>"/>
                    </div>
                    </div>
                                
                    <div class="form-group">
                    <label class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-6">
                    <input type="text" id="txt_email" class="form-control" placeholder="enter email"
                    value="<?php if(isset($_POST["newemail"])){echo $_POST["newemail"];}?>" />
                    </div>
                    </div>
                                
                    <div class="form-group">
                    <label class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-6">
                    <input type="password" id="txt_password" class="form-control" placeholder="enter password"
                    value="<?php if(isset($_POST["newpassword"])){$_POST["newpassword"];}?>" />
                    </div>
                    </div>
                                
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6 m-t-15" style="margin-top: 2%;">
                            <button type="submit" id="btn_register" class="btn btn-success">Register</button>
                        </div>
                    </div>
                                
                    <div class="form-group">
                        <div id="message" class="col-sm-offset-3 col-sm-6 m-t-15"></div>
                    </div>
                    <p>
                        Already a member? <a href="login_form.php">Sign in</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
    
    <script src="jquery-1.12.4-jquery.min.js"></script>
    <script src="/bootstrap-5.2.0-beta1-dist/js/bootstrap.min.js"></script>
	
    <script>
        
        $(document).on('click','#btn_register',function(e){
            
            e.preventDefault();
			
            var username = $('#txt_username').val();
            var email 	 = $('#txt_email').val();
            var password = $('#txt_password').val();
			
            var atpos  = email.indexOf('@');
            var dotpos = email.lastIndexOf('.com');
			
            if(username == ''){ // check username not empty
                alert('please enter username !!'); 
            }
            else if(!/^[a-z A-Z]+$/.test(username)){ // check username allowed capital and small letters 
                alert('username only capital and small letters are allowed !!'); 
            }
            else if(email == ''){ //check email not empty
			alert('please enter email address !!'); 
		}
		else if(atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length){ //check valid email format
			alert('please enter valid email address !!'); 
		}
		else if(password == ''){ //check password not empty
			alert('please enter password !!'); 
		}
		else if(password.length < 6){ //check password value length six 
			alert('password must be 6 !!');
		} 
		else{			
            $.ajax({
                url: 'process.php',
				type: 'post',
				data: 
                {newusername:username, 
                    newemail:email, 
                    newpassword:password
                },
				success: function(response){
                    $('#message').html(response);
				}
			});
            
			$('#registraion_form')[0].reset();
		}
	});

</script>
</body>
</html>