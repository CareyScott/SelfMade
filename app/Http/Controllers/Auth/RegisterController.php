<?php
# @Date:   2021-01-23T06:08:20+00:00
# @Last modified time: 2021-03-12T22:54:05+00:00




namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Skill;
use App\Models\JobSkill;
use App\Models\Employer;
use App\Models\Role;
use App\Models\JobSeeker;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
{
    $skills=Skill::all();
    $jobSkill=JobSkill::all();
    return view('auth.register', compact('skills'));
}

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {



        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:10', 'unique:users'],
            'password' => ['required', 'string', 'min:0', 'confirmed'],
            // 'skills' => ['required', 'string', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     * @return \App\Models\Skill
     */
    protected function create(array $data)

    {

      $skill = Skill::all();


      $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            // 'skills' => $skills,

            // 'password' => Hash::make($data['password']),
        ]);

        //FOR LOGGING IN AS JOB sEEKER


        $user->roles()->attach(Role::where('name','jobSeeker')->first());


        $jobSeeker =  JobSeeker::create([
              'personal_postal_address' => $data['personal_postal_address'],
              'personal_bio' => $data['personal_bio'],
              'education' => $data['education'],
              'user_id' => $user->id,
              'skill' => $data['skill'],
          ]);



          //i work
          $skill_jobSeeker = Skill::findOrFail($data['skill'] );
          foreach ((array) $data['skill'] as $skill)
          {
          $jobSkill =  JobSkill::create([
                'skill_id' => $skill,
                'jobSeeker_id' => $jobSeeker->id,
            ]);
          }

          // foreach ( $data['skill'] as $skill)
          // {
          // $jobSkill =  JobSkill::create([
          //       'skill_id' => $skill,
          //       'jobSeeker_id' => $jobSeeker->id,
          //   ]);
          // }


                    // foreach((array)$data['skill'] as $skill)
                    // {
                    //   $jobSkill = JobSkill::findOrFail($skill);
                    //   $jobSeeker->skills()->attach($jobSkill);
                    // }



//FOR LOGGING IN AS employer
          //
          // $user->roles()->attach(Role::where('name','employer')->first());
          //
          //
          // $employer =  Employer::create([
          //       'company_postal_address' => $data['company_postal_address'],
          //       'category' => $data['category'],
          //       'user_id' => $user->id,
          //
          //   ]);


          // foreach($data['skill'] => $skill)
          // {
          //   $jobSkill = Skill::findOrFail($skill);
          //   $jobSeeker->skills()->attach($jobSkill);
          // }








          // $jobSeeker->skills()->attach($jobSkill);

          //   $jobSeeker->skills()->attach(Role::where('id',$data[""])->first());
          //
          // $skill_jobSeeker = Skill::where('name', $jobSeeker->skill)->first();
          //
          //     $jobSkill =  JobSkill::create([
          //     $jobSkill->skill_id => $data[$jobSeeker->skill],
          //     $jobSkill->jobSeeker_id => $data[$jobSeeker->id],
          //
          //

              // 'skills' => $skills,

              // 'password' => Hash::make($data['password']),
          // ]);

          // $jobSkill->skills()->attach($skill_jobSeeker);






      // foreach ($employer->jobs => $job) {
      //   $job->name
      // }

      // $jobSeeker = new JobSeeker();
      // $jobSeeker->personal_postal_address = $request->input('personal_postal_address');
      // $jobSeeker->personal_bio = $request->input('personal_bio');
      // $jobSeeker->education = $request->input('education');
      // $jobSeeker->skill = $request->input('skill');
      // $jobSeeker->user_id = $user->id;
      // $jobSeeker->save();


      // $skill_jobSeeker = Skill::where('name', $jobSeeker->skill)->first();
      //
      // $jobSkill = new JobSkill();
      // $jobSkill->skill_id = $jobSeeker->skill;
      // $jobSkill->jobSeeker_id =  $jobSeeker->id;
      // $jobSkill->save();
      // $jobSkill->skills()->attach($skill_jobSeeker);

        return $user;
  //
  //       $skills = Skill::all();
  // 'skills' => $skills,
    }
}
