<?php

namespace craft\commerce\records;

use craft\db\ActiveRecord;
use craft\records\UserGroup;
use yii\db\ActiveQueryInterface;

/**
 * Sale user group record.
 *
 * @property int                  $id
 * @property int                  $saleId
 * @property ActiveQueryInterface $userGroup
 * @property ActiveQueryInterface $sale
 * @property int                  $userGroupId
 *
 * @author Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @since  2.0
 */
class SaleUserGroup extends ActiveRecord
{
    // Public Methods
    // =========================================================================

    /**
     * @return string
     */
    public static function tableName(): string
    {
        return '{{%commerce_sale_usergroups}}';
    }

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        return [
            [['saleId', 'userGroupId'], 'unique', 'targetAttribute' => ['saleId', 'userGroupId']]
        ];
    }

    /**
     * @return ActiveQueryInterface
     */
    public function getSale(): ActiveQueryInterface
    {
        return $this->hasOne(Sale::class, ['saleId' => 'id']);
    }

    /**
     * @return ActiveQueryInterface
     */
    public function getUserGroup(): ActiveQueryInterface
    {
        return $this->hasOne(UserGroup::class, ['saleId' => 'id']);
    }
}
