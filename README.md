# PHP7 tool for easy add/remove "declare(strict_types=1)"

[![Build Status](https://travis-ci.org/dypa/declare-strict-types.png)](//travis-ci.org/dypa/declare-strict-types)
[![Latest Stable Version](https://poser.pugx.org/dypa/declare_strict_types/v/stable.png)](//packagist.org/packages/dypa/declare_strict_types)
[![Latest Unstable Version](https://poser.pugx.org/dypa/declare_strict_types/v/unstable.png)](//packagist.org/packages/dypa/declare_strict_types)
[![Total Downloads](https://poser.pugx.org/dypa/declare_strict_types/downloads.png)](//packagist.org/packages/dypa/declare_strict_types)

Enable strict typing in your project with one command. Based on PCRE and supports PSR-2.

WARNING: before run command ensure that you have backup of your files!!!

## Usage 

Install via composer

`composer require-dev dypa/declare_strict_types`

Run command to add "declare(strict_types=1)" in all files in specified folders

`bin/declare_strict_types add --exclude=bar/baz/bah foo/directory bar/baz`

Also supports remove mode

`bin/declare_strict_types remove foo/directory`

## PS

You may prefer [PHP-CS-Fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer) with "declare_strict_types" rule!