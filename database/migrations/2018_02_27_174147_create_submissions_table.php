<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('submission_type');
            $table->integer('co_agency');
            $table->integer('status');
            $table->string('form_code');
            $table->string('rental_expiry_date')->nullable();
            $table->text('property_address');
            $table->decimal('selling_rental_price', 8, 2);
            $table->decimal('amount_bank_in_to_proplex', 8, 2);
            $table->decimal('pro_fee', 8, 2);
            $table->decimal('pro_fee_gst', 8, 2);
            $table->decimal('gst_by_landlord_vendor', 8, 2);
            $table->decimal('amount_to_invoice_landlord', 8, 2);
            $table->decimal('stamp_duty', 8, 2);
            $table->decimal('negotiator_commision', 8, 2);
            $table->decimal('balance_due_landlord_vendor', 8, 2);
            $table->decimal('amount_payable_to_negotiator', 8, 2);
            $table->decimal('balance', 8, 2);

            $table->string('landlord_vendor_name');
            $table->string('landlord_vendor_ic_no');
            $table->text('landlord_vendor_address');
            $table->string('landlord_vendor_bank_name');
            $table->string('landlord_vendor_acc_no');

            $table->string('tennant_purchaser_name');
            $table->string('tennant_purchaser_ic_no');
            $table->text('tennant_purchaser_address');
            $table->string('tennant_purchaser_bank_name');
            $table->string('tennant_purchaser_acc_no');

            $table->integer('coagent_id')->nullable();
            $table->integer('coagent_portion_type')->nullable();
            $table->string('coagent_portion_value')->nullable();
            $table->decimal('coagent_gst_by_landlord', 8, 2)->nullable();

            $table->string('coagent_company_name')->nullable();
            $table->integer('coagent_company_portion_type')->nullable();
            $table->string('coagent_company_portion_value')->nullable();
            $table->string('coagent_company_bank_name')->nullable();
            $table->string('coagent_company_bank_acc_no')->nullable();
            $table->decimal('total_payable_to_coagent', 8, 2)->nullable();

            $table->string('coagent_company_name_2')->nullable();
            $table->string('coagent_company_email_2')->nullable();
            $table->integer('proplenx_portion_type_2')->nullable();
            $table->string('proplenx_portion_value_2')->nullable();
            $table->string('coagent_company_gst_by_landlord_2')->nullable();
            $table->decimal('coagent_company_total_amount_to_invoice_2', 8, 2)->nullable();

            $table->string('internal_referrel_name')->nullable();
            $table->string('internal_referrel_bankname')->nullable();
            $table->string('internal_referrel_bankacc')->nullable();
            $table->integer('internal_referrel_portion_type')->nullable();
            $table->string('internal_referrel_portion_value')->nullable();
            $table->string('internal_referrel_gst')->nullable();
            $table->decimal('internal_referrel_total_paid', 8, 2)->nullable();

            $table->string('external_referrel_name')->nullable();
            $table->string('external_referrel_bankname')->nullable();
            $table->string('external_referrel_bankacc')->nullable();
            $table->integer('external_referrel_portion_type')->nullable();
            $table->string('external_referrel_portion_value')->nullable();
            $table->string('external_referrel_gst')->nullable();
            $table->decimal('external_referrel_total_paid', 8, 2)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('submissions');
    }
}
