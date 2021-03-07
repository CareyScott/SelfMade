<?php
# @Date:   2021-01-23T16:13:01+00:00
# @Last modified time: 2021-03-07T14:50:18+00:00




namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


      $skill = new Skill();
      $skill->name = 'Skill';
      $skill->description = 'this is a skill';
      $skill->save();

      $skill = new Skill();
      $skill->name = 'Skill 2';
      $skill->description = 'this is a skill 2';
      $skill->save();

      $skill = new Skill();
      $skill->name = 'Skill 3';
      $skill->description = 'this is a skill 3';
      $skill->save();

    }
}
