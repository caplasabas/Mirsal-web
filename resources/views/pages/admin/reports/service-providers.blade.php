@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header text-uppercase text-info">
                {{ __('lang.service_providers') }} 

                </div>
                <div class="card-body">
                    <div class="table-responsive text-black">
                    <table class="datatable table">
                        <thead class="thead-info">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ __('lang.name') }}</th>
                            <th scope="col">{{ __('lang.role') }}</th>
                            <th scope="col">{{ __('lang.number_of_paid_service') }}</th>
                            <th scope="col">{{ __('lang.total_profit') }}</th>
                            <th scope="col">{{ __('lang.app_commission') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data['service_providers'] as $index => $service_provider)
                        @if($service_provider->role == "DRIVER" || ($service_provider->role == "VETERINARIAN" &&  $service_provider->vet_status == "ACCEPTED") )
                            <tr>
                            <td>{{$service_provider->id}}</td>
                            <td><a href="{{ route('admins.service-provider-report.show',$service_provider->id) }}">{{$service_provider->name}}</a></td>
                            @if($service_provider->role == "VETERINARIAN")
                            <td>{{ __('lang.veterinarian') }}</td>
                            @elseif($service_provider->role == "DRIVER")
                            <td>{{ __('lang.driver') }}</td>
                            @endif
                            <td>{{$service_provider->number_of_paid_services}}</td>
                            <td>{{$service_provider->getTotalProfit()}}</td>
                            <td>{{$service_provider->getTotalAppCommission()}}</td>
                            </tr>
                        @endif
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
