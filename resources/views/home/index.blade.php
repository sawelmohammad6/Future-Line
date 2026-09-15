@extends('layouts.app')

@section('title', 'Future Line Trading')
@section('meta_description', 'Future Line Trading connects verified buyers, sellers, suppliers, manufacturers, importers and exporters.')

@php
    $primaryActions = ['BUY', 'SELL', 'IMPORT', 'EXPORT'];
    $trustIndicators = ['Verified Businesses', 'Trusted Marketplace', 'Quality Transparency', 'Secure Transactions'];
    $categories = [
        ['name' => 'Fish Feed', 'description' => 'Balanced nutrition for commercial aquaculture operations.', 'subcategories' => 'Pangas, Tilapia, Shrimp, Shing, Magur, Pabda', 'count' => '128', 'image' => frontend_image('categories.fish_feed')],
        ['name' => 'Cattle Feed', 'description' => 'Performance-focused feed for healthy, productive livestock.', 'subcategories' => 'Dairy, Beef Cattle, Calf', 'count' => '86', 'image' => frontend_image('categories.cattle_feed')],
        ['name' => 'Poultry Feed', 'description' => 'Reliable feed solutions for every stage of poultry growth.', 'subcategories' => 'Broiler, Layer, Chick', 'count' => '94', 'image' => frontend_image('categories.poultry_feed')],
        ['name' => 'Duck Feed', 'description' => 'Specialized nutrition to support healthy duck farming.', 'subcategories' => 'Starter, Grower, Layer', 'count' => '32', 'image' => frontend_image('categories.duck_feed')],
        ['name' => 'Animal Feed', 'description' => 'Quality feed for small ruminants and other farm animals.', 'subcategories' => 'Goat, Sheep, Other Animal Feed', 'count' => '57', 'image' => frontend_image('categories.animal_feed')],
        ['name' => 'Feed Raw Materials', 'description' => 'Essential ingredients sourced for dependable feed production.', 'subcategories' => 'Fish Meal, Soybean Meal, Maize, Rice Polish, Wheat Bran', 'count' => '143', 'image' => frontend_image('categories.raw_materials')],
    ];
    $featuredProducts = [
        ['slug' => 'premium-pangas-fish-feed', 'name' => 'Premium Pangas Fish Feed', 'grade' => 'Grade 1', 'seller' => 'Aqua Nutrition Ltd.', 'price' => '৳55 / KG', 'moq' => '500 KG', 'rating' => '4.8', 'image' => frontend_image('products.premium_pangas')],
        ['slug' => 'tilapia-floating-feed', 'name' => 'Tilapia Floating Feed', 'grade' => 'Grade A', 'seller' => 'Bluewater Feeds', 'price' => '৳52 / KG', 'moq' => '500 KG', 'rating' => '4.7', 'image' => frontend_image('products.tilapia_floating')],
        ['slug' => 'shrimp-feed-premium', 'name' => 'Shrimp Feed Premium', 'grade' => 'Export Grade', 'seller' => 'Coastal Feed Mills', 'price' => '৳78 / KG', 'moq' => '300 KG', 'rating' => '4.9', 'image' => frontend_image('products.shrimp_premium')],
        ['slug' => 'dairy-cattle-feed', 'name' => 'Dairy Cattle Feed', 'grade' => 'High Energy', 'seller' => 'Green Field Agro', 'price' => '৳42 / KG', 'moq' => '1,000 KG', 'rating' => '4.8', 'image' => frontend_image('products.dairy_cattle')],
        ['slug' => 'broiler-starter-feed', 'name' => 'Broiler Starter Feed', 'grade' => 'Starter Formula', 'seller' => 'Prime Poultry Feed', 'price' => '৳61 / KG', 'moq' => '500 KG', 'rating' => '4.6', 'image' => frontend_image('products.broiler_starter')],
        ['slug' => 'layer-feed', 'name' => 'Layer Feed', 'grade' => 'Premium Layer', 'seller' => 'Golden Grain Ltd.', 'price' => '৳49 / KG', 'moq' => '500 KG', 'rating' => '4.7', 'image' => frontend_image('products.layer_feed')],
        ['slug' => 'soybean-meal', 'name' => 'Soybean Meal', 'grade' => 'Protein 46%', 'seller' => 'Delta Commodities', 'price' => '৳68 / KG', 'moq' => '1,000 KG', 'rating' => '4.9', 'image' => frontend_image('products.soybean_meal')],
        ['slug' => 'fish-meal', 'name' => 'Fish Meal', 'grade' => 'Protein 60%', 'seller' => 'Marine Source BD', 'price' => '৳112 / KG', 'moq' => '500 KG', 'rating' => '4.8', 'image' => frontend_image('products.fish_meal')],
    ];
    $sellers = [
        ['slug' => 'green-feed-industries', 'image_key' => 'green_feed_industries', 'logo' => 'GF', 'name' => 'Green Feed Industries', 'type' => 'Manufacturer', 'location' => 'Dhaka, Bangladesh', 'products' => 'Fish Feed | Cattle Feed', 'rating' => '4.9', 'count' => '120+', 'description' => 'Reliable nutrition solutions for commercial fish and livestock farms.'],
        ['slug' => 'bengal-aqua-nutrition', 'image_key' => 'bengal_aqua_nutrition', 'logo' => 'BA', 'name' => 'Bengal Aqua Nutrition', 'type' => 'Fish Feed Supplier', 'location' => 'Khulna, Bangladesh', 'products' => 'Pangas Feed | Shrimp Feed', 'rating' => '4.8', 'count' => '86+', 'description' => 'Specialist supplier of balanced aquaculture feed and farm inputs.'],
        ['slug' => 'delta-animal-feed', 'image_key' => 'delta_animal_feed', 'logo' => 'DA', 'name' => 'Delta Animal Feed', 'type' => 'Manufacturer', 'location' => 'Gazipur, Bangladesh', 'products' => 'Dairy Feed | Goat Feed', 'rating' => '4.7', 'count' => '74+', 'description' => 'Performance-focused feed products for healthy and productive animals.'],
        ['slug' => 'royal-poultry-nutrition', 'image_key' => 'royal_poultry_nutrition', 'logo' => 'RP', 'name' => 'Royal Poultry Nutrition', 'type' => 'Poultry Feed Supplier', 'location' => 'Chattogram, Bangladesh', 'products' => 'Broiler Feed | Layer Feed', 'rating' => '4.9', 'count' => '98+', 'description' => 'Trusted poultry nutrition for farms at every production stage.'],
        ['slug' => 'agro-source-bangladesh', 'image_key' => 'agro_source_bangladesh', 'logo' => 'AS', 'name' => 'Agro Source Bangladesh', 'type' => 'Raw Material Supplier', 'location' => 'Narayanganj, Bangladesh', 'products' => 'Soybean Meal | Maize', 'rating' => '4.6', 'count' => '65+', 'description' => 'Sourcing quality feed ingredients for manufacturers across Bangladesh.'],
        ['slug' => 'fresh-feed-ingredients', 'image_key' => 'fresh_feed_ingredients', 'logo' => 'FF', 'name' => 'Fresh Feed & Ingredients', 'type' => 'Wholesale Supplier', 'location' => 'Rajshahi, Bangladesh', 'products' => 'Fish Meal | Rice Polish', 'rating' => '4.8', 'count' => '91+', 'description' => 'Consistent feed ingredients with transparent supply information.'],
    ];
    $companies = [
        ['slug' => 'bengal-agro-foods', 'image_key' => 'bengal_agro_foods', 'logo' => 'BAF', 'name' => 'Bengal Agro Foods', 'industry' => 'Feed Manufacturer', 'location' => 'Gazipur, Bangladesh', 'years' => '15+ Years', 'count' => '85', 'description' => 'Specialized manufacturer and supplier of quality animal feed and feed ingredients.'],
        ['slug' => 'national-feed-mills', 'image_key' => 'national_feed_mills', 'logo' => 'NFM', 'name' => 'National Feed Mills', 'industry' => 'Integrated Feed Producer', 'location' => 'Dhaka, Bangladesh', 'years' => '18+ Years', 'count' => '112', 'description' => 'Established producer serving commercial poultry, dairy and aqua businesses.'],
        ['slug' => 'delta-nutrition-ltd', 'image_key' => 'delta_nutrition', 'logo' => 'DNL', 'name' => 'Delta Nutrition Ltd.', 'industry' => 'Animal Nutrition Company', 'location' => 'Narayanganj, Bangladesh', 'years' => '12+ Years', 'count' => '76', 'description' => 'Research-led nutrition products designed for consistent farm outcomes.'],
        ['slug' => 'aqua-harvest-bangladesh', 'image_key' => 'aqua_harvest_bangladesh', 'logo' => 'AHB', 'name' => 'Aqua Harvest Bangladesh', 'industry' => 'Aquaculture Supplier', 'location' => 'Khulna, Bangladesh', 'years' => '10+ Years', 'count' => '64', 'description' => 'Supporting aquaculture producers with quality feed and farm solutions.'],
        ['slug' => 'prime-agro-industries', 'image_key' => 'prime_agro_industries', 'logo' => 'PAI', 'name' => 'Prime Agro Industries', 'industry' => 'Agro Manufacturer', 'location' => 'Bogura, Bangladesh', 'years' => '14+ Years', 'count' => '93', 'description' => 'A dependable manufacturing partner for livestock and poultry operations.'],
        ['slug' => 'eastern-feed-ingredients', 'image_key' => 'eastern_feed_ingredients', 'logo' => 'EFI', 'name' => 'Eastern Feed & Ingredients', 'industry' => 'Ingredient Importer', 'location' => 'Chattogram, Bangladesh', 'years' => '11+ Years', 'count' => '58', 'description' => 'Importing and distributing carefully selected feed raw materials.'],
    ];
    $trustItems = [
        ['title' => 'Verified Businesses', 'description' => 'Business identities are reviewed before approval.'],
        ['title' => 'Verified Products', 'description' => 'Product information and quality details are clearly presented.'],
        ['title' => 'Clear Pricing & Quantity', 'description' => 'Transparent KG/Ton pricing and quantity information.'],
        ['title' => 'Secure Transaction Records', 'description' => 'Orders and transaction details stay recorded on the platform.'],
    ];
    $tradePartners = [
        ['slug' => 'bangladesh-feed-import', 'image_key' => 'bangladesh_feed_import', 'logo' => 'BFI', 'name' => 'Bangladesh Feed Import Ltd.', 'type' => 'Importer', 'country' => 'Bangladesh | Origin: Brazil & India', 'products' => 'Soybean Meal | Maize | Fish Meal', 'quantity' => '2,500+ Ton', 'description' => 'Bulk sourcing partner for quality feed ingredients and commodities.'],
        ['slug' => 'global-agro-trading', 'image_key' => 'global_agro_trading', 'logo' => 'GAT', 'name' => 'Global Agro Trading', 'type' => 'Importer', 'country' => 'Singapore | Origin: Argentina', 'products' => 'DDGS | CGM | Premix', 'quantity' => '1,800+ Ton', 'description' => 'International commodity trader connecting verified feed suppliers.'],
        ['slug' => 'bengal-commodity-export', 'image_key' => 'bengal_commodity_export', 'logo' => 'BCE', 'name' => 'Bengal Commodity Export', 'type' => 'Exporter', 'country' => 'Bangladesh | Markets: Asia', 'products' => 'Rice Bran | Rice Polish', 'quantity' => '3,200+ Ton', 'description' => 'Exporting dependable agricultural by-products to regional buyers.'],
        ['slug' => 'eastern-feed-imports', 'image_key' => 'eastern_feed_imports', 'logo' => 'EFI', 'name' => 'Eastern Feed Imports', 'type' => 'Importer', 'country' => 'Bangladesh | Origin: Peru', 'products' => 'Fish Meal | Fish Oil', 'quantity' => '950+ Ton', 'description' => 'Specialized importer of marine ingredients for feed production.'],
        ['slug' => 'agrolink-international', 'image_key' => 'agrolink_international', 'logo' => 'ALI', 'name' => 'AgroLink International', 'type' => 'Exporter', 'country' => 'Thailand | Markets: South Asia', 'products' => 'Maize | Wheat Bran', 'quantity' => '2,100+ Ton', 'description' => 'Regional agro trader focused on efficient bulk supply programs.'],
        ['slug' => 'tradebridge-bangladesh', 'image_key' => 'tradebridge_bangladesh', 'logo' => 'TBB', 'name' => 'TradeBridge Bangladesh', 'type' => 'Importer & Exporter', 'country' => 'Bangladesh | Global Network', 'products' => 'Soybean Meal | Limestone', 'quantity' => '1,500+ Ton', 'description' => 'A cross-border trade partner for ingredient buyers and suppliers.'],
    ];
    $rawMaterials = [
        ['slug' => 'fish-meal', 'name' => 'Fish Meal', 'description' => 'High-protein marine feed ingredient.', 'origin' => 'Peru', 'price' => '৳78 / KG', 'moq' => '1,000 KG', 'image' => frontend_image('products.fish_meal')],
        ['slug' => 'soybean-meal', 'name' => 'Soybean Meal', 'description' => 'Protein-rich plant-based feed ingredient.', 'origin' => 'Brazil', 'price' => '৳68 / KG', 'moq' => '1,000 KG', 'image' => frontend_image('products.soybean_meal')],
       
        ['slug' => 'rice-polish', 'name' => 'Rice Polish', 'description' => 'Nutritious milling by-product for animal diets.', 'origin' => 'Bangladesh', 'price' => '৳31 / KG', 'moq' => '2 Ton', 'image' => frontend_image('products.rice_polish')],
        ['slug' => 'rice-bran', 'name' => 'Rice Bran', 'description' => 'Natural source of energy and fiber.', 'origin' => 'Bangladesh', 'price' => '৳29 / KG', 'moq' => '2 Ton', 'image' => frontend_image('products.rice_bran')],
        ['slug' => 'wheat-bran', 'name' => 'Wheat Bran', 'description' => 'Fiber-rich cereal ingredient for feed blends.', 'origin' => 'India', 'price' => '৳34 / KG', 'moq' => '2 Ton', 'image' => frontend_image('products.wheat_bran')],
       
        ['slug' => 'fish-oil', 'name' => 'Fish Oil', 'description' => 'Marine oil source for nutrition and energy.', 'origin' => 'Peru', 'price' => '৳145 / KG', 'moq' => '500 KG', 'image' => frontend_image('products.fish_oil')],
        ['slug' => 'premix', 'name' => 'Premix', 'description' => 'Essential vitamin and mineral feed blend.', 'origin' => 'Netherlands', 'price' => '৳220 / KG', 'moq' => '100 KG', 'image' => frontend_image('products.premix')],
        ['slug' => 'limestone', 'name' => 'Limestone', 'description' => 'Calcium source for livestock and poultry feed.', 'origin' => 'Bangladesh', 'price' => '৳12 / KG', 'moq' => '5 Ton', 'image' => frontend_image('products.limestone')],
    ];
    $testimonials = [
        ['name' => 'Rahim Uddin', 'business' => 'Green Valley Fish Farm', 'location' => 'Mymensingh', 'product' => 'Premium Pangas Fish Feed', 'rating' => '4.9', 'review' => 'Since switching to this feed, our farm has seen more consistent results and reliable supply.', 'photo' => frontend_image('testimonials.rahim_uddin'), 'productImage' => frontend_image('products.premium_pangas')],
        ['name' => 'Fatema Begum', 'business' => 'Savar Dairy Farm', 'location' => 'Savar, Dhaka', 'product' => 'Dairy Cattle Feed', 'rating' => '4.8', 'review' => 'The supplier information was clear, and the feed quality has been dependable for our dairy herd.', 'photo' => frontend_image('testimonials.fatema_begum'), 'productImage' => frontend_image('products.dairy_cattle')],
        ['name' => 'Abdul Karim', 'business' => 'Karim Aqua Enterprise', 'location' => 'Rajshahi', 'product' => 'Tilapia Floating Feed', 'rating' => '4.9', 'review' => 'Finding verified sellers in one place has made our regular feed sourcing much easier.', 'photo' => frontend_image('testimonials.abdul_karim'), 'productImage' => frontend_image('products.tilapia_floating')],
        ['name' => 'Sultana Akter', 'business' => 'Meghna Poultry Farm', 'location' => 'Cumilla', 'product' => 'Broiler Starter Feed', 'rating' => '4.7', 'review' => 'We can compare product grades and quantities before deciding, which gives us confidence.', 'photo' => frontend_image('testimonials.sultana_akter'), 'productImage' => frontend_image('products.broiler_starter')],
        ['name' => 'Jamal Hossain', 'business' => 'Barind Livestock', 'location' => 'Bogura', 'product' => 'Soybean Meal', 'rating' => '4.8', 'review' => 'The marketplace helped us identify a suitable bulk supplier with transparent pricing.', 'photo' => frontend_image('testimonials.jamal_hossain'), 'productImage' => frontend_image('products.soybean_meal')],
        ['name' => 'Nasrin Sultana', 'business' => 'Coastal Shrimp Hatchery', 'location' => 'Satkhira', 'product' => 'Shrimp Feed Premium', 'rating' => '4.9', 'review' => 'Reliable product details and a consistent supplier have improved our purchase planning.', 'photo' => frontend_image('testimonials.nasrin_sultana'), 'productImage' => frontend_image('products.shrimp_premium')],
    ];
    $videoStories = [
        ['video_key' => 'testimonial_1', 'title' => 'How Reliable Feed Supply Changed Our Farm', 'name' => 'Abdul Karim', 'location' => 'Rajshahi', 'category' => 'Fish Feed Buyer'],
        ['video_key' => 'testimonial_2', 'title' => 'Building a Better Dairy Supply Relationship', 'name' => 'Fatema Begum', 'location' => 'Savar, Dhaka', 'category' => 'Cattle Feed Buyer'],
        ['video_key' => 'testimonial_3', 'title' => 'Sourcing Ingredients With More Confidence', 'name' => 'Jamal Hossain', 'location' => 'Bogura', 'category' => 'Feed Manufacturer'],
    ];
    $processSteps = [
        ['step' => '01', 'title' => 'Register & Verify', 'description' => 'Create your account and complete business verification when required.'],
        ['step' => '02', 'title' => 'Discover Products', 'description' => 'Search products, suppliers, manufacturers and raw materials.'],
        ['step' => '03', 'title' => 'Compare & Choose', 'description' => 'Review price, grade, quantity, seller information and product details.'],
        ['step' => '04', 'title' => 'Order Securely', 'description' => 'Place your order and keep payment and order details recorded on the platform.'],
        ['step' => '05', 'title' => 'Track & Review', 'description' => 'Track delivery, receive the product and share your review.'],
    ];
    $finalTrustLabels = ['Verified User', 'Verified Business', 'Verified Product', 'Clear Grade', 'Clear Quantity', 'Clear Price', 'Recorded Transaction'];
    $sellerBenefits = ['Reach Verified Buyers', 'Showcase Products', 'Manage Business Orders', 'Build Customer Trust'];
    $resellerBenefits = ['Access Approved Products', 'Competitive Pricing', 'Track Orders & Sales', 'Manage Customers'];
    $trustFeatures = [
        ['title' => 'Verified Users', 'description' => 'Identity and account information can be reviewed.'],
        ['title' => 'Verified Businesses', 'description' => 'Approved businesses receive a Verified Business badge.'],
        ['title' => 'Verified Products', 'description' => 'Product details, specifications and quality information are clearly presented.'],
        ['title' => 'Grade Transparency', 'description' => 'Product grade is visible before placing an order.'],
        ['title' => 'Clear Quantity & Pricing', 'description' => 'KG/Ton quantity and pricing are clearly displayed.'],
        ['title' => 'Recorded Transactions', 'description' => 'Orders, payment and delivery information can remain recorded on the platform.'],
    ];
    $updates = [
        ['tag' => 'Buying Guide', 'date' => 'May 18, 2026', 'title' => 'How to Choose the Right Fish Feed Grade', 'excerpt' => 'Key details to review when selecting feed for a healthy and productive aquaculture operation.', 'image_key' => 'update_1'],
        ['tag' => 'Raw Materials', 'date' => 'May 12, 2026', 'title' => 'Understanding Feed Raw Material Quality', 'excerpt' => 'A practical overview of origin, grade and quality information for feed ingredients.', 'image_key' => 'update_2'],
        ['tag' => 'Trade Guide', 'date' => 'May 05, 2026', 'title' => 'Guide to Buying Feed in Bulk', 'excerpt' => 'Plan quantities, compare suppliers and make informed decisions for bulk feed purchases.', 'image_key' => 'update_3'],
        ['tag' => 'Marketplace', 'date' => 'April 28, 2026', 'title' => 'Future Line Trading Marketplace Updates', 'excerpt' => 'Explore the latest improvements to discovering products and verified trade partners.', 'image_key' => 'update_4'],
    ];
@endphp

@section('content')
    @php
        $heroSlides = [
            frontend_image('hero.carousel.slide_1'),
            frontend_image('hero.carousel.slide_2'),
            frontend_image('hero.carousel.slide_3'),
        ];
        $heroSideBanner = frontend_image('hero.side_banner');
    @endphp

    {{-- ================= HERO — full-width carousel banner ================= --}}
    <section class="bg-white">
        <div data-hero-carousel class="relative w-full overflow-hidden bg-white" aria-roledescription="carousel" aria-label="Promotional banners">
            <div data-hero-track class="flex transition-transform duration-700 ease-out">
                @foreach ($heroSlides as $index => $slide)
                    <img src="{{ $slide }}" alt="Future Line Trading promotional banner {{ $index + 1 }}" loading="{{ $index === 0 ? 'eager' : 'lazy' }}" decoding="async" class="block h-auto w-full shrink-0">
                @endforeach
            </div>

            {{-- readability scrim over the image only (not outside it) --}}
            <div class="pointer-events-none absolute inset-0 bg-gradient-to-r from-slate-950/65 via-slate-950/20 to-transparent"></div>

            {{-- hero content, contained inside the banner --}}
            <div class="absolute inset-0">
                <div class="mx-auto flex h-full max-w-7xl items-center px-4 py-5 sm:px-6 lg:px-8">
                    <div class="w-full max-w-[92%] sm:max-w-[60%] lg:max-w-[44%]">
                        <div class="mb-2 inline-flex items-center gap-1.5 rounded-full border border-emerald-300/50 bg-emerald-500/20 px-2.5 py-0.5 text-[9px] font-semibold uppercase tracking-[0.12em] text-emerald-50 backdrop-blur-sm sm:text-[11px]">
                            <span class="flex h-3.5 w-3.5 items-center justify-center rounded-full bg-emerald-500 text-white">
                                <svg class="h-2.5 w-2.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="m5 12 4 4L19 6"/></svg>
                            </span>
                            {{ __('home.hero_badge') }}
                        </div>

                        <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-emerald-100 sm:text-xs">Future Line Trading</p>
                        <h1 class="mt-1.5 text-[26px] font-bold leading-[1.15] tracking-tight text-white drop-shadow-sm sm:text-4xl lg:text-[44px]">
                            {{ __('home.hero_title') }}
                        </h1>
                        <p class="mt-2 text-sm leading-5 text-slate-100/95 sm:text-base sm:leading-6">
                            {{ __('home.hero_description') }}
                        </p>
                        <p class="mt-1 text-xs font-medium text-emerald-100/90 sm:text-sm">যাচাইকৃত ব্যবসার সংযোগ, বিশ্বস্ত বাণিজ্যের ভিত্তি।</p>

                        <div class="mt-3.5 grid grid-cols-4 gap-1.5 sm:flex sm:flex-wrap sm:gap-2">
                            @foreach ($primaryActions as $action)
                                <a href="{{ route('products.index') }}" class="flex min-h-9 items-center justify-center border border-emerald-600 bg-emerald-700 px-2 py-1.5 text-[11px] font-bold tracking-wide text-white shadow-md shadow-emerald-950/30 transition-colors hover:bg-emerald-600 sm:min-w-16 sm:px-3 sm:text-xs">{{ $action }}</a>
                            @endforeach
                        </div>

                        <div class="mt-2 grid grid-cols-2 gap-1.5 sm:flex sm:gap-2">
                            <a href="{{ route('register') }}" class="inline-flex min-h-9 items-center justify-center border border-white/70 bg-white/95 px-2 py-1.5 text-[11px] font-semibold text-slate-800 shadow-sm transition-colors hover:bg-white sm:px-3 sm:text-xs">{{ __('common.become_seller') }}</a>
                            <a href="{{ route('register') }}" class="inline-flex min-h-9 items-center justify-center border border-white/40 bg-white/10 px-2 py-1.5 text-[11px] font-semibold text-white backdrop-blur-sm transition-colors hover:bg-white/20 sm:px-3 sm:text-xs">{{ __('common.become_reseller') }}</a>
                        </div>

                        <form action="{{ route('products.index') }}" method="GET" class="mt-3 flex w-full max-w-md items-center border border-white/20 bg-white p-1 shadow-md shadow-slate-950/20">
                            <label for="hero-search" class="sr-only">Search marketplace</label>
                            <div class="flex min-w-0 flex-1 items-center gap-2 px-2 py-1">
                                <svg class="h-4 w-4 shrink-0 text-emerald-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="6"/><path d="m16 16 4 4"/></svg>
                                <input id="hero-search" name="q" type="search" placeholder="{{ __('products.search_placeholder') }}" class="min-w-0 flex-1 border-0 bg-transparent p-0 text-xs text-slate-900 placeholder:text-slate-400 focus:outline-none focus:ring-0 sm:text-sm">
                            </div>
                            <button type="submit" class="inline-flex shrink-0 items-center justify-center gap-1.5 bg-emerald-700 px-3 py-1.5 text-[11px] font-semibold text-white transition-colors hover:bg-emerald-800 sm:text-xs">
                                {{ __('common.search') }}
                                <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                            </button>
                        </form>

                        <div class="mt-3 grid grid-cols-2 gap-x-3 gap-y-1 sm:grid-cols-4">
                            @foreach ($trustIndicators as $indicator)
                                <div class="flex items-center gap-1.5 text-[10px] font-semibold text-white/95 sm:text-[11px]">
                                    <span class="flex h-3.5 w-3.5 shrink-0 items-center justify-center rounded-full bg-emerald-500/25 text-emerald-100">
                                        <svg class="h-2 w-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m5 12 4 4L19 6"/></svg>
                                    </span>
                                    {{ $indicator }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <button type="button" data-hero-prev class="absolute left-2 top-1/2 z-10 flex h-9 w-9 -translate-y-1/2 items-center justify-center rounded-full border border-white/30 bg-slate-950/40 text-white backdrop-blur-sm transition-colors hover:bg-slate-950/70 sm:left-4 sm:h-10 sm:w-10" aria-label="Previous banner">
                <svg class="h-4 w-4 sm:h-5 sm:w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m15 18-6-6 6-6"/></svg>
            </button>
            <button type="button" data-hero-next class="absolute right-2 top-1/2 z-10 flex h-9 w-9 -translate-y-1/2 items-center justify-center rounded-full border border-white/30 bg-slate-950/40 text-white backdrop-blur-sm transition-colors hover:bg-slate-950/70 sm:right-4 sm:h-10 sm:w-10" aria-label="Next banner">
                <svg class="h-4 w-4 sm:h-5 sm:w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m9 18 6-6-6-6"/></svg>
            </button>

            <div class="absolute bottom-3 right-4 z-10 flex gap-1.5 sm:bottom-5 sm:right-6">
                @foreach ($heroSlides as $index => $slide)
                    <button type="button" data-hero-dot="{{ $index }}" class="h-2 w-2 rounded-full bg-white/60 transition-all duration-300" aria-label="Go to banner {{ $index + 1 }}"></button>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ================= SECONDARY PROMO BANNER (below hero) ================= --}}
    <section class="hero-secondary-banner bg-white py-10 sm:py-12 lg:py-14">
        <div class="mx-auto w-full max-w-[1040px] px-4 sm:px-6 lg:px-8">
            <div class="relative mx-auto w-full overflow-hidden rounded-2xl">
                <img src="{{ $heroSideBanner }}" alt="Future Line Trading promotional highlight" loading="lazy" decoding="async" class="block h-auto w-full">
                <div class="pointer-events-none absolute inset-0 bg-gradient-to-r from-slate-950/75 via-slate-950/30 to-transparent"></div>

                <div class="absolute inset-0">
                    <div class="flex h-full flex-col justify-between p-5 sm:p-7 lg:p-9">
                        <span class="inline-flex w-fit items-center gap-2 rounded-full border border-white/40 bg-slate-950/45 px-2.5 py-1 backdrop-blur-sm">
                            <span class="flex h-4 w-4 items-center justify-center rounded-full bg-emerald-600 text-white">
                                <svg class="h-2.5 w-2.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="m5 12 4 4L19 6"/></svg>
                            </span>
                            <span class="leading-tight">
                                <span class="block text-[11px] font-bold text-white sm:text-xs">Verified Partner</span>
                                <span class="block text-[9px] font-medium text-emerald-100/80 sm:text-[10px]">Quality checked</span>
                            </span>
                        </span>

                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-[0.16em] text-emerald-200 sm:text-[11px]">Trade without uncertainty</p>
                            <p class="mt-1 max-w-md text-base font-bold leading-snug text-white sm:text-xl lg:text-2xl">A reliable path from source to market.</p>
                            <div class="mt-2.5 grid max-w-xs grid-cols-2 divide-x divide-white/20 border-t border-white/20 pt-2 text-center">
                                <div class="pr-3"><p class="text-sm font-bold text-white sm:text-base">500+</p><p class="text-[9px] font-semibold uppercase tracking-wide text-emerald-100/80 sm:text-[10px]">Trade Partners</p></div>
                                <div class="pl-3"><p class="text-sm font-bold text-emerald-300 sm:text-base">64</p><p class="text-[9px] font-semibold uppercase tracking-wide text-emerald-100/80 sm:text-[10px]">Categories</p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-16 sm:py-20 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <x-section-heading :eyebrow="__('common.categories')">{{ __('home.explore_categories') }}</x-section-heading>
                <p class="mt-4 text-base leading-7 text-slate-600">Discover trusted feed, ingredients and raw materials from verified businesses.</p>
            </div>

            <div class="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-3 lg:gap-6">
                @foreach ($categories as $category)
                    <x-category-card :category="$category" />
                @endforeach
            </div>

            <div class="mt-10 text-center">
                <a href="{{ route('categories.index') }}" class="inline-flex items-center gap-2 border border-emerald-700 px-5 py-3 text-sm font-bold text-emerald-800 transition-colors hover:bg-emerald-700 hover:text-white">
                    {{ __('common.view_all') }} {{ __('common.categories') }}
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                </a>
            </div>
        </div>
    </section>

    <section id="featured-products" class="border-y border-slate-200 bg-slate-50 py-16 sm:py-20 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                <div class="max-w-2xl">
                    <x-section-heading :eyebrow="__('common.verified_product')">{{ __('home.featured_products') }}</x-section-heading>
                    <p class="mt-4 text-base leading-7 text-slate-600">Explore selected products from verified suppliers and manufacturers.</p>
                </div>
                <a href="{{ route('products.index') }}" class="hidden items-center gap-2 text-sm font-bold text-emerald-700 hover:text-emerald-800 sm:inline-flex">Browse marketplace <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a>
            </div>

            <div class="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-4 lg:gap-6">
                @foreach ($featuredProducts as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>

            <div class="mt-10 text-center">
                <a href="{{ route('products.index') }}" class="inline-flex items-center gap-2 border border-emerald-700 bg-emerald-700 px-5 py-3 text-sm font-bold text-white shadow-sm transition-colors hover:bg-emerald-800">
                    {{ __('common.view_all') }} {{ __('common.products') }}
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                </a>
            </div>
        </div>
    </section>

    <section class="bg-white py-16 sm:py-20 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <x-section-heading :eyebrow="__('common.verified_seller')">{{ __('home.verified_sellers') }}</x-section-heading>
                <p class="mt-4 text-base leading-7 text-slate-600">Connect with trusted suppliers and manufacturers verified by Future Line Trading.</p>
            </div>
            <div class="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-3 lg:gap-6">
                @foreach ($sellers as $seller)
                    <x-seller-card :seller="$seller" />
                @endforeach
            </div>
            <div class="mt-10 text-center">
                <a href="{{ route('sellers.index') }}" class="inline-flex items-center gap-2 border border-emerald-700 px-5 py-3 text-sm font-bold text-emerald-800 transition-colors hover:bg-emerald-700 hover:text-white">View All Verified Sellers <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a>
            </div>
        </div>
    </section>

    <section class="border-y border-slate-200 bg-slate-50 py-16 sm:py-20 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <x-section-heading :eyebrow="__('common.verified_business')">{{ __('home.verified_companies') }}</x-section-heading>
                <p class="mt-4 text-base leading-7 text-slate-600">Discover established businesses, brands and manufacturers building trusted trade relationships.</p>
            </div>
            <div class="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-3 lg:gap-6">
                @foreach ($companies as $company)
                    <x-company-card :company="$company" />
                @endforeach
            </div>
            <div class="mt-10 text-center">
                <a href="{{ route('companies.index') }}" class="inline-flex items-center gap-2 border border-emerald-700 bg-emerald-700 px-5 py-3 text-sm font-bold text-white shadow-sm transition-colors hover:bg-emerald-800">View All Companies <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a>
            </div>
        </div>
    </section>

    <section class="bg-white py-10 sm:py-12">
        <div class="mx-auto max-w-7xl border border-emerald-100 bg-emerald-50/60 px-5 py-6 sm:px-7 sm:py-8 lg:px-8">
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4 lg:gap-8">
                @foreach ($trustItems as $item)
                    <x-trust-item :title="$item['title']" :description="$item['description']" />
                @endforeach
            </div>
        </div>
    </section>

    <section id="importers-exporters" class="border-t border-slate-200 bg-slate-50 py-16 sm:py-20 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <x-section-heading :eyebrow="__('common.importer') . ' & ' . __('common.exporter')">{{ __('home.importers_exporters') }}</x-section-heading>
                <p class="mt-4 text-base leading-7 text-slate-600">Discover verified businesses for sourcing and international trade.</p>
            </div>
            <div class="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-3 lg:gap-6">
                @foreach ($tradePartners as $partner)
                    <x-importer-exporter-card :partner="$partner" />
                @endforeach
            </div>
            <div class="mt-10 text-center"><a href="{{ route('companies.index') }}" class="inline-flex items-center gap-2 border border-emerald-700 px-5 py-3 text-sm font-bold text-emerald-800 transition-colors hover:bg-emerald-700 hover:text-white">View All Importers &amp; Exporters <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a></div>
        </div>
    </section>

    <section id="raw-materials" class="bg-white py-16 sm:py-20 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                <div class="max-w-2xl"><x-section-heading :eyebrow="__('categories.raw_materials')">{{ __('home.raw_materials_marketplace') }}</x-section-heading><p class="mt-4 text-base leading-7 text-slate-600">{{ __('home.hero_description') }}</p></div>
                <a href="{{ route('products.index') }}" class="hidden text-sm font-bold text-emerald-700 hover:text-emerald-800 sm:inline-flex">Browse all materials</a>
            </div>
            <div class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-4 lg:gap-5">
                @foreach ($rawMaterials as $material)
                    <x-raw-material-card :material="$material" />
                @endforeach
            </div>
        </div>
    </section>

    <x-cta-banner title="Need Feed Ingredients in Bulk?" description="Connect with verified suppliers and source the right quantity, grade and quality for your business." :primary-href="route('companies.index')" :secondary-href="route('contact')" />

    <section id="success-stories" class="bg-white py-16 sm:py-20 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center"><x-section-heading :eyebrow="__('common.verified_business')">{{ __('home.success_stories') }}</x-section-heading><p class="mt-4 text-base leading-7 text-slate-600">{{ __('home.hero_description') }}</p></div>
            <div class="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-3 lg:gap-6">
                @foreach ($testimonials as $testimonial)
                    <x-testimonial-card :testimonial="$testimonial" />
                @endforeach
            </div>
            <div class="mt-10 text-center"><a href="{{ route('about') }}" class="inline-flex items-center gap-2 border border-emerald-700 px-5 py-3 text-sm font-bold text-emerald-800 transition-colors hover:bg-emerald-700 hover:text-white">Read All Reviews <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a></div>
        </div>
    </section>

    <section class="border-y border-slate-200 bg-slate-50 py-16 sm:py-20 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between"><div class="max-w-2xl"><x-section-heading :eyebrow="__('common.verified_business')">{{ __('home.video_testimonials') }}</x-section-heading><p class="mt-4 text-base leading-7 text-slate-600">{{ __('home.hero_description') }}</p></div><a href="{{ route('about') }}" class="hidden text-sm font-bold text-emerald-700 hover:text-emerald-800 sm:inline-flex">{{ __('common.view_all') }}</a></div>
            <div class="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-3 lg:gap-6">
                @foreach ($videoStories as $story)
                    <x-video-testimonial-card :story="$story" />
                @endforeach
            </div>
            <div class="mt-8 text-center sm:hidden"><a href="{{ route('about') }}" class="text-sm font-bold text-emerald-700">View All Stories</a></div>
        </div>
    </section>

    <section id="how-it-works" class="bg-white py-16 sm:py-20 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center"><x-section-heading :eyebrow="__('common.verified_business')">{{ __('home.how_it_works') }}</x-section-heading><p class="mt-4 text-base leading-7 text-slate-600">{{ __('home.hero_description') }}</p></div>
            <div class="relative mt-12"><div class="absolute left-[10%] right-[10%] top-6 hidden h-px bg-emerald-200 lg:block"></div><div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-5 lg:gap-2">@foreach ($processSteps as $processStep)<x-process-step :step="$processStep['step']" :title="$processStep['title']" :description="$processStep['description']" />@endforeach</div></div>
            <div class="mt-12 flex flex-col justify-center gap-3 sm:flex-row"><a href="{{ route('products.index') }}" class="inline-flex items-center justify-center bg-emerald-700 px-5 py-3 text-sm font-bold text-white shadow-sm transition-colors hover:bg-emerald-800">Start Buying</a><a href="{{ route('register') }}" class="inline-flex items-center justify-center border border-slate-300 px-5 py-3 text-sm font-bold text-slate-700 transition-colors hover:border-emerald-600 hover:text-emerald-700">Become a Seller</a></div>
            <div class="mt-10 flex flex-wrap justify-center gap-2 border-t border-slate-100 pt-8">@foreach ($finalTrustLabels as $label)<span class="border border-emerald-100 bg-emerald-50 px-2.5 py-1 text-xs font-semibold text-emerald-800">{{ $label }}</span>@endforeach</div>
        </div>
    </section>

    <x-seller-cta :benefits="$sellerBenefits" />

    <x-reseller-cta :benefits="$resellerBenefits" />

    <section class="bg-white py-16 sm:py-20 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8"><div class="mx-auto max-w-2xl text-center"><x-section-heading eyebrow="Marketplace Confidence">Trust Is Built Into Every Step</x-section-heading><p class="mt-4 text-base leading-7 text-slate-600">Future Line Trading is designed around verified businesses, transparent product information and recorded marketplace transactions.</p></div>
            <div class="mt-10 grid items-center gap-5 lg:grid-cols-[1fr_280px_1fr] lg:gap-8"><div class="grid gap-4">@foreach (array_slice($trustFeatures, 0, 3) as $feature)<x-trust-feature :feature="$feature" />@endforeach</div><div class="mx-auto flex aspect-square w-full max-w-[230px] flex-col items-center justify-center border-8 border-emerald-50 bg-emerald-700 p-6 text-center shadow-lg shadow-emerald-950/10"><span class="flex h-14 w-14 items-center justify-center rounded-full border border-emerald-300 bg-white text-emerald-700"><svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m5 12 4 4L19 6"/><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10Z"/></svg></span><p class="mt-4 text-xs font-bold tracking-[0.15em] text-emerald-100">VERIFIED BUSINESS</p><p class="mt-2 text-lg font-bold leading-6 text-white">TRUSTED MARKETPLACE</p></div><div class="grid gap-4">@foreach (array_slice($trustFeatures, 3) as $feature)<x-trust-feature :feature="$feature" />@endforeach</div></div>
        </div>
    </section>

    <section class="border-y border-slate-200 bg-slate-50 py-16 sm:py-20 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8"><div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between"><div class="max-w-2xl"><x-section-heading eyebrow="Insights & Marketplace News">Latest Updates</x-section-heading><p class="mt-4 text-base leading-7 text-slate-600">News, marketplace updates and useful information from Future Line Trading.</p></div><a href="{{ route('about') }}" class="hidden text-sm font-bold text-emerald-700 hover:text-emerald-800 sm:inline-flex">View all updates</a></div><div class="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-4 lg:gap-6">@foreach ($updates as $update)<x-update-card :update="$update" />@endforeach</div></div>
    </section>

    <section class="bg-emerald-950"><div class="mx-auto flex max-w-7xl flex-col gap-7 px-4 py-12 sm:px-6 lg:flex-row lg:items-center lg:justify-between lg:px-8"><div class="max-w-2xl"><h2 class="text-2xl font-bold tracking-tight text-white sm:text-3xl">{{ __('home.final_cta') }}</h2><p class="mt-3 leading-7 text-emerald-50/80">{{ __('home.final_cta_description') }}</p></div><div class="flex flex-col gap-3 sm:flex-row"><a href="{{ route('products.index') }}" class="inline-flex items-center justify-center bg-white px-5 py-3 text-sm font-bold text-emerald-900 transition-colors hover:bg-emerald-50">{{ __('common.explore_products') }}</a><a href="{{ route('register') }}" class="inline-flex items-center justify-center border border-emerald-300 px-5 py-3 text-sm font-bold text-white transition-colors hover:bg-emerald-900">{{ __('common.become_seller') }}</a></div></div></section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var root = document.querySelector('[data-hero-carousel]');
            if (!root) return;

            var track = root.querySelector('[data-hero-track]');
            if (!track) return;

            var total = track.children.length;
            if (total < 2) return;

            var prevBtn = root.querySelector('[data-hero-prev]');
            var nextBtn = root.querySelector('[data-hero-next]');
            var dots = Array.prototype.slice.call(root.querySelectorAll('[data-hero-dot]'));
            var index = 0;
            var timer = null;
            var DELAY = 2000;

            function render() {
                track.style.transform = 'translateX(-' + (index * 100) + '%)';
                dots.forEach(function (dot, i) {
                    var active = i === index;
                    dot.classList.toggle('bg-emerald-500', active);
                    dot.classList.toggle('w-5', active);
                    dot.classList.toggle('bg-white/60', !active);
                    dot.classList.toggle('w-2', !active);
                });
            }

            function go(next) {
                index = (next + total) % total;
                render();
            }

            function start() {
                stop();
                timer = window.setInterval(function () { go(index + 1); }, DELAY);
            }

            function stop() {
                if (timer) {
                    window.clearInterval(timer);
                    timer = null;
                }
            }

            if (prevBtn) prevBtn.addEventListener('click', function () { go(index - 1); start(); });
            if (nextBtn) nextBtn.addEventListener('click', function () { go(index + 1); start(); });
            dots.forEach(function (dot, i) {
                dot.addEventListener('click', function () { go(i); start(); });
            });

            root.addEventListener('mouseenter', stop);
            root.addEventListener('mouseleave', start);

            render();
            start();
        });
    </script>
@endpush
