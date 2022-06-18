@extends('layouts.master3')
@section('css')
<!--- Internal Fontawesome css-->
<link href="{{URL::asset('officepanal/assets/plugins/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
<!---Ionicons css-->
<link href="{{URL::asset('officepanal/assets/plugins/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
<!---Internal Typicons css-->
<link href="{{URL::asset('officepanal/assets/plugins/typicons.font/typicons.css')}}" rel="stylesheet">
<!---Internal Feather css-->
<link href="{{URL::asset('officepanal/assets/plugins/feather/feather.css')}}" rel="stylesheet">
<!---Internal Falg-icons css-->
<link href="{{URL::asset('officepanal/assets/plugins/flag-icon-css/css/flag-icon.min.css')}}" rel="stylesheet">
@endsection
@section('content')
		<!-- Main-error-wrapper -->
		<div class="main-error-wrapper  page page-h ">
			<img src="{{URL::asset('officepanal/assets/img/media/404.png')}}" class="error-page" alt="error">
			<h2>الصفحة التي تحاول الوصول اليها غير متوفرة حاليا</h2>
		<a class="btn btn-outline-danger" href="{{ route('home') }}">الرجوع الي الصفحة الرئيسة</a>
		</div>
		<!-- /Main-error-wrapper -->
@endsection
@section('js')
@endsection