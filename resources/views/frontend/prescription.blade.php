@extends('frontend.layouts.app')
@section('main_content')
<section class="prescription-area py-4">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="pab-40 text-center">
					<h2 class="modtitle">Upload Your Prescription</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-7">
				<div class="upload-prescription-rule-box">
					<div class="upload-prescription-title">প্রেসক্রিপশন এর মাধ্যমে অর্ডার করুন</div>
					<ul>
						<li>প্রেসক্রিপশন এর ছবি তুলে অথবা স্ক্যান করে আপলোড করুন।</li>
						<li>আমাদের ফার্মাসিস্ট আপনার প্রেসক্রিপশন পেয়ে আপনার দেয়া ফোন নাম্বারে যোগাযোগ করবে। ( সকাল ১০টা থেকে রাত ১০টা )</li>
						<li>ফার্মাসিস্ট আপনার সাথে কথা বলে ঔষধ সিলেক্ট করে অর্ডার কনফার্ম করবে।</li>
						<li>নির্দিষ্ট সময়ে আপনার ঔষধ/পণ্য ডেলিভারী নিন।</li>
						<li>ঔষধ ডেলিভারীর সময় আপনার প্রেসক্রিপশন প্রদর্শন করুন।</li>
					</ul>
				</div>
			</div>
			<div class="col-md-5">
				<div class="prescription-dummy-img">
					<img width="100%" src="https://onlinemedicare.com.bd/frontend_assets/assets/img/banner/pres.jpg" alt="prescription" class="img-fluid">
				</div>
			</div>
		</div>
	</div>
</section>

<section class="upload-prescription-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="upload-prescription-img">
					<form>
						<div class="prescription-img-box">
							<div class="row">
								<div class="col-md-6">
									<label for="input-file">
											Front Image
                                    </label>
									<div class="prescription-img">
										<div class="prescription-preview">
											<img src="https://onlinemedicare.com.bd/frontend_assets/assets/img/blank.png" alt="front_image">
										</div>
									</div>
									<div class="pt-2 pb-2 file file--uploading">
                                        <input id="input-file" type="file">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                	<label for="input-file">
										Back Image
                                    </label>
									<div class="prescription-img">
										<div class="prescription-preview">
											<img src="https://onlinemedicare.com.bd/frontend_assets/assets/img/blank.png" alt="front_image">
										</div>
									</div>
									<div class="pt-2 pb-2 file file--uploading">
                                        <input id="input-file" type="file">
                                    </div>
                                </div>
                                <div class="col-md-12 pt-2">
									<div class="form-group">
										<textarea name="" id="" rows="5" placeholder="Comment" class="form-control"></textarea>
									</div>
								</div>
								<div class="col-md-12 pb-4 text-center">
									<div class="form-group mb-0">
										<button class="btn bg-color-alpa custom-btn br-3">Submit</button>
									</div>
								</div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
