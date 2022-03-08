<div class="modal fade" id="subCategoryModal" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal" aria-label="Close"> <em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-md">
                <h5 class="title">Add SubCategory</h5>
                <form  enctype="multipart/form-data" method="POST" action="{{url('admin/product-sub-categories')}}" class="pt-2">
                    @csrf 
                	<div class="form-group">
                        <label class="form-label">Select Category</label>
                        <div class="d-flex gx-3" >
                            <div class="g w-100">
                                <div class="form-control-wrap">
                                    <select class="form-select" data-search="on" name="category_id">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div> 
                            </div>
                            {{-- <div class="g">
                                <button type="button" class="btn btn-icon btn-outline-light theme-btn" data-toggle="modal" data-target="#addCategoryModal"><em class="icon ni ni-plus"></em></button>
                            </div> --}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="full-name">SubCategory Name</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="full-name" placeholder="Sub Category" name="name" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="thumb">SubCategory Banner</label>
                        <div class="form-control-wrap">
                            <div class="custom-file">
                                <input type="file" multiple="" class="custom-file-input" id="customFile" name="sub_cate_banner">
                                <label class="custom-file-label" for="thumb">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <!-- Banner show -->
                    {{-- <div class="avatar-image banner-image">
                        <img src="/image.svg" alt="avatar-image">
                    </div> --}}


                    <div class="form-group">
                        <label class="form-label" for="thumb">SubCategory Image</label>
                        <div class="form-control-wrap">
                            <div class="custom-file">
                                <input type="file" multiple="" class="custom-file-input" id="customFile" name="sub_cate_image">
                                <label class="custom-file-label" for="thumb">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <!-- Image show -->
                    {{-- <div class="avatar-image banner-image">
                        <img src="/image.svg" alt="avatar-image">
                    </div> --}}


                    <div class="form-group">
                        <button type="submit" class="btn theme-btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>