@extends('layouts.app')

@section('content')
    <div class="panel panel-default" style="border:2px solid; margin-left:30%;margin-right:20%; width:50%;">
        <div class="panel-heading">
            <h3 class="panel-title"><h4><b>Add Bet</b></h4></h3>
        </div>
        <div class="panel-body">
            <div style="border-radius:4px;background-color: #eeeeee;border:1px solid darkgrey; margin-left:2%;margin-right:2%; width:96%;" >
                <h4>{{$match_id}}</h4>
                <form class="form" style="padding: 10px;" method="post" action="{{$match_id}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <h4><label for="id">Minimum wage</label></h4>

                        <div>
                            <input style="width: 40%" type="number" name="minimum_wage" class="form-control" placeholder="Enter the minimum wage">
                        </div>

                        <h4><label for="id">Maximum wage</label></h4>

                        <div>
                            <input style="width: 40%" type="number" name="maximum_wage" class="form-control" placeholder="Enter the minimum wage">
                        </div>

                        <h4><label for="id">Home team winning odd</label></h4>

                        <div>
                            <input style="width: 40%" type="number" name="winning_odds_home" class="form-control" placeholder="Enter the home odds">
                        </div>

                        <h4><label for="id">Away team winning odd</label></h4>

                        <div>
                            <input style="width: 40%" type="number" name="winning_odds_away" class="form-control" placeholder="Enter the away odds">
                        </div>

                        <div class="form-group">
                            <h4><label for="id">Bet Created at</label></h4>
                            <div>
                                <input style="width: 40%" type="date" name="bet_created_at" class="form-control">
                            </div><br>

                            <button type="submit" class="btn btn-success">Add Bet</button>
                </form>
            </div>
        </div>
    </div>
@endsection