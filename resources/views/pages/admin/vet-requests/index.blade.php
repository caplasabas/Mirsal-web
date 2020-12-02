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
                    <div class="table-responsive text-black">
                    <table data-order='[[ 0, "desc" ]]' class="datatable table">
                        <thead class="thead-info">
                        <tr>
                            <th scope="col">#</th>
                            <!-- <th scope="col">{{ __('lang.terms_and_conditions') }} {{ __('lang.en') }}</th> -->
                            <th scope="col">{{ __('lang.type') }}</th>
                            <th scope="col">{{ __('lang.client') }}</th>
                            <th scope="col">{{ __('lang.animal') }}</th>
                            <th scope="col">{{ __('lang.description') }}</th>
                            <th scope="col">{{ __('lang.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data['vetRequests'] as $index => $vetRequest)
                            <tr>
                            <td>{{ $vetRequest->id }}</td>
                            <td>{{ \App::getLocale() === "ar" ? $vetRequest->type_ar : $vetRequest->type }}</td>
                            <td>{{ $vetRequest->client->name }}</td>
                            <td>{{ $vetRequest->animal->name }}</td>
                            <td>{{ $vetRequest->description }}</td>
                            <td> 
                            <a class="btn btn-info" href="{{ route('admins.vet-requests.show', $vetRequest->id ) }}" >{{ __('lang.view') }}</a>
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
