@extends('layouts.app')

@section('content')
    <div class="panel panel-default" style="border:2px solid balck; margin-left:20%;margin-right:20%; width:60%;">
        <div class="panel-heading">
            <h3 class="panel-title"><h4><b>Matches list</b></h4></h3>
        </div>
        <div class="container">
            <div class="row">


<<<<<<< HEAD
                <div class="col-md-7">
=======
                <div class="col-md-9">
>>>>>>> 299c5157c1631db250a3311a01b4e55a92e3230c
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
<<<<<<< HEAD
                                    <td><h6>{{$match->hometeam[0]->team_thumbnail}}</h6><img src="/storage/upload/team_thumbnail/Capture.JPG" style="width: 40px; height: 40px; border-radius: 50%;">{{ $match->hometeam[0]->team_name }} vs {{ $match->awayteam[0]->team_name }}</td>
                                    <td>{{ $match->start_time }}</td>
                                    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
                                    <td><button><a href="/addBetOnMatch/{{$match->id}}">Add bet</a></button></td>
=======
                                    <td>{{ $match->hometeam[0]->team_name }} vs {{ $match->awayteam[0]->team_name }}</td>
                                    <td>{{ $match->start_time }}</td>
                                    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
>>>>>>> 299c5157c1631db250a3311a01b4e55a92e3230c
                                </tr>
                            @endforeach
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
                        <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input class="form-control " type="text" placeholder="Mohsin">
                        </div>
                        <div class="form-group">

                            <input class="form-control " type="text" placeholder="Irshad">
                        </div>
                        <div class="form-group">
                            <textarea rows="2" class="form-control" placeholder="CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan"></textarea>


                        </div>
                    </div>
                    <div class="modal-footer ">
                        <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
                    </div>
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
<<<<<<< HEAD
                        <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
=======
                        <a href="deleteMatch/{{$match->id}}"><button  type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button></a>
                        
>>>>>>> 299c5157c1631db250a3311a01b4e55a92e3230c
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
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