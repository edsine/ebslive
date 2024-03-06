@extends('layouts.app')

@section('content')
@if (DB::table('employees')->where('employer_id', $employer->id)->count() > 0)
<div class="card-title-group">
    <div class="card-title">
        <h6 class="title">ECS Payment for {{ $employer->contact_firstname .' '.$employer->contact_surname ?? '' }} {{ '['.$employer->company_name.']' ?? '' }}</h6>
    </div>
</div>
<div class="data">
    <div class="data-group">
        <div class="form-group w-100">
            @if (!$pending_payment || $paid_months != 0)
                {{-- <div class="form-group"> --}}
                <form method="POST" action="{{ route('essp.payment.remita') }}">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <label for="year">Payment year:</label>
                            <select name="year" id="year" class="form-select">
                                <option @selected(date('Y') == $start_year)>{{ $start_year }}
                                </option>
                                {{-- @if (date('Y') > $start_year)
                                    @for ($i = $start_year + 1; $i <= date('Y'); $i++)
                                        <option @selected(date('Y') == $i)>
                                            {{ $i }}</option>
                                    @endfor
                                @endif --}}
                            </select>

                            <label for="contribution_period">Contribution Period:</label>
                            <select name="contribution_period" id="contribution_period"
                                class="form-select">
                                @if ($paid_months == 0)
                                    <option>Annually</option>
                                @endif
                                <option>Monthly</option>
                            </select>

                            <div id="nom_div" class="d-none">
                                <label for="number_of_months">Number of months</label>
                                <select name="number_of_months" id="number_of_months"
                                    class="form-select">
                                    @for ($i = 1; $i <= 12-$paid_months; $i++)
                                        <option>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div><br/><br/>

                            <button type="submit" class="btn btn-primary btn-lg mt-2"><em
                                class="fa fa-credit-card me-2"></em> Generate Invoice (Remita
                            RR)</button>
                        </div>
                        <div class="col-6">
                            <label for="">Payment due is:</label><br />
                            <p>
                                <strong class="fs-3"
                                    id="contribution_amount">&#8358;{{ number_format($payment_due, 2) }}</strong>
                            </p>

                            <input type="hidden" name="payment_type" id="payment_type"
                                value="4">
                            <input type="hidden" name="employees" id="employees"
                                value="{{ $employees_count }}">
                            <input type="hidden" name="amount" id="amount"
                                value="{{ $payment_due }}">
                                <input type="hidden" name="employer_id" id="employer_id"
                                value="{{ $employer->id }}">
                                <input type="hidden" name="company_name" id="company_name"
                                value="{{ $employer->company_name }}">
                                <input type="hidden" name="company_email" id="company_email"
                                value="{{ $employer->company_email }}">
                                <input type="hidden" name="company_phone" id="company_phone"
                                value="{{ $employer->company_phone }}">
                                <input type="hidden" name="ecs_number" id="ecs_number"
                                value="{{ $employer->ecs_number }}">

                            <label for=""><b>Note: </b>Only one contribution type
                                can be
                                used for a selected year.</label>
                        </div>
                    </div>

                </form>
                {{--  </div> --}}
            @elseif($pending_payment->payment_status == 0)
                <div class="form-group mt-2">
                    <div class="row">
                        <div class="col-6 fw-bold">RRR:</div>
                        <div class="col-6">{{ $pending_payment->rrr }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 fw-bold">Invoice:</div>
                        <div class="col-6">{{ $pending_payment->invoice_number }}</div>
                    </div>
                    <div class="row">
                        <div class="col-6 fw-bold">Amount:</div>
                        <div class="col-6">
                            &#8358;{{ number_format($pending_payment->amount, 2) }}</div>
                    </div>
                    <div>
                        <form onsubmit="makePayment()" id="payment-form">
                            <input type="hidden" class="form-control" id="js-rrr"
                                name="rrr" value="{{ $pending_payment->rrr }}"
                                placeholder="Enter RRR" />
                            <button type="button" onclick="makePayment()"
                                class="btn btn-primary btn-lg mt-2"><em
                                    class="icon ni ni-send me-2"></em> Click to pay online
                                now!</button>
                        </form>
                    </div>
                </div>
            @else
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 my-2">
                            <p>
                                <label for="">Your ECS Payment for the year <span
                                        {{-- class="fw-bold">{{ date('Y', strtotime($pending_payment->paid_at)) }}</span> --}}
                                        class="fw-bold">{{ $pending_payment->contribution_year }}</span>
                                    of <span
                                        class="fw-bold">{{ $pending_payment->employees }}</span>
                                    Employees with the amount <span
                                        class="fw-bold">&#8358;{{ number_format(\Modules\EmployerManager\Models\Payment::where('payment_type', 4)
                                        ->whereRaw('contribution_year = ' . $pending_payment->contribution_year)
                                        ->sum('amount'), 2) }}</span>
                                    has been PAID!</label>
                            </p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@else
<div class="card-title-group">
    <div class="card-title">
        <h6 class="title">You have not added any employee for {{ $employer->contact_firstname .' '.$employer->contact_surname ?? '' }}</h6>
    </div>
</div>
@endif
<script type="text/javascript" src="https://remitademo.net/payment/v1/remita-pay-inline.bundle.js"></script>
<script>
    var cUrl = "{{ route('essp.payment.callback') }}?";
    var pubKey = "{{ env('REMITA_PUBLIC_KEY') }}";

    function makePayment() {
        var form = document.querySelector("#payment-form");
        var paymentEngine = RmPaymentEngine.init({
            key: pubKey,
            processRrr: true,
            transactionId: Math.floor(Math.random() * 1101233),
            // Replace with a reference you generated or remove the entire field for us to auto-generate a reference for you. Note that you will be able to check the status of this transaction using this transaction Id
            extendedData: {
                customFields: [{
                    name: "rrr",
                    value: form.querySelector('input[name="rrr"]').value
                }, {
                    name: "payment_type",
                    value: 4
                }]
            },
            onSuccess: function(response) {
                console.log('callback Successful Response', response);
                window.location.href = cUrl + 'ref=' + form.querySelector('input[name="rrr"]').value +
                    '&tid=' + response.transactionId;
            },
            onError: function(response) {
                console.log('callback Error Response', response);
            },
            onClose: function() {
                console.log("closed");
            }
        });
        paymentEngine.showPaymentWidget();
    }
    /* window.onload = function() {
        //setDemoData();
    }; */
</script>

<script>
    $(document).ready(function() {
        const annual_pay = {{ $payment_due }};
        const month_pay = annual_pay / 12;
        console.log(month_pay);
        $('#contribution_period, #number_of_months').change(function() {
            if ($('#contribution_period').val() == 'Monthly') {
                $('#nom_div').removeClass('d-none');
                //if its the last month
                //((100000 - ((100000/12).toFixed(2)*11)).toFixed(2) ++++ ((100000/12).toFixed(2)*11))
                //left of++++ is 12th month; right is sum of other months
                const current_due = (month_pay * $('#number_of_months').val()).toLocaleString(
                    undefined, {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    });
                $('#contribution_amount').html('&#8358;' + current_due);
                $('#amount').val(current_due.replace(',', ''));
            } else {
                $('#nom_div').addClass('d-none');
                $('#contribution_amount').html('&#8358;' + annual_pay.toLocaleString(
                    undefined, {
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    }));
                $('#amount').val(annual_pay);
            }
        });
        $('#contribution_period').trigger('change');
    });
</script>

@endsection