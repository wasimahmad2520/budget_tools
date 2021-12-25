<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\Policies\AccountPolicy;
use App\Policies\BudgetPolicy;
use App\Policies\EnvelopPolicy;
use App\Policies\EnvelopGoalPolicy;
use App\Policies\MortgagePolicy;
use App\Policies\EnvelopSubCategoryPolicy;
use App\Policies\PayeePolicy;
use App\Policies\SettingsPolicy;
use App\Policies\TransactionPolicy;
use App\Policies\EnvelopGoalTransactionPolicy;
use App\Models\Account;
use App\Models\Budget;
use App\Models\Envelop;
use App\Models\EnvelopGoal;
use App\Models\Mortgage;
use App\Models\EnvelopSubCategory;
use App\Models\Payee;
use App\Models\Settings;
use App\Models\Transaction;
use App\Models\GoalTransaction;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
          Account::class => AccountPolicy::class,
          Budget::class => BudgetPolicy::class,
          Envelop::class => EnvelopPolicy::class,
          EnvelopGoal::class => EnvelopGoalPolicy::class,
          Mortgage::class => MortgagePolicy::class,
          EnvelopSubCategory::class => EnvelopSubCategoryPolicy::class,
          Payee::class => PayeePolicy::class,
          Settings::class => SettingsPolicy::class,
          Transaction::class => TransactionPolicy::class,
          GoalTransaction::class => EnvelopGoalTransactionPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}


// Controller Method            Policy Method
// index                  viewAny
// show                     view
// create                  create
// store                   create
// edit                   update
// update                 update
// destroy                delete

