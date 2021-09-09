<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Panoscape\History\HasHistories;
use Panoscape\History\HasOperations;
use Panoscape\History\History;
use Ramsey\Collection\Collection;

/**
 * @property string $name
 * @property \DateTime $deadline_date
 * @property string $description
 * @property int $user_id
 * @property int $status_id
 * @property User $user
 * @property Status $status
 * @property History|Collection $histories
 */
class Task extends Model
{
    use HasFactory, HasHistories;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'deadline_date',
        'description',
        'user_id',
        'status_id'
    ];

    /**
     * @var string[]
     */
    protected $dates = [
        'deadline_date'
    ];

    /**
     * @return HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    /**
     * @return HasOne
     */
    public function status(): HasOne
    {
        return $this->hasOne(Status::class);
    }

    public function getModelLabel()
    {
        // TODO
    }
}
