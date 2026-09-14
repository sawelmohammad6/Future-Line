@extends('layouts.app')

@section('title', 'Future Line Trading')
@section('meta_description', 'Future Line Trading connects verified buyers, sellers, suppliers, manufacturers, importers and exporters.')

@php
    $primaryActions = ['BUY', 'SELL', 'IMPORT', 'EXPORT'];
    $trustIndicators = ['Verified Businesses', 'Trusted Marketplace', 'Quality Transparency', 'Secure Transactions'];
    $categories = [
        ['name' => 'Fish Feed', 'description' => 'Balanced nutrition for commercial aquaculture operations.', 'subcategories' => 'Pangas, Tilapia, Shrimp, Shing, Magur, Pabda', 'count' => '128', 'image' => 'https://images.unsplash.com/photo-1535591273668-578e31182c4f?auto=format&fit=crop&w=800&q=85'],
        ['name' => 'Cattle Feed', 'description' => 'Performance-focused feed for healthy, productive livestock.', 'subcategories' => 'Dairy, Beef Cattle, Calf', 'count' => '86', 'image' => 'https://images.unsplash.com/photo-1516467508483-a7212febe31a?auto=format&fit=crop&w=800&q=85'],
        ['name' => 'Poultry Feed', 'description' => 'Reliable feed solutions for every stage of poultry growth.', 'subcategories' => 'Broiler, Layer, Chick', 'count' => '94', 'image' => 'https://images.unsplash.com/photo-1548550023-2bdb3c5beed7?auto=format&fit=crop&w=800&q=85'],
        ['name' => 'Duck Feed', 'description' => 'Specialized nutrition to support healthy duck farming.', 'subcategories' => 'Starter, Grower, Layer', 'count' => '32', 'image' => 'https://images.unsplash.com/photo-1518199266791-5375a83190b7?auto=format&fit=crop&w=800&q=85'],
        ['name' => 'Animal Feed', 'description' => 'Quality feed for small ruminants and other farm animals.', 'subcategories' => 'Goat, Sheep, Other Animal Feed', 'count' => '57', 'image' => 'https://images.unsplash.com/photo-1484557985045-edf25e08da73?auto=format&fit=crop&w=800&q=85'],
        ['name' => 'Feed Raw Materials', 'description' => 'Essential ingredients sourced for dependable feed production.', 'subcategories' => 'Fish Meal, Soybean Meal, Maize, Rice Polish, Wheat Bran', 'count' => '143', 'image' => 'https://images.unsplash.com/photo-1551754655-cd27e38d2076?auto=format&fit=crop&w=800&q=85'],
    ];
    $featuredProducts = [
        ['slug' => 'premium-pangas-fish-feed', 'name' => 'Premium Pangas Fish Feed', 'grade' => 'Grade 1', 'seller' => 'Aqua Nutrition Ltd.', 'price' => '৳55 / KG', 'moq' => '500 KG', 'rating' => '4.8', 'image' => 'https://images.unsplash.com/photo-1535591273668-578e31182c4f?auto=format&fit=crop&w=800&q=85'],
        ['slug' => 'tilapia-floating-feed', 'name' => 'Tilapia Floating Feed', 'grade' => 'Grade A', 'seller' => 'Bluewater Feeds', 'price' => '৳52 / KG', 'moq' => '500 KG', 'rating' => '4.7', 'image' => 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?auto=format&fit=crop&w=800&q=85'],
        ['slug' => 'shrimp-feed-premium', 'name' => 'Shrimp Feed Premium', 'grade' => 'Export Grade', 'seller' => 'Coastal Feed Mills', 'price' => '৳78 / KG', 'moq' => '300 KG', 'rating' => '4.9', 'image' => 'https://images.unsplash.com/photo-1544550285-f813152fb2fd?auto=format&fit=crop&w=800&q=85'],
        ['slug' => 'dairy-cattle-feed', 'name' => 'Dairy Cattle Feed', 'grade' => 'High Energy', 'seller' => 'Green Field Agro', 'price' => '৳42 / KG', 'moq' => '1,000 KG', 'rating' => '4.8', 'image' => 'https://images.unsplash.com/photo-1516467508483-a7212febe31a?auto=format&fit=crop&w=800&q=85'],
        ['slug' => 'broiler-starter-feed', 'name' => 'Broiler Starter Feed', 'grade' => 'Starter Formula', 'seller' => 'Prime Poultry Feed', 'price' => '৳61 / KG', 'moq' => '500 KG', 'rating' => '4.6', 'image' => 'https://images.unsplash.com/photo-1548550023-2bdb3c5beed7?auto=format&fit=crop&w=800&q=85'],
        ['slug' => 'layer-feed', 'name' => 'Layer Feed', 'grade' => 'Premium Layer', 'seller' => 'Golden Grain Ltd.', 'price' => '৳49 / KG', 'moq' => '500 KG', 'rating' => '4.7', 'image' => 'https://images.unsplash.com/photo-1500595046743-cd271d694d30?auto=format&fit=crop&w=800&q=85'],
        ['slug' => 'soybean-meal', 'name' => 'Soybean Meal', 'grade' => 'Protein 46%', 'seller' => 'Delta Commodities', 'price' => '৳68 / KG', 'moq' => '1,000 KG', 'rating' => '4.9', 'image' => 'https://images.unsplash.com/photo-1592924357228-91a4daadcfea?auto=format&fit=crop&w=800&q=85'],
        ['slug' => 'fish-meal', 'name' => 'Fish Meal', 'grade' => 'Protein 60%', 'seller' => 'Marine Source BD', 'price' => '৳112 / KG', 'moq' => '500 KG', 'rating' => '4.8', 'image' => 'https://images.unsplash.com/photo-1535591273668-578e31182c4f?auto=format&fit=crop&w=800&q=85'],
    ];
    $sellers = [
        ['slug' => 'green-feed-industries', 'logo' => 'GF', 'name' => 'Green Feed Industries', 'type' => 'Manufacturer', 'location' => 'Dhaka, Bangladesh', 'products' => 'Fish Feed | Cattle Feed', 'rating' => '4.9', 'count' => '120+', 'description' => 'Reliable nutrition solutions for commercial fish and livestock farms.'],
        ['slug' => 'bengal-aqua-nutrition', 'logo' => 'BA', 'name' => 'Bengal Aqua Nutrition', 'type' => 'Fish Feed Supplier', 'location' => 'Khulna, Bangladesh', 'products' => 'Pangas Feed | Shrimp Feed', 'rating' => '4.8', 'count' => '86+', 'description' => 'Specialist supplier of balanced aquaculture feed and farm inputs.'],
        ['slug' => 'delta-animal-feed', 'logo' => 'DA', 'name' => 'Delta Animal Feed', 'type' => 'Manufacturer', 'location' => 'Gazipur, Bangladesh', 'products' => 'Dairy Feed | Goat Feed', 'rating' => '4.7', 'count' => '74+', 'description' => 'Performance-focused feed products for healthy and productive animals.'],
        ['slug' => 'royal-poultry-nutrition', 'logo' => 'RP', 'name' => 'Royal Poultry Nutrition', 'type' => 'Poultry Feed Supplier', 'location' => 'Chattogram, Bangladesh', 'products' => 'Broiler Feed | Layer Feed', 'rating' => '4.9', 'count' => '98+', 'description' => 'Trusted poultry nutrition for farms at every production stage.'],
        ['slug' => 'agro-source-bangladesh', 'logo' => 'AS', 'name' => 'Agro Source Bangladesh', 'type' => 'Raw Material Supplier', 'location' => 'Narayanganj, Bangladesh', 'products' => 'Soybean Meal | Maize', 'rating' => '4.6', 'count' => '65+', 'description' => 'Sourcing quality feed ingredients for manufacturers across Bangladesh.'],
        ['slug' => 'fresh-feed-ingredients', 'logo' => 'FF', 'name' => 'Fresh Feed & Ingredients', 'type' => 'Wholesale Supplier', 'location' => 'Rajshahi, Bangladesh', 'products' => 'Fish Meal | Rice Polish', 'rating' => '4.8', 'count' => '91+', 'description' => 'Consistent feed ingredients with transparent supply information.'],
    ];
    $companies = [
        ['slug' => 'bengal-agro-foods', 'logo' => 'BAF', 'name' => 'Bengal Agro Foods', 'industry' => 'Feed Manufacturer', 'location' => 'Gazipur, Bangladesh', 'years' => '15+ Years', 'count' => '85', 'description' => 'Specialized manufacturer and supplier of quality animal feed and feed ingredients.'],
        ['slug' => 'national-feed-mills', 'logo' => 'NFM', 'name' => 'National Feed Mills', 'industry' => 'Integrated Feed Producer', 'location' => 'Dhaka, Bangladesh', 'years' => '18+ Years', 'count' => '112', 'description' => 'Established producer serving commercial poultry, dairy and aqua businesses.'],
        ['slug' => 'delta-nutrition-ltd', 'logo' => 'DNL', 'name' => 'Delta Nutrition Ltd.', 'industry' => 'Animal Nutrition Company', 'location' => 'Narayanganj, Bangladesh', 'years' => '12+ Years', 'count' => '76', 'description' => 'Research-led nutrition products designed for consistent farm outcomes.'],
        ['slug' => 'aqua-harvest-bangladesh', 'logo' => 'AHB', 'name' => 'Aqua Harvest Bangladesh', 'industry' => 'Aquaculture Supplier', 'location' => 'Khulna, Bangladesh', 'years' => '10+ Years', 'count' => '64', 'description' => 'Supporting aquaculture producers with quality feed and farm solutions.'],
        ['slug' => 'prime-agro-industries', 'logo' => 'PAI', 'name' => 'Prime Agro Industries', 'industry' => 'Agro Manufacturer', 'location' => 'Bogura, Bangladesh', 'years' => '14+ Years', 'count' => '93', 'description' => 'A dependable manufacturing partner for livestock and poultry operations.'],
        ['slug' => 'eastern-feed-ingredients', 'logo' => 'EFI', 'name' => 'Eastern Feed & Ingredients', 'industry' => 'Ingredient Importer', 'location' => 'Chattogram, Bangladesh', 'years' => '11+ Years', 'count' => '58', 'description' => 'Importing and distributing carefully selected feed raw materials.'],
    ];
    $trustItems = [
        ['title' => 'Verified Businesses', 'description' => 'Business identities are reviewed before approval.'],
        ['title' => 'Verified Products', 'description' => 'Product information and quality details are clearly presented.'],
        ['title' => 'Clear Pricing & Quantity', 'description' => 'Transparent KG/Ton pricing and quantity information.'],
        ['title' => 'Secure Transaction Records', 'description' => 'Orders and transaction details stay recorded on the platform.'],
    ];
    $tradePartners = [
        ['slug' => 'bangladesh-feed-import', 'logo' => 'BFI', 'name' => 'Bangladesh Feed Import Ltd.', 'type' => 'Importer', 'country' => 'Bangladesh | Origin: Brazil & India', 'products' => 'Soybean Meal | Maize | Fish Meal', 'quantity' => '2,500+ Ton', 'description' => 'Bulk sourcing partner for quality feed ingredients and commodities.'],
        ['slug' => 'global-agro-trading', 'logo' => 'GAT', 'name' => 'Global Agro Trading', 'type' => 'Importer', 'country' => 'Singapore | Origin: Argentina', 'products' => 'DDGS | CGM | Premix', 'quantity' => '1,800+ Ton', 'description' => 'International commodity trader connecting verified feed suppliers.'],
        ['slug' => 'bengal-commodity-export', 'logo' => 'BCE', 'name' => 'Bengal Commodity Export', 'type' => 'Exporter', 'country' => 'Bangladesh | Markets: Asia', 'products' => 'Rice Bran | Rice Polish', 'quantity' => '3,200+ Ton', 'description' => 'Exporting dependable agricultural by-products to regional buyers.'],
        ['slug' => 'eastern-feed-imports', 'logo' => 'EFI', 'name' => 'Eastern Feed Imports', 'type' => 'Importer', 'country' => 'Bangladesh | Origin: Peru', 'products' => 'Fish Meal | Fish Oil', 'quantity' => '950+ Ton', 'description' => 'Specialized importer of marine ingredients for feed production.'],
        ['slug' => 'agrolink-international', 'logo' => 'ALI', 'name' => 'AgroLink International', 'type' => 'Exporter', 'country' => 'Thailand | Markets: South Asia', 'products' => 'Maize | Wheat Bran', 'quantity' => '2,100+ Ton', 'description' => 'Regional agro trader focused on efficient bulk supply programs.'],
        ['slug' => 'tradebridge-bangladesh', 'logo' => 'TBB', 'name' => 'TradeBridge Bangladesh', 'type' => 'Importer & Exporter', 'country' => 'Bangladesh | Global Network', 'products' => 'Soybean Meal | Limestone', 'quantity' => '1,500+ Ton', 'description' => 'A cross-border trade partner for ingredient buyers and suppliers.'],
    ];
    $rawMaterials = [
        ['slug' => 'fish-meal', 'name' => 'Fish Meal', 'description' => 'High-protein marine feed ingredient.', 'origin' => 'Peru', 'price' => '৳78 / KG', 'moq' => '1,000 KG', 'image' => 'https://images.unsplash.com/photo-1535591273668-578e31182c4f?auto=format&fit=crop&w=800&q=85'],
        ['slug' => 'soybean-meal', 'name' => 'Soybean Meal', 'description' => 'Protein-rich plant-based feed ingredient.', 'origin' => 'Brazil', 'price' => '৳68 / KG', 'moq' => '1,000 KG', 'image' => 'https://images.unsplash.com/photo-1592924357228-91a4daadcfea?auto=format&fit=crop&w=800&q=85'],
        ['slug' => 'maize', 'name' => 'Maize', 'description' => 'Energy-dense grain for balanced feed formulas.', 'origin' => 'India', 'price' => '৳38 / KG', 'moq' => '2 Ton', 'image' => 'https://images.unsplash.com/photo-1601593768799-76d0b95c7bca?auto=format&fit=crop&w=800&q=85'],
        ['slug' => 'rice-polish', 'name' => 'Rice Polish', 'description' => 'Nutritious milling by-product for animal diets.', 'origin' => 'Bangladesh', 'price' => '৳31 / KG', 'moq' => '2 Ton', 'image' => 'https://images.unsplash.com/photo-1536304993881-ff6e9eefa2a6?auto=format&fit=crop&w=800&q=85'],
        ['slug' => 'rice-bran', 'name' => 'Rice Bran', 'description' => 'Natural source of energy and fiber.', 'origin' => 'Bangladesh', 'price' => '৳29 / KG', 'moq' => '2 Ton', 'image' => 'https://images.unsplash.com/photo-1536304993881-ff6e9eefa2a6?auto=format&fit=crop&w=800&q=85'],
        ['slug' => 'wheat-bran', 'name' => 'Wheat Bran', 'description' => 'Fiber-rich cereal ingredient for feed blends.', 'origin' => 'India', 'price' => '৳34 / KG', 'moq' => '2 Ton', 'image' => 'https://images.unsplash.com/photo-1516594915697-87eb3b1c14ea?auto=format&fit=crop&w=800&q=85'],
        ['slug' => 'ddgs', 'name' => 'DDGS', 'description' => 'Distillers grain with valuable protein content.', 'origin' => 'USA', 'price' => '৳52 / KG', 'moq' => '1 Ton', 'image' => 'https://images.unsplash.com/photo-1490474418585-ba9bad8fd0ea?auto=format&fit=crop&w=800&q=85'],
        ['slug' => 'dorb', 'name' => 'DORB', 'description' => 'De-oiled rice bran for efficient feed mixes.', 'origin' => 'Bangladesh', 'price' => '৳27 / KG', 'moq' => '2 Ton', 'image' => 'https://images.unsplash.com/photo-1536304993881-ff6e9eefa2a6?auto=format&fit=crop&w=800&q=85'],
        ['slug' => 'cgm', 'name' => 'CGM', 'description' => 'Corn gluten meal with concentrated protein.', 'origin' => 'Argentina', 'price' => '৳74 / KG', 'moq' => '1 Ton', 'image' => 'https://images.unsplash.com/photo-1601593768799-76d0b95c7bca?auto=format&fit=crop&w=800&q=85'],
        ['slug' => 'fish-oil', 'name' => 'Fish Oil', 'description' => 'Marine oil source for nutrition and energy.', 'origin' => 'Peru', 'price' => '৳145 / KG', 'moq' => '500 KG', 'image' => 'https://images.unsplash.com/photo-1498673394965-85cb14905c89?auto=format&fit=crop&w=800&q=85'],
        ['slug' => 'premix', 'name' => 'Premix', 'description' => 'Essential vitamin and mineral feed blend.', 'origin' => 'Netherlands', 'price' => '৳220 / KG', 'moq' => '100 KG', 'image' => 'https://images.unsplash.com/photo-1509440159596-0249088772ff?auto=format&fit=crop&w=800&q=85'],
        ['slug' => 'limestone', 'name' => 'Limestone', 'description' => 'Calcium source for livestock and poultry feed.', 'origin' => 'Bangladesh', 'price' => '৳12 / KG', 'moq' => '5 Ton', 'image' => 'https://images.unsplash.com/photo-1518022525094-218670c9b745?auto=format&fit=crop&w=800&q=85'],
    ];
    $testimonials = [
        ['name' => 'Rahim Uddin', 'business' => 'Green Valley Fish Farm', 'location' => 'Mymensingh', 'product' => 'Premium Pangas Fish Feed', 'rating' => '4.9', 'review' => 'Since switching to this feed, our farm has seen more consistent results and reliable supply.', 'photo' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=160&q=85', 'productImage' => 'https://images.unsplash.com/photo-1535591273668-578e31182c4f?auto=format&fit=crop&w=160&q=85'],
        ['name' => 'Fatema Begum', 'business' => 'Savar Dairy Farm', 'location' => 'Savar, Dhaka', 'product' => 'Dairy Cattle Feed', 'rating' => '4.8', 'review' => 'The supplier information was clear, and the feed quality has been dependable for our dairy herd.', 'photo' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=160&q=85', 'productImage' => 'https://images.unsplash.com/photo-1516467508483-a7212febe31a?auto=format&fit=crop&w=160&q=85'],
        ['name' => 'Abdul Karim', 'business' => 'Karim Aqua Enterprise', 'location' => 'Rajshahi', 'product' => 'Tilapia Floating Feed', 'rating' => '4.9', 'review' => 'Finding verified sellers in one place has made our regular feed sourcing much easier.', 'photo' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?auto=format&fit=crop&w=160&q=85', 'productImage' => 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?auto=format&fit=crop&w=160&q=85'],
        ['name' => 'Sultana Akter', 'business' => 'Meghna Poultry Farm', 'location' => 'Cumilla', 'product' => 'Broiler Starter Feed', 'rating' => '4.7', 'review' => 'We can compare product grades and quantities before deciding, which gives us confidence.', 'photo' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=160&q=85', 'productImage' => 'https://images.unsplash.com/photo-1548550023-2bdb3c5beed7?auto=format&fit=crop&w=160&q=85'],
        ['name' => 'Jamal Hossain', 'business' => 'Barind Livestock', 'location' => 'Bogura', 'product' => 'Soybean Meal', 'rating' => '4.8', 'review' => 'The marketplace helped us identify a suitable bulk supplier with transparent pricing.', 'photo' => 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&w=160&q=85', 'productImage' => 'https://images.unsplash.com/photo-1592924357228-91a4daadcfea?auto=format&fit=crop&w=160&q=85'],
        ['name' => 'Nasrin Sultana', 'business' => 'Coastal Shrimp Hatchery', 'location' => 'Satkhira', 'product' => 'Shrimp Feed Premium', 'rating' => '4.9', 'review' => 'Reliable product details and a consistent supplier have improved our purchase planning.', 'photo' => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=160&q=85', 'productImage' => 'https://images.unsplash.com/photo-1544550285-f813152fb2fd?auto=format&fit=crop&w=160&q=85'],
    ];
    $videoStories = [
        ['title' => 'How Reliable Feed Supply Changed Our Farm', 'name' => 'Abdul Karim', 'location' => 'Rajshahi', 'category' => 'Fish Feed Buyer', 'image' => 'https://images.unsplash.com/photo-1464226184884-fa280b87c399?auto=format&fit=crop&w=900&q=85'],
        ['title' => 'Building a Better Dairy Supply Relationship', 'name' => 'Fatema Begum', 'location' => 'Savar, Dhaka', 'category' => 'Cattle Feed Buyer', 'image' => 'https://images.unsplash.com/photo-1516467508483-a7212febe31a?auto=format&fit=crop&w=900&q=85'],
        ['title' => 'Sourcing Ingredients With More Confidence', 'name' => 'Jamal Hossain', 'location' => 'Bogura', 'category' => 'Feed Manufacturer', 'image' => 'https://images.unsplash.com/photo-1516594915697-87eb3b1c14ea?auto=format&fit=crop&w=900&q=85'],
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
        ['tag' => 'Buying Guide', 'date' => 'May 18, 2026', 'title' => 'How to Choose the Right Fish Feed Grade', 'excerpt' => 'Key details to review when selecting feed for a healthy and productive aquaculture operation.', 'image' => 'https://images.unsplash.com/photo-1535591273668-578e31182c4f?auto=format&fit=crop&w=900&q=85'],
        ['tag' => 'Raw Materials', 'date' => 'May 12, 2026', 'title' => 'Understanding Feed Raw Material Quality', 'excerpt' => 'A practical overview of origin, grade and quality information for feed ingredients.', 'image' => 'https://images.unsplash.com/photo-1516594915697-87eb3b1c14ea?auto=format&fit=crop&w=900&q=85'],
        ['tag' => 'Trade Guide', 'date' => 'May 05, 2026', 'title' => 'Guide to Buying Feed in Bulk', 'excerpt' => 'Plan quantities, compare suppliers and make informed decisions for bulk feed purchases.', 'image' => 'https://images.unsplash.com/photo-1464226184884-fa280b87c399?auto=format&fit=crop&w=900&q=85'],
        ['tag' => 'Marketplace', 'date' => 'April 28, 2026', 'title' => 'Future Line Trading Marketplace Updates', 'excerpt' => 'Explore the latest improvements to discovering products and verified trade partners.', 'image' => 'https://images.unsplash.com/photo-1516467508483-a7212febe31a?auto=format&fit=crop&w=900&q=85'],
    ];
@endphp

@section('content')
    <section class="relative overflow-hidden bg-slate-50">
        <div class="absolute inset-x-0 top-0 -z-0 h-80 bg-gradient-to-b from-emerald-50/80 to-transparent"></div>

        <div class="relative z-10 mx-auto max-w-7xl px-4 pb-14 pt-12 sm:px-6 sm:pb-20 sm:pt-16 lg:px-8 lg:pb-24 lg:pt-20">
            <div class="grid items-center gap-12 lg:grid-cols-[1.05fr_0.95fr] lg:gap-14">
                <div>
                    <div class="mb-5 inline-flex items-center gap-2 border border-emerald-200 bg-white px-3 py-1.5 text-xs font-semibold uppercase tracking-[0.16em] text-emerald-800 shadow-sm">
                        <span class="flex h-4 w-4 items-center justify-center rounded-full bg-emerald-700 text-white">
                            <svg class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="m5 12 4 4L19 6"/></svg>
                        </span>
                        Verified B2B Network
                    </div>

                    <p class="text-sm font-bold uppercase tracking-[0.2em] text-emerald-700">Future Line Trading</p>
                    <h1 class="mt-4 max-w-3xl text-4xl font-bold leading-[1.08] tracking-tight text-slate-950 sm:text-5xl lg:text-[3.65rem]">
                        Connecting Verified Businesses,<br class="hidden sm:block"> Building Trusted Trade.
                    </h1>
                    <p class="mt-5 max-w-2xl text-base leading-7 text-slate-600 sm:text-lg">
                        Future Line Trading connects verified buyers, sellers, farmers, suppliers, manufacturers, importers and exporters in one reliable marketplace built for meaningful business growth.
                    </p>
                    <p class="mt-3 text-sm font-medium text-slate-500">যাচাইকৃত ব্যবসার সংযোগ, বিশ্বস্ত বাণিজ্যের ভিত্তি।</p>

                    <div class="mt-8 grid grid-cols-2 gap-3 sm:flex sm:flex-wrap">
                        @foreach ($primaryActions as $action)
                            <a href="{{ route('products.index') }}" class="flex min-h-11 items-center justify-center border border-emerald-700 bg-emerald-700 px-5 py-3 text-sm font-bold tracking-wide text-white shadow-sm transition-colors hover:bg-emerald-800 sm:min-w-24">{{ $action }}</a>
                        @endforeach
                    </div>

                    <div class="mt-4 flex flex-col gap-3 sm:flex-row">
                        <a href="{{ route('register') }}" class="inline-flex min-h-11 items-center justify-center border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-700 shadow-sm transition-colors hover:border-emerald-600 hover:text-emerald-700">Become a Seller</a>
                        <a href="{{ route('register') }}" class="inline-flex min-h-11 items-center justify-center border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-700 shadow-sm transition-colors hover:border-emerald-600 hover:text-emerald-700">Become a Reseller</a>
                    </div>

                    <form action="{{ route('products.index') }}" method="GET" class="mt-9 max-w-2xl border border-slate-200 bg-white p-2 shadow-lg shadow-slate-900/5 sm:flex sm:items-center">
                        <label for="hero-search" class="sr-only">Search marketplace</label>
                        <div class="flex min-w-0 flex-1 items-center gap-3 px-3 py-2">
                            <svg class="h-5 w-5 shrink-0 text-emerald-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="6"/><path d="m16 16 4 4"/></svg>
                            <input id="hero-search" name="q" type="search" placeholder="Search products, brands, sellers or manufacturers..." class="min-w-0 flex-1 border-0 bg-transparent p-0 text-sm text-slate-900 placeholder:text-slate-400 focus:outline-none focus:ring-0">
                        </div>
                        <button type="submit" class="mt-1 inline-flex w-full items-center justify-center gap-2 bg-slate-900 px-5 py-3 text-sm font-semibold text-white transition-colors hover:bg-emerald-800 sm:mt-0 sm:w-auto">
                            Search
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                        </button>
                    </form>

                    <div class="mt-5 grid grid-cols-2 gap-x-4 gap-y-3 sm:grid-cols-4">
                        @foreach ($trustIndicators as $indicator)
                            <div class="flex items-center gap-2 text-xs font-semibold text-slate-600">
                                <span class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-emerald-100 text-emerald-700">
                                    <svg class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m5 12 4 4L19 6"/></svg>
                                </span>
                                {{ $indicator }}
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="relative mx-auto w-full max-w-xl lg:mx-0 lg:max-w-none">
                    <div class="absolute -right-5 -top-5 hidden h-32 w-32 border border-emerald-200 bg-emerald-100/70 lg:block"></div>
                    <div class="relative overflow-hidden border border-slate-200 bg-white p-2 shadow-xl shadow-emerald-950/10">
                        <div class="relative overflow-hidden bg-emerald-950">
                            <img src="https://images.unsplash.com/photo-1464226184884-fa280b87c399?auto=format&fit=crop&w=1200&q=85" alt="Agricultural field representing the Future Line Trading marketplace" class="h-[330px] w-full object-cover sm:h-[420px] lg:h-[530px]">
                            <div class="absolute inset-0 bg-gradient-to-t from-emerald-950/75 via-emerald-950/10 to-transparent"></div>
                            <div class="absolute inset-x-0 bottom-0 p-5 sm:p-6">
                                <p class="text-xs font-bold uppercase tracking-[0.18em] text-emerald-200">Trade without uncertainty</p>
                                <p class="mt-2 max-w-sm text-xl font-semibold leading-snug text-white sm:text-2xl">A reliable path from source to market.</p>
                            </div>
                        </div>

                        <div class="absolute left-5 top-5 border border-white/70 bg-white/95 px-3 py-2 shadow-lg sm:left-6 sm:top-6">
                            <div class="flex items-center gap-2">
                                <span class="flex h-7 w-7 items-center justify-center rounded-full bg-emerald-700 text-white">
                                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="m5 12 4 4L19 6"/></svg>
                                </span>
                                <div><p class="text-xs font-bold text-slate-900">Verified Partner</p><p class="text-[11px] text-slate-500">Quality checked</p></div>
                            </div>
                        </div>

                        <div class="absolute bottom-7 right-5 border border-slate-100 bg-white p-3 shadow-lg sm:bottom-8 sm:right-6 sm:p-4">
                            <div class="grid grid-cols-2 divide-x divide-slate-200 text-center">
                                <div class="pr-3"><p class="text-lg font-bold text-slate-950">500+</p><p class="text-[10px] font-semibold uppercase tracking-wide text-slate-500">Trade Partners</p></div>
                                <div class="pl-3"><p class="text-lg font-bold text-emerald-700">64</p><p class="text-[10px] font-semibold uppercase tracking-wide text-slate-500">Categories</p></div>
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
                <x-section-heading eyebrow="Trade Categories">Explore Our Categories</x-section-heading>
                <p class="mt-4 text-base leading-7 text-slate-600">Discover trusted feed, ingredients and raw materials from verified businesses.</p>
            </div>

            <div class="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-3 lg:gap-6">
                @foreach ($categories as $category)
                    <x-category-card :category="$category" />
                @endforeach
            </div>

            <div class="mt-10 text-center">
                <a href="{{ route('categories.index') }}" class="inline-flex items-center gap-2 border border-emerald-700 px-5 py-3 text-sm font-bold text-emerald-800 transition-colors hover:bg-emerald-700 hover:text-white">
                    View All Categories
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                </a>
            </div>
        </div>
    </section>

    <section id="featured-products" class="border-y border-slate-200 bg-slate-50 py-16 sm:py-20 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
                <div class="max-w-2xl">
                    <x-section-heading eyebrow="Verified Supply">Featured Products</x-section-heading>
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
                    View All Products
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
                </a>
            </div>
        </div>
    </section>

    <section class="bg-white py-16 sm:py-20 lg:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <x-section-heading eyebrow="Trusted Network">Verified Sellers</x-section-heading>
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
                <x-section-heading eyebrow="Established Partners">Verified Companies</x-section-heading>
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
                <x-section-heading eyebrow="International Trade">Importers &amp; Exporters</x-section-heading>
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
                <div class="max-w-2xl"><x-section-heading eyebrow="Bulk Ingredient Supply">Feed Raw Materials Marketplace</x-section-heading><p class="mt-4 text-base leading-7 text-slate-600">Source quality raw materials from verified suppliers, manufacturers and importers.</p></div>
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
            <div class="mx-auto max-w-2xl text-center"><x-section-heading eyebrow="Trusted By Trade Partners">Farmer Success Stories</x-section-heading><p class="mt-4 text-base leading-7 text-slate-600">Real experiences from farmers and businesses using products sourced through Future Line Trading.</p></div>
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
            <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between"><div class="max-w-2xl"><x-section-heading eyebrow="Stories From The Field">Video Testimonials</x-section-heading><p class="mt-4 text-base leading-7 text-slate-600">See how verified farmers and businesses are building better supply relationships.</p></div><a href="{{ route('about') }}" class="hidden text-sm font-bold text-emerald-700 hover:text-emerald-800 sm:inline-flex">View All Stories</a></div>
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
            <div class="mx-auto max-w-2xl text-center"><x-section-heading eyebrow="Simple, Clear, Verified">How Future Line Trading Works</x-section-heading><p class="mt-4 text-base leading-7 text-slate-600">A simple and transparent way to discover trusted businesses and complete verified trade.</p></div>
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

    <section class="bg-emerald-950"><div class="mx-auto flex max-w-7xl flex-col gap-7 px-4 py-12 sm:px-6 lg:flex-row lg:items-center lg:justify-between lg:px-8"><div class="max-w-2xl"><h2 class="text-2xl font-bold tracking-tight text-white sm:text-3xl">Ready to Trade With Confidence?</h2><p class="mt-3 leading-7 text-emerald-50/80">Discover verified businesses, quality products and trusted marketplace connections.</p></div><div class="flex flex-col gap-3 sm:flex-row"><a href="{{ route('products.index') }}" class="inline-flex items-center justify-center bg-white px-5 py-3 text-sm font-bold text-emerald-900 transition-colors hover:bg-emerald-50">Explore Products</a><a href="{{ route('register') }}" class="inline-flex items-center justify-center border border-emerald-300 px-5 py-3 text-sm font-bold text-white transition-colors hover:bg-emerald-900">Become a Seller</a></div></div></section>
@endsection
