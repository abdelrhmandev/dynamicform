<div id="kt_header" style="" class="header  align-items-stretch">
	<!--begin::Container-->
	<div class=" container-fluid  d-flex align-items-stretch justify-content-between">
	   <!--begin::Aside mobile toggle-->
	   <div class="d-flex align-items-center d-lg-none ms-n1 me-2" title="Show aside menu">
		  <div class="btn btn-icon btn-active-color-primary w-30px h-30px w-md-40px h-md-40px" id="kt_aside_mobile_toggle">
			 <i class="ki-outline ki-abstract-14 fs-1"></i>				
		  </div>
	   </div>
	   <!--end::Aside mobile toggle-->
	   <!--begin::Mobile logo-->
	   <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
		  <a href="" class="d-lg-none">
		  <img alt="" src="<?php echo e(asset('assets/media/logos/logo.svg')); ?>" class="h-25px"/>
		  </a>
	   </div>
	   <!--end::Mobile logo-->
	   <!--begin::Wrapper-->
	   <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
		  <!--begin::Navbar-->
		  <div class="d-flex align-items-stretch" id="kt_header_nav">
			 <!--begin::Menu wrapper-->
			 <div class="header-menu align-items-stretch"
				data-kt-drawer="true"
				data-kt-drawer-name="header-menu"
				data-kt-drawer-activate="{default: true, lg: false}"
				data-kt-drawer-overlay="true"
				data-kt-drawer-width="{default:'200px', '300px': '250px'}"
				data-kt-drawer-direction="end"
				data-kt-drawer-toggle="#kt_header_menu_mobile_toggle"
				data-kt-swapper="true"
				data-kt-swapper-mode="prepend"
				data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}"
				>
				<!--begin::Menu-->
				<div class="menu menu-rounded menu-column menu-lg-row menu-active-bg menu-state-primary menu-title-gray-700 menu-arrow-gray-500 fw-semibold my-5 my-lg-0 px-2 px-lg-0 align-items-stretch" 
				   id="#kt_header_menu" 
				   data-kt-menu="true"
				   >
				   <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-<?php echo e((app()->getLocale() === 'en') ? 'start':'end'); ?>"  class="menu-item here show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
					<span class="menu-link py-3"><span  class="menu-title" >Beta Version</span><span  class="menu-arrow d-lg-none" ></span></span>					  
				  </div>

				   <!--begin:Menu item-->
				   
				   <!--end:Menu item--><!--begin:Menu item-->
				   
				   <!--end:Menu item--><!--begin:Menu item-->
				   
				   <!--end:Menu item--><!--begin:Menu item-->
				   
				   <!--end:Menu item-->    
				</div>
				<!--end::Menu-->
			 </div>
			 <!--end::Menu wrapper-->
		  </div>
		  <!--end::Navbar-->
		  <!--begin::Toolbar wrapper-->
		  <div class="d-flex align-items-stretch flex-shrink-0">
			 <!--begin::Search-->
			 <div class="d-flex align-items-stretch ms-1 ms-lg-3">
				<!--begin::Search-->
				<div 
				   id="kt_header_search" 
				   class="header-search d-flex align-items-stretch" 
				   data-kt-search-keypress="true"
				   data-kt-search-min-length="2"
				   data-kt-search-enter="enter"     
				   data-kt-search-layout="menu"
				   data-kt-menu-trigger="auto" 
				   data-kt-menu-overflow="false" 
				   data-kt-menu-permanent="true" 
				   data-kt-menu-placement="bottom-<?php echo e((app()->getLocale() === 'en') ? 'start':'end'); ?>" 
				   >
				   <!--begin::Search toggle-->
				   <div class="d-flex align-items-center" data-kt-search-element="toggle" id="kt_header_search_toggle">
					  <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px">
						 <i class="ki-outline ki-magnifier fs-1"></i>                    
					  </div>
				   </div>
				   <!--end::Search toggle-->
				   <!--begin::Menu-->
				   <div data-kt-search-element="content" class="menu menu-sub menu-sub-dropdown p-7 w-325px w-md-375px">
					  <!--begin::Wrapper-->
					  <div data-kt-search-element="wrapper">
						 <!--begin::Form-->
						 <form data-kt-search-element="form" class="w-100 position-relative mb-3" autocomplete="off">
							<!--begin::Icon-->
							<i class="ki-outline ki-magnifier fs-2 text-gray-500 position-absolute top-50 translate-middle-y ms-0"></i>    <!--end::Icon-->
							<!--begin::Input-->
							<input type="text" class="search-input  form-control form-control-flush ps-10" name="search" value="" placeholder="Search..." data-kt-search-element="input"/>
							<!--end::Input-->
							<!--begin::Spinner-->
							<span class="search-spinner  position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-1" data-kt-search-element="spinner">
							<span class="spinner-border h-15px w-15px align-middle text-gray-500"></span>
							</span>
							<!--end::Spinner-->
							<!--begin::Reset-->
							<span class="search-reset  btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 d-none" data-kt-search-element="clear">
							<i class="ki-outline ki-cross fs-2 fs-lg-1 me-0"></i>    </span>
							<!--end::Reset-->
							<!--begin::Toolbar-->
							<div class="position-absolute top-50 end-0 translate-middle-y" data-kt-search-element="toolbar">
							   <!--begin::Preferences toggle-->
							   <div data-kt-search-element="preferences-show" class="btn btn-icon w-20px btn-sm btn-active-color-primary me-1" data-bs-toggle="tooltip" title="Show search preferences">
								  <i class="ki-outline ki-setting-2 fs-2"></i>        
							   </div>
							   <!--end::Preferences toggle-->
							   <!--begin::Advanced search toggle-->
							   <div data-kt-search-element="advanced-options-form-show" class="btn btn-icon w-20px btn-sm btn-active-color-primary" data-bs-toggle="tooltip" title="Show more search options">
								  <i class="ki-outline ki-down fs-2"></i>        
							   </div>
							   <!--end::Advanced search toggle-->
							</div>
							<!--end::Toolbar-->
						 </form>
						 <!--end::Form-->
						 <!--begin::Separator-->
						 <div class="separator border-gray-200 mb-6"></div>
						 <!--end::Separator-->
						 <!--begin::Recently viewed-->
						 <div data-kt-search-element="results" class="d-none">
							<!--begin::Items-->
							<div class="scroll-y mh-200px mh-lg-350px">
							   <!--begin::Category title-->
							   <h3 class="fs-5 text-muted m-0  pb-5" data-kt-search-element="category-title">
								  Users            
							   </h3>
							   <!--end::Category title-->
							   <!--begin::Item-->
							   <a href="#" class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
								  <!--begin::Symbol-->
								  <div class="symbol symbol-40px me-4">
									 <img src="<?php echo e(asset('assets/media/avatars/300-6.jpg')); ?>" alt=""/>
								  </div>
								  <!--end::Symbol-->
								  <!--begin::Title-->
								  <div class="d-flex flex-column justify-content-start fw-semibold">
									 <span class="fs-6 fw-semibold">Karina Clark</span>
									 <span class="fs-7 fw-semibold text-muted">Marketing Manager</span>
								  </div>
								  <!--end::Title-->
							   </a>
							   <!--end::Item-->
							   <!--begin::Item-->
							   <a href="#" class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
								  <!--begin::Symbol-->
								  <div class="symbol symbol-40px me-4">
									 <img src="<?php echo e(asset('assets/media/avatars/300-2.jpg')); ?>" alt=""/>
								  </div>
								  <!--end::Symbol-->
								  <!--begin::Title-->
								  <div class="d-flex flex-column justify-content-start fw-semibold">
									 <span class="fs-6 fw-semibold">Olivia Bold</span>
									 <span class="fs-7 fw-semibold text-muted">Software Engineer</span>
								  </div>
								  <!--end::Title-->
							   </a>
							   <!--end::Item-->
							   <!--begin::Item-->
							   <a href="#" class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
								  <!--begin::Symbol-->
								  <div class="symbol symbol-40px me-4">
									 <img src="<?php echo e(asset('assets/media/avatars/300-9.jpg')); ?>" alt=""/>
								  </div>
								  <!--end::Symbol-->
								  <!--begin::Title-->
								  <div class="d-flex flex-column justify-content-start fw-semibold">
									 <span class="fs-6 fw-semibold">Ana Clark</span>
									 <span class="fs-7 fw-semibold text-muted">UI/UX Designer</span>
								  </div>
								  <!--end::Title-->
							   </a>
							   <!--end::Item-->
							   <!--begin::Item-->
							   <a href="#" class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
								  <!--begin::Symbol-->
								  <div class="symbol symbol-40px me-4">
									 <img src="<?php echo e(asset('assets/media/avatars/300-14.jpg')); ?>" alt=""/>
								  </div>
								  <!--end::Symbol-->
								  <!--begin::Title-->
								  <div class="d-flex flex-column justify-content-start fw-semibold">
									 <span class="fs-6 fw-semibold">Nick Pitola</span>
									 <span class="fs-7 fw-semibold text-muted">Art Director</span>
								  </div>
								  <!--end::Title-->
							   </a>
							   <!--end::Item-->
							   <!--begin::Item-->
							   <a href="#" class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
								  <!--begin::Symbol-->
								  <div class="symbol symbol-40px me-4">
									 <img src="<?php echo e(asset('assets/media/avatars/300-11.jpg')); ?>" alt=""/>
								  </div>
								  <!--end::Symbol-->
								  <!--begin::Title-->
								  <div class="d-flex flex-column justify-content-start fw-semibold">
									 <span class="fs-6 fw-semibold">Edward Kulnic</span>
									 <span class="fs-7 fw-semibold text-muted">System Administrator</span>
								  </div>
								  <!--end::Title-->
							   </a>
							   <!--end::Item-->
							   <!--begin::Category title-->
							   <h3 class="fs-5 text-muted m-0 pt-5 pb-5" data-kt-search-element="category-title">
								  Customers            
							   </h3>
							   <!--end::Category title-->
							   <!--begin::Item-->
							   <a href="#" class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
								  <!--begin::Symbol-->
								  <div class="symbol symbol-40px me-4">
									 <span class="symbol-label bg-light">                             
									 <img class="w-20px h-20px" src="<?php echo e(asset('assets/media/svg/brand-logos/volicity-9.svg')); ?>" alt=""/>                          
									 </span>
								  </div>
								  <!--end::Symbol-->
								  <!--begin::Title-->
								  <div class="d-flex flex-column justify-content-start fw-semibold">
									 <span class="fs-6 fw-semibold">Company Rbranding</span>
									 <span class="fs-7 fw-semibold text-muted">UI Design</span>
								  </div>
								  <!--end::Title-->
							   </a>
							   <!--end::Item-->
							   <!--begin::Item-->
							   <a href="#" class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
								  <!--begin::Symbol-->
								  <div class="symbol symbol-40px me-4">
									 <span class="symbol-label bg-light">                             
									 <img class="w-20px h-20px" src="<?php echo e(asset('assets/media/svg/brand-logos/tvit.svg')); ?>" alt=""/>                          
									 </span>
								  </div>
								  <!--end::Symbol-->
								  <!--begin::Title-->
								  <div class="d-flex flex-column justify-content-start fw-semibold">
									 <span class="fs-6 fw-semibold">Company Re-branding</span>
									 <span class="fs-7 fw-semibold text-muted">Web Development</span>
								  </div>
								  <!--end::Title-->
							   </a>
							   <!--end::Item-->
							   <!--begin::Item-->
							   <a href="#" class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
								  <!--begin::Symbol-->
								  <div class="symbol symbol-40px me-4">
									 <span class="symbol-label bg-light">                             
									 <img class="w-20px h-20px" src="<?php echo e(asset('assets/media/svg/misc/infography.svg')); ?>" alt=""/>                          
									 </span>
								  </div>
								  <!--end::Symbol-->
								  <!--begin::Title-->
								  <div class="d-flex flex-column justify-content-start fw-semibold">
									 <span class="fs-6 fw-semibold">Business Analytics App</span>
									 <span class="fs-7 fw-semibold text-muted">Administration</span>
								  </div>
								  <!--end::Title-->
							   </a>
							   <!--end::Item-->
							   <!--begin::Item-->
							   <a href="#" class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
								  <!--begin::Symbol-->
								  <div class="symbol symbol-40px me-4">
									 <span class="symbol-label bg-light">                             
									 <img class="w-20px h-20px" src="<?php echo e(asset('assets/media/svg/brand-logos/leaf.svg')); ?>" alt=""/>                          
									 </span>
								  </div>
								  <!--end::Symbol-->
								  <!--begin::Title-->
								  <div class="d-flex flex-column justify-content-start fw-semibold">
									 <span class="fs-6 fw-semibold">EcoLeaf App Launch</span>
									 <span class="fs-7 fw-semibold text-muted">Marketing</span>
								  </div>
								  <!--end::Title-->
							   </a>
							   <!--end::Item-->
							   <!--begin::Item-->
							   <a href="#" class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
								  <!--begin::Symbol-->
								  <div class="symbol symbol-40px me-4">
									 <span class="symbol-label bg-light">                             
									 <img class="w-20px h-20px" src="<?php echo e(asset('assets/media/svg/brand-logos/tower.svg')); ?>" alt=""/>                          
									 </span>
								  </div>
								  <!--end::Symbol-->
								  <!--begin::Title-->
								  <div class="d-flex flex-column justify-content-start fw-semibold">
									 <span class="fs-6 fw-semibold">Tower Group Website</span>
									 <span class="fs-7 fw-semibold text-muted">Google Adwords</span>
								  </div>
								  <!--end::Title-->
							   </a>
							   <!--end::Item-->
							   <!--begin::Category title-->
							   <h3 class="fs-5 text-muted m-0 pt-5 pb-5" data-kt-search-element="category-title">
								  Projects            
							   </h3>
							   <!--end::Category title-->
							   <!--begin::Item-->
							   <a href="#" class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
								  <!--begin::Symbol-->
								  <div class="symbol symbol-40px me-4">
									 <span class="symbol-label bg-light">                             
									 <i class="ki-outline ki-notepad fs-2 text-primary"></i>                          
									 </span>
								  </div>
								  <!--end::Symbol-->
								  <!--begin::Title-->
								  <div class="d-flex flex-column">
									 <span class="fs-6 fw-semibold">Si-Fi Project by AU Themes</span>
									 <span class="fs-7 fw-semibold text-muted">#45670</span>
								  </div>
								  <!--end::Title-->
							   </a>
							   <!--end::Item-->
							   <!--begin::Item-->
							   <a href="#" class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
								  <!--begin::Symbol-->
								  <div class="symbol symbol-40px me-4">
									 <span class="symbol-label bg-light">                             
									 <i class="ki-outline ki-frame fs-2 text-primary"></i>                          
									 </span>
								  </div>
								  <!--end::Symbol-->
								  <!--begin::Title-->
								  <div class="d-flex flex-column">
									 <span class="fs-6 fw-semibold">Shopix Mobile App Planning</span>
									 <span class="fs-7 fw-semibold text-muted">#45690</span>
								  </div>
								  <!--end::Title-->
							   </a>
							   <!--end::Item-->
							   <!--begin::Item-->
							   <a href="#" class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
								  <!--begin::Symbol-->
								  <div class="symbol symbol-40px me-4">
									 <span class="symbol-label bg-light">                             
									 <i class="ki-outline ki-message-text-2 fs-2 text-primary"></i>                          
									 </span>
								  </div>
								  <!--end::Symbol-->
								  <!--begin::Title-->
								  <div class="d-flex flex-column">
									 <span class="fs-6 fw-semibold">Finance Monitoring SAAS Discussion</span>
									 <span class="fs-7 fw-semibold text-muted">#21090</span>
								  </div>
								  <!--end::Title-->
							   </a>
							   <!--end::Item-->
							   <!--begin::Item-->
							   <a href="#" class="d-flex text-gray-900 text-hover-primary align-items-center mb-5">
								  <!--begin::Symbol-->
								  <div class="symbol symbol-40px me-4">
									 <span class="symbol-label bg-light">                             
									 <i class="ki-outline ki-profile-circle fs-2 text-primary"></i>                          
									 </span>
								  </div>
								  <!--end::Symbol-->
								  <!--begin::Title-->
								  <div class="d-flex flex-column">
									 <span class="fs-6 fw-semibold">Dashboard Analitics Launch</span>
									 <span class="fs-7 fw-semibold text-muted">#34560</span>
								  </div>
								  <!--end::Title-->
							   </a>
							   <!--end::Item-->
							</div>
							<!--end::Items-->
						 </div>
						 <!--end::Recently viewed-->
						 <!--begin::Recently viewed-->
						 <div class="mb-5" data-kt-search-element="main">
							<!--begin::Heading-->
							<div class="d-flex flex-stack fw-semibold mb-4">
							   <!--begin::Label-->
							   <span class="text-muted fs-6 me-2">Recently Searched: DEMO 2</span>
							   <!--end::Label-->
							</div>
							<!--end::Heading-->
							<!--begin::Items-->
							<div class="scroll-y mh-200px mh-lg-325px">
							   <!--begin::Item-->
							   <div class="d-flex align-items-center mb-5">
								  <!--begin::Symbol-->
								  <div class="symbol symbol-40px me-4">
									 <span class="symbol-label bg-light">                             
									 <i class="ki-outline ki-laptop fs-2 text-primary"></i>                          
									 </span>
								  </div>
								  <!--end::Symbol-->
								  <!--begin::Title-->
								  <div class="d-flex flex-column">
									 <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-semibold">BoomApp by Keenthemes</a>
									 <span class="fs-7 text-muted fw-semibold">#45789</span>
								  </div>
								  <!--end::Title-->
							   </div>
							   <!--end::Item-->
							   <!--begin::Item-->
							   <div class="d-flex align-items-center mb-5">
								  <!--begin::Symbol-->
								  <div class="symbol symbol-40px me-4">
									 <span class="symbol-label bg-light">                             
									 <i class="ki-outline ki-chart-simple fs-2 text-primary"></i>                          
									 </span>
								  </div>
								  <!--end::Symbol-->
								  <!--begin::Title-->
								  <div class="d-flex flex-column">
									 <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-semibold">"Kept API Project Meeting</a>
									 <span class="fs-7 text-muted fw-semibold">#84050</span>
								  </div>
								  <!--end::Title-->
							   </div>
							   <!--end::Item-->
							   <!--begin::Item-->
							   <div class="d-flex align-items-center mb-5">
								  <!--begin::Symbol-->
								  <div class="symbol symbol-40px me-4">
									 <span class="symbol-label bg-light">                             
									 <i class="ki-outline ki-chart fs-2 text-primary"></i>                          
									 </span>
								  </div>
								  <!--end::Symbol-->
								  <!--begin::Title-->
								  <div class="d-flex flex-column">
									 <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-semibold">"KPI Monitoring App Launch</a>
									 <span class="fs-7 text-muted fw-semibold">#84250</span>
								  </div>
								  <!--end::Title-->
							   </div>
							   <!--end::Item-->
							   <!--begin::Item-->
							   <div class="d-flex align-items-center mb-5">
								  <!--begin::Symbol-->
								  <div class="symbol symbol-40px me-4">
									 <span class="symbol-label bg-light">                             
									 <i class="ki-outline ki-chart-line-down fs-2 text-primary"></i>                          
									 </span>
								  </div>
								  <!--end::Symbol-->
								  <!--begin::Title-->
								  <div class="d-flex flex-column">
									 <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-semibold">Project Reference FAQ</a>
									 <span class="fs-7 text-muted fw-semibold">#67945</span>
								  </div>
								  <!--end::Title-->
							   </div>
							   <!--end::Item-->
							   <!--begin::Item-->
							   <div class="d-flex align-items-center mb-5">
								  <!--begin::Symbol-->
								  <div class="symbol symbol-40px me-4">
									 <span class="symbol-label bg-light">                             
									 <i class="ki-outline ki-sms fs-2 text-primary"></i>                          
									 </span>
								  </div>
								  <!--end::Symbol-->
								  <!--begin::Title-->
								  <div class="d-flex flex-column">
									 <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-semibold">"FitPro App Development</a>
									 <span class="fs-7 text-muted fw-semibold">#84250</span>
								  </div>
								  <!--end::Title-->
							   </div>
							   <!--end::Item-->
							   <!--begin::Item-->
							   <div class="d-flex align-items-center mb-5">
								  <!--begin::Symbol-->
								  <div class="symbol symbol-40px me-4">
									 <span class="symbol-label bg-light">                             
									 <i class="ki-outline ki-bank fs-2 text-primary"></i>                          
									 </span>
								  </div>
								  <!--end::Symbol-->
								  <!--begin::Title-->
								  <div class="d-flex flex-column">
									 <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-semibold">Shopix Mobile App</a>
									 <span class="fs-7 text-muted fw-semibold">#45690</span>
								  </div>
								  <!--end::Title-->
							   </div>
							   <!--end::Item-->
							   <!--begin::Item-->
							   <div class="d-flex align-items-center mb-5">
								  <!--begin::Symbol-->
								  <div class="symbol symbol-40px me-4">
									 <span class="symbol-label bg-light">                             
									 <i class="ki-outline ki-chart-line-down fs-2 text-primary"></i>                          
									 </span>
								  </div>
								  <!--end::Symbol-->
								  <!--begin::Title-->
								  <div class="d-flex flex-column">
									 <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-semibold">"Landing UI Design" Launch</a>
									 <span class="fs-7 text-muted fw-semibold">#24005</span>
								  </div>
								  <!--end::Title-->
							   </div>
							   <!--end::Item-->
							</div>
							<!--end::Items-->
						 </div>
						 <!--end::Recently viewed-->
						 <!--begin::Empty-->
						 <div data-kt-search-element="empty" class="text-center d-none">
							<!--begin::Icon-->
							<div class="pt-10 pb-10">
							   <i class="ki-outline ki-search-list fs-4x opacity-50"></i>    
							</div>
							<!--end::Icon-->
							<!--begin::Message-->
							<div class="pb-15 fw-semibold">
							   <h3 class="text-gray-600 fs-5 mb-2">No result found</h3>
							   <div class="text-muted fs-7">Please try again with a different query</div>
							</div>
							<!--end::Message-->
						 </div>
						 <!--end::Empty-->        
					  </div>
					  <!--end::Wrapper-->
					  <!--begin::Preferences-->
					  <form data-kt-search-element="advanced-options-form" class="pt-1 d-none">
						 <!--begin::Heading-->
						 <h3 class="fw-semibold text-gray-900 mb-7">Advanced Search</h3>
						 <!--end::Heading-->
						 <!--begin::Input group-->
						 <div class="mb-5">
							<input type="text" class="form-control form-control-sm form-control-solid" placeholder="Contains the word" name="query" />
						 </div>
						 <!--end::Input group-->
						 <!--begin::Input group-->
						 <div class="mb-5">
							<!--begin::Radio group-->
							<div class="nav-group nav-group-fluid">
							   <!--begin::Option-->
							   <label>
							   <input type="radio" class="btn-check" name="type" value="has" checked="checked" />
							   <span class="btn btn-sm btn-color-muted btn-active btn-active-primary">
							   All
							   </span>
							   </label>
							   <!--end::Option-->
							   <!--begin::Option-->
							   <label>
							   <input type="radio" class="btn-check" name="type" value="users" />
							   <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">
							   Users
							   </span>
							   </label>
							   <!--end::Option-->
							   <!--begin::Option-->
							   <label>
							   <input type="radio" class="btn-check" name="type" value="orders" />
							   <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">
							   Orders
							   </span>
							   </label>
							   <!--end::Option-->
							   <!--begin::Option-->
							   <label>
							   <input type="radio" class="btn-check" name="type" value="projects" />
							   <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">
							   Projects
							   </span>
							   </label>
							   <!--end::Option-->
							</div>
							<!--end::Radio group-->
						 </div>
						 <!--end::Input group-->
						 <!--begin::Input group-->
						 <div class="mb-5">
							<input type="text" name="assignedto" class="form-control form-control-sm form-control-solid" placeholder="Assigned to" value="" />
						 </div>
						 <!--end::Input group-->
						 <!--begin::Input group-->
						 <div class="mb-5">
							<input type="text" name="collaborators" class="form-control form-control-sm form-control-solid" placeholder="Collaborators" value="" />
						 </div>
						 <!--end::Input group-->
						 <!--begin::Input group-->
						 <div class="mb-5">
							<!--begin::Radio group-->
							<div class="nav-group nav-group-fluid">
							   <!--begin::Option-->
							   <label>
							   <input type="radio" class="btn-check" name="attachment" value="has" checked="checked" />
							   <span class="btn btn-sm btn-color-muted btn-active btn-active-primary">
							   Has attachment
							   </span>
							   </label>
							   <!--end::Option-->
							   <!--begin::Option-->
							   <label>
							   <input type="radio" class="btn-check" name="attachment" value="any" />
							   <span class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4">
							   Any
							   </span>
							   </label>
							   <!--end::Option-->
							</div>
							<!--end::Radio group-->
						 </div>
						 <!--end::Input group-->
						 <!--begin::Input group-->
						 <div class="mb-5">
							<select name="timezone" aria-label="Select a Timezone" data-control="select2" data-dropdown-parent="#kt_header_search" data-placeholder="date_period" class="form-select form-select-sm form-select-solid">
							   <option value="next">Within the next</option>
							   <option value="last">Within the last</option>
							   <option value="between">Between</option>
							   <option value="on">On</option>
							</select>
						 </div>
						 <!--end::Input group-->
						 <!--begin::Input group-->
						 <div class="row mb-8">
							<!--begin::Col-->
							<div class="col-6">
							   <input type="number" name="date_number" class="form-control form-control-sm form-control-solid" placeholder="Lenght" value="" />
							</div>
							<!--end::Col-->
							<!--begin::Col-->
							<div class="col-6">
							   <select name="date_typer" aria-label="Select a Timezone" data-control="select2" data-dropdown-parent="#kt_header_search" data-placeholder="Period" class="form-select form-select-sm form-select-solid">
								  <option value="days">Days</option>
								  <option value="weeks">Weeks</option>
								  <option value="months">Months</option>
								  <option value="years">Years</option>
							   </select>
							</div>
							<!--end::Col-->
						 </div>
						 <!--end::Input group-->
						 <!--begin::Actions-->
						 <div class="d-flex justify-content-end">
							<button type="reset" class="btn btn-sm btn-light fw-bold btn-active-light-primary me-2" data-kt-search-element="advanced-options-form-cancel">Cancel</button>
							<a href="/metronic8/demo6/../demo6/rtl/utilities/search/horizontal.html" class="btn btn-sm fw-bold btn-primary" data-kt-search-element="advanced-options-form-search">Search</a>
						 </div>
						 <!--end::Actions-->
					  </form>
					  <!--end::Preferences-->
					  <!--begin::Preferences-->
					  <form data-kt-search-element="preferences" class="pt-1 d-none">
						 <!--begin::Heading-->
						 <h3 class="fw-semibold text-gray-900 mb-7">Search Preferences</h3>
						 <!--end::Heading-->
						 <!--begin::Input group-->
						 <div class="pb-4 border-bottom">
							<label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
							<span class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">
							Projects
							</span>
							<input class="form-check-input" type="checkbox" value="1" checked="checked"/>
							</label>
						 </div>
						 <!--end::Input group-->
						 <!--begin::Input group-->
						 <div class="py-4 border-bottom">
							<label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
							<span class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">
							Targets
							</span>
							<input class="form-check-input" type="checkbox" value="1" checked="checked"/>
							</label>
						 </div>
						 <!--end::Input group-->
						 <!--begin::Input group-->
						 <div class="py-4 border-bottom">
							<label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
							<span class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">
							Affiliate Programs
							</span>
							<input class="form-check-input" type="checkbox" value="1" />
							</label>
						 </div>
						 <!--end::Input group-->
						 <!--begin::Input group-->
						 <div class="py-4 border-bottom">
							<label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
							<span class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">
							Referrals
							</span>
							<input class="form-check-input" type="checkbox" value="1" checked="checked"/>
							</label>
						 </div>
						 <!--end::Input group-->
						 <!--begin::Input group-->
						 <div class="py-4 border-bottom">
							<label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
							<span class="form-check-label text-gray-700 fs-6 fw-semibold ms-0 me-2">
							Users
							</span>
							<input class="form-check-input" type="checkbox" value="1" />
							</label>
						 </div>
						 <!--end::Input group-->
						 <!--begin::Actions-->
						 <div class="d-flex justify-content-end pt-7">
							<button type="reset" class="btn btn-sm btn-light fw-bold btn-active-light-primary me-2" data-kt-search-element="preferences-dismiss">Cancel</button>
							<button type="submit" class="btn btn-sm fw-bold btn-primary">Save Changes</button>
						 </div>
						 <!--end::Actions-->
					  </form>
					  <!--end::Preferences-->    
				   </div>
				   <!--end::Menu-->
				</div>
				<!--end::Search-->    
			 </div>
			 <!--end::Search-->
			 <!--begin::Activities-->
			 <div class="d-flex align-items-center ms-1 ms-lg-3">
				<!--begin::Drawer toggle-->
				<div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" id="kt_activities_toggle">
				   <i class="ki-outline ki-notification-bing fs-1"></i>             
				</div>
				<!--end::Drawer toggle-->
			 </div>
			 <!--end::Activities-->    
			 <!--begin::Quick links-->
			 <div class="d-flex align-items-center ms-1 ms-lg-3">
				<!--begin::Menu wrapper-->
				<div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-<?php echo e((app()->getLocale() === 'en') ? 'start':'end'); ?>">
				   <i class="ki-outline ki-tablet-ok fs-1"></i>        
				</div>
				<!--begin::Menu-->
				<div class="menu menu-sub menu-sub-dropdown menu-column w-250px w-lg-325px" data-kt-menu="true">
				   <!--begin::Heading-->
				   <div class="d-flex flex-column flex-center bgi-no-repeat rounded-top px-9 py-10" style="background-image:url('<?php echo e(asset('assets/media/misc/menu-header-bg.jpg')); ?>')">
					  <!--begin::Title-->
					  <h3 class="text-white fw-semibold mb-3">
						 Quick Links DEMO 2
					  </h3>
					  <!--end::Title-->
					  <!--begin::Status-->
					  <span class="badge bg-primary text-inverse-primary py-2 px-3">25 pending tasks</span>
					  <!--end::Status-->
				   </div>
				   <!--end::Heading-->
				   <!--begin:Nav-->
				   <div class="row g-0">
					  <!--begin:Item-->
					  <div class="col-6">
						 <a href="/metronic8/demo6/../demo6/rtl/apps/projects/budget.html" class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-end border-bottom">
						 <i class="ki-outline ki-dollar fs-3x text-primary mb-2"></i>                <span class="fs-5 fw-semibold text-gray-800 mb-0">Accounting</span>
						 <span class="fs-7 text-gray-500">eCommerce</span>
						 </a>
					  </div>
					  <!--end:Item-->
					  <!--begin:Item-->
					  <div class="col-6">
						 <a href="/metronic8/demo6/../demo6/rtl/apps/projects/settings.html" class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-bottom">
						 <i class="ki-outline ki-sms fs-3x text-primary mb-2"></i>                <span class="fs-5 fw-semibold text-gray-800 mb-0">Administration</span>
						 <span class="fs-7 text-gray-500">Console</span>
						 </a>
					  </div>
					  <!--end:Item-->
					  <!--begin:Item-->
					  <div class="col-6">
						 <a href="/metronic8/demo6/../demo6/rtl/apps/projects/list.html" class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-end">
						 <i class="ki-outline ki-abstract-41 fs-3x text-primary mb-2"></i>                <span class="fs-5 fw-semibold text-gray-800 mb-0">Projects</span>
						 <span class="fs-7 text-gray-500">Pending Tasks</span>
						 </a>
					  </div>
					  <!--end:Item-->
					  <!--begin:Item-->
					  <div class="col-6">
						 <a href="/metronic8/demo6/../demo6/rtl/apps/projects/users.html" class="d-flex flex-column flex-center h-100 p-6 bg-hover-light">
						 <i class="ki-outline ki-briefcase fs-3x text-primary mb-2"></i>                <span class="fs-5 fw-semibold text-gray-800 mb-0">Customers</span>
						 <span class="fs-7 text-gray-500">Latest cases</span>
						 </a>
					  </div>
					  <!--end:Item-->
				   </div>
				   <!--end:Nav-->
				   <!--begin::View more-->
				   <div class="py-2 text-center border-top">
					  <a href="/metronic8/demo6/../demo6/rtl/pages/user-profile/activity.html" class="btn btn-color-gray-600 btn-active-color-primary">
					  View All 
					  <i class="ki-outline ki-arrow-right fs-5"></i>        
					</a>			 
				   </div>
				   <!--end::View more--> 
				</div>
				<!--end::Menu-->
				<!--end::Menu wrapper-->
			 </div>
			 <!--end::Quick links-->
			 <!--begin::Chat-->
			 <div class="d-flex align-items-center ms-1 ms-lg-3">
				<!--begin::Menu wrapper-->
				<div class="btn btn-icon btn-active-light-primary position-relative btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px pulse pulse-success" id="kt_drawer_chat_toggle">
				   <i class="ki-outline ki-notification-2 fs-1"></i> 
				   <span class="pulse-ring w-45px h-45px"></span>
				</div>
				<!--end::Menu wrapper-->
			 </div>
			 <!--end::Chat-->
			 <!--begin::Notifications-->
			  
			 <!--end::Notifications-->
			 <!--begin::Theme mode-->
			 <div class="d-flex align-items-center ms-1 ms-lg-3">
				<!--begin::Menu toggle-->
				<a href="#" class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-<?php echo e((app()->getLocale() === 'en') ? 'start':'end'); ?>">
				<i class="ki-outline ki-night-day theme-light-show fs-1"></i>    
				<i class="ki-outline ki-moon theme-dark-show fs-1"></i>
				</a>
				<!--begin::Menu toggle-->
				<!--begin::Menu-->
				<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px" data-kt-menu="true" data-kt-element="theme-mode-menu">
				   <!--begin::Menu item-->
				   <div class="menu-item px-3 my-0">
					  <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
					  <span class="menu-icon" data-kt-element="icon">
					  <i class="ki-outline ki-night-day fs-2"></i>            </span>
					  <span class="menu-title">
					  Light
					  </span>
					  </a>
				   </div>
				   <!--end::Menu item-->
				   <!--begin::Menu item-->
				   <div class="menu-item px-3 my-0">
					  <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
					  <span class="menu-icon" data-kt-element="icon">
					  <i class="ki-outline ki-moon fs-2"></i>            </span>
					  <span class="menu-title">
					  Dark
					  </span>
					  </a>
				   </div>
				   <!--end::Menu item-->
				   <!--begin::Menu item-->
				   <div class="menu-item px-3 my-0">
					  <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
					  <span class="menu-icon" data-kt-element="icon">
					  <i class="ki-outline ki-screen fs-2"></i>            </span>
					  <span class="menu-title">
					  System
					  </span>
					  </a>
				   </div>
				   <!--end::Menu item-->
				</div>
				<!--end::Menu-->
			 </div>
			 <!--end::Theme mode-->
			 <!--begin::User menu-->
			 <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
				<!--begin::Menu wrapper-->
				<div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-start">
				   <img src="<?php echo e(!empty(Auth::user()->avatar) ? asset(Auth::user()->avatar) : asset('assets/media/avatars/blank.png')); ?>" alt="image"/>
				</div>
				<!--begin::User account menu-->
				<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
				   <!--begin::Menu item-->
				   <div class="menu-item px-3">
					  <div class="menu-content d-flex align-items-center px-3">
						 <!--begin::Avatar-->
						 <div class="symbol symbol-50px me-5">
							<img alt="" src="<?php echo e(!empty(Auth::user()->avatar) ? asset(Auth::user()->avatar) : asset('assets/media/avatars/blank.png')); ?>"/>
						 </div>
						 <!--end::Avatar-->
						 <!--begin::Username-->
						 <div class="d-flex flex-column">
							<div class="fw-bold d-flex align-items-center fs-5">							   
							   
							   <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">
								asdsa
							 </span>
							</div>
							<a href="#" class="fw-semibold text-muted text-hover-primary fs-7">
								sadas</a>
						 </div>
						 <!--end::Username-->
					  </div>
				   </div>
				   <!--end::Menu item-->
				   <!--begin::Menu separator-->
				   <div class="separator my-2"></div>
				   <!--end::Menu separator-->
				   <!--begin::Menu item-->
				   <div class="menu-item px-5">
						<a href="#" class="menu-link px-5"><?php echo e(__('site.profile')); ?></a>
					  </a>
				   </div>
				   <!--end::Menu item-->
				   <!--begin::Menu item-->
				   
				   <!--end::Menu item-->
				   <!--begin::Menu item-->
				   
				   <!--end::Menu item-->
				   <!--begin::Menu item-->
				   
				   <!--end::Menu item-->
				   <!--begin::Menu separator-->
				   <div class="separator my-2"></div>
				   <!--end::Menu separator-->
				   <!--begin::Menu item-->
				   <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
					 
				 
					  <!--begin::Menu sub-->
					  <!--end::Menu sub-->
				   </div>
				   <!--end::Menu item-->
				   <!--begin::Menu item-->
				   <!--end::Menu item-->
				   <!--begin::Menu item-->
				   <div class="menu-item px-5">
						<a href="<?php echo e(route('logout')); ?>" class="menu-link px-5" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><?php echo e(__('site.logout')); ?></a>
						<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
							<?php echo csrf_field(); ?>
						</form>
					</div>
				   <!--end::Menu item-->
				</div>
				<!--end::User account menu-->
				<!--end::Menu wrapper-->
			 </div>
			 <!--end::User menu-->
			 <!--begin::Heaeder menu toggle-->
			 <div class="d-flex align-items-center d-lg-none ms-2 me-n2" title="Show header menu">
				<div class="btn btn-icon btn-active-color-primary w-30px h-30px w-md-40px h-md-40px" id="kt_header_menu_mobile_toggle">
				   <i class="ki-outline ki-burger-menu-2 fs-1"></i>            
				</div>
			 </div>
			 <!--end::Heaeder menu toggle-->
		  </div>
		  <!--end::Toolbar wrapper-->		
	   </div>
	   <!--end::Wrapper-->
	</div>
	<!--end::Container-->
 </div>
 <?php /**PATH D:\xampp\htdocs\dynamicforms\resources\views/layouts/header/_base.blade.php ENDPATH**/ ?>