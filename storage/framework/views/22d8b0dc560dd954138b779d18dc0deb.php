
<?php $__env->startSection('vendor'); ?>
    <!-- sherah Dashboard -->
    <section class="sherah-adashboard sherah-show">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sherah-body">
                        <!-- Dashboard Inner -->
                        <div class="sherah-dsinner">
                            <div class="row">
                                <div class="col-12">
                                    <div class="sherah-breadcrumb mg-top-30">
                                        <h2 class="sherah-breadcrumb__title">Bid Request</h2>
                                        <ul class="sherah-breadcrumb__list">
                                            <li><a href="<?php echo e(route('vendor.dashboard')); ?>">Home</a></li>
                                            <li class="active"><a href="<?php echo e(route('vendor.bid.request')); ?>">Bid List</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="sherah-page-inner sherah-default-bg sherah-border mg-top-25">
                                <div class="sherah-table p-0">
                                    <table id="sherah-table__vendor" class="sherah-table__main sherah-table__main-v3">
                                        <!-- sherah Table Head -->
                                        <thead class="sherah-table__head">
                                            <tr>
                                                <th class="sherah-table__column-7 sherah-table__h6">Created On</th>
                                                <th class="sherah-table__column-2 sherah-table__h2">Customer</th>
                                                <th class="sherah-table__column-1 sherah-table__h1">Image</th>
                                                <th class="sherah-table__column-3 sherah-table__h3">Product</th>
                                                <th class="sherah-table__column-4 sherah-table__h4">Bid Amount</th>
                                                <th class="sherah-table__column-5 sherah-table__h5">Status</th>
                                                <th class="sherah-table__column-8 sherah-table__h7">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="sherah-table__body">
                                            <?php if(count($vendorbidrequests) > 0): ?>
                                                <?php $__currentLoopData = $vendorbidrequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bidRequest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td class="sherah-table__column-7 sherah-table__data-7">
                                                            <div class="sherah-table__product-content">
                                                                <p class="sherah-table__product-desc">
                                                                    <?php echo e($bidRequest->created_at->format('d/m/Y') ?? '--'); ?>

                                                                </p>
                                                            </div>
                                                        </td>
                                                        <td class="sherah-table__column-2 sherah-table__data-2">
                                                            <div class="sherah-table__vendor">
                                                                <h4 class="sherah-table__vendor--title"><a
                                                                        href="#"><?php echo e($bidRequest->customer->name ?? '--'); ?></a>
                                                                </h4>
                                                            </div>
                                                        </td>
                                                        <td class="sherah-table__column-1 sherah-table__data-1">
                                                            <div class="d-flex justify-content-center align-items-center">
                                                                <div class="sherah-table__vendor-img">
                                                                    <img src="<?php echo e(asset('upload/admin_images/' . $bidRequest->image_path)); ?>"
                                                                        alt="Category Image" class="img-fluid">
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="sherah-table__column-3 sherah-table__data-3">
                                                            <div class="sherah-table__product-content">
                                                                <p class="sherah-table__product-desc">
                                                                    <?php if($bidRequest->type == 'Selected Product'): ?>
                                                                        <?php echo e($bidRequest->product->name ?? '--'); ?>

                                                                    <?php else: ?>
                                                                        <?php echo e($bidRequest->description ?? '--'); ?>

                                                                    <?php endif; ?>
                                                                </p>
                                                            </div>
                                                        </td>
                                                        <td class="sherah-table__column-4 sherah-table__data-4">
                                                            <div class="sherah-table__product-content">
                                                                <p class="sherah-table__product-desc">
                                                                    <?php echo e(number_format($bidRequest->target_price, 2) ?? '--'); ?>

                                                                    TK
                                                                </p>
                                                            </div>
                                                        </td>
                                                        <td class="sherah-table__column-5 sherah-table__data-5">
                                                            <div class="sherah-table__product-content">
                                                                <p class="sherah-table__product-desc">
                                                                    <?php echo e(ucfirst($bidRequest->bid_status) ?? '--'); ?></p>
                                                            </div>
                                                        </td>
                                                        <td class="sherah-table__column-8 sherah-table__data-8">
                                                            <div
                                                                class="d-flex justify-content-center align-items-center gap-2">
                                                                <a href="<?php echo e(route('vendor.bid.request.details', $bidRequest->id)); ?>"
                                                                    class="btn btn-outline-primary d-flex align-items-center gap-1">
                                                                    <i class="fas fa-eye"></i> View
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('vendor.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Multivendor-E-commerce-Bidding-System\resources\views/vendor/bid/bid-request.blade.php ENDPATH**/ ?>