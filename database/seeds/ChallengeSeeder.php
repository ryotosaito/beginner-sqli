<?php

use Illuminate\Database\Seeder;

class ChallengeSeeder extends Seeder
{
    /**
     * @param integer $number
     * @param string $title
     * @param string $description
     * @param string $flag
     */
    private static function seed_tutorial($number, $title, $description, $flag)
    {
        DB::table('challenges')->insert([
            'category' => 'tutorial',
            'number' => $number,
            'title' => $title,
            'description' => $description,
            'url' => env('CHALLENGE_URL')."/tutorial{$number}/",
            'flag' => "m1z0r3{{$flag}}",
        ]);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        static::seed_tutorial(
            1,
            'A very beginning',
            'Read the database.',
            'not_only_sqli_but_base64');
        static::seed_tutorial(
            2,
            'm1z0r3 m1z0r3 m1z0r3',
            'Read the database again.',
            'h3r3isth3r341f14g');
        static::seed_tutorial(
            3,
            'Where is my partner?',
            'Make two tables into one view.',
            'J4p4n3s3_wariin');
        static::seed_tutorial(
            4,
            'Chaotic string',
            'Someone broke the flag in pieces...',
            'very_super_hyper_ultra_extremely_insanely_long_flag');
        static::seed_tutorial(
            5,
            'Injection Introduction',
            'I\'m not about to buy fruits!',
            'd0nt_f0rget_enctypt1ng_passw0rd');
    }
}
