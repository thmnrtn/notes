<?php namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $appends = ['formatted_date'];

    protected $guarded = ['id'];

    /**
     * Format updated at in a human readable format
     * @return string
     */
    public function getFormattedDateAttribute()
    {
        return Carbon::parse($this->updated_at)->format('d/m/Y H:i');
    }
}
