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
                            <td>{{ $driverOffer->driverRequest['client']['name']}}</td>
                            
                            <td> <button class="btn btn-danger  m-1" data-toggle="modal" data-target="#delete-driver-{{ $driverOffer->id }}">{{ __('lang.delete') }}</button></td>
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

@foreach($data['driverOffers'] as $index => $driverOffer )
<div class="modal fade" id="delete-driver-{{ $driverOffer->id }}" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
    <div class="modal-content border-danger">
        <form action="{{ route('admins.driver-offers.destroy', $driverOffer->id) }}" method="POST" enctype="multipart/form-data" >
            {{ method_field('DELETE') }}
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <div class="modal-header bg-danger text-white">

            {{ __('lang.driver_offers') }} : {{ $driverOffer->driver->name }}
            </div>
            <div class="modal-body">
            <div class="form-group">
            {{ __('lang.delete_driver_offer_text') }}
            </div>
            </div>
            <div class="modal-footer ">
            <button type="button" class="btn btn-inverse-danger" data-dismiss="modal"><i class="fa fa-times"></i> {{ __('lang.close') }}</button>
            <button type="submit" class="btn btn-danger"><i class="fa fa-check-square-o"></i> {{ __('lang.delete') }} </button>
            </div>
        </form>
    </div>
    </div>
</div>
@endforeach
@endsection
