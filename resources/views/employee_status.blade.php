@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <script type="text/javascript">
            $(document).ready(function () {

                $('.star').on('click', function () {
                    $(this).toggleClass('star-checked');
                });

                $('.ckbox label').on('click', function () {
                    $(this).parents('tr').toggleClass('selected');
                });

                $('.btn-filter').on('click', function () {
                    var $target = $(this).data('target');
                    if ($target != 'all') {
                        $('.table tr').css('display', 'none');
                        $('.table tr[data-status="' + $target + '"]').fadeIn('slow');
                    } else {
                        $('.table tr').css('display', 'none').fadeIn('slow');
                    }
                });

            });
        </script>

        <section class="content">
            <h1>Employee Status</h1>
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-success btn-filter" data-target="employed">Active</button>
                                <button type="button" class="btn btn-warning btn-filter" data-target="unemployed">Deactivated</button>
                                <!--								<button type="button" class="btn btn-danger btn-filter" data-target="cancelado">Cancelado</button>-->
                                <button type="button" class="btn btn-default btn-filter" data-target="all">All</button>
                            </div>
                        </div>
                        <div class="table-container">
                            <table class="table table-filter">
                                <tbody>
                                    @foreach($employed as $emp)
                                    <tr data-status="employed">
                                        <td class="text-info">
                                            @if($emp->privilage_level==1)
                                            Clerk
                                            @elseif($emp->privilage_level==2)
                                            Admin
                                            @elseif($emp->privilage_level==3)
                                            SupAdmin
                                            @endif
                                        </td>
                                        <td>

                                        </td>
                                        <td>
                                            <div class="media">

                                                <div class="media-body">
                                                    <span class="media-meta pull-right">Hired on: {{date('d-m-Y',strtotime($emp->created_at))}}</span>

                                                    <h4 class="title">
                                                        {{$emp->name}}  
                                                        <span class="pull-right pagado">(Active/Working)</span>
                                                    </h4>
                                                    <p class="summary">{{$emp->email}}</p>
                                                </div>
                                                <a href="/user/deactivate/{{$emp->id}}" style="padding-right: 9px" class="pull-right btn-danger">Deactivate</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                <br/> 

                                @foreach($unemployed as $emp)
                                <tr data-status="unemployed">
                                    <td class="text-info">

                                        @if($emp->privilage_level==1)
                                        Clerk
                                        @elseif($emp->privilage_level==2)
                                        Admin
                                        @elseif($emp->privilage_level==3)
                                        SupAdmin
                                        @endif
                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <div class="media">

                                            <div class="media-body">
                                                <span class="media-meta pull-right">Hired on: {{date('d-m-Y',strtotime($emp->created_at))}}</span>
                                                <br/><span class="media-meta pull-right">Deactivated on: {{date('d-m-Y',strtotime($emp->updated_at))}}</span>
                                                <h4 class="title">
                                                    {{$emp->name}}  
                                                    <span class="pull-right cancelado">(Deactivated)</span>
                                                </h4>
                                                <p class="summary">{{$emp->email}}</p>
                                            </div>
                                            <a href="/user/activate/{{$emp->id}}" style="padding-right: 9px" class="pull-right btn-success">Activate</a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </div>
</div>
@endsection
