<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BmiController;
use App\Http\Controllers\TentangKamiController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PremiumController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MealPlanController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\FitplanArticleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ==========================
// Halaman umum (tanpa login)
// ==========================
Route::get('/', fn() => view('home'))->name('home');
Route::get('/home', fn() => view('home'))->name('home');
Route::get('/artikel', [ArticleController::class, 'index'])->name('artikel');

// Aliases navigasi kategori sesuai skema teman, dipetakan ke controller yang ada
// Pola Makan Sehat
Route::get('/kategori/pola-makan-sehat', function () {
    return app(ArticleController::class)->showCategory('pola-makan-sehat');
})->name('kategori.pola-makan-sehat');
Route::get('/kategori/pola-makan-sehat/artikel-makanan', function () {
    return app(ArticleController::class)->showArticle('pola-makan-sehat', 'artikel-makanan');
})->name('kategori.pola-makan-sehat.artikel');
Route::get('/kategori/pola-makan-sehat/sarapan-seimbang', [ArticleController::class, 'sarapanSeimbang'])->name('kategori.pola-makan-sehat.sarapan-seimbang');

// Aktivitas Fisik
Route::get('/kategori/aktivitas-fisik', function () {
    return app(ArticleController::class)->showCategory('aktivitas-fisik');
})->name('kategori.aktivitas-fisik');
Route::get('/kategori/aktivitas-fisik/listolahraga', function () {
    return app(ArticleController::class)->showArticle('aktivitas-fisik', 'listolahraga');
})->name('kategori.aktivitas-fisik.listolahraga');
// Legacy article page alias
Route::get('/kategori/aktivitas-fisik/artikel', [ArticleController::class, 'aktivitasFisikArtikel'])->name('kategori.aktivitas-fisik.artikel.artikel');

// Kesehatan Mental
Route::get('/kategori/kesehatan-mental', function () {
    return app(ArticleController::class)->showCategory('kesehatan-mental');
})->name('kategori.kesehatan-mental');
Route::get('/kategori/kesehatan-mental/artikel-mental', function () {
    return app(ArticleController::class)->showArticle('kesehatan-mental', 'artikel-mental');
})->name('kategori.kesehatan-mental.artikel-mental');
// Halaman artikel generik di dalam folder artikel
Route::get('/kategori/kesehatan-mental/artikel', function () {
    return app(ArticleController::class)->showArticle('kesehatan-mental', 'artikel');
})->name('kategori.kesehatan-mental.artikel.artikel');

// Perawatan Diri
Route::get('/kategori/perawatan-diri', function () {
    return app(ArticleController::class)->showCategory('perawatan-diri');
})->name('kategori.perawatan-diri');
Route::get('/kategori/perawatan-diri/artikel-perawatan', function () {
    return app(ArticleController::class)->showArticle('perawatan-diri', 'artikel-perawatan');
})->name('kategori.perawatan-diri.artikel-perawatan');
// Halaman artikel generik di dalam folder artikel
Route::get('/kategori/perawatan-diri/artikel', function () {
    return app(ArticleController::class)->showArticle('perawatan-diri', 'artikel');
})->name('kategori.perawatan-diri.artikel.artikel');

// Vegan
Route::get('/kategori/vegan', function () {
    return app(ArticleController::class)->showCategory('vegan');
})->name('kategori.vegan');
Route::get('/kategori/vegan/artikel-vegan', function () {
    return app(ArticleController::class)->showArticle('vegan', 'artikel-vegan');
})->name('kategori.vegan.artikel-vegan');
// Halaman artikel generik di dalam folder artikel
Route::get('/kategori/vegan/artikel', function () {
    return app(ArticleController::class)->showArticle('vegan', 'artikel');
})->name('kategori.vegan.artikel.artikel');

// Eco Living
Route::get('/kategori/eco-living', function () {
    return app(ArticleController::class)->showCategory('eco-living');
})->name('kategori.eco-living');
Route::get('/kategori/eco-living/artikel-eco', function () {
    return app(ArticleController::class)->showArticle('eco-living', 'artikel-eco');
})->name('kategori.eco-living.artikel-eco');
// Halaman artikel generik di dalam folder artikel
Route::get('/kategori/eco-living/artikel', function () {
    return app(ArticleController::class)->showArticle('eco-living', 'artikel');
})->name('kategori.eco-living.artikel.artikel');

// Alias lama untuk kompatibilitas (beberapa view masih memanggil kategori.eco)
Route::get('/kategori/eco', function () {
    return app(ArticleController::class)->showCategory('eco-living');
})->name('kategori.eco');
Route::get('/kategori/eco/artikel-eco', function () {
    return app(ArticleController::class)->showArticle('eco-living', 'artikel-eco');
})->name('kategori.eco.artikel-eco');
// Halaman artikel generik untuk alias eco
Route::get('/kategori/eco/artikel', function () {
    return app(ArticleController::class)->showArticle('eco-living', 'artikel');
})->name('kategori.eco.artikel.artikel');

// Tetap sediakan rute dinamis agar kompatibel dengan URL lain
Route::get('/kategori/{category}', [ArticleController::class, 'showCategory'])->name('artikel.category');
Route::get('/kategori/{category}/{article}', [ArticleController::class, 'showArticle'])->name('artikel.show');

// Search Routes
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/search/suggestions', [SearchController::class, 'suggestions'])->name('search.suggestions');
Route::get('/search/quick', [SearchController::class, 'quickSearch'])->name('search.quick');

// Cek BMI (alias publik tanpa controller)
Route::get('/cek-bmi', fn() => view('user.cek-bmi'))->name('cek-bmi');

// Tentang Kami (alias publik tanpa controller)
Route::get('/tentang-kami', fn() => view('tentang-kami'))->name('tentang-kami');

// FitPlan: premium users see content, others see subscription page
Route::get('/fitplan', [PaymentController::class, 'showSubscription'])->name('fitplan');

// ==========================
// Auth Routes
// ==========================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Forgot Password Routes
Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetPassword'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

// Reset Password dengan Kode Verifikasi
Route::post('/send-verification-code', [AuthController::class, 'sendVerificationCode'])->name('password.send-code');
Route::get('/verify-code', [AuthController::class, 'showVerifyCode'])->name('password.verify-code');
Route::post('/verify-code', [AuthController::class, 'verifyCodeAndReset'])->name('password.verify-code');

// Logout harus pakai POST
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ==========================
// User Routes (hanya untuk user login)
// ==========================
Route::middleware('auth')->group(function () {
    // Profil (tampil + update)
    Route::get('/profil', [ProfileController::class, 'show'])->name('profil');
    Route::post('/profil', [ProfileController::class, 'update'])->name('profil.update');

    // Halaman user lain
    Route::get('/aktivitas', function () {
        $userId = auth()->id();
        $bmiRecord = null;
        $latestFavorite = null;
        if ($userId) {
            $bmiRecord = DB::table('bmi_records')
                ->where('user_id', $userId)
                ->orderByDesc('measured_at')
                ->orderByDesc('id')
                ->first();

            $latestFavorite = \App\Models\Favorite::where('user_id', $userId)
                ->orderByDesc('created_at')
                ->first();
        }
        return view('user.aktivitas', compact('bmiRecord', 'latestFavorite'));
    })->name('aktivitas');
    Route::get('/koleksi', [FavoriteController::class, 'showCollection'])->name('koleksi');
    Route::get('/progres', function () {
        $userId = auth()->id();
        $bmiRecord = null;
        if ($userId) {
            $bmiRecord = DB::table('bmi_records')
                ->where('user_id', $userId)
                ->orderByDesc('measured_at')
                ->orderByDesc('id')
                ->first();
        }
        return view('user.progres', compact('bmiRecord'));
    })->name('progres');

    // Simpan hasil BMI
    Route::post('/bmi', function (Request $request) {
        $userId = auth()->id();
        if (!$userId) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }
        $data = $request->validate([
            'height_cm' => 'required|numeric|min:1',
            'weight_kg' => 'required|numeric|min:1',
            'bmi' => 'required|numeric|min:1',
            'measured_at' => 'nullable|date',
        ]);
        DB::table('bmi_records')->insert([
            'user_id' => $userId,
            'height_cm' => $data['height_cm'],
            'weight_kg' => $data['weight_kg'],
            'bmi' => $data['bmi'],
            'measured_at' => $data['measured_at'] ?? now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return response()->json(['message' => 'Saved']);
    })->name('bmi.store');

    // Premium routes with controller
    Route::get('/premium', [PremiumController::class, 'premium'])->name('premium');
    Route::get('/nonpremium', [PremiumController::class, 'nonpremium'])->name('nonpremium');

    // Favorite routes
    Route::post('/favorites', [FavoriteController::class, 'store'])->name('favorites.store');
    Route::delete('/favorites', [FavoriteController::class, 'destroy'])->name('favorites.destroy');
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
    Route::get('/favorites/check', [FavoriteController::class, 'check'])->name('favorites.check');

    // Notes routes
    Route::get('/notes', [NotesController::class, 'index'])->name('notes.index');
    Route::post('/notes', [NotesController::class, 'store'])->name('notes.store');
    Route::get('/notes/{id}', [NotesController::class, 'show'])->name('notes.show');
    Route::put('/notes/{id}', [NotesController::class, 'update'])->name('notes.update');
    Route::delete('/notes/{id}', [NotesController::class, 'destroy'])->name('notes.destroy');
    Route::post('/notes/{id}/toggle-pin', [NotesController::class, 'togglePin'])->name('notes.toggle-pin');

    // Payment routes
    Route::post('/payment/create', [PaymentController::class, 'createPayment'])->name('payment.create');
    Route::get('/payment/success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
    Route::get('/payment/failed', [PaymentController::class, 'paymentFailed'])->name('payment.failed');
});

// ==========================
// Admin Routes (aksesnya sama dengan user login biasa)
// ==========================
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');
    Route::get('/admin/langganan', [AdminController::class, 'langganan'])
        ->name('admin.langganan');
    Route::get('/admin/kategori', [AdminController::class, 'kategori'])
        ->name('admin.kategori');
    Route::get('/admin/fitplan', function () {
        return view('admin.crud-fitplan');
    })->name('admin.fitplan');

    // FitPlan Category Routes
    Route::get('/admin/fitplan/turun-berat-badan', function () {
        return view('admin.crud-fitplan', ['category' => 'turun-berat-badan']);
    })->name('admin.fitplan.turun-berat-badan');

    Route::get('/admin/fitplan/bentuk-otot', function () {
        return view('admin.crud-fitplan', ['category' => 'bentuk-otot']);
    })->name('admin.fitplan.bentuk-otot');

    Route::get('/admin/fitplan/stamina-energi', function () {
        return view('admin.crud-fitplan', ['category' => 'stamina-energi']);
    })->name('admin.fitplan.stamina-energi');

    Route::get('/admin/fitplan/tubuh-lentur', function () {
        return view('admin.crud-fitplan', ['category' => 'tubuh-lentur']);
    })->name('admin.fitplan.tubuh-lentur');

    // FitPlan Article CRUD Routes
    Route::prefix('admin/fitplan/articles')->group(function () {
        Route::get('/', [FitplanArticleController::class, 'index'])->name('admin.fitplan.articles.index');
        Route::post('/', [FitplanArticleController::class, 'store'])->name('admin.fitplan.articles.store');
        Route::put('/{id}', [FitplanArticleController::class, 'update'])->name('admin.fitplan.articles.update');
        Route::delete('/{id}', [FitplanArticleController::class, 'destroy'])->name('admin.fitplan.articles.destroy');
        Route::post('/{id}/toggle-featured', [FitplanArticleController::class, 'toggleFeatured'])->name('admin.fitplan.articles.toggle-featured');
    });

    // Get latest articles for display
    Route::get('/api/fitplan/articles/{category}', [FitplanArticleController::class, 'getLatestArticles'])->name('api.fitplan.articles.latest');

    // Category CRUD Routes
    Route::resource('admin/categories', CategoryController::class)->except(['show']);
    Route::get('/admin/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::post('/admin/categories/{category}/toggle', [CategoryController::class, 'toggleStatus'])->name('admin.categories.toggle');
    Route::post('/admin/categories/update-order', [CategoryController::class, 'updateOrder'])->name('admin.categories.update-order');

    // Admin Article Category Routes
    Route::get('/admin/pola-makan-sehat', [AdminController::class, 'polaMakanSehat'])
        ->name('admin.pola-makan-sehat');
    Route::get('/admin/aktivitas-fisik', [AdminController::class, 'aktivitasFisik'])
        ->name('admin.aktivitas-fisik');
    Route::get('/admin/kesehatan-mental', [AdminController::class, 'kesehatanMental'])
        ->name('admin.kesehatan-mental');
    Route::get('/admin/perawatan-diri', [AdminController::class, 'perawatanDiri'])
        ->name('admin.perawatan-diri');
    Route::get('/admin/gaya-hidup-vegan', [AdminController::class, 'gayaHidupVegan'])
        ->name('admin.gaya-hidup-vegan');
    Route::get('/admin/eco-living', [AdminController::class, 'ecoLiving'])
        ->name('admin.eco-living');

    // Dynamic Category Routes - untuk kategori baru yang ditambahkan via CRUD
    Route::get('/admin/{category}', [AdminController::class, 'dynamicCategory'])
        ->name('admin.dynamic-category')
        ->where('category', '[a-z0-9\-]+');

    Route::post('/admin/profile/update', [AdminController::class, 'updateProfile'])
        ->name('admin.profile.update');
});

// ==========================
// Payment Notification (webhook from Midtrans - no auth required)
// ==========================
Route::post('/payment/notification', [PaymentController::class, 'handleNotification'])->name('payment.notification');

// ==========================
// Premium Routes (requires login + premium status)
// ==========================
Route::middleware(['auth'])->group(function () {
    // Meal Plan
    Route::get('/premium/mealplan', [MealPlanController::class, 'index'])->name('premium.mealplan');
    Route::get('/premium/mealplan/day/{day}', [MealPlanController::class, 'getMealPlan'])->name('premium.mealplan.day');
    Route::get('/premium/mealplan/weekly', [MealPlanController::class, 'getWeeklyOverview'])->name('premium.mealplan.weekly');

    // Meal Plan alias (untuk kompatibilitas)
    Route::get('/mealplan', function() {
        if (!Auth::check() || !Auth::user()->is_premium) {
            return redirect()->route('fitplan')->with('error', 'Anda harus berlangganan premium untuk mengakses fitur ini.');
        }
        return redirect()->route('premium.mealplan');
    })->name('mealplan');

    // Program Turun Berat Badan
    Route::get('/program-turun-berat-badan', function() {
        if (!Auth::check() || !Auth::user()->is_premium) {
            return redirect()->route('fitplan')->with('error', 'Anda harus berlangganan premium untuk mengakses fitur ini.');
        }
        return view('premium.program-turun-berat-badan.program_turunbb');
    })->name('program-turun-berat-badan');

    // Program Bentuk Otot
    Route::get('/program-bentuk-otot', function() {
        if (!Auth::check() || !Auth::user()->is_premium) {
            return redirect()->route('fitplan')->with('error', 'Anda harus berlangganan premium untuk mengakses fitur ini.');
        }
        return view('premium.program-bentuk-otot.program_bentuk_otot');
    })->name('program-bentuk-otot');

    // Program Stamina & Energi
    Route::get('/program-stamina-energi', function() {
        if (!Auth::check() || !Auth::user()->is_premium) {
            return redirect()->route('fitplan')->with('error', 'Anda harus berlangganan premium untuk mengakses fitur ini.');
        }
        return view('premium.program-stamina-energi.program_stamina_energi');
    })->name('program-stamina-energi');

    // Program Tubuh Lebih Lentur
    Route::get('/program-tubuh-lentur', function() {
        if (!Auth::check() || !Auth::user()->is_premium) {
            return redirect()->route('fitplan')->with('error', 'Anda harus berlangganan premium untuk mengakses fitur ini.');
        }
        return view('premium.program-tubuh-lentur.program_tubuh_lentar');
    })->name('program-tubuh-lentur');
});
