    <!Doctype html>
    <html>
        <head>
            <title>
                creating notification
            </title>
             <link href="CSS/dashboard.css" rel="stylesheet" type="text/css">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
            <style>
                #check{
                    padding-left: 17%;
                }
                #buttons{
                    padding-left: 17%;
                    padding-top: 5%;
                }
                body{
                    padding:50px;
                     height:600px;
                    width:1100px;
                }
            </style>
            <style>
			body{
			padding:50px;
			 background-image:url("images/landscape_68-wallpaper-1366x768.jpg");
			 height:600px;
			width:1100px;
			}
			
				h1{
				color : #000000;
				text-align : center;
				font-family: "SIMPSON";
				}
				
				
				form{
				 width: 500px;
				 margin: 0 auto;
			}
			
		</style>
        </head>
                <body>
                    <!--NAVIGATION MENU-->
						<div id="nav_menu">
								<a href="home.php"><button class="btn home">home</button></a>
								<a href="signup.php"><button class="btn success">signUp</button></a>
								<a href="login.php"><button class="btn info">logIn</button></a>		
								
								<a href="notificationcreate.php"><button class="btn danger">notification</button></a>	
											
						
						</div>
						<h1> SEND NOTIFICATIONS </h1>
                <form role="form" id="f1" class="form-horizontal" method="POST" >
                       <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">TITLE:</label><br>
                            <div class="col-sm-10">
                            <input type="text" id="title" name="title" class="form-control" required/>
                           </div>
                        </div>
                        <div class="form-group">
                        <label for="message" class="col-sm-2 control-label">MESSAGE:</label><br>
                            <div class="col-sm-10">
                            <input type="text" id="message" name="message" class="form-control" required/>
                            </div>
                        </div>
                    <div class="form-group">
                    <label for="url" class="col-sm-2 control-label">URL:</label><br>
                        <div class="col-sm-10">
                        <input type="text" id="url" name="url" class="form-control" required/>
                        </div>
                    </div>
                     <div class="form-group">
                    <label for="url" class="col-sm-2 control-label">ICON URL:</label><br>
                        <div class="col-sm-10">
                        <input type="text" id="icon" name="url" class="form-control" required/>
                        </div>
                    </div>
                     </div>
                    <button type="button" name="submit" value="submit" id="id1" onclick="notifyMe()">submit</button>
						 
						 
						 
					<button type="submit" id="id2">subscribe to push engage</button>
					
            </form>
            </body>
    </html>
	<script>
	
	var btn = document.getElementById("id1");
	var btn1 = document.getElementById("id2");
	btn.disabled = true;
	Notification.requestPermission().then(function(response) {
		if(response === 'granted') {btn.disabled = false;  btn1.disabled = true;} })
		.catch(function(ex) {console.log(ex) });
	
	
	
	
	
	
	
	function notifyMe() {

	var testMessage=document.getElementById('message').value;
	var testUrl=document.getElementById('url').value;
	var image = document.getElementById('icon').value;;
	var options = {
	body: testMessage,
	icon: image
	}

	var title=document.getElementById('title').value;
	

 var notification;
	if (!("Notification" in window)) {
	alert("This browser does not support desktop notification");
	}

 
		else if (Notification.permission === "granted") {
   
	if(title!='') {
		notification = new Notification(title,options); 
		
		notification.onclick = function(event) {
			
		event.preventDefault(); 
		window.open(testUrl, '_blank');
		
		
		
		
			var xhr1 = new XMLHttpRequest();
	xhr1.open("POST", 'http://localhost/pushengage/click_increment.php', true);


	xhr1.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	

	xhr1.onreadystatechange = function() {
    if(xhr1.readyState == XMLHttpRequest.DONE && xhr1.status == 200) {
       
		}
	}
		xhr1.send("action='archieve' & title="+title);
		
		}
		}
		
		}

		else if (Notification.permission !== 'denied') {
		Notification.requestPermission(function (permission) {
    
			if (permission === "granted") {
				if(title!='' && message!='' && url!=''){
			notification = new Notification(title,options);}
		}
		});
		
		}

		
		
		var postData={
			action: 'archieve' ,
			title:title,
			message:testMessage,
			url:testUrl,
			icon:image
		};
		
		
		
		var xhr = new XMLHttpRequest();
	xhr.open("POST", 'http://localhost/pushengage/note.php', true);


	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	

	xhr.onreadystatechange = function() {
    if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
       
		}
	}
		xhr.send("action='archieve' & title="+title+" & message="+testMessage+" & url="+testUrl+" & icon="+image);
	
		
		
		
		
     
		
		
	 
}

	
	</script>
	
	
	
	