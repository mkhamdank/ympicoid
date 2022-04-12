<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

                <?php $__currentLoopData = Auth::user()->role->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $perm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php 
                $navs[] = $perm->navigation_code;
                 ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php if(in_array('Dashboard', $navs)): ?>
                <?php if(isset($page) && $page == "Dashboard"): ?><li class="sidebar-item active"><?php else: ?><li class="sidebar-item"><?php endif; ?>
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo e(url("admin/home")); ?>"><i class="fa fa-industry"></i>  <span class="hide-menu">Dashboard</span></a>
                </li>
                <?php endif; ?>

                <?php if(in_array('A3', $navs)): ?>
                <?php if(isset($page) && $page == "Navigation"): ?><li class="sidebar-item active"><?php else: ?><li class="sidebar-item"><?php endif; ?>
                  <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo e(url("/index/navigation")); ?>"><i class="fa fa-arrow-right"></i> <span class="hide-menu">Navigation</span></a>
                </li>
                <?php endif; ?>

                <?php if(in_array('A4', $navs)): ?>
                <?php if(isset($page) && $page == "Role"): ?><li class="sidebar-item active"><?php else: ?><li class="sidebar-item"><?php endif; ?>
                  <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo e(url("/index/role")); ?>"><i class="fa fa-cogs"></i> <span class="hide-menu">Role</span></a>
                </li>
                <?php endif; ?>

                <?php if(in_array('A6', $navs)): ?>
                <?php if(isset($page) && $page == "User"): ?><li class="sidebar-item active"><?php else: ?><li class="sidebar-item"><?php endif; ?>
                  <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo e(url("/index/user")); ?>"><i class="fa fa-users"></i> <span class="hide-menu">User</span></a>
                </li>
                <?php endif; ?>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" ><i class="fa fa-close"></i> <span class="hide-menu">Logout</span></a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>