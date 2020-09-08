@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header text-uppercase text-info">
                {{ __('lang.products') }} 

                </div>
                <div class="card-body">
                    <div class="table-responsive text-black">
                    <table class="datatable table">
                        <thead class="thead-info">
                        <tr>
                            <th scope="col">#</th>
                            <!-- <th scope="col">{{ __('lang.terms_and_conditions') }} {{ __('lang.en') }}</th> -->
                            <th scope="col">{{ __('lang.description') }}</th>
                            <th scope="col">{{ __('lang.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data['products'] as $index => $product)
                            <tr>
                            <td>{{ $index }}</td>
                            <td>{{ $product->description}}</td>
                            <td> 
                            <a class="btn btn-info" href="{{ route('admins.vet-requests.show', $product->id ) }}" >{{ __('lang.view') }}</a>
                            <button class="btn btn-warning  m-1" data-toggle="modal" data-target="#edit-terms">{{ __('lang.edit') }}</button>
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
