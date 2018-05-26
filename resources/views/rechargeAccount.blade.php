@extends('layouts.app')

@section('content')
    <div class="panel panel-default" style="border:2px solid; margin-left:30%;margin-right:20%; width:50%;">
        <div class="panel-heading">
            <h3 class="panel-title"><h4><b>Recharge a user account</b></h4></h3>
        </div>
        <div class="panel-body">
            <div style="border-radius:4px;background-color: #eeeeee;border:1px solid darkgrey; margin-left:2%;margin-right:2%; width:96%;" >
                <h4><label for="id">Search user</label></h4>
                <form class="form-inline" action="/search" style="padding-top: 4%"  >
                    {{csrf_field()}}
                    <div class="form-group">
                        <input width="100%" type="text" name="keyword" class="form-control" placeholder="search" required>
                        <input type="submit" value="GO" class="btn btn-primary">
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection