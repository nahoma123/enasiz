@extends('layouts.app')

@section('content')
    <div class="panel panel-default" style="border:2px solid; margin-left:30%;margin-right:20%; width:50%;">
        <div class="panel-heading">
            <h3 class="panel-title"><h4><b>Add Team Form</b></h4></h3>
        </div>
        <div class="panel-body">
            <div style="border-radius:4px;background-color: #eeeeee;border:1px solid darkgrey; margin-left:2%;margin-right:2%; width:96%;" >
                <form class="form" style="padding: 10px;" enctype="multipart/form-data" method="post" action="addTeam">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <h4><label for="id">League</label></h4>

                        <div>
                            <select id="selectOpt1" style="width: 40%" class="form-control competition_type" name="league">
                                @foreach($leagues as $league)
                                    <option value="{{$league->id}}">{{$league->league_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <h4><label for="id">Team Name</label></h4>
                            <div>
                                <input style="width: 40%" type="text" name="team_name" class="form-control" placeholder="Enter the name of the league" required>
                            </div>

                            <div class="form-group">
                                <h4><label for="startTime">Team thumbnail</label></h4>
                                <input type="file" style="width: 40%" class="form-control" name="team_thumbnail">
                            </div>
                            <button type="submit" class="btn btn-primary">Add Team</button>
                </form>
            </div>
        </div>
    </div>
@endsection