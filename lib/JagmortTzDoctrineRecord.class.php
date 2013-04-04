<?php

/**
 * @author frost-nzcr4 <frost-nzcr4@jagmort.com>
 * @version 0.2
 */
abstract class JagmortTzDoctrineRecord extends sfDoctrineRecord {
  /**
   * Get the Doctrine date value as a PHP DateTime object.
   *
   * @param  string                $dateFieldName    The field name to get the DateTime object for.
   * @param  boolean|DateTimeZone  $setViewTimezone  If false then return model time, if true or DateTimeZone object then set timezone to view or specific timezone accordingly.
   *
   * @return DateTime              $dateTime         The instance of PHPs DateTime.
   */
  public function getDateTimeObject($dateFieldName, $setViewTimezone = false)
  {
    $datetime = parent::getDateTimeObject($dateFieldName);

    if (!$setViewTimezone) {
      return $datetime;
    }

    if ($setViewTimezone instanceof DateTimeZone) {
      return $datetime->setTimezone($setViewTimezone);
    }
    else
    {
      try {
        return $datetime->setTimezone(new DateTimeZone(sfContext::getInstance()->getUser()->getGuardUser()->getTimezone()->getName()));
      } catch (Exception $e) {
        return $datetime;
      }
    }
  }
}
