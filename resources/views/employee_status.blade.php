@extends('layouts.app')

@section('content')
	<div class="container-fluid panel-info panel" style="margine-left: 20%; margine-right:20%; width: 60%">
	  <ul class="list-group">
	  <li class="list-group-item" ><h3><b>User's List</b></h3></li>
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
			    	<table class="table table-striped">
						<thread>
                                                <th><b>Name</b></th>
							<th><b>Identification</b></th>
							<th><b>Credit Balance</b></th>
						</thread>
						<tr>
                                                    @forach(
							<td><a href="#" data-toggle="modal" data-target="#myModal">Abebe</a></td>
						</tr>
						<tr>
							<td><a href="#" data-toggle="modal" data-target="#myModal">kebede</a></td>
							<td>ID: 29407073</td>
							<td>332.34 Birr</td>

						</tr> 
					</table>
	  			
			 
			</div>
	</ul>	</div>
</div>

@endsection
