@extends('layouts.app')

@section('content')
    <div class="panel panel-default" style="border:2px solid; margin-left:30%;margin-right:20%; width:50%;">
        <div class="panel-heading">
            <h3 class="panel-title"><h4><b>Add bet on league</b></h4></h3>
        </div>
        <div class="panel-body">
            <div style="border-radius:4px;background-color: #eeeeee;border:1px solid darkgrey; margin-left:2%;margin-right:2%; width:96%;" >
                <form class="form" style="padding: 10px;" method="post" action="/addLeagueBet/{{$league_id}}">
                    {{ csrf_field() }}
                    <div class="form-grfoup">
                        <h4><label for="id">Team</label></h4>

                        <div>
                            <select id="sfelectOpt2" style="width: 70%" class="league form-control" name="team">
                                @foreach($teams as $team)
                                    <option value="{{$team->id}}" selected="true">{{$team->team_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <h4><label for="id">Minimum wage</label></h4>
                        <div>
                            <input style="width: 40%" type="number" step="0.01" min="0" name="minimum_wage" class="form-control" placeholder="Enter the odd of the team to win the cup" required>
                        </div>

                        <h4><label for="id">Maximum wage</label></h4>
                        <div>
                            <input style="width: 40%" type="number" step="0.01" min="0" name="maximum_wage" class="form-control" placeholder="Enter the odd of the team to win the cup" required>
                        </div>

                        <h4><label for="id">Summation of team's last five seasons rank</label></h4>
                        <div>
                            <input style="width: 40%" type="number" step="0.01" min="0" name="league_odd" class="form-control" placeholder="Enter the odd of the team to win the cup" required>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Add Bet</button>
                </form>
            </div>
        </div>
    </div>
@endsection