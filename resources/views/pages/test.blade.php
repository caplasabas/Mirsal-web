
@extends('layouts.admin')



@section('content')
<form action="http://127.0.0.1:8000/returnUrl?payment_reference=<?php echo $id ?>&user=<?php echo $user ?>&offer=<?php echo $offer ?>&paymentTo=<?php echo $paymentTo ?>&clientRequest=<?php echo $clientRequest ?>&type=<?php echo $type ?>" class="paymentWidgets" data-brands="VISA MASTER MADA"></form>
@endsection

@push('head')

<script src="https://test.oppwa.com/v1/paymentWidgets.js?checkoutId={{$data['response']['id']}}"></script>

@endpush

