<?php
namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    public function definition(): array
    {
        $images = [
            'properties/3rnPW5C2RrrtiYSAn9QJiitjktbaxTF9T4epcaPg.jpg',
            'properties/4nTYym0MwpxjVVepONqGaK4fgUFhsWkGhgJj6zRC.jpg',
            'properties/9eHlMpran1reB0v4169lxInCNMnu6UE56pbxS4Ri.jpg',
            'properties/BCxcxhvmagZFLmS9YWEp4Fdr9aqNvfiIKKr1mZhI.jpg',
            'properties/bkO41jJWkN2kN682sAqmiYdLHpPuvx2Zb6OFY5UW.jpg',
            'properties/coTyIZkFlAdm42OBzNn1zPLQo9t9oAXQe7Z24nYk.jpg',
            'properties/d9z1Tb5VMCeL3ipJn8Jv4yX1i3u6p0HDdKjlJOw6.jpg',
            'properties/flUguwKr6mFHmnZj6hLo62svgXSoi24f4p6s7ISn.jpg',
            'properties/gaHrO46qds4Qlhnb40IrZsGXWRdeLzLhveEPggXG.jpg',
            'properties/gqZm3yXn97YIhPTdiSAQrMwPowIff2mt7rCAk58F.jpg',
            'properties/HH5LvqHMFQKbXWfRaq1nAos2r70NY53DBI4b8F06.jpg',
            'properties/j9Tm4KUP5sVEUl7QP6D00oc8z11uf7mEeNpu5uDH.jpg',
            'properties/MmCtllCurXbuJc2MNt4vdGcrcG8pG47OIOhxbb02.jpg',
            'properties/NeSIM4OVCd923ysYVxswrqC5ZKOOPmZR4dD3Phvs.jpg',
            'properties/qA7w0qAbzzVYuXURIL4Z1SIgZj9Vq78yfthBOoeZ.jpg',
            'properties/r4NlT2VZsn8v0pgf4mauZrOdVQ2GzU75hYXQLgvZ.jpg',
            'properties/uvgHqsARhYFGnwBqrTKTLAhzfF4xFEdfnWP40wnr.jpg',
            'properties/ysE5KUtZI57I2HRUAXrzyy07Elg2nz1r5fiXnPht.jpg',
        ];

        return [
            'title'       => $this->faker->sentence(5),
            'description' => $this->faker->paragraph(),
            'price'       => $this->faker->randomFloat(2, 50000, 500000),
            'location'    => $this->faker->address(),
            'type'        => $this->faker->randomElement(['venta', 'alquiler']),
            'user_id'     => User::exists() ? User::inRandomOrder()->first()->id : User::factory()->create()->id,
            'image'       => $images[array_rand($images)],
        ];
    }
}
