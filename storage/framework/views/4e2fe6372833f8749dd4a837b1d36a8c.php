

<?php $__env->startSection('title', 'Tambah Stok Barang'); ?>

<?php $__env->startSection('content'); ?>
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-white">INI FORM EDIT Stok Barang</h1>
        <p class="text-gray-400 mt-1">Silahkan isi sedetail stok barang yang ingin anda tambahkan</p>
    </div>

    <div class="rounded-2xl bg-gradient-to-br from-wk-orange-dark/90 to-wk-orange/80 border border-wk-orange p-8 max-w-4xl">
        <form action="<?php echo e(route('stok.index')); ?>" method="GET" class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div>
                <label class="block text-sm text-white/90 mb-1.5 font-medium">Kode barang</label>
                <select class="w-full rounded-lg bg-[#241f1e] border border-white/20 text-gray-100 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-white/40">
                    <?php $__currentLoopData = $kodeBarang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option><?php echo e($kode); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div>
                <label class="block text-sm text-white/90 mb-1.5 font-medium">Nama barang</label>
                <input type="text" placeholder="Contoh: Mie Rebus"
                    class="w-full rounded-lg bg-[#241f1e] border border-white/20 text-gray-100 placeholder-gray-500 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-white/40">
            </div>

            <div>
                <label class="block text-sm text-white/90 mb-1.5 font-medium">Harga</label>
                <input type="text" placeholder="Rp. 0"
                    class="w-full rounded-lg bg-[#241f1e] border border-white/20 text-gray-100 placeholder-gray-500 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-white/40">
            </div>

            <div>
                <label class="block text-sm text-white/90 mb-1.5 font-medium">Jumlah</label>
                <input type="number" placeholder="0"
                    class="w-full rounded-lg bg-[#241f1e] border border-white/20 text-gray-100 placeholder-gray-500 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-white/40">
            </div>

            <div>
                <label class="block text-sm text-white/90 mb-1.5 font-medium">Satuan</label>
                <select class="w-full rounded-lg bg-[#241f1e] border border-white/20 text-gray-100 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-white/40">
                    <?php $__currentLoopData = $satuan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option><?php echo e($s); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div>
                <label class="block text-sm text-white/90 mb-1.5 font-medium">Kategori</label>
                <select class="w-full rounded-lg bg-[#241f1e] border border-white/20 text-gray-100 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-white/40">
                    <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option><?php echo e($k); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="md:col-span-2 flex items-center gap-4 pt-2">
                <button type="submit"
                    class="bg-white text-wk-orange-dark font-semibold px-6 py-2.5 rounded-lg hover:bg-gray-100 transition shadow">
                    Simpan
                </button>
                <a href="<?php echo e(route('stok.index')); ?>"
                    class="bg-red-600 hover:bg-red-500 text-white font-semibold px-6 py-2.5 rounded-lg transition shadow text-center">
                    Batal
                </a>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Treemas\Kuliah\warkop-el\resources\views/stok/edit.blade.php ENDPATH**/ ?>