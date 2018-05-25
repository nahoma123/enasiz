@extends('layouts.app')

@section('content')
    <div class="panel panel-default" style="border:2px solid balck; margin-left:20%;margin-right:20%; width:60%;">
        <div class="panel-heading">
            <h3 class="panel-title"><h4><b>Match Entry Form</b></h4></h3>
        </div>
            <div class="form-group">
                <div class="form-group">

                    <div class="form-group">
                        <h4><label for="homeTeam">League</label></h4>
                        {{--home team = league--}}
                        <select id="selectOpt2" style="width: 70%" class="league form-control" name="league">
                            @foreach($leagues as $league)
                                <option value="{{$league->id}}" selected="true">{{$league->league_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="button" style="float:right; margin-top: -4%"><a href="">Add result</a></button>

    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $("select.league").change(function () {
                var selectedId = $(".league option:selected").val();
                $('a').attr('href', '/addResultOnALeague/' + selectedId);
            });
        });
    </script>
@endsection