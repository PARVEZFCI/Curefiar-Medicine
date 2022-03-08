@extends('layouts.app')
@section('content')

<div class="nk-content-body">
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Area</h3>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                        <li class="breadcrumb-item ">Area / {{ $area->area_name }}</li>
                     </ol>
                </div>
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    <div class="nk-block">
	    <div class="card card-preview">
	        <div class="card-inner">
                <form action="{{ route('areas.update', $area->id) }}" method="POST" class="pt-2 pb-5">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="form-label" for="email-address-1">City <span class="text-danger">*</span></label>
                                <div class="form-control-wrap">
                                    <select name="city" class="form-control">
                                        @foreach (\App\Models\City::get() as $city)
                                            <option value="{{ $city->id }}" {{ $city->id == $area->city_id ? 'selected' : '' }}>{{ $city->city_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="email-address-1">Area <span class="text-danger">*</span></label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" placeholder="e.g. Dhanmondi" name="area_name" required value="{{ $area->area_name }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn theme-btn">Save</button>
                    </div>
                </form>
	        </div>
	    </div><!-- .card-preview -->
	</div><!-- .nk-block -->
</div>
@endsection