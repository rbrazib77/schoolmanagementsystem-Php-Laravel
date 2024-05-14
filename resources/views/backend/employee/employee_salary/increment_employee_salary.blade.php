@extends('admin.adminmaster')
@section('admin_content')
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                  <h4 class="box-title">Employee Salary Increment</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col">
                        <form action="{{route('employee.salary.increment.update',$allEditData->id)}}" method="POST">
                         @csrf
                          <div class="row">
                            <div class="col-lg-6">
                             <div class="form-group">
                                 <h5>Salary Amount <span class="text-danger">*</span></h5>
                                 <div class="controls">
                                     <input type="text" name="increment_salary" class="form-control" placeholder="Salary Increment">
                                     @error('increment_salary')
                                     <strong class="text-danger">{{$message}}</strong>
                                     @enderror
                                 </div>
                             </div>
                           </div>
                           <div class="col-lg-6">
                            <div class="form-group">
                                <h5>Effected Date <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="date" name="effected_salary" class="form-control">
                                    @error('effected_salary')
                                    <strong class="text-danger">{{$message}}</strong>
                                    @enderror
                                </div>
                            </div>
                          </div>
                          </div>
                            <div class="text-xs-right">
                                {{-- <button type="submit" class="btn btn-info">Submit</button> --}}
                                <input type="submit" class="btn btn-info" value="Salary Increment Update">
                            </div>
                        </form>

                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
                <!-- /.box-body -->
              </div>
        </div>
        <!-- /.col -->
    </div>
<!-- /.row -->
</section>
@endsection

