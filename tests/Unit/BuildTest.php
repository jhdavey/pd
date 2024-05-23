<?php

// AAA

use \App\Models\User;
use \App\Models\Build;

it('belongs to a user', function () {
    $user = User::factory()->create();
    $buiild = Build::factory()->create([
        'user_id' => $user->id,
    ]);

    expect($buiild->user->is($user))->toBeTrue();
});

it('can have tags', function () {
    $build = Build::factory()->create();

    $build->tag('JDM');

    expect($build->tags)->toHaveCount(1);
});