<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Panduan Bakar Lemak di Perut - LIFIA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        .hero-curve::after {
            content: "";
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            bottom: -28px;
            width: 140%;
            height: 56px;
            background: #fff;
            border-radius: 999px;
        }
        .shadow-soft { box-shadow: 0 10px 30px rgba(0,0,0,0.08); }
        .item-card:hover { filter: brightness(0.98); }
        .modal-backdrop { background: rgba(0,0,0,0.45); }
    </style>
</head>
<body class="bg-gray-50 font-inter">
    @include('components.navbar2')

    <!-- HERO -->
    <section class="relative overflow-hidden hero-curve">
        <div class="relative z-10">
            <div class="max-w-6xl mx-auto px-4 py-8 md:py-10">
                <a href="{{ route('program-turun-berat-badan') }}" class="inline-flex items-center text-white/90 hover:text-white">
                    <span class="iconify text-2xl" data-icon="mdi:chevron-left"></span>
                </a>
            </div>
        </div>
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-gradient-to-b from-[#6B8F4E] via-[#6E9150] to-[#5E7F44]"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-black/0 via-black/0 to-black/10"></div>
        </div>
        <div class="relative z-10 max-w-6xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
                <div class="py-8 md:py-14 text-white">
                    <p class="text-white/80 text-xs md:text-sm tracking-widest font-semibold">BAKAR LEMAK DI PERUT</p>
                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold mt-1">HARI KE-1</h1>
                    <p class="mt-4 text-white/90 max-w-lg">Latihan fokus pada gerakan cardio dan core untuk memicu pembakaran kalori serta mengencangkan otot perut.</p>
                </div>
                <div class="relative h-60 md:h-72 lg:h-80 select-none">
                    <img src="/images/model.png" onerror="this.src='/image/Rectangle 171.png'" alt="Bakar lemak" class="absolute right-0 bottom-0 h-full object-contain" />
                </div>
            </div>
        </div>
        <div class="h-16"></div>
    </section>

    <main class="max-w-6xl mx-auto px-4 -mt-6 md:-mt-8">
        <!-- DAFTAR LATIHAN -->
        <section class="bg-white rounded-2xl md:rounded-3xl p-5 md:p-8 shadow-soft">
            <h2 class="text-xl md:text-2xl font-extrabold text-gray-800 mb-4">7 Latihan</h2>

            <div class="space-y-4">
                <!-- Item -->
                <button type="button" class="w-full flex items-center gap-4 bg-gray-50 hover:bg-gray-100 p-2.5 rounded-xl item-card text-left" data-ex="jumping-jack" data-title="Jumping Jack" data-duration="00:45" data-image="/image/Rectangle 171.png">
                    <img src="/image/Rectangle 171.png" alt="Jumping Jack" class="w-32 h-24 object-cover rounded-lg">
                    <div class="flex-1">
                        <p class="font-semibold text-gray-800">Jumping Jack</p>
                        <p class="text-gray-500 text-sm">00.45</p>
                    </div>
                </button>

                <button type="button" class="w-full flex items-center gap-4 bg-gray-50 hover:bg-gray-100 p-2.5 rounded-xl item-card text-left" data-ex="mountain-climber" data-title="Mountain Climber" data-duration="00:30" data-image="/image/Rectangle 181.png">
                    <img src="/image/Rectangle 181.png" alt="Mountain Climber" class="w-32 h-24 object-cover rounded-lg">
                    <div class="flex-1">
                        <p class="font-semibold text-gray-800">Mountain Climber</p>
                        <p class="text-gray-500 text-sm">00.30</p>
                    </div>
                </button>

                <button type="button" class="w-full flex items-center gap-4 bg-gray-50 hover:bg-gray-100 p-2.5 rounded-xl item-card text-left" data-ex="burpee" data-title="Burpee" data-duration="00:30" data-image="/image/Rectangle 147.png">
                    <img src="/image/Rectangle 147.png" alt="Burpee" class="w-32 h-24 object-cover rounded-lg">
                    <div class="flex-1">
                        <p class="font-semibold text-gray-800">Burpee</p>
                        <p class="text-gray-500 text-sm">00.30</p>
                    </div>
                </button>

                <button type="button" class="w-full flex items-center gap-4 bg-gray-50 hover:bg-gray-100 p-2.5 rounded-xl item-card text-left" data-ex="high-knees" data-title="High Knees" data-duration="00:40" data-image="/image/Rectangle 182.png">
                    <img src="/image/Rectangle 182.png" alt="High Knees" class="w-32 h-24 object-cover rounded-lg">
                    <div class="flex-1">
                        <p class="font-semibold text-gray-800">High Knees</p>
                        <p class="text-gray-500 text-sm">00.40</p>
                    </div>
                </button>

                <button type="button" class="w-full flex items-center gap-4 bg-gray-50 hover:bg-gray-100 p-2.5 rounded-xl item-card text-left" data-ex="squat-jump" data-title="Squat Jump" data-duration="00:30" data-image="/image/Rectangle 148.png">
                    <img src="/image/Rectangle 148.png" alt="Squat Jump" class="w-32 h-24 object-cover rounded-lg">
                    <div class="flex-1">
                        <p class="font-semibold text-gray-800">Squat Jump</p>
                        <p class="text-gray-500 text-sm">00.30</p>
                    </div>
                </button>

                <button type="button" class="w-full flex items-center gap-4 bg-gray-50 hover:bg-gray-100 p-2.5 rounded-xl item-card text-left" data-ex="plank-shoulder" data-title="Plank to Shoulder Tap" data-duration="00:30" data-image="/image/Rectangle 171.png">
                    <img src="/image/Rectangle 171.png" alt="Plank to Shoulder Tap" class="w-32 h-24 object-cover rounded-lg">
                    <div class="flex-1">
                        <p class="font-semibold text-gray-800">Plank to Shoulder Tap</p>
                        <p class="text-gray-500 text-sm">00.30</p>
                    </div>
                </button>

                <button type="button" class="w-full flex items-center gap-4 bg-gray-50 hover:bg-gray-100 p-2.5 rounded-xl item-card text-left" data-ex="lunges" data-title="Lunges Bergantian" data-duration="00:40" data-image="/image/Rectangle 189.png">
                    <img src="/image/Rectangle 189.png" alt="Lunges Bergantian" class="w-32 h-24 object-cover rounded-lg">
                    <div class="flex-1">
                        <p class="font-semibold text-gray-800">Lunges Bergantian</p>
                        <p class="text-gray-500 text-sm">00.40</p>
                    </div>
                </button>
            </div>
        </section>

        <!-- CTA BUTTON -->
        <div class="h-28"></div>
        <div class="fixed bottom-6 left-1/2 -translate-x-1/2 w-[86%] md:w-[420px]">
            <button class="w-full py-4 rounded-2xl bg-[#8BAC65] hover:bg-[#7aa356] text-white font-extrabold text-lg shadow-lg">Mulai</button>
        </div>
    </main>

    <!-- MODAL -->
    <div id="exerciseModal" class="fixed inset-0 hidden items-center justify-center z-50">
        <div class="absolute inset-0 modal-backdrop"></div>
        <div class="relative z-10 w-[92%] max-w-xl bg-white rounded-2xl p-4 md:p-6 shadow-2xl">
            <div class="overflow-hidden rounded-xl">
                <img id="modalImage" src="/image/Rectangle 171.png" alt="Preview" class="w-full h-44 object-cover">
            </div>
            <div class="mt-4">
                <h3 id="modalTitle" class="text-lg md:text-xl font-bold text-gray-800">Jumping Jack</h3>
                <div class="flex items-center justify-between mt-2">
                    <p class="font-semibold text-gray-800">Durasi</p>
                    <span id="modalDuration" class="text-gray-700 font-bold">00:30</span>
                </div>
                <ol id="modalSteps" class="list-decimal pl-5 text-sm text-gray-700 space-y-1 mt-2">
                    <!-- steps injected here -->
                </ol>
                <div class="mt-3">
                    <p class="font-semibold text-gray-800">Tips</p>
                    <ol id="modalTips" class="list-decimal pl-5 text-sm text-gray-700 space-y-1 mt-1">
                        <!-- tips injected here -->
                    </ol>
                </div>
                <div class="mt-5">
                    <button id="closeModalBtn" class="w-full py-3 rounded-xl bg-[#8BAC65] hover:bg-[#7aa356] text-white font-bold">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    @include('components.footer')

    <script>
        const DATA = {
            'jumping-jack': {
                steps: [
                    'Berdiri tegak, kaki rapat, tangan di sisi tubuh.',
                    'Lompat ke samping sambil membuka kaki selebar bahu.',
                    'Secara bersamaan, angkat kedua tangan ke atas hingga hampir saling menyentuh.',
                    'Lompat kembali dengan posisi awal (kaki rapat, tangan di samping).',
                    'Ulangi gerakan dengan ritme stabil.'
                ],
                tips: [
                    'Jaga lutut tetap sedikit ditekuk agar tidak kaku saat mendarat.',
                    'Tarik napas teratur, jangan menahan napas.',
                    'Mulai dengan 30–60 detik, bisa ditambah sesuai kemampuan.'
                ]
            },
            'mountain-climber': {
                steps: [
                    'Mulai pada posisi plank tinggi, tangan di bawah bahu.',
                    'Tarik lutut kanan ke arah dada tanpa mengangkat pinggul.',
                    'Ganti dengan lutut kiri secara bergantian secepat dan seaman mungkin.'
                ],
                tips: [
                    'Pastikan bahu, pinggul, dan tumit sejajar.',
                    'Jaga core tetap aktif agar punggung tidak melengkung.'
                ]
            },
            'burpee': {
                steps: [
                    'Berdiri tegak, kemudian squat dan letakkan tangan di lantai.',
                    'Lompatkan kaki ke belakang ke posisi plank.',
                    'Lakukan push-up opsional.',
                    'Lompatkan kaki kembali ke posisi squat, lalu lompat ke atas.'
                ],
                tips: ['Jaga pendaratan lembut dan stabil.', 'Sesuaikan kecepatan dengan kemampuan.']
            },
            'high-knees': {
                steps: ['Berlari di tempat sambil mengangkat lutut setinggi pinggang.', 'Gerakkan tangan mengikuti ritme.'],
                tips: ['Jaga badan tegak.', 'Fokus pada ritme napas.']
            },
            'squat-jump': {
                steps: ['Mulai dari posisi squat.', 'Dorong kuat ke atas untuk melompat.', 'Mendarat kembali ke posisi squat lembut.'],
                tips: ['Jangan biarkan lutut masuk ke dalam.', 'Aktifkan core untuk stabilitas.']
            },
            'plank-shoulder': {
                steps: ['Posisi plank tinggi.', 'Sentuh bahu kiri dengan tangan kanan, lalu bahu kanan dengan tangan kiri secara bergantian.'],
                tips: ['Minimalkan goyangan pinggul.', 'Tarik perut ke dalam.']
            },
            'lunges': {
                steps: ['Melangkah maju dengan satu kaki dan turunkan pinggul hingga kedua lutut membentuk sudut 90°.', 'Dorong kembali ke posisi awal dan ganti kaki.'],
                tips: ['Jaga tubuh tegak.', 'Lutut depan tidak melampaui ujung jari kaki.']
            }
        };

        const modal = document.getElementById('exerciseModal');
        const modalImage = document.getElementById('modalImage');
        const modalTitle = document.getElementById('modalTitle');
        const modalDuration = document.getElementById('modalDuration');
        const modalSteps = document.getElementById('modalSteps');
        const modalTips = document.getElementById('modalTips');

        function openModal(dataset) {
            const key = dataset.ex;
            const conf = DATA[key] || DATA['jumping-jack'];
            modalImage.src = dataset.image || modalImage.src;
            modalTitle.textContent = dataset.title || 'Latihan';
            modalDuration.textContent = (dataset.duration || '00:30').replace('.', ':');

            modalSteps.innerHTML = '';
            conf.steps.forEach(s => {
                const li = document.createElement('li');
                li.textContent = s;
                modalSteps.appendChild(li);
            });

            modalTips.innerHTML = '';
            conf.tips.forEach(t => {
                const li = document.createElement('li');
                li.textContent = t;
                modalTips.appendChild(li);
            });

            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }
        function closeModal() {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = '';
        }

        document.querySelectorAll('[data-ex]').forEach(btn => {
            btn.addEventListener('click', () => openModal(btn.dataset));
        });
        document.getElementById('closeModalBtn').addEventListener('click', closeModal);
        modal.addEventListener('click', (e) => { if (e.target === modal) closeModal(); });
        document.addEventListener('keydown', (e) => { if (e.key === 'Escape') closeModal(); });
    </script>
</body>
</html>
