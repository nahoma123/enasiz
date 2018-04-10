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
	  		
			 
			    
			    	<table class="table table-hover">
                                    <thead>
                                                <th><b>Name</b></th>
							<th><b>Joined At</b></th>
							<th><b>email</b></th>
                                                        <th><b>Phone Number</b></th>
                                                        <th><b>Gender</b></th>
                                                        <th><b>Address</b></th>
						</thead>
                                                <tbody>
                                    @foreach($users as $user)
                                    <tr class="pointer" >     
							<td><a href='{{"/transactions/viewuser/$user->id"}}' class='anchor1' data-toggle="modal" data-target="#myModal"> {{$user->name}} </a></td>
							<td> {{date('d-m-Y',strtotime($user->created_at))}}</td>
                                                        <td> {{$user->email}}</td>
                                                        <td> {{$user->phone_number}} </td>
                                                        @if($user->gender==1)   
                                                        <td>Man </td>
                                                        @else
                                                        <td>Woman </td>
                                                        @endif
                                                        <td>{{$user->address}} </td>
                                                       
						</tr>
                                                 @endforeach
                                                </tbody>
					</table>
	  			
			 
			</div>
	</ul>	</div>
</div>

@endsection
