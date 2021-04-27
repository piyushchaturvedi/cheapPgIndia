<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 7/16/2019
 * Time: 2:05 PM
 */
namespace Modules\Coupon\Models;

use App\BaseModel;

class CouponTranslation extends BaseModel
{
    protected $table = 'coupon_translations';
    protected $fillable = ['code', 'discount_type','amount','expiry_date','usage_count',
                        ''];
    protected $seo_type = 'page_translation';
    protected $cleanFields = [
        'content'
    ];
}
