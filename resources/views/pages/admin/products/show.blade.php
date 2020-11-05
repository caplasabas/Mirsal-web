@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header text-uppercase text-info">
                <div class="row">
                    <div class="col-lg-6">{{ __('lang.product') }} </div>
                    
                    <div class="col-lg-6 text-left"> 

                    <button type="button" class="btn btn-warning btn-sm waves-effect waves-light m-1" data-toggle="modal" data-target="#edit-product">{{ __('lang.edit') }}</button>
                    @if($data['product']->is_vip && $data['product']->vip_status == "PENDING")
                    <button type="button" class="btn btn-success btn-sm waves-effect waves-light m-1" data-toggle="modal" data-target="#accept-product">{{ __('lang.accept') }}</button>
                    @endif
                    </div>
                </div>
                
                </div>
                <div class="card-body bg-primary">
                    <div class="contatiner">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="card">
                                <div class="card-header text-uppercase text-info">
                                    {{ __('lang.image') }} 
                                </div>
                                <div class="card-body img-centered">
                                    @if(isset($data['product']->image_uri))
                                        <div class="row">
                                            <div class="col-lg-12">
                                                    <img class="img-thumbnail" src="{{ $data['product']->image_uri}}" alt="Default" height="200px" width="230px">
                                            </div>
                                        </div>
                                        @else
                                        <div class="row">
                                            <div class="col-lg-12 text-center">
                                                {{ __('lang.nothing_found') }} 
                                            </div>

                                        </div>
                                        @endif
                                </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="card">
                                <div class="card-header text-uppercase text-info">
                                    {{ __('lang.product_info') }} 
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-4 text-strong">
                                                    {{ __('lang.title') }} :
                                                </div>
                                                <div class="col-8">
                                                <strong>{{ $data['product']->title}}</strong>  
                                                </div>
                                                <div class="col-4 text-strong">
                                                    {{ __('lang.type') }} :
                                                </div>
                                                <div class="col-8">
                                                <strong>{{ $data['product']->type}}</strong>  
                                                </div>
                                                <div class="col-4 text-strong">
                                                    {{ __('lang.status') }} :
                                                </div>
                                                <div class="col-8">
                                                <strong>{{ $data['product']->status}}</strong>  
                                                </div>
                                                <div class="col-4 text-strong">
                                                    {{ __('lang.seller') }} :
                                                </div>
                                                <div class="col-8">
                                                <strong>{{ $data['product']->seller->name}}</strong>  
                                                </div>
                                                
                                                <div class="col-4 text-strong">
                                                    {{ __('lang.is_vip') }} :
                                                </div>
                                                <div class="col-8">
                                                <strong>@if($data['product']->is_vip) {{ __('lang.yes') }} @else {{ __('lang.no') }} @endif</strong>  
                                                </div>
                                                @if($data['product']->is_vip)
                                                <div class="col-4 text-strong">
                                                    {{ __('lang.vip_status') }} :
                                                </div>
                                                <div class="col-8">
                                                <strong>{{ $data['product']->vip_status }}</strong>  
                                                </div>
                                                @endif
                                                <div class="col-4 text-strong">
                                                    {{ __('lang.age') }} :
                                                </div>
                                                <div class="col-8">
                                                <strong>{{ $data['product']->duration->name}}</strong>  
                                                </div>

                                                
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                </div>
                            </div>   
                            <div class="col-lg-4">
                                <div class="card">
                                <div class="card-header text-uppercase text-info">
                                    {{ __('lang.contact_info') }} 
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-5 text-strong">
                                                    {{ __('lang.seller') }} :
                                                </div>
                                                <div class="col-7">
                                                <strong>{{ $data['product']->seller->name}}</strong>  
                                                </div>
                                    
                                                <div class="col-5 text-strong">
                                                    {{ __('lang.contact_phone') }} :
                                                </div>
                                                <div class="col-7">
                                                <strong>{{ $data['product']->contact_phone}}</strong>  
                                                </div>
                                                <div class="col-5 text-strong">
                                                    {{ __('lang.contact_email') }} :
                                                </div>
                                                <div class="col-7">
                                                <strong>{{ $data['product']->contact_email}}</strong>  
                                                </div>
                                                <div class="col-5 text-strong">
                                                    {{ __('lang.iban') }} :
                                                </div>
                                                <div class="col-7">
                                                <strong>{{ $data['product']->iban}}</strong>  
                                                </div>

                                            </div>
                                        </div>


                                    </div>
                                </div>
                                </div>
                            </div>          
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header text-uppercase text-info">
                                    {{ __('lang.client_offers') }} 

                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive text-black">
                                        <table class="datatable table">
                                            <thead class="thead-info">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">{{ __('lang.client') }}</th>
                                                <th scope="col">{{ __('lang.status') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($data['product']->clientOffers as $index => $clientOffer )
                                                <tr>
                                                <td>{{ $index }}</td>
                                                <td>{{ $clientOffer->buyer->name}}</td>
                                                <td>{{ $clientOffer->status}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(isset($data['product']->clientOfferAccepted))
                        <div class="row">
                            <div class="col-6">
                            </div>
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-header text-uppercase text-info">
                                    {{ __('lang.payment_details') }} 

                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive text-black">
                                        <table class="table">
                                            <tbody>

                                                <tr>
                                                <td>{{ __('lang.price') }} </td>
                                                <td>{{ $data['product']->clientOfferAccepted->price}}</td>
                                                </tr>
                                                <tr>
                                                <td>{{ __('lang.tax') }} </td>
                                                <td>{{ $data['product']->clientOfferAccepted->tax_price}}</td>
                                                </tr>
                                                <tr>
                                                <td><strong>{{ __('lang.total') }} </strong></td>
                                                <td><strong>{{ $data['product']->clientOfferAccepted->total}}</strong></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endIf
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


<div class="modal fade" id="edit-product" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
    <div class="modal-content border-warning">
        <form action="{{ route('admins.products.update', $data['product']->id ) }}" method="POST" enctype="multipart/form-data" >
        {{ method_field('PUT') }}
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <div class="modal-header bg-warning">
        <h5 class="modal-title text-white">{{ __('lang.edit_client') }}</h5>

        </div>
        <div class="modal-body">

            <div class="form-group">
                <label for="input-1">{{ __('lang.type') }}</label>
                <select class="form-control" name="type" id="input-1">
                    <option value="CONSULTATION" @if ($data['product']->type == "CONSULTATION") selected @endif >{{ __('lang.consultation') }}</option>
                    <option value="VISIT" @if ($data['product']->type == "VISIT") selected @endif >{{ __('lang.visit') }}</option>
                </select>
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

@if($data['product']->status == "PENDING")
  
<div class="modal fade" id="accept-product" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
    <div class="modal-content border-success">
        <form action="{{ route('admins.products.accept', $data['product']->id) }}" method="POST" enctype="multipart/form-data" >
            {{ method_field('PUT') }}
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <div class="modal-header bg-success text-white">
            {{ $data['product']->title }}
            </div>
            <div class="modal-body">
            <div class="form-group">
            {{ __('lang.accept_product_text') }}
            </div>
            </div>
            <div class="modal-footer ">
            <button type="button" class="btn btn-inverse-success" data-dismiss="modal"><i class="fa fa-times"></i> {{ __('lang.close') }}</button>
            <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> {{ __('lang.save') }} </button>
            </div>
        </form>
    </div>
    </div>
</div>

@endif