<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('theme');
            $table->text('text');
            $table->string('phone');
            $table->enum('status', ['new', 'in_work', 'done'])->default('new');
            $table->softDeletes();
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id', 'ticket_customer_fk')->references('id')->on('customers');
            $table->index('customer_id', 'ticket_customer_idx');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
