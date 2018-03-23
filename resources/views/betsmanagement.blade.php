@extends('layouts.app')

@section('content')
	<div class="container-fluid" style="margine-left: 20%; margine-right:20%; width: 60%">
	  <ul class="list-group">
	  <li class="list-group-item" ><h3><b>Manage Accounts</b></h3></li>
	  <li class="list-group-item">
		  <div style="margin-left:40%">
	    <div class="input-group">
	      <input type="text" class="form-control" placeholder="Search User">
	      <span class="input-group-btn">
	        <button class="btn btn-default" type="button">Search</button>
	      </span>
	    </div><!-- /input-group -->
	  	</div><!-- /.col-lg-6 -->
		<!-- /.row -->
		</li>
	  <li class="list-group-item">
	  		<div class="panel panel-default">
			  <div class="panel-body">
			    <div class="well well-sm" style= "padding: 20px">
			    	<table class="table table-striped">
						<tr>
							<td><b>Name</b></td>
							<td><b>Identification</b></td>
							<td><b>Credit Balance</b></td>
						</tr>
						<tr>
							<td><a href="#" data-toggle="modal" data-target="#myModal">Abebe</a></td>
							<td>ID: 2391238</td>
							<td>730.99 Birr</td>
						</tr>
						<tr>
							<td><a href="#" data-toggle="modal" data-target="#myModal">kebede</a></td>
							<td>ID: 29407073</td>
							<td>332.34 Birr</td>

						</tr> 
					</table>
	  			</div>
			  </div>
			</div>
	  		
	  </li>
	  <li class="list-group-item">
	  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Acount Mangement Form</h4>
			      </div>
			      <div class="modal-body">
			        	<div class="row" style="">
					  	<div class="col-xs-6 col-sm-2">
						  	<h5><b>Credit Amount</b></h5>
				  		</div>
					  	<div class="col-xs-6 col-sm-3" >
						  	<input class="form-control" id="disabledInput" type="text" placeholder="377.54 Birr" disabled>
						</div>
						<div class="col-xs-6 col-sm-3" >
						  	<input class="form-control" id="rechargeAmount" type="text" placeholder="00.00 Birr" >
						</div>
						<div class="btn-group" role="group" aria-label="..." style="float:right; margin-right: 20px">
						  <button type="button" class="btn btn-default"style="color:green">
						  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Recharge</button>
						  <button type="button" class="btn btn-default" style="color:red">
						  <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>Withdraw</button>
						</div>
					</div>	   
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <a href="../matchdetail" type="button" class="btn btn-primary">Home</a>
			      </div>
			    </div>
			  </div>
			</div>
	  	
	  </li>
	  <li class="list-group-item" style="align: right"><button type="button" class="btn btn-info">Submit</button></li>
	</ul>	</div>
</div>

@endsection