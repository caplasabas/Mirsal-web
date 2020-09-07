@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header text-uppercase text-info">
                {{ __('lang.delivery_requests') }} 

                </div>
                <div class="card-body bg-primary">
                    <div class="contatiner">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                <div class="card-header text-uppercase text-info">
                                    {{ __('lang.delivery_request_info') }} 
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-5 text-strong">
                                                    {{ __('lang.client') }} :
                                                </div>
                                                <div class="col-7">
                                                <strong>{{ $driverRequest->client->name}}</strong>  
                                                </div>
                                                <div class="col-5 text-strong">
                                                    {{ __('lang.type') }} :
                                                </div>
                                                <div class="col-7">
                                                <strong>{{ $driverRequest->type}}</strong>  
                                                </div>
                                                <div class="col-5 text-strong">
                                                    {{ __('lang.status') }} :
                                                </div>
                                                <div class="col-7">
                                                <strong>{{ $driverRequest->status}}</strong>  
                                                </div>
                                                <div class="col-5 text-strong">
                                                    {{ __('lang.animal') }} :
                                                </div>
                                                <div class="col-7">
                                                <strong>{{ $driverRequest->animal->name_ar}}</strong>  
                                                </div>
                                                <div class="col-5 text-strong">
                                                    {{ __('lang.size') }} :
                                                </div>
                                                <div class="col-7">
                                                <strong>{{ $driverRequest->size->name_ar}}</strong>  
                                                </div>
                                                <div class="col-5 text-strong">
                                                    {{ __('lang.quantity') }} :
                                                </div>
                                                <div class="col-7">
                                                <strong>{{ $driverRequest->quantity}}</strong>  
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class='row'>
                                                <div class="col-5 text-strong">
                                                    {{ __('lang.from') }} :
                                                </div>
                                                <div class="col-7">
                                                <strong>{{ $driverRequest->addressFrom->CompleteAddress}}</strong>  
                                                </div>
                                                <div class="col-5 text-strong">
                                                    {{ __('lang.to') }} :
                                                </div>
                                                <div class="col-7">
                                                <strong>{{ $driverRequest->addressTo->CompleteAddress}}</strong>  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                @if(isset($driverRequest->driverOfferAccepted))
                                <div class="card">
                                <div class="card-header text-uppercase text-info">
                                    {{ __('lang.delivery_accepted_offer') }} 
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-5 text-strong">
                                                    {{ __('lang.veterinarian') }} :
                                                </div>
                                                <div class="col-7">
                                                <strong>{{ $driverRequest->driverOfferAccepted->driver->name}}</strong>  
                                                </div>
                                                <div class="col-5 text-strong">
                                                    {{ __('lang.status') }} :
                                                </div>
                                                <div class="col-7">
                                                    <strong>{{ $driverRequest->driverOfferAccepted->status}}</strong>  
                                                </div>
                                                <div class="col-5 text-strong">
                                                    {{ __('lang.price') }} :
                                                </div>
                                                <div class="col-7">
                                                    <strong>SA {{ $driverRequest->driverOfferAccepted->price}}</strong>  
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-lg-6">

                                        </div>
                                    </div>
                                </div>
                                </div>
                                @endIf
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header text-uppercase text-info">
                                    {{ __('lang.delivery_offers') }} 

                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive text-black">
                                        <table class="datatable table">
                                            <thead class="thead-info">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">{{ __('lang.veterinary') }}</th>
                                                <th scope="col">{{ __('lang.status') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($driverRequest->driverOffers as $index => $driverOffer )
                                                <tr>
                                                <td>{{ $index }}</td>
                                                <td>{{ $driverOffer->driver->name}}</td>
                                                <td>{{ $driverOffer->status}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(isset($driverRequest->driverOfferAccepted))
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
                                                <td>{{ $driverRequest->driverOfferAccepted->price}}</td>
                                                </tr>
                                                <tr>
                                                <td>{{ __('lang.tax') }} </td>
                                                <td>{{ $driverRequest->driverOfferAccepted->tax_price}}</td>
                                                </tr>
                                                <tr>
                                                <td><strong>{{ __('lang.total') }} </strong></td>
                                                <td><strong>{{ $driverRequest->driverOfferAccepted->total}}</strong></td>
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
