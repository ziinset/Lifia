<?php

namespace App\Helpers;

use App\Models\Category;
use Illuminate\Support\Facades\Route;

class HeaderHelper
{
    /**
     * Get the appropriate header component for current page
     */
    public static function getHeaderComponent()
    {
        $currentRoute = Route::currentRouteName();
        $currentUrl = request()->path();
        
        // Check if we're on a category page
        if (str_starts_with($currentUrl, 'kategori/')) {
            $categorySlug = explode('/', $currentUrl)[1] ?? null;
            
            if ($categorySlug) {
                $category = Category::where('slug', $categorySlug)->where('is_active', true)->first();
                
                if ($category) {
                    return $category->header_component;
                }
            }
        }
        
        // Default header mapping for specific routes
        $routeHeaderMap = [
            'landing' => 'components.header',
            'home' => 'components.header1',
            'artikel' => 'components.header',
            'profil' => 'components.header1',
            'koleksi' => 'components.header1',
            'premium' => 'components.header1',
            'nonpremium' => 'components.header1',
        ];
        
        return $routeHeaderMap[$currentRoute] ?? 'components.header';
    }
    
    /**
     * Get header data for the current page
     */
    public static function getHeaderData()
    {
        $currentUrl = request()->path();
        
        // Check if we're on a category page
        if (str_starts_with($currentUrl, 'kategori/')) {
            $categorySlug = explode('/', $currentUrl)[1] ?? null;
            
            if ($categorySlug) {
                $category = Category::where('slug', $categorySlug)->where('is_active', true)->first();
                
                if ($category) {
                    return [
                        'title' => $category->name,
                        'description' => $category->description,
                        'color' => $category->color,
                        'icon' => $category->icon,
                        'category' => $category
                    ];
                }
            }
        }
        
        // Default header data
        return [
            'title' => 'Lifia',
            'description' => 'Platform kesehatan dan gaya hidup sehat',
            'color' => '#4E342E',
            'icon' => null,
            'category' => null
        ];
    }
    
    /**
     * Check if current page should use dynamic header
     */
    public static function shouldUseDynamicHeader()
    {
        $currentUrl = request()->path();
        
        // Use dynamic header for category pages
        if (str_starts_with($currentUrl, 'kategori/')) {
            return true;
        }
        
        return false;
    }
    
    /**
     * Get navbar type for current page
     */
    public static function getNavbarType()
    {
        $currentRoute = Route::currentRouteName();
        
        // Routes that should use navbar2 (green theme)
        $navbar2Routes = [
            'home',
            'profil',
            'koleksi',
            'premium',
            'nonpremium',
            'aktivitas'
        ];
        
        if (in_array($currentRoute, $navbar2Routes)) {
            return 'navbar2';
        }
        
        // Check if we're on a category page with specific header type
        $currentUrl = request()->path();
        if (str_starts_with($currentUrl, 'kategori/')) {
            $categorySlug = explode('/', $currentUrl)[1] ?? null;
            
            if ($categorySlug) {
                $category = Category::where('slug', $categorySlug)->where('is_active', true)->first();
                
                if ($category && in_array($category->header_type, ['header1', 'hero-mental', 'hero-olga'])) {
                    return 'navbar2';
                }
            }
        }
        
        return 'navbar';
    }
}
