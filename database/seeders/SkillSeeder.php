<?php
# @Date:   2021-01-23T16:13:01+00:00
# @Last modified time: 2021-03-12T17:09:29+00:00




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
      $skill->name = 'Willingness to learn';
      $skill->description = 'this is a skill';
      $skill->save();

      $skill = new Skill();
      $skill->name = 'Self-management';
      $skill->description = 'this is a skill 2';
      $skill->save();

      $skill = new Skill();
      $skill->name = 'Teamwork';
      $skill->description = 'this is a skill 3';
      $skill->save();

      $skill = new Skill();
      $skill->name = 'Resilience';
      $skill->description = 'this is a skill 3';
      $skill->save();

      $skill = new Skill();
      $skill->name = 'Leadership';
      $skill->description = 'this is a skill 3';
      $skill->save();

      $skill = new Skill();
      $skill->name = 'Organisation';
      $skill->description = 'this is a skill 3';
      $skill->save();

    }
}
