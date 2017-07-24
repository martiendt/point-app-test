@extends('core::app.layout') 

@section('content')
<div id="page-content">
    <ul class="breadcrumb breadcrumb-top">
        @include('bumi-shares::app/facility/bumi-shares/_breadcrumb')
        <li><a href="{{ url('facility/bumi-shares/owner-group') }}">Group</a></li>
        <li><a href="{{ url('facility/bumi-shares/owner-group/'.$owner_group->id) }}">{{ $owner_group->name }}</a></li>
        <li>Edit</li>
    </ul>

    <h2 class="sub-header">Group</h2>
    @include('bumi-shares::app.facility.bumi-shares.owner-group._menu')
    @include('core::app.error._alert')

    <div class="panel panel-default"> 
        <div class="panel-body">
            <form action="{{url('facility/bumi-shares/owner-group/'.$owner_group->id)}}" method="post" class="form-horizontal form-bordered">
                {!! csrf_field() !!}
                <input name="_method" type="hidden" value="PUT">
                
                <div class="form-group">
                    <label class="col-md-3 control-label">Name *</label>
                    <div class="col-md-6">
                        <input type="text" name="name" value="{{$owner_group->name}}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Notes</label>
                    <div class="col-md-6">
                        <input type="text" name="notes" class="form-control" value="{{$owner_group->notes}}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                        <button type="submit" class="btn btn-effect-ripple btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>  
</div>
@stop
