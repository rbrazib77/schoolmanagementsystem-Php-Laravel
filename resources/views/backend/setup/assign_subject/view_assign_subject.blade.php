@extends('admin.adminmaster')
@section('admin_content')
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Assign Subject List</h3>
                <a style="float: right;" class="btn btn-primary" href="{{route('assign.subject.add')}}">Add Assign Subject</a>
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
                        <th>Class Name</th>
                        <th width="20%">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($allAssignSubject as $item)
                        <tr>
                            <td>{{$loop->index +1}}</td>
                            <td>{{$item->studentclassname->name}}</td>
                            <td>
                                <a class="btn btn-info"  href="">Edit</a>
                                <a class="btn btn-primary"  href="{{route('assign.subject.details',$item->student_class_id)}}">Details</a>
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
