@extends('layout.master')

@section('title','تغيير كلمة السر')

@section('content')


    <div class="row">

        
        <div class="col-12">
            <form id="change-password" action="/change-password" method="POST">
                @csrf
                <!-- بيانات المستخدم -->
                <div class="card">
                    <div class="card-header d-flex flex-row-reverse align-items-center">   
                        <h3 class="card-title">بيانات كلمة السر</h3>

                        <div class="card-tools mx-3">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>


                    </div>
                    <div class="card-body">
                        <div class="row justify-content-start flex-row-reverse">
                            <!-- كلمة السر القديمة  -->
                            <div class="col-lg-6">
                                <div class="form-group  mx-2 d-block">
                                    <label for="oldPassword" class="text-right w-100">كلمة السر القديمة</label>
                                    <input name="oldPassword" type="password" class="form-control text-right" id="exampleInputEmail1" placeholder="كلمة السر القديمة">
                                </div>
                            </div>
                            <!-- كلمة السر الجديدة  -->
                            <div class="col-lg-6">
                                <div class="form-group  mx-2 d-block">
                                    <label for="newPassword" class="text-right w-100">كلمة السر الجديدة</label>
                                    <input name="newPassword" type="password" class="form-control text-right" id="exampleInputEmail1" placeholder="كلمة السر الجديدة">
                                </div>
                            </div>
                             
                                                
                        </div>

                
                    </div>

                    <div class="card-footer text-right">
                        <div class="d-flex justify-content-between align-items-center">
                            <button  type="submit" class="btn btn-success">تغيير كلمة السر</button>
                              تغيير بيانات كلمة السر الخاصة بالمستخدم

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
        $('#change-password').validate({
            rules: {
                
                oldPassword : {
                    required: true,
                    minlength: 6
                },
                newPassword : {
                    required: true,
                    minlength: 6
                },
               
            },
            messages: {
    
                oldPassword : {
                    required: "كلمة السر القديمة مطلوبة",
                    minlength: "أقل عدد أحرف لكلمة السر 6 حروف"
                },
                newPassword : {
                    required: "كلمة السر الجديدة مطلوبة",
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