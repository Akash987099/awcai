<?php

namespace App\Http\Controllers;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('pages.contact-us', [
            'page' => [
                'title' => 'Contact Us | Arya Web Coding',
                'meta_description' => 'Contact Arya Web Coding for website development, app development, UI/UX design, SEO, and digital marketing enquiries.',
                'canonical' => route('contact.index'),
                'eyebrow' => 'Start A Conversation',
                'hero_title' => 'Let us turn your next idea into a polished digital product',
                'hero_description' => 'Whether you need a business website, mobile app, UI/UX revamp, or digital marketing support, our team is ready to map the right next step with you.',
                'stats' => [
                    ['value' => '24 hrs', 'label' => 'Average first response'],
                    ['value' => 'Web + App + Growth', 'label' => 'Cross-functional support'],
                    ['value' => 'Agra Based', 'label' => 'Pan-India delivery'],
                ],
                'contact_cards' => [
                    [
                        'icon' => 'fa-phone-volume',
                        'title' => 'Call our team',
                        'description' => 'Talk through scope, timeline, or support needs directly with us.',
                        'lines' => ['+91 98709 92118', '+91 79069 48573', '+91 85330 74414'],
                    ],
                    [
                        'icon' => 'fa-envelope-open-text',
                        'title' => 'Write to us',
                        'description' => 'Share project details, requirements, or attachment-ready briefs by email.',
                        'lines' => ['aryawebcoding@gmail.com', 'Response on working days'],
                    ],
                    [
                        'icon' => 'fa-location-dot',
                        'title' => 'Visit our office',
                        'description' => 'Meet us for a focused discussion around strategy, design, or execution.',
                        'lines' => ['Pavitra Marriage Home, NH-2 Road', 'Agra Tundla, Firozabad, Uttar Pradesh'],
                    ],
                ],
                'highlights' => [
                    'Website development for startups, businesses, and service brands',
                    'Mobile app planning and development for scalable user journeys',
                    'UI/UX design improvements for better clarity and conversion',
                    'Digital marketing support across SEO, ads, and content growth',
                ],
                'process' => [
                    ['title' => 'Tell us the need', 'description' => 'Share your business goal, current challenge, or feature requirement in simple words.'],
                    ['title' => 'We shape the direction', 'description' => 'Our team studies the requirement and suggests the right service mix, scope, and path.'],
                    ['title' => 'We begin with clarity', 'description' => 'Once aligned, we move into execution with clean communication, milestones, and delivery focus.'],
                ],
            ],
        ]);
    }
}
