
@extends('admin.adminmaster')
@section('admin_content')
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="box">
              <div class="box-header with-border">
                <h2 class="box-title">Employee Salary List</h2>
                <h4 class="mt-10" >Employee Name : <span class="text-white"><strong>{{$details->name}}</strong></span></h4>
                <h4>Employee ID : <span class="text-white"><strong>{{$details->id_no}}</strong></span></h4>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="table-responsive">
                  <table
                    class="table table-bordered table-striped">
                    <thead class="thead-light">
                      <tr>
                        <th width="8%">SL No</th>
                        <th>Previous Salary</th>
                        <th>Increment Salary</th>
                        <th>Present Salary</th>
                        <th>Effected Salary</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($salary_log as $item)
                        <tr>
                            <td>{{$loop->index +1}}</td>
                            <td>{{ $item->previous_salary}}</td>
                            <td>{{ $item->increment_salary}}</td>
                            <td>{{ $item->present_salary}}</td>
                            <td>{{ date('d-m-Y',strtotime($item->effected_salary))}}</td>
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


