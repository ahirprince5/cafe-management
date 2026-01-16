<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Category;
use App\Models\MenuItem;
use App\Models\CafeTable;
use App\Models\Rating;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@cafearoma.com',
            'password' => Hash::make('password123'),
            'is_admin' => true,
        ]);

        User::create([
            'name' => 'Test User',
            'email' => 'user@cafearoma.com',
            'password' => Hash::make('password123'),
            'is_admin' => false,
        ]);

        $beverages = Category::create(['name' => 'Beverages', 'description' => 'Hot and cold drinks']);
        $snacks = Category::create(['name' => 'Snacks', 'description' => 'Light bites']);
        $mainCourse = Category::create(['name' => 'Main Course', 'description' => 'Hearty meals']);
        $desserts = Category::create(['name' => 'Desserts', 'description' => 'Sweet treats']);

        MenuItem::create([
            'name' => 'Cappuccino',
            'description' => 'Rich espresso topped with creamy steamed milk foam.',
            'price' => 150,
            'category_id' => $beverages->id,
            'is_featured' => true,
            'image' => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93?w=400'
        ]);

        MenuItem::create([
            'name' => 'Iced Mocha',
            'description' => 'Chilled espresso blended with chocolate syrup.',
            'price' => 180,
            'category_id' => $beverages->id,
            'is_featured' => true,
            'image' => 'https://images.unsplash.com/photo-1461023058943-07fcbe16d735?w=400'
        ]);

        MenuItem::create([
            'name' => 'Classic Latte',
            'description' => 'Smooth espresso with silky steamed milk.',
            'price' => 140,
            'category_id' => $beverages->id,
            'image' => 'https://images.unsplash.com/photo-1541167760496-1628856ab772?w=400'
        ]);

        MenuItem::create([
            'name' => 'Fresh Fruit Smoothie',
            'description' => 'Blend of seasonal fruits with yogurt.',
            'price' => 160,
            'category_id' => $beverages->id,
            'image' => 'https://images.unsplash.com/photo-1546793665-c74683f339c1?w=400'
        ]);

        MenuItem::create([
            'name' => 'Hot Chocolate',
            'description' => 'Rich chocolate topped with marshmallows.',
            'price' => 130,
            'category_id' => $beverages->id,
            'image' => 'https://images.unsplash.com/photo-1517578239113-b03992dcdd25?w=400'
        ]);

        MenuItem::create([
            'name' => 'Croissant',
            'description' => 'Fresh baked buttery French croissant.',
            'price' => 90,
            'category_id' => $snacks->id,
            'image' => 'https://images.unsplash.com/photo-1544787219-7f47ccb76574?w=400'
        ]);

        MenuItem::create([
            'name' => 'Club Sandwich',
            'description' => 'Triple decker with chicken, bacon, lettuce.',
            'price' => 220,
            'category_id' => $snacks->id,
            'is_featured' => true,
            'image' => 'https://images.unsplash.com/photo-1481070555726-e2fe8357571d?w=400'
        ]);

        MenuItem::create([
            'name' => 'Veg Panini',
            'description' => 'Grilled panini with vegetables and cheese.',
            'price' => 180,
            'category_id' => $snacks->id,
            'image' => 'https://images.unsplash.com/photo-1528736235302-52922df5c122?w=400'
        ]);

        MenuItem::create([
            'name' => 'French Fries',
            'description' => 'Crispy golden fries with dipping sauce.',
            'price' => 120,
            'category_id' => $snacks->id,
            'image' => 'https://images.unsplash.com/photo-1573080496219-bb080dd4f877?w=400'
        ]);

        MenuItem::create([
            'name' => 'Margherita Pizza',
            'description' => 'Classic pizza with mozzarella and tomatoes.',
            'price' => 350,
            'category_id' => $mainCourse->id,
            'is_featured' => true,
            'image' => 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?w=400'
        ]);

        MenuItem::create([
            'name' => 'Pasta Alfredo',
            'description' => 'Creamy fettuccine in parmesan sauce.',
            'price' => 280,
            'category_id' => $mainCourse->id,
            'image' => 'https://images.unsplash.com/photo-1555949258-eb67b1ef0ceb?w=400'
        ]);

        MenuItem::create([
            'name' => 'Grilled Chicken Salad',
            'description' => 'Fresh greens with grilled chicken.',
            'price' => 250,
            'category_id' => $mainCourse->id,
            'image' => 'https://images.unsplash.com/photo-1546793665-c74683f339c1?w=400'
        ]);

        MenuItem::create([
            'name' => 'Chocolate Cake',
            'description' => 'Three-layer cake with ganache frosting.',
            'price' => 180,
            'category_id' => $desserts->id,
            'is_featured' => true,
            'image' => 'https://images.unsplash.com/photo-1551024601-bec78aea704b?w=400'
        ]);

        MenuItem::create([
            'name' => 'Blueberry Cheesecake',
            'description' => 'NY style cheesecake with blueberry.',
            'price' => 220,
            'category_id' => $desserts->id,
            'image' => 'https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=400'
        ]);

        MenuItem::create([
            'name' => 'Tiramisu',
            'description' => 'Italian dessert with coffee and mascarpone.',
            'price' => 200,
            'category_id' => $desserts->id,
            'image' => 'https://images.unsplash.com/photo-1571877227200-a0d98ea607e9?w=400'
        ]);

        MenuItem::create([
            'name' => 'Ice Cream Sundae',
            'description' => 'Ice cream with chocolate and nuts.',
            'price' => 150,
            'category_id' => $desserts->id,
            'image' => 'https://images.unsplash.com/photo-1563805042-7684c019e1cb?w=400'
        ]);

        CafeTable::create(['table_number' => 1, 'capacity' => 2, 'location' => 'Window Side']);
        CafeTable::create(['table_number' => 2, 'capacity' => 2, 'location' => 'Window Side']);
        CafeTable::create(['table_number' => 3, 'capacity' => 4, 'location' => 'Center']);
        CafeTable::create(['table_number' => 4, 'capacity' => 4, 'location' => 'Center']);
        CafeTable::create(['table_number' => 5, 'capacity' => 4, 'location' => 'Corner']);
        CafeTable::create(['table_number' => 6, 'capacity' => 6, 'location' => 'Private Area']);
        CafeTable::create(['table_number' => 7, 'capacity' => 8, 'location' => 'Group Section']);
        CafeTable::create(['table_number' => 8, 'capacity' => 10, 'location' => 'Party Room']);

        Rating::create([
            'user_id' => 1,
            'rating' => 5,
            'review' => 'Amazing coffee and wonderful ambiance!',
            'customer_name' => 'Priya Sharma'
        ]);

        Rating::create([
            'user_id' => 1,
            'rating' => 4,
            'review' => 'Great place to work. Cappuccino is top-notch.',
            'customer_name' => 'Rahul Patel'
        ]);

        Rating::create([
            'user_id' => 2,
            'rating' => 5,
            'review' => 'Best cheesecake in town!',
            'customer_name' => 'Anita Desai'
        ]);

        Rating::create([
            'user_id' => 2,
            'rating' => 5,
            'review' => 'Cozy atmosphere and excellent service.',
            'customer_name' => 'Vikram Singh'
        ]);

        Rating::create([
            'user_id' => 1,
            'rating' => 4,
            'review' => 'Love the variety in their menu!',
            'customer_name' => 'Meera Joshi'
        ]);
    }
}
