<!DOCTYPE html>
<html direction="rtl" dir="rtl" style="direction: rtl" lang="<?php echo e(app()->getLocale()); ?>">
	<head>
		<title><?php echo e(config('app.name', 'Laravel')); ?> <?php echo $__env->yieldContent('title'); ?></title>
		<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
		<meta name="description" content="Dynamic Forms APP " />
		<meta name="keywords" content="Dynamic Forms APP" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Dynamic Forms APP" />
		<meta property="og:url" content="#" />
		<meta property="og:site_name" content="DynamicForms" />
		<link rel="canonical" href="google.com" />
		<link rel="shortcut icon" href="<?php echo e(asset('assets/media/logos/favicon.ico')); ?>" />
		<?php echo $__env->yieldContent('style'); ?>
		<script>
			window.Laravel = <?php echo json_encode([
				'csrfToken' => csrf_token(),
			]); ?>;
		</script>		
 
		<link href="https://fonts.googleapis.com/css2?family=Noto+Naskh+Arabic&family=Roboto:wght@500&display=swap" rel="stylesheet">
			<link href="<?php echo e(asset('assets/plugins/global/plugins.bundle.rtl.css')); ?>" rel="stylesheet" type="text/css" />
			<link href="<?php echo e(asset('assets/css/style.bundle.rtl.css')); ?>" rel="stylesheet" type="text/css" />
			<link href="<?php echo e(asset('assets/plugins/custom/datatables/datatables.bundle.rtl.css')); ?>" rel="stylesheet"
            type="text/css" />
 
	</head>
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed">
		<div class="d-flex flex-column flex-root">
			<div class="page d-flex flex-row flex-column-fluid">
				<?php echo $__env->make('layouts.aside._base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<?php echo $__env->make('layouts.header._base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					<?php echo $__env->make('layouts.topbar._base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
					<?php echo $__env->make('partials.alerts.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 					 
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<?php echo $__env->yieldContent('content'); ?>
					</div>
					<?php echo $__env->make('layouts._footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
				</div>
			</div>
		</div>
		<?php echo $__env->make('layouts._scrolltop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
		<script src="<?php echo e(asset('assets/plugins/global/plugins.bundle.js')); ?>"></script>
		<script src="<?php echo e(asset('assets/js/scripts.bundle.js')); ?>"></script> 
		<?php echo $__env->yieldContent('scripts'); ?>
	</body>
</html><?php /**PATH D:\xampp\htdocs\dynamicforms\resources\views/layouts/app.blade.php ENDPATH**/ ?>