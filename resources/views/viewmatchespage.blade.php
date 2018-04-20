@extends('layouts.app')

@section('content')
    <div class="panel panel-default" style="border:2px solid balck; margin-left:20%;margin-right:20%; width:60%;">
        <div class="panel-heading">
            <h3 class="panel-title"><h4><b>Matches list</b></h4></h3>
        </div>
        <div class="panel-body">
            <div style="border-radius:4px;background-color: #eeeeee;border:1px solid darkgrey; margin-left:2%;margin-right:2%; width:96%;" >
                <div class="container">
                    <div class="row">


                        <div class="col-md-7">
                            
                            <div class="table-responsive">


                                <table id="mytable" class="table table-bordred table-striped">

                                    <thead>
                                    <th>League</th>
                                    <th>Match</th>
                                    <th>Time</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    </thead>
                                    <tbody>

                                @foreach($matches as $match)
                                    <tr>
                                        <td>{{ $match->competition->league_name }}</td>
                                        <td>{{ $match->hometeam[0]->team_name }} Vs {{ $match->awayteam[0]->team_name }}</td>
                                        <td>{{ $match->start_time }}</td>
                                        <td><p data-placement="top" title="Edit"><button value="{{$match->id}}" class="btn btn-primary btn-xs" data-title="Edit" name="edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                        <td><p data-placement="top" title="Delete"><a href="/deleteMatch/{{$match->id}}"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></a></p></td>
                                    </tr>
                                @endforeach
                                    <script type="text/javascript">
                                        $(function(){
                                            $("button[name=edit]").each(function(){
                                                $(this).click( function(){
                                                    matchID = $(this).attr("data-question-id")
                                                    answer = $("#answer" + questionID).val()
                                                    console.log($(this).val() == answer)
                                                    if ($(this).val() == answer) {
                                                        // $("button[name=choiceBut]").css({ "backgroundColor": 'white' })
                                                        $(this).css({ "backgroundColor": 'lightgreen' });
                                                    }else if ($(this).val() != answer) {
                                                        // $("button[name=choiceBut]").css({ "backgroundColor": 'white' })
                                                        $(this).css({ "backgroundColor": 'indianred' });
                                                    }


                                                })

                                            })
                                        })
                                    </script>

                                    </tbody>

                                </table>

                                <div class="clearfix"></div>
                                <ul class="pagination pull-right">
                                    <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    
                                    <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
                                </ul>

                            </div>

                        </div>
                    </div>
                </div>


                <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                <h4 class="modal-title custom_align" id="Heading">Edit Match</h4>
                            </div>

                            <form class="form" style="padding: 10px;" method="post" action="updateMatch/{{$match->id}}">
                                <script>

                                </script>
                                <h3></h3>
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <h4><label for="id">Competition Type</label></h4>

                                    <div>
                                        <select id="selectOpt1" style="width: 30%" class="form-control competition_type" name="competition">
                                            @foreach($competitions as $competition)
                                                <option value="{{$competition->competition_name}}">{{$competition->competition_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <h4><label for="id">Competition Name</label></h4>
                                        <div>
                                            <select id="selectOpt2" style="width: 40%" class="competition_name form-control" name="competition_name">

                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <h4><label for="homeTeam">Home Team</label></h4>
                                            <select id="selectOpt2" style="width: 70%" class="home_team form-control" name="home_team">
                                                <option value="0" disabled="true" selected="true">Home Team</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <h4><label for="awayTeam">Away Team</label></h4>
                                            <select id="selectOpt2" style="width: 70%" class="away_team form-control" name="away_team">
                                                <option value="0" disabled="true" selected="true">Away Team</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <h4><label for="startTime">Start Time</label></h4>
                                            <input type="datetime-local" class="form-control" id="StartTime" name="start_time">
                                        </div>
                                        <div class="form-group">
                                            <h4><label for="endTime">End Time</label></h4>
                                            <input type="datetime-local" class="form-control" id="EndTime" name="end_time">
                                        </div>
                                        <div class="form-group">
                                            <h4><label for="venue">Venue</label></h4>
                                            <input type="text" name="venue" class="form-control" id="exampleInputEmail2" placeholder="Enter the name of the Venue">
                                        </div>
                                        <button type="submit" class="btn btn-default">Submit</button>
                            </form>

                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>



                <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
                            </div>
                            <div class="modal-body">

                                <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>

                            </div>
                            <div class="modal-footer ">
                                <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span>Yes</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>

            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {

            $(document).on('change', '.competition_type', function () {
                //console.log("Ow working");

                var comp_id = $(this).val();
                var div = $(this).parent().parent();
                //console.log(comp_id);
                var op = "";
                if (comp_id == 'League'){
                    $.ajax({
                        type:'get',
                        url:'{!!URL::to('findLeagueToDropdown')!!}',
                        data:{'id':comp_id},
                        success:function (data) {
                            for(var i = 0; i < data.length; i++){
                                op += '<option value="'+data[i].id+'">'+data[i].league_name+'</option>';
                                console.log(op);
                                //op1 += '<option name="competition_id" hidden value="'+data[i].id+'">'+data[i].league_name+'</option>';
                            }
                            div.find('.competition_name').html(" ");
                            div.find('.competition_name').append(op);
                        },
                        error:function () {
                        }
                    });
                }
                else if (comp_id == 'Cup'){
                    $.ajax({
                        type:'get',
                        url:'{!!URL::to('findCupToDropdown')!!}',
                        data:{'id':comp_id},
                        success:function (data) {
                            //console.log(data.length);
                            //op += '<option value="0" selected disabled>choose here</option>';
                            for(var i = 0; i < data.length; i++){
                                op += '<option name="competition_name" value="'+data[i].id+'">'+data[i].name+'</option>';
                            }
                            div.find('.competition_name').html(" ");
                            div.find('.competition_name').append(op);
                        },
                        error:function () {
                        }
                    });
                }
            });
            $(document).on('change', '.competition_name', function (){
                var comp_id = $(this).val();
                var div = $(this).parent().parent();
                //console.log(cat_id);
                var op = " ";
                $.ajax({
                    type:'get',
                    url:'{!!URL::to('findLeagueTeamToDropdown')!!}',
                    data:{'id':comp_id},
                    success:function (data) {
                        for(var i = 0; i < data.length; i++){
                            op += '<option name="home_team" value="'+data[i].id+'">'+data[i].team_name+'</option>';
                        }
                        div.find('.home_team').html(" ");
                        div.find('.home_team').append(op);
                    },
                    error:function () {

                    }

                });

            });
            $(document).on('change', '.competition_name', function (){
                var comp_id = $(this).val();
                var div = $(this).parent().parent();
                //console.log(cat_id);
                var op = " ";
                $.ajax({
                    type:'get',
                    url:'{!!URL::to('findLeagueTeamToDropdown')!!}',
                    data:{'id':comp_id},
                    success:function (data) {
                        for(var i = 0; i < data.length; i++){
                            op += '<option name="away_team" value="'+data[i].id+'">'+data[i].team_name+'</option>';
                        }
                        div.find('.away_team').html(" ");
                        div.find('.away_team').append(op);
                    },
                    error:function () {

                    }

                });

            });
        });
    </script>

@endsection