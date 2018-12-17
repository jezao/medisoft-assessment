<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CardsModel extends Model
{
    private $deck;
    public $timestamps = false;



    protected $fillable = [
        0,1,2,3,4,5,6,7,8,9,10,11,12,
        13,14,15,16,17,18,19,20,21,22,23,24,25,
        26,27,28,29,30,31,32,33,34,35,36,37,38,
        39,40,41,42,43,44,45,46,47,48,49,50,51
    ];


    public function __construct(array $attributes = [])
    {

        $this->deck  = array_sort(
            [
            'HA','H2','H3','H4','H5','H6','H7','H8','H9','H10','HQ','HJ','HK',
            'SA','S2','S3','S4','S5','S6','S7','S8','S9','S10','SQ','SJ','SK',
            'CA','C2','C3','C4','C5','C6','C7','C8','C9','C10','CQ','CJ','CK',
            'DA','D2','D3','D4','D5','D6','D7','D8','D9','D10','DQ','DJ','DK',
            ]
        );

        parent::__construct($attributes);
    }

    public function shuffle()
    {
        shuffle($this->deck);
        return $this->deck;
    }
}
