@extends('admin.adminmaster')
@section('admin_content')
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Employee Leave</h3>
                <a style="float: right;" class="btn btn-primary" href="{{route('employee.leave.add')}}">Add Employee Leave</a>
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
                        <th>Id No</th>
                        <th>Purpose</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th width="20%">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($allData as $item)
                        <tr>
                            <td>{{$loop->index +1}}</td>

                            <td>{{Str::of( $item->user->name)->title()}}</td>
                            <td>{{$item->user->id_no}}</td>
                            <td>{{$item->purpose->name}}</td>
                            <td>{{$item->start_date}}</td>
                            <td>{{$item->end_date}}</td>
                            <td>
                                <a class="btn btn-info"  href="{{route('designation.edit',$item->id)}}">Edit</a>
                                <a class="btn btn-danger" id="delete" href="{{route('designation.delete',$item->id)}}">Delete</a>
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

