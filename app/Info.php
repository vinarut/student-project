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
        'childs_first_name', 'childs_last_name', 'DOB', 'street_address', 'town', 'zip', 'mothers_first_name',
        'mothers_last_name', 'home_phone', 'mothers_cell_phone', 'mothers_employer', 'mothers_city', 'mothers_state',
        'mothers_work_phone', 'fathers_first_name', 'fathers_last_name', 'fathers_cell_phone', 'fathers_employer',
        'fathers_city', 'fathers_state', 'fathers_work_phone', 'primary_email_address', 'allergies', 'allergies_describe',
        'special_medical_history', 'special_medical_history_describe', 'epi_pen', 'release_form', 'photo_choice',
        'directory_agree', 'your_name', 'date', 'signature', 'ip',
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
