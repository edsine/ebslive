@extends('layouts.app')

@section('title', 'Death Claims')


@push('styles')
@endpush


@section('content')

    {{-- <div class="components-preview wide-md mx-auto"> --}}
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Death Claims</h3>
                <div class="nk-block-des text-soft">
                    <p>List of Death claims and compensations.</p>
                </div>
            </div><!-- .nk-block-head-content -->
            {{--  <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em
                            class="icon ni ni-more-v"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                            <li class="nk-block-tools-opt"><a href="{{ route('death.create') }}" class="btn btn-primary"><em
                                        class="icon ni ni-sign-kobo"></em><span>New Death
                                        Claim Request</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> --}}<!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="nk-block nk-block-lg">
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <table class="datatable-init-export nowrap table" data-export-title="Export">
                    <thead>
                        <tr>
                            <th>Employee Name</th>
                            <th>Gender</th>
                            <th>Claim Date</th>
                            <th>Approval Status</th>
                            {{-- <th>Manage</th> --}}
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($claims as $claim)
                            <tr>
                                <td>{{ $claim->employee->last_name }} {{ $claim->employee->first_name }}
                                    {{ $claim->employee->middle_name }}</td>
                                <td>{{ $claim->employee->gender }}</td>
                                <td>{{ date('M d, Y', strtotime($claim->created_at)) }}</td>
                                <td>
                                    <span
                                        class="tb-status text-{{ $claim->status == 0 ? 'warning' : 'success' }}">{{ $claim->status ? 'APPROVED' : 'PENDING' }}</span>
                                </td>
                                {{-- <td>
                                    @if (!$claim->request && $claim->status == 0)
                                        <a class="btn btn-primary"
                                            onclick="event.preventDefault();
                                        document.getElementById('process-claim-form').submit();">Initiate
                                            Processing</a>
                                        <form id="process-claim-form" action="/claim/death/{{ $claim->id }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="id" id="id" value="{{ $claim->id }}">
                                        </form>
                                    @endif
                                </td> --}}
                                <td>
                                    <a href="{{ route('death.claims.show', ['id' => $claim->id]) }}" class="text-dark"><i class="fa fa-eye"></i> View Details</a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div><!-- .card-preview -->
    </div> <!-- nk-block -->
    {{-- </div><!-- .components-preview --> --}}

@endsection

@push('scripts')
    <script src="./assets/js/libs/datatable-btns.js?ver=3.1.3"></script>
@endpush
