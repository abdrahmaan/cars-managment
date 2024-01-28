@extends('layout.master')

@section('title','رفع ملف')

@section('content')


    <div class="row">

        
        <div class="col-12">
            <form id="new-car" action="/new-car-import" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- بيانات المستخدم -->
                <div class="card">
                    <div class="card-header d-flex flex-row-reverse align-items-center">   
                        <h3 class="card-title">رفع ملف إكسيل</h3>

                        <div class="card-tools mx-3">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                        <div class="buttons mr-auto">

                            <a href="/cars" class="btn btn-warning ">عرض السيارات</a>
                            <a href="/download-file" class="btn btn-primary ">تحميل ملف</a>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="row justify-content-start flex-row-reverse justify-content-center">
                            <!-- الملف  -->
                            <div class="col-lg-4">
                                <div class="form-group  mx-2 d-block">
                                    <label for="carsfile" class="text-right w-100">الملف</label>
                                    <input name="carsfile" type="file" class="form-control" id="carsfile" placeholder="الإسم">
                                </div>
                            </div>
 
                                                
                        </div>

                
                    </div>

                    <div class="card-footer text-right">
                        <div class="d-flex justify-content-between align-items-center">
                            <button  type="submit" class="btn btn-success">رفع الملف</button>
                              يمكنك رفع ملف إكسيل خاص بالسيارات

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

    {{-- ********* Error Message ********** --}}
    @if(session()->has('error'))
        <script>
            toastr.error("{{session('error')}}");
            toastr.options.closeDuration = 5000;
        </script>
    @endif

@endsection