<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\ServiceDetail;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SerivcesSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Service::query()->truncate();
        ServiceDetail::query()->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $data = [
            [
                'name_ar' => 'التوأم الرقمي',
                'name_en' => 'Digital twin',
                'slug' => 'digital-twin',
                'short_desc_ar' => 'إنشاء نماذج رقمية حية تعكس الواقع لدعم اتخاذ القرار في تشغيل وإدارة المشاريع.',
                'short_desc_en' => 'Create live digital models that reflect reality to support decision-making in project operations and management.',
                'long_desc_ar' => 'نماذج رقمية متطورة تساعد على تقليل المخاطر وتحسين الكفاءة التشغيلية.',
                'long_desc_en' => 'Advanced digital models that help reduce risks and improve operational efficiency.',
                'image' => 'digital-twin.png',
                'details' => [
                    [
                        'name_ar' => 'إدارة المرافق',
                        'name_en' => 'Facilities management',
                        'desc_ar' => 'إدارة وتشغيل المرافق الحيوية باستخدام النظم الرقمية.',
                        'desc_en' => 'Managing and operating critical facilities using digital systems.',
                        'icon' => 'facility.png'
                    ],
                    [
                        'name_ar' => 'محاكاة الأداء',
                        'name_en' => 'Performance simulation',
                        'desc_ar' => 'إجراء محاكاة للأداء المتوقع بناءً على البيانات الفعلية.',
                        'desc_en' => 'Simulating expected performance based on real-time data.',
                        'icon' => 'simulation.png'
                    ],
                ]
            ],
            [
                'name_ar' => 'إدارة الشبكات الذكية',
                'name_en' => 'Smart network management',
                'slug' => 'smart-network-management',
                'short_desc_ar' => 'حلول متكاملة لإدارة شبكات الكهرباء والمياه والاتصالات.',
                'short_desc_en' => 'Integrated solutions for managing electricity, water, and communication networks.',
                'long_desc_ar' => 'توظيف الذكاء الاصطناعي لتحليل وإدارة الشبكات بكفاءة عالية.',
                'long_desc_en' => 'Using AI to analyze and manage networks with high efficiency.',
                'image' => 'smart-network.png',
                'details' => [
                    [
                        'name_ar' => 'تحليل الاستهلاك',
                        'name_en' => 'Consumption analysis',
                        'desc_ar' => 'تحليل بيانات الاستهلاك وتحسين توزيع الموارد.',
                        'desc_en' => 'Analyzing consumption data and optimizing resource distribution.',
                        'icon' => 'consumption.png'
                    ],
                    [
                        'name_ar' => 'كشف الأعطال',
                        'name_en' => 'Fault detection',
                        'desc_ar' => 'رصد الأعطال بشكل آلي باستخدام تقنيات الاستشعار.',
                        'desc_en' => 'Automatic fault detection using sensor technologies.',
                        'icon' => 'fault.png'
                    ],
                ]
            ],
            [
                'name_ar' => 'التحول الرقمي باستخدام GIS وBIM',
                'name_en' => 'Digital transformation using GIS and BIM',
                'slug' => 'digital-transformation-gis-bim',
                'short_desc_ar' => 'دمج تقنيات نظم المعلومات الجغرافية ونمذجة المباني.',
                'short_desc_en' => 'Integrating GIS and BIM technologies for smart project solutions.',
                'long_desc_ar' => 'حلول مبتكرة لتحسين تخطيط المشاريع والبنية التحتية.',
                'long_desc_en' => 'Innovative solutions for enhancing project planning and infrastructure.',
                'image' => 'gis-bim.png',
                'details' => [
                    [
                        'name_ar' => 'التصميم الذكي',
                        'name_en' => 'Smart design',
                        'desc_ar' => 'تصميم المشاريع باستخدام البيانات المكانية.',
                        'desc_en' => 'Designing projects using spatial data.',
                        'icon' => 'design.png'
                    ],
                    [
                        'name_ar' => 'إدارة دورة الحياة',
                        'name_en' => 'Lifecycle management',
                        'desc_ar' => 'إدارة المشروع من الفكرة حتى التشغيل.',
                        'desc_en' => 'Managing the project from concept to operation.',
                        'icon' => 'lifecycle.png'
                    ],
                ]
            ],
            [
                'name_ar' => 'خدمات الحقول وتجميع البيانات',
                'name_en' => 'Field services and data collection',
                'slug' => 'field-services-data-collection',
                'short_desc_ar' => 'فِرق متخصصة لجمع البيانات الميدانية بدقة عالية.',
                'short_desc_en' => 'Specialized teams to collect field data with high accuracy.',
                'long_desc_ar' => 'توظيف أحدث التقنيات وأجهزة الاستشعار للحصول على بيانات دقيقة.',
                'long_desc_en' => 'Using the latest technologies and sensors to obtain accurate data.',
                'image' => 'field-services.png',
                'details' => [
                    [
                        'name_ar' => 'المسح الميداني',
                        'name_en' => 'Field survey',
                        'desc_ar' => 'تنفيذ مسوحات دقيقة باستخدام أجهزة GPS.',
                        'desc_en' => 'Conducting precise surveys using GPS devices.',
                        'icon' => 'survey.png'
                    ],
                    [
                        'name_ar' => 'التصوير الجوي',
                        'name_en' => 'Aerial imaging',
                        'desc_ar' => 'استخدام الطائرات بدون طيار لجمع البيانات.',
                        'desc_en' => 'Using drones to collect aerial data.',
                        'icon' => 'drone.png'
                    ],
                ]
            ],
            [
                'name_ar' => 'الخرائط الذكية والتحليل المكاني',
                'name_en' => 'Smart maps and spatial analysis',
                'slug' => 'smart-maps-spatial-analysis',
                'short_desc_ar' => 'خرائط تفاعلية وتحليلات مكانية متقدمة لدعم القرارات.',
                'short_desc_en' => 'Interactive maps and advanced spatial analysis for decision support.',
                'long_desc_ar' => 'توفير لوحات تحكم ذكية لمتابعة المشاريع وتحليل البيانات.',
                'long_desc_en' => 'Providing smart dashboards for project monitoring and data analysis.',
                'image' => 'smart-maps.png',
                'details' => [
                    [
                        'name_ar' => 'لوحات تحكم تفاعلية',
                        'name_en' => 'Interactive dashboards',
                        'desc_ar' => 'عرض البيانات الجغرافية بشكل تفاعلي.',
                        'desc_en' => 'Displaying geographic data interactively.',
                        'icon' => 'dashboard.png'
                    ],
                    [
                        'name_ar' => 'التحليل التنبؤي',
                        'name_en' => 'Predictive analysis',
                        'desc_ar' => 'استخدام الذكاء الاصطناعي للتنبؤ بالأنماط المكانية.',
                        'desc_en' => 'Using AI to predict spatial patterns.',
                        'icon' => 'predictive.png'
                    ],
                ]
            ],
        ];

        foreach ($data as $item) {
            $service = Service::create([
                'name_ar' => $item['name_ar'],
                'name_en' => $item['name_en'],
                'slug' => $item['slug'],
                'short_desc_ar' => $item['short_desc_ar'],
                'short_desc_en' => $item['short_desc_en'],
                'long_desc_ar' => $item['long_desc_ar'],
                'long_desc_en' => $item['long_desc_en'],
                'image' => $item['image'],
            ]);

            foreach ($item['details'] as $detail) {
                ServiceDetail::create([
                    'name_ar' => $detail['name_ar'],
                    'name_en' => $detail['name_en'],
                    'desc_ar' => $detail['desc_ar'],
                    'desc_en' => $detail['desc_en'],
                    'icon' => $detail['icon'],
                    'service_id' => $service->id,
                ]);
            }
        }
    }
}
