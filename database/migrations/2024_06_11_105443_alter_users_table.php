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
        // Modify the existing users table to add the phone column
        Schema::table('users', function (Blueprint $table) {
            // $table->integer('status')->default(1)->after('roll'); /// Change to string
            // $table->integer('phone')->nullable()->after('email'); // Change to string
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the phone column if the migration is rolled back
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone');
        });
    }
};
