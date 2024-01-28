@extends('layout.master')

@section('title','بحث فى المستخدمين')

@section('content')

    <div class="row">
        <div class="col-12">
     
            <div class="card">
                <div class="card-header d-flex flex-row-reverse justify-content-between align-items-center">
                  <h3 class="card-title">بيانات المستخدمين</h3>
                  <a href="/new-user" class="btn btn-success mr-auto">إضافة مستخدم</a>

                </div>
                <!-- /.card-header -->
                <div class="card-body overflow-auto">
                  <table id="users-table" class="table table-bordered table-striped" dir="rtl">
                    <div class="col-12"></div>
                    <thead>
                    <tr>
                      <th class="text-center">الإسم</th>
                      <th class="text-center">إسم المستخدم</th>
                      <th class="text-center">التغييرات</th>
                 
                    </tr>
                    </thead>
                    <tbody>
                        {{-- table body data --}}

                        @foreach ($Data as $row)
                            <tr>
                                <td class="text-center" >{{$row->name}}</td>
                                <td class="text-center">{{$row->username}}</td>

                                <td class="d-flex justify-content-center">
                                    <a href="/delete-user/{{$row->id}}" class="btn btn-danger">حذف</a>
                                </td>
                            </tr>
                        @endforeach
                     
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="text-center">الإسم</th>
                            <th class="text-center">إسم المستخدم</th>
                            <th class="text-center">التغييرات</th>      
                          </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
        </div>
    </div>

@endsection


@section('script')
<script>
    $(function () {
      $("#users-table").DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
          }).buttons().container().appendTo('#users-table_wrapper .col-md-6:eq(0)');

    }); 
    
  </script>

  
    {{-- ********* Success Message ********** --}}
    @if(session()->has('message'))
        <script>
            toastr.success("{{session('message')}}");
            toastr.options.closeDuration = 5000;
        </script>
    @endif
    {{-- ********* Error Message ********** --}}
    @if(session()->has('error'))
        <script>
            toastr.error("{{session('error')}}");
            toastr.options.closeDuration = 5000;
        </script>
    @endif

@endsection