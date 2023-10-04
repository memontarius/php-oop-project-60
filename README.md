### Hexlet tests and linter status:
[![Actions Status](https://github.com/memontarius/php-oop-project-60/actions/workflows/hexlet-check.yml/badge.svg)](https://github.com/memontarius/php-oop-project-60/actions)

PHP >= 8.0

Учебынй проект, для валидации данных.

Валидация строк:
```php
$v = new Validator();
$schema = $v->string()->required()->contains('test');
$result = $schema->isValid('testing string');
```

Валидация чисел:
```php
$v = new Validator();
$schema = $v->number()->positive()->range(-5, 5);
$result = $schema->isValid(5);
```

Валидация занчений массива по ключам:
```php
$v = new Validator();
$schema = $v->array()->shape([
    'name' => $this->validator->string()->required(),
    'age' => $this->validator->number()->positive(),
]);
$result = $schema->isValid(['name' => 'Ibragim', 'age' => 100]);
```

Добавление пользовательских проверок:
```php
$v = new Validator();

fn = fn ($value, $start) => str_starts_with($value, $start);
$v->addValidator(Validator::STRING_TYPE, 'startWith', $fn);

$schema = $v->string()->test('startWith', 'H');
$result = $schema->isValid('exlet');
```

Добавление пользовательских схем валидации
```php
$v = new Validator();
$v->addValidationSchema('double', CustomDoubleNumberSchema::class, ['double']);
$schema = $v->getSchema('double');
```





