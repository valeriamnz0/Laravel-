<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(TipoArticuloSeeder::class);
        $this->call(ArticuloSeeder::class);
        $this->call(RolSeeder::class);
        $this->call(PrimerUsuarioSeeder::class);
        $this->call(AgendaVisitaSeeder::class);
        $this->call(TipoProyectoSeeder::class);
        $this->call(RubrosCotizacionSeeder::class);
    }
}
