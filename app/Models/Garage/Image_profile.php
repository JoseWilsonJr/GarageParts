<?php

namespace App\Models\Garage;

use Illuminate\Database\Eloquent\Model;
use App\Models\Garage\Timeline;
use DB;

class Image_profile extends Model
{
    public function timelineHistoricImageProfile($timelineRef)
    {
        $image = auth()->user()->image;
        DB::beginTransaction();

        $this->timeline_id = $timelineRef[0]->id;
        $this->name = $image;
        $this->save();
        
        DB::commit();
    }

    /****************
    * Relacionamentos
    ********/
    public function timeline()
    {
        return $this->belongsTo(Timeline::class);
    }

}
