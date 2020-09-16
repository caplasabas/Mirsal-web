@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header text-uppercase text-info">
                {{ __('lang.clients') }} 
                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#create-client"><i aria-hidden="true" class="fa fa-plus"></i></button>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-black">
                    <table class="datatable table">
                        <thead class="thead-info">
                        <tr>
                            <th scope="col">#</th>
                            <!-- <th scope="col">{{ __('lang.terms_and_conditions') }} {{ __('lang.en') }}</th> -->
                            <th scope="col">{{ __('lang.name') }}</th>
                            <th scope="col">{{ __('lang.phone') }}</th>
                            <th scope="col">{{ __('lang.email') }}</th>
                            <th scope="col">{{ __('lang.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data['clients'] as $index => $client)
                            <tr>
                            <td>{{ $index }}</td>
                            <td>{{ $client->name}}</td>
                            <td>{{ $client->phone}}</td>
                            <td>{{ $client->email}}</td>
                            <td> 
                                <!-- <button class="btn btn-warning  m-1" data-toggle="modal" data-target="#edit-terms">{{ __('lang.edit') }}</button> -->
                                <button class="btn btn-warning  m-1" data-toggle="modal" data-target="#edit-client-{{ $client->id }}">{{ __('lang.edit') }}</button>
                            <button class="btn btn-danger  m-1" data-toggle="modal" data-target="#delete-client-{{ $client->id }}">{{ __('lang.delete') }}</button>
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


@foreach($data['clients'] as $index => $client)

<div class="modal fade" id="edit-client-{{ $client->id }}" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
    <div class="modal-content border-warning">
        <form action="{{ route('admins.clients.update', $client->id ) }}" method="POST" enctype="multipart/form-data" >
        {{ method_field('PUT') }}
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <div class="modal-header bg-warning">
        <h5 class="modal-title text-white">{{ __('lang.edit_client') }}</h5>

        </div>
        <div class="modal-body">
            
            <div class="form-group">
                <label for="input-add-1">{{ __('lang.name') }}</label>
                <input type="text" class="form-control" id="input-add-1" placeholder="Enter client Name " name="name" value="{{ $client->name}}">
            </div>
            <div class="form-group">
                <label for="input-add-4">{{ __('lang.phone') }}</label>
                <input type="text" class="form-control" id="input-add-4" placeholder="Enter client Phone " name="phone" value="{{ $client->phone}}">
                @if($errors->has('phone'))
                <label id="input-1-error" class="error" for="input-1">{{ $errors->first('phone') }}</label>
                @endIf
            </div>
            <div class="form-group">
                <label for="input-add-3">{{ __('lang.password') }}</label>
                <input type="password" class="form-control" id="input-add-3" placeholder="Enter client password " name="password" >
            </div>
            <div class="form-group">
                <label for="input-add-2">{{ __('lang.email') }}</label>
                <input type="text" class="form-control" id="input-add-2" placeholder="Enter client email " name="email" value="{{ $client->email}}">
                @if($errors->has('email'))
                <label id="input-1-error" class="error" for="input-1">{{ $errors->first('email') }}</label>
                @endIf
            </div>
            <div class="form-group">
                <label for="input-add-5">{{ __('lang.avatar') }}</label>
                <input type="file" class="form-control-file" id="input-add-5" placeholder="Enter client email " name="avatar" ></input>
                @if($errors->has('avatar'))
                <label id="input-5-error" class="error" for="input-5">{{ $errors->first('avatar') }}</label>
                @endIf
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

<div class="modal fade" id="delete-client-{{ $client->id }}" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
    <div class="modal-content border-danger">
        <form action="{{ route('admins.clients.destroy', $client->id) }}" method="POST" enctype="multipart/form-data" >
            {{ method_field('DELETE') }}
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <div class="modal-header bg-danger text-white">

            {{ $client->name }}
            </div>
            <div class="modal-body">
            <div class="form-group">
            {{ __('lang.delete_client_text') }}
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

<div class="modal fade" id="create-client" aria-hidden="true" style="display: none;" >
    <div class="modal-dialog">
    <div class="modal-content border-success">
        <form action="{{ route('admins.clients.store') }}" method="POST" enctype="multipart/form-data" >
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <div class="modal-header bg-success">
        <h5 class="modal-title text-white">{{ __('lang.create_client') }}</h5>

        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="input-add-1">{{ __('lang.name') }}</label>
                <input type="text" class="form-control" id="input-add-1" placeholder="{{ __('lang.input_name') }}" name="name" >
            </div>
            <div class="form-group">
                <label for="input-add-2">{{ __('lang.phone') }}</label>
                <input type="text" class="form-control" id="input-add-2" placeholder="{{ __('lang.input_phone') }}" name="phone" >
                @if($errors->has('phone'))
                <label id="input-2-error" class="error" for="input-2">{{ $errors->first('phone') }}</label>
                @endIf
            </div>
            <div class="form-group">
                <label for="input-add-3">{{ __('lang.password') }}</label>
                <input type="password" class="form-control" id="input-add-3" name="password" >
            </div>
            <div class="form-group">
                <label for="input-add-4">{{ __('lang.email') }}</label>
                <input type="text" class="form-control" id="input-add-4" placeholder="{{ __('lang.input_email') }}" name="email">
                @if($errors->has('email'))
                <label id="input-4-error" class="error" for="input-4">{{ $errors->first('email') }}</label>
                @endIf
            </div>
            <div class="form-group">
                <label for="input-add-5">{{ __('lang.avatar') }}</label>
                <input type="file" class="form-control-file" id="input-add-5"  name="avatar" ></input>
                @if($errors->has('avatar'))
                <label id="input-5-error" class="error" for="input-5">{{ $errors->first('avatar') }}</label>
                @endIf
            </div>

        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-inverse-success" data-dismiss="modal"><i class="fa fa-times"></i> {{ __('lang.close') }}</button>
        <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> {{ __('lang.save') }} </button>
        </div>
        </form>
    </div>
    </div>
</div>