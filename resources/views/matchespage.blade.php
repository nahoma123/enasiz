@extends('layouts.app')

@section('content')
<div class="panel panel-default" style="border:2px solid balck; margin-left:20%;margin-right:20%; width:60%;">
  <div class="panel-heading">
    <h3 class="panel-title"><h4><b>Match Entry Form</b></h4></h3>
  </div>
  
   
	<form class="form" style="padding: 10px;" method="post" action="addMatch">
        {{ csrf_field() }}
	  <div class="form-group">
	    <h4><label for="id">Competition Type</label></h4>

		  <div>
			  <select id="selectOpt1" style="width: 30%" class="form-control competition_type" name="competition">
                  
                      <option value="League">League</option>
                      <option value="Cup">Cup</option>
                  
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
	    <input type="datetime-local" class="form-control" id="StartTime" name="start_time" required>
	  </div>
	  <div class="form-group">
	    <h4><label for="endTime">End Time</label></h4>
	    <input type="datetime-local" class="form-control" id="EndTime" name="end_time" required>
	  </div>
	  <div class="form-group">
	    <h4><label for="venue">Venue</label></h4>
	    <input type="text" name="venue" class="form-control" id="exampleInputEmail2" placeholder="Enter the name of the Venue" required>
	  </div>
	  <button type="submit" class="btn btn-default">Submit</button>
	</form>
	
  
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