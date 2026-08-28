<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class DigitalMarketingController extends Controller
{
    public function overview()
    {
        $pages = $this->pages();
        $sections = $this->sections($pages);

        return view('services.digital-marketing-page', [
            'page' => $pages['overview'],
            'sections' => $sections,
            'relatedPages' => $this->flattenPages($sections),
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('index')],
                ['label' => 'Digital Marketing', 'url' => route('digital-marketing.overview')],
            ],
        ]);
    }

    public function section(string $section)
    {
        $pages = $this->pages();
        $sectionPage = Arr::get($pages, "sections.{$section}");

        abort_unless($sectionPage, 404);

        $sections = $this->sections($pages);

        return view('services.digital-marketing-page', [
            'page' => $this->buildSectionPage($section, $sectionPage),
            'sections' => $sections,
            'relatedPages' => $this->relatedSectionPages($section, $sections),
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('index')],
                ['label' => 'Digital Marketing', 'url' => route('digital-marketing.overview')],
                ['label' => $sectionPage['title'], 'url' => route('digital-marketing.section', ['section' => $section])],
            ],
        ]);
    }

    public function item(string $section, string $page)
    {
        $pages = $this->pages();
        $sectionPage = Arr::get($pages, "sections.{$section}");
        $itemPage = Arr::get($pages, "sections.{$section}.children.{$page}");

        abort_unless($sectionPage && $itemPage, 404);

        $sections = $this->sections($pages);

        return view('services.digital-marketing-page', [
            'page' => $this->buildChildPage($section, $page, $sectionPage, $itemPage),
            'sections' => $sections,
            'relatedPages' => $this->relatedSectionPages($section, $sections),
            'breadcrumbs' => [
                ['label' => 'Home', 'url' => route('index')],
                ['label' => 'Digital Marketing', 'url' => route('digital-marketing.overview')],
                ['label' => $sectionPage['title'], 'url' => route('digital-marketing.section', ['section' => $section])],
                ['label' => $itemPage['title'], 'url' => route('digital-marketing.item', ['section' => $section, 'page' => $page])],
            ],
        ]);
    }

    private function buildSectionPage(string $section, array $sectionPage): array
    {
        return [
            'title' => $sectionPage['title'] . ' | Arya Web Coding',
            'meta_description' => $sectionPage['meta_description'],
            'canonical' => route('digital-marketing.section', ['section' => $section]),
            'eyebrow' => 'Digital Marketing Service',
            'hero_title' => $sectionPage['hero_title'],
            'hero_description' => $sectionPage['hero_description'],
            'hero_badge' => $sectionPage['hero_badge'],
            'summary' => $sectionPage['summary'],
            'stat_cards' => $sectionPage['stat_cards'],
            'pillars' => $sectionPage['pillars'],
            'process' => $sectionPage['process'],
            'deliverables' => $sectionPage['deliverables'],
            'faqs' => $sectionPage['faqs'],
            'cta' => [
                'title' => 'Need a focused ' . $sectionPage['title'] . ' plan?',
                'description' => 'Tell us your market, offer, and growth targets. We will help shape a practical campaign plan with the right channels and priorities.',
            ],
            'spotlight_links' => collect($sectionPage['children'])
                ->map(fn(array $child, string $slug) => [
                    'title' => $child['title'],
                    'description' => $child['description'],
                    'url' => route('digital-marketing.item', ['section' => $section, 'page' => $slug]),
                ])
                ->values()
                ->all(),
        ];
    }

    private function buildChildPage(string $section, string $page, array $sectionPage, array $itemPage): array
    {
        return [
            'title' => $itemPage['title'] . ' | Arya Web Coding',
            'meta_description' => $itemPage['meta_description'] ?? $itemPage['description'],
            'canonical' => route('digital-marketing.item', ['section' => $section, 'page' => $page]),
            'eyebrow' => $sectionPage['title'],
            'hero_title' => $itemPage['title'],
            'hero_description' => $itemPage['description'],
            'hero_badge' => $itemPage['hero_badge'] ?? $sectionPage['hero_badge'],
            'summary' => $itemPage['summary'] ?? ('We build this service around business goals, buyer intent, and measurable digital outcomes instead of one-size-fits-all execution.'),
            'stat_cards' => $itemPage['stat_cards'] ?? $sectionPage['stat_cards'],
            'pillars' => collect($itemPage['focus'])
                ->map(fn(string $focus) => [
                    'title' => $focus,
                    'description' => 'Execution is planned around this area so campaigns stay aligned with search intent, messaging, and conversion quality.',
                ])
                ->all(),
            'process' => collect($itemPage['workflow'])
                ->map(fn(string $step, int $index) => [
                    'title' => 'Step ' . ($index + 1),
                    'description' => $step,
                ])
                ->all(),
            'deliverables' => collect($itemPage['deliverables'])
                ->map(fn(string $deliverable) => [
                    'title' => $deliverable,
                    'description' => 'You get a clear implementation layer here so the work can be launched, reviewed, and improved with confidence.',
                ])
                ->all(),
            'faqs' => $itemPage['faqs'],
            'cta' => [
                'title' => 'Want help with ' . $itemPage['title'] . '?',
                'description' => 'We can turn this channel into a practical plan with better messaging, targeting, landing flows, and reporting.',
            ],
            'spotlight_links' => [
                [
                    'title' => 'Back to ' . $sectionPage['title'],
                    'description' => 'See the complete service page and all related delivery areas under this category.',
                    'url' => route('digital-marketing.section', ['section' => $section]),
                ],
            ],
        ];
    }

    private function sections(array $pages): array
    {
        return collect($pages['sections'])->map(function (array $sectionPage, string $slug) {
            return [
                'slug' => $slug,
                'title' => $sectionPage['title'],
                'url' => route('digital-marketing.section', ['section' => $slug]),
                'children' => collect($sectionPage['children'])->map(function (array $child, string $childSlug) use ($slug) {
                    return [
                        'slug' => $childSlug,
                        'title' => $child['title'],
                        'description' => $child['description'],
                        'url' => route('digital-marketing.item', ['section' => $slug, 'page' => $childSlug]),
                    ];
                })->values()->all(),
            ];
        })->values()->all();
    }

    private function flattenPages(array $sections): array
    {
        return collect($sections)
            ->flatMap(fn(array $section) => array_merge([
                [
                    'title' => $section['title'],
                    'description' => 'Explore the full service area, process, and outcomes we deliver under this category.',
                    'url' => $section['url'],
                ],
            ], $section['children']))
            ->all();
    }

    private function relatedSectionPages(string $currentSection, array $sections): array
    {
        $selected = collect($sections)->firstWhere('slug', $currentSection);

        return $selected
            ? array_merge([
                [
                    'title' => $selected['title'],
                    'description' => 'Open the main overview page for this category.',
                    'url' => $selected['url'],
                ],
            ], $selected['children'])
            : [];
    }

    private function pages(): array
    {
        return [
            'overview' => [
                'title' => 'Digital Marketing Services | Arya Web Coding',
                'meta_description' => 'Digital marketing services by Arya Web Coding covering SEO, paid ads, social media, content, email, CRO, analytics, and growth strategy.',
                'canonical' => route('digital-marketing.overview'),
                'eyebrow' => 'Digital Growth Services',
                'hero_title' => 'Digital marketing pages that turn traffic into real business momentum',
                'hero_description' => 'We have structured every digital marketing service into its own page so clients can explore SEO, paid campaigns, content, social media, email, analytics, and conversion work with much more clarity.',
                'hero_badge' => 'Strategy, Campaigns, and Reporting',
                'summary' => 'Our digital marketing approach combines visibility, messaging, conversion thinking, and reporting discipline so campaigns feel easier to plan and improve over time.',
                'stat_cards' => [
                    ['value' => '360°', 'label' => 'Channel Coverage'],
                    ['value' => 'ROI', 'label' => 'Focused Reporting'],
                    ['value' => 'Local + National', 'label' => 'Audience Reach'],
                    ['value' => 'Creative + Performance', 'label' => 'Execution Mix'],
                ],
                'pillars' => [
                    ['title' => 'Visibility', 'description' => 'SEO, paid media, local reach, and content systems to help the right audience find you.'],
                    ['title' => 'Engagement', 'description' => 'Stronger messaging, social content, remarketing, and channel coordination that keeps attention longer.'],
                    ['title' => 'Conversion', 'description' => 'Landing pages, CRO thinking, lead flow planning, and audience qualification to improve business outcomes.'],
                    ['title' => 'Measurement', 'description' => 'Analytics, dashboarding, and campaign reviews so decisions are based on real performance trends.'],
                ],
                'process' => [
                    ['title' => 'Audit and Opportunity Mapping', 'description' => 'We review your current channels, competitors, offers, and conversion path before recommending what to scale first.'],
                    ['title' => 'Page and Campaign Structure', 'description' => 'Each service area gets a clearer page structure so users and internal teams can understand exactly what is offered.'],
                    ['title' => 'Execution and Optimization', 'description' => 'Campaigns, content, and landing assets are launched with ongoing improvements based on user response and performance.'],
                    ['title' => 'Reporting and Next Steps', 'description' => 'We track what is working, what needs adjustment, and where to invest next for smarter growth.'],
                ],
                'deliverables' => [
                    ['title' => 'Dedicated service pages', 'description' => 'Every major digital marketing area is now mapped to a separate route and readable page.'],
                    ['title' => 'Consistent page design', 'description' => 'Shared visuals, layout rhythm, and navigation keep the full section polished and easier to explore.'],
                    ['title' => 'Actionable service breakdowns', 'description' => 'Visitors can quickly understand channel scope, workflow, and expected deliverables.'],
                    ['title' => 'Expandable structure', 'description' => 'The controller and view pattern is now ready for future marketing pages without repeating layout code.'],
                ],
                'faqs' => [
                    ['question' => 'Can these pages support both SEO and user conversion goals?', 'answer' => 'Yes. The structure is designed to explain services clearly while also being strong enough to support search visibility and lead generation goals.'],
                    ['question' => 'Will it be easy to add more digital marketing pages later?', 'answer' => 'Yes. The setup now uses a reusable controller-driven pattern, so new categories or child pages can be added with much less effort.'],
                    ['question' => 'Can businesses use only one service or a full package?', 'answer' => 'Absolutely. Some businesses need a single focused channel like SEO or PPC, while others need a combined multi-channel growth plan.'],
                ],
                'cta' => [
                    'title' => 'Need a digital marketing setup that is easier to present and easier to scale?',
                    'description' => 'We can help shape the right mix of pages, campaigns, and conversion flow for your business goals.',
                ],
                'spotlight_links' => [],
            ],
            'sections' => [
                'seo' => $this->sectionData(
                    'SEO Services',
                    'Organic Search Growth',
                    'SEO pages built to improve visibility, crawl strength, and lead quality',
                    'From on-page improvements to local and technical SEO, we help businesses improve discoverability with better structure, targeting, and content alignment.',
                    [
                        ['value' => 'Search', 'label' => 'Intent Mapping'],
                        ['value' => 'Local', 'label' => 'Reach Boost'],
                        ['value' => 'Tech', 'label' => 'Site Health'],
                        ['value' => 'Content', 'label' => 'Growth Support'],
                    ],
                    [
                        ['title' => 'Keyword strategy', 'description' => 'Pages and content clusters aligned to buyer intent and business services.'],
                        ['title' => 'Content optimization', 'description' => 'Better metadata, headings, copy depth, and internal link relationships.'],
                        ['title' => 'Technical cleanup', 'description' => 'Improvements for crawling, indexing, page experience, and search accessibility.'],
                        ['title' => 'Local discovery', 'description' => 'Stronger business profile signals and local landing page structure for regional reach.'],
                    ],
                    [
                        ['title' => 'SEO audit', 'description' => 'We review structure, rankings, keywords, speed, and content gaps first.'],
                        ['title' => 'Priority roadmap', 'description' => 'Next, we define what to fix, build, and publish in the right order.'],
                        ['title' => 'Implementation support', 'description' => 'We improve pages, metadata, links, technical issues, and local assets.'],
                        ['title' => 'Performance review', 'description' => 'Tracking and iteration keep the work aligned to traffic and lead quality.'],
                    ],
                    [
                        ['title' => 'Keyword page mapping', 'description' => 'A clearer connection between services, pages, and search terms.'],
                        ['title' => 'Content recommendations', 'description' => 'Priority topics and updates that support stronger organic visibility.'],
                        ['title' => 'Technical issue log', 'description' => 'A focused list of crawl, speed, or indexation issues to resolve.'],
                        ['title' => 'Monthly direction', 'description' => 'A practical path for ongoing SEO improvements and reporting.'],
                    ],
                    [
                        'On-page SEO' => $this->childData('On-Page SEO', 'Improve page-level relevance with better titles, content structure, schema, links, and conversion-oriented copy.', ['Metadata optimization', 'Header hierarchy', 'Internal linking', 'Conversion copy alignment'], ['Audit core pages for search intent and content gaps.', 'Refine titles, descriptions, headings, and on-page messaging.', 'Improve structure, links, and supporting content blocks.', 'Review rankings, engagement, and next page opportunities.'], ['Page-level optimization plan', 'Metadata recommendations', 'Internal linking updates', 'Content improvement notes'], $this->faqsFor('On-Page SEO')),
                        'Off-Page SEO' => $this->childData('Off-Page SEO', 'Build trust signals beyond your website through authority-building mentions, backlink opportunities, and brand reach support.', ['Authority growth', 'Link profile review', 'Brand mentions', 'Referral visibility'], ['Assess backlink health and brand positioning.', 'Identify outreach and listing opportunities.', 'Support authority-building content and mention strategy.', 'Track domain and referral movement over time.'], ['Backlink opportunity list', 'Brand mention recommendations', 'Outreach direction', 'Authority tracking notes'], $this->faqsFor('Off-Page SEO')),
                        'Technical SEO' => $this->childData('Technical SEO', 'Strengthen the technical foundation that helps search engines crawl, index, and interpret your website more effectively.', ['Crawl diagnostics', 'Index health', 'Core web vitals', 'Structured data'], ['Scan the site for crawl, speed, and markup issues.', 'Prioritize technical fixes that affect visibility and UX.', 'Coordinate implementation with development teams.', 'Monitor improvements and unresolved issues.'], ['Technical audit summary', 'Priority fix list', 'Schema and crawl notes', 'Performance review points'], $this->faqsFor('Technical SEO')),
                        'Local SEO' => $this->childData('Local SEO', 'Help nearby customers discover your business through local listings, map visibility, location pages, and stronger proximity signals.', ['Google Business Profile', 'Local citations', 'Location pages', 'Review signals'], ['Review current local presence and NAP consistency.', 'Optimize business profile and location content.', 'Improve local citations, reviews, and regional signals.', 'Track map visibility and enquiry quality.'], ['Local listing recommendations', 'Location page plan', 'Review strategy notes', 'Regional keyword targets'], $this->faqsFor('Local SEO')),
                    ]
                ),
                'search-engine-marketing' => $this->sectionData(
                    'Search Engine Marketing (SEM)',
                    'Paid Search Visibility',
                    'Paid search campaigns structured for stronger intent, budget control, and lead quality',
                    'SEM helps businesses appear in front of ready-to-act audiences with high-intent search campaigns that are easier to measure and refine.',
                    [
                        ['value' => 'Paid Search', 'label' => 'Intent Driven'],
                        ['value' => 'Bids', 'label' => 'Budget Control'],
                        ['value' => 'Ads', 'label' => 'Message Testing'],
                        ['value' => 'Leads', 'label' => 'Quality Focus'],
                    ],
                    [
                        ['title' => 'Campaign architecture', 'description' => 'Logical ad groups and keyword clusters that reduce wasted spend.'],
                        ['title' => 'Copy testing', 'description' => 'Headline and message experiments to improve click-through and conversion quality.'],
                        ['title' => 'Landing page fit', 'description' => 'Better continuity between search intent, ads, and the destination page.'],
                        ['title' => 'Budget steering', 'description' => 'Smarter allocation based on device, region, audience, and conversion trends.'],
                    ],
                    [
                        ['title' => 'Offer and keyword discovery', 'description' => 'We map what users search for and how your business should appear.'],
                        ['title' => 'Campaign buildout', 'description' => 'Ad groups, budgets, extensions, and targeting logic are structured clearly.'],
                        ['title' => 'Launch and quality checks', 'description' => 'Tracking, exclusions, and landing page coordination are reviewed before scale.'],
                        ['title' => 'Optimization cycles', 'description' => 'We refine bids, ads, audiences, and landing fit using performance data.'],
                    ],
                    [
                        ['title' => 'Campaign structure plan', 'description' => 'A more organized paid search account built around intent and offer clarity.'],
                        ['title' => 'Ad message testing', 'description' => 'Copy variants created to improve engagement and quality score signals.'],
                        ['title' => 'Keyword and negative list', 'description' => 'Cleaner search targeting with reduced irrelevant traffic.'],
                        ['title' => 'Reporting direction', 'description' => 'Clear checkpoints for spend, clicks, conversions, and lead quality.'],
                    ],
                    [
                        'Google Ads (PPC campaigns)' => $this->childData('Google Ads (PPC Campaigns)', 'Launch Google search campaigns that put your offer in front of high-intent users exactly when they are searching for it.', ['Search campaigns', 'Keyword match strategy', 'Ad extension setup', 'Lead tracking'], ['Research commercial keywords and user intent.', 'Build ad groups, ads, and extensions around core offers.', 'Connect tracking and launch with budget controls.', 'Optimize based on search terms, CTR, and conversions.'], ['Google Ads setup', 'Keyword structure', 'Ad copy variants', 'Search term review process'], $this->faqsFor('Google Ads (PPC Campaigns)')),
                        'Bing Ads' => $this->childData('Bing Ads', 'Reach additional search audiences and often lower-cost traffic segments through Microsoft Ads campaign planning.', ['Microsoft network reach', 'Audience expansion', 'Budget efficiency', 'Intent-led copy'], ['Mirror or adapt search strategy for Bing users.', 'Set campaign targeting and extension assets.', 'Review spend efficiency and conversion cost.', 'Refine based on audience and device patterns.'], ['Bing campaign setup', 'Audience targeting notes', 'Ad variants', 'Budget allocation suggestions'], $this->faqsFor('Bing Ads')),
                        'Display advertising' => $this->childData('Display Advertising', 'Use visual ad placements to increase awareness, remarketing reach, and repeated brand exposure across the web.', ['Banner placement', 'Audience remarketing', 'Creative testing', 'Awareness support'], ['Define audience segments and placement priorities.', 'Prepare creative directions and conversion goals.', 'Launch display or remarketing sets with exclusions.', 'Review reach, frequency, and assisted conversions.'], ['Display targeting map', 'Creative direction notes', 'Remarketing structure', 'Placement review checklist'], $this->faqsFor('Display Advertising')),
                    ]
                ),
                'social-media' => $this->sectionData(
                    'Social Media Marketing',
                    'Community and Content Growth',
                    'Social media pages that clarify platform strategy, content rhythm, and campaign support',
                    'We help brands show up more consistently across major social platforms with content systems, creative direction, and campaign support that match audience behavior.',
                    [
                        ['value' => 'Social', 'label' => 'Brand Presence'],
                        ['value' => 'Content', 'label' => 'Publishing Rhythm'],
                        ['value' => 'Reels', 'label' => 'Creative Reach'],
                        ['value' => 'DMs', 'label' => 'Engagement Flow'],
                    ],
                    [
                        ['title' => 'Platform strategy', 'description' => 'Each platform gets a purpose instead of repeating the same content everywhere.'],
                        ['title' => 'Content planning', 'description' => 'Themes, hooks, offers, and posting rhythm stay more intentional.'],
                        ['title' => 'Community engagement', 'description' => 'Replies, DMs, comments, and audience interaction support trust-building.'],
                        ['title' => 'Campaign support', 'description' => 'Social channels stay aligned with launches, offers, and paid promotion.'],
                    ],
                    [
                        ['title' => 'Brand and audience review', 'description' => 'We study content tone, target segments, and platform fit before posting plans are shaped.'],
                        ['title' => 'Content calendar setup', 'description' => 'We organize posting pillars, promo balance, and creative slots.'],
                        ['title' => 'Execution and response handling', 'description' => 'Publishing, moderation, and campaign coordination keep channels active.'],
                        ['title' => 'Engagement and growth review', 'description' => 'We evaluate what content drives saves, clicks, reach, and conversations.'],
                    ],
                    [
                        ['title' => 'Monthly content framework', 'description' => 'An organized view of what to post and why it matters.'],
                        ['title' => 'Creative direction', 'description' => 'Clear visual and messaging cues for content batches.'],
                        ['title' => 'Engagement checklist', 'description' => 'A repeatable approach for maintaining audience responsiveness.'],
                        ['title' => 'Performance insights', 'description' => 'A practical read on content winners and next experiments.'],
                    ],
                    [
                        'Facebook & Instagram' => $this->childData('Facebook & Instagram', 'Use highly visual, community-driven content and campaign support to build reach, enquiries, and repeat interaction.', ['Feed and reel strategy', 'Story campaigns', 'Lead-oriented creative', 'Audience engagement'], ['Plan platform-specific content themes and formats.', 'Align visuals, captions, and offer positioning.', 'Publish and coordinate with paid or seasonal campaigns.', 'Track interaction and enquiry behavior for improvements.'], ['Content calendar direction', 'Creative theme notes', 'Reel and story priorities', 'Engagement review points'], $this->faqsFor('Facebook & Instagram')),
                        'LinkedIn' => $this->childData('LinkedIn', 'Position your business or leadership team more professionally for B2B visibility, authority building, and relationship-led growth.', ['Thought leadership', 'B2B messaging', 'Professional outreach', 'Employer branding'], ['Define business and founder positioning angles.', 'Create content themes for expertise and trust.', 'Coordinate post rhythm with networking goals.', 'Review engagement from decision-maker audiences.'], ['LinkedIn content framework', 'Authority topic ideas', 'Profile improvement notes', 'Audience engagement review'], $this->faqsFor('LinkedIn')),
                        'Twitter (X)' => $this->childData('Twitter (X)', 'Use timely commentary, community presence, and concise messaging to stay visible in fast-moving conversations.', ['Short-form messaging', 'Topical content', 'Community participation', 'Brand tone discipline'], ['Clarify voice, themes, and engagement boundaries.', 'Plan posts for commentary, updates, and quick ideas.', 'Support regular interaction and topical participation.', 'Review traction and refine messaging style.'], ['Voice and theme notes', 'Posting structure', 'Engagement prompts', 'Performance observations'], $this->faqsFor('Twitter (X)')),
                        'Pinterest & Snapchat' => $this->childData('Pinterest & Snapchat', 'Reach visual and mobile-first audiences through discovery-led content and platform-native creative flows.', ['Visual discovery', 'Lifestyle content', 'Mobile-first creative', 'Audience experimentation'], ['Assess whether platform fit matches your audience.', 'Create visual content buckets and CTAs.', 'Launch tests with relevant content formats.', 'Measure saves, swipe behavior, and referral quality.'], ['Platform fit summary', 'Creative content ideas', 'Test campaign recommendations', 'Audience response review'], $this->faqsFor('Pinterest & Snapchat')),
                    ]
                ),
                'content-marketing' => $this->sectionData(
                    'Content Marketing',
                    'Authority and Education',
                    'Content systems designed to educate, rank, nurture, and support better conversion paths',
                    'Strong content helps brands answer questions, build trust, improve discoverability, and give campaigns more depth across the funnel.',
                    [
                        ['value' => 'Blogs', 'label' => 'Organic Support'],
                        ['value' => 'Video', 'label' => 'Message Depth'],
                        ['value' => 'Assets', 'label' => 'Sales Enablement'],
                        ['value' => 'Topics', 'label' => 'Funnel Coverage'],
                    ],
                    [
                        ['title' => 'Topic planning', 'description' => 'Content is aligned to real customer questions, objections, and search patterns.'],
                        ['title' => 'Format variety', 'description' => 'Articles, videos, graphics, and long-form assets each serve a clear purpose.'],
                        ['title' => 'Conversion support', 'description' => 'Content connects better with landing pages, nurture flows, and sales conversations.'],
                        ['title' => 'Brand authority', 'description' => 'Good content makes your business look more credible and useful to prospects.'],
                    ],
                    [
                        ['title' => 'Audience and topic research', 'description' => 'We identify what people need to understand before they are ready to buy.'],
                        ['title' => 'Editorial planning', 'description' => 'We organize formats, publishing rhythm, and priority themes.'],
                        ['title' => 'Creation and optimization', 'description' => 'Content is produced with stronger structure, clarity, and distribution value.'],
                        ['title' => 'Measurement and reuse', 'description' => 'Top-performing ideas can be repurposed for social, sales, and future pages.'],
                    ],
                    [
                        ['title' => 'Editorial roadmap', 'description' => 'A practical list of themes, formats, and publishing priorities.'],
                        ['title' => 'Content briefs', 'description' => 'Stronger instructions for writing, video, or asset production.'],
                        ['title' => 'Optimization direction', 'description' => 'Clear improvements for readability, SEO, and message strength.'],
                        ['title' => 'Repurposing opportunities', 'description' => 'Ways to stretch strong ideas across more channels.'],
                    ],
                    [
                        'Blog writing & optimization' => $this->childData('Blog Writing & Optimization', 'Publish more useful articles that answer real questions while supporting search visibility and long-term trust building.', ['Topic clustering', 'Search-aligned writing', 'Readability improvements', 'CTA placement'], ['Research topics and gaps linked to business offers.', 'Draft or improve articles with structure and search intent in mind.', 'Add stronger headings, links, and conversion cues.', 'Track which themes bring better engagement and enquiries.'], ['Blog topic roadmap', 'Article optimization notes', 'Internal linking suggestions', 'Lead CTA improvements'], $this->faqsFor('Blog Writing & Optimization')),
                        'Video content marketing' => $this->childData('Video Content Marketing', 'Use educational, explainer, testimonial, or promotional videos to improve reach and trust across channels.', ['Video topic strategy', 'Hook and script ideas', 'Platform adaptation', 'Retention focus'], ['Choose video topics based on audience friction and offers.', 'Shape scripts or outlines with stronger hooks.', 'Align formats for website, social, or ads.', 'Review watch behavior and next content ideas.'], ['Video content roadmap', 'Script direction notes', 'Format recommendations', 'Performance learning points'], $this->faqsFor('Video Content Marketing')),
                        'Infographics & visual content' => $this->childData('Infographics & Visual Content', 'Turn complex topics into visual assets that improve understanding, shareability, and page engagement.', ['Data simplification', 'Visual storytelling', 'Brand consistency', 'Share-ready assets'], ['Identify information worth visualizing.', 'Structure the visual hierarchy and message flow.', 'Design assets for web, social, or presentations.', 'Review how the assets are used and repurposed.'], ['Infographic concept notes', 'Visual layout direction', 'Content hierarchy plan', 'Reuse recommendations'], $this->faqsFor('Infographics & Visual Content')),
                        'Case studies, whitepapers, eBooks' => $this->childData('Case Studies, Whitepapers, and eBooks', 'Create deeper assets for B2B trust-building, lead capture, sales enablement, and more considered buying journeys.', ['Proof-based storytelling', 'Lead magnet strategy', 'Long-form structure', 'Sales support content'], ['Select topics or projects worth turning into premium content.', 'Shape the narrative, evidence, and section flow.', 'Design the asset around download or nurture use cases.', 'Connect it with forms, campaigns, or sales follow-up.'], ['Asset outline and direction', 'Lead magnet recommendations', 'Case study framework', 'Distribution suggestions'], $this->faqsFor('Case Studies, Whitepapers, and eBooks')),
                    ]
                ),
                'email-marketing' => $this->sectionData(
                    'Email Marketing',
                    'Retention and Nurture',
                    'Email campaigns that keep leads warm, customers informed, and follow-up more reliable',
                    'Email still works best when the messaging is timely, segmented, and connected to what the user already showed interest in.',
                    [
                        ['value' => 'Inbox', 'label' => 'Direct Reach'],
                        ['value' => 'Flows', 'label' => 'Automation'],
                        ['value' => 'Nurture', 'label' => 'Lead Quality'],
                        ['value' => 'Repeat', 'label' => 'Retention Support'],
                    ],
                    [
                        ['title' => 'Segmentation', 'description' => 'Different users get different messages based on interest, stage, or behavior.'],
                        ['title' => 'Sequence planning', 'description' => 'Automated journeys help leads move without relying only on manual follow-up.'],
                        ['title' => 'Offer timing', 'description' => 'Better timing improves open, click, and reply behavior.'],
                        ['title' => 'Lifecycle messaging', 'description' => 'Email supports onboarding, reactivation, promotions, and remarketing.'],
                    ],
                    [
                        ['title' => 'List and journey review', 'description' => 'We understand audience segments, form sources, and follow-up gaps.'],
                        ['title' => 'Campaign and sequence planning', 'description' => 'We define what should be one-off, automated, or event-triggered.'],
                        ['title' => 'Copy and creative execution', 'description' => 'Subject lines, layouts, and CTAs are built around relevance and action.'],
                        ['title' => 'Engagement review', 'description' => 'Open, click, and conversion behavior guide the next round of improvements.'],
                    ],
                    [
                        ['title' => 'Email content plan', 'description' => 'A clearer map of newsletter, nurture, and promotion use cases.'],
                        ['title' => 'Sequence structure', 'description' => 'Better timing and logic for automated communication.'],
                        ['title' => 'Messaging improvements', 'description' => 'Stronger copy angles for opens, clicks, and user trust.'],
                        ['title' => 'Performance review points', 'description' => 'A consistent way to monitor what messages are resonating.'],
                    ],
                    [
                        'Newsletter campaigns' => $this->childData('Newsletter Campaigns', 'Send valuable recurring updates that keep your audience informed, engaged, and connected to your brand.', ['Recurring communication', 'Audience value mix', 'Content curation', 'Engagement consistency'], ['Define newsletter purpose and subscriber expectations.', 'Organize content sections, offers, and design rhythm.', 'Send on a practical schedule with clear CTAs.', 'Review opens, clicks, and content preferences.'], ['Newsletter format plan', 'Subject line ideas', 'Content section structure', 'Engagement review notes'], $this->faqsFor('Newsletter Campaigns')),
                        'Automated email sequences' => $this->childData('Automated Email Sequences', 'Build timed follow-up journeys for enquiries, downloads, onboarding, abandoned actions, and lifecycle touchpoints.', ['Automation logic', 'Trigger-based timing', 'Lifecycle messaging', 'Follow-up consistency'], ['Identify user actions that should trigger email follow-up.', 'Map the sequence and message progression.', 'Write and structure each message around next-step clarity.', 'Monitor sequence performance and refine timing or copy.'], ['Automation flow map', 'Sequence copy direction', 'Trigger recommendations', 'Improvement checkpoints'], $this->faqsFor('Automated Email Sequences')),
                        'Lead nurturing campaigns' => $this->childData('Lead Nurturing Campaigns', 'Help interested prospects move closer to action with educational, trust-building, and objection-reducing email flows.', ['Consideration-stage messaging', 'Trust signals', 'Sales readiness', 'Offer progression'], ['Segment leads by interest and stage.', 'Plan message flow around objections and value.', 'Connect content, proof, and conversion prompts.', 'Track which leads become more sales-ready over time.'], ['Nurture sequence outline', 'Trust-building content ideas', 'Offer progression notes', 'Lead quality observations'], $this->faqsFor('Lead Nurturing Campaigns')),
                    ]
                ),
                'influencer-marketing' => $this->sectionData(
                    'Influencer Marketing',
                    'Creator and Partner Reach',
                    'Influencer and affiliate pages built for collaboration-led awareness and trust',
                    'When the right creator or partner relationship fits the offer, it can improve reach, credibility, and conversion support faster than brand-only messaging.',
                    [
                        ['value' => 'Creators', 'label' => 'Audience Trust'],
                        ['value' => 'Partners', 'label' => 'Expanded Reach'],
                        ['value' => 'UGC', 'label' => 'Social Proof'],
                        ['value' => 'Referral', 'label' => 'Attribution Focus'],
                    ],
                    [
                        ['title' => 'Partner fit', 'description' => 'Audience relevance matters more than vanity follower numbers alone.'],
                        ['title' => 'Campaign clarity', 'description' => 'Creators need stronger briefs, expectations, and content goals.'],
                        ['title' => 'Reuse value', 'description' => 'Good creator content can also support ads, landing pages, and social proof.'],
                        ['title' => 'Tracking discipline', 'description' => 'Links, codes, and campaign checkpoints make partnerships easier to evaluate.'],
                    ],
                    [
                        ['title' => 'Partner discovery', 'description' => 'We look for suitable creators or affiliates based on audience, niche, and campaign style.'],
                        ['title' => 'Brief and offer setup', 'description' => 'The collaboration is structured around what should be shown, said, and tracked.'],
                        ['title' => 'Launch and content coordination', 'description' => 'We support approvals, timelines, and publishing consistency.'],
                        ['title' => 'Performance and reuse review', 'description' => 'We assess results and identify content or partner relationships worth extending.'],
                    ],
                    [
                        ['title' => 'Partner shortlist direction', 'description' => 'A clearer view of who fits your offer and audience.'],
                        ['title' => 'Brief framework', 'description' => 'Better instructions for creators or partners to represent the brand well.'],
                        ['title' => 'Tracking recommendations', 'description' => 'Simple ways to attribute traffic, sales, or enquiries.'],
                        ['title' => 'Repurposing options', 'description' => 'Ideas to get more value from creator-generated assets.'],
                    ],
                    [
                        'Partnering with influencers' => $this->childData('Partnering with Influencers', 'Collaborate with relevant creators to build awareness, social proof, and authentic product or service visibility.', ['Creator fit review', 'Campaign briefing', 'UGC potential', 'Audience alignment'], ['Define campaign goals and creator fit criteria.', 'Shortlist influencers based on content style and audience quality.', 'Prepare collaboration briefs and approval workflow.', 'Track campaign performance and reusable asset value.'], ['Influencer shortlist notes', 'Campaign brief framework', 'Tracking setup ideas', 'Content reuse recommendations'], $this->faqsFor('Partnering with Influencers')),
                        'Affiliate marketing programs' => $this->childData('Affiliate Marketing Programs', 'Set up referral-style growth systems that reward partners for generating traffic, enquiries, or sales.', ['Referral incentives', 'Partner onboarding', 'Tracking structure', 'Scalable acquisition'], ['Clarify program goals, commissions, and fit.', 'Create partner communication and performance expectations.', 'Set up basic tracking and attribution flow.', 'Review affiliate quality and scale the strongest sources.'], ['Affiliate program notes', 'Partner onboarding direction', 'Tracking checklist', 'Growth review points'], $this->faqsFor('Affiliate Marketing Programs')),
                    ]
                ),
                'pay-per-click-advertising' => $this->sectionData(
                    'Pay-Per-Click (PPC) Advertising',
                    'Performance Campaigns',
                    'PPC campaigns that balance traffic, cost control, and better conversion alignment',
                    'PPC works best when creative, targeting, and landing experience are connected instead of managed in isolation.',
                    [
                        ['value' => 'Clicks', 'label' => 'Fast Reach'],
                        ['value' => 'Targeting', 'label' => 'Sharper Audiences'],
                        ['value' => 'Creative', 'label' => 'Message Testing'],
                        ['value' => 'Leads', 'label' => 'Conversion Focus'],
                    ],
                    [
                        ['title' => 'Offer-first setup', 'description' => 'Campaigns are planned around what users should do next, not only impressions.'],
                        ['title' => 'Audience filters', 'description' => 'Targeting logic reduces wasted spend and improves relevance.'],
                        ['title' => 'Creative testing', 'description' => 'Better headlines, visuals, and hooks improve response over time.'],
                        ['title' => 'Landing page fit', 'description' => 'Clicks convert better when the post-click page matches campaign intent.'],
                    ],
                    [
                        ['title' => 'Campaign objective planning', 'description' => 'We define what success should look like before ads are launched.'],
                        ['title' => 'Creative and audience setup', 'description' => 'Assets, targeting, and placements are structured around the goal.'],
                        ['title' => 'Launch and tracking validation', 'description' => 'We confirm forms, events, and audience exclusions before scale.'],
                        ['title' => 'Optimization review', 'description' => 'Budget shifts, creative edits, and landing page adjustments improve efficiency.'],
                    ],
                    [
                        ['title' => 'Campaign launch structure', 'description' => 'A clearer buildout across audiences, offers, and ad formats.'],
                        ['title' => 'Creative testing plan', 'description' => 'Variants designed to improve cost and conversion quality.'],
                        ['title' => 'Targeting recommendations', 'description' => 'More intentional audience selection and exclusions.'],
                        ['title' => 'Performance checkpoints', 'description' => 'A useful review rhythm for spend and lead quality.'],
                    ],
                    [
                        'Google Ads' => $this->childData('Google Ads', 'Run high-intent PPC campaigns through Google to capture traffic that is already searching for your solution.', ['Search demand capture', 'Bid management', 'Keyword control', 'Lead tracking'], ['Identify offer-led keyword groups.', 'Build ads, extensions, and budget logic.', 'Launch with tracking and exclusions in place.', 'Optimize queries, bids, and landing performance.'], ['Google PPC setup notes', 'Ad group structure', 'Tracking checklist', 'Optimization plan'], $this->faqsFor('Google Ads')),
                        'Facebook/Instagram Ads' => $this->childData('Facebook and Instagram Ads', 'Use visual paid campaigns to generate leads, awareness, remarketing momentum, or offer-driven conversions.', ['Audience targeting', 'Visual creatives', 'Lead forms or landing pages', 'Retargeting'], ['Choose objective, audience, and creative angle.', 'Build ad sets and connect them to the right landing experience.', 'Launch and test formats, hooks, or audience segments.', 'Review CPL, CTR, and conversion quality.'], ['Meta campaign plan', 'Creative angle notes', 'Audience setup', 'Retargeting suggestions'], $this->faqsFor('Facebook and Instagram Ads')),
                        'YouTube Ads' => $this->childData('YouTube Ads', 'Reach audiences with video-first paid campaigns that build awareness, explain offers, or support remarketing.', ['Video storytelling', 'Audience selection', 'View quality', 'Awareness to action flow'], ['Select objective and audience profile.', 'Prepare or adapt video creatives for ad format fit.', 'Launch campaigns with clear hooks and CTA logic.', 'Review watch behavior, clicks, and assisted conversions.'], ['YouTube ad strategy notes', 'Creative requirements', 'Audience targeting suggestions', 'View and action checkpoints'], $this->faqsFor('YouTube Ads')),
                    ]
                ),
                'video-marketing' => $this->sectionData(
                    'Video Marketing',
                    'Visual Storytelling',
                    'Video marketing pages that support education, attention, trust, and campaign performance',
                    'Video helps explain, demonstrate, and persuade more quickly when it is planned around audience questions and platform context.',
                    [
                        ['value' => 'Short-form', 'label' => 'Attention'],
                        ['value' => 'Explainers', 'label' => 'Clarity'],
                        ['value' => 'Ads', 'label' => 'Performance Support'],
                        ['value' => 'YouTube', 'label' => 'Evergreen Reach'],
                    ],
                    [
                        ['title' => 'Channel fit', 'description' => 'A good video plan adapts to website, social, ads, and YouTube differently.'],
                        ['title' => 'Message sequencing', 'description' => 'Hooks, proof, and CTA timing matter far more than just visuals.'],
                        ['title' => 'Reuse potential', 'description' => 'One strong concept can often generate many platform-specific edits.'],
                        ['title' => 'Performance review', 'description' => 'View retention and downstream actions guide what to create next.'],
                    ],
                    [
                        ['title' => 'Message and format planning', 'description' => 'We identify what the video must communicate and where it will live.'],
                        ['title' => 'Creative direction', 'description' => 'Hooks, scene flow, and CTA choices are shaped around audience behavior.'],
                        ['title' => 'Publishing or campaign support', 'description' => 'The asset is aligned to the page, platform, or ad goal it should support.'],
                        ['title' => 'Engagement review', 'description' => 'We study watch behavior and outcomes to improve the next round.'],
                    ],
                    [
                        ['title' => 'Video concept direction', 'description' => 'A clearer understanding of what type of video to create and why.'],
                        ['title' => 'Hook and narrative plan', 'description' => 'Stronger openings and message sequencing for better retention.'],
                        ['title' => 'Platform adaptation notes', 'description' => 'Ways to reuse or resize content for different channels.'],
                        ['title' => 'Performance learning loop', 'description' => 'Useful takeaways from views, clicks, and engagement.'],
                    ],
                    [
                        'YouTube optimization' => $this->childData('YouTube Optimization', 'Improve channel structure, video discoverability, and audience retention with better metadata, packaging, and content planning.', ['Channel packaging', 'Thumbnail-title fit', 'Watch time support', 'Search and suggested visibility'], ['Audit channel structure and video packaging.', 'Improve titles, descriptions, playlists, and metadata.', 'Shape future videos for stronger retention and topical relevance.', 'Review views, watch time, and traffic sources.'], ['Channel optimization notes', 'Video packaging recommendations', 'Playlist strategy', 'Growth review points'], $this->faqsFor('YouTube Optimization')),
                        'Short-form video content' => $this->childData('Short-Form Video Content', 'Use reels, shorts, and snackable clips to reach attention faster and create more frequent audience touchpoints.', ['Fast hooks', 'Platform-native edits', 'Awareness building', 'Content consistency'], ['Identify repeatable content themes for short-form production.', 'Prepare hook styles, captions, and CTA rhythm.', 'Publish across suitable platforms with channel-specific adjustments.', 'Review retention and interaction to refine future concepts.'], ['Short-form content plan', 'Hook ideas', 'Editing direction', 'Platform reuse suggestions'], $this->faqsFor('Short-Form Video Content')),
                        'Video ads' => $this->childData('Video Ads', 'Turn video into a performance asset with messaging, sequencing, and CTA design built for paid promotion.', ['Paid creative fit', 'Offer clarity', 'Audience matching', 'Testing'], ['Define campaign goal and audience segment.', 'Prepare the video around hook, proof, and CTA balance.', 'Launch video ad tests with tracking in place.', 'Review cost, watch behavior, and post-click results.'], ['Video ad direction', 'Creative test ideas', 'Campaign fit notes', 'Optimization checkpoints'], $this->faqsFor('Video Ads')),
                    ]
                ),
                'conversion-rate-optimization' => $this->sectionData(
                    'Conversion Rate Optimization (CRO)',
                    'Better Conversion Journeys',
                    'CRO pages that focus on turning more visits into enquiries, sales, and qualified actions',
                    'CRO helps businesses get more value from existing traffic by improving page clarity, trust, friction points, and funnel logic.',
                    [
                        ['value' => 'UX', 'label' => 'Friction Reduction'],
                        ['value' => 'A/B', 'label' => 'Testing Mindset'],
                        ['value' => 'Funnels', 'label' => 'Journey Clarity'],
                        ['value' => 'Leads', 'label' => 'Quality Improvement'],
                    ],
                    [
                        ['title' => 'Offer clarity', 'description' => 'Visitors convert better when pages explain the value quickly and credibly.'],
                        ['title' => 'Friction removal', 'description' => 'Forms, layouts, and user steps are reviewed for confusion or hesitation.'],
                        ['title' => 'Testing culture', 'description' => 'Small but focused experiments help find stronger conversion paths.'],
                        ['title' => 'Page intent match', 'description' => 'Traffic source, landing page, and CTA should feel consistent.'],
                    ],
                    [
                        ['title' => 'Behavior and funnel review', 'description' => 'We study where users hesitate, drop, or fail to take the next step.'],
                        ['title' => 'Hypothesis planning', 'description' => 'Improvement ideas are prioritized based on likely business impact.'],
                        ['title' => 'Page and UX updates', 'description' => 'Layouts, copy, trust signals, or CTA flows are improved.'],
                        ['title' => 'Test and learn cycle', 'description' => 'Performance data informs what to keep, adjust, or test next.'],
                    ],
                    [
                        ['title' => 'Conversion improvement roadmap', 'description' => 'A clearer list of changes that can improve action rates.'],
                        ['title' => 'Landing page recommendations', 'description' => 'Design and content suggestions tied to user behavior.'],
                        ['title' => 'Funnel observations', 'description' => 'Useful notes on where the user journey is leaking value.'],
                        ['title' => 'Testing opportunities', 'description' => 'Priority experiments that are worth trying next.'],
                    ],
                    [
                        'Landing page design & testing' => $this->childData('Landing Page Design and Testing', 'Improve landing pages so they communicate value faster and guide users toward clearer next actions.', ['Offer presentation', 'Visual hierarchy', 'Trust-building content', 'CTA testing'], ['Review the current page against traffic intent and user action goals.', 'Improve structure, copy, proof, and CTA placements.', 'Test alternate layouts or message framing where useful.', 'Monitor conversion and engagement changes after updates.'], ['Landing page review notes', 'Design improvement ideas', 'CTA testing suggestions', 'Trust element recommendations'], $this->faqsFor('Landing Page Design and Testing')),
                        'A/B testing' => $this->childData('A/B Testing', 'Use controlled comparisons to learn which headlines, layouts, offers, or page elements improve response most reliably.', ['Test design', 'Hypothesis clarity', 'Variant comparison', 'Decision confidence'], ['Identify a measurable conversion question worth testing.', 'Create focused variants around one meaningful difference.', 'Run and monitor results with proper tracking.', 'Interpret outcomes and decide what to scale next.'], ['A/B test plan', 'Variant direction', 'Tracking checkpoints', 'Decision summary framework'], $this->faqsFor('A/B Testing')),
                        'Funnel optimization' => $this->childData('Funnel Optimization', 'Improve the full user journey from first click to final action so fewer qualified visitors drop off before converting.', ['Journey mapping', 'Drop-off analysis', 'Step simplification', 'Lead quality support'], ['Map the current funnel and major friction points.', 'Identify pages or steps causing hesitation or abandonment.', 'Improve transitions, messaging, and action clarity.', 'Review whether the funnel produces better outcomes after changes.'], ['Funnel review notes', 'Journey simplification ideas', 'Drop-off improvement plan', 'Next-step recommendations'], $this->faqsFor('Funnel Optimization')),
                    ]
                ),
                'analytics-reporting' => $this->sectionData(
                    'Analytics and Reporting',
                    'Measurement and Insight',
                    'Analytics pages that make campaign performance easier to track, explain, and improve',
                    'Without good measurement, teams either overreact to noise or miss what is actually moving the business. Reporting should create clarity, not confusion.',
                    [
                        ['value' => 'GA4', 'label' => 'Event Tracking'],
                        ['value' => 'Dashboards', 'label' => 'Visibility'],
                        ['value' => 'ROI', 'label' => 'Performance Focus'],
                        ['value' => 'Insights', 'label' => 'Decision Support'],
                    ],
                    [
                        ['title' => 'Tracking accuracy', 'description' => 'Events, forms, and campaign tags need to reflect real user actions properly.'],
                        ['title' => 'Readable dashboards', 'description' => 'Reporting should help teams act faster instead of drowning in metrics.'],
                        ['title' => 'Channel comparison', 'description' => 'You need to see which sources are efficient and which only look busy.'],
                        ['title' => 'Business relevance', 'description' => 'The right reports connect traffic to enquiries, sales, or qualified actions.'],
                    ],
                    [
                        ['title' => 'Measurement audit', 'description' => 'We review what is tracked, what is missing, and where data may be misleading.'],
                        ['title' => 'KPI definition', 'description' => 'Reporting is structured around useful business metrics, not vanity numbers alone.'],
                        ['title' => 'Dashboard and report setup', 'description' => 'Clear reporting layers are created for campaigns, channels, and outcomes.'],
                        ['title' => 'Insight review', 'description' => 'We translate performance into decisions about content, ads, pages, and budget.'],
                    ],
                    [
                        ['title' => 'Tracking setup notes', 'description' => 'A cleaner understanding of what should be measured and why.'],
                        ['title' => 'Dashboard direction', 'description' => 'A more practical structure for team or client reporting.'],
                        ['title' => 'KPI alignment', 'description' => 'Metrics organized around what success really means for the business.'],
                        ['title' => 'Insight checkpoints', 'description' => 'A reliable cadence for reviewing and acting on campaign data.'],
                    ],
                    [
                        'Google Analytics setup & monitoring' => $this->childData('Google Analytics Setup and Monitoring', 'Build cleaner tracking foundations so you can trust your traffic, event, and conversion data more confidently.', ['GA4 property setup', 'Event tracking', 'UTM discipline', 'Monitoring routines'], ['Review current analytics setup and major blind spots.', 'Configure events, goals, and meaningful traffic tagging.', 'Validate data against real user actions and forms.', 'Monitor reporting for anomalies and missed tracking.'], ['GA4 setup notes', 'Event mapping suggestions', 'UTM guidelines', 'Monitoring checklist'], $this->faqsFor('Google Analytics Setup and Monitoring')),
                        'Campaign performance reports' => $this->childData('Campaign Performance Reports', 'Turn campaign data into readable reports that explain spend, engagement, leads, and next recommendations clearly.', ['Cross-channel summaries', 'Visual reporting', 'Decision-ready insights', 'Performance storytelling'], ['Choose the key metrics decision-makers actually need.', 'Organize reports by objective, channel, and outcome.', 'Add context around wins, losses, and anomalies.', 'Use each report to guide the next campaign decisions.'], ['Reporting framework', 'Metric selection notes', 'Insight summary style', 'Review cadence suggestions'], $this->faqsFor('Campaign Performance Reports')),
                        'ROI tracking' => $this->childData('ROI Tracking', 'Connect marketing activity more closely with revenue, lead quality, and business return instead of only platform-level metrics.', ['Revenue linkage', 'Lead quality context', 'Attribution awareness', 'Budget efficiency'], ['Define what return should mean for your business.', 'Connect marketing inputs to revenue or qualified outcomes where possible.', 'Review weak attribution spots and proxy metrics.', 'Use the data to guide smarter budget decisions.'], ['ROI measurement notes', 'Attribution considerations', 'Lead-value alignment ideas', 'Budget review checkpoints'], $this->faqsFor('ROI Tracking')),
                    ]
                ),
                'online-reputation-management' => $this->sectionData(
                    'Online Reputation Management',
                    'Trust and Brand Perception',
                    'Reputation pages that help brands manage reviews, trust signals, and public perception more intentionally',
                    'Your online reputation shapes whether people trust the first click enough to enquire, call, or buy. This work supports both confidence and recovery.',
                    [
                        ['value' => 'Reviews', 'label' => 'Trust Signals'],
                        ['value' => 'Brand', 'label' => 'Perception Control'],
                        ['value' => 'Responses', 'label' => 'Engagement Care'],
                        ['value' => 'Search', 'label' => 'Credibility Support'],
                    ],
                    [
                        ['title' => 'Review visibility', 'description' => 'Ratings and public feedback often influence conversions before your sales team ever speaks.'],
                        ['title' => 'Response quality', 'description' => 'Timely and thoughtful handling of reviews affects how future customers judge the brand.'],
                        ['title' => 'Trust repair', 'description' => 'Negative sentiment needs a measured, constructive response approach.'],
                        ['title' => 'Positive reinforcement', 'description' => 'Good experiences should be encouraged into visible social proof.'],
                    ],
                    [
                        ['title' => 'Reputation audit', 'description' => 'We review public sentiment, review profiles, and visible brand search results.'],
                        ['title' => 'Response and improvement plan', 'description' => 'We define how feedback should be handled and where trust signals should improve.'],
                        ['title' => 'Review generation support', 'description' => 'We help create a healthier flow of positive, authentic customer feedback.'],
                        ['title' => 'Monitoring and adjustment', 'description' => 'Brand perception is reviewed continuously so issues are spotted earlier.'],
                    ],
                    [
                        ['title' => 'Reputation review summary', 'description' => 'A clear snapshot of how the brand currently appears online.'],
                        ['title' => 'Response guidance', 'description' => 'A more consistent approach to handling positive and negative feedback.'],
                        ['title' => 'Review generation ideas', 'description' => 'Practical ways to encourage more healthy social proof.'],
                        ['title' => 'Trust-building direction', 'description' => 'Simple steps that make the brand feel more credible online.'],
                    ],
                    [
                        'Review monitoring & response' => $this->childData('Review Monitoring and Response', 'Track new feedback consistently and respond in a way that protects trust while showing customer care publicly.', ['Review alerts', 'Response tone', 'Issue escalation', 'Public trust management'], ['Review current review platforms and response gaps.', 'Set response expectations and tone guidelines.', 'Monitor new reviews and support consistent handling.', 'Study repeated issues that need operational fixes too.'], ['Response tone notes', 'Monitoring checklist', 'Escalation guidance', 'Pattern review summary'], $this->faqsFor('Review Monitoring and Response')),
                        'Brand reputation building' => $this->childData('Brand Reputation Building', 'Strengthen how the brand is perceived online by combining positive signals, stronger messaging, and better trust reinforcement.', ['Trust reinforcement', 'Positive content signals', 'Search perception', 'Customer confidence'], ['Assess the visible trust signals shaping first impressions.', 'Build a plan for reviews, proof, and brand messaging improvements.', 'Support the rollout of positive reputation assets.', 'Review whether public perception is improving over time.'], ['Trust signal recommendations', 'Reputation asset ideas', 'Messaging notes', 'Progress review points'], $this->faqsFor('Brand Reputation Building')),
                    ]
                ),
                'mobile-marketing' => $this->sectionData(
                    'Mobile Marketing',
                    'Device-First Communication',
                    'Mobile marketing pages built for immediate, portable, and high-response communication',
                    'Mobile-first campaigns work well when they respect timing, context, and brevity while still guiding users to a clear next action.',
                    [
                        ['value' => 'SMS', 'label' => 'Fast Outreach'],
                        ['value' => 'Push', 'label' => 'Real-Time Nudges'],
                        ['value' => 'Apps', 'label' => 'Retention Support'],
                        ['value' => 'Mobile UX', 'label' => 'Action Speed'],
                    ],
                    [
                        ['title' => 'Immediate visibility', 'description' => 'Mobile notifications and messages are useful when the timing and offer are relevant.'],
                        ['title' => 'Compact messaging', 'description' => 'Short-form communication still needs clarity, trust, and action direction.'],
                        ['title' => 'Behavior triggers', 'description' => 'Good mobile campaigns react to user actions or context instead of blasting everyone equally.'],
                        ['title' => 'Experience alignment', 'description' => 'The landing or app experience must be smooth enough to support the message.'],
                    ],
                    [
                        ['title' => 'Mobile journey review', 'description' => 'We identify where mobile communication fits naturally into the customer path.'],
                        ['title' => 'Trigger and message planning', 'description' => 'Campaign logic is shaped around events, timing, and user context.'],
                        ['title' => 'Execution and delivery checks', 'description' => 'We support setup, copy direction, and mobile response readiness.'],
                        ['title' => 'Response analysis', 'description' => 'Open, click, and action behavior guide the next campaign adjustments.'],
                    ],
                    [
                        ['title' => 'Trigger-based messaging plan', 'description' => 'A more intentional use of mobile outreach instead of generic blasts.'],
                        ['title' => 'Short-form copy direction', 'description' => 'Messages structured for clarity and quick action.'],
                        ['title' => 'Landing readiness notes', 'description' => 'Mobile traffic is supported by faster, cleaner destination pages.'],
                        ['title' => 'Engagement review points', 'description' => 'Simple metrics that help improve the next round of outreach.'],
                    ],
                    [
                        'SMS campaigns' => $this->childData('SMS Campaigns', 'Use concise mobile messaging for reminders, offers, confirmations, and time-sensitive customer prompts.', ['Urgency-based messaging', 'Delivery timing', 'Offer clarity', 'Action-driven copy'], ['Identify the moments where SMS adds value instead of noise.', 'Write compact messages with strong timing and CTA clarity.', 'Launch campaigns around promotions, reminders, or updates.', 'Review delivery, click, and response trends.'], ['SMS campaign plan', 'Short-copy ideas', 'Timing recommendations', 'Response review notes'], $this->faqsFor('SMS Campaigns')),
                        'Push notifications' => $this->childData('Push Notifications', 'Re-engage users with app or browser notifications tied to actions, inactivity, or important updates.', ['Behavior triggers', 'Retention reminders', 'Contextual offers', 'Reactivation support'], ['Review available trigger moments and user states.', 'Plan message variants for different scenarios.', 'Launch push flows with thoughtful frequency controls.', 'Monitor opens, sessions, and action follow-through.'], ['Push trigger map', 'Message ideas', 'Frequency guidance', 'Engagement checkpoints'], $this->faqsFor('Push Notifications')),
                        'In-app advertising' => $this->childData('In-App Advertising', 'Reach users through mobile app environments with creative and placements tailored to in-app behavior.', ['Placement fit', 'Creative adaptation', 'Audience targeting', 'Campaign goals'], ['Define whether in-app ads support awareness, installs, or conversions.', 'Choose targeting and placements based on user behavior.', 'Prepare creatives that fit mobile attention spans.', 'Review reach, interaction, and conversion quality.'], ['In-app ad strategy notes', 'Placement recommendations', 'Creative guidance', 'Performance review points'], $this->faqsFor('In-App Advertising')),
                    ]
                ),
            ],
        ];
    }

    private function sectionData(
        string $title,
        string $heroBadge,
        string $heroTitle,
        string $heroDescription,
        array $statCards,
        array $pillars,
        array $process,
        array $deliverables,
        array $children
    ): array {
        return [
            'title' => $title,
            'meta_description' => Str::of($heroDescription)->limit(155, ''),
            'hero_badge' => $heroBadge,
            'hero_title' => $heroTitle,
            'hero_description' => $heroDescription,
            'summary' => $heroDescription,
            'stat_cards' => $statCards,
            'pillars' => $pillars,
            'process' => $process,
            'deliverables' => $deliverables,
            'faqs' => $this->faqsFor($title),
            'children' => collect($children)
                ->mapWithKeys(fn(array $child, string $label) => [Str::slug($label) => $child])
                ->all(),
        ];
    }

    private function childData(string $title, string $description, array $focus, array $workflow, array $deliverables, array $faqs): array
    {
        return [
            'title' => $title,
            'description' => $description,
            'meta_description' => Str::of($description)->limit(155, ''),
            'focus' => $focus,
            'workflow' => $workflow,
            'deliverables' => $deliverables,
            'faqs' => $faqs,
            'hero_badge' => 'Focused Delivery Page',
        ];
    }

    private function faqsFor(string $topic): array
    {
        return [
            [
                'question' => 'How do you approach ' . $topic . '?',
                'answer' => 'We shape ' . Str::lower($topic) . ' around your audience, offer, and conversion goals so the work supports real business outcomes instead of generic activity.',
            ],
            [
                'question' => 'Can this service work with our other marketing channels?',
                'answer' => 'Yes. This page is designed as part of a broader digital marketing structure, so the service can connect with SEO, paid campaigns, content, landing pages, and reporting.',
            ],
            [
                'question' => 'Do you provide planning as well as execution?',
                'answer' => 'Yes. We can help with strategy, setup, launch guidance, optimization, and reporting depending on how hands-on your team needs us to be.',
            ],
        ];
    }
}
