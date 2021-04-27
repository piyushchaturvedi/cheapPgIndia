<?php
namespace Modules\Coupon\Models;

use App\BaseModel;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Core\Models\SEO;

class Coupon extends BaseModel
{
    use SoftDeletes;

    protected $table = 'coupons';
    protected $fillable = ['code', 'description','percentage','expiry_date','usage_limit','status'];
    protected $slugField     = 'code';
    protected $slugFromField = 'code';
    protected $cleanFields = [
        'description',
    ];

    public $translatedAttributes = [

    ];

    protected $seo_type = 'coupon';

    public function getDetailUrl($locale = false)
    {
        return route('coupon.detail',['slug'=>$this->slug]);
    }

    public static function getModelName()
    {
        return __("Coupon");
    }

    public static function getAsMenuItem($id)
    {
        return parent::select('id', 'title as name')->find($id);
    }

    public static function searchForMenu($q = false)
    {
        $query = static::select('id', 'title as name');
        if (strlen($q)) {

            $query->where('title', 'like', "%" . $q . "%");
        }
        $a = $query->limit(10)->get();
        return $a;
    }

    public function getEditUrlAttribute()
    {
        return url('admin/module/page/edit/' . $this->id);
    }

    public function template()
    {
        return $this->hasOne("\\Modules\\Template\\Models\\Template", 'id', 'template_id');
    }

    public function getProcessedContent()
    {
        $template = $this->template;
        if(!empty($template)){
            $translation = $template->translateOrOrigin(app()->getLocale());

            return $translation->getProcessedContent();
        }
    }

}
