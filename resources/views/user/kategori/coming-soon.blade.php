<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $categoryModel->name ?? ucfirst(str_replace('-', ' ', $slug)) }} - Coming Soon</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body style="margin:0; font-family: Poppins, sans-serif; background:#f8fafc; color:#2d3748;">
    @include('components.navbar2')

    <main style="min-height: 60vh; display:flex; align-items:center; justify-content:center; padding: 120px 20px 60px;">
        <div style="max-width: 820px; width:100%; text-align:center;">
            <div style="margin-bottom:24px;">
                <i class="fas fa-clock" style="font-size:48px; color:#8BAC65;"></i>
            </div>
            <h1 style="font-size:28px; margin:0 0 10px; color:#111827; font-weight:700;">
                {{ $categoryModel->name ?? ucfirst(str_replace('-', ' ', $slug)) }}
            </h1>
            <p style="font-size:16px; color:#4B5563; margin:0 0 24px;">
                Artikel untuk kategori ini akan segera tayang. Silakan kembali lagi nanti ya!
            </p>
            <a href="{{ url('/') }}" style="display:inline-flex; align-items:center; gap:8px; padding:10px 16px; border-radius:10px; border:1px solid #d1d5db; color:#374151; text-decoration:none; background:#fff;">
                <i class="fas fa-arrow-left"></i> Kembali ke Beranda
            </a>
        </div>
    </main>

    @include('components.footer')
</body>
</html>