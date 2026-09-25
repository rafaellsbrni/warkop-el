<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warkop EL Web Login</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Poppins', 'ui-sans-serif', 'system-ui'] },
                    colors: {
                        'wk-bg': '#1c1a19',
                        'wk-panel': '#242120',
                        'wk-orange': '#f2760c',
                        'wk-orange-light': '#ff9a3c',
                    },
                },
            },
        };
    </script>
</head>
<body class="font-sans bg-wk-bg min-h-screen flex items-center justify-center px-4">

    <div class="w-full max-w-md">
        <h1 class="text-center text-3xl md:text-4xl font-bold text-white mb-10">
            Warkop <span class="text-wk-orange-light">EL</span> Web Login
        </h1>

        <div class="bg-wk-panel border border-wk-orange/50 rounded-2xl px-8 py-9 shadow-[0_0_0_1px_rgba(242,118,12,0.25)]">
            <h2 class="text-center text-lg font-semibold text-gray-100 mb-7">Silahkan Login Bang</h2>

            <form action="<?php echo e(route('login.attempt')); ?>" method="POST" class="space-y-5">
                <?php echo csrf_field(); ?>

                <div>
                    <label class="block text-sm text-gray-300 mb-1.5">User</label>
                    <input type="text" name="username" placeholder="Masukkan username"
                        class="w-full rounded-lg bg-[#3a3532]/50 border border-wk-orange/40 text-gray-100 placeholder-gray-500 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-wk-orange focus:border-wk-orange transition">
                </div>

                <div>
                    <label class="block text-sm text-gray-300 mb-1.5">Password</label>
                    <input type="password" name="password" placeholder="Masukkan password"
                        class="w-full rounded-lg bg-[#3a3532]/50 border border-wk-orange/40 text-gray-100 placeholder-gray-500 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-wk-orange focus:border-wk-orange transition">
                </div>

                <div class="flex items-center justify-between text-sm pt-1">
                    <label class="flex items-center gap-2 text-gray-300 cursor-pointer select-none">
                        <input type="checkbox" checked
                            class="w-4 h-4 rounded accent-wk-orange bg-[#3a3532] border-wk-orange">
                        Ingat saya
                    </label>
                    <a href="#" class="text-wk-orange-light hover:text-wk-orange hover:underline">Lupa kata sandi?</a>
                </div>

                <button type="submit"
                    class="w-full mt-2 bg-wk-orange hover:bg-wk-orange-light text-white font-semibold py-3 rounded-xl transition shadow-lg shadow-wk-orange/20">
                    Masuk
                </button>
            </form>
        </div>

        <p class="text-center text-xs text-gray-600 mt-6">Warkop 'EL &middot; Sistem Inventaris &amp; Kasir</p>
    </div>

</body>
</html>
<?php /**PATH C:\Users\verrell\warkop-el\resources\views/auth/login.blade.php ENDPATH**/ ?>