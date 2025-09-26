<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    // Site
    public string $site_name_ar;
    public string $site_name_en;
    public string $logo;
    public string $favicon;

    // Hero Section
    public string $hero_desc_one_ar;
    public string $hero_desc_one_en;
    public string $hero_desc_two_ar;
    public string $hero_desc_two_en;
    public string $hero_media;

    // About Section
    public string $about_title_ar;
    public string $about_title_en;
    public string $about_desc_ar;
    public string $about_desc_en;
    public string $our_mission_ar;
    public string $our_mission_en;
    public string $our_vision_ar;
    public string $our_vision_en;
    public string $our_goals_ar;
    public string $our_goals_en;
    public string $about_image;

    // Title Pages
    public string $services_title_ar;
    public string $services_title_en;
    public string $projects_title_ar;
    public string $projects_title_en;
    public string $team_title_ar;
    public string $team_title_en;
    public string $careers_title_ar;
    public string $careers_title_en;
    public string $blog_title_ar;
    public string $blog_title_en;
    public string $values_title_ar;
    public string $values_title_en;
    public string $technology_span_ar;
    public string $technology_span_en;
    public string $technology_title_ar;
    public string $technology_title_en;
    public string $technology_desc_ar;
    public string $technology_desc_en;
    public string $technology_image;
    public string $principles_title_ar;
    public string $principles_title_en;
    public string $contact_title_ar;
    public string $contact_title_en;

    // Banner Pages
    public string $span_banner_ar;
    public string $span_banner_en;
    public string $title_banner_ar;
    public string $title_banner_en;
    public string $desc_banner_ar;
    public string $desc_banner_en;

    // Contact & Links
    public string $phone;
    public string $email;
    public string $whatsapp;
    public string $facebook;
    public string $linkedin;
    public string $twitter;
    public string $instagram;
    public string $address;
    public string|array $location;

    // Policy
    public string $policy_desc_ar;
    public string $policy_desc_en;

    public static function group(): string
    {
        return 'general';
    }
}
