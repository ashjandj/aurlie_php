@extends('layouts.frontend.app')
@section('title', trans('labels.subscription_plans'))
@section('main-class', 'subscription-plans')
@section('meta-title', 'subscription_plans')
@section('meta-keywords', 'subscription_plans')
@section('meta-description', 'subscription_plans')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-body">
					<div class="alert alert-success">
						{{trans('labels.subscription_success')}}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
