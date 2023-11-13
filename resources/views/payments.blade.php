@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>ESSP Payments</h1>
                </div>
                
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('layouts.messages')

        <div class="clearfix"></div>

        <div class="card">
          <div class="card card-bordered card-preview mt-4">
    <div class="card-inner">
        <table class="datatable-init-export nowrap table" data-export-title="Export">
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
                                class="tb-status  text-{{ $payment->approval_status != 1 ? 'warning' : 'success' }}">{{ $payment->approval_status == 0 ? 'Awaiting Approval' : 'Approved' }}</span>
                        </td>
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
        <!-- Display pagination links -->
{{ $payments->links() }}
    </div>
</div><!-- .card-preview -->

        </div>
    </div>
@endsection
