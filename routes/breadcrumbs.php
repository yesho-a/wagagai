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

// // Home > Blog
// Breadcrumbs::for('blog', function (BreadcrumbTrail $trail) {
//     $trail->parent('home');
//     $trail->push('Blog', route('Blog'));
// });



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

Breadcrumbs::for('post.edit', function ($trail,$post) {
    $trail->parent('post.show');
    $trail->push('Edit', route('post.edit',$post));
});



