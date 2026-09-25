<?php $__env->startSection('title', 'Edit User'); ?>

<?php $__env->startSection('content'); ?>
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-white">Edit User</h1>
            <p class="text-gray-400 mt-1">Ubah role, status, dan detail akun pengguna di sini.</p>
        </div>
        <a href="<?php echo e(route('user.index')); ?>"
            class="inline-flex items-center gap-2 justify-center bg-gray-700 hover:bg-gray-600 text-gray-200 text-sm font-semibold px-4 py-2.5 rounded-lg transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Kembali
        </a>
    </div>

    <div class="max-w-2xl bg-wk-panel border border-wk-border rounded-xl p-6 shadow-xl">
        <form action="<?php echo e(route('user.update', $user['no'])); ?>" method="POST" class="space-y-5">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1.5">No</label>
                <input type="text" value="<?php echo e($user['no']); ?>" readonly
                    class="w-full px-4 py-2.5 rounded-lg bg-wk-panel2/50 border border-wk-border text-gray-400 focus:outline-none cursor-not-allowed text-sm">
            </div>

            
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1.5">Nama</label>
                <input type="text" name="nama" value="<?php echo e(old('nama', $user['nama'])); ?>" required
                    class="w-full px-4 py-2.5 rounded-lg bg-wk-panel border border-wk-border text-gray-100 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-wk-orange focus:border-wk-orange transition text-sm">
                <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-xs text-red-400 mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1.5">Username</label>
                    <input type="text" name="username" value="<?php echo e(old('username', $user['username'])); ?>" required
                        class="w-full px-4 py-2.5 rounded-lg bg-wk-panel border border-wk-border text-gray-100 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-wk-orange focus:border-wk-orange transition text-sm">
                    <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-xs text-red-400 mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1.5">Email</label>
                    <input type="email" name="email" value="<?php echo e(old('email', $user['email'])); ?>" required
                        class="w-full px-4 py-2.5 rounded-lg bg-wk-panel border border-wk-border text-gray-100 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-wk-orange focus:border-wk-orange transition text-sm">
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-xs text-red-400 mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1.5">Role</label>
                    <select name="role" required
                        class="w-full px-4 py-2.5 rounded-lg bg-wk-panel border border-wk-border text-gray-100 focus:outline-none focus:ring-2 focus:ring-wk-orange focus:border-wk-orange transition text-sm">
                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($role); ?>" <?php echo e(old('role', $user['role']) == $role ? 'selected' : ''); ?>>
                                <?php echo e($role); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-xs text-red-400 mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1.5">Status</label>
                    <select name="status" required
                        class="w-full px-4 py-2.5 rounded-lg bg-wk-panel border border-wk-border text-gray-100 focus:outline-none focus:ring-2 focus:ring-wk-orange focus:border-wk-orange transition text-sm">
                        <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($status); ?>" <?php echo e(old('status', $user['status']) == $status ? 'selected' : ''); ?>>
                                <?php echo e($status); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-xs text-red-400 mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-wk-border">
                <a href="<?php echo e(route('user.index')); ?>"
                    class="px-5 py-2.5 rounded-lg bg-gray-800 hover:bg-gray-700 text-gray-300 text-sm font-medium transition">
                    Batal
                </a>
                <button type="submit"
                    class="px-5 py-2.5 rounded-lg bg-wk-orange hover:bg-wk-orange-light text-white text-sm font-semibold transition shadow-lg shadow-wk-orange/20">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\verrell\warkop-el\resources\views/user/edit.blade.php ENDPATH**/ ?>