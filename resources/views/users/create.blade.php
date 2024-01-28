@extends('layout.master')

@section('title','إضافة مستخدم')

@section('content')


    <div class="row">

        
        <div class="col-12">
            <form id="new-user" action="/new-user" method="POST">
                @csrf
                <!-- بيانات المستخدم -->
                <div class="card">
                    <div class="card-header d-flex flex-row-reverse align-items-center">   
                        <h3 class="card-title">بيانات المستخدم</h3>

                        <div class="card-tools mx-3">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>

                     <a href="/users" class="btn btn-warning mr-auto">عرض المستخدمين</a>

                    </div>
                    <div class="card-body">
                        <div class="row justify-content-start flex-row-reverse">
                            <!-- إسم الشخص  -->
                            <div class="col-lg-4">
                                <div class="form-group  mx-2 d-block">
                                    <label for="name" class="text-right w-100">الإسم</label>
                                    <input name="name" type="text" class="form-control text-right" id="exampleInputEmail1" placeholder="الإسم">
                                </div>
                            </div>
                            <!-- إسم المستخدم  -->
                            <div class="col-lg-4">
                                <div class="form-group  mx-2 d-block">
                                    <label for="username" class="text-right w-100">إسم المستخدم</label>
                                    <input name="username" type="text" class="form-control text-right" id="exampleInputEmail1" placeholder="إسم المستخدم">
                                </div>
                            </div>
                            
                            <!-- كلمة السر  -->
                            <div class="col-lg-4">
                                    <div class="form-group  mx-2 d-block">
                                        <label for="password" class="text-right w-100">كلمة السر</label>
                                        <input name="password" type="password" class="form-control text-right" id="exampleInputEmail1" placeholder="كلمة السر">
                                    </div>
                             </div>      
                                                
                        </div>

                
                    </div>

                    <div class="card-footer text-right">
                        <div class="d-flex justify-content-between align-items-center">
                            <button  type="submit" class="btn btn-success">إضافة مستخدم</button>
                              بيانات المستخدم التى تمكنه من الدخول للوحة التحكم

                        </div>

                    </div>

                </div>
                
            </form>

        </div>

    
    </div>
@endsection


@section('script')

{{-- *************** Jquery Validation ***************** --}}
<script>
    $(function () {
        $('#new-user').validate({
            rules: {
                name : {
                    required: true,
                },
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
                name : {
                    required: "الإسم مطلوب",
                },
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

@endsection