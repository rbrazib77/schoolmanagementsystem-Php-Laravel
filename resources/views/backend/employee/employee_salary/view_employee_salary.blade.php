
@extends('admin.adminmaster')
@section('admin_content')
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Employee Salary List</h3>
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
                            <td>{{ date('d-m-Y',strtotime($item->join_date))}}</td>
                            <td>{{ $item->salary}}</td>
                            <td>
                                <a title="Increment" href="{{route('employee.salary.increment',$item->id)}}" class="btn btn-info"><i class="fa fa-plus circle"></i></a>
                                <a title="Details" target="_blank" href="{{route('employee.salary.delatils',$item->id)}}" class="btn btn-danger"><i class="fa fa-eye"></i></a>
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


