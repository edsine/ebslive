@extends('layouts.app')
@section('content')

<?php

// Get the Laravel application logs.
$logs = file(storage_path('logs/laravel.log'));

// Parse the Laravel application logs.
$parsedLogs = [];
foreach ($logs as $log) {
    $parsedLogs[] = json_decode($log);


}

// Limit the Laravel application logs to just 50.
$parsedLogs = array_slice($parsedLogs, -50);

// Echo the Laravel application logs to the tabular template.
?>

<div class="row g-5 g-xl-8">
<nav>
					<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
						<a class="nav-item nav-link active btn-success" style="font-weight:bold" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Sector A</a>
						<a class="nav-item nav-link" id="nav-profile-tab" style="font-weight:bold" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Sector B</a>
						<a class="nav-item nav-link" id="nav-contact-tab" style="font-weight:bold" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Sector C</a>
						<a class="nav-item nav-link" id="nav-about-tab" style="font-weight:bold"  data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">Sector D</a>
					</div>
				</nav>
<div class="card">
									<div class="card-header">
										<div class="card-title fs-2 fw-bolder">Application Settings</div>
									</div>
                                    <form id="kt_project_settings_form" class="form" action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
										<div class="card-body p-9">
											<div class="row mb-5">
												<!--begin::Col-->
												<div class="col-xl-3">
													<div class="fs-6 fw-bold mt-2 mb-3">Application Logo</div>
												</div>
												<div class="col-lg-8">
													<!--begin::Image input-->
													<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
														<!--begin::Preview existing avatar-->
														<div class="image-input-wrapper w-125px h-125px bgi-position-center" style="background-size: 75%; background-image: url('assets/media/logos/NSITF-logo.png')"></div>
														<!--end::Preview existing avatar-->
														<!--begin::Label-->
														<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
															<i class="bi bi-pencil-fill fs-7"></i>
															<!--begin::Inputs-->
															<input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
															<input type="hidden" name="avatar_remove" />
															<!--end::Inputs-->
														</label>
													
														<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
															<i class="bi bi-x fs-2"></i>
														</span>
														<!--end::Cancel-->
														<!--begin::Remove-->
														<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
															<i class="bi bi-x fs-2"></i>
														</span>
														<!--end::Remove-->
													</div>
													<!--end::Image input-->
													<!--begin::Hint-->
													<div class="form-text">Allowed file types: png, jpg, jpeg.</div>
													<!--end::Hint-->
												</div>
												<!--end::Col-->
											</div>
											<!--end::Row-->
											<!--begin::Row-->
											<div class="row mb-8">
												<!--begin::Col-->
												<div class="col-xl-3">
													<div class="fs-6 fw-bold mt-2 mb-3">Application Name</div>
												</div>
												<!--end::Col-->
												<!--begin::Col-->
												<div class="col-xl-9 fv-row">
													<input type="text" class="form-control form-control-solid" name="name" value="ENSITF" />
												</div>
											</div>
											<!--end::Row-->
											<!--begin::Row-->
											<div class="row mb-8">
												<!--begin::Col-->
												<div class="col-xl-3">
													<div class="fs-6 fw-bold mt-2 mb-3">Application Cache Size</div>
												</div>
												<!--end::Col-->
												<!--begin::Col-->
												<div class="col-xl-9 fv-row">
													<input type="text" class="form-control form-control-solid" name="type" value="4359" />
												</div>
											</div>
											<!--end::Row-->
											<!--begin::Row-->
											<div class="row mb-8">
												<!--begin::Col-->
												<div class="col-xl-3">
													<div class="fs-6 fw-bold mt-2 mb-3">Application Meta Description</div>
												</div>
												<!--end::Col-->
												<!--begin::Col-->
												<div class="col-xl-9 fv-row">
													<textarea name="description" class="form-control form-control-solid h-100px">Organize your thoughts with an outline. Here’s the outlining strategy I use. I promise it works like a charm. Not only will it make writing your blog post easier, it’ll help you make your message</textarea>
												</div>
												<!--begin::Col-->
											</div>
											<!--end::Row-->
											<!--begin::Row-->
											<div class="row mb-8">
												<!--begin::Col-->
												<div class="col-xl-3">
													<div class="fs-6 fw-bold mt-2 mb-3">Data Validation Rule</div>
												</div>
												<!--end::Col-->
												<!--begin::Col-->
												<div class="col-xl-9 fv-row">
													<div class="position-relative d-flex align-items-center">
														<!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
														<span class="svg-icon position-absolute ms-4 mb-1 svg-icon-2">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path opacity="0.3" d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
																<path d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z" fill="currentColor" />
																<path d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z" fill="currentColor" />
															</svg>
														</span>
														<!--end::Svg Icon-->
														<input class="form-control form-control-solid ps-12" name="date" placeholder="Set Rule" id="kt_datepicker_1" />
													</div>
												</div>
												<!--begin::Col-->
											</div>
											<!--end::Row-->
											<!--begin::Row-->
											<div class="row mb-8">
												<!--begin::Col-->
												<div class="col-xl-3">
													<div class="fs-6 fw-bold mt-2 mb-3">Allow email notifications </div>
												</div>
												<!--end::Col-->
												<!--begin::Col-->
												<div class="col-xl-9">
													<div class="d-flex fw-bold h-100">
														<div class="form-check form-check-custom form-check-solid me-9">
															<input class="form-check-input" type="checkbox" value="" id="email" />
															<label class="form-check-label ms-3" for="email">Yes</label>
														</div>
														<div class="form-check form-check-custom form-check-solid">
															<input class="form-check-input" style="background-color:green;" type="checkbox" value="" id="phone" checked="checked" />
															<label class="form-check-label ms-3" for="phone">No</label>
														</div>
													</div>
												</div>
												<!--end::Col-->
											</div>
											<!--end::Row-->
											<!--begin::Row-->
											<div class="row">
												<!--begin::Col-->
												<div class="col-xl-3">
													<div class="fs-6 fw-bold mt-2 mb-3">Disable Application Workflow</div>
												</div>
												<!--end::Col-->
												<!--begin::Col-->
												<div class="col-xl-9">
													<div class="form-check btn-success form-switch form-check-custom form-check-solid" style="color:green;">
														<input class="form-check-input btn-success" type="checkbox" value="" id="status" style="background-color:green;" name="status" checked="checked" />
														<label class="form-check-label fw-bold text-gray-400 ms-3" for="status">Activate</label>
													</div>
												</div>
												<!--end::Col-->
											</div>
											<!--end::Row-->
										</div>
										<!--end::Card body-->
										<!--begin::Card footer-->
										<div class="card-footer d-flex justify-content-end py-6 px-9">
											<button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                                            <button type="submit" class="btn btn-primary" id="kt_project_settings_submit">Save Changes</button>
										</div>
										<!--end::Card footer-->
									</form>
									<!--end:Form-->
								</div>
<div class="card mb-5 mb-xl-10">
									<!--begin::Card header-->
									<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_connected_accounts" aria-expanded="true" aria-controls="kt_account_connected_accounts">
										<div class="card-title m-0">
											<h2 class="fw-bolder m-0">System Configurations</h2>
										</div>
									</div>
									<!--end::Card header-->
									<!--begin::Content-->
									<div id="kt_account_settings_connected_accounts" class="collapse show">
										<!--begin::Card body-->
										<div class="card-body border-top p-9">
											
											<!--begin::Items-->
											<div class="py-2">
												<!--begin::Item-->
												<div class="d-flex flex-stack">
													<div class="d-flex">
														<!-- <img src="assets/media/svg/brand-logos/google-icon.svg" class="w-30px me-6" alt="" /> -->
														<div class="d-flex flex-column">
															<a href="#" class="fs-5 text-dark text-hover-primary fw-bolder">Shutdown</a>
															<div class="fs-6 fw-bold text-gray-400">This actions is goign to shutdown ENSITF</div>
														</div>
													</div>
													<div class="d-flex justify-content-end btn-success">
														<div class="form-check form-check-solid form-switch">
															<input class="form-check-input w-45px h-30px" type="checkbox" id="googleswitch" checked="checked" />
															<label class="form-check-label" for="googleswitch"></label>
														</div>
													</div>
												</div>
												<!--end::Item-->
												<div class="separator separator-dashed my-5"></div>
												<!--begin::Item-->
												<div class="d-flex flex-stack">
													<div class="d-flex">
													
														<div class="d-flex flex-column">
															<a href="#" class="fs-5 text-dark text-hover-primary fw-bolder">Themes</a>
															<div class="fs-6 fw-bold text-gray-400">Enable dark/ white mode</div>
														</div>
													</div>
													<div class="d-flex justify-content-end">
														<div class="form-check form-check-solid form-switch">
															<input class="form-check-input w-45px h-30px" type="checkbox" id="githubswitch" checked="checked" />
															<label class="form-check-label" for="githubswitch"></label>
														</div>
													</div>
												</div>
												<!--end::Item-->
												<div class="separator separator-dashed my-5"></div>
												<!--begin::Item-->
												<div class="d-flex flex-stack">
													<div class="d-flex">
													
														<div class="d-flex flex-column">
															<a href="#" class="fs-5 text-dark text-hover-primary fw-bolder">Tracker</a>
															<div class="fs-6 fw-bold text-gray-400">Enabling tracker gives you log's when they multiple failed login attemps</div>
														</div>
													</div>
													<div class="d-flex justify-content-end">
														<div class="form-check form-check-solid form-switch">
															<input class="form-check-input w-45px h-30px" type="checkbox" id="slackswitch" />
															<label class="form-check-label" for="slackswitch"></label>
														</div>
													</div>
												</div>
												<!--end::Item-->
											</div>
											<!--end::Items-->
										</div>
										<!--end::Card body-->
										<!--begin::Card footer-->
										<div class="card-footer d-flex justify-content-end py-6 px-9">
											<button class="btn btn-light btn-active-light-primary me-2">Discard</button>
											<button class="btn btn-primary">Save Changes</button>
										</div>
										<!--end::Card footer-->
									</div>
									<!--end::Content-->
								</div>

								



<div class="col-6">
<div class="card mb-5 mb-xl-10">
									<!--begin::Card header-->
									<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_email_preferences" aria-expanded="true" aria-controls="kt_account_email_preferences">
										<div class="card-title m-0">
											<h2 class="fw-bolder m-0">Human Resource Settings</h2>
										</div>
									</div>
									<!--begin::Card header-->
									<!--begin::Content-->
									<div id="kt_account_settings_email_preferences" class="collapse show">
										<!--begin::Form-->
										<form class="form">
											<!--begin::Card body-->
											<div class="card-body border-top px-9 py-9">
												<!--begin::Option-->
												<label class="form-check form-check-custom form-check-solid align-items-start">
													<!--begin::Input-->
													<input class="form-check-input me-3" type="checkbox" name="email-preferences[]" value="1" />
													<!--end::Input-->
													<!--begin::Label-->
													<span class="form-check-label d-flex flex-column align-items-start">
														<span class="fs-5 text-dark text-hover-primary fw-bolder">Holiday Request Approval</span>
														<span class="text-muted fs-6">Enable approval workflows for holiday requests..</span>
													</span>
													<!--end::Label-->
												</label>
												<!--end::Option-->
												<!--begin::Option-->
												<div class="separator separator-dashed my-6"></div>
												<!--end::Option-->
												<!--begin::Option-->
												<label class="form-check form-check-custom form-check-solid align-items-start">
													<!--begin::Input-->
													<input class="form-check-input me-3" type="checkbox" name="email-preferences[]" checked="checked" value="1" />
													<!--end::Input-->
													<!--begin::Label-->
													<span class="form-check-label d-flex flex-column align-items-start">
														<span class="fs-5 text-dark text-hover-primary fw-bolder">Leave Approval</span>
														<span class="text-muted fs-6">Set up approval processes for leave requests.</span>
													</span>
													<!--end::Label-->
												</label>
												<!--end::Option-->
												<!--begin::Option-->
												<div class="separator separator-dashed my-6"></div>
												<!--end::Option-->
												<!--begin::Option-->
												<label class="form-check form-check-custom form-check-solid align-items-start">
													<!--begin::Input-->
													<input class="form-check-input me-3" type="checkbox" name="email-preferences[]" value="1" />
													<!--end::Input-->
													<!--begin::Label-->
													<span class="form-check-label d-flex flex-column align-items-start">
														<span class="fs-5 text-dark text-hover-primary fw-bolder">Fee Collection</span>
														<span class="text-muted fs-6">Receive a notification each time you collect a fee from sales</span>
													</span>
													<!--end::Label-->
												</label>
												<!--end::Option-->
												<!--begin::Option-->
												<div class="separator separator-dashed my-6"></div>
										
												<!--end::Option-->
												<!--begin::Option-->
												<label class="form-check form-check-custom form-check-solid align-items-start">
													<!--begin::Input-->
													<input class="form-check-input me-3" type="checkbox" name="email-preferences[]" value="1" />
													<!--end::Input-->
													<!--begin::Label-->
													<span class="form-check-label d-flex flex-column align-items-start">
														<b class="fs-5 text-dark text-hover-primary fw-bolder">Promotion Approval</b>
														<span class="text-muted fs-6">Enable approval workflows for promotion requests.</span>
													</span>
													<!--end::Label-->
												</label>
												<!--end::Option-->
											</div>
											<!--end::Card body-->
											<!--begin::Card footer-->
											<div class="card-footer d-flex justify-content-end py-6 px-9">
												<button class="btn btn-light btn-active-light-primary me-2">Discard</button>
												<button class="btn btn-primary px-6">Save Changes</button>
											</div>
											<!--end::Card footer-->
										</form>
										<!--end::Form-->
									</div>
									<!--end::Content-->
								</div>
</div>
<div class="col-6">

<div class="card mb-5 mb-xl-10">
									<!--begin::Card header-->
									<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_email_preferences" aria-expanded="true" aria-controls="kt_account_email_preferences">
										<div class="card-title m-0">
											<h2 class="fw-bolder m-0">Permission and Role Setting</h2>
										</div>
									</div>
									<!--begin::Card header-->
									<!--begin::Content-->
									<div id="kt_account_settings_email_preferences" class="collapse show">
										<!--begin::Form-->
										<form class="form">
											<!--begin::Card body-->
											<div class="card-body border-top px-9 py-9">
												<!--begin::Option-->
												<label class="form-check form-check-custom form-check-solid align-items-start">
													<!--begin::Input-->
													<input class="form-check-input me-3" type="checkbox" name="email-preferences[]" value="1" />
													<!--end::Input-->
													<!--begin::Label-->
													<span class="form-check-label d-flex flex-column align-items-start">
														<span class="fs-5 text-dark text-hover-primary fw-bolder">Role-Based Access:</span>
														<span class="text-muted fs-6">Control access to various modules and features based on user roles.</span>
													</span>
													<!--end::Label-->
												</label>
												<!--end::Option-->
												<!--begin::Option-->
												
											
												<div class="separator separator-dashed my-6"></div>
												<!--end::Option-->
												<!--begin::Option-->
												<label class="form-check form-check-custom form-check-solid align-items-start">
													<!--begin::Input-->
													<input class="form-check-input me-3" type="checkbox" name="email-preferences[]" value="1" />
													<!--end::Input-->
													<!--begin::Label-->
													<span class="form-check-label d-flex flex-column align-items-start">
														<span class="fs-5 text-dark text-hover-primary fw-bolder">Custom Permissions</span>
														<span class="text-muted fs-6">Allow the customization of permission settings for specific modules.</span>
													</span>
													<!--end::Label-->
												</label>
												<!--end::Option-->
												<!--begin::Option-->
												<div class="separator separator-dashed my-6"></div>
												<!--end::Option-->
												<!--begin::Option-->
												<label class="form-check form-check-custom form-check-solid align-items-start">
													<!--begin::Input-->
													<input class="form-check-input me-3" type="checkbox" name="email-preferences[]" checked="checked" value="1" />
													<!--end::Input-->
													<!--begin::Label-->
													<span class="form-check-label d-flex flex-column align-items-start">
														<span class="fs-5 text-dark text-hover-primary fw-bolder">User-Specific Permissions</span>
														<span class="text-muted fs-6"> Permit individual user-specific permission settings.</span>
													</span>
													<!--end::Label-->
												</label>
												<!--end::Option-->
												<!--begin::Option-->
												<div class="separator separator-dashed my-6"></div>
												<!--end::Option-->
												<!--begin::Option-->
												<label class="form-check form-check-custom form-check-solid align-items-start">
													<!--begin::Input-->
													<input class="form-check-input me-3" type="checkbox" name="email-preferences[]" value="1" />
													<!--end::Input-->
													<!--begin::Label-->
													<span class="form-check-label d-flex flex-column align-items-start">
														<span class="fs-5 text-dark text-hover-primary fw-bolder">Access Control Logs</span>
														<span class="text-muted fs-6">Enable the logging of permission and role changes.</span>
													</span>
													<!--end::Label-->
												</label>
												<!--end::Option-->
											</div>
											<!--end::Card body-->
											<!--begin::Card footer-->
											<div class="card-footer d-flex justify-content-end py-6 px-9">
												<button class="btn btn-light btn-active-light-primary me-2">Discard</button>
												<button class="btn btn-primary px-6">Save Changes</button>
											</div>
											<!--end::Card footer-->
										</form>
										<!--end::Form-->
									</div>
									<!--end::Content-->
								</div>
</div>
     <div class="col-xl-6">
										<!--begin::Contacts-->
										<div class="card card-flush h-lg-100" id="kt_contacts_main">
											<!--begin::Card header-->
											<div class="card-header pt-7" id="kt_chat_contacts_header">
												<!--begin::Card title-->
												<div class="card-title">
													<!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
													<span class="svg-icon svg-icon-1 me-2">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<path d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z" fill="currentColor" />
															<path opacity="0.3" d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z" fill="currentColor" />
														</svg>
													</span>
													<!--end::Svg Icon-->
													<h2>Email Settings</h2>
												</div>
												<!--end::Card title-->
											</div>
											<!--end::Card header-->
											<!--begin::Card body-->
											<div class="card-body pt-5">
												<!--begin::Form-->
												<form id="kt_ecommerce_settings_general_form" class="form" action="#">
												
													<!--begin::Input group-->
													
													<div class="fv-row mb-7">
														<!--begin::Label-->
														<label class="fs-6 fw-bold form-label mt-3">
															<span>Mail Host</span>
															<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Enter the contact's company name (optional)."></i>
														</label>
														<!--end::Label-->
														<!--begin::Input-->
														<input type="text" class="form-control form-control-solid" name="company_name" value="" />
														<!--end::Input-->
													</div>
													<!--end::Input group-->
													<!--begin::Row-->
													<div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
														<!--begin::Col-->
														<div class="col">
															<!--begin::Input group-->
															<div class="fv-row mb-7">
																<!--begin::Label-->
																<label class="fs-6 fw-bold form-label mt-3">
																	<span class="required">Mail Username</span>
																	<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Enter the contact's email."></i>
																</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="email" class="form-control form-control-solid" name="email" value="smith@kpmg.com" />
																<!--end::Input-->
															</div>
															<!--end::Input group-->
														</div>
														<!--end::Col-->
														<!--begin::Col-->
														<div class="col">
															<!--begin::Input group-->
															<div class="fv-row mb-7">
																<!--begin::Label-->
																<label class="fs-6 fw-bold form-label mt-3">
																	<span>Mail Password</span>
																	<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Enter the contact's phone number (optional)."></i>
																</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="text" class="form-control form-control-solid" name="phone" value="" />
																<!--end::Input-->
															</div>
															<!--end::Input group-->
														</div>
														<!--end::Col-->
													</div>
													<!--end::Row-->
													<!--begin::Row-->
													<div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
														<!--begin::Col-->
														<div class="col">
															<!--begin::Input group-->
															<div class="fv-row mb-7">
																<!--begin::Label-->
																<label class="fs-6 fw-bold form-label mt-3">
																	<span>Mail Driver</span>
																	<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Enter the contact's city of residence (optional)."></i>
																</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="text" class="form-control form-control-solid" name="city" value="Melbourne" />
																<!--end::Input-->
															</div>
															<!--end::Input group-->
														</div>
														<!--end::Col-->
														<!--begin::Col-->
														<div class="col">
															<!--begin::Input group-->
															<div class="fv-row mb-7">
																<!--begin::Label-->
																<label class="fs-6 fw-bold form-label mt-3">
																	<span class="required">Mail Port</span>
																</label>
																<!--end::Label-->
																<div class="w-100">
																	<div class="form-floating border rounded">
																		<!--begin::Select2-->
																		<select id="kt_ecommerce_select2_country" class="form-select form-select-solid lh-1 py-3" name="country" data-kt-ecommerce-settings-type="select2_flags" data-placeholder="Select a country">
																			<option></option>
																			<option value="AF" data-kt-select2-country="assets/media/flags/afghanistan.svg">465</option>
																			<option value="AX" data-kt-select2-country="assets/media/flags/aland-islands.svg">587</option>
																			
																			
																			
																			<option value="VI" data-kt-select2-country="assets/media/flags/virgin-islands.svg">25</option>
																			
																		</select>
																		<!--end::Select2-->
																	</div>
																</div>
															</div>
															<!--end::Input group-->
														</div>
                                                        <div class="col">
															<!--begin::Input group-->
															<div class="fv-row mb-7">
																<!--begin::Label-->
																<label class="fs-6 fw-bold form-label mt-3">
																	<span class="required">Mail From Address</span>
																	<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Enter the contact's email."></i>
																</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="email" class="form-control form-control-solid" name="email" value="smith@kpmg.com" />
																<!--end::Input-->
															</div>
															<!--end::Input group-->
														</div>
                                                        <div class="col">
															<!--begin::Input group-->
															<div class="fv-row mb-7">
																<!--begin::Label-->
																<label class="fs-6 fw-bold form-label mt-3">
																	<span class="required">Mail Encryption</span>
																	<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Enter the contact's email."></i>
																</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="email" class="form-control form-control-solid" name="email" value="smith@kpmg.com" />
																<!--end::Input-->
															</div>
															<!--end::Input group-->
														</div>
														<!--end::Col-->
													</div>
													<!--end::Row-->
													<!--begin::Input group-->
													
													<!--end::Input group-->
													<!--begin::Separator-->
													<div class="separator mb-6"></div>
													<!--end::Separator-->
													<!--begin::Action buttons-->
													<div class="d-flex justify-content-end">
														<!--begin::Button-->
														<button type="reset" data-kt-contacts-type="cancel" class="btn btn-light me-3">Send Test Mail</button>
														<!--end::Button-->
														<!--begin::Button-->
														<button type="submit" data-kt-contacts-type="submit" class="btn btn-primary">
															<span class="indicator-label">Save Changes</span>
															<span class="indicator-progress">Please wait...
															<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
														</button>
														<!--end::Button-->
													</div>
													<!--end::Action buttons-->
												</form>
												<!--end::Form-->
											</div>
											<!--end::Card body-->
										</div>
										<!--end::Contacts-->
									</div>
                                    <div class="col-xl-6">
										<!--begin::Contacts-->
										<div class="card card-flush h-lg-100" id="kt_contacts_main">
											<!--begin::Card header-->
											<div class="card-header pt-7" id="kt_chat_contacts_header">
												<!--begin::Card title-->
												<div class="card-title">
												
													<span class="svg-icon svg-icon-1 me-2">
														
													</span>
													<!--end::Svg Icon-->
													<h2>API Settings</h2>
												</div>
												<!--end::Card title-->
											</div>
											<!--end::Card header-->
											<!--begin::Card body-->
											<div class="card-body pt-5">
												<!--begin::Form-->
												<form id="kt_ecommerce_settings_general_form" class="form" action="#">
												
													<!--begin::Input group-->
													
													<div class="fv-row mb-7">
														<!--begin::Label-->
														<label class="fs-6 fw-bold form-label mt-3">
															<span>Mail Host</span>
															<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Enter the contact's company name (optional)."></i>
														</label>
														<!--end::Label-->
														<!--begin::Input-->
														<input type="text" class="form-control form-control-solid" name="company_name" value="" />
														<!--end::Input-->
													</div>
													<!--end::Input group-->
													<!--begin::Row-->
													<div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
														<!--begin::Col-->
														<div class="col">
															<!--begin::Input group-->
															<div class="fv-row mb-7">
																<!--begin::Label-->
																<label class="fs-6 fw-bold form-label mt-3">
																	<span class="required">Mail Username</span>
																	<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Enter the contact's email."></i>
																</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="email" class="form-control form-control-solid" name="email" value="smith@kpmg.com" />
																<!--end::Input-->
															</div>
															<!--end::Input group-->
														</div>
														<!--end::Col-->
														<!--begin::Col-->
														<div class="col">
															<!--begin::Input group-->
															<div class="fv-row mb-7">
																<!--begin::Label-->
																<label class="fs-6 fw-bold form-label mt-3">
																	<span>Mail Password</span>
																	<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Enter the contact's phone number (optional)."></i>
																</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="text" class="form-control form-control-solid" name="phone" value="" />
																<!--end::Input-->
															</div>
															<!--end::Input group-->
														</div>
														<!--end::Col-->
													</div>
                                                    <hr />
													<!--end::Row-->
													<!--begin::Row-->
                                                    <div class="card-title">
												
													<span class="svg-icon svg-icon-1 me-2">
														
													</span>
													<!--end::Svg Icon-->
													<h2>Payment Settings</h2>
												</div>
                                                <br>
													<div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
														<!--begin::Col-->
														<div class="col">
															<!--begin::Input group-->
															<div class="fv-row mb-7">
																<!--begin::Label-->
																<label class="fs-6 fw-bold form-label mt-3">
																	<span>Public Key</span>
																	<!-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Enter the contact's city of residence (optional)."></i> -->
																</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="text" class="form-control form-control-solid" name="city" value="*********************" />
																<!--end::Input-->
															</div>
															<!--end::Input group-->
														</div>
														<!--end::Col-->
														<!--begin::Col-->
														<div class="col">
															<!--begin::Input group-->
															<div class="fv-row mb-7">
																<!--begin::Label-->
																<label class="fs-6 fw-bold form-label mt-3">
																	<span>Secret Key</span>
																	<!-- <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Enter the contact's city of residence (optional)."></i> -->
																</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="text" class="form-control form-control-solid" name="city" value="**************************" />
																<!--end::Input-->
															</div>
															<!--end::Input group-->
														</div>
															<!--end::Input group-->
													
                                                       
                                                      
														<!--end::Col-->
													</div>
													<!--end::Row-->
													<!--begin::Input group-->
													
													<!--end::Input group-->
													<!--begin::Separator-->
													<div class="separator mb-6"></div>
													<!--end::Separator-->
													<!--begin::Action buttons-->
													<div class="d-flex justify-content-end">
														<!--begin::Button-->
														<button type="reset" data-kt-contacts-type="cancel" class="btn btn-light me-3">Send Test Mail</button>
														<!--end::Button-->
														<!--begin::Button-->
														<button type="submit" data-kt-contacts-type="submit" class="btn btn-primary">
															<span class="indicator-label">Save Changes</span>
															<span class="indicator-progress">Please wait...
															<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
														</button>
														<!--end::Button-->
													</div>
													<!--end::Action buttons-->
												</form>
												<!--end::Form-->
											</div>
											<!--end::Card body-->
										</div>
									



									</div>


</div>
</div>
<br>
<div class="card mb-5 mb-lg-10">
									<!--begin::Card header-->
									<div class="card-header">
										<!--begin::Heading-->
										<div class="card-title">
											<h3>Suspicious Login Sessions</h3>
										</div>
										<!--end::Heading-->
										<!--begin::Toolbar-->
										<div class="card-toolbar">
											<div class="my-1 me-4">
												<!--begin::Select-->
												<select class="form-select form-select-sm form-select-solid w-125px" data-control="select2" data-placeholder="Select Hours" data-hide-search="true">
													<option value="1" selected="selected">1 Hours</option>
													<option value="2">6 Hours</option>
													<option value="3">12 Hours</option>
													<option value="4">24 Hours</option>
												</select>
												<!--end::Select-->
											</div>
											<a href="#" class="btn btn-sm btn-primary my-1">View All</a>
										</div>
										<!--end::Toolbar-->
									</div>
									<!--end::Card header-->
									<!--begin::Card body-->
									<div class="card-body p-0">
										<!--begin::Table wrapper-->
										<div class="table-responsive">
											<!--begin::Table-->
											<table class="table table-flush align-middle table-row-bordered table-row-solid gy-4 gs-9">
												<!--begin::Thead-->
												<thead class="border-gray-200 fs-5 fw-bold bg-lighten">
													<tr>
														<th class="min-w-250px">Location</th>
														<th class="min-w-100px">Status</th>
														<th class="min-w-150px">Device</th>
														<th class="min-w-150px">IP Address</th>
														<th class="min-w-150px">Time</th>
													</tr>
												</thead>
												<!--end::Thead-->
												<!--begin::Tbody-->
												<tbody class="fw-6 fw-bold text-gray-600">
													<tr>
														<td>
															<a href="#" class="text-hover-primary text-gray-600">USA(5)</a>
														</td>
														<td>
															<span class="badge badge-light-success fs-7 fw-bolder">OK</span>
														</td>
														<td>Chrome - Windows</td>
														<td>236.125.56.78</td>
														<td>2 mins ago</td>
													</tr>
													<tr>
														<td>
															<a href="#" class="text-hover-primary text-gray-600">United Kingdom(10)</a>
														</td>
														<td>
															<span class="badge badge-light-success fs-7 fw-bolder">OK</span>
														</td>
														<td>Safari - Mac OS</td>
														<td>236.125.56.78</td>
														<td>10 mins ago</td>
													</tr>
													<tr>
														<td>
															<a href="#" class="text-hover-primary text-gray-600">Norway(-)</a>
														</td>
														<td>
															<span class="badge badge-light-danger fs-7 fw-bolder">ERR</span>
														</td>
														<td>Firefox - Windows</td>
														<td>236.125.56.10</td>
														<td>20 mins ago</td>
													</tr>
													<tr>
														<td>
															<a href="#" class="text-hover-primary text-gray-600">Japan(112)</a>
														</td>
														<td>
															<span class="badge badge-light-success fs-7 fw-bolder">OK</span>
														</td>
														<td>iOS - iPhone Pro</td>
														<td>236.125.56.54</td>
														<td>30 mins ago</td>
													</tr>
													<tr>
														<td>
															<a href="#" class="text-hover-primary text-gray-600">Italy(5)</a>
														</td>
														<td>
															<span class="badge badge-light-warning fs-7 fw-bolder">WRN</span>
														</td>
														<td>Samsung Noted 5- Android</td>
														<td>236.100.56.50</td>
														<td>40 mins ago</td>
													</tr>
												</tbody>
												<!--end::Tbody-->
											</table>
											<!--end::Table-->
										</div>
										<!--end::Table wrapper-->
									</div>
									<!--end::Card body-->
								</div>

                                <div class="card pt-4">
									<!--begin::Card header-->
									<div class="card-header border-0">
										<!--begin::Card title-->
										<div class="card-title">
											<h2>Application Logs</h2>
										</div>
										<!--end::Card title-->
										<!--begin::Card toolbar-->
										<div class="card-toolbar">
											<!--begin::Button-->
											<button type="button" class="btn btn-sm btn-light-primary">
											<!--begin::Svg Icon | path: icons/duotune/files/fil021.svg-->
											<span class="svg-icon svg-icon-3">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<path opacity="0.3" d="M19 15C20.7 15 22 13.7 22 12C22 10.3 20.7 9 19 9C18.9 9 18.9 9 18.8 9C18.9 8.7 19 8.3 19 8C19 6.3 17.7 5 16 5C15.4 5 14.8 5.2 14.3 5.5C13.4 4 11.8 3 10 3C7.2 3 5 5.2 5 8C5 8.3 5 8.7 5.1 9H5C3.3 9 2 10.3 2 12C2 13.7 3.3 15 5 15H19Z" fill="currentColor" />
													<path d="M13 17.4V12C13 11.4 12.6 11 12 11C11.4 11 11 11.4 11 12V17.4H13Z" fill="currentColor" />
													<path opacity="0.3" d="M8 17.4H16L12.7 20.7C12.3 21.1 11.7 21.1 11.3 20.7L8 17.4Z" fill="currentColor" />
												</svg>
											</span>
											<!--end::Svg Icon-->Download Report</button>
											<!--end::Button-->
										</div>
										<!--end::Card toolbar-->
									</div>
									<!--end::Card header-->
									<!--begin::Card body-->
									<div class="card-body py-0">
										<!--begin::Table wrapper-->
										<div class="table-responsive">
											<!--begin::Table-->
											<table class="table align-middle table-row-dashed fw-bold text-gray-600 fs-6 gy-5" id="kt_table_customers_logs">
												<!--begin::Table body-->
                                                <tbody>
                                                @foreach ($logs as $log) {
                                                    $log = json_decode($log, true);

    $timestamp = date('Y-m-d H:i:s', $log->timestamp);

    $parsedLogs[] = $log;

    <tr>
        <td>{{ $log->timestamp }}</td>
        <td>{{ $log->level }}</td>
        <td>{{ htmlspecialchars($log->message) }}</td>
    </tr>
}
@endforeach

                                                
    </tbody>
												<!--end::Table body-->
											</table>
											<!--end::Table-->
										</div>
										<!--end::Table wrapper-->
									</div>
									<!--end::Card body-->



                                    
								</div>
<br>

        @endsection