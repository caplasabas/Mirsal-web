@extends('layouts.admin')

@section('css')
@endsection

@section('content')
<div class="container-fluid"  style="text-align:right; direction: rtl;">
<div class="row">
<div class="col-3">
<div class="card">
    <div class="card-header text-uppercase text-info">
    {{ __('lang.general_settings') }} 
    <button class="btn btn-warning waves-effect btn-sm waves-light m-1 text-white" data-toggle="modal" data-target="#edit-general-setting">
    {{ __('lang.edit') }}
    </button>

    </div>
    <div class="card-body">
        <div class="row">
        <div class="col-12 text-center">
        </div>
        <div class="col-12">
            <strong> {{ __('lang.tax_perc') }} </strong> : <span>{{ $admin_setting->tax_perc}} </span>
        </div>
        <div class="col-12">
            <strong> {{ __('lang.first_payment') }} </strong> : <span>{{ $admin_setting->first_payment_perc}} </span>
        </div>
        <div class="col-12">
            <strong> {{ __('lang.admin_commission') }} </strong> : <span>{{ $admin_setting->admin_commission_perc}} </span>
        </div>
        </div>
    </div>
</div>

</div>
</div>

</div>


<div class="modal fade" id="edit-general-setting" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
    <div class="modal-content border-warning">
        <form action="{{ route('admins.admin-settings.update', $admin_setting->id ) }}" method="POST"  >
        {{ method_field('PUT') }}
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <div class="modal-header bg-warning">
        <h5 class="modal-title text-white">{{ __('lang.general_settings') }}</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="input-add-1">{{ __('lang.tax_perc') }} </label>
                <input type="number" class="form-control" id="input-add-1"  name="tax_perc" value="{{ $admin_setting->tax_perc}}">
            </div>
        </div>

        <div class="modal-body">
            <div class="form-group">
                <label for="input-add-1">{{ __('lang.first_payment') }} </label>
                <input type="number"  class="form-control" id="input-add-1"  name="first_payment_perc" value="{{ $admin_setting->first_payment_perc}}">
            </div>
        </div>

        <div class="modal-body">
            <div class="form-group">
                <label for="input-add-1">{{ __('lang.admin_commission') }} </label>
                <input type="number"  class="form-control" id="input-add-1"  name="admin_commission_perc" value="{{ $admin_setting->admin_commission_perc}}">
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-inverse-warning" data-dismiss="modal"><i class="fa fa-times"></i> {{ __('lang.close') }}</button>
        <button type="submit" class="btn btn-warning"><i class="fa fa-check-square-o"></i> {{ __('lang.save') }} </button>
        </div>
        </form>
    </div>
    </div>
</div>



@endsection

@section('script')

@endsection


