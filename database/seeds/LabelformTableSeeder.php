<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class LabelformTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('labelsforms')->truncate();
        $statement = "INSERT INTO ".env('DB_PREFIX')."`labelsforms` (`labelcode`, `labeleng`, `labelara`) VALUES
       ('add',\"Add\",\"\"),
('address',\"Detailed Current Address\",\"\"),
('areyouavailable',\"Are you available?\",\"\"),
('areyougraduated',\"Are you graduated?\",\"\"),
('availableat',\"Available at?\",\"\"),
('basicinfo',\"Let's start with the basic information\",\"\"),
('biodata',\"Biodata\",\"\"),
('both',\"Both\",\"\"),
('caza',\"Caza\",\"\"),
('city',\"City\",\"\"),
('company',\"Company\",\"\"),
('confirmpass',\"Repeat Password\",\"\"),
('course',\"Course\",\"\"),
('currentskills',\"Current Skills\",\"\"),
('dob',\"Date of birth\",\"\"),
('education',\"Education\",\"\"),
('email',\"Email\",\"\"),
('equipmentquestion',\"Do you have the following equipments?\",\"\"),
('finish',\"Finish\",\"\"),
('firstname',\"First Name\",\"\"),
('functionalskills',\"Functional Skills\",\"\"),
('gender',\"Gender\",\"\"),
('governate',\"Governate\",\"\"),
('highesteducation',\"Highest Education\",\"\"),
('institution',\"Institution\",\"\"),
('interests',\"Interests\",\"\"),
('internet',\"Internet\",\"\"),
('languageskills',\"Language Skills\",\"\"),
('laptop',\"Laptop\",\"\"),
('lastname',\"Last Name\",\"\"),
('major',\"Major\",\"\"),
('morning',\"Morning\",\"\"),
('nationality',\"Nationality\",\"\"),
('next',\"Next\",\"\"),
('night',\"Night\",\"\"),
('noon',\"Noon\",\"\"),
('onsite',\"On Site\",\"\"),
('pass',\"Password\",\"\"),
('phone',\"Phone\",\"\"),
('picture',\"Choose Picture\",\"\"),
('preferworktime',\"Preferred work shift\",\"\"),
('profile',\"Profile\",\"\"),
('questionstudy',\"What are you studying? \",\"\"),
('remote',\"Remote\",\"\"),
('save',\"Save\",\"\"),
('select',\"Select\",\"\"),
('select a',\"Select a\",\"\"),
('select your',\"Select your\",\"\"),
('selectmoreone',\"(You can select more than one)\",\"\"),
('skills',\"Skills\",\"\"),
('smartphone',\"Smart Phone\",\"\"),
('specialneeds',\"Special Needs\",\"\"),
('technologyplatform',\"Technology Platform\",\"\"),
('time',\"Time\",\"\"),
('trainingquestion',\"Have you completed any trainings courses?\",\"\"),
('trainings',\"Trainings\",\"\"),
('work',\"Work Availability\",\"\"),
('workposition',\"Position\",\"\"),
('workquestion',\"Are you currently working?\",\"\"),
('worktype',\"Work Type\",\"\"),
('minimumsixcharacters',\"(at least 6 characters)\",\"\"),
('year',\"Year\",\"\");";

        DB::unprepared($statement);
    }
}
