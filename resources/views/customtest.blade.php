@extends('layouts.app')

@section('content')
		
			<div style="border:1px solid balck; margin-left:20%;margin-right:20%; width:60%;">
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
									<td>Details</td>
								</tr>
								<tr>
									<td>1</td>
									<td><b>Chelsea</b> Vs <b>Man City</b></td>
									<td><a href="#" class="btn btn-info"  data-toggle="modal" data-target="#myModal">View Details</a></td>

								</tr>
								<tr>
									<td>1</td>
									<td><b>Man Utd</b> Vs <b>Arsenal</b></td>
									<td><a href="#" class="btn btn-info"  data-toggle="modal" data-target="#myModal">View Details</a></td>
								</tr>
								<tr>
									<td>3</td>
									<td><b>Liverpool</b> Vs <b>Watford</b></td>
									<td><a href="#" class="btn btn-info"  data-toggle="modal" data-target="#myModal">View Details</a></td>

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
			        <b>Man Utd</b> Vs <b>Arsenal</b>
				        have alskjdlaksjdlakjsdasdbr<br>
				        asdasdasjdhakshdkajsdhkajshdkj<br>			   
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button type="button" class="btn btn-primary">Home</button>
			      </div>
			    </div>
			  </div>
			</div>

			<div style="border:1px solid balck; margin-left:20%;margin-right:20%; width:60%;">
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
									<td>Details</td>
								</tr>
								<tr>
									<td>1</td>
									<td><b>Swansea City</b> Vs <b>Crystal Palace</b></td>
									<td><a href="#" class="btn btn-info"  data-toggle="modal" data-target="#myModal">View Details</a></td>

								</tr>
								<tr>
									<td>1</td>
									<td><b>Burnley</b> Vs <b>Storke City</b></td>
									<td><a href="#" class="btn btn-info"  data-toggle="modal" data-target="#myModal">View Details</a></td>
								</tr>
								<tr>
									<td>3</td>
									<td><b>Watford</b> Vs <b>Norwich</b></td>
									<td><a href="#" class="btn btn-info"  data-toggle="modal" data-target="#myModal">View Details</a></td>

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