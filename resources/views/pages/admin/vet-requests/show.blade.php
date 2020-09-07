@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header text-uppercase text-info">
                {{ __('lang.veterinary_requests') }} 

                </div>
                <div class="card-body">
                    <div class="contatiner">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                <div class="card-header text-uppercase text-info">
                                    {{ __('lang.veterinary_request_info') }} 
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-4 text-strong">
                                                    {{ __('lang.client') }} :
                                                </div>
                                                <div class="col-8">
                                                <strong>{{ $vetReques->client->name}}</strong>  
                                                </div>
                                                <div class="col-4 text-strong">
                                                    {{ __('lang.type') }} :
                                                </div>
                                                <div class="col-8">
                                                <strong>{{ $vetReques->type}}</strong>  
                                                </div>
                                                <div class="col-4 text-strong">
                                                    {{ __('lang.status') }} :
                                                </div>
                                                <div class="col-8">
                                                <strong>{{ $vetReques->status}}</strong>  
                                                </div>
                                                <div class="col-4 text-strong">
                                                    {{ __('lang.animal') }} :
                                                </div>
                                                <div class="col-8">
                                                <strong>{{ $vetReques->animal->name_ar}}</strong>  
                                                </div>
                                                <div class="col-4 text-strong">
                                                    {{ __('lang.size') }} :
                                                </div>
                                                <div class="col-8">
                                                <strong>{{ $vetReques->size->name_ar}}</strong>  
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class='row'>
                                                <div class="col-4 text-strong">
                                                    {{ __('lang.prefered_date') }} :
                                                </div>
                                                <div class="col-8">
                                                <strong>{{ $vetReques->prefered_date}}</strong>  
                                                </div>
                                                <div class="col-4 text-strong">
                                                    {{ __('lang.prefered_time') }} :
                                                </div>
                                                <div class="col-8">
                                                <strong>{{ $vetReques->prefered_time}}</strong>  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                <div class="card-header text-uppercase text-info">
                                    {{ __('lang.veterinary_request_info') }} 
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-4 text-strong">
                                                    {{ __('lang.client') }} :
                                                </div>
                                                <div class="col-8">
                                                <strong>{{ $vetReques->client->name}}</strong>  
                                                </div>
                                                <div class="col-4 text-strong">
                                                    {{ __('lang.type') }} :
                                                </div>
                                                <div class="col-8">
                                                <strong>{{ $vetReques->type}}</strong>  
                                                </div>
                                                <div class="col-4 text-strong">
                                                    {{ __('lang.status') }} :
                                                </div>
                                                <div class="col-8">
                                                <strong>{{ $vetReques->status}}</strong>  
                                                </div>
                                                <div class="col-4 text-strong">
                                                    {{ __('lang.animal') }} :
                                                </div>
                                                <div class="col-8">
                                                <strong>{{ $vetReques->animal->name_ar}}</strong>  
                                                </div>
                                                <div class="col-4 text-strong">
                                                    {{ __('lang.size') }} :
                                                </div>
                                                <div class="col-8">
                                                <strong>{{ $vetReques->size->name_ar}}</strong>  
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class='row'>
                                                <div class="col-4 text-strong">
                                                    {{ __('lang.prefered_date') }} :
                                                </div>
                                                <div class="col-8">
                                                <strong>{{ $vetReques->prefered_date}}</strong>  
                                                </div>
                                                <div class="col-4 text-strong">
                                                    {{ __('lang.prefered_time') }} :
                                                </div>
                                                <div class="col-8">
                                                <strong>{{ $vetReques->prefered_time}}</strong>  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
