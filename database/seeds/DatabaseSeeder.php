<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\CatModel as Cat;
use App\Models\LikeModel as Like;
use App\Models\ReplyModel as Reply;
use App\Models\QuestionModel as Question;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Cat::class, 5) -> create();
        factory(User::class, 10) -> create();
        factory(Question::class, 10) -> create(); 
        factory(Reply::class, 50)->create()->each(function($reply){
           return $reply->getLike()->save(factory(Like::class)->make());
        });
    }
}
