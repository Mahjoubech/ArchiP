Schema::create('users', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email')->unique();
    $table->timestamp('email_verified_at')->nullable();
    $table->string('password');
    $table->enum('role', ['admin', 'client', 'architect'])->default('client');
    $table->boolean('is_active')->default(true);
    $table->boolean('is_verified')->default(false);
    $table->rememberToken();
    $table->timestamps();
});