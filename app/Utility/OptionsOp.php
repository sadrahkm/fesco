<?php


namespace App\Utility;


use App\Models\Option;
use Illuminate\Support\Facades\DB;

class OptionsOp
{
    public static function SaveOptions($option, $value)
    {
        $optionItem = Option::find($option);
        if ($optionItem && $optionItem instanceof Option) {
            $optionItem->update([
                'value' => $value
            ]);
        } else {
            Option::create([
                'name' => $option,
                'value' => $value,
            ]);
        }
    }

    public static function RetrvieData($section)
    {
        $options = DB::table('options')->where('name', 'like', $section . '%')->get();
        $result = array();
        if($options){
            foreach ($options as $value){
                $result[$value->name] = $value->value;
            }
        }
        return $result;
    }
}
