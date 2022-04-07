<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('github_id')->unique();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('contact_email')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->string('bank_account_owner')->nullable();
            $table->string('bank_domiciliation')->nullable();
            $table->string('bank_rib')->nullable();
            $table->string('bank_iban')->nullable();
            $table->string('bank_bic')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_siret')->nullable();
            $table->string('company_ape')->nullable();
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
        Schema::dropIfExists('users');
    }
};
