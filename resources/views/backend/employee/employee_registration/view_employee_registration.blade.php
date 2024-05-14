
@extends('admin.adminmaster')
@section('admin_content')
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Employee List</h3>
                <a style="float: right;" class="btn btn-primary" href="{{route('employee.registration.add')}}">Add Employee</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="table-responsive">
                  <table
                    id="example1"
                    class="table table-bordered table-striped">
                    <thead class="thead-light">
                      <tr>
                        <th width="5%">SL No</th>
                        <th>Name</th>
                        <th>ID No</th>
                        <th>Mobile</th>
                        <th>Gender</th>
                        <th>Joining Date</th>
                        <th>Salary</th>
                        @if(Auth::user()->role=="Admin")
                        <th>Code</th>
                        @endif
                        <th width="20%">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($allEmployee as $item)
                        <tr>
                            <td>{{$loop->index +1}}</td>
                            <td>{{ $item->name}}</td>
                            <td>{{ $item->id_no}}</td>
                            <td>{{ $item->mobile}}</td>
                            <td>{{ $item->gender}}</td>
                            <td>{{ $item->join_date}}</td>
                            <td>{{ $item->salary}}</td>
                            @if(Auth::user()->role=="Admin")
                            <td>{{$item->code}}</td>
                            @endif
                            <td>
                                <a href="{{route('employee.registration.edit',$item->id)}}" class="btn btn-info btn-sm">Edit</a>
                                <a  href="{{route('employee.registration.delatils',$item->id)}}" class="btn btn-danger btn-sm">Delatils</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                  </table>
                </div>
              </div>
              <!-- /.box-body -->
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
@endsection

