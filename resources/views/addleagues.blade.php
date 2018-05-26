@extends('layouts.app')

@section('content')
    <div class="panel panel-default" style="border:2px solid; margin-left:30%;margin-right:20%; width:50%;">
        <div class="panel-heading">
            <h3 class="panel-title"><h4><b>Add League Form</b></h4></h3>
        </div>
        <div class="panel-body">
            <div style="border-radius:4px;background-color: #eeeeee;border:1px solid darkgrey; margin-left:2%;margin-right:2%; width:96%;" >
                <form class="form" style="padding: 10px;" method="post" action="addLeague">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <h4><label for="id">Nation</label></h4>

                        <div>
                            <input  style="width: 40%" type="text" name="nation" class="form-control" placeholder="Enter the nation of the league" required>
                        </div>
                        <div class="form-group">
                            <h4><label for="id">League Name</label></h4>
                            <div>
                                <input  style="width: 40%" type="text" name="league_name" class="form-control" placeholder="Enter the name of the league" required>
                            </div>

                            <div class="form-group">
                                <h4><label for="startTime">Start Time</label></h4>
                                <input style="width: 40%" type="datetime-local" class="form-control" id="StartTime" name="start_time" required>
                            </div>
                            <div class="form-group">
                                <h4><label for="endTime">End Time</label></h4>
                                <input style="width: 40%" type="datetime-local" class="form-control" id="EndTime" name="end_time" required>
                            </div>
                            <div class="form-group">
                                <h4><label for="venue">Description</label></h4>
                                <input style="width: 40%" type="text" name="description" class="form-control" id="exampleInputEmail2" placeholder="Enter the name of the Venue" required>
                            </div>
                            <div class="form-group">
                                <h4><label for="venue">Number of teams</label></h4>
                                <input style="width: 40%" type="number" min="0" name="number_of_teams" class="form-control" id="exampleInputEmail2" placeholder="Enter the name of the Venue" required>
                            </div>
                            <button type="submit" class="btn btn-success">Add</button>
                </form>
            </div>
        </div>
    </div>
@endsection