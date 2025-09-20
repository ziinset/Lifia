<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
    {{-- Navbar2 --}}
    @include('components.navbar2')

    {{-- Banner Contoh --}}
    <section style="position:relative; overflow:hidden; background:linear-gradient(135deg, #0ea5e9 0%, #22c55e 100%);">
        <div style="max-width:1200px; margin:0 auto; padding:72px 16px; display:flex; align-items:center; gap:32px; color:#fff;">
            <div style="flex:1;">
                <h1 style="margin:0 0 12px; font-size:40px; line-height:1.2; font-weight:800;">Selamat Datang di LIFIA</h1>
                <p style="margin:0 0 24px; font-size:18px; opacity:.95;">Platform olahraga favoritmu. Mulai perjalanan sehatmu hari ini.</p>
                <div style="display:flex; gap:12px;">
                    <a href="{{ route('register') }}" style="display:inline-block; background:#111827; color:#fff; padding:12px 18px; border-radius:8px; text-decoration:none; font-weight:600;">Daftar Sekarang</a>
                    <a href="{{ route('login') }}" style="display:inline-block; background:rgba(255,255,255,0.15); color:#fff; padding:12px 18px; border-radius:8px; text-decoration:none; font-weight:600; border:1px solid rgba(255,255,255,0.25);">Masuk</a>
                </div>
            </div>
            <div style="flex:1; display:flex; justify-content:center;">
                <img src="https://images.unsplash.com/photo-1517836357463-d25dfeac3438?q=80&w=1200&auto=format&fit=crop" alt="Banner Olahraga" style="width:100%; max-width:520px; height:auto; border-radius:16px; box-shadow:0 20px 40px rgba(0,0,0,0.25); object-fit:cover;">
            </div>
        </div>
        <svg viewBox="0 0 1440 150" style="display:block; width:100%; height:auto;" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
            <path fill="#ffffff" d="M0,64L48,69.3C96,75,192,85,288,80C384,75,480,53,576,69.3C672,85,768,139,864,149.3C960,160,1056,128,1152,117.3C1248,107,1344,117,1392,122.7L1440,128L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
        </svg>
    </section>

</body>
</html>
