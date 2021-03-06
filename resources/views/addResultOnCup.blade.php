@extends('layouts.app')

@section('content')
    <div class="panel panel-default" style="border:2px solid; margin-left:30%;margin-right:20%; width:50%;">
        <div class="panel-heading">
            <h3 class="panel-title"><h4><b>Add Result on cup</b></h4></h3>
        </div>
        <div class="panel-body">
            <div style="border-radius:4px;background-color: #eeeeee;border:1px solid darkgrey; margin-left:2%;margin-right:2%; width:96%;" >
                <form class="form" style="padding: 10px;" method="post" action="/addResultOnACup/{{$cup_id}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <h4><label for="id">Winner</label></h4>

                        <div>
                            <select id="selectOpt2" style="width: 70%" class="league form-control" name="winner">
                                @foreach($teams as $team)
                                    <option value="{{$team->id}}" selected="true">{{$team->team_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>

                        <button type="submit" class="btn btn-primary">Add Result</button>
                </form>
            </div>
        </div>
    </div>
@endsection