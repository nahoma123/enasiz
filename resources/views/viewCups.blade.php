@extends('layouts.app')

@section('content')
    <div class="panel panel-default" style="border:2px solid balck; margin-left:20%;margin-right:20%; width:60%;">
        <div class="panel-heading">
            <h3 class="panel-title"><h4><b>Cup selection Form</b></h4></h3>
        </div>
        <div class="form-group">
            <div class="form-group">

                <div class="form-group">
                    <h4><label for="homeTeam">Cup</label></h4>
                    {{--home team = league--}}
                    <select id="selectOpt2" style="width: 70%" class="cup form-control" name="cup">
                        @foreach($cups as $cup)
                            <option value="{{$cup->id}}" selected="true">{{$cup->name}}</option>
                        @endforeach
                    </select>
                </div>
                <a href=""><button class="btn btn-primary" style="float:right; margin-top: -4%">Add result</button></a>

            </div>
            <script type="text/javascript">
                $(document).ready(function () {
                    $("select.cup").change(function () {
                        var selectedId = $(".cup option:selected").val();
                        $('a').attr('href', '/addResultOnACup/' + selectedId);
                    });
                });
            </script>
@endsection