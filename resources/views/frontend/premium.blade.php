@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card-body">
				@if (session('status'))
				<div class="alert alert-success" role="alert">
					{{ session('status') }}
				</div>
				@endif
				<div class=""><h4 class="text-center">Hotstar Premium</h4>
					<p class="text-center">All of VIP + Latest American TV shows & movies</p>
				</div>
				
			</div>
			<div class="col-md-6 offset-md-3">
			  <a href="{{url('/subscribe/yearly')}}" class="btn" style="display: block; padding: 0rem; text-align: left; border: 0px;" >
				<div class="breadcrumb" style="background-color: #eaf3fd;padding: .4rem 1rem; box-shadow: 1px 3px 5px #888888;">
					<div class="">

                        <span style="margin-top: 1px"><i class="fa fa-rupee"></i></span>
						<span style="font-size: 30px;color: #212121;margin-left: 1px;line-height: normal;">1499</span><span style="margin-top: 1px">/Year</span>
						<span style="font-size: 13px; color: blue; margin-left: 110px; background-color: #f0f4d5">SAVE &nbsp<i class="fa fa-rupee"></i>2089</span>

						<p class="font-weight-bold" style="font-size: 12px;text-align: left;color: #757373;margin-left: 13px;line-height: normal;">Charge yearly. Non-refunable</p>
					</div>
				</div>
			   </a>
			</div>

			<div class="col-md-6 offset-md-3">
				<a class="btn" href="{{url('/subscribe/monthly')}}" style="display: block; padding: 0rem; text-align: left;border: 0px;" >
				<div class="breadcrumb" style="background-color: #eaf3fd;padding: .4rem 1rem;box-shadow: 1px 3px 5px #888888;">
					<div class="">
					<i class="fa fa-rupee"></i>
						<span style="font-size: 30px;text-align: left;color: #212121;margin-left: 1px;line-height: normal;">299</span><span style="margin-top: 9px">/Month</span>
                         <p class="font-weight-bold"style="font-size: 12px;text-align: left;color: #757373;margin-left: 13px;line-height: normal;">Charge monthly. Non-refunable</p>
					</div>
				</div>
			    </a>
			</div>
		</div>
	</div>
</div>
@endsection