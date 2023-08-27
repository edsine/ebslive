<div class="card-body p-5">
    <div class="table-responsive">
        <table class="table" id="departments-table ">
            <thead>
            <tr>
                 <th> #</th>
                <th>Purpose of Travel</th>
                <th>Destination</th>
                <th>No. of Days</th>
                <th>Travel Date</th>
                <th>Arrival Date</th>
                <th>Estimated Expenses</th>
                <th>Comments</th>
				<th>Date Approved</th>
                 <th>Approval Status</th>
               </tr>
            </thead>
            <tbody>
			<?php $no =1; ?>
            @foreach($dtareviews as $dtareview)
                <tr>
				<th><?php echo $no++; ?></th>
                    <td>{{ $dtareview->purpose_travel }}</td>
                    <td>{{ $dtareview->destination }}</td>
                    <td>{{ $dtareview->number_days }}</td>
                    <td>{{ $dtareview->travel_date }}</td>
                    <td>{{ $dtareview->arrival_date }}</td>
                    <td>₦{{ $dtareview->estimated_expenses }}</td>
                    <td>{{ $dtareview->comments }}</td>
                    <td>{{ $dtareview->created_at}}</td>
                    <td><p> @if (isset($dtareview->review_status) && $dtareview->review_status == 1)
                        <span class="btn btn-sm btn-success">Approved</span>
                    @else
                        <span class="btn btn-sm btn-danger">Unapproved</span>
                    @endif
                        </p>
                        </td>


                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            {{-- @include('adminlte-templates::common.paginate', ['records' => $dtarequests]) --}}
        </div>
    </div>
</div>
