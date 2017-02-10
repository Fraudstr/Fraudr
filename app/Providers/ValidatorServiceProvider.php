<?php

namespace Fraudr\Providers;

use Fraudr\Validators\CreditValidator;
use Fraudr\Validators\DenyValidator;
use Fraudr\Validators\ValidatorContract;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use MongoDB\Driver\Exception\DuplicateKeyException;

class ValidatorServiceProvider extends ServiceProvider
{
    private $validators = [];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerValidator('credits', CreditValidator::class);
        $this->registerValidator('deny', DenyValidator::class);
    }

    /**
     * @param string            $name  Validator name
     * @param ValidatorContract $class Validator class
     */
    private function registerValidator(string $name, $class)
    {
        if(key_exists($name, $this->validators)) {
            throw new DuplicateKeyException("Validator $name is already registered.");
        }

        $this->validators[$name] = ['class' => $class, 'instance' => null];

        Validator::extend($name, function($attribute, $value, $parameters, $validator) use ($name) {
            $info = &$this->validators[$name];

            if(is_null($info['instance'])) {
                $info['instance'] = new $info['class']();
                $info['instance']->boot();
            }

            return $info['instance']->validate($attribute, $value, $parameters, $validator);
        });
    }
}
