<?php

namespace VanguardDK\Model;

use Illuminate\Database\Eloquent\Model;
use VanguardDK\User;

/**
 * Class PaymentTask
 * @package VanguardDK\Model
 * @property int user_id
 * @property int payment_system_id
 * @property float $amount
 * @property string $account
 * @property int $status
 * @property User $user
 */
class PaymentTask extends Model
{
    const STATUS_ACTIVE = 1;
    const STATUS_COMPLETED = 2;

    protected $fillable = [
        'status',
    ];

    protected $casts = [
        'status' => 'int',
    ];

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->status === self::STATUS_ACTIVE;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function system()
    {
        return $this->belongsTo(PaymentSystem::class, 'payment_system_id', 'id');
    }
}
