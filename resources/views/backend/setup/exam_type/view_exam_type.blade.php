@extends('admin.adminmaster')
@section('admin_content')
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Exam Type List</h3>
                <a style="float: right;" class="btn btn-primary" href="{{route('exam.type.add')}}">Add Exam Type</a>
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
                        <th>Created_At</th>
                        <th>Updated_At</th>
                        <th width="20%">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($allExamType as $item)
                        <tr>
                            <td>{{$loop->index +1}}</td>
                            <td>{{Str::of( $item->name)->title()}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>
                                @if ($item->updated_at)
                                {{$item->updated_at}}
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-info"  href="{{route('exam.type.edit',$item->id)}}">Edit</a>
                                <a class="btn btn-danger" id="delete" href="{{route('exam.type.delete',$item->id)}}">Delete</a>
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