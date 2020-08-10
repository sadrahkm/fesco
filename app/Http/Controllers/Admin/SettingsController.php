<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Option;
use App\Utility\OptionsOp;
use App\Utility\SaveOptions;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function header()
    {
        $options = OptionsOp::RetrvieData('header');
        return view('admin.settings.header', compact('options'));
    }

    public function aboutUs()
    {
        $options = OptionsOp::RetrvieData('about');
        return view('admin.settings.aboutUs', compact('options'));
    }

    public function specials()
    {
        $options = OptionsOp::RetrvieData('special');
        return view('admin.settings.special', compact('options'));
    }

    public function menu()
    {
        $options = OptionsOp::RetrvieData('menu');
        return view('admin.settings.menu', compact('options'));
    }

    public function reserve()
    {
        $options = OptionsOp::RetrvieData('reserve');
        return view('admin.settings.reserve', compact('options'));
    }

    public function contact()
    {
        $options = OptionsOp::RetrvieData('contact');
        return view('admin.settings.contact', compact('options'));
    }

    public function storeSettings(Request $request)
    {
        ini_set('memory_limit','100M');
        $allowOptions = array(
            'header_logo_img',
            'header_back_img',
            'header_logo_scroll_img',
            'header_text',
            'header_contact_desc',
            'header_address',
            'header_map_url',
            'about_text',
            'about_pic',
            'special_desc',
            'special_post_numbers',
            'special_back_img',
            'menu_desc',
            'menu_cat_numbers',
            'reserve_desc',
            'reserve_back_img',
            'contact_google_address',
            'contact_desc',
        );
        $pictureOptions = array('header_logo_img', 'header_logo_scroll_img','about_pic','header_back_img','special_back_img','reserve_back_img');
        $options = $request->except('_token');
        foreach ($options as $key => $value) {
            if (in_array($key, $allowOptions)) {
                if (in_array($key, $pictureOptions)) {
                    $file = $value;
                    $value = $file->getClientOriginalName();
                    $savePicture = $file->move(public_path("img/admin/"), $value);
                }
                OptionsOp::SaveOptions($key, $value);
            }
        }
        return redirect()->back()->with('success', 'تغییرات با موفقیت اعمال شدند');
    }
}
