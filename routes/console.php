<?php

use App\Models\Consultants;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('make:consultants', function(){
    $first = ['John', 'Doe', 'Amelia', 'Vanessa'];
    $last = ['Doe', 'John', 'Richard', 'Smith'];
    for($x = 0; $x < 10; $x++){

        Consultants::create([
            'UID' => generateUniqueMongoId('consultants'),
            'name' => $first[array_rand($first)] . " " . $last[array_rand($last)],
            'email' => 'test@email.com',
            'password' => password_hash(generateUniqueMongoId('consultants'), PASSWORD_DEFAULT),
            'image' => 'https://www.citypng.com/public/uploads/small/11640168385jtmh7kpmvna5ddyynoxsjy5leb1nmpvqooaavkrjmt9zs7vtvuqi4lcwofkzsaejalxn7ggpim4hkg0wbwtzsrp1ldijzbdbsj5z.png',
            'status' => 0
        ]);
    }
    
});