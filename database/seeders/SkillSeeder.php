<?php
# @Date:   2021-01-23T16:13:01+00:00
# @Last modified time: 2021-04-08T11:35:37+01:00




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
      $skill->name = 'UX';
      $skill->description = 'this is a skill';
      $skill->save();

      $skill = new Skill();
      $skill->name = 'Food Innovation';
      $skill->description = 'this is a skill 2';
      $skill->save();

      $skill = new Skill();
      $skill->name = 'Project Management';
      $skill->description = 'this is a skill 3';
      $skill->save();

      $skill = new Skill();
      $skill->name = 'Accounting';
      $skill->description = 'this is a skill 3';
      $skill->save();

      $skill = new Skill();
      $skill->name = 'Web Design';
      $skill->description = 'this is a skill 3';
      $skill->save();

      $skill = new Skill();
      $skill->name = 'Publicc Relations';
      $skill->description = 'this is a skill 3';
      $skill->save();

    }
}
