<?php

use App\Enums\RoleEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = RoleEnum::getValues();
        $existingRoles = Role::all()->pluck('name');
        $newRoles = collect($roles)->diff($existingRoles);

        foreach ($newRoles as $role) {
            $this->command->getOutput()->writeln("<info>New role: </info>".$role);
            Role::create(['name' => $role]);
        }
    }
}
