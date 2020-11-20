@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header text-uppercase text-info">
                {{ __('lang.driver_offers') }} 

                </div>
                <div class="card-body">
                    <div class="table-responsive text-black">
                    <table class="datatable table">
                        <thead class="thead-info">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ __('lang.driver') }}</th>
                            <th scope="col">{{ __('lang.price') }}</th>
                            <th scope="col">{{ __('lang.client') }}</th>
                            <th scope="col">{{ __('lang.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data['driverOffers'] as $index => $driverOffer )
                            <tr>
                            <td>{{ $driverOffer->id }}</td>
                            <td>{{ $driverOffer->driver->name}}</td>
                            <td>{{ $driverOffer->price}}</td>
                            <td>{{ $driverOffer->driverRequest->client->name}}</td>
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
