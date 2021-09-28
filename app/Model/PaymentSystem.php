<?php

namespace VanguardDK\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PaymentSystem
 * @package VanguardDK\Model
 * @property int $min_amount
 * @property int $max_amount
 * @property array $config
 * @property string $type
 * @property int $operation
 * @property bool $active
 */
class PaymentSystem extends Model
{
    const TYPE_FREE_KASSA = 'free_kassa';
    const TYPE_CARD = 'card_rub';
    const TYPE_WEBMONEY = 'webmoney';
    const TYPE_YAMONEY = 'yamoney_rub';
    const TYPE_QIWI = 'qiwi_rub';

    const OPERATION_REPLENISH_ACCOUNT = 1;
    const OPERATION_GIVE_MONEY = 2;

    protected $fillable = array(
        'operation',
        'active',
        'min_amount',
        'max_amount',
        'config',
    );

    protected $casts = [
        'config' => 'array',
        'active' => 'bool',
    ];

    /**
     * @param string $name
     * @return string
     */
    public function getConfigParam($name)
    {
        return isset($this->config[$name]) ? $this->config[$name] : '';
    }

    /**
     * @return string
     */
    public function getName()
    {
        return ucwords(str_replace('_', ' ', $this->type));
    }
}
