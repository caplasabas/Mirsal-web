@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header text-uppercase text-info">
                <div class="row">
                    <div class="col-lg-6">{{ __('lang.veterinary_requests') }} </div>
                    
                    <div class="col-lg-6 text-left"> 

                    <button type="button" class="btn btn-warning btn-sm waves-effect waves-light m-1" data-toggle="modal" data-target="#edit-vet-request">{{ __('lang.edit') }}</button>

                    <button type="button" class="btn btn-danger btn-sm waves-effect waves-light m-1" data-toggle="modal" data-target="#cancel-order">{{ __('lang.cancel') }}</button>

                    <button type="button" class="btn btn-success btn-sm waves-effect waves-light m-1" data-toggle="modal" data-target="#assign-order">{{ __('lang.assign') }}</button>
                    </div>
                </div>
                
                </div>
                <div class="card-body bg-primary">
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
                                                <div class="col-5 text-strong">
                                                    {{ __('lang.client') }} :
                                                </div>
                                                <div class="col-7">
                                                <strong>{{ $data['vetRequest']->client->name}}</strong>  
                                                </div>
                                                <div class="col-5 text-strong">
                                                    {{ __('lang.type') }} :
                                                </div>
                                                <div class="col-7">
                                                <strong>{{ $data['vetRequest']->type}}</strong>  
                                                </div>
                                                <!-- <div class="col-5 text-strong">
                                                    {{ __('lang.status') }} :
                                                </div>
                                                <div class="col-7">
                                                <strong>{{ $data['vetRequest']->status}}</strong>  
                                                </div> -->
                                                <div class="col-5 text-strong">
                                                    {{ __('lang.animal') }} :
                                                </div>
                                                <div class="col-7">
                                                <strong>{{ $data['vetRequest']->animal->name_ar}}</strong>  
                                                </div>
                                                <div class="col-5 text-strong">
                                                    {{ __('lang.size') }} :
                                                </div>
                                                <div class="col-7">
                                                <strong>{{ $data['vetRequest']->size->name_ar}}</strong>  
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class='row'>
                                                <div class="col-5 text-strong">
                                                    {{ __('lang.prefered_date') }} :
                                                </div>
                                                <div class="col-7">
                                                <strong>{{ $data['vetRequest']->prefered_date}}</strong>  
                                                </div>
                                                <div class="col-5 text-strong">
                                                    {{ __('lang.prefered_time') }} :
                                                </div>
                                                <div class="col-7">
                                                <strong>{{ $data['vetRequest']->prefered_time}}</strong>  
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
                                        {{ __('lang.veterinary_accepted_offer') }} 
                                    </div>
                                    @if(isset($data['vetRequest']->vetOfferAccepted))
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-5 text-strong">
                                                        {{ __('lang.veterinarian') }} :
                                                    </div>
                                                    <div class="col-7">
                                                    <strong>{{ $data['vetRequest']->vetOfferAccepted->veterinarian->name}}</strong>  
                                                    </div>
                                                    <div class="col-5 text-strong">
                                                        {{ __('lang.status') }} :
                                                    </div>
                                                    <div class="col-7">
                                                        <strong>{{ $data['vetRequest']->vetOfferAccepted->status}}</strong>  
                                                    </div>
                                                    <div class="col-5 text-strong">
                                                        {{ __('lang.price') }} :
                                                    </div>
                                                    <div class="col-7">
                                                        <strong>SA {{ $data['vetRequest']->vetOfferAccepted->price}}</strong>  
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-lg-6">

                                            </div>
                                        </div>
                                    </div>
                                    @endIf
                                </div>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header text-uppercase text-info">
                                    {{ __('lang.veterinary_offers') }} 

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
                                            @foreach($data['vetRequest']->vetOffers as $index => $vetOffer )
                                                <tr>
                                                <td>{{ $index }}</td>
                                                <td>{{ $vetOffer->veterinarian->name}}</td>
                                                <td>{{ $vetOffer->status}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(isset($data['vetRequest']->vetOfferAccepted))
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
                                                <td>{{ $data['vetRequest']->vetOfferAccepted->price}}</td>
                                                </tr>
                                                <tr>
                                                <td>{{ __('lang.tax') }} </td>
                                                <td>{{ $data['vetRequest']->vetOfferAccepted->tax_price}}</td>
                                                </tr>
                                                <tr>
                                                <td><strong>{{ __('lang.total') }} </strong></td>
                                                <td><strong>{{ $data['vetRequest']->vetOfferAccepted->total}}</strong></td>
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


<div class="modal fade" id="edit-vet-request" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
    <div class="modal-content border-warning">
        <form action="{{ route('admins.vet-requests.update', $data['vetRequest']->id ) }}" method="POST" enctype="multipart/form-data" >
        {{ method_field('PUT') }}
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <div class="modal-header bg-warning">
        <h5 class="modal-title text-white">{{ __('lang.edit_veterinarian') }}</h5>

        </div>
        <div class="modal-body">

            <div class="form-group">
                <label for="input-1">{{ __('lang.type') }}</label>
                <select class="form-control" name="type" id="input-1">
                    <option value="CONSULTATION" @if ($data['vetRequest']->type == "CONSULTATION") selected @endif >{{ __('lang.consultation') }}</option>
                    <option value="VISIT" @if ($data['vetRequest']->type == "VISIT") selected @endif >{{ __('lang.visit') }}</option>
                </select>
            </div>

            <!-- <div class="form-group">
                <label for="input-1">{{ __('lang.status') }}</label>
                <select class="form-control" name="status" id="input-1">
                    <option value="PENDING" @if ($data['vetRequest']->status == "PENDING") selected @endif >{{ __('lang.pending') }}</option>
                    <option value="SKIPPED" @if ($data['vetRequest']->status == "SKIPPED") selected @endif >{{ __('lang.skipped') }}</option>
                    <option value="ACCEPTED" @if ($data['vetRequest']->status == "ACCEPTED") selected @endif >{{ __('lang.accepted') }}</option>
                    <option value="COMPLETED" @if ($data['vetRequest']->status == "COMPLETED") selected @endif >{{ __('lang.completed') }}</option>
                </select>
            </div> -->
            <div class="form-group">
                <label for="input-1">{{ __('lang.size') }}</label>
                <select class="form-control" name="animal_id" id="input-1">
                @foreach($data['animals'] as $index => $animal )
                    <option value="{{ $animal->id }}" @if ($animal->id == $data['vetRequest']->animal->id) selected @endif >{{ $animal->name_ar }}</option>
                @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="input-1">{{ __('lang.size') }}</label>
                <select class="form-control" name="size_id" id="input-1">
                @foreach($data['sizes'] as $index => $size )
                    <option value="{{ $size->id }}" @if ($size->id == $data['vetRequest']->size->id) selected @endif >{{ $size->name_ar }}</option>
                @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="input-add-5">{{ __('lang.date') }}</label>
                <input type="date"  class="form-control">
            </div>

            <div class="form-group">
                <label for="input-add-5">{{ __('lang.time') }}</label>
                <select class="form-control" name="size_id" id="input-1">
                @foreach($data['timeslots'] as $index => $timeslot )
                    <option value="{{ $timeslot->name_ar  }}" @if ($timeslot->name_ar == $data['vetRequest']->prefered_time) selected @endif >{{ $timeslot->name_ar }}</option>
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