<?php

class DateValidator extends Validator
{
    public function validate($birthday, $params = [])
    {
        if (!preg_match("/^[0-9]{2}.[0-9]{2}.[0-9]{4}$/", $birthday)) {
            return false;
        }

        if (!empty($params['min'])) {
            $dateMin = (new DateTime())->sub(new DateInterval('P' . (int)$params['min'] . 'Y'));
            $dateBirthdayObject = new DateTime($birthday);
            $dateItervalMin = $dateBirthdayObject->diff($dateMin);
            $isInvertMin = $dateItervalMin->invert;

            if ($isInvertMin == 1) {
                $this->addError('Значение меньше допустимого');
            }
        }

        if (!empty($params['max'])) {
            $dateMax = (new DateTime())->sub(new DateInterval('P' . (int)$params['max'] . 'Y'));
            $dateBirthdayObject = new DateTime($birthday);
            $dateItervalMax = $dateBirthdayObject->diff($dateMax);
            $isInvertMax = $dateItervalMax->invert;

            if ($isInvertMax == 0) {
                $this->addError('Значение больше допустимого');
            }
        }

        return !$this->hasErrors();
    }
}
