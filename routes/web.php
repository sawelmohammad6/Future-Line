<?php

use Illuminate\Support\Facades\Route;

Route::get('/language/{locale}', function (string $locale) {
    abort_unless(in_array($locale, ['en', 'bn'], true), 404);

    session(['locale' => $locale]);

    return redirect()->back();
})->name('language.switch');

Route::view('/', 'home.index')->name('home');
Route::view('/products', 'products.index')->name('products.index');
Route::get('/products/{slug}', function (string $slug) {
    // Frontend-only demo data. Will be replaced by the products database later.
    $product = [
        'name' => 'Premium Pangas Fish Feed',
        'slug' => 'premium-pangas-fish-feed',
        'category' => 'Fish Feed',
        'brand' => 'Green Feed Industries',
        'seller' => 'Green Feed Industries',
        'seller_slug' => 'green-feed-industries',
        'seller_type' => 'Manufacturer',
        'location' => 'Dhaka, Bangladesh',
        'rating' => '4.8',
        'reviews_count' => 126,
        'grade' => 'Grade 1',
        'grade_note' => 'Premium Quality',
        'price_kg' => '৳55',
        'price_ton' => '৳55,000',
        'moq' => '500 KG',
        'stock' => 'In Stock',
        'available_qty' => '25,000 KG',
        'origin' => 'Bangladesh',
        'packaging' => '25 KG Bag',
        'shelf_life' => '6 Months',
        'image' => frontend_image('products.premium_pangas'),
        'gallery' => [
            frontend_image('products.premium_pangas'),
            frontend_image('products.pangas_gallery_2'),
            frontend_image('products.pangas_gallery_3'),
            frontend_image('products.pangas_gallery_4'),
        ],
        'overview' => 'Premium quality fish feed formulated for consistent growth and efficient farm performance. Produced with responsibly sourced ingredients, the formulation is designed to support healthy weight gain, strong digestion and improved feed conversion for pangas farming operations of all sizes.',
        'specs' => [
            'Product Type' => 'Fish Feed',
            'Target Species' => 'Pangas',
            'Grade' => 'Grade 1',
            'Unit' => 'KG / Ton',
            'Minimum Order' => '500 KG',
            'Origin' => 'Bangladesh',
            'Packaging' => '25 KG Bag',
            'Shelf Life' => '6 Months',
        ],
        'trust' => ['Verified Seller', 'Verified Business', 'Quality Information Available', 'Secure Marketplace Records'],
        'batch' => [
            'batch_number' => 'FLP-2026-0148',
            'manufacturing_date' => 'August 2026',
            'best_before' => 'February 2027',
            'coa' => 'Available',
        ],
        'reviews' => [
            ['name' => 'Md. Rafiqul Islam', 'location' => 'Bogura, Bangladesh', 'rating' => '5.0', 'date' => '2 weeks ago', 'text' => 'Quality feed. Our pangas farm reported noticeably better growth after switching to this batch.', 'verified' => true],
            ['name' => 'Sharmin Akter', 'location' => 'Khulna, Bangladesh', 'rating' => '5.0', 'date' => '1 month ago', 'text' => 'Consistent supply and prompt delivery. Packaging is durable and handles transport well.', 'verified' => true],
            ['name' => 'Abdul Karim', 'location' => 'Mymensingh, Bangladesh', 'rating' => '4.0', 'date' => '2 months ago', 'text' => 'Good overall quality and a fair price for this grade. Would recommend for medium farms.', 'verified' => true],
            ['name' => 'Tanvir Ahmed', 'location' => 'Dhaka, Bangladesh', 'rating' => '5.0', 'date' => '3 months ago', 'text' => 'Seller responded quickly to bulk quantity queries and shared the lab report without delay.', 'verified' => true],
        ],
    ];

    $related = [
        [
            'name' => 'Tilapia Floating Feed', 'slug' => 'tilapia-floating-feed', 'brand' => 'AquaPlus',
            'grade' => 'Grade 1', 'seller' => 'Bluewater Feeds', 'location' => 'Khulna, Bangladesh',
            'price' => '৳52 / KG', 'priceTon' => '৳52,000', 'moq' => '500 KG', 'rating' => '4.7',
            'stock' => 'In Stock', 'image' => frontend_image('products.tilapia_floating'),
        ],
        [
            'name' => 'Shrimp Feed Premium', 'slug' => 'shrimp-feed-premium', 'brand' => 'CoastalFeed',
            'grade' => 'Grade 1', 'seller' => 'Coastal Feed Mills', 'location' => 'Chattogram, Bangladesh',
            'price' => '৳78 / KG', 'priceTon' => '৳78,000', 'moq' => '300 KG', 'rating' => '4.9',
            'stock' => 'In Stock', 'image' => frontend_image('products.shrimp_premium'),
        ],
        [
            'name' => 'Shing Fish Feed', 'slug' => 'shing-fish-feed', 'brand' => 'AquaPlus',
            'grade' => 'Grade 2', 'seller' => 'Bengal Aqua Nutrition', 'location' => 'Mymensingh, Bangladesh',
            'price' => '৳58 / KG', 'priceTon' => '৳58,000', 'moq' => '500 KG', 'rating' => '4.6',
            'stock' => 'In Stock', 'image' => frontend_image('products.shing_fish_feed'),
        ],
        [
            'name' => 'Premium Cattle Feed', 'slug' => 'premium-cattle-feed', 'brand' => 'DeltaFeed',
            'grade' => 'Grade 1', 'seller' => 'Delta Animal Feed', 'location' => 'Gazipur, Bangladesh',
            'price' => '৳42 / KG', 'priceTon' => '৳42,000', 'moq' => '1,000 KG', 'rating' => '4.8',
            'stock' => 'In Stock', 'image' => frontend_image('products.premium_cattle'),
        ],
    ];

    return view('products.show', compact('product', 'related', 'slug'));
})->name('products.show');
Route::view('/categories', 'pages.categories')->name('categories.index');
Route::view('/sellers', 'sellers.index')->name('sellers.index');
Route::get('/sellers/{slug}', function (string $slug) {
    // Frontend-only demo data. Will be replaced by the seller/business database later.
    $seller = [
        'name' => 'Green Feed Industries',
        'slug' => 'green-feed-industries',
        'logo' => 'GF',
        'type' => 'Manufacturer • Supplier',
        'location' => 'Dhaka, Bangladesh',
        'rating' => '4.9',
        'products_count' => '120+',
        'buyers_count' => '500+',
        'established' => '2016',
        'description' => 'Green Feed Industries is a demo verified feed manufacturer and supplier serving buyers with fish feed, cattle feed and related feed products.',
        'long_description' => 'Green Feed Industries is a demo verified feed manufacturer and supplier serving buyers with fish feed, cattle feed and related feed products. The business focuses on consistent supply, clear grade information and dependable packaging for farms and resellers across Bangladesh.',
        'industry' => 'Animal Feed & Feed Ingredients',
        'years' => '10+ years',
        'languages' => 'Bangla, English',
        'main_categories' => ['Fish Feed', 'Cattle Feed', 'Poultry Feed', 'Feed Raw Materials'],
        'info' => [
            'Business Type' => 'Manufacturer',
            'Industry' => 'Animal Feed & Feed Ingredients',
            'Location' => 'Dhaka, Bangladesh',
            'Main Categories' => 'Fish Feed, Cattle Feed, Poultry Feed',
            'Years in Business' => '10+ years',
            'Languages' => 'Bangla, English',
        ],
        'products' => [
            ['name' => 'Premium Pangas Fish Feed', 'slug' => 'premium-pangas-fish-feed', 'brand' => 'GreenLine', 'grade' => 'Grade 1', 'seller' => 'Green Feed Industries', 'location' => 'Dhaka, Bangladesh', 'price' => '৳55 / KG', 'priceTon' => '৳55,000', 'moq' => '500 KG', 'rating' => '4.8', 'stock' => 'In Stock', 'image' => frontend_image('products.premium_pangas')],
            ['name' => 'Tilapia Floating Feed', 'slug' => 'tilapia-floating-feed', 'brand' => 'AquaPlus', 'grade' => 'Grade 1', 'seller' => 'Green Feed Industries', 'location' => 'Dhaka, Bangladesh', 'price' => '৳52 / KG', 'priceTon' => '৳52,000', 'moq' => '500 KG', 'rating' => '4.7', 'stock' => 'In Stock', 'image' => frontend_image('products.tilapia_floating')],
            ['name' => 'Shrimp Feed Premium', 'slug' => 'shrimp-feed-premium', 'brand' => 'CoastalFeed', 'grade' => 'Grade 1', 'seller' => 'Green Feed Industries', 'location' => 'Dhaka, Bangladesh', 'price' => '৳78 / KG', 'priceTon' => '৳78,000', 'moq' => '300 KG', 'rating' => '4.9', 'stock' => 'In Stock', 'image' => frontend_image('products.shrimp_premium')],
            ['name' => 'Shing Fish Feed', 'slug' => 'shing-fish-feed', 'brand' => 'AquaPlus', 'grade' => 'Grade 2', 'seller' => 'Green Feed Industries', 'location' => 'Dhaka, Bangladesh', 'price' => '৳58 / KG', 'priceTon' => '৳58,000', 'moq' => '500 KG', 'rating' => '4.6', 'stock' => 'In Stock', 'image' => frontend_image('products.shing_fish_feed')],
            ['name' => 'Dairy Cattle Feed', 'slug' => 'dairy-cattle-feed', 'brand' => 'DeltaFeed', 'grade' => 'Grade 1', 'seller' => 'Green Feed Industries', 'location' => 'Dhaka, Bangladesh', 'price' => '৳42 / KG', 'priceTon' => '৳42,000', 'moq' => '1,000 KG', 'rating' => '4.8', 'stock' => 'In Stock', 'image' => frontend_image('products.dairy_cattle')],
            ['name' => 'Broiler Starter Feed', 'slug' => 'broiler-starter-feed', 'brand' => 'RoyalMix', 'grade' => 'Grade 1', 'seller' => 'Green Feed Industries', 'location' => 'Dhaka, Bangladesh', 'price' => '৳61 / KG', 'priceTon' => '৳61,000', 'moq' => '500 KG', 'rating' => '4.6', 'stock' => 'In Stock', 'image' => frontend_image('products.broiler_starter')],
            ['name' => 'Layer Feed', 'slug' => 'layer-feed', 'brand' => 'GoldenGrain', 'grade' => 'Grade 1', 'seller' => 'Green Feed Industries', 'location' => 'Dhaka, Bangladesh', 'price' => '৳49 / KG', 'priceTon' => '৳49,000', 'moq' => '500 KG', 'rating' => '4.7', 'stock' => 'In Stock', 'image' => frontend_image('products.layer_feed')],
            ['name' => 'Fish Meal', 'slug' => 'fish-meal', 'brand' => 'MarineSource', 'grade' => 'Grade 1', 'seller' => 'Green Feed Industries', 'location' => 'Dhaka, Bangladesh', 'price' => '৳112 / KG', 'priceTon' => '৳112,000', 'moq' => '500 KG', 'rating' => '4.8', 'stock' => 'In Stock', 'image' => frontend_image('products.fish_meal')],
        ],
        'reviews' => [
            ['name' => 'Md. Rafiqul Islam', 'location' => 'Bogura, Bangladesh', 'rating' => '5.0', 'date' => '2 weeks ago', 'text' => 'Consistent batches and clear product information. Our orders arrive well packed and on schedule.', 'verified' => true],
            ['name' => 'Sharmin Akter', 'location' => 'Khulna, Bangladesh', 'rating' => '5.0', 'date' => '1 month ago', 'text' => 'Very responsive seller. Grades and pricing were clearly communicated before we placed an order.', 'verified' => true],
            ['name' => 'Abdul Karim', 'location' => 'Mymensingh, Bangladesh', 'rating' => '4.0', 'date' => '2 months ago', 'text' => 'Good quality feed for our fish farm. Delivery time was acceptable for a bulk order.', 'verified' => true],
            ['name' => 'Tanvir Ahmed', 'location' => 'Dhaka, Bangladesh', 'rating' => '5.0', 'date' => '3 months ago', 'text' => 'Shared lab details promptly and handled a quantity question professionally. Recommended.', 'verified' => true],
        ],
        'gallery' => [
            ['label' => 'Factory', 'image' => frontend_image('companies.green_feed_factory')],
            ['label' => 'Warehouse', 'image' => frontend_image('companies.green_feed_warehouse')],
            ['label' => 'Products', 'image' => frontend_image('products.premium_pangas')],
            ['label' => 'Packaging', 'image' => frontend_image('companies.green_feed_packaging')],
            ['label' => 'Team', 'image' => frontend_image('companies.green_feed_team')],
            ['label' => 'Facility', 'image' => frontend_image('companies.green_feed_facility')],
        ],
    ];

    $similarSellers = [
        ['name' => 'Bengal Agro Foods', 'slug' => 'bengal-agro-foods', 'image_key' => 'bengal_agro_foods', 'logo' => 'BA', 'type' => 'Manufacturer', 'location' => 'Gazipur, Bangladesh', 'products' => 'Feed ingredients & additives', 'description' => 'Demo verified supplier of feed raw materials for farms and resellers across Bangladesh.', 'rating' => '4.8', 'count' => '90+'],
        ['name' => 'Delta Nutrition Ltd.', 'slug' => 'delta-nutrition-ltd', 'image_key' => 'delta_nutrition', 'logo' => 'DN', 'type' => 'Manufacturer • Supplier', 'location' => 'Dhaka, Bangladesh', 'products' => 'Cattle & poultry feed', 'description' => 'Demo feed manufacturer focusing on consistent quality and dependable bulk supply.', 'rating' => '4.7', 'count' => '110+'],
        ['name' => 'Aqua Feed Solutions', 'slug' => 'aqua-feed-solutions', 'image_key' => 'aqua_feed_solutions', 'logo' => 'AF', 'type' => 'Supplier • Importer', 'location' => 'Chattogram, Bangladesh', 'products' => 'Aqua nutrition products', 'description' => 'Demo supplier of aquaculture feed and imported ingredients for commercial fish farms.', 'rating' => '4.9', 'count' => '75+'],
        ['name' => 'Prime Feed Industries', 'slug' => 'prime-feed-industries', 'image_key' => 'prime_feed_industries', 'logo' => 'PF', 'type' => 'Manufacturer', 'location' => 'Rajshahi, Bangladesh', 'products' => 'Poultry & duck feed', 'description' => 'Demo verified producer of poultry and duck feed with transparent grade information.', 'rating' => '4.6', 'count' => '85+'],
    ];

    return view('sellers.show', compact('seller', 'similarSellers', 'slug'));
})->name('sellers.show');
Route::view('/companies', 'companies.index')->name('companies.index');
Route::get('/companies/{slug}', function (string $slug) {
    // Frontend-only demo data. Will be replaced by the companies database later.
    $company = [
        'name' => 'Bengal Agro Foods',
        'slug' => 'bengal-agro-foods',
        'logo' => 'BA',
        'type' => 'Manufacturer • Brand Owner',
        'location' => 'Gazipur, Bangladesh',
        'rating' => '4.8',
        'products_count' => '85+',
        'years' => '15+',
        'country' => 'Bangladesh',
        'description' => 'Bengal Agro Foods is a demo verified manufacturer and brand owner of animal feed products, operating across fish feed, cattle feed, poultry feed and feed raw materials. Established in Gazipur, Bangladesh, the company serves farms, distributors and resellers across the country.',
        'long_description' => 'Bengal Agro Foods is a demo verified manufacturer and brand owner operating in the animal feed and feed ingredients industry. The company produces a range of feed products including fish feed, cattle feed, poultry feed, and related raw materials. With a focus on quality control and consistent supply, Bengal Agro Foods serves buyers across Bangladesh from its manufacturing facility in Gazipur.',
        'industry' => 'Animal Feed & Feed Ingredients',
        'main_business' => 'Manufacturing, Brand Ownership, Wholesale',
        'main_categories' => ['Fish Feed', 'Cattle Feed', 'Poultry Feed', 'Feed Raw Materials'],
        'languages' => 'Bangla, English',
        'info' => [
            'Business Type' => 'Manufacturer • Brand Owner',
            'Industry' => 'Animal Feed & Feed Ingredients',
            'Main Business' => 'Manufacturing, Brand Ownership, Wholesale',
            'Location' => 'Gazipur, Bangladesh',
            'Years in Business' => '15+ years',
            'Main Categories' => 'Fish Feed, Cattle Feed, Poultry Feed, Feed Raw Materials',
            'Languages' => 'Bangla, English',
        ],
        'brands' => [
            ['name' => 'GreenLine', 'initials' => 'GL', 'description' => 'Premium fish feed products for commercial aquaculture operations.', 'count' => '18'],
            ['name' => 'AquaPlus', 'initials' => 'AP', 'description' => 'Specialized nutrition for tilapia, shing and mixed-species farming.', 'count' => '14'],
            ['name' => 'DeltaFeed', 'initials' => 'DF', 'description' => 'Quality cattle and dairy feed for livestock farms of all sizes.', 'count' => '16'],
            ['name' => 'RoyalMix', 'initials' => 'RM', 'description' => 'Broiler and poultry feed formulated for optimal growth performance.', 'count' => '12'],
            ['name' => 'GoldenGrain', 'initials' => 'GG', 'description' => 'Layer feed and egg-production nutrition for poultry businesses.', 'count' => '10'],
            ['name' => 'MarineSource', 'initials' => 'MS', 'description' => 'Feed raw materials including fish meal, soybean meal and additives.', 'count' => '15'],
        ],
        'products' => [
            ['name' => 'Premium Pangas Fish Feed', 'slug' => 'premium-pangas-fish-feed', 'brand' => 'GreenLine', 'grade' => 'Grade 1', 'seller' => 'Bengal Agro Foods', 'location' => 'Gazipur, Bangladesh', 'price' => '৳55 / KG', 'priceTon' => '৳55,000', 'moq' => '500 KG', 'rating' => '4.8', 'stock' => 'In Stock', 'image' => frontend_image('products.premium_pangas')],
            ['name' => 'Tilapia Floating Feed', 'slug' => 'tilapia-floating-feed', 'brand' => 'AquaPlus', 'grade' => 'Grade 1', 'seller' => 'Bengal Agro Foods', 'location' => 'Gazipur, Bangladesh', 'price' => '৳52 / KG', 'priceTon' => '৳52,000', 'moq' => '500 KG', 'rating' => '4.7', 'stock' => 'In Stock', 'image' => frontend_image('products.tilapia_floating')],
            ['name' => 'Dairy Cattle Feed', 'slug' => 'dairy-cattle-feed', 'brand' => 'DeltaFeed', 'grade' => 'Grade 1', 'seller' => 'Bengal Agro Foods', 'location' => 'Gazipur, Bangladesh', 'price' => '৳42 / KG', 'priceTon' => '৳42,000', 'moq' => '1,000 KG', 'rating' => '4.8', 'stock' => 'In Stock', 'image' => frontend_image('products.dairy_cattle')],
            ['name' => 'Broiler Starter Feed', 'slug' => 'broiler-starter-feed', 'brand' => 'RoyalMix', 'grade' => 'Grade 1', 'seller' => 'Bengal Agro Foods', 'location' => 'Gazipur, Bangladesh', 'price' => '৳61 / KG', 'priceTon' => '৳61,000', 'moq' => '500 KG', 'rating' => '4.6', 'stock' => 'In Stock', 'image' => frontend_image('products.broiler_starter')],
            ['name' => 'Layer Feed Premium', 'slug' => 'layer-feed', 'brand' => 'GoldenGrain', 'grade' => 'Grade 1', 'seller' => 'Bengal Agro Foods', 'location' => 'Gazipur, Bangladesh', 'price' => '৳49 / KG', 'priceTon' => '৳49,000', 'moq' => '500 KG', 'rating' => '4.7', 'stock' => 'In Stock', 'image' => frontend_image('products.layer_feed')],
            ['name' => 'Fish Meal', 'slug' => 'fish-meal', 'brand' => 'MarineSource', 'grade' => 'Grade 1', 'seller' => 'Bengal Agro Foods', 'location' => 'Gazipur, Bangladesh', 'price' => '৳112 / KG', 'priceTon' => '৳112,000', 'moq' => '500 KG', 'rating' => '4.8', 'stock' => 'In Stock', 'image' => frontend_image('products.fish_meal')],
            ['name' => 'Shrimp Feed Premium', 'slug' => 'shrimp-feed-premium', 'brand' => 'GreenLine', 'grade' => 'Grade 1', 'seller' => 'Bengal Agro Foods', 'location' => 'Gazipur, Bangladesh', 'price' => '৳78 / KG', 'priceTon' => '৳78,000', 'moq' => '300 KG', 'rating' => '4.9', 'stock' => 'In Stock', 'image' => frontend_image('products.shrimp_premium')],
            ['name' => 'Soybean Meal', 'slug' => 'soybean-meal', 'brand' => 'MarineSource', 'grade' => 'Feed Grade', 'seller' => 'Bengal Agro Foods', 'location' => 'Gazipur, Bangladesh', 'price' => '৳65 / KG', 'priceTon' => '৳65,000', 'moq' => '1,000 KG', 'rating' => '4.7', 'stock' => 'In Stock', 'image' => frontend_image('products.soybean_meal')],
        ],
        'gallery' => [
            ['label' => 'Factory', 'image' => frontend_image('companies.bengal_agro_factory')],
            ['label' => 'Warehouse', 'image' => frontend_image('companies.bengal_agro_warehouse')],
            ['label' => 'Production Line', 'image' => frontend_image('companies.bengal_agro_production_line')],
            ['label' => 'Packaging Area', 'image' => frontend_image('companies.bengal_agro_packaging')],
            ['label' => 'Product Storage', 'image' => frontend_image('companies.bengal_agro_storage')],
            ['label' => 'Testing Facility', 'image' => frontend_image('companies.bengal_agro_testing')],
        ],
        'documents' => [
            ['name' => 'Business Registration', 'status' => 'Demo Sample'],
            ['name' => 'Quality Certificate', 'status' => 'Demo Sample'],
            ['name' => 'Product Certificate', 'status' => 'Demo Sample'],
            ['name' => 'COA / Lab Report', 'status' => 'Demo Sample'],
        ],
        'reviews' => [
            ['name' => 'Md. Rafiqul Islam', 'location' => 'Bogura, Bangladesh', 'rating' => '5.0', 'date' => '2 weeks ago', 'text' => 'Excellent product quality and consistent supply. Our fish farm has seen improved growth rates since switching to their GreenLine brand.'],
            ['name' => 'Sharmin Akter', 'location' => 'Khulna, Bangladesh', 'rating' => '5.0', 'date' => '1 month ago', 'text' => 'Professional business to work with. Clear pricing, proper documentation and timely delivery for our bulk orders.'],
            ['name' => 'Abdul Karim', 'location' => 'Mymensingh, Bangladesh', 'rating' => '4.0', 'date' => '2 months ago', 'text' => 'Good quality cattle feed at competitive pricing. Packaging is durable and handles transport well across districts.'],
            ['name' => 'Tanvir Ahmed', 'location' => 'Dhaka, Bangladesh', 'rating' => '5.0', 'date' => '3 months ago', 'text' => 'Their MarineSource fish meal is the best we have sourced locally. Lab reports were shared promptly upon request.'],
        ],
    ];

    return view('companies.show', compact('company', 'slug'));
})->name('companies.show');
Route::get('/traders/{slug}', function (string $slug) {
    // Frontend-only demo data. Will be replaced by the traders database later.
    $trader = [
        'name' => 'Global Agro Trading',
        'slug' => 'global-agro-trading',
        'logo' => 'GA',
        'type' => 'Importer • Exporter',
        'location' => 'Dhaka, Bangladesh',
        'rating' => '4.7',
        'listings_count' => '45+',
        'markets_count' => '6+',
        'capacity' => '2,500+ Ton',
        'description' => 'Global Agro Trading is a demo verified import-export business specializing in feed raw materials and agricultural commodities. The business connects international suppliers with buyers in Bangladesh, handling sourcing, quality verification and logistics for bulk feed ingredient shipments.',
        'summary' => [
            'Business Type' => 'Importer / Exporter',
            'Primary Market' => 'Bangladesh',
            'Trade Categories' => 'Feed Raw Materials',
            'Available Products' => 'Soybean Meal, Maize, Fish Meal, DDGS',
            'Demo Supply Capacity' => '2,500+ Ton',
            'Active Markets' => '6 Countries',
        ],
        'products' => [
            ['name' => 'Soybean Meal', 'origin' => 'Argentina', 'grade' => 'Feed Grade', 'quantity' => '1,000 Ton', 'price' => '৳XX / KG', 'availability' => 'Available', 'image' => frontend_image('products.soybean_meal')],
           
            ['name' => 'Fish Meal', 'origin' => 'Vietnam', 'grade' => 'Feed Grade', 'quantity' => '500 Ton', 'price' => '৳XX / KG', 'availability' => 'Available', 'image' => frontend_image('products.fish_meal')],
            ['name' => 'DDGS', 'origin' => 'India', 'grade' => 'Feed Grade', 'quantity' => '600 Ton', 'price' => '৳XX / KG', 'availability' => 'Available', 'image' => frontend_image('products.ddgs')],
        ],
        'countries' => [
            ['name' => 'Bangladesh', 'flag' => '🇧🇩'],
            ['name' => 'India', 'flag' => '🇮🇳'],
            ['name' => 'China', 'flag' => '🇨🇳'],
            ['name' => 'Argentina', 'flag' => '🇦🇷'],
            ['name' => 'Brazil', 'flag' => '🇧🇷'],
            ['name' => 'Vietnam', 'flag' => '🇻🇳'],
        ],
        'shipping' => [
            'Delivery Location' => 'Dhaka, Chattogram, Bangladesh',
            'Transport Method' => 'Sea Freight, Road Transport',
            'Estimated Lead Time' => '15–45 Days (demo estimate)',
            'Minimum Order' => '25 Ton',
            'Packaging' => 'Bulk, 50 KG Bag, Container',
        ],
        'documents' => [
            ['name' => 'Certificate of Origin', 'status' => 'Demo Sample'],
            ['name' => 'Quality Certificate', 'status' => 'Demo Sample'],
            ['name' => 'Commercial Invoice', 'status' => 'Demo Sample'],
            ['name' => 'Packing Information', 'status' => 'Demo Sample'],
            ['name' => 'COA / Lab Report', 'status' => 'Demo Sample'],
        ],
    ];

    return view('traders.show', compact('trader', 'slug'));
})->name('traders.show');
Route::view('/about', 'pages.about')->name('about');
Route::view('/contact', 'pages.contact')->name('contact');
Route::view('/login', 'auth.login')->name('login');
Route::view('/register', 'auth.register')->name('register');
Route::view('/forgot-password', 'auth.forgot-password')->name('forgot-password');
Route::view('/verify-otp', 'auth.verify-otp')->name('verify-otp');
Route::view('/reset-password', 'auth.reset-password')->name('reset-password');
Route::view('/dashboard', 'dashboard.index')->name('dashboard');
Route::view('/seller/dashboard', 'seller.dashboard')->name('seller.dashboard');
Route::view('/admin', 'admin.index')->name('admin.index');
