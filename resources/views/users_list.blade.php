@extends('layout')

@section('content')

    <div class="card">
            <div class="card-header">
                    @if(Session::has('message'))
                        <div class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</div>
                    @endif
            </div>
            <div class="card-body">

                    <table class="table table-bordered table-striped table-hover" id="userlist">
                        <thead>
                        <tr class="table-secondary">
                            <th>Id</th>
                            <th> Name</th>
                            <th> Email</th>
                            <th> Mobile</th>
                            <th>Email Code</th>
                            <th>status</th>
                            <th>access_all</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $u)
                            <tr>
                                <td>{{$u->admin_id}}</td>
                                <td>{{$u->admin_name}}</td>
                                <td>{{$u->admin_email}}</td>
                                <td>{{$u->admin_mobile}}</td>
                                <td>{{$u->email_code}}</td>
                                <td>{{$u->status}}</td>
                                @if($u->access_all=='1')
                                <td><span class="badge badge-pill badge-info">Full Access</span></td>
                                @else
                                <td><span class="badge badge-pill badge-info">Limited Access</span></td>
                                @endif

                                <td>
                                    <button type="button" value="{{$u->admin_id}}" class="btn btndelete"><i class="fas fa-trash" aria-hidden="true"></i></button>
                                    <button type="button" value="{{$u->admin_id}}" class="btn btnedit"><i class="fas fa-edit"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>


            <!-- Delete Modal -->
            <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
                    </div>
                        <form action="/delete" method="post">
                            @csrf
                            @method('DELETE')
                            <div class="modal-body">
                                Are you sure for delete.
                                <input type="hidden" name="deletid" id="deletid" />
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default btn-cancel" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger">Confirm</button>
                            </div>
                        </form>
                  </div>
                </div>
              </div>
              <!-- Delete modal End -->

              <!-- Edit modal  -->

               <!-- Delete Modal -->
            <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel">Update Information</h4>
                    </div>
                        <form method="post" id="frmedit">
                            @csrf
                            {{method_field('PUT')}}
                            <div class="modal-body">
                                <div class="container">
                        
                                    <div class="row justify-content-center">
                                       
                                            
                                            <div class="row align-items-center">
                                                <div class="col mt-4">
                                                    <input type="text" class="form-control" name="admin_name" id="admin_name" placeholder=" Name" required>
                                                    @if ($errors->has('admin_name'))
                                                        <span class="text-danger">{{ $errors->first('admin_name') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row align-items-center mt-4">
                                                <div class="col">
                                                    <input type="email" class="form-control" name="admin_email" id="admin_email" placeholder="Email" required>
                                                    @if ($errors->has('admin_email'))
                                                        <span class="text-danger">{{ $errors->first('admin_email') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row align-items-center mt-4">
                                                <div class="col">
                                                    <input type="number" class="form-control" name="admin_mobile" id="admin_mobile" placeholder="Mobile" required>
                                                    @if ($errors->has('admin_mobile'))
                                                        <span class="text-danger">{{ $errors->first('admin_mobile') }}</span>
                                                    @endif
                                                </div>
                                                <input type="hidden" name="userId" id="userId" />
                                                <!-- <div class="col">
                                                    <input type="password" class="form-control" name="admin_password" id="admin_password" placeholder="Password">
                                                    @if ($errors->has('admin_password'))
                                                        <span class="text-danger">{{ $errors->first('admin_password') }}</span>
                                                    @endif
                                                </div> -->
                                            </div>
                                          
                                      
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-cancel" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                  </div>
                </div>
              </div>
        </div>
        
    <script>
        
        $(document).ready( function () {


            $(document).on('click','.btndelete',function(){
                $user_id = $(this).val();
                $('#deletemodal').modal('show');
                $('#deletid').val($user_id);
            });



           var table = $('#userlist').DataTable( {
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
                        exportOptions: {
                                columns: [ 0, 1, 2, 3, 4, 5 ]
                            }
                    },
                     {
                        extend: 'print',
                        title: 'Monthly Report',
                        className: 'btn btn-primary btn-xs',
                        exportOptions: {
                                columns: [ 0, 1, 2, 3, 4, 5 ]
                            }
                     }
                   
                ]
                } );


                table.on('click','.btnedit',function () {
                   $trow = $(this).closest('tr');

                   if($($trow).hasClass('child'))
                   {
                        $trow = $trow.prev('.parent');
                   }
                        $data = table.row($trow).data();
                        console.log($data);
                        $('#admin_name').val($data['1']);
                        $('#admin_email').val($data['2']);
                        $('#admin_mobile').val($data['3']);
                        //$('#userId').val($data['0']);
                        $('#frmedit').attr('action','/update/'+$data['0']);

                        $('#editmodal').modal('show');
                });
            
        } );
    </script>
@endsection