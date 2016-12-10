<?php 
class MyActiveRecord extends CActiveRecord {
    
    private static $db1 = null;
 
    protected static function getAdvertDbConnection()
    {
        if (self::$db1 !== null)
            return self::$dbadvert;
        else
        {
            self::$db1 = Yii::app()->dbadvert;
            if (self::$db1 instanceof CDbConnection)
            {
                self::$db1->setActive(true);
                return self::$db1;
            }
            else
                throw new CDbException(Yii::t('yii','Active Record requires a "db" CDbConnection application component.'));
            }
    }	
}