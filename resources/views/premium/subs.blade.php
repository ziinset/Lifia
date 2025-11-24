<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Langganan FitPlan - Lifia</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Montserrat:wght@500;600;700&family=Poppins:wght@600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <!-- Midtrans Snap.js -->
  <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
  <style>
    :root { --brown:#4E342E; --green:#5D7538; --accent:#B4D678; }
    body { font-family: 'Inter',sans-serif; background: #F7F6F3; }
    .hero-bg {
      background-image: url("{{ asset('img/subs-bg.svg') }}");
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center top;
    }
    .toggle-pill { box-shadow: 0 6px 18px rgba(0,0,0,0.08); }
    .card { box-shadow: 0 10px 30px rgba(0,0,0,0.12); }
    .card:hover { transform: translateY(-4px); box-shadow: 0 16px 36px rgba(0,0,0,0.16); }
    .btn-primary { background: linear-gradient(135deg,#8BAC65,#6D8A49); }
    .btn-primary:hover { filter: brightness(1.05); }
    .btn-brown { background: #4E342E; }
    .btn-brown:hover{ filter: brightness(1.05); }
  </style>
</head>
<body class="min-h-screen hero-bg">
  @include('components.navbar2')

  <main class="max-w-7xl mx-auto px-6 lg:px-10 pt-36 pb-20">
    <section class="text-center max-w-3xl mx-auto">
      <h1 class="font-['Poppins'] text-3xl md:text-5xl font-extrabold text-[var(--brown)]">Paket Latihan yang Fleksibel</h1>
      <p class="mt-3 text-gray-700">Pilih paket latihan yang sesuai dengan tujuanmu. Dapatkan panduan, latihan, dan dukungan sesuai kebutuhanmu.</p>

      <div class="mt-6 inline-flex items-center bg-white/80 rounded-full p-1 toggle-pill border border-gray-200">
        <button id="btnWeekly" class="px-5 py-2 rounded-full text-sm font-semibold text-white bg-gradient-to-r from-[#70A05A] to-[#6D8A49]">Mingguan</button>
        <button id="btnMonthly" class="px-5 py-2 rounded-full text-sm font-semibold text-gray-700">Bulanan</button>
      </div>
    </section>

    <section class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
      <!-- Gratis -->
      <article class="card bg-white rounded-2xl p-6 md:p-7 border border-gray-200 transition">
        <h3 class="font-['Poppins'] text-2xl font-bold text-[var(--brown)]">Gratis</h3>
        <p id="priceFree" class="text-gray-600 mt-1">Rp 0 / minggu</p>
        <ul class="mt-6 space-y-3 text-[15px] text-[var(--brown)]">
          <li class="flex items-start gap-2"><i class="fa-solid fa-check text-[#7FB065] mt-1"></i> 2 rencana latihan mingguan</li>
          <li class="flex items-start gap-2"><i class="fa-solid fa-check text-[#7FB065] mt-1"></i> Video tutorial dasar</li>
          <li class="flex items-start gap-2"><i class="fa-solid fa-check text-[#7FB065] mt-1"></i> Pelacakan progres sederhana</li>
          <li class="flex items-start gap-2"><i class="fa-solid fa-check text-[#7FB065] mt-1"></i> Dukungan via email</li>
        </ul>
        <button disabled class="mt-6 w-full rounded-full py-3 bg-gray-100 text-gray-500 font-semibold cursor-not-allowed">Mulai Gratis</button>
      </article>

      <!-- Standar -->
      <article class="card bg-white rounded-2xl p-6 md:p-7 border-2 border-[#8BAC65] transition">
        <h3 class="font-['Poppins'] text-2xl font-bold text-[#5E7A3E]">Standar</h3>
        <p id="priceStd" class="text-gray-700 mt-1">Rp 20.000 / minggu</p>
        <ul class="mt-6 space-y-3 text-[15px] text-[var(--brown)]">
          <li class="flex items-start gap-2"><i class="fa-solid fa-check text-[#7FB065] mt-1"></i> Semua rencana latihan</li>
          <li class="flex items-start gap-2"><i class="fa-solid fa-check text-[#7FB065] mt-1"></i> Video tutorial premium</li>
          <li class="flex items-start gap-2"><i class="fa-solid fa-check text-[#7FB065] mt-1"></i> Pelacakan progres + nutrisi</li>
          <li class="flex items-start gap-2"><i class="fa-solid fa-check text-[#7FB065] mt-1"></i> Dukungan via chat</li>
        </ul>
        <button onclick="payNow('standar')" class="mt-6 w-full rounded-full py-3 text-white font-semibold btn-primary">Mulai Standar</button>
      </article>

      <!-- Pelajar -->
      <article class="card bg-white rounded-2xl p-6 md:p-7 border border-gray-200 transition">
        <h3 class="font-['Poppins'] text-2xl font-bold text-[var(--brown)]">Pelajar</h3>
        <p id="priceStu" class="text-gray-700 mt-1">Rp 15.000 / minggu</p>
        <ul class="mt-6 space-y-3 text-[15px] text-[var(--brown)]">
          <li class="flex items-start gap-2"><i class="fa-solid fa-check text-[var(--brown)] mt-1"></i> Semua fitur Standar</li>
          <li class="flex items-start gap-2"><i class="fa-solid fa-check text-[var(--brown)] mt-1"></i> Diskon khusus pelajar</li>
          <li class="flex items-start gap-2"><i class="fa-solid fa-check text-[var(--brown)] mt-1"></i> Grup komunitas pelajar</li>
        </ul>
        <button onclick="payNow('pelajar')" class="mt-6 w-full rounded-full py-3 text-white font-semibold btn-brown">Mulai Pelajar</button>
      </article>
    </section>
  </main>

  @include('components.footer')

  <script>
    const free = document.getElementById('priceFree');
    const std = document.getElementById('priceStd');
    const stu = document.getElementById('priceStu');
    const btnW = document.getElementById('btnWeekly');
    const btnM = document.getElementById('btnMonthly');
    let currentPeriod = 'weekly'; // default period

    function setWeekly(){
      btnW.className = 'px-5 py-2 rounded-full text-sm font-semibold text-white bg-gradient-to-r from-[#70A05A] to-[#6D8A49]';
      btnM.className = 'px-5 py-2 rounded-full text-sm font-semibold text-gray-700';
      free.textContent = 'Rp 0 / minggu';
      std.textContent = 'Rp 20.000 / minggu';
      stu.textContent = 'Rp 15.000 / minggu';
      currentPeriod = 'weekly';
    }
    function setMonthly(){
      btnM.className = 'px-5 py-2 rounded-full text-sm font-semibold text-white bg-gradient-to-r from-[#70A05A] to-[#6D8A49]';
      btnW.className = 'px-5 py-2 rounded-full text-sm font-semibold text-gray-700';
      free.textContent = 'Rp 0 / bulan';
      std.textContent = 'Rp 75.000 / bulan';
      stu.textContent = 'Rp 50.000 / bulan';
      currentPeriod = 'monthly';
    }
    btnW.addEventListener('click', setWeekly);
    btnM.addEventListener('click', setMonthly);

    // Payment function
    async function payNow(packageType) {
      // Check if user is logged in
      @auth
        try {
          // Show loading state
          const button = event.target;
          const originalText = button.textContent;
          button.disabled = true;
          button.textContent = 'Memproses...';

          // Get CSRF token
          const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}';

          // Call backend to create payment
          const response = await fetch('{{ route("payment.create") }}', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': csrfToken,
              'Accept': 'application/json'
            },
            body: JSON.stringify({
              package: packageType,
              period: currentPeriod
            })
          });

          // Check if response is ok
          if (!response.ok) {
            let errorData;
            try {
              errorData = await response.json();
            } catch (e) {
              errorData = { error: `HTTP error! status: ${response.status}` };
            }
            throw new Error(errorData.error || errorData.message || 'Terjadi kesalahan pada server');
          }

          let data;
          try {
            data = await response.json();
          } catch (e) {
            throw new Error('Response dari server tidak valid');
          }

          if (data.error) {
            throw new Error(data.error || data.message || 'Terjadi kesalahan');
          }

          if (!data.snap_token) {
            throw new Error('Snap token tidak diterima dari server');
          }

          // Open Snap popup
          window.snap.pay(data.snap_token, {
            onSuccess: function(result) {
              // Payment success - redirect with order_id
              const orderId = result.order_id || data.order_id;
              window.location.href = '{{ route("payment.success") }}?order_id=' + encodeURIComponent(orderId);
            },
            onPending: function(result) {
              // Payment pending
              alert('Pembayaran Anda sedang diproses. Silakan selesaikan pembayaran.');
            },
            onError: function(result) {
              // Payment error
              window.location.href = '{{ route("payment.failed") }}';
            },
            onClose: function() {
              // User closed popup
              button.disabled = false;
              button.textContent = originalText;
            }
          });
        } catch (error) {
          console.error('Error:', error);
          const errorMessage = error.message || 'Terjadi kesalahan. Silakan coba lagi.';
          alert('Error: ' + errorMessage);

          // Reset button
          const button = event.target;
          button.disabled = false;
          const originalText = packageType === 'standar' ? 'Mulai Standar' : 'Mulai Pelajar';
          button.textContent = originalText;
        }
      @else
        // User not logged in, redirect to login
        window.location.href = '{{ route("login") }}?redirect_to=' + encodeURIComponent(window.location.pathname);
      @endauth
    }
  </script>
</body>
</html>
