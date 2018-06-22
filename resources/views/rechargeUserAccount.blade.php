@extends('layouts.app')

@section('content')
    <div class="panel panel-default" style="border:2px solid; margin-left:30%;margin-right:20%; width:50%;">
        <div class="panel-heading">
            <h3 class="panel-title"><h4><b>Recharge a user account</b></h4></h3>
        </div>
        <div class="panel-body">
            <div style="border-radius:4px;background-color: #eeeeee;border:1px solid darkgrey; margin-left:2%;margin-right:2%; width:96%;" >
                <h4><label for="id">Recharge user account for <span style="color: dodgerblue">{{$username[0]['name']}}</span></label></h4>

                <form class="form" style="padding: 10px;" enctype="multipart/form-data" method="post" action="{{$user_id}}">
                    {{ csrf_field() }}
                    <div class="form-group">

                        <div class="form-group">
                            <h4><label for="id">Amount</label></h4>
                            <div>
                                <input style="width: 40%" type="number" min="0" name="recharge_ammount" class="form-control" placeholder="Enter the name of the league" required>
                            </div><br>

                            <button type="submit" class="btn btn-primary">Recharge account</button>
                </form>
            </div>
        </div>
    </div>
@endsection