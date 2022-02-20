<!doctype html>
<html lang="en">

<head>
    <title>تسجيل الدخول</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="officepanal/css/style.css">

</head>

<body dir="ltr" class="bgbg">

    <div class="container text-right move ">

        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="wrap d-md-flex">
                    <div class="img" style="background-image: url(officepanal/image/bg-6.png);">
                    </div>
                    <div class="login-wrap p-4 p-md-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4 text-right"> مرحبا بك في لوحة التحكم .. سجل دخولك</h3>

                            </div>

                        </div>
                        <form action="{{ route('office.login') }}" class="signin-form">
                            @csrf

                            <div class="form-group mb-3">
                                <label class="label" for="name">أسم المستخدم</label>
                                <input id="email" type="email" class="form-control"
                                    @if ($errors->has('email')) is-invalid @endif name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus
                                    placeholder="email" required>

                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label class="label" for="password">كلمة المرور</label>
                                <input id="password" type="password" class="form-control"
                                    @if ($errors->has('password')) is-invalid @endif name="password" required
                                    autocomplete="current-password" placeholder="Password" required>

                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary rounded submit px-3"> تسجيل
                                    الدخول</button>
                            </div>

                        </form>
                        <p class="text-center" <a data-toggle="tab" href="#signup"></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>
