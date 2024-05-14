@extends('admin.adminmaster')
@section('admin_content')
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Assign Subject Details</h3>
                <a style="float: right;" class="btn btn-primary" href="{{route('assign.subject.add')}}">Assign Subject Amount</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <h4><strong>Assign Subject Name :<span class="text-white">{{$detailsData['0']['studentclassname']['name']}}</span> </strong></h4>
                <div class="table-responsive">
                  <table
                    class="table table-bordered table-striped">
                    <thead class="thead-light">
                      <tr>
                        <th width="5%">SL</th>
                        <th>Subject Name</th>
                        <th>Full Mark</th>
                        <th>Pass Mark</th>
                        <th width="20%">Subjective Mark</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($detailsData as $item)
                        <tr>
                            <td>{{$loop->index +1}}</td>
                            <td>{{$item['studentsubjectname']['name']}}</td>
                            <td>{{$item->full_mark}}</td>
                            <td>{{$item->pass_mark}}</td>
                            <td>{{$item->subjective_mark}}</td>
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
