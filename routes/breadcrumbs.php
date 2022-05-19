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
Breadcrumbs::for('display', function ($trail,$post) {
    $trail->parent('post.index');
   $trail->push('Post Title', route('display',$post));
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


// Home > Permissions > Permission Title 
Breadcrumbs::for('perm.show', function ($trail,$permission) {
    $trail->parent('perm.index');
    $trail->push($permission->name, route('perm.show', $permission));
});


// Home > Permissions > Permission Title > Edit
Breadcrumbs::for('perm.edit', function ($trail,$permission) {
    $trail->parent('perm.show',$permission);
    $trail->push('Edit Permission', route('perm.edit', $permission));
});


// ROLES BREADCRUMBS

// Home > Roles


Breadcrumbs::for('roles.index', function (BreadcrumbTrail $trail): void {
    $trail->parent('home');
    $trail->push('Roles', route('roles.index'));
});

//Home > Roles > Create Role
Breadcrumbs::for('roles.create', function (BreadcrumbTrail $trail): void {
    $trail->parent('roles.index');
    $trail->push('Create Role', route('roles.create'));
});

// Home > Roles > Role Title
Breadcrumbs::for('roles.show', function ($trail,$roles) {
    $trail->parent('roles.index');
    $trail->push($roles->name, route('perm.show', $roles));
});

// Home > Roles > Role Title > Edit
Breadcrumbs::for('roles.edit', function ($trail,$roles) {
    $trail->parent('roles.show',$roles);
    $trail->push('Edit Role', route('roles.edit', $roles));
});



