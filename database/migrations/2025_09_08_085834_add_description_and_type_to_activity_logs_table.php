<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('activity_logs', function (Blueprint $table) {
            $table->text('description')->nullable()->after('title');
            $table->string('type')->default('info')->after('description');
        });
    }

    public function down()
    {
        Schema::table('activity_logs', function (Blueprint $table) {
            $table->dropColumn(['description', 'type']);
        });
    }
};
?>
