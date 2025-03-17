<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title'       => $this->faker->sentence(5),
            'description' => $this->faker->paragraph(),
            'price'       => $this->faker->randomFloat(2, 50000, 500000),
            'location'    => $this->faker->address(),
            'type'        => $this->faker->randomElement(['venta', 'alquiler']),
            'user_id'     => User::exists() ? User::inRandomOrder()->first()->id : User::factory()->create()->id,
            'image'       => $this->storeRandomBuildingImage(),
        ];
    }

    private function storeRandomBuildingImage(): string
    {
        $images = [
            '3rnPW5C2RrrtiYSAn9QJiitjktbaxTF9T4epcaPg.jpg',
            '4nTYym0MwpxjVVepONqGaK4fgUFhsWkGhgJj6zRC.jpg',
            '9eHlMpran1reB0v4169lxInCNMnu6UE56pbxS4Ri.jpg',
            'BCxcxhvmagZFLmS9YWEp4Fdr9aqNvfiIKKr1mZhI.jpg',
            'bkO41jJWkN2kN682sAqmiYdLHpPuvx2Zb6OFY5UW.jpg',
            'coTyIZkFlAdm42OBzNn1zPLQo9t9oAXQe7Z24nYk.jpg',
            'd9z1Tb5VMCeL3ipJn8Jv4yX1i3u6p0HDdKjlJOw6.jpg',
            'flUguwKr6mFHmnZj6hLo62svgXSoi24f4p6s7ISn.jpg',
            'gaHrO46qds4Qlhnb40IrZsGXWRdeLzLhveEPggXG.jpg',
            'gqZm3yXn97YIhPTdiSAQrMwPowIff2mt7rCAk58F.jpg',
            'HH5LvqHMFQKbXWfRaq1nAos2r70NY53DBI4b8F06.jpg',
            'j9Tm4KUP5sVEUl7QP6D00oc8z11uf7mEeNpu5uDH.jpg',
            'NeSIM4OVCd923ysYVxswrqC5ZKOOPmZR4dD3Phvs.jpg',
            'qA7w0qAbzzVYuXURIL4Z1SIgZj9Vq78yfthBOoeZ.jpg',
            'r4NlT2VZsn8v0pgf4mauZrOdVQ2GzU75hYXQLgvZ.jpg',
            'uvgHqsARhYFGnwBqrTKTLAhzfF4xFEdfnWP40wnr.jpg',
            'ysE5KUtZI57I2HRUAXrzyy07Elg2nz1r5fiXnPht.jpg',
        ];

        $randomImage = $images[array_rand($images)];
        $destinationPath = 'properties/' . $randomImage;

        if (!Storage::disk('public')->exists($destinationPath)) {
            $sourcePath = public_path('storage/properties/' . $randomImage);

            if (File::exists($sourcePath)) {
                Storage::disk('public')->put($destinationPath, File::get($sourcePath));
            }
        }

        return $destinationPath;
    }
}
