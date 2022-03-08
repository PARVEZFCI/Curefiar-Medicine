@extends('layouts.app')
@section('content')
<div class="nk-content-body">
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Promo</h3>
            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">
                            <li class="nk-block-tools-opt"><a href="#" class="btn theme-btn" data-toggle="modal" data-target="#addPromo"><em class="icon ni ni-plus"></em><span>Add Promo</span></a></li>
                        </ul>
                    </div>
                </div><!-- .toggle-wrap -->
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->

    <div class="nk-block nk-block-lg">
        <div class="card">
            <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#tabItem5"><em class="icon ni ni-laptop"></em><span>Basic Information</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tabItem8"><em class="icon ni ni-color-palette-fill"></em><span>Media </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#seo"><em class="icon ni ni-color-palette-fill"></em><span>Seo </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tabItem9"><em class="icon ni ni-setting-alt"></em><span> Social </span>
                    </a>
                </li>
            </ul>
            <div class="card-inner">
                <div class="tab-content">
                    <div class="tab-pane active" id="tabItem5">
                        <h4 class="title nk-block-title">Web setting</h4>
                        <p>Here is your basic setting of your website.</p>
                        <form action="{{url('admin/setting/updatedescription')}}" method="post" class="gy-3 form-settings">
                            @csrf
                            <div class="row g-3 align-center">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="form-label" for="site-name">Site Name</label>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="name" name="name" value="{{$generalsetting->name}}" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 align-center">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="form-label" for="site-name">Site Title</label>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="title" name="title" value="{{$generalsetting->title}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 align-center">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="form-label" for="site-name">Site Phone</label>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="phone" name="phone" value="{{$generalsetting->phone}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 align-center">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="form-label" for="site-email">Site Email</label>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="text" name="email" class="form-control"  id="email" value="{{$generalsetting->email}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 align-center">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="form-label" for="site-copyright">Site Copyright</label>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="copyright" value="{{$generalsetting->copyright}}" name="copyright">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 align-center">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="form-label">Main Website</label>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" name="website" value="{{$generalsetting->website}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 align-center">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="form-label">Description</label>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                           <textarea class="form-control" name="description">{{$generalsetting->description}}</textarea>
                                           <input type="hidden" name="id" value="{{$generalsetting->id}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-lg-7">
                                    <div class="form-group mt-2">
                                        <button type="submit" class="btn btn-lg btn-primary" data-target="#modalAlert" data-toggle="modal">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--media form tab pan -->
                    <div class="tab-pane" id="tabItem8">
                      <form action="{{url('admin/setting/updatemedia')}}" enctype="multipart/form-data" method="post" class="gy-3 form-settings">
                        @csrf 
                        <div class="row g-gs align-items-center">
                            <div class="col-lg-6 col-xxl-3 col-sm-6">
                                <div class="card shadow-none">
                                    <div class="form-group">
                                        <label class="form-label" for="thumb">Home Page Banner</label>
                                        <div class="form-control-wrap">
                                            <div class="custom-file">
                                                <input type="file" multiple="" class="custom-file-input" id="customFile" name="home_banner">
                                                <label class="custom-file-label" for="thumb">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xxl-3 col-sm-6">
                                <div class="card shadow-none">
                                    <img src="{{$mediasetting->home_banner ? '/storage/uploads/media/'.$mediasetting->home_banner : '/image.svg' }}" class="border border-light rounded" alt="avatar-image" width="150">
                                </div>
                            </div>
                            <div class="col-lg-6 col-xxl-3 col-sm-6">
                                <div class="card shadow-none">
                                	<div class="form-group">
				                        <label class="form-label" for="thumb">Logo</label>
				                        <div class="form-control-wrap">
				                            <div class="custom-file">
				                                <input type="file" multiple="" class="custom-file-input" id="customFile" name="logo">
				                                <label class="custom-file-label" for="thumb">Choose file</label>
				                            </div>
				                        </div>
				                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xxl-3 col-sm-6">
                                <div class="card shadow-none">
                                    <img src="{{$mediasetting->logo ? '/storage/uploads/media/'.$mediasetting->logo : '/image.svg' }}" class="border border-light rounded" alt="avatar-image" width="150">
                                </div>
                            </div>
                            <div class="col-lg-6 col-xxl-3 col-sm-6">
                                <div class="card shadow-none">
                                	<div class="form-group">
				                        <label class="form-label" for="thumb">Favicon</label>
				                        <div class="form-control-wrap">
				                            <div class="custom-file">
				                                <input type="file" multiple="" class="custom-file-input" id="customFile" name="favicon">
                                                <input type="hidden" multiple="" class="custom-file-input" id="id" name="id" value="{{$generalsetting->id}}">
				                                <label class="custom-file-label" for="thumb">Choose file</label>
				                            </div>
				                        </div>
				                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xxl-3 col-sm-6">
                                <div class="card shadow-none">
                                    <img src="{{$mediasetting->favicon ? '/storage/uploads/media/'.$mediasetting->favicon : '/image.svg' }}" class="border border-light rounded" alt="avatar-image" width="150">
                                </div>
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-lg-7">
                                <div class="form-group mt-2">
                                    <button type="submit" class="btn btn-lg btn-primary" data-target="#modalAlert" data-toggle="modal">Update</button>
                                </div>
                            </div>
                        </div>
                      </form>
                    </div>
                    <!--seo form tab pan -->
                    <div class="tab-pane" id="seo">
                        <form  method="post" enctype="multipart/form-data" class="gy-3 form-settings">
                            @csrf
                            <div class="row g-3 align-center">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="form-label" for="site-name">Seo Meta Tag</label>
                                        <div class="form-group">
	                                        <div class="bs-example">
                                                <input type="text" id="#inputTag" value="cloth" name="meta_tag" class="form-control" data-role="tagsinput">
                                            </div>
	                                    </div>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <label class="form-label" for="site-name">Seo Meta Description</label>
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <textarea class="form-control">
                                                    
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-lg-7">
                                    <div class="form-group mt-2">
                                        <button type="submit" class="btn btn-lg btn-primary" data-target="#modalAlert" data-toggle="modal">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="tabItem9">
                        <form action="{{url('admin/setting/updatedesocial')}}" method="post" class="gy-3 form-settings">
                            @csrf
                            <div class="row g-3 align-center">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label" for="site-name">Facebook</label>
                                        <div class="form-group">
                                            <input type="text" value="{{$generalsetting->facebook}}" name="facebook" class="form-control" placeholder="https://www.facebook.com/">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label" for="site-name">Twitter</label>
                                        <div class="form-group">
                                            <input type="text" value="{{$generalsetting->twitter}}" name="twitter" class="form-control" placeholder="https://www.twitter.com/">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label" for="site-name">Youtube</label>
                                        <div class="form-group">
                                            <input type="text" value="{{$generalsetting->youtube}}" name="youtube" class="form-control" placeholder="https://www.youtube.com/">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label" for="site-name">Instagram</label>
                                        <div class="form-group">
                                            <input type="text" value="{{$generalsetting->instagram}}" name="instagram" class="form-control" placeholder="https://www.instagram.com/">
                                            <input type="hidden" value="{{$generalsetting->id}}" name="id">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-lg-7">
                                    <div class="form-group mt-2">
                                        <button type="submit" class="btn btn-lg btn-primary" data-target="#modalAlert" data-toggle="modal">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--card inner-->
        </div>
        <!--card-->
    </div>
</div>

@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" integrity="sha512-9UR1ynHntZdqHnwXKTaOm1s6V9fExqejKvg5XMawEMToW4sSw+3jtLrYfZPijvnwnnE8Uol1O9BcAskoxgec+g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $("#inputTag").tagsinput('items');
</script>
@endsection