<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id(); // ID da tarefa
            $table->string('title'); // Título da tarefa
            $table->text('description')->nullable(); // Descrição da tarefa
            $table->boolean('is_completed')->default(false); // Status de conclusão
            $table->timestamps(); // Campos created_at e updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
