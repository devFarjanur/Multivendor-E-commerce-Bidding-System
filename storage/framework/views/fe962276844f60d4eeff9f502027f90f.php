
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
                                        <h2 class="sherah-breadcrumb__title">Categories & Subcategories</h2>
                                        <ul class="sherah-breadcrumb__list">
                                            <li><a href="<?php echo e(route('vendor.dashboard')); ?>">Home</a></li>
                                            <li class="active"><a href="<?php echo e(route('vendor.category.list')); ?>">Category & Subcategory
                                                    List</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xxl-3 col-lg-4 col-12">
                                    <!-- Product Category Sidebar -->
                                    <div class="sherah-product-sidebar sherah-default-bg mg-top-25">
                                        <h4 class="sherah-product-sidebar__title sherah-border-btm">Categories</h4>
                                        <ul class="sherah-product-sidebar__list">
                                            <?php if(count($categories) > 0): ?>
                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li><a href="#"><span><i
                                                                    class="fa-solid fa-chevron-right"></i><?php echo e($category->name); ?></span><span
                                                                class="count">15</span></a></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                    <!-- End Product Category Sidebar -->
                                </div>
                                <div class="col-xxl-9 col-lg-8 col-12">
                                    <div class="sherah-page-inner sherah-default-bg sherah-border mg-top-25">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h4 class="sherah-product-sidebar__title sherah-border-btm">Subcategories</h4>
                                            <a class="btn fw-bold" href="<?php echo e(route('vendor.add.subcategory')); ?>"
                                                style="background-color: #6176FE; color: white;">
                                                Add Subcategory
                                            </a>
                                        </div>
                                        <div class="sherah-table p-0">
                                            <table id="sherah-table__vendor"
                                                class="sherah-table__main sherah-table__main-v3">
                                                <!-- sherah Table Head -->
                                                <thead class="sherah-table__head">
                                                    <tr>
                                                        <th class="sherah-table__column-1 sherah-table__h1">Image</th>
                                                        <th class="sherah-table__column-2 sherah-table__h2">Name</th>
                                                        <th class="sherah-table__column-7 sherah-table__h6">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="sherah-table__body">
                                                    <?php if(count($categories) > 0): ?>
                                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                
                                                                <td class="sherah-table__column-1 sherah-table__data-1">
                                                                    <div
                                                                        class="d-flex justify-content-center align-items-center">
                                                                        <div class="sherah-table__vendor-img">
                                                                            <img src="<?php echo e(asset('upload/admin_images/' . $category->image)); ?>"
                                                                                alt="Category Image" class="img-fluid">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="sherah-table__column-2 sherah-table__data-2">
                                                                    <div class="sherah-table__vendor">
                                                                        <h4 class="sherah-table__vendor--title">
                                                                            <?php echo e($category->name); ?>

                                                                        </h4>
                                                                    </div>
                                                                </td>
                                                                <td class="sherah-table__column-8 sherah-table__data-8">
                                                                    <div
                                                                        class="d-flex justify-content-center align-items-center gap-2">
                                                                        <!-- Approve Button -->
                                                                        
                                                                        <!-- Delete Button -->
                                                                        <form method="POST"
                                                                            action="<?php echo e(route('vendor.subcategory.delete', $category->id)); ?>"
                                                                            style="display:inline;">
                                                                            <?php echo csrf_field(); ?>
                                                                            <?php echo method_field('DELETE'); ?>
                                                                            <button type="submit"
                                                                                class="btn btn-outline-danger d-flex align-items-center gap-1">
                                                                                <i class="fa-solid fa-trash"></i> Delete
                                                                            </button>
                                                                        </form>

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
                        <!-- End Dashboard Inner -->
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!-- End sherah Dashboard -->
    <style>
        table th,
        table td {
            text-align: center !important;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('vendor.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\multivendor-e-commerce-bidding-system\resources\views/vendor/category/category-subcategory-list.blade.php ENDPATH**/ ?>