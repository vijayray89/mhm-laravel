@extends('layout')
@section('content')
        <!-- @php
            echo "<pre>";
            var_dump($doctorList);
        @endphp -->
        <table class="table table-responsive" id="doctor">
            <thead>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Degree</th>
                <th>City</th>
                <th>Location</th>
                <th>Specialization</th>
                <th>Rate</th>
                <th>Center Fees</th>
                <th>MHM Fees</th>
                <th>Plan Code</th>
                <th>Address</th>
                <th>Experience</th>
                <th>Slot timing</th>
                <th>Registered On</th>
                <th>status</th>
                <th>Is Active</th>
            </thead>
            <tbody>
        @foreach($doctorList as $list)
                <tr>
                    <td>{{$list->doc_name}}</td>
                    <td>{{$list->doc_email}}</td>
                    <td>{{$list->doc_contact}}</td>
                    <td>{{$list->doc_degree}}</td>
                    <td>{{$list->doc_city}}</td>
                    <td>{{$list->doc_location}}</td>
                    <td>{{$list->doc_specialization}}</td>
                    <td>{{$list->rack_rate}}</td>
                    <td>{{$list->center_fees}}</td>
                    <td>{{$list->mhm_fees}}</td>
                    <td>{{$list->plan_code}}</td>
                    <td>{{$list->doc_address}}</td>
                    <td>{{$list->doc_experience}}</td>
                    <td>{{$list->doc_slot_timing}}</td>
                    <td>{{$list->registered_on}}</td>
                    <td>{{$list->status}}</td>
                    <td>{{$list->is_active}}</td>
                </tr>
        @endforeach
        </tbody>
        </table>
<script>
    $(document).ready(function(){
     var table = $('#doctor').DataTable( {
                dom: 'Bfrtip',
                "info": false,
                buttons: [
                    {
                        extend: 'csv',
                        className: 'btn btn-primary btn-xs',
                    }, 
                    {
                        extend: 'excel',
                        className: 'btn btn-primary btn-xs',
                    }, 
                    {
                        extend: 'pdf',
                        title: 'Monthly Report',
                        className: 'btn btn-primary btn-xs',
                        // exportOptions: {
                        //         columns: [ 0, 1, 2, 3, 4, 5 ]
                        //     }
                    },
                     {
                        extend: 'print',
                        title: 'Monthly Report',
                        className: 'btn btn-primary btn-xs',
                        // exportOptions: {
                        //         columns: [ 0, 1, 2, 3, 4, 5 ]
                        //     }
                     }
                   
                ]
                } );
            });
</script>
@endsection