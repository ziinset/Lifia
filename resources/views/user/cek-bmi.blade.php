<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator BMI - Lifia</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.iconify.design/3/3.1.1/iconify.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'green-primary': '#7FB069',
                        'green-secondary': '#A8C68F',
                        'green-light': '#E8F5E8'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 font-sans">
    <!-- Header -->
    @include('components.navbar2')

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8 max-w-4xl">
        <!-- Title Section -->
        <div class="flex items-center mb-6">
            <div class="bg-green-primary p-3 rounded-xl mr-4">
                <iconify-icon icon="healthicons:health-alt" class="text-white text-2xl"></iconify-icon>
            </div>
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Kalkulator BMI</h1>
                <p class="text-gray-600">Cek Indeks Massa Tubuh Anda</p>
            </div>
        </div>

        <!-- Description -->
        <p class="text-gray-600 mb-8 leading-relaxed">
            Gunakan kalkulator ini untuk menghitung Indeks Massa Tubuh (BMI) Anda. BMI membantu memperkirakan apakah berat badan Anda berada pada kisaran sehat berdasarkan tinggi badan. Hasil hanya indikator untuk penilaian yang lebih lengkap, konsultasikan ke tenaga kesehatan.
        </p>

        <!-- BMI Calculator Form -->
        <div class="bg-gradient-to-br from-green-light to-green-secondary rounded-3xl p-8 mb-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Jenis Kelamin</h2>

            <!-- Gender Selection -->
            <div class="flex space-x-6 mb-8">
                <div class="flex flex-col items-center">
                    <div class="w-20 h-20 bg-blue-200 rounded-full flex items-center justify-center mb-3 cursor-pointer hover:bg-blue-300 transition-colors" onclick="selectGender('male')">
                        <iconify-icon icon="mdi:account" class="text-3xl text-blue-600"></iconify-icon>
                    </div>
                    <span class="text-gray-700 font-medium">Laki-laki</span>
                </div>

                <div class="flex flex-col items-center">
                    <div class="w-20 h-20 bg-pink-200 rounded-full flex items-center justify-center mb-3 cursor-pointer hover:bg-pink-300 transition-colors" onclick="selectGender('female')">
                        <iconify-icon icon="mdi:account" class="text-3xl text-pink-600"></iconify-icon>
                    </div>
                    <span class="text-gray-700 font-medium">Perempuan</span>
                </div>
            </div>

            <!-- Illustration Placeholder -->
            <div class="flex justify-end mb-6">
                <div class="w-64 h-48 bg-green-300 rounded-2xl flex items-center justify-center">
                    <span class="text-gray-600 text-sm">Ilustrasi akan ditempatkan di sini</span>
                </div>
            </div>

            <!-- Input Fields -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Berat Badan</label>
                    <input type="number" id="weight" placeholder="(kg)" class="w-full p-3 rounded-xl border-0 bg-white shadow-sm focus:ring-2 focus:ring-green-primary outline-none">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Tinggi Badan</label>
                    <input type="number" id="height" placeholder="(cm)" class="w-full p-3 rounded-xl border-0 bg-white shadow-sm focus:ring-2 focus:ring-green-primary outline-none">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Usia</label>
                    <input type="number" id="age" placeholder="(tahun)" class="w-full p-3 rounded-xl border-0 bg-white shadow-sm focus:ring-2 focus:ring-green-primary outline-none">
                </div>
            </div>

            <!-- Calculate Button -->
            <button onclick="calculateBMI()" class="bg-green-primary text-white px-8 py-3 rounded-xl font-semibold hover:bg-green-600 transition-colors flex items-center">
                <iconify-icon icon="mdi:calculator" class="mr-2"></iconify-icon>
                Hitung
            </button>
        </div>

        <!-- BMI Result Section -->
        <div id="result-section" class="hidden">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Hasil BMI Anda</h2>

            <div class="flex items-start space-x-8">
                <div class="flex-1">
                    <div class="text-6xl font-bold text-gray-800 mb-4" id="bmi-value">22,3</div>

                    <!-- BMI Scale -->
                    <div class="mb-6">
                        <div class="flex h-4 rounded-full overflow-hidden mb-4">
                            <div class="bg-blue-400 flex-1"></div>
                            <div class="bg-green-400 flex-1"></div>
                            <div class="bg-orange-400 flex-1"></div>
                            <div class="bg-red-400 flex-1"></div>
                        </div>
                        <div class="flex justify-center">
                            <span class="bg-green-400 text-white px-4 py-1 rounded-full text-sm font-medium" id="bmi-category">Berat Sehat</span>
                        </div>
                    </div>

                    <div class="flex items-center mb-4">
                        <iconify-icon icon="mdi:check-circle" class="text-green-500 mr-2"></iconify-icon>
                        <span class="font-semibold text-gray-800">BMI Anda adalah <span id="bmi-result">22,3 - Berat Sehat</span></span>
                    </div>

                    <div class="text-gray-600 mb-4">
                        <p class="mb-2">Anda berada dalam kisaran berat badan yang dianggap ideal untuk kesehatan.</p>
                        <p>Pertahankan pola makan bergizi seimbang, olahraga teratur, dan cukup tidur agar kesehatan tetap optimal.</p>
                    </div>
                </div>

                <!-- Character Illustration Placeholder -->
                <div class="w-48 h-64 bg-gray-200 rounded-2xl flex items-center justify-center">
                    <span class="text-gray-500 text-sm text-center">Ilustrasi karakter<br>akan ditempatkan<br>di sini</span>
                </div>
            </div>

            <!-- FitPlan CTA -->
            <div class="mt-8">
                <button class="w-full bg-green-primary text-white py-4 rounded-xl font-semibold text-lg hover:bg-green-600 transition-colors">
                    Coba FitPlan untuk menjaga berat sehat Anda
                </button>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('components.footer')

    <script>
        let selectedGender = '';

        function selectGender(gender) {
            selectedGender = gender;

            // Remove previous selections
            document.querySelectorAll('[onclick*="selectGender"]').forEach(el => {
                el.classList.remove('ring-4', 'ring-blue-300', 'ring-pink-300');
            });

            // Add selection to clicked gender
            event.target.closest('div').classList.add('ring-4', gender === 'male' ? 'ring-blue-300' : 'ring-pink-300');
        }

        function calculateBMI() {
            const weight = parseFloat(document.getElementById('weight').value);
            const height = parseFloat(document.getElementById('height').value);
            const age = parseFloat(document.getElementById('age').value);

            if (!weight || !height || !age || !selectedGender) {
                alert('Mohon lengkapi semua field dan pilih jenis kelamin');
                return;
            }

            // Calculate BMI
            const heightInMeters = height / 100;
            const bmi = weight / (heightInMeters * heightInMeters);

            // Determine category
            let category = '';
            let categoryClass = '';

            if (bmi < 18.5) {
                category = 'Berat Kurang';
                categoryClass = 'bg-blue-400';
            } else if (bmi >= 18.5 && bmi < 25) {
                category = 'Berat Sehat';
                categoryClass = 'bg-green-400';
            } else if (bmi >= 25 && bmi < 30) {
                category = 'Berat Berlebih';
                categoryClass = 'bg-orange-400';
            } else {
                category = 'Obesitas';
                categoryClass = 'bg-red-400';
            }

            // Update result display
            document.getElementById('bmi-value').textContent = bmi.toFixed(1);
            document.getElementById('bmi-result').textContent = `${bmi.toFixed(1)} - ${category}`;

            const categoryElement = document.getElementById('bmi-category');
            categoryElement.textContent = category;
            categoryElement.className = `text-white px-4 py-1 rounded-full text-sm font-medium ${categoryClass}`;

            // Show result section
            document.getElementById('result-section').classList.remove('hidden');

            // Scroll to result
            document.getElementById('result-section').scrollIntoView({ behavior: 'smooth' });
        }
    </script>
</body>
</html>