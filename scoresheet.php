<?php require('./helpers/route-scoresheet.php'); ?>
<!doctype html>
<html>

	<head>

		<title>U:HACKADEMIA</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="assets/images/uhac.ico" type="image/ico" sizes="32x32">
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/judge-view.css">
		<script src="assets/js/angular.min.js"></script>
		<script src="assets/js/angular-animate.js"></script>
		<script src="assets/js/angular-route.js"></script>

	</head>

	<body ng-app="scoring-sheet">

		<header class="text-center">
			<img src="assets/images/scoring-logo-sm.png" class="img-responsive" id="scoring-logo" width="200px" height="45px">
		</header>

		<div class="sheet-container" ng-controller="sheet-ctrl" ng-init="init()">

			<br/>
			<div ng-hide="activeNow">
				<h3 id="team-list" class="text-center"><b>TEAM LIST</b></h3>
				<br/>
			</div>

			<div class="row justify-content-center no-padding no-margin">
				<div class="col-lg-6 col-md-7 col-sm-10 col-xs-10">
					<div ng-repeat="team in teams">

						<button type="button" class="btn btn-default team-btn" ng-click="setScore(team)" ng-hide="activeNow">
							<span id="btn-team-name" class="pull-left">{{team.team_name | uppercase}}</span> 
							<span id="btn-team-score" class="pull-right"><b>{{team.total}} %</b></span>
						</button>

						<div ng-show="team.isActive">
							<button id="view-btn" ng-click="closeTeam(team)"><span class="fa fa-chevron-left"></span> View All Teams</button>
							<br/><br/>
							<div class="text-center">
								<h3><strong>{{team.project_name | uppercase}}</strong></h3>
								<h5 class="team-name"><small>by</small> <strong>{{team.team_name | uppercase}}</strong></h5>
							</div>
							<br/>
							<form id="main-sheet-{{team.team_id}}">
								<table>
									<tr class="table-header">
										<td class="criteria-lbl">CRITERIA</td>
										<td class="text-right score-lbl">SCORE<td>
									</tr>
									<tr ng-repeat="criteria in team.criteria" id="criteria-box">
										<td class="criteria">
											<span><b>{{criteria.criteria_desc}}</b></span><br/>
											<small><i>{{criteria.criteria_longdesc}}</i></small>
										</td>
										<td class="text-right score">
											<input type="number" class="text-right" name="criteria-team{{team.team_id}}-criteria{{criteria.criteria_id}}" placeholder="0" min="1" max="{{criteria.criteria_weight}}" style="width: 50%;" ng-model="criteria.score_details.score" ng-change="updateScore(team)" value="{{criteria.score_details.score}}"/><span> / {{criteria.criteria_weight}}</span>
										</td>
									</tr>
								</table>
								<br/>
								<h3 class="pull-left"><strong>TOTAL </strong></h3>
								<h3 class="pull-right"><strong>{{team.total}} %</strong></h3>
								<input type="button" value="SUBMIT" id="submit-btn" ng-click="setScores(team)" ng-show="team.total"/>
								<input type="button" value="SUBMIT" class="submit-btn-disabled" ng-hide="team.total" disabled/>
							</form>
						</div>

					</div>
				</div>
			</div>

			<div class="text-center" ng-hide="activeNow">
				<a href="./helpers/logout.php"><button id="done-btn" class="text-center">DONE</button></a>
			</div>

		</div>

		<div id="footer" class="text-center">
			<br/>
		</div>
			
	</body>
	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/judge-view.js"></script>
	<script src="assets/js/judge-scoresheet.js"></script>

</html>