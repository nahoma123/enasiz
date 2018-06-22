@extends('layouts.app')

@section('content')
    <div class="panel panel-default" style="border:2px solid balck; margin-left:20%;margin-right:20%; width:60%;">
        <div class="panel-heading">
            <h3 class="panel-title"><h4><b>League selection Form</b></h4></h3>
        </div>
        <div class="form-group">
            <div class="form-group">

                <div class="form-group">
                    <h4><label style="margin-left: 15px" for="homeTeam">League</label></h4>
                    {{--home team = league--}}
                    <select style="margin-left: 15px; width: 30%" id="selectOpt2" class="cup form-control" name="league">
                        @foreach($leagues as $league)
                            <option value="{{$league->id}}" selected="true">{{$league->league_name}}</option>
                        @endforeach
                    </select>
                </div>
                <a href=""><button class="btn btn-primary" style="float:right; margin-top: -6%; margin-right: 55%">Add bet</button></a>

            </div>
            <script type="text/javascript">
                $(document).ready(function () {
                    $("select.cup").change(function () {
                        var selectedId = $(".cup option:selected").val();
                        $('a').attr('href', '/addLeagueBet/' + selectedId);
                    });
                });
            </script>
@endsection