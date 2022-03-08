<div class="modal fade" id="subsubcategoryModal" aria-modal="true" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal" aria-label="Close"> <em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-md">
                <h5 class="title">Add ChildCategory</h5>
                <form action="{{url('admin/product-sub-subcategories')}}" method="post" enctype="multipart/form-data"  class="pt-2">
                	@csrf
                    <div class="form-group">
                        <label class="form-label">Select Category</label>
                        <div class="form-control-wrap">
                            <select class="form-control" onchange="forSubCategory()"  id="category_id" name="category_id">
                                <option value=" " selected disabled>--select category--</option>
                                @foreach($categories as $category)
                                 <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">SubCategory</label>
                        <div class="form-control-wrap">
                            <select class="form-select" data-search="on" name="sub_category_id">
                                <option value=" " selected disabled>--select subcategory--</option>
                                
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="full-name">Name</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="full-name"  name="name" required>
                        </div>
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
                                <input type="file" multiple="" class="custom-file-input" id="customFile" name="sub_cate_banner">
                                <label class="custom-file-label" for="thumb">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button  type="submit" class="btn theme-btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

