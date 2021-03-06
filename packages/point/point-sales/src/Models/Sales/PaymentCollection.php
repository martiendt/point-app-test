<?php

namespace Point\PointSales\Models\Sales;

use Illuminate\Database\Eloquent\Model;
use Point\Core\Traits\ByTrait;
use Point\Framework\Traits\FormulirTrait;
use Point\PointSales\Vesa\PaymentCollectionVesa;

class PaymentCollection extends Model
{
    use ByTrait, FormulirTrait, PaymentCollectionVesa;

    protected $table = 'point_sales_payment_collection';
    public $timestamps = false;

    /**
     * Inject function when saving
     *
     * @param array $options
     *
     * @return bool|null
     */
    public function save(array $options = [])
    {
        parent::save();

        $this->formulir->formulirable_type = get_class($this);
        $this->formulir->formulirable_id = $this->id;
        $this->formulir->save();

        return $this;
    }

    public function scopeJoinPerson($q)
    {
        $q->join('person', 'person.id', '=', 'point_sales_payment_collection.person_id');
    }

    public function person()
    {
        return $this->belongsTo('\Point\Framework\Models\Master\Person', 'person_id');
    }

    public function details()
    {
        return $this->hasMany('\Point\PointSales\Models\Sales\PaymentCollectionDetail', 'point_sales_payment_collection_id');
    }

    public function others()
    {
        return $this->hasMany('\Point\PointSales\Models\Sales\PaymentCollectionOther', 'point_sales_payment_collection_id');
    }

    public static function showUrl($id)
    {
        $payment_collection = PaymentCollection::find($id);
        if ($payment_collection->formulir->form_number) {
            return '/sales/point/indirect/payment-collection/'.$id;
        } else {
            return '/sales/point/indirect/payment-collection/'.$id.'/archived';
        }
    }

    public static function bladeEmail()
    {
        return 'point-sales::app.emails.sales.point.approval.payment-collection';
    }
}
