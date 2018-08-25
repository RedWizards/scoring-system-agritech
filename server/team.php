<?php require_once('../helpers/admin-security.php');?>

<!DOCTYPE html>
<html>

	<head>

		<title>ADMIN</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="../assets/images/uhac.ico" type="image/ico" sizes="32x32">
		<link rel="stylesheet" href="../assets/css/bootstrap3.min.css">
		<script src="../assets/js/angular.min.js"></script>
		<script src="../assets/js/angular-animate.js"></script>
		<script src="../assets/js/angular-route.js"></script>
		<link rel="stylesheet" href="../assets/css/admin-view.css">
        <link rel="stylesheet" href="../assets/css/font-awesome.min.css">

	</head>

	<body ng-app="view" ng-controller="judges-score">

			<header>
				<div class="text-center">
					<h3 id="scoresheet-name"><b>ADMINISTRATOR</b> VIEW</h3>
				</div>
			</header>

			<div class="row outer-row">

				<span class="pull-left">
					<a href="index.php"><button id="back"><span class="glyphicon glyphicon-chevron-left"></span> BACK</button></a>
				</span>
				<br/><br/>
				<h2 class="text-center">ADD <strong>TEAMS</strong></h2>

				<br/><br/>

				<div class="col-md-offset-3 col-md-6">

					<div class="text-center">

					</div>
					<br/><br/>

					<!--
						 COMMENT THIS FORM BELOW
						 WHEN ADDING BY TEAM NUMBER IS OKAY
					 -->
					<div>
						<form id="reg-form">
							<b style="font-size: 15px; margin-right: 20px;">Input Number of Teams <i class="fa fa-chevron-right"></i></b>
							<input type="number" name="teamNo" id="teamNo" min="0" class="input-team"  placeholder="0" />
							<br/><br/><br/>
							<div class="text-center">
								<input type="submit" value="ADD TEAM" name="reg_team" id="submit-team" class="form-control btn btn-primary" />
							</div>
						</form>
					</div>


				</div>

			</div>

	</body>

	<script src="../assets/js/jquery.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$("#reg-form").submit(function(e) {
			e.preventDefault(); // avoid to execute the actual submit of the form.

		    var url = "../database/register_team.php"; // the script where you handle the form input.

				var count =  $("#teamNo").val();

				for(x=1; x<=count; x++){
					
					formData = 'team_name=Team+' + x + '&project_name=+&project_type=+&short_desc=+&long_desc=+';

					$.ajax({
		        type: "POST",
		        url: url,
		        data: formData, // serializes the form's elements.
			    }).done(function(data){

			    	formData = formData + "&team_id=" + JSON.parse(data).id + "&event_id=1";

						$.ajax({
			        type: "POST",
			        url: '../database/add_project.php',
			        data: formData , // serializes the form's elements.
				    }).done(function(data){
							alert('Successfully added Team');
							$("#reg-form").trigger("reset");
						}).fail(function(xhr, textStatus, errorThrown) {
							console.log(textStatus);
							console.log(errorThrown);
					    console.log(xhr.responseText);
						});

					}).fail(function(xhr, textStatus, errorThrown) {
						console.log(textStatus);
						console.log(errorThrown);
				    console.log(xhr.responseText);
					});
				}

		});
	</script>

</html>
