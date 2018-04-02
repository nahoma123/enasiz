@extends('layouts.app')

@section('content')
<div class="panel panel-default" style="border:2px solid balck; margin-left:20%;margin-right:20%; width:60%;">
  <div class="panel-heading">
    <h3 class="panel-title"><h4><b>Match Entry Form</b></h4></h3>
  </div>
  <div class="panel-body">
    <div style="border-radius:4px;background-color: #eeeeee;border:1px solid darkgrey; margin-left:2%;margin-right:2%; width:96%;" >
	<form class="form" style="padding: 10px;">
	  <div class="form-group">
	    <h4><label for="id">Competition Type</label></h4>

		  <div>
			  <select onchange="jsFunction()" id="selectOpt1" style="width: 20%" class="form-control" name="competition_type">
				  <option name="xxid" value="1">League</option>
				  <option name="xxid" value="2">Cup</option>
			  </select>
		  </div>

	    {{--<div class="dropdown">--}}
		  {{--<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">--}}
		    {{--Type--}}
		    {{--<span class="caret"></span>--}}
		  {{--</button>--}}
		  {{--<ul class="dropdown-menu" aria-labelledby="dropdownMenu">--}}
		    {{--<li><a href="#">Cup</a></li>--}}
		    {{--<li><a href="#">League</a></li>--}}
		    {{--<li><a href="#">International</a></li>--}}
		  {{--</ul>--}}
		{{--</div>--}}
		<div class="form-group">
	    <h4><label for="id">Competition Name</label></h4>
			<div>
				<select id="selectOpt2" style="width: 20%" class="form-control" name="competition_type">
					<option name="xxid" value="1">Het 1</option>
					<option name="xxid" value="2">gfgdf 2</option>
				</select>
			</div>
			<script>
				function jsFunction() {
					var list1 = document.getElementById("selectOpt1");
					var myselect = list1.options[list1.selectedIndex].value;
					var list2 = document.getElementById("selectOpt2");
					for (i = 0; i < list2.options.length; i++){
					    list2.options[i] = null;
					}
					if(myselect === "1"){
					    var opt = document.createElement('option');
					    opt.value = "1";
					    opt.innerHTML = "FIRST";
					    list2.appendChild(opt);
					}
					else{
                        var opt = document.createElement('option');
                        opt.value = "2";
                        opt.innerHTML = "SECOND";
                        list2.appendChild(opt);
					}
                }
			</script>
	    {{--<div class="dropdown">--}}
		  {{--<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">--}}
		    {{--Name--}}
		    {{--<span class="caret"></span>--}}
		  {{--</button>--}}
		  {{--<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">--}}
		    {{--<li><a href="#">ፐሪሚየር ሊግ</a></li>--}}
		    {{--<li><a href="#">ከፍተኗ ሊግ</a></li>--}}
		    {{--<li><a href="#">ብሄራዊ ሊግ</a></li>--}}
		    {{--<li><a href="#">ዲቪዢን ሊግ</a></li>--}}
		  {{--</ul>--}}
		  {{----}}
		{{--</div>--}}
	  <div class="form-group">
	    <h4><label for="homeTeam">Home Team</label></h4>
	    <input type="email" class="form-control" id="HomeTeam" placeholder="Enter the name of the Home team">
	  </div>
	  <div class="form-group">
	    <h4><label for="awayTeam">Away Team</label></h4>
	    <input type="email" class="form-control" id="AwayTeam" placeholder="Enter the name of the Away team">
	  </div>
	  <div class="form-group">
	    <h4><label for="startTime">Start Time</label></h4>
	    <input type="datetime-local" class="form-control" id="StartTime">
	  </div>
	  <div class="form-group">
	    <h4><label for="endTime">End Time</label></h4>
	    <input type="datetime-local" class="form-control" id="EndTime">
	  </div>
	  <div class="form-group">
	    <h4><label for="venue">Venue</label></h4>
	    <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Enter the name of the Venue">
	  </div>
	  <button type="submit" class="btn btn-default">Submit</button>
	</form>
	</div>
  </div>
</div>

@endsection