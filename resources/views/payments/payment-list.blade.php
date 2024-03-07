@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h6 class="title">ECS Payment for {{ $employer->contact_firstname .' '.$employer->contact_surname ?? '' }} {{ '['.$employer->company_name.']' ?? '' }}</h6>

            </div>
            <div class="col-sm-6 " style="text-align: end"><a href="{{ route('employer.employees', [$employer->id]) }}" class="btn btn-primary"><em
                class="icon ni ni-sign-kobo"></em><span>Go To Employer Menu</span></a>
   
</div>
        </div>
    </div>
</section>

   
<div class="card card-bordered card-preview mt-4">
    @include('layouts.messages')
    <div class="card-inner">
    <div class="table-responsive">
        <table class="table align-middle gs-0 gy-4" id="employers-table">
            <thead>
                <tr>
                    <th>Payment Type</th>
                    <th>Invoice Number</th>
                    <th>Remita RR</th>
                    <th>Amount</th>
                    <th>Payment Status</th>
                    <th>Payment Date</th>
                    <th>Confirmation</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    <tr>
                        <td>{{ $payment->payment_type == 1 ? 'ECS Registration Fee' : ($payment->payment_type == 2 ? 'Certificate Request' : 'ECS Payment '.$payment->contribution_year . ($payment->contribution_period=='Monthly' ? ' ('.$payment->contribution_months.' months)' : '')) }}
                        </td>
                        <td>{{ $payment->invoice_number }}</td>
                        <td>{{ $payment->rrr }}</td>
                        <td>&#8358;{{ number_format($payment->amount, 2) }}</td>
                        <td><span
                                class="tb-status text-{{ $payment->payment_status != 1 ? 'warning' : 'success' }}">{{ $payment->payment_status != 1 ? 'PENDING' : 'PAID' }}</span>
                        </td>
                        <td>{{ $payment->paid_at }}</td>
                        <td><span
                                class="tb-status text-warning">{{ $payment->approval_status == 0 ? 'Awaiting Approval' : '' }}</span>
                        </td>
                       {{--  <td> --}}
                            {{-- @if ($payment->payment_status != 1)
                            <a href="" title="Verify Status"><span class="nk-menu-icon text-info"><em
                                class="icon ni ni-reload"></em></span></a>
                            @endif --}}
                           {{--  <a href="{{ route('payment.invoice', $payment->id) }}" target="_blank" title="Print"><span
                                    class="nk-menu-icon text-secondary"><em class="icon ni ni-printer"></em></span></a>
                            @if($payment->payment_status == 1)
                            <a href="{{ route('payment.invoice.download', $payment->id) }}" target="_blank" title="Download Receipt"><span
                                    class="nk-menu-icon text-secondary"><em class="icon ni ni-download text-teal"></em></span></a>
                            @endif --}}
                       {{--  </td> --}}
                       <td>
                        @if($payment->payment_status == 1)
                            <form action="{{ route('approvePayment', $payment->id) }}" method="post" id="approveForm{{$payment->id}}">
                                @csrf
                                @method('PATCH')
                                @if($payment->approval_status != 1)
                                <a href="#" title="Approve Payment" onclick="confirmApprove({{$payment->id}})">
                                    <span class="nk-menu-icon text-primary">Approve
                                </a>
                                @endif
                            </form>
                        @endif
                    </td>
                    
                    <script>
                        function confirmApprove(paymentId) {
                            var confirmation = window.confirm('Are you sure you want to approve this payment?');
                    
                            if (confirmation) {
                                // If the user clicks "OK" in the confirmation dialog, submit the form
                                document.getElementById('approveForm' + paymentId).submit();
                            } else {
                                // If the user clicks "Cancel" in the confirmation dialog, do nothing
                            }
                        }
                    </script>
                    
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $payments])
        </div>
    </div>

    </div>
</div><!-- .card-preview -->

@endsection