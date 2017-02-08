<?php
    class Form {
      public $lastname;
      public $firstname;
      public $middlename;
      public $birthday;
      public $passport;
      public $email;

      public function validate()
      {
          $this->validate();
      }

      public function load()
      {
          $this->load();
      }

      public function getDefaultValues()
      {
          return [
              'last-name' => '',
              'first-name' => '',
              'middle-name' => '',
              'birthday' => '14.11.1980',
              'passport' => '',
              'email' => '',
          ];
      }

      public function getLabels()
      {
          return [
              'last-name' => 'Фамилия',
              'first-name' => 'Имя',
              'middle-name' => 'Отчество',
              'birthday' => 'Дата рождения',
              'passport' => 'Паспорт',
              'email' => 'E-mail',
          ];
      }

      public function getRules()
      {
          return [
              'last-name' => 'checkName',
              'first-name' => 'checkName',
              'middle-name' => 'checkName',
              'birthday' => ['date', ['min' => 18, 'max' => 50]],
              'passport' => 'passport',
              'email' => 'email',
          ];
      }

    }

 ?>
