<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Floor;
use Carbon\Carbon;
use App\Models\Room;
use App\Models\User;
use App\Models\RoomType;
use App\Models\Facility;
use App\Models\Admin;
use App\Models\Contract;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Facility::create([
            'name'=> 'Kasur',
        ]);
        Facility::create([
            'name'=> 'Meja',
        ]);
        Facility::create([
            'name'=> 'Laci',
        ]);
        Facility::create([
            'name'=> 'Wifi',
        ]);
        Facility::create([
            'name'=> 'Toilet Jongkok',
        ]);
        Facility::create([
            'name'=> 'Lemari',
        ]);
        Facility::create([
            'name'=> 'Toilet Duduk',
        ]);
        Facility::create([
            'name'=> 'Rak',
        ]);
        Facility::create([
            'name'=> 'AC',
        ]);
        Facility::create([
            'name'=> 'Water Heather',
        ]);
        Facility::create([
            'name'=> 'Rak Buku',
        ]);
        
        $roomtype = RoomType::create([
            'name'=>'Rose',
            'price'=>'600000',
        ]);
        $roomtype->facilities()->attach([1,2,3,4,5]);

        $roomtype = RoomType::create([
            'name'=>'Jasmine',
            'price'=>'750000',
        ]);
        $roomtype->facilities()->attach([1,2,4,6,7]);

        $roomtype = RoomType::create([
            'name'=>'Orchid',
            'price'=>'900000',
        ]);
        $roomtype->facilities()->attach([1,2,4,8,9,7,6]);

        $roomtype = RoomType::create([
            'name'=>'Raflesia',
            'price'=>'1200000',
        ]);
        $roomtype->facilities()->attach([1,2,4,7,8,9,10,11]);

        for ($x = 0; $x < 20; $x++) {
            $roomtype = RoomType::inRandomOrder()->first();
            $room = new Room();
            $room->floor = rand(1,3);
            $ascii = 65-1+$room->floor;
            $room->name = chr($ascii)." ".$x;
            $room->roomtype_id = $roomtype->id;
            $room->desc = "Tidak ada Keterangan Tambahan";
            $room->save();
        }
        
        $rooms = Room::inRandomOrder()->limit(10)->get();
        $users = User::factory()->count(10)->create();
        $users[0]->name = 'Muhammad Udin';
        $users[0]->username = 'udinmarkudin';
        for ($x = 0; $x < 10; $x++) {
            $rooms[$x]->user()->associate($users[$x]);
            $users[$x]->room()->associate($rooms[$x]);
            $rooms[$x]->save();
            $users[$x]->save();
            $contract = new Contract();
            $contract->user()->associate($users[$x]);
            $contract->room()->associate($rooms[$x]);
            $contract->name = $contract->user->name;
            $contract->username = $contract->user->username;
            $contract->phone = $contract->user->phone;
            if($x!=0){
                $contract->accepted = TRUE;
                $contract->months=rand(1,3);
                $contract->payment=$contract->months*$contract->room->roomtype->price;
                $contract->until = Carbon::create(2023,5,01)->addMonth($contract->months);
                $rooms[$x]->until = $contract->until;
                $rooms[$x]->save();
                $contract->save();
            }
        }
        $user = $users[0];
        $room = $rooms[0];
        for($i=3;$i>=0;$i--){
            $contract = new Contract;
            $contract->user()->associate($user);
            $contract->room()->associate($room);
            $contract->name = $user->name;
            $contract->username = $user->username;
            $contract->phone = $user->username;
            $contract->accepted = TRUE;
            $contract->months=1;
            $contract->payment=$contract->months*$room->roomtype->price;
            $contract->until = Carbon::create(2023,5,01)->subMonth($i);
            $room->until = $contract->until;
            $room->save();
            $contract->save();
        }
        

        $admin = new Admin();
        $admin->name = 'Pak Dengklek';
        $admin->username = 'mrdengklek';
        $admin->password = bcrypt('12345');
        $admin->save();



        // $floors = Floor::factory()->count(3)->create();
        // $roomTypes = RoomType::factory()->count(4)->create();
        // foreach (RoomType::all() as $type){
        //     $facilities = Facility::inRandomOrder()->limit(3)->get();
        //     $type->facilities()->attach($facilities);
        // }
    }
}
