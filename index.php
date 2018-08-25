<?php require('./helpers/route-index.php');
?>

<!doctype html>
<html>

	<head>

		<title>U:HACK Tech Up Agri</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="assets/images/uhac.ico" type="image/ico" sizes="32x32">
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/judge-view.css">

	</head>

	<body>

		<div id="event-cover" onclick="regJudgeOpen()">
			<div class="container cover-content">
				<div class="row align-items-center justify-content-center row-content">
					<div class="col-lg-6 col-md-6 col-sm-10 col-xs-10 text-center">
						<img src="assets/images/agritech.png" class="img-responsive" id="scoring-logo" width="100%" height="100%">
					</div>
				</div>
			</div>
		</div>

		<div id="register-judge">
			<div class="container cover-content">
				<div class="row align-items-center justify-content-center row-content no-select">
					<a class="btn btn-simple" id="closeRegBtn" href="javascript:regJudgeClose()">&times;</a>
					<div class="col-lg-4 col-md-4 col-sm-9 col-xs-9 text-center">
						<h3 id="welcome-judge" class="no-select">WELCOME</h3><br/>
						<form class="form">
		        			<input placeholder="Please enter your name" type="text" id="input-container" class="form-control text-center" autofocus required><br/>
							<input id="register-button" class="btn" class="form-control" data-loading-text="Please Wait..." type="submit" value="SUBMIT">
			        	</form>
					</div>
				</div>
			</div>
		</div>

	</body>

	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/angular.min.js"></script>
	<script src="assets/js/angular-animate.js"></script>
	<script src="assets/js/judge-view.js"></script>
	<script src="assets/js/angular-route.js"></script>

	<script>
			// Disable back action
			history.pushState(null, document.title, location.href);
			window.addEventListener('popstate', function (event) {
					history.pushState(null, document.title, location.href);
			});

	    $(function() {
		    $("#register-button").click(function(event){
		    	event.preventDefault();
		    	if($('#input-container').val() != ""){
			        //ajax request
			        $.ajax({
							 	method: "POST",
							 	url: "database/create_judge.php",
							 	data: {
							 		judge_name: $('#input-container').val(),
							 		event_id: "1"
							 	}
							})
							.done(function( data ) {
							  $(location).attr('href', 'scoresheet.php');
							})
							.fail(function(xhr, textStatus, errorThrown) {
								alert(errorThrown.filename);
						    alert(xhr.responseText);
						  });
				   }
		    });
		});
	</script>

</html>
