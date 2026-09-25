<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Warkop'); ?> — Warkop EL</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Poppins', 'ui-sans-serif', 'system-ui'],
                    },
                    colors: {
                        'wk-bg': '#1c1a19',
                        'wk-panel': '#242120',
                        'wk-panel2': '#2b2726',
                        'wk-sidebar': '#211e1d',
                        'wk-border': '#3a3532',
                        'wk-orange': '#f2760c',
                        'wk-orange-light': '#ff9a3c',
                        'wk-orange-dark': '#c9600a',
                    },
                    boxShadow: {
                        'wk-glow': '0 0 0 1px rgba(242,118,12,0.35), 0 8px 24px -8px rgba(242,118,12,0.25)',
                    },
                },
            },
        };
    </script>

    <style>
        body { background-color: #1c1a19; }
        ::-webkit-scrollbar { width: 8px; height: 8px; }
        ::-webkit-scrollbar-track { background: #211e1d; }
        ::-webkit-scrollbar-thumb { background: #f2760c; border-radius: 8px; }
        .nav-link.active { color: #ff9a3c; background: rgba(242,118,12,0.08); }
        .nav-link.active .nav-dot { background: #ff9a3c; }
    </style>

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body class="font-sans text-gray-200 antialiased">
    <div class="min-h-screen flex bg-wk-bg">

        
        <aside class="w-64 shrink-0 bg-wk-sidebar border-r border-wk-orange/40 flex flex-col">
            <div class="h-20 flex items-center gap-3 px-6 border-b border-wk-orange/20">
                <img src="<?php echo e(asset('images/logo_warkop.png')); ?>" alt="Logo Warkop EL" class="w-14 h-14 object-contain">
                <span class="text-xl font-bold text-wk-orange tracking-wide">Warkop 'EL</span>
            </div>

            <nav class="flex-1 px-4 py-6 space-y-1">
                <?php
                    $menu = [
                        ['label' => 'Dashboard', 'route' => 'dashboard', 'active' => request()->routeIs('dashboard')],
                        ['label' => 'Data Stok Barang', 'route' => 'stok.index', 'active' => request()->routeIs('stok.*')],
                        ['label' => 'Transaksi', 'route' => 'transaksi.index', 'active' => request()->routeIs('transaksi.*')],
                        ['label' => 'Management User', 'route' => 'user.index', 'active' => request()->routeIs('user.*')],
                        ['label' => 'Profil', 'route' => 'profil.index', 'active' => request()->routeIs('profil.*')],
                    ];
                ?>

                <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route($item['route'])); ?>"
                       class="nav-link <?php echo e($item['active'] ? 'active' : ''); ?> group flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium text-gray-300 hover:text-wk-orange-light hover:bg-wk-orange/5 transition">
                        <span class="nav-dot w-1.5 h-1.5 rounded-full bg-gray-500 group-hover:bg-wk-orange-light transition"></span>
                        <?php echo e($item['label']); ?>

                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </nav>

            <div class="px-6 py-4 text-[11px] text-gray-600 border-t border-wk-orange/10">
                &copy; <?php echo e(date('Y')); ?> Warkop 'EL
            </div>
        </aside>

        
        <div class="flex-1 flex flex-col min-w-0">

            
            <header class="h-20 border-b border-wk-orange/20 flex items-center justify-end px-8 bg-wk-bg">
                <div class="flex items-center gap-4">
                    <div class="text-right leading-tight">
                        <p class="text-sm font-semibold text-gray-100">Dhandiansyah</p>
                        <p class="text-xs text-wk-orange-light">Admin</p>
                    </div>
                    <div class="w-10 h-10 rounded-full bg-wk-panel2 border border-wk-orange/40 flex items-center justify-center text-wk-orange font-bold">
                        D
                    </div>
                    <form action="<?php echo e(route('logout')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <button type="submit"
                            class="w-9 h-9 flex items-center justify-center rounded-md bg-red-600 hover:bg-red-500 text-white transition"
                            title="Logout">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                                <path d="M16 17l5-5-5-5"/>
                                <path d="M21 12H9"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto px-8 py-7">
                <?php echo $__env->yieldContent('content'); ?>
            </main>
        </div>
    </div>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\Users\Treemas\Kuliah\warkop-el\resources\views/layouts/app.blade.php ENDPATH**/ ?>