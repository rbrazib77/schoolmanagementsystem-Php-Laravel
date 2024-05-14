@extends('admin.adminmaster')
@section('admin_content')
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Student Fee Amount List</h3>
                <a style="float: right;" class="btn btn-primary" href="{{route('fee.amount.add')}}">Add Fee Amount</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="table-responsive">
                  <table
                    id="example1"
                    class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th width="5%">SL No</th>
                        <th>Fee Category Name</th>
                        <th width="20%">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($AllFeeCategoryAmount as $item)
                        <tr>
                            <td>{{$loop->index +1}}</td>
                            <td>{{$item['feecategoryname']['name']}}</td>
                            <td>
                                <a class="btn btn-info"  href="{{route('fee.amount.edit',$item->fee_category_id)}}">Edit</a>
                                <a class="btn btn-success" href="{{route('fee.amount.details',$item->fee_category_id)}}">Datails</a>
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
