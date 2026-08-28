<?php

namespace App\Http\Controllers;

class TeamController extends Controller
{
    public function index()
    {
        $leadership = [
            [
                'name' => 'Abhishek Kumar',
                'role' => 'Co-Founder',
                'short_role' => 'Co-Founder',
                'experience' => '9+ Years',
                'focus' => 'Product innovation, strategic planning, client success, scalable digital solutions',
                'accent' => 'from-amber-400 to-orange-500',
            ],
            [
                'name' => 'Akash Kumar',
                'role' => 'CEO',
                'short_role' => 'CEO',
                'experience' => '10+ Years',
                'focus' => 'Business leadership, operational excellence, market expansion, sustainable growth',
                'accent' => 'from-sky-500 to-indigo-600',
            ],
        ];

        $manager = [
            'name' => 'Jyoti Prakash',
            'role' => 'Manager',
            'short_role' => 'Manager',
            'experience' => '7+ Years',
            'focus' => 'Project management, team leadership, workflow optimization, operational efficiency',
            'accent' => 'from-emerald-500 to-teal-600',
        ];

        $team = [
            'group' => 'Our Team',
            'members' => [
                [
                    'name' => 'Rohit Verma',
                    'role' => 'Laravel Developer',
                    'experience' => '5 Years',
                    'focus' => 'Backend modules, APIs, admin panels',
                    'accent' => 'from-cyan-500 to-sky-600',
                ],
                [
                    'name' => 'Pooja Sharma',
                    'role' => 'Frontend Developer',
                    'experience' => '4 Years',
                    'focus' => 'Blade UI, Tailwind styling, responsive pages',
                    'accent' => 'from-pink-500 to-rose-500',
                ],
                [
                    'name' => 'Nitin Arya',
                    'role' => 'Full Stack Developer',
                    'experience' => '6 Years',
                    'focus' => 'Laravel integration, database flows, frontend support',
                    'accent' => 'from-violet-500 to-indigo-600',
                ],
                [
                    'name' => 'Sakshi Gupta',
                    'role' => 'UI Developer',
                    'experience' => '3 Years',
                    'focus' => 'User interface polish, layout components, page consistency',
                    'accent' => 'from-fuchsia-500 to-pink-500',
                ],
            ],
        ];

        return view('team', compact('leadership', 'manager', 'team'));
    }
}
