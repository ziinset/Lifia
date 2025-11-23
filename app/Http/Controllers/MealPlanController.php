<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MealPlanController extends Controller
{
    /**
     * Display the meal plan page
     */
    public function index()
    {
        return view('premium.mealplan');
    }

    /**
     * Get meal plan data for specific day
     */
    public function getMealPlan($day)
    {
        // Sample meal plan data - in real app, this would come from database
        $mealPlans = [
            1 => [
                'sarapan' => [
                    'title' => 'Energy Oat Bowl',
                    'calories' => '350 kcal',
                    'carbs' => '55g karbo',
                    'protein' => '12g protein',
                    'fat' => '6g lemak',
                    'description' => 'Oat dimasak dengan susu rendah lemak, topping pisang dan chia seeds. Memberi energi stabil sepanjang pagi.',
                    'image' => 'oat-bowl.jpg'
                ],
                'makan_siang' => [
                    'title' => 'Grilled Chicken Salad',
                    'calories' => '420 kcal',
                    'carbs' => '25g karbo',
                    'protein' => '35g protein',
                    'fat' => '18g lemak',
                    'description' => 'Ayam panggang dengan sayuran segar, quinoa, dan dressing olive oil. Tinggi protein untuk massa otot.',
                    'image' => 'chicken-salad.jpg'
                ],
                'makan_malam' => [
                    'title' => 'Salmon Teriyaki Bowl',
                    'calories' => '380 kcal',
                    'carbs' => '30g karbo',
                    'protein' => '28g protein',
                    'fat' => '15g lemak',
                    'description' => 'Salmon panggang dengan nasi merah, brokoli, dan saus teriyaki rendah sodium. Kaya omega-3.',
                    'image' => 'salmon-bowl.jpg'
                ],
                'snack' => [
                    'title' => 'Greek Yogurt Berry',
                    'calories' => '150 kcal',
                    'carbs' => '18g karbo',
                    'protein' => '10g protein',
                    'fat' => '4g lemak',
                    'description' => 'Greek yogurt dengan mixed berries dan granola. Snack sehat tinggi probiotik.',
                    'image' => 'yogurt-berry.jpg'
                ]
            ],
            2 => [
                'sarapan' => [
                    'title' => 'Avocado Toast Protein',
                    'calories' => '380 kcal',
                    'carbs' => '35g karbo',
                    'protein' => '15g protein',
                    'fat' => '22g lemak',
                    'description' => 'Roti gandum dengan alpukat, telur rebus, dan tomat cherry. Kaya lemak sehat dan protein.',
                    'image' => 'avocado-toast.jpg'
                ],
                'makan_siang' => [
                    'title' => 'Quinoa Buddha Bowl',
                    'calories' => '450 kcal',
                    'carbs' => '65g karbo',
                    'protein' => '18g protein',
                    'fat' => '16g lemak',
                    'description' => 'Quinoa dengan sayuran panggang, chickpeas, dan tahini dressing. Lengkap nutrisi nabati.',
                    'image' => 'buddha-bowl.jpg'
                ],
                'makan_malam' => [
                    'title' => 'Lean Beef Stir Fry',
                    'calories' => '400 kcal',
                    'carbs' => '28g karbo',
                    'protein' => '32g protein',
                    'fat' => '18g lemak',
                    'description' => 'Daging sapi tanpa lemak dengan sayuran warna-warni dan nasi merah. Tinggi zat besi.',
                    'image' => 'beef-stirfry.jpg'
                ],
                'snack' => [
                    'title' => 'Protein Smoothie',
                    'calories' => '200 kcal',
                    'carbs' => '25g karbo',
                    'protein' => '20g protein',
                    'fat' => '5g lemak',
                    'description' => 'Smoothie protein dengan pisang, bayam, dan protein powder. Ideal post-workout.',
                    'image' => 'protein-smoothie.jpg'
                ]
            ]
            // Add more days as needed...
        ];

        $dayData = $mealPlans[$day] ?? $mealPlans[1];
        
        return response()->json([
            'success' => true,
            'data' => $dayData,
            'summary' => $this->calculateDailySummary($dayData)
        ]);
    }

    /**
     * Calculate daily nutrition summary
     */
    private function calculateDailySummary($dayData)
    {
        $totalCalories = 0;
        $totalCarbs = 0;
        $totalProtein = 0;
        $totalFat = 0;

        foreach ($dayData as $meal) {
            // Extract numbers from strings like "350 kcal"
            $totalCalories += (int) filter_var($meal['calories'], FILTER_SANITIZE_NUMBER_INT);
            $totalCarbs += (int) filter_var($meal['carbs'], FILTER_SANITIZE_NUMBER_INT);
            $totalProtein += (int) filter_var($meal['protein'], FILTER_SANITIZE_NUMBER_INT);
            $totalFat += (int) filter_var($meal['fat'], FILTER_SANITIZE_NUMBER_INT);
        }

        return [
            'calories' => number_format($totalCalories),
            'carbs' => $totalCarbs . 'g',
            'protein' => $totalProtein . 'g',
            'fat' => $totalFat . 'g'
        ];
    }

    /**
     * Get weekly meal plan overview
     */
    public function getWeeklyOverview()
    {
        $weeklyData = [];
        
        for ($day = 1; $day <= 7; $day++) {
            $dayData = $this->getMealPlan($day)->getData();
            $weeklyData["day_$day"] = [
                'day' => $day,
                'summary' => $dayData->data->summary ?? null
            ];
        }

        return response()->json([
            'success' => true,
            'data' => $weeklyData
        ]);
    }
}
