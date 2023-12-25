
<?php $__env->startSection('title', 'We cant find that page'); ?>
<?php $__env->startSection('style'); ?>
    <style>
        body {
            background-image: url('<?php echo e(asset('assets/media/auth/bg1.jpg')); ?>');
        }

        [data-theme="dark"] body {
            background-image: url('<?php echo e(asset('assets/media/auth/bg1-dark.jpg')); ?>');
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="d-flex flex-column flex-center flex-column-fluid">
  <!--begin::Content-->
  <div class="d-flex flex-column flex-center text-center p-10">
    <!--begin::Wrapper-->
    <div class="card card-flush w-lg-650px py-5">
      <div class="card-body py-15 py-lg-20">
        <!--begin::Title-->
        <h1 class="fw-bolder fs-2hx text-gray-900 mb-4">Oops!</h1>
        <!--end::Title-->
        <!--begin::Text-->
        <div class="fw-semibold fs-6 text-gray-500 mb-7">We can't find that page.</div>
        <!--end::Text-->
        <!--begin::Illustration-->
        <div class="mb-3">
          <img src="<?php echo e(asset('assets/media/auth/404-error.png')); ?>" class="mw-100 mh-300px theme-light-show" alt="" />
          <img src="<?php echo e(asset('assets/media/auth/404-error-dark.png')); ?>" class="mw-100 mh-300px theme-dark-show" alt="" />
        </div>
        <!--end::Illustration-->
        <!--begin::Link-->
        <div class="mb-0">
          <a href="<?php echo e(url('/')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('site.home')); ?></a>
        </div>
        <!--end::Link-->
      </div>
    </div>
    <!--end::Wrapper-->
  </div>
  <!--end::Content-->
</div>

    <!--end::Authentication - Sign-in-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('assets/js/custom/Tachyons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/custom/es6-shim.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/custom/datatables/datatables.bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/widgets.bundle.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\dynamicforms\resources\views/errors/404.blade.php ENDPATH**/ ?>