@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header text-uppercase text-info">
                
                <div class="row">
                    <div class="col-lg-6">{{ __('lang.delivery_requests') }}  </div>
                    
                    <div class="col-lg-6 text-left"> 

                    <button type="button" class="btn btn-warning btn-sm waves-effect waves-light m-1" data-toggle="modal" data-target="#edit-driver-request">{{ __('lang.edit') }}</button>

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
                                        @if(isset($data['driverRequest']->image_uri))
                                        <div class="row">
                                            <div class="col-lg-12">
                                                    <img class="img-thumbnail" src="{{ $data['driverRequest']->image_uri}}" alt="Default" height="200px" width="230px">
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
                            <div class="col-lg-4">
                                <div class="card">
                                <div class="card-header text-uppercase text-info">
                                    {{ __('lang.delivery_request_info') }} 
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-5 text-strong">
                                                    {{ __('lang.client') }} :
                                                </div>
                                                <div class="col-7">
                                                <strong>{{ $data['driverRequest']->client()->name}}</strong>  
                                                </div>
                                                <div class="col-5 text-strong">
                                                    {{ __('lang.type') }} :
                                                </div>
                                                <div class="col-7">
                                                <strong>{{ $data['driverRequest']->type}}</strong>  
                                                </div>
                                                <div class="col-5 text-strong">
                                                    {{ __('lang.status') }} :
                                                </div>
                                                <div class="col-7">
                                                <strong>{{ $data['driverRequest']->status}}</strong>  
                                                </div>
                                                <div class="col-5 text-strong">
                                                    {{ __('lang.animal') }} :
                                                </div>
                                                <div class="col-7">
                                                <strong>{{ $data['driverRequest']->animal->name_ar}}</strong>  
                                                </div>
                                                <div class="col-5 text-strong">
                                                    {{ __('lang.size') }} :
                                                </div>
                                                <div class="col-7">
                                                <strong>{{ $data['driverRequest']->size->name_ar}}</strong>  
                                                </div>
                                                <div class="col-5 text-strong">
                                                    {{ __('lang.quantity') }} :
                                                </div>
                                                <div class="col-7">
                                                <strong>{{ $data['driverRequest']->quantity}}</strong>  
                                                </div>
                                                <div class="col-5 text-strong">
                                                    {{ __('lang.from') }} :
                                                </div>
                                                <div class="col-7">
                                                <strong>{{ $data['driverRequest']->addressFrom->CompleteAddress}}</strong>  
                                                </div>
                                                <div class="col-5 text-strong">
                                                    {{ __('lang.to') }} :
                                                </div>
                                                <div class="col-7">
                                                <strong>{{ $data['driverRequest']->addressTo->CompleteAddress}}</strong>  
                                                </div>
                                                <div class="col-5 text-strong">
                                                    {{ __('lang.prefered_date') }} :
                                                </div>
                                                <div class="col-7">
                                                <strong>{{ $data['driverRequest']->prefered_date}}</strong>  
                                                </div>
                                                <div class="col-5 text-strong">
                                                    {{ __('lang.prefered_time') }} :
                                                </div>
                                                <div class="col-7">
                                                <strong>{{ $data['driverRequest']->prefered_time}}</strong>  
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                
                                <div class="card">
                                <div class="card-header text-uppercase text-info">
                                    {{ __('lang.delivery_accepted_offer') }} 
                                </div>
                                <div class="card-body">
                                    @if(isset($data['driverRequest']->acceptedDriverOffer))
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="row">
                                                <div class="col-5 text-strong">
                                                    {{ __('lang.driver') }} :
                                                </div>
                                                <div class="col-7">
                                                <strong>{{ $data['driverRequest']->acceptedDriverOffer->driver->name}}</strong>  
                                                </div>
                                                <div class="col-5 text-strong">
                                                    {{ __('lang.status') }} :
                                                </div>
                                                <div class="col-7">
                                                    <strong>{{ $data['driverRequest']->acceptedDriverOffer->status}}</strong>  
                                                </div>
                                                <div class="col-5 text-strong">
                                                    {{ __('lang.price') }} :
                                                </div>
                                                <div class="col-7">
                                                    <strong>SA {{ $data['driverRequest']->acceptedDriverOffer->price}}</strong>  
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-lg-6">

                                        </div>
                                    </div>
                                    @else

                                        <div class="row">
                                            <div class="col-12 text-center">
                                                {{ __('lang.nothing_found') }} 
                                            </div>
                                        </div>

                                    @endIf
                                </div>
                                </div>
                                
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
                                            @foreach($data['driverRequest']->driverOffers as $index => $driverOffer )
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
                        @if(isset($data['driverRequest']->driverOfferAccepted))
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
                                                <td>{{ $data['driverRequest']->driverOfferAccepted->price}}</td>
                                                </tr>
                                                <tr>
                                                <td>{{ __('lang.tax') }} </td>
                                                <td>{{ $data['driverRequest']->driverOfferAccepted->tax_price}}</td>
                                                </tr>
                                                <tr>
                                                <td><strong>{{ __('lang.total') }} </strong></td>
                                                <td><strong>{{ $data['driverRequest']->driverOfferAccepted->total}}</strong></td>
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

<div class="modal fade" id="edit-driver-request" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
    <div class="modal-content border-warning">
        <form action="{{ route('admins.driver-requests.update', $data['driverRequest']->id ) }}" method="POST" enctype="multipart/form-data" >
        {{ method_field('PUT') }}
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <div class="modal-header bg-warning">
        <h5 class="modal-title text-white">{{ __('lang.edit_driver') }}</h5>

        </div>
        <div class="modal-body">

            <div class="form-group">
                <label for="input-1">{{ __('lang.type') }}</label>
                <select class="form-control" name="type" id="input-1">
                    <option value="SHARE" @if ($data['driverRequest']->type == "SHARE") selected @endif >{{ __('lang.share') }}</option>
                    <option value="PRIVATE" @if ($data['driverRequest']->type == "PRIVATE") selected @endif >{{ __('lang.private') }}</option>
                </select>
            </div>

            <div class="form-group">
                <label for="input-1">{{ __('lang.animal') }}</label>
                <select class="form-control" name="animal_id" id="input-1">
                @foreach($data['animals'] as $index => $animal )
                    <option value="{{ $animal->id }}" @if ($animal->id == $data['driverRequest']->animal->id) selected @endif >{{ $animal->name_ar }}</option>
                @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="input-1">{{ __('lang.size') }}</label>
                <select class="form-control" name="size_id" id="input-1">
                @foreach($data['sizes'] as $index => $size )
                    <option value="{{ $size->id }}" @if ($size->id == $data['driverRequest']->size->id) selected @endif >{{ $size->name_ar }}</option>
                @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="input-add-2">{{ __('lang.quantity') }}</label>
                <input type="text" class="form-control" id="input-add-2" placeholder="Enter quantity" name="quantity" value="{{ $data['driverRequest']->quantity}}">
            </div>

            <div class="form-group">
                <label for="input-add-5">{{ __('lang.date') }}</label>
                <input type="date" class="form-control" name="prefered_date" value="{{$data['driverRequest']->prefered_date}}">
            </div>

            <div class="form-group">
                <label for="input-add-5">{{ __('lang.time') }}</label>
                <select class="form-control" name="prefered_time" id="input-1">
                @foreach($data['timeslots'] as $index => $timeslot )
                    <option value="{{ $timeslot->name_ar  }}" @if ($timeslot->name_ar == $data['driverRequest']->prefered_time) selected @endif >{{ $timeslot->name_ar }}</option>
                @endforeach
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
@endsection
