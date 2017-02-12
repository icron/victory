<?php

class DateValidator extends Validator
{
    public function validate($data, $params = [])
    {
        if (!preg_match("/^[0-9]{2}.[0-9]{2}.[0-9]{4}$/", $data)) {
            $this->addError(' - указана недопустимая дата');
            return false;
        }

        if (isset($params['min'])) {
            $dateMin = (new DateTime())->sub(new DateInterval('P' . (int)$params['min'] . 'Y'));
            $dateBirthdayObject = new DateTime($data);
            $dateIntervalMin = $dateBirthdayObject->diff($dateMin);
            $isInvertMin = $dateIntervalMin->invert;

            if ($isInvertMin == 1) {
                $this->addError(' - значение меньше допустимого');
                return false;
            }
        }

        if (isset($params['max'])) {
            $dateMax = (new DateTime())->sub(new DateInterval('P' . (int)$params['max'] . 'Y'));
            $dateBirthdayObject = new DateTime($data);
            $dateIntervalMax = $dateBirthdayObject->diff($dateMax);
            $isInvertMax = $dateIntervalMax->invert;

            if ($isInvertMax == 0) {
                $this->addError(' - значение больше допустимого');
                return false;
            }
        }

        return true;
    }
}
