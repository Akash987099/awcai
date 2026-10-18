<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function webDevelopment(){
        return view('services.web-development');
    }

    public function appDevelopment(){
        return view('services.app-development');
    }

    public function uiDevelopment(){
        return view('services.ui-ux-development');
    }

    public function businessSoftware(string $service)
    {
        $pages = [
            'software-development' => [
                'seoTitle' => 'Custom Software Development Company in Agra | Arya Web Coding',
                'metaDescription' => 'Custom software development company in Agra for business automation, web applications, portals, ERP, CRM and scalable digital products.',
                'metaKeywords' => 'software development company in Agra, custom software development Agra, business software, web application development, ERP software Agra',
                'pageTitle' => 'Custom Software Development in Agra',
                'heroTag' => 'Business Automation and Digital Products',
                'heroTitle' => 'Custom software that simplifies the way your business works',
                'heroDescription' => 'Arya Web Coding builds secure, practical software for Agra businesses—from internal dashboards and automation tools to portals, ERP modules and customer-facing web applications.',
                'highlights' => [['fas fa-cogs', 'Business Process Automation', 'Replace repetitive spreadsheets and manual tasks with reliable workflows.'], ['fas fa-window-maximize', 'Custom Web Applications', 'Purpose-built software for customers, teams, operations and reporting.'], ['fas fa-chart-line', 'ERP and Reporting Modules', 'Bring sales, inventory, accounts and operations data into one clear view.'], ['fas fa-plug', 'API and System Integrations', 'Connect payments, messaging, accounting and third-party systems safely.'], ['fas fa-shield-alt', 'Secure Role-Based Access', 'Give each team member the right access to the right information.'], ['fas fa-tools', 'Ongoing Support', 'Get improvements, maintenance and help as your business grows.']],
                'faqs' => [['Can you build software for our exact workflow?', 'Yes. We first understand your process, users and data needs, then plan software around the way your team actually works.'], ['Do you develop web-based business software?', 'Yes. We build responsive browser-based software that your authorized team can access on desktop and mobile devices.'], ['Can the software be expanded later?', 'Yes. We design modules and data structures to support future features, integrations and more users.']],
            ],
            'crm-development' => [
                'seoTitle' => 'Custom CRM Development Company in Agra | Arya Web Coding',
                'metaDescription' => 'Custom CRM development in Agra for lead management, sales pipelines, customer follow-ups, team dashboards, reporting and business automation.',
                'metaKeywords' => 'CRM development company in Agra, custom CRM software Agra, lead management software, sales CRM, customer management system',
                'pageTitle' => 'Custom CRM Development in Agra',
                'heroTag' => 'Leads, Sales and Customer Relationships',
                'heroTitle' => 'Keep every lead, follow-up, and customer conversation organized',
                'heroDescription' => 'We build CRM systems that help sales and service teams in Agra capture leads, manage pipelines, schedule follow-ups and make better decisions from one dashboard.',
                'highlights' => [['fas fa-user-plus', 'Lead Capture and Assignment', 'Collect website, campaign and manual leads and route them to the right team member.'], ['fas fa-filter', 'Sales Pipeline Management', 'Track prospects from first enquiry through quotation, conversion and follow-up.'], ['fas fa-bell', 'Follow-up Reminders', 'Help your team respond on time with tasks, notes and activity history.'], ['fas fa-users', 'Customer Profiles', 'Keep contacts, requirements, documents and conversation history in one place.'], ['fas fa-chart-bar', 'Sales Reports and Dashboards', 'See source-wise leads, team activity, conversion movement and performance clearly.'], ['fas fa-mobile-alt', 'Mobile-Friendly Access', 'Give authorized teams practical access to CRM information while they work.']],
                'faqs' => [['Can the CRM connect to our website enquiry form?', 'Yes. We can connect website forms and selected campaign sources so new enquiries reach your CRM quickly.'], ['Can different users have different permissions?', 'Yes. Role-based access can be configured for sales, managers, support and administrators.'], ['Can you migrate data from Excel?', 'Yes. After reviewing the data quality and fields, we can plan a safe import from spreadsheets or another system.']],
            ],
            'hrm-software' => [
                'seoTitle' => 'HRM Software Development Company in Agra | Arya Web Coding',
                'metaDescription' => 'Custom HRM software development in Agra for employee records, attendance, leave, payroll workflows, recruitment and HR reporting.',
                'metaKeywords' => 'HRM software company in Agra, HR software development Agra, employee management software, attendance and leave management, payroll software',
                'pageTitle' => 'Custom HRM Software Development in Agra',
                'heroTag' => 'Employee and Workforce Management',
                'heroTitle' => 'Make everyday HR work easier to manage',
                'heroDescription' => 'Arya Web Coding creates HRM software for employee records, attendance, leave, approvals, payroll workflows and reports—shaped around the needs of your organization.',
                'highlights' => [['fas fa-id-badge', 'Employee Information Management', 'Maintain organized employee profiles, documents, roles and employment details.'], ['fas fa-calendar-check', 'Attendance and Leave Workflows', 'Handle attendance records, leave requests, approvals and team calendars in one system.'], ['fas fa-money-check-alt', 'Payroll-Ready Processes', 'Prepare attendance, allowances and deductions data for your payroll workflow.'], ['fas fa-user-clock', 'Shift and Task Visibility', 'Give managers a clearer view of teams, shifts, assignments and approvals.'], ['fas fa-file-alt', 'HR Documents and Policies', 'Centralize letters, documents, policy acknowledgements and essential records.'], ['fas fa-chart-pie', 'HR Reports', 'Review headcount, leave, attendance and other workforce information when needed.']],
                'faqs' => [['Can HRM software be customized for our leave rules?', 'Yes. Leave types, approval paths, attendance logic and employee fields can be planned around your organization.'], ['Does the system support different employee roles?', 'Yes. HR teams, managers and employees can have separate permissions and views.'], ['Can HRM software integrate with biometric attendance?', 'Integration depends on your device or provider API. We can assess compatibility before planning the work.']],
            ],
        ];

        abort_unless(isset($pages[$service]), 404);
        $page = $pages[$service];
        $page['canonical'] = route('service.business-software', ['service' => $service]);
        $page['serviceHighlights'] = array_map(fn ($item) => ['icon' => $item[0], 'title' => $item[1], 'description' => $item[2]], $page['highlights']);
        $page['heroStats'] = [['value' => 'Custom', 'label' => 'Built', 'text' => 'Designed around your workflow.'], ['value' => 'Secure', 'label' => 'Access', 'text' => 'Role-based user controls.'], ['value' => 'Scalable', 'label' => 'Growth', 'text' => 'Ready for future modules.']];
        $page['processSteps'] = [['title' => 'Workflow Discovery', 'description' => 'We map users, current processes, data and the outcome you need.'], ['title' => 'Solution Planning', 'description' => 'We define features, screens, roles, priorities and the implementation plan.'], ['title' => 'Build and Test', 'description' => 'We develop the solution in stages and test key workflows with your feedback.'], ['title' => 'Launch and Improve', 'description' => 'We support rollout, team adoption and future improvements after launch.']];
        $page['deliverables'] = [['title' => 'Requirement-led solution', 'description' => 'Features selected around your operational needs and priorities.'], ['title' => 'Clear user roles', 'description' => 'Access levels that keep sensitive business information controlled.'], ['title' => 'Practical dashboards', 'description' => 'Useful visibility for day-to-day teams and decision makers.'], ['title' => 'Documentation and support', 'description' => 'Guidance for launch and a path for ongoing improvements.']];
        $page['industries'] = ['Healthcare', 'Education', 'Real Estate', 'Retail', 'Manufacturing', 'Professional Services', 'Startups', 'Local Businesses'];
        $page['ctaTitle'] = 'Need a system that fits your business process?';
        $page['ctaDescription'] = 'Tell us what you want to manage, automate or improve. Our Agra team will help you scope the right software solution.';

        return view('services.business-software', compact('page'));
    }
}
