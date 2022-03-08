<div class="modal fade" id="addCategoryModal" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal" aria-label="Close"> <em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-md">
                <h5 class="title">Add Category</h5>
                <form enctype="multipart/form-data" action="{{url('admin/product-categories')}}" method="POST" class="pt-2">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="email-address-1">Category</label>
                        <div class="form-control-wrap">
                            <input type="text" name="name" class="form-control" placeholder="Product Category">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="thumb">Icon</label>
                        <div class="form-control-wrap">
                            <div class="custom-file">
                                <input type="file" multiple="" class="custom-file-input" id="customFile" name="cate_icon">
                                <label class="custom-file-label" for="thumb">Choose file</label>
                            </div>
                        </div>
                        {{-- <div class="d-flex align-items-center justify-content-between flex-wrap">
                            
                            <div class="avatar-image">
                                <img src="/image.svg" alt="avatar-image" width="80">
                            </div>
                        </div> --}}
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="thumb">Image</label>
                        <div class="form-control-wrap">
                            <div class="custom-file">
                                <input type="file" multiple="" class="custom-file-input" id="customFile" name="image">
                                <label class="custom-file-label" for="thumb">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="thumb">Banner</label>
                        <div class="form-control-wrap">
                            <div class="custom-file">
                                <input type="file" multiple="" class="custom-file-input" id="customFile" name="cate_banner">
                                <label class="custom-file-label" for="thumb">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <!-- Banner show -->
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