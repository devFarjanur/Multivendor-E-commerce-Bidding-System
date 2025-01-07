
<?php $__env->startSection('vendor'); ?>
    <!-- Bootstrap CSS -->
    
    <!-- Bootstrap Bundle with JavaScript -->
    

    <!-- Vendor Place Bid -->
    <section class="sherah-adashboard sherah-show">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sherah-body">
                        <!-- Breadcrumb -->
                        <div class="sherah-breadcrumb mg-top-30">
                            <h2 class="sherah-breadcrumb__title">Place Your Bid</h2>
                            <ul class="sherah-breadcrumb__list">
                                <li><a href="<?php echo e(route('vendor.dashboard')); ?>">Home</a></li>
                                <li class="active"><a href="<?php echo e(route('vendor.bid.request.details', $bidRequest->id)); ?>">Place
                                        Bid</a></li>
                            </ul>
                        </div>

                        <!-- Bid Request Details -->
                        <div class="container my-5 p-4 bg-light border rounded shadow">
                            <h3 class="text-primary mb-4">Bid Request Details</h3>
                            <div>
                                <p><strong>Customer:</strong> <?php echo e($bidRequest->customer->name ?? '--'); ?></p>
                                <p><strong>Type:</strong> <?php echo e(ucfirst($bidRequest->type)); ?></p>
                                <?php if($bidRequest->type == 'Selected Product'): ?>
                                    <p><strong>Product:</strong> <?php echo e($bidRequest->product->name ?? '--'); ?></p>
                                    <p><strong>Price:</strong> <?php echo e($bidRequest->target_price ?? '--'); ?> TK</p>
                                    <p><strong>Image:</strong></p>
                                    <img src="<?php echo e(asset('upload/admin_images/' . $bidRequest->product->image)); ?>"
                                        alt="Request Image" class="img-thumbnail" style="max-width: 250px;">
                                <?php else: ?>
                                    <p><strong>Description:</strong> <?php echo e($bidRequest->description ?? '--'); ?></p>
                                    <p><strong>Category:</strong> <?php echo e($bidRequest->category->name ?? '--'); ?></p>
                                    <p><strong>Subcategory:</strong> <?php echo e($bidRequest->subcategory->name ?? '--'); ?></p>
                                    <p><strong>Target Price:</strong> <?php echo e($bidRequest->target_price ?? '--'); ?> TK</p>
                                    <p><strong>Image:</strong></p>
                                    <img src="<?php echo e(asset('upload/admin_images/' . $bidRequest->image_path)); ?>"
                                        alt="Request Image" class="img-thumbnail" style="max-width: 250px;">
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Vendor Bid Form -->
                        <div class="container my-5 p-4 bg-light border rounded shadow">
                            <h3 class="text-primary mb-4">Submit Your Bid</h3>
                            <form action="<?php echo e(route('vendor.submit.bid', $bidRequest->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="mb-3">
                                    <label for="bid_price" class="form-label">Your Bid Price (TK):</label>
                                    <input type="number" step="0.01" name="bid_price" id="bid_price"
                                        class="form-control" placeholder="Enter your bid price" required>
                                </div>
                                <button type="submit" class="btn btn-success w-100">Submit Bid</button>
                            </form>
                        </div>

                        <!-- All Vendors’ Bids -->
                        <div class="container my-5 p-4 bg-light border rounded shadow">
                            <h3 class="text-primary mb-4">All Vendors’ Bids</h3>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped align-middle">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>Vendor</th>
                                            <th>Bid Price (TK)</th>
                                            <th>Bid Status</th>
                                            <th>Submitted At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $bids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($bid->vendor->user->name ?? '--'); ?></td>
                                                <td><?php echo e(number_format($bid->bid_price, 2) ?? '--'); ?></td>
                                                <td><?php echo e($bid->bid_status ?? '--'); ?></td>
                                                <td><?php echo e($bid->created_at->format('d/m/Y H:i') ?? '--'); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('vendor.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Multivendor-E-commerce-Bidding-System\resources\views/vendor/bid/vendor-bid-place.blade.php ENDPATH**/ ?>