@extends('admin.adminmaster')
@section('admin_content')
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Fee Amount Details</h3>
                <a style="float: right;" class="btn btn-primary" href="{{route('fee.amount.add')}}">Add Fee Amount</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <h4><strong>Fee Category Name : <span class="text-white">{{$detailsData['0']['feecategoryname']['name']}}</span> </strong></h4>
                <div class="table-responsive">
                  <table
                    class="table table-bordered table-striped">
                    <thead class="thead-light">
                      <tr>
                        <th width="5%">SL</th>
                        <th>Class Name</th>
                        <th width="20%">Amount</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($detailsData as $item)
                        <tr>
                            <td>{{$loop->index +1}}</td>
                            <td>{{$item['studentclassname']['name']}}</td>
                            <td>{{$item->amount}}</td>
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
