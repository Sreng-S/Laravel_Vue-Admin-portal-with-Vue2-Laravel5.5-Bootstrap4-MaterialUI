<?php

namespace App\Providers;

use Laravel\Spark\Spark;
use Laravel\Spark\Providers\AppServiceProvider as ServiceProvider;

class SparkServiceProvider extends ServiceProvider
{
    /**
     * Your application and company details.
     *
     * @var array
     */
    protected $details = [
        'vendor' => 'Your Company',
        'product' => 'Your Product',
        'street' => 'PO Box 111',
        'location' => 'Your Town, NY 12345',
        'phone' => '555-555-5555',
    ];

    /**
     * The address where customer support e-mails should be sent.
     *
     * @var string
     */
    protected $sendSupportEmailsTo = null;

    /**
     * All of the application developer e-mail addresses.
     *
     * @var array
     */
    protected $developers = [
        //
    ];

    /**
     * Indicates if the application will expose an API.
     *
     * @var bool
     */
    protected $usesApi = true;

    /**
     * Finish configuring Spark for the application.
     *
     * @return void
     */
    public function booted()
    {
        /*
        Spark::useStripe()->noCardUpFront()->trialDays(10);

        Spark::freePlan()
            ->features([
                'First', 'Second', 'Third'
            ]);

        Spark::plan('Basic', 'provider-id-1')
            ->price(10)
            ->features([
                'First', 'Second', 'Third'
            ]);
        */
        
                Spark::useStripe()->noCardUpFront()->teamTrialDays(360);

        Spark::freeTeamPlan('Free', 'free')
            ->features([
                'Single User License', 'Invoice Management', 'Inventory Management', 'Ledger Management', 'Email support', 'Get Paid - Credit / Debit Cards - NetBanking', 'Reports and Dashboard'
            ])
            ->maxTeams(1)
            ->maxTeamMembers(1);


        Spark::teamPlan('Basic', 'basic')
            ->price(5.00)
            ->archived()
            ->maxTeams(1)
            ->maxTeamMembers(1)
            ->features([
                'Single User License', 'Invoice Management', 'Inventory Management', 'Ledger Management', 'Email support', 'Get Paid - Credit / Debit Cards - NetBanking', 'Reports and Dashboard'
            ]);

        Spark::teamPlan('Startup', 'startup')
            ->price(20.00)
            //->trialDays(14)
            ->maxTeams(1)
            ->maxTeamMembers(5)
            ->features([
                'All features from Basic and 5 User Licenses', 'Expense Management', 'Round the clock - Email support'
            ]);

        Spark::teamPlan('Business', 'business')
            ->price(50.00)
            //->trialDays(14)
            ->maxTeams(1)
            ->maxTeamMembers(20)
            ->features([
                'All features from Startup and 20 User Licenses', 'Tally, XERO and QuickBooks Integration', 'Finance/Loan Assistance', 'Advanced Reports and Dashboard'
            ]);

        Spark::teamPlan('Enterprise', 'enterprise')
            ->price(200.00)
            //->trialDays(14)
            ->maxTeams(10)
            ->maxTeamMembers(100)
            ->features([
                'All features from Business and 100 User Licenses', 'Invoice/Bank Account Reconciliation', 'Advanced Analytics'
            ]);

        Spark::useTwoFactorAuth();

        Spark::collectBillingAddress();
    }
    
    /**
     * added to rename team to company.
     *
     * @return void
     */
    public function register()
    {
        Spark::referToTeamAs('company');
    }
}
