@extends('layouts.admin')

@section('content')
<div class="container-fluid">
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
                            <th scope="col">{{ __('lang.buyer') }}</th>
                            <th scope="col">{{ __('lang.product') }}</th>
                            <th scope="col">{{ __('lang.price') }}</th>
                            <th scope="col">{{ __('lang.seller') }}</th>
                            <th scope="col">{{ __('lang.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data['clientOffers'] as $index => $clientOffer )
                            <tr>
                            <td>{{ $clientOffer->id }}</td>
                            <td>{{ $clientOffer->buyer->name}}</td>
                            <td>{{ $clientOffer->product->title}}</td>
                            <td>{{ $clientOffer->offered_price}}</td>
                            <td>{{ $clientOffer->product->seller->name}}</td>
                            <!-- <td> <button class="btn btn-warning  m-1" data-toggle="modal" data-target="#edit-terms">{{ __('lang.edit') }}</button></td> -->
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
