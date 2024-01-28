@extends('layout.master')

@section('title',"تسجيل الدخول")
    
@section('content')


<div class="login-box"> 
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="#" class="h1"><b>Admin</b> Area</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">سجل الدخول للوصول للوحة التحكم</p>
  
        <form id="login" action="/login" method="post">
          @csrf
          <div class="form-group">
            <div class="input-group mb-3">
              <input name="username" type="text" class="form-control text-center" placeholder="إسم المستخدم">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group mb-3">
              <input name="password" type="password" class="form-control text-center" placeholder="كلمة السر">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">تسجيل الدخول</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->
@endsection

@section('css')
    <style>
      .content-wrapper{
        margin-right: 0px !important;
        display: flex;
        justify-content: center;
        align-items: center; 
     }
    </style>
@endsection

@section('script')

{{-- *************** Jquery Validation ***************** --}}
<script>
    $(function () {
        $('#login').validate({
            rules: {
                username : {
                    required: true,
                    pattern: /^[a-zA-Z]+$/,
                },
                password : {
                    required: true,
                    minlength: 6
                },
            },
            messages: {

                username : {
                    required: "إسم المستخدم مطلوب",
                    pattern: "إسم المستخدم بالإنجليزية فقط بدون مسافات",
                },
                password : {
                    required: "كلمة السر مطلوبة",
                    minlength: "أقل عدد أحرف لكلمة السر 6 حروف"
                },
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
            }
        });
    });
</script>

    {{-- *********** Errors ************* --}}
    @if($errors->any())
        <script>
            @foreach($errors->all() as $error)
                    toastr.error('{{$error}}');
                    toastr.options.closeDuration = 5000;
            @endforeach
        </script>
    @endif

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