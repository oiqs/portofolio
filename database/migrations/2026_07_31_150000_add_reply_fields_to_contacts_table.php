<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->boolean('is_replied')->default(false)->after('is_read');
            $table->text('reply_message')->nullable()->after('is_replied');
            $table->timestamp('replied_at')->nullable()->after('reply_message');
        });
    }

    public function down(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn(['is_replied', 'reply_message', 'replied_at']);
        });
    }
};
