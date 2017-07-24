@extends('core::app.layout') 
 
@section('content')
<div id="page-content">
    <ul class="breadcrumb breadcrumb-top">
        @include('bumi-shares::app/facility/bumi-shares/_breadcrumb')
        <li><a href="{{ url('facility/bumi-shares/broker') }}">Broker</a></li>
        <li>{{ $broker->name }}</li>
    </ul>

    <h2 class="sub-header">Broker</h2>
    @include('bumi-shares::app.facility.bumi-shares.broker._menu')

    <div class="block full">
        <!-- Block Tabs Title -->
        <div class="block-title">
            <ul class="nav nav-tabs" data-toggle="tabs">
                <li class="active"><a href="#block-tabs-home">Form</a></li>
                <li><a href="#block-tabs-history">History</a></li>
                <li><a href="#block-tabs-settings"><i class="gi gi-settings"></i></a></li>
            </ul>
        </div>
        <!-- END Block Tabs Title -->

        <!-- Tabs Content -->
        <div class="tab-content">
            <div class="tab-pane active" id="block-tabs-home">
                <div class="form-horizontal form-bordered">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Name</label>
                        <div class="col-md-6 content-show">{{$broker->name}}</div>
                    </div> 
                </div>
                <div class="form-horizontal form-bordered">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Notes</label>
                        <div class="col-md-6 content-show">{{$broker->notes}}</div>
                    </div> 
                </div>
                <div class="form-horizontal form-bordered">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Buy Fee</label>
                        <div class="col-md-6 content-show">{{number_format_quantity($broker->buy_fee, 3)}} %</div>
                    </div> 
                </div>
                <div class="form-horizontal form-bordered">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Sales Fee</label>
                        <div class="col-md-6 content-show">{{number_format_quantity($broker->sales_fee, 3)}} %</div>
                    </div> 
                </div>
            </div>
            <div class="tab-pane" id="block-tabs-history">
                <div class="table-responsive"> 
                    <table id="list-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>User</th>
                                <th>Key</th>
                                <th>Old Value</th>  
                                <th>New Value</th>  
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($histories as $history)
                            <tr id="{{$history->id}}"> 
                                <td>{{ date_format_view($history->created_at, true) }}</td>
                                <td>{{ $history->user->name }}</td>
                                <td>{{ $history->key }}</td>
                                <td>{{ $history->old_value }}</td>
                                <td>{{ $history->new_value }}</td>
                            </tr>
                            @endforeach
                        </tbody> 
                    </table>
                </div>   
            </div>
            <div class="tab-pane" id="block-tabs-settings">
                <a href="{{url('facility/bumi-shares/broker/'.$broker->id.'/edit')}}" class="btn btn-effect-ripple btn-info"><i class="fa fa-pencil"></i> Edit</a>
                <a href="javascript:void(0)" class="btn btn-effect-ripple btn-danger" onclick="secureDelete({{$broker->id}}, '{{url('facility/bumi-shares/broker/delete')}}', '/facility/bumi-shares/broker')"><i class="fa fa-times"></i> Delete</a>
            </div>
        </div>
        <!-- END Tabs Content -->
    </div> 
</div>
@stop
