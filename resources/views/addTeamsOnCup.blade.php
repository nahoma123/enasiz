@extends('layouts.app')

@section('content')
    <div class="panel panel-default" style="border:2px solid; margin-left:30%;margin-right:20%; width:50%;">
        <div class="panel-heading">
            <h3 class="panel-title"><h4><b>Add Team Form</b></h4></h3>
        </div>
        <div class="panel-body">
            <div style="border-radius:4px;background-color: #eeeeee;border:1px solid darkgrey; margin-left:2%;margin-right:2%; width:96%;" >
                <form class="form" style="padding: 10px;" enctype="multipart/form-data" method="post" action="">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <h4><label for="id">Cup</label></h4>

                        <div>
                            <select id="selectOpt1" style="width: 30%" class="cup form-control competition_type" name="cup">
                                @foreach($cups as $cup)
                                    <option selected="none" value="{{$cup->id}}">{{$cup->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <h4><label for="id">Team</label></h4>
                            <div>
                                <select id="selectOpt1" style="width: 30%" class="form-control competition_type" name="team">
                                    @foreach($teams as $team)
                                        <option value="{{$team->id}}">{{$team->team_name}}</option>
                                    @endforeach
                                </select>
                            </div><br>
                            <button type="submit" class="btn btn-success">Add Team</button>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $("select.cup").change(function () {
                var selectedId = $(".cup option:selected").val();
                $('form').attr('action', '/addTeamOnCups/' + selectedId);
            });
        });
    </script>
@endsection