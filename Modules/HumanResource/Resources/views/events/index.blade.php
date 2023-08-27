@extends('layouts.app')

@section('content')
   {{--  <h1>Events</h1> --}}
   <button id="add-event-button" class="btn btn-primary" data-toggle="modal" data-target="#event-modal">Add Event</button>
   <div id="calendar"></div>

   <!-- Event Modal -->
   <div id="event-modal" class="modal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="false">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title">Event Details</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                <form id="event-form" method="POST">
                    @csrf
                    <input type="hidden" name="event_id" id="event_id">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="start">Start Date and Time</label>
                        <input type="datetime-local" class="form-control" id="start" name="start">
                    </div>
                    <div class="form-group">
                        <label for="end">End Date and Time</label>
                        <input type="datetime-local" class="form-control" id="end" name="end">
                    </div>
                    <div class="form-group">
                        <label for="departments">Departments</label>
                        <select multiple class="form-control" id="departments1" name="department_ids[]">
                           
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="rankings">Rankings</label>
                        <select multiple class="form-control" id="rankings1" name="ranking_ids[]">
                         
                        </select>
                    </div>                    
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
                
               </div>
           </div>
       </div>
   </div>

@endsection

{{-- @push('scripts')
    <script src="{{ asset('js/fullcalendar.bundle.js') }}"></script>
    <script src="{{ asset('js/events.js') }}"></script>
@endpush --}}
