@extends('layouts.app')

@section('content')
    <div class="panel panel-default" style="border:2px solid; margin-left:30%;margin-right:20%; width:50%;">
        <div class="panel-heading">
            <h3 class="panel-title"><h4><b>Add Result on match</b></h4></h3>
        </div>
        <div class="panel-body">
            <div style="border-radius:4px;background-color: #eeeeee;border:1px solid darkgrey; margin-left:2%;margin-right:2%; width:96%;" >
                <h4>{{$match_id}}</h4>
                <form class="form" style="padding: 10px;" method="post" action="{{$match_id}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <h4><label for="id">Home team score</label></h4>

                        <div>
                            <input style="width: 40%" type="number" name="home_team_score" class="form-control" placeholder="Enter the minimum wage">
                        </div>

                        <h4><label for="id">Away team score</label></h4>

                        <div>
                            <input style="width: 40%" type="number" name="away_team_score" class="form-control" placeholder="Enter the minimum wage">
                        </div>

                        <h4><label for="id">Home team possession</label></h4>

                        <div>
                            <input style="width: 40%" type="number" name="possession" class="form-control" placeholder="Enter the home odds">
                        </div>

                        <h4><label for="id">Home team shots on target</label></h4>

                        <div>
                            <input style="width: 40%" type="number" name="home_team_shots_on_target" class="form-control" placeholder="Enter the minimum wage">
                        </div>

                        <h4><label for="id">Away team shots on target</label></h4>

                        <div>
                            <input style="width: 40%" type="number" name="away_team_shots_on_target" class="form-control" placeholder="Enter the away odds">
                        </div>

                        <h4><label for="id">Home team corners</label></h4>

                        <div>
                            <input style="width: 40%" type="number" name="home_team_corners" class="form-control" placeholder="Enter the minimum wage">
                        </div>

                        <h4><label for="id">Away team corners</label></h4>

                        <div>
                            <input style="width: 40%" type="number" name="away_team_corners" class="form-control" placeholder="Enter the away odds">
                        </div>

                        <h4><label for="id">Home team fouls</label></h4>

                        <div>
                            <input style="width: 40%" type="number" name="home_team_fouls" class="form-control" placeholder="Enter the minimum wage">
                        </div>

                        <h4><label for="id">Away team fouls</label></h4>

                        <div>
                            <input style="width: 40%" type="number" name="away_team_fouls" class="form-control" placeholder="Enter the away odds">
                        </div>
                        <br>

                            <button type="submit" class="btn btn-success">Add Result</button>
                </form>
            </div>
        </div>
    </div>
@endsection