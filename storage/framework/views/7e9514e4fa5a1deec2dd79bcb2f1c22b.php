
<?php $__env->startSection('customer'); ?>
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
                                        <h2 class="sherah-breadcrumb__title">Bid List</h2>
                                        <ul class="sherah-breadcrumb__list">
                                            <li><a href="<?php echo e(route('customer.product.list')); ?>">Home</a></li>
                                            <li class="active"><a
                                                    href="<?php echo e(route('customer.bid.list', ['id' => auth()->id()])); ?>">Bid
                                                    List</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="sherah-page-inner sherah-default-bg sherah-border mg-top-25">
                                <div class="sherah-table p-0">
                                    <table id="sherah-table__vendor" class="sherah-table__main sherah-table__main-v3">
                                        <!-- Table Head -->
                                        <thead class="sherah-table__head">
                                            <tr>
                                                <th class="sherah-table__column-4 sherah-table__h4">Date</th>
                                                <th class="sherah-table__column-4 sherah-table__h4">Product</th>
                                                <th class="sherah-table__column-5 sherah-table__h5">Bid Amount</th>
                                                <th class="sherah-table__column-7 sherah-table__h6">Status</th>
                                                <th class="sherah-table__column-9 sherah-table__h8">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="sherah-table__body">
                                            <?php if(count($customerbidresults) > 0): ?>
                                                <?php $__currentLoopData = $customerbidresults; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td class="sherah-table__column-7 sherah-table__data-7">
                                                            <div class="sherah-table__product-content">
                                                                <p class="sherah-table__product-desc">
                                                                    <?php echo e($bid->created_at->format('d/m/Y')); ?>

                                                                </p>
                                                            </div>
                                                        </td>
                                                        <td class="sherah-table__column-4 sherah-table__data-4">
                                                            <div class="sherah-table__product-content">
                                                                <p class="sherah-table__product-desc">
                                                                    <?php echo e($bid->product->name); ?>

                                                                    <!-- Display the product name dynamically -->
                                                                </p>
                                                            </div>
                                                        </td>
                                                        <td class="sherah-table__column-5 sherah-table__data-5">
                                                            <div class="sherah-table__product-content">
                                                                <p class="sherah-table__product-desc">
                                                                    $<?php echo e(number_format($bid->amount, 2)); ?>

                                                                    <!-- Display bid amount dynamically -->
                                                                </p>
                                                            </div>
                                                        </td>
                                                        <td class="sherah-table__column-6 sherah-table__data-6">
                                                            <div class="sherah-table__product-content">
                                                                <p class="sherah-table__product-desc">
                                                                    <?php echo e(ucfirst($bid->status)); ?>

                                                                    <!-- Display bid status dynamically -->
                                                                </p>
                                                            </div>
                                                        </td>
                                                        <td class="sherah-table__column-8 sherah-table__data-8">
                                                            <div
                                                                class="d-flex justify-content-center align-items-center gap-2">
                                                                <a href="#"
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

<?php echo $__env->make('customer.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Multivendor-E-commerce-Bidding-System\resources\views/customer/bid/bid-list.blade.php ENDPATH**/ ?>