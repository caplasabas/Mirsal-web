@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header text-uppercase text-info">
                {{ __('lang.veterinarians') }} 

                </div>
                <div class="card-body">
                    <div class="table-responsive text-black">
                    <table class="datatable table">
                        <thead class="thead-info">
                        <tr>
                            <th scope="col">#</th>
                            <!-- <th scope="col">{{ __('lang.terms_and_conditions') }} {{ __('lang.en') }}</th> -->
                            <th scope="col">{{ __('lang.name') }}</th>
                            <th scope="col">{{ __('lang.email') }}</th>
                            <th scope="col">{{ __('lang.status') }}</th>
                            <th scope="col">{{ __('lang.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data['veterinarians'] as $index => $veterinarian)
                            <tr>
                            <td>{{ $index }}</td>
                            <td>{{ $veterinarian->name}}</td>
                            <td>{{ $veterinarian->email}}</td>
                            <td>{{ $veterinarian->vet_status}}</td>
                            <td> 
                                <!-- <button class="btn btn-warning  m-1" data-toggle="modal" data-target="#accept-vet-{{ $veterinarian->id }}">{{ __('lang.edit') }}</button> -->
                            <button class="btn btn-success  m-1" data-toggle="modal" data-target="#accept-vet-{{ $veterinarian->id }}">{{ __('lang.accept') }}</button>
                            </td>
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


@foreach($data['veterinarians'] as $index => $veterinarian)

<div class="modal fade" id="accept-vet-{{ $veterinarian->id }}" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
    <div class="modal-content border-success">
        <form action="{{ route('admins.veterinarians.accept', $veterinarian->id) }}" method="POST" enctype="multipart/form-data" >
            {{ method_field('PUT') }}
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <div class="modal-header bg-success text-white">

            {{ $veterinarian->name }}
            </div>
            <div class="modal-body">
            <div class="form-group">
            {{ __('lang.accept_vet_text') }}
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

@endforeach
