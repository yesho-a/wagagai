<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use App\Models\Post;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});

// Home > Blog >
Breadcrumbs::for('post.index', function (BreadcrumbTrail $trail): void {
    $trail->parent('home');
    $trail->push('Blog', route('post.index'));
});

// Home > Blog > Post Titles
Breadcrumbs::for('post.show', function ($trail,$post) {
    $trail->parent('post.index');
    $trail->push($post->post_title, route('post.show',$post));
});

// Home > Blog > Post Titles > Edit
Breadcrumbs::for('post.edit', function (BreadcrumbTrail $trail, Post $post) {
    $trail->parent('post.show', $post);
    $trail->push('Edit Post', route('post.edit', $post));
});


// PERMISSION BREADCRUMBS

// Home > Permissions

Breadcrumbs::for('perm.index', function (BreadcrumbTrail $trail): void {
    $trail->parent('home');
    $trail->push('Permission', route('perm.index'));
});

//Home > Permissions > Create Permission

Breadcrumbs::for('perm.create', function (BreadcrumbTrail $trail): void {
    $trail->parent('perm.index');
    $trail->push('Create Permission', route('perm.create'));
});


// Home > Permissions > Post Titles > Title

Breadcrumbs::for('perm.edit', function (BreadcrumbTrail $trail, Post $post) {
    $trail->parent('post.show', $post);
    $trail->push('Edit Post', route('post.edit', $post));
});