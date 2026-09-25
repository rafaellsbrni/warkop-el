<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-white">Selamat Datang, Dhandiansyah</h1>
        <p class="text-gray-400 mt-1">Berikut ringkasan stok dan aktivitas penjualan hari ini.</p>
    </div>

    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
        <?php
            $cards = [
                ['label' => 'Transaksi hari ini', 'value' => $stats['transaksi_hari_ini'], 'highlight' => false],
                ['label' => 'Total Item Keluar', 'value' => $stats['total_item_keluar'], 'highlight' => true],
                ['label' => 'Stok Menipis', 'value' => $stats['stok_menipis'], 'highlight' => false],
                ['label' => 'Total Reject', 'value' => $stats['total_reject'], 'highlight' => false],
            ];
        ?>

        <?php $__currentLoopData = $cards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="rounded-xl bg-wk-panel border <?php echo e($card['highlight'] ? 'border-wk-orange shadow-wk-glow' : 'border-wk-border'); ?> px-6 py-5">
                <p class="text-3xl font-bold text-white"><?php echo e($card['value']); ?></p>
                <p class="text-sm text-gray-400 mt-1"><?php echo e($card['label']); ?></p>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    
    <div class="rounded-xl bg-wk-panel border border-wk-border overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="text-left text-wk-orange-light border-b border-wk-border">
                        <th class="px-6 py-4 font-semibold">Nama Barang</th>
                        <th class="px-6 py-4 font-semibold">Kategori</th>
                        <th class="px-6 py-4 font-semibold">Terjual hari ini</th>
                        <th class="px-6 py-4 font-semibold">Sisa Stok</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $barangTerlaris; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="border-b border-wk-border/60 last:border-0 hover:bg-wk-panel2/60 transition">
                            <td class="px-6 py-4 text-wk-orange-light font-medium"><?php echo e($barang['nama']); ?></td>
                            <td class="px-6 py-4 text-wk-orange-light"><?php echo e($barang['kategori']); ?></td>
                            <td class="px-6 py-4 text-wk-orange-light"><?php echo e($barang['terjual']); ?></td>
                            <td class="px-6 py-4 text-wk-orange-light"><?php echo e($barang['sisa_stok']); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Treemas\Kuliah\warkop-el\resources\views/dashboard.blade.php ENDPATH**/ ?>