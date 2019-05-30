<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('settings')->delete();
        
        \DB::table('settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'about',
                'type' => 'textarea',
                'ar_value' => '<p style="direction: rtl;">النص عربي&nbsp;&nbsp;النص عربي&nbsp;&nbsp;النص عربي&nbsp;&nbsp;النص عربي&nbsp;&nbsp;النص عربي&amp;nعربي&nbsp;&nbsp;النص عربي&nbsp;&nbsp;النص عربي&nbsp;&nbsp;النص عربي&nbsp;&nbsp;النص عربي&nbsp;&nbsp;النص عربي&nbsp;&nbsp;النص عربي&nbsp;&nbsp;النص عربي&nbsp;&nbsp;النص عربي&nbsp;&nbsp;النص عربي&nbsp;&nbsp;النص عربي&nbsp;&nbsp;النص عربي&nbsp;&nbsp;النص عربي&nbsp;&nbsp;النص عربي&nbsp;&nbsp;النص عربي&nbsp;&nbsp;النص عربي&nbsp; &nbsp;&nbsp;</p>',
                'en_value' => '<p>english value&nbsp;english value&nbsp;english value&nbsp;english value&nbsp;english value&nbsp;english value&nbsp;english value&nbsp;english value&nbsp;english value&nbsp;english value&nbsp;english value&nbsp;english value&nbsp;english value&amp; value&nbsp;english value&nbsp;english value&nbsp;english &nbsp;english value&nbsp;english value&nbsp;english value&nbsp;english value&nbsp;english value&nbsp;english value&nbsp;english value&nbsp;english value&nbsp;english value&nbsp;english value&nbsp;english value&nbsp;english value&nbsp;english value&nbsp;english value&nbsp;english value&nbsp;english value&nbsp;english value&nbsp;english value&nbsp;english value&nbsp;english value&nbsp;english value&nbsp;english value&nbsp;english value&nbsp;english value&nbsp;english value&nbsp;english value&nbsp;</p>',
                'page' => 'الإعدادات العامة',
                'slug' => 'general',
                'title' => 'من نحن',
                'created_at' => NULL,
                'updated_at' => '2019-05-30 12:06:43',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'terms',
                'type' => 'textarea',
                'ar_value' => '<p style="direction: rtl;">الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;الشروط و الأحكام...&nbsp;</p>',
                'en_value' => '<p style="direction: ltr;">terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;terms and conditions&nbsp;..&nbsp;</p>',
                'page' => 'الإعدادات العامة',
                'slug' => 'general',
                'title' => 'الشروط و الأحكام',
                'created_at' => NULL,
                'updated_at' => '2019-05-30 12:06:43',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'privacy',
                'type' => 'textarea',
                'ar_value' => '<p>سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية سياسة الخصوصية</p>',
                'en_value' => '<p>privacy polices privacy polices privacy polices privacy polices privacy polices privacy polices privacy polices privacy polices privacy polices privacy polices privacy polices privacy polices privacy polices privacy polices privacy polices privacy polices privacy polices privacy polices privacy polices privacy polices privacy polices privacy polices privacy polices privacy polices privacy polices privacy polices</p>',
                'page' => 'الإعدادات العامة',
                'slug' => 'general',
                'title' => 'شروط الخصوصية',
                'created_at' => NULL,
                'updated_at' => '2019-05-30 12:06:43',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'facebook',
                'type' => 'url',
                'ar_value' => 'Culpa consectetur o',
                'en_value' => 'Culpa consectetur o',
                'page' => 'الإعدادات العامة',
                'slug' => 'general',
                'title' => 'رابط فيسبوك',
                'created_at' => NULL,
                'updated_at' => '2019-05-30 12:06:43',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'twitter',
                'type' => 'url',
                'ar_value' => 'Est accusantium mini',
                'en_value' => 'Est accusantium mini',
                'page' => 'الإعدادات العامة',
                'slug' => 'general',
                'title' => 'رابط تويتر',
                'created_at' => NULL,
                'updated_at' => '2019-05-30 12:06:43',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'instagram',
                'type' => 'url',
                'ar_value' => 'Reprehenderit exerci',
                'en_value' => 'Reprehenderit exerci',
                'page' => 'الإعدادات العامة',
                'slug' => 'general',
                'title' => 'رابط إنستجرام',
                'created_at' => NULL,
                'updated_at' => '2019-05-30 12:06:43',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'snapchat',
                'type' => 'url',
                'ar_value' => 'Vitae in minima cons',
                'en_value' => 'Vitae in minima cons',
                'page' => 'الإعدادات العامة',
                'slug' => 'general',
                'title' => 'رابط سناب شات',
                'created_at' => NULL,
                'updated_at' => '2019-05-30 12:06:43',
            ),
            7 => 
            array (
                'id' => 14,
                'name' => 'address',
                'type' => 'url',
                'ar_value' => 'Sint Nam commodi qu',
                'en_value' => 'Sint Nam commodi qu',
                'page' => 'الإعدادات العامة',
                'slug' => 'general',
                'title' => 'العنوان',
                'created_at' => NULL,
                'updated_at' => '2019-05-30 12:06:43',
            ),
            8 => 
            array (
                'id' => 15,
                'name' => 'phone',
                'type' => 'url',
                'ar_value' => '0599654782',
                'en_value' => '0599654782',
                'page' => 'الإعدادات العامة',
                'slug' => 'general',
                'title' => 'رقم التواصل',
                'created_at' => NULL,
                'updated_at' => '2019-05-30 12:06:43',
            ),
            9 => 
            array (
                'id' => 16,
                'name' => 'email',
                'type' => 'url',
                'ar_value' => 'asd@asd.com',
                'en_value' => 'asd@asd.com',
                'page' => 'الإعدادات العامة',
                'slug' => 'general',
                'title' => 'البريد الإلكتروني',
                'created_at' => NULL,
                'updated_at' => '2019-05-30 12:06:43',
            ),
            10 => 
            array (
                'id' => 17,
                'name' => 'whatsapp',
                'type' => 'url',
                'ar_value' => '05593654123',
                'en_value' => '05593654123',
                'page' => 'الإعدادات العامة',
                'slug' => 'general',
                'title' => 'واتس أب',
                'created_at' => NULL,
                'updated_at' => '2019-05-30 12:06:43',
            ),
            11 => 
            array (
                'id' => 18,
                'name' => 'google+',
                'type' => 'url',
                'ar_value' => 'google.com',
                'en_value' => 'google.com',
                'page' => 'الإعدادات العامة',
                'slug' => 'general',
                'title' => 'GOOGLE+',
                'created_at' => NULL,
                'updated_at' => '2019-05-30 12:06:43',
            ),
        ));
        
        
    }
}