@extends('layouts.app')

@section('content')
		
			<div style="border:1px solid balck; margin-left:20%;margin-right:20%; width:60%; height:400px;">
				<div class="header" style= "background-color:rgb(229, 232, 234);">
					<h2>Trending Fexture</h2>
					<br>
				</div>
				<div style="background-color: white;">
					<center>
						<div>
							<table class="table table-striped">
								<tr>
									<td>No</td>
									<td>games</td>
									<td style="float:right; margin-right: 255px">Details</td>
								</tr>
								<tr>
									<td>1</td>
									<td><b>Chelsea</b> Vs <b>Man City</b></td>
									<td><a href="#" class="btn btn-info"  data-toggle="modal" data-target="#myModal" style="float:right; margin-right: 200px">View Details</a></td>

								</tr>
								<tr>
									<td>1</td>
									<td><b>Man Utd</b> Vs <b>Arsenal</b></td>
									<td><a href="#" class="btn btn-info"  data-toggle="modal" data-target="#myModal" style="float:right; margin-right: 200px">View Details</a></td>
								</tr>
								<tr>
									<td>3</td>
									<td><b>Liverpool</b> Vs <b>Watford</b></td>
									<td><a href="#" class="btn btn-info"  data-toggle="modal" data-target="#myModal" style="float:right; margin-right: 200px">View Details</a></td>

								</tr>
							</table>
						</div>
					</center>
				</div>
			</div>
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Details of Match</h4>
			      </div>
			      <div class="modal-body">
			        <ul class="list-group">
					  <li class="list-group-item"><b>Man Utd</b> Vs <b>Arsenal</b></li>
					  <li class="list-group-item"><b>Competition Type:</b>League</li>
					  <li class="list-group-item"><b>Competition Name:</b>Premier League</li>
					  <li class="list-group-item"><b>Home team:</b>Manchester United</li>
					  <li class="list-group-item"><b>Away team:</b>Arsenal</li>
					  <li class="list-group-item"><b>Start time:</b>Apr-04-2018 16:00GMT</li>
					  <li class="list-group-item"><b>End Time:</b>Apr-04-2018 17:30GMT</li>
					  <li class="list-group-item"><b>Venue:</b>Wembly Stadium, Manchester, London</li>
					</ul>
				       		   
			      </div>
			      <div class="modal-footer">
			        <a href="../betsmanagement" type="button" class="btn btn-primary">Add Bet</button>
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <a href="../matchdetail"type="button" class="btn btn-primary">Home</a>
			      </div>
			    </div>
			  </div>
			</div>

			<div style="border:1px solid balck; margin-left:20%;margin-right:20%; width:60%; height:400px;">
				<div class="header" style= "background-color:rgb(229, 232, 234);">
					<h2>Todays Fexture</h2>
					<br>
					
				</div>
				<div style="background-color: white;">
					<center>
						<div>
							<table class="table table-striped">
								<tr>
									<td>No</td>
									<td>games</td>
									<td style="float:right; margin-right: 255px">Details</td>
								</tr>
								<tr>
									<td>1</td>
									<td><b>Swansea City</b> Vs <b>Crystal Palace</b></td>
									<td><a href="#" class="btn btn-info"  data-toggle="modal" data-target="#myModal" style="float:right; margin-right: 200px">View Details</a></td>

								</tr>
								<tr>
									<td>1</td>
									<td><b>Burnley</b> Vs <b>Storke City</b></td>
									<td><a href="#" class="btn btn-info"  data-toggle="modal" data-target="#myModal" style="float:right; margin-right: 200px">View Details</a></td>
								</tr>
								<tr>
									<td>3</td>
									<td><b>Watford</b> Vs <b>Norwich</b></td>
									<td><a href="#" class="btn btn-info"  data-toggle="modal" data-target="#myModal" style="float:right; margin-right: 200px">View Details</a></td>

								</tr>
							
							</table>
						</div>
					</center>
				</div>
			</div>
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Details of Match</h4>
			      </div>
			      <div class="modal-body">
			        <b>Watford</b> Vs <b>Norwich</b>
				        Norwich is Winnig !!!<br>
				        By a loTTTT<br>			   
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button type="button" class="btn btn-primary">Home</button>
			      </div>
			    </div>
			  </div>
			</div>
@endsection