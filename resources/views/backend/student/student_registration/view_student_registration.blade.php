
@extends('admin.adminmaster')
@section('admin_content')
      <!-- Main content -->
      <section class="content">
        <div class="row">

            <div class="col-md-12">
				<div class="box bb-3 border-warning">
				  <div class="box-header">
					<h4 class="box-title">Student : <span class="text-white"><strong>Search</strong></span></h4>
				  </div>

				  <div class="box-body">
                    <form action="{{route('student.year.class.wise')}}" method="GET">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <h5>Year</h5>
                                    <div class="controls">
                                        <select name="student_year_id" id="select" required="" class="form-control" aria-invalid="false">
                                            <option value="" disabled="" selected="">Select Year</option>
                                            @foreach ($allYear as $item)
                                            <option value="{{$item->id}}" {{($student_year_id==$item->id)? 'selected':""}}  >{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <h5>Class</h5>
                                    <div class="controls">
                                        <select name="student_class_id" id="select" required="" class="form-control" aria-invalid="false">
                                            <option value="" disabled="" selected="">Select Class</option>
                                            @foreach ($allClass as $item)
                                            <option value="{{$item->id}}" {{($student_class_id==$item->id)? 'selected':""}}>{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4" style="padding-top: 25px">
                                <input type="submit" value="Search" name="search" class="btn btn-dark">
                            </div>
                        </div>
                    </form>
				  </div>
				</div>
			  </div>
          <div class="col-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Student List</h3>
                <a style="float: right;" class="btn btn-primary" href="{{route('student.registration.add')}}">Add Student</a>
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
                        <th>Roll</th>
                        <th>Class</th>
                        <th>Year</th>
                        @if (Auth::user()->role=="Admin")
                        <th>Code</th>
                        @endif
                        <th>image</th>
                        <th width="20%">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($allData as $item)
                        <tr>
                            <td>{{$loop->index +1}}</td>
                            <td>{{$item['student']['name']}}</td>
                            <td>{{$item['student']['id_no']}}</td>
                            <td>{{$item->roll}}</td>
                            <td>{{$item['studentClass']['name']}}</td>
                            <td>{{$item['studentYear']['name']}}</td>
                            <td>{{$item['student']['code']}}</td>
                            <td>
                                <img width="40" id="showImage" height="30" src="{{(!empty($item['student']['image'])) ? url('upload/student_images/'.$item['student']['image']):url('upload/no_image.jpg')}}" alt="User Avatar">
                            </td>
                            <td>
                                <a class="btn btn-info btn-sm"  href="{{route('student.registration.edit',$item->student_id)}}">Edit</a>
                                <a class="btn btn-primary btn-sm"  href="{{route('student.registration.promation',$item->student_id)}}">Promation</a>
                                <a class="btn btn-warning btn-sm" target="_blank"  href="{{route('student.registration.details',$item->student_id)}}">Details</a>
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
