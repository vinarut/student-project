<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $table = 'info';

    /**
     * @var array
     */
    protected $fillable = [
        'childs_name', 'DOB', 'street_address', 'town', 'zip', 'mothers_name', 'home_phone', 'mothers_cell_phone',
        'mothers_employer', 'mothers_city', 'mothers_state', 'mothers_work_phone', 'fathers_name', 'fathers_cell_phone',
        'fathers_employer', 'fathers_city', 'fathers_state', 'fathers_work_phone', 'primary_email_address', 'allergies',
        'allergies_describe', 'special_medical_history', 'special_medical_history_describe', 'epi_pen', 'release_form',
        'photo_choice', 'directory_agree',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function physicians()
    {
        return $this->hasMany(Physicians::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contactList()
    {
        return $this->hasMany(ContactList::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function additionalIndividuals()
    {
        return $this->hasMany(AdditionalIndividuals::class);
    }
}
