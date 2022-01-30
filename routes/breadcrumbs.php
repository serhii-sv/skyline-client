<?php

Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard');
});

Breadcrumbs::for('replenishment', function ($trail) {
    $trail->push('Replenishment');
});

Breadcrumbs::for('deposits.create', function ($trail) {
    $trail->push('Create deposit');
});

Breadcrumbs::for('withdrawals.index', function ($trail) {
    $trail->push('Withdraw');
});

Breadcrumbs::for('Transactions', function ($trail) {
    $trail->push('Transactions');
});

Breadcrumbs::for('Referrals', function ($trail) {
    $trail->push('Referrals');
});

Breadcrumbs::for('transactions.index', function ($trail) {
    $trail->parent('Transactions');
    $trail->push('All transactions');
});

Breadcrumbs::for('referrals.progress', function ($trail) {
    $trail->parent('Referrals');
    $trail->push('Progress');
});

Breadcrumbs::for('calendar.index', function ($trail) {
    $trail->parent('Transactions');
    $trail->push('Calendar');
});

Breadcrumbs::for('referrals.banners', function ($trail) {
    $trail->parent('Referrals');
    $trail->push('Banners');
});

Breadcrumbs::for('referrals.reftree', function ($trail) {
    $trail->parent('Referrals');
    $trail->push('Referral tree');
});

Breadcrumbs::for('currency-exchange', function ($trail) {
    $trail->push('Currency exchange');
});

Breadcrumbs::for('shop', function ($trail) {
    $trail->push('Магазин');
});

Breadcrumbs::for('shop.buy', function ($trail, $product) {
    $trail->parent('shop');
    $trail->push('Купить "' . $product->title . '"');
});

Breadcrumbs::for('shop.show', function ($trail, $product) {
    $trail->parent('shop');
    $trail->push($product->title);
});

Breadcrumbs::for('user-products', function ($trail) {
    $trail->push('Покупки');
});

Breadcrumbs::for('Settings', function ($trail) {
    $trail->push('Settings');
});

Breadcrumbs::for('settings.profile', function ($trail) {
    $trail->parent('Settings');
    $trail->push('Profile');
});

Breadcrumbs::for('settings.wallets', function ($trail) {
    $trail->parent('Settings');
    $trail->push('Wallets');
});

Breadcrumbs::for('settings.support-tasks', function ($trail) {
    $trail->parent('Settings');
    $trail->push('Support tasks');
});

Breadcrumbs::for('settings.support-tasks.create', function ($trail) {
    $trail->parent('Settings');
    $trail->push('Добавить');
});

Breadcrumbs::for('settings.support-tasks.show', function ($trail, $support_task) {
    $trail->parent('Settings');
    $trail->push($support_task->title);
});

Breadcrumbs::for('settings.security', function ($trail) {
    $trail->parent('Settings');
    $trail->push('Security');
});
