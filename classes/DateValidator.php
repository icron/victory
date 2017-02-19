<?php

class DateValidator extends Validator
{
    public function validate($data, $params = [])
    {
        if (!preg_match("/^[0-9]{2}.[0-9]{2}.[0-9]{4}$/", $data)) {
            $invalidDateMessage = isset($params['invalidDateMessage']) ? $params['invalidDateMessage'] : 'неверно указана дата';
            $this->addError($invalidDateMessage);
        }

        if (isset($params['min'])) {
            $dateMin = (new DateTime())->sub(new DateInterval('P' . (int)$params['min'] . 'Y'));
            $dateBirthdayObject = new DateTime($data);
            $dateIntervalMin = $dateBirthdayObject->diff($dateMin);
            $isInvertMin = $dateIntervalMin->invert;

            if ($isInvertMin == 1) {
                $minDateMessage = isset($params['minDateMessage']) ? $params['minDateMessage'] : 'возраст меньше допустимого';
                $this->addError($minDateMessage);
            }
        }

        if (isset($params['max'])) {
            $dateMax = (new DateTime())->sub(new DateInterval('P' . (int)$params['max'] . 'Y'));
            $dateBirthdayObject = new DateTime($data);
            $dateIntervalMax = $dateBirthdayObject->diff($dateMax);
            $isInvertMax = $dateIntervalMax->invert;

            if ($isInvertMax == 0) {
                $maxDateMessage = isset($params['maxDateMessage']) ? $params['maxDateMessage'] : 'возраст больше допустимого';
                $this->addError($maxDateMessage);
            }
        }

        return !$this->hasErrors();
    }
}
