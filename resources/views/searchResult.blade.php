@extends('layouts.app')

@section('content')
<div class="container-fluid" style="margin-top: 5%">
	<div class="col-lg-3">
		
	</div>
	<div class="col-lg-6">

		@if(count($searchResult) == 0)

			<h2>No match found. try looking inside the given categories</h2>

		@else

			<h2>{{count($searchResult) }} matches found for "{{$request->keyword}}"</h2>

			@foreach($searchResult as $user)


			<div class="row" style="border-bottom: 2px solid black; margin-top: 4%">
				<div class="col-lg-2"></div>
				<div class="col-lg-6">
					<h2>{{$user->name}}</h2>
					<h5>Phone number: {{$user->phone_number}}</h5>
					<h5>Email address: {{$user->email}}</h5>

                    <a href="/recharge_account/{{$user->id}}"><button class="btn btn-primary">Recharge Account</button></a>
				
				
					{{--@if(Auth::user()->didCreate($course))--}}
							{{--<a href="/courseDetail/{{$course->id}}" class="btn btn-success">Course Home</a>--}}
							{{--<a href="/courseDetail/forum/{{$course->id}}" class="btn btn-primary">Go to forum</a>--}}
					{{--@elseif(Auth::user()->isEnrolled($course))--}}
						{{--<div class="form-group">--}}
						{{--<a href="/courseDetail/{{$course->id}}" class="btn btn-success">Enrolled</a>--}}
						{{--<a href="/courseDetail/forum/{{$course->id}}" class="btn btn-primary">Go to forum</a>--}}
						{{--</div>--}}
					{{--@else--}}

						{{--<div class="form-group">--}}
							{{--<a href="/enroll/{{$course->id}}" class="btn btn-primary">Enroll</a>--}}
							{{--<a href="/courseDetail/{{$course->id}}" class="btn btn-success">View detail</a>--}}
						{{--</div>--}}

					{{--@endif--}}
					</div>
				
		</div>
				

			@endforeach


		@endif
		
	</div>
</div>

@endsection