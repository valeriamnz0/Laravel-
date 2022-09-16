<?php

use Illuminate\Database\Seeder;

use App\User; //Llamamos la clase usuario
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str; //Con estas dos últimas, agregamos la seguridad para el password

class PrimerUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User([
            'name' => 'Admin',
            'email' => 'Admin@spt.com',
            'provincia' => 'San José',
            'canton' => 'Central',
            'distrito' => 'Uruca',
            'identificacion' => '101010000',
            'telefono' => '11112222',
            'otraSenia' => 'Este es el usuario Admin por defecto',
            'password' => Hash::make('test1234'),
            'fk_rolID' => 1,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            ]);
    
            $admin->save();

            $admin = new User([
                'name' => 'Cliente',
                'email' => 'Cliente@spt.com',
                'provincia' => 'San José',
                'canton' => 'Central',
                'distrito' => 'Merced',
                'identificacion' => '101018888',
                'telefono' => '11113333',
                'otraSenia' => 'Este es el usuario Cliente por defecto',
                'password' => Hash::make('test1234'),
                'fk_rolID' => 4,
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                ]);
        
                $admin->save();
    }
}
