<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.site_name_ar', 'موقعي');
        $this->migrator->add('general.site_name_en', 'My website');
        $this->migrator->add('general.logo', 'This is my website');
        $this->migrator->add('general.favicon', 'This is my website');


        //Hero Section
        $this->migrator->add('general.hero_desc_one_ar', 'التحول الرقمي للبنية التحتية من خلال الذكاء الجغرافي والابتكار الهندسي');
        $this->migrator->add('general.hero_desc_one_en', 'Digital transformation of infrastructure through geographical intelligence and engineering innovation');
        $this->migrator->add('general.hero_desc_two_ar', 'نقل البيانات المكانية إلى حلول عملية متكاملة، من التصميم إلى إدارة دورة حياة المشروع عبر نظم المعلومات الجغرافية ونمذجة معلومات البناء والتوائم الرقمية.');
        $this->migrator->add('general.hero_desc_two_en', 'Transfer spatial data to integrated practical solutions, from design to project life cycle management via GIS and BIM and digital twins.');
        $this->migrator->add('general.hero_media', 'This is my website');
        //End Hero Section


        //About Section
        $this->migrator->add('general.about_title_ar', 'شريكك الاستراتيجي للتحول الرقمي والبنية التحتية الذكية');
        $this->migrator->add('general.about_title_en', 'Your strategic partner for digital transformation and smart infrastructure');
        $this->migrator->add('general.about_desc_ar', 'شركة رائدة في تقديم حلول البنية التحتية الذكية والتحول الرقمي، حيث نعمل على تصميم وإدارة المنشآت والمدن الذكية باستخدام أحدث تقنيات نظم المعلومات الجغرافية ونمذجة معلومات البناء والتوائم الرقمية، لمساعدة المؤسسات والهيئات على رفع الكفاءة. التحليل المكاني والميداني، إلى إدارة دورة حياة المشروع من خلال لوحات التحكم التفاعلية والحلول الرقمية المتقدمة.');
        $this->migrator->add('general.about_desc_en', 'A leading Egyptian company in providing smart infrastructure solutions and digital transformation, where we are working to design and manage smart facilities and cities using the latest GIS and BIM technologies and digital twins, to help institutions and bodies to raise the efficiency . Field and spatial analysis, to the project life cycle management through interactive control panels and advanced digital solutions .');
        $this->migrator->add('general.our_mission_ar', 'التحول الرقمي لدفع البنية التحتية من خلال حلول ذكية مدفوعة بالبيانات المكانية، ونمذجة معلومات البناء والتوائم الرقمية لرفع كفاءة التخطيط والتنفيذ والمتابعة.');
        $this->migrator->add('general.our_mission_en', 'Digital Transformation Driving of Infrastructure through smart solutions driven by spatial data, BIM and Digital Twin to raise the efficiency of planning, implementation and follow -up .');
        $this->migrator->add('general.our_vision_ar', 'أن نكون الشريك الاستراتيجي الرائد في التحول الرقمي والبنية التحتية الذكية في مصر والمنطقة.');
        $this->migrator->add('general.our_vision_en', 'To be the leading strategic partner in digital transformation and smart infrastructure in Egypt and the region.');
        $this->migrator->add('general.our_goals_en', 'هدفنا هو تمكين المؤسسات من خلال حلول ذكية مدفوعة بالبيانات المكانية، ونمذجة معلومات البناء والتوائم الرقمية لتعزيز كفاءة التخطيط والتنفيذ والمتابعة.');
        $this->migrator->add('general.our_goals_ar', 'هدفنا هو تمكين المؤسسات من خلال حلول ذكية مدفوعة بالبيانات المكانية، ونمذجة معلومات البناء والتوائم الرقمية لتعزيز كفاءة التخطيط والتنفيذ والمتابعة.');
        $this->migrator->add('general.about_image', 'This is my website');
        //End About Section


        // Title Pages
        $this->migrator->add('general.services_title_ar', 'حلول هندسية ورقمية متكاملة');
        $this->migrator->add('general.services_title_en', 'Integrated engineering and digital solutions');
        $this->migrator->add('general.projects_title_ar', 'بصمة واضحة في البنية التحتية والمدن الذكية');
        $this->migrator->add('general.projects_title_en', 'A clear imprint in infrastructure and smart cities');
        $this->migrator->add('general.team_title_ar', 'تجارب متكاملة تصنع الفرق');
        $this->migrator->add('general.team_title_en', 'Integrated experiences make the difference');
        $this->migrator->add('general.careers_title_ar', 'اكتشف فرص العمل');
        $this->migrator->add('general.careers_title_en', 'Discover career opportunities');
        $this->migrator->add('general.blog_title_ar', 'تابع أحدث المقالات والأخبار');
        $this->migrator->add('general.blog_title_en', 'Keep update with our blog posts');
        $this->migrator->add('general.values_title_ar', 'نبني مستقبلًا أفضل معًا');
        $this->migrator->add('general.values_title_en', 'Building a better future together');
        $this->migrator->add('general.technology_span_ar', 'تقنيتنا');
        $this->migrator->add('general.technology_span_en', 'Our tech');
        $this->migrator->add('general.technology_title_ar', 'تمكين التقدم من خلال الابتكار');
        $this->migrator->add('general.technology_title_en', 'Empowering Progress Through Innovation');
        $this->migrator->add('general.technology_desc_ar', 'نحن نعتمد على أحدث الأدوات والبرمجيات والحلول الهندسية لتقديم نتائج أكثر ذكاءً وسرعة واستدامة. تضمن أساسنا التكنولوجي الكفاءة والدقة والابتكار في كل مشروع.');
        $this->migrator->add('general.technology_desc_en', 'We rely on cutting-edge tools, software, and engineering solutions to deliver smarter, faster, and more sustainable results. Our technological foundation ensures efficiency, accuracy, and innovation in every project.');
        $this->migrator->add('general.technology_image', 'This is my website');
        $this->migrator->add('general.principles_title_ar', 'قيم توجيهية تشكل مسؤولياتنا');
        $this->migrator->add('general.principles_title_en', 'Guiding values that shape our responsibilities');
        $this->migrator->add('general.contact_title_ar', 'نود أن نسمع منك! املأ النموذج أدناه وسيتواصل معك فريقنا في أقرب وقت ممكن');
        $this->migrator->add('general.contact_title_en', 'We’d love to hear from you! Fill out the form below and our team will get back to you shortly');


        // End Title Pages

        // Banner Pages
        $this->migrator->add('general.span_banner_ar', 'ابدأ الآن');
        $this->migrator->add('general.span_banner_en', 'Start Now');
        $this->migrator->add('general.title_banner_ar', 'دعونا نبني رؤيتك معًا');
        $this->migrator->add('general.title_banner_en', 'Let’s Build Your Vision Together');
        $this->migrator->add('general.desc_banner_ar', 'سواء كنت تبحث عن حلول هندسية مبتكرة، أو التحول الرقمي، أو خبرة في نظم المعلومات الجغرافية، فإن فريقنا جاهز لدعم أهدافك. تواصل معنا اليوم ولنصنع شيئًا رائعًا معًا.');
        $this->migrator->add('general.desc_banner_en', 'Whether you’re looking for innovative engineering solutions, digital transformation, or GIS expertise, our team is ready to support your goals. Reach out today and let’s build something remarkable.');
        // End Banner Pages



        $this->migrator->add('general.phone', '');
        $this->migrator->add('general.email', '');
        $this->migrator->add('general.whatsapp', '');
        $this->migrator->add('general.facebook', '');
        $this->migrator->add('general.linkedin', '');
        $this->migrator->add('general.twitter', '');
        $this->migrator->add('general.instagram', '');
        $this->migrator->add('general.address', '');
        $this->migrator->add('general.location', '');







        $this->migrator->add('general.policy_desc_ar', '');
        $this->migrator->add('general.policy_desc_en', '');
    }
};
