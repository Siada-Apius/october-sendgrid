<?php namespace Siada\Deals\Models;

use Model;

/**
 * Deal Model
 */
class Deal extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'siada_deals_deals';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

}