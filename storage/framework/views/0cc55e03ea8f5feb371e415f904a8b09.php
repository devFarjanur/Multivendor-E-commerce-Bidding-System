
<?php $__env->startSection('customer'); ?>
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
                                <li><a href="<?php echo e(route('customer.product.list')); ?>">Home</a></li>
                                <li class="active"><a
                                        href="<?php echo e(route('customer.bid.request.details', $bidRequest->id)); ?>">Place
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
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $bids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($bid->vendor->user->name ?? '--'); ?></td>
                                                <td><?php echo e(number_format($bid->bid_price, 2)); ?></td>
                                                <td><?php echo e(ucfirst($bid->bid_status)); ?></td>
                                                <td>
                                                    <?php if($bid->bid_status == 'pending'): ?>
                                                        <!-- Display Accept button if the bid is not accepted -->
                                                        <form
                                                            action="<?php echo e(route('customer.accept.bid', ['bidRequestId' => $bidRequest->id, 'bidId' => $bid->id])); ?>"
                                                            method="POST">
                                                            <?php echo csrf_field(); ?>
                                                            <button type="submit" class="btn btn-success">Accept</button>
                                                        </form>
                                                    <?php elseif($bid->bid_status != 'accepted'): ?>
                                                        <!-- Display Rejected button if the bid is accepted -->
                                                        <button type="button" class="btn btn-danger"
                                                            disabled>Rejected</button>
                                                    <?php elseif($bid->bid_status == 'accepted'): ?>
                                                        <!-- Display Rejected button if the bid is accepted -->
                                                        <button type="button" class="btn btn-success"
                                                            disabled>Accepted</button>
                                                    <?php endif; ?>
                                                </td>

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

<?php echo $__env->make('customer.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Multivendor-E-commerce-Bidding-System\resources\views/customer/bid/customer-accept-bid.blade.php ENDPATH**/ ?>