<?php

namespace App\Http\Controllers;

class CareerController extends Controller
{
    public function index()
    {
        return view('pages.career', [
            'page' => [
                'title' => 'Career | Arya Web Coding',
                'meta_description' => 'Explore career opportunities at Arya Web Coding in web development, app development, UI/UX design, QA, and digital marketing.',
                'canonical' => route('career.index'),
                'eyebrow' => 'Grow With Our Team',
                'hero_title' => 'Build digital products with a team that values craft, speed, and ownership',
                'hero_description' => 'We are looking for curious people who enjoy solving real business problems across design, development, and growth. If you like building useful things with care, we would love to hear from you.',
                'stats' => [
                    ['value' => '5+', 'label' => 'Core role tracks'],
                    ['value' => 'Learning-first', 'label' => 'Growth culture'],
                    ['value' => 'Real projects', 'label' => 'Hands-on work'],
                ],
                'benefits' => [
                    ['icon' => 'fa-rocket', 'title' => 'Meaningful ownership', 'description' => 'You work on live projects that matter, not throwaway tasks with no context.'],
                    ['icon' => 'fa-brain', 'title' => 'Practical learning', 'description' => 'We value people who keep learning through shipping, feedback, and iteration.'],
                    ['icon' => 'fa-users', 'title' => 'Supportive teamwork', 'description' => 'Design, development, and marketing collaborate closely so work moves faster and cleaner.'],
                    ['icon' => 'fa-seedling', 'title' => 'Room to grow', 'description' => 'Strong contributors can expand into strategy, client communication, and leadership responsibility.'],
                ],
                'roles' => [
                    [
                        'title' => 'Laravel / PHP Developer',
                        'type' => 'Full-time',
                        'experience' => '1-3 years',
                        'description' => 'Build secure, maintainable web applications and custom backend workflows using Laravel and modern frontend tooling.',
                        'skills' => ['Laravel', 'MySQL', 'REST APIs', 'Git'],
                    ],
                    [
                        'title' => 'Frontend / UI Developer',
                        'type' => 'Full-time',
                        'experience' => '1-3 years',
                        'description' => 'Create responsive, polished interfaces with strong layout sense, accessibility awareness, and clean implementation.',
                        'skills' => ['HTML', 'Tailwind CSS', 'JavaScript', 'Responsive UI'],
                    ],
                    [
                        'title' => 'Digital Marketing Executive',
                        'type' => 'Full-time',
                        'experience' => '1-2 years',
                        'description' => 'Support SEO, campaign execution, content planning, and reporting across multiple client growth initiatives.',
                        'skills' => ['SEO', 'Google Ads', 'Content', 'Analytics'],
                    ],
                    [
                        'title' => 'UI/UX Designer',
                        'type' => 'Internship / Full-time',
                        'experience' => '0-2 years',
                        'description' => 'Design clear user journeys, wireframes, visual systems, and conversion-friendly interface experiences.',
                        'skills' => ['Figma', 'Wireframing', 'Prototyping', 'Design Systems'],
                    ],
                ],
                'steps' => [
                    ['title' => 'Apply with context', 'description' => 'Send your profile, portfolio, and a short note about the kind of work you want to do.'],
                    ['title' => 'Quick discussion', 'description' => 'We connect for a practical conversation about your skills, interests, and role fit.'],
                    ['title' => 'Task or review round', 'description' => 'Depending on the role, we may review past work or share a focused practical task.'],
                    ['title' => 'Join and build', 'description' => 'If there is a fit, we move quickly and help you onboard into real delivery work.'],
                ],
            ],
        ]);
    }
}
